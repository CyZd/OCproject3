<?php
namespace App\Frontend\Modules\Jobs;

use \OCFram\BackController;
use \OCFram\HTTPRequest;
use \Entity\Comment;
use \Entity\Apply;
use \FormBuilder\CommentFormBuilder;
use \FormBuilder\ApplyFormBuilder;
use \OCFram\FormHandler;

class JobsController extends BackController
{
  public function executeIndex(HTTPRequest $request)
  {
    $nombreJobs = $this->app->config()->get('nombre_jobs');
    $nombreCaracteresJobs = $this->app->config()->get('nombre_caracteres_jobs');
    
    // On ajoute une définition pour le titre.
    $this->page->addVar('title', 'Liste des '.$nombreJobs.' dernières offres d\'emploi');
    
    // On récupère le manager des news.
    $manager = $this->managers->getManagerOf('Jobs');
    
    $listeJobs = $manager->getList(0, $nombreJobs);
    
    foreach ($listeJobs as $job)
    {
      $date=date('now');
      if (strlen($job->contenu()) > $nombreCaracteresJobs && $job->dateExpire() >= $date)
      {
        $debut = substr($job->contenu(), 0, $nombreCaracteresJobs);
        $debut = substr($debut, 0, strrpos($debut, ' ')) . '...';
        
        $job->setContenu($debut);
      }
    }
    
    // On ajoute la variable $listeNews à la vue.
    $this->page->addVar('listeJobs', $listeJobs);
  }
  
  public function executeShow(HTTPRequest $request)
  {
    $jobs = $this->managers->getManagerOf('Jobs')->getUnique($request->getData('id'));
    
    if (empty($jobs))
    {
      $this->app->httpResponse()->redirect404();
    }
    
    
    $this->page->addVar('job', $jobs);
  }

  public function executeApplyToJob(HTTPRequest $request)
  {
    // Si le formulaire a été envoyé.
    var_dump($request->method('POST'));
    if ($request->method() == 'POST')
    {
      $apply = new Apply([
        'job' => $request->getData('job'),
        'candidat' => $request->postData('candidat'),
        'numero' => $request->postData('numero'),
        'fichier'=> $request->postData('fichier')
      ]);
    }
    else
    {
      $apply = new Apply;
    }

    $formBuilder = new ApplyFormBuilder($apply);
    $formBuilder->build();

    $form = $formBuilder->form();

    $formHandler = new FormHandler($form, $this->managers->getManagerOf('apply'), $request);

    if ($formHandler->process())
    {
      $this->app->user()->setFlash('Merci d\'avoir postulé !');
      
      $this->app->httpResponse()->redirect('job-'.$request->getData('job').'.html');
    }

    $this->page->addVar('apply', $apply);
    $this->page->addVar('form', $form->createView());
    $this->page->addVar('title', 'Ajout d\'une candidature');
  }

  
}