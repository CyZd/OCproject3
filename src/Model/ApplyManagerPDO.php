<?php
namespace Model;

use \Entity\Apply;



class ApplyManagerPDO extends ApplyManager
{
  
  protected function add(Apply $apply)
  {
    
    $uploadedFile=$_FILES['fichier']['name'];
    $filePath= __DIR__.'/../../../Uploaded/';
    $targetPath=time().$uploadedFile;
    move_uploaded_file($_FILES['fichier']['tmp_name'], $filePath.$targetPath);


    $q = $this->dao->prepare('INSERT INTO appliesjob SET job = :job, candidat = :candidat, numero = :numero, date = NOW(), fichier = :fichier');
    
    $q->bindValue(':job', $apply->job(), \PDO::PARAM_INT);
    $q->bindValue(':candidat', $apply->candidat());
    $q->bindValue(':numero', $apply->numero());
    $q->bindValue(':fichier', $filePath.$targetPath);
    
    $q->execute();

    $apply->setId($this->dao->lastInsertId());
  }

  public function delete($id)
  {
    $this->dao->exec('DELETE FROM appliesjob WHERE id = '.(int) $id);
  }

  public function deleteFromJob($job)
  {
    $this->dao->exec('DELETE FROM appliesjob WHERE job = '.(int) $job);
  }
  
  public function getListOf($job)
  {
    if (!ctype_digit($job))
    {
      throw new \InvalidArgumentException('L\'identifiant de la news passé doit être un nombre entier valide');
    }
    
    $q = $this->dao->prepare('SELECT id, job, candidat, numero, date, fichier FROM appliesjob WHERE job = :job');
    $q->bindValue(':job', $job, \PDO::PARAM_INT);
    $q->execute();
    
    $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Apply');
    
    $apply = $q->fetchAll();
    
    foreach ($apply as $application)
    {
      $application->setDate(new \DateTime($application->date()));
    }
    
    return $apply;
  }

  protected function modify(Apply $apply)
  {
    $q = $this->dao->prepare('UPDATE appliesjob SET candidat = :candidat, numero = :numero, fichier = :fichier WHERE id = :id');
    
    $q->bindValue(':candidat', $apply->candidat());
    $q->bindValue(':numero', $apply->numero());
    $q->bindValue(':fichier', $apply->fichier(), \PDO::PARAM_INT);
    $q->bindValue(':id', $apply->id(), \PDO::PARAM_INT);
    
    $q->execute();

    //$apply->setFichier($filePath);
  }
  
  public function get($id)
  {
    $q = $this->dao->prepare('SELECT id, job, candidat, numero, fichier FROM appliesjob WHERE id = :id');
    $q->bindValue(':id', (int) $id, \PDO::PARAM_INT);
    $q->execute();
    
    $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Apply');
    
    return $q->fetch();
  }
}