<?php
namespace App\Backend\Modules\Connexion;

use \OCFram\BackController;
use \OCFram\HTTPRequest;
use \OCFram\HTTPResponse;

class ConnexionController extends BackController
{
  public function executeIndex(HTTPRequest $request)
  {
    $this->page->addVar('title', 'Connexion');
    
    if ($request->postExists('login'))
    {
      $login = $request->postData('login');
      $password = $request->postData('password');
      $hash=$this->app->config()->get('pass');
      $passcheck=password_verify($password,$hash);
      
      if ($login == $this->app->config()->get('login'))
      {
        $this->app->user()->setAuthenticated(true);
        $this->app->httpResponse()->redirect('.');
      }
      else
      {
        $this->app->user()->setFlash('Le pseudo ou le mot de passe est incorrect.');
        var_dump($hash);
        var_dump($password);
      }
    }
  }

  public function executeDisconnect(HTTPRequest $request)
  {
    $this->app->user()->setAuthenticated(false);
    $this->app->httpResponse()->redirect('.');
  }

  public function executechangePassword(HTTPRequest $request)
  {
    $this->page->addVar('title', 'Changement du mot de passe');
    $this->setView('change-pass');

    if($request->postExists('newpass'))
    {
      $newvalue=$request->postData('newpass');
      $passString= $request->postData('password');
      $this->app->config()->set('pass',$newvalue);
      $this->app->user()->setFlash('Le mot de passe a bien été changé.');
    }
    
    
  }
}