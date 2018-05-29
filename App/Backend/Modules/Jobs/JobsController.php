<?php
namespace App\Backend\Modules\Jobs;

use \OCFram\BackController;
use \OCFram\HTTPRequest;
use \Entity\Job;
use \Entity\Comment;
use \FormBuilder\CommentFormBuilder;
use \FormBuilder\JobsFormBuilder;
use \OCFram\FormHandler;

class JobsController extends BackController
{
  public function executeDelete(HTTPRequest $request)
  {
    $jobsId = $request->getData('id');
    
    $this->managers->getManagerOf('Jobs')->delete($jobsId);

    $this->app->user()->setFlash('L\'offre a bien été supprimée !');

    $this->app->httpResponse()->redirect('.');
  }


  public function executeIndex(HTTPRequest $request)
  {
    $this->page->addVar('title', 'Gestion des offres');

    $manager = $this->managers->getManagerOf('Jobs');

    $this->page->addVar('listeJobs', $manager->getList());
    $this->page->addVar('nombreJobs', $manager->count());
  }

  public function executeInsert(HTTPRequest $request)
  {
    $this->processForm($request);

    $this->page->addVar('title', 'Ajout d\'une offre');
  }

  public function executeUpdate(HTTPRequest $request)
  {
    $this->processForm($request);

    $this->page->addVar('title', 'Modification d\'une offre');
  }

  public function processForm(HTTPRequest $request)
  {
    
    if ($request->method() == 'POST')
    {
      
      $jobs = new Job([
        'auteur' => $request->postData('auteur'),
        'titre' => $request->postData('titre'),
        'contenu' => $request->postData('contenu'),
        'lieu'=> $request->postData('lieu'),
        'renum'=>$request->postData('renum'),
        'dateExpire'=>$request->postData('dateExpire')
      ]);

      if ($request->getExists('id'))
      {
        $jobs->setId($request->getData('id'));
      }
    }
    else
    {
      // L'identifiant de l'offre' est transmis si on veut la modifier
      if ($request->getExists('id'))
      {
        $jobs = $this->managers->getManagerOf('Jobs')->getUnique($request->getData('id'));
      }
      else
      {
        $jobs = new Job;
      }
    }

    $formBuilder = new JobsFormBuilder($jobs);
    $formBuilder->build();

    $form = $formBuilder->form();

    $formHandler = new FormHandler($form, $this->managers->getManagerOf('Jobs'), $request);

    if ($formHandler->process())
    {
      $this->app->user()->setFlash($jobs->isNew() ? 'L\'offre a bien été ajoutée !' : 'L\'offre a bien été modifiée !');
      
      $this->app->httpResponse()->redirect('/admin/');
    }

    $this->page->addVar('form', $form->createView());
  }
}