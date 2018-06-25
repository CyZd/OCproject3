<?php
namespace Model;

use \OCFram\Manager;
use \Entity\Job;

abstract class JobsManager extends Manager
{
  


  abstract public function getList($debut = -1, $limite = -1);
  
  /**
   * Méthode retournant une news précise.
   * @param $id int L'identifiant de la news à récupérer
   * @return News La news demandée
   */
  abstract public function getUnique($id);

  /**
   * Méthode permettant de modifier une news.
   * @param $news news la news à modifier
   * @return void
   */

  abstract public function count();

  abstract protected function add(Job $jobs);

  abstract public function delete($id);

  public function save(Job $jobs)
  {
    if ($jobs->isValid())
    {
      $jobs->isNew()?$this->add($jobs) : $this->modify($jobs);
    }
    else
    {
      throw new \RuntimeException('L\'offre d\'emploi doit être valide pour être enregistrée');
    }
  }

  abstract public function modify(Job $jobs);
}