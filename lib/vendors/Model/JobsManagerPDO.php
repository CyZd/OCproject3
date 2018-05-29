<?php
namespace Model;

use \Entity\Job;

class JobsManagerPDO extends JobsManager
{
  
  public function getList($debut = -1, $limite = -1)
  {
    $sql = 'SELECT id, titre, contenu, lieu, renum, dateAjout, dateModif, dateExpire FROM jobs ORDER BY id DESC';
    
    if ($debut != -1 || $limite != -1)
    {
      $sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
    }
    
    $requete = $this->dao->query($sql);
    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Job');
    
    $listeJobs = $requete->fetchAll();
    
    foreach ($listeJobs as $jobs)
    {
      $jobs->setDateAjout(new \DateTime($jobs->dateAjout()));
      $jobs->setDateModif(new \DateTime($jobs->dateModif()));
      $jobs->setDateExpire(new \DateTime($jobs->dateExpire()));
    }
    
    $requete->closeCursor();
    
    return $listeJobs;
  }
  
  public function getUnique($id)
  {
    $requete = $this->dao->prepare('SELECT id, auteur, titre, contenu, lieu, renum, dateAjout, dateModif, dateExpire FROM jobs WHERE id = :id');
    $requete->bindValue(':id', (int) $id, \PDO::PARAM_INT);
    $requete->execute();
    
    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Job');
    
    if ($jobs = $requete->fetch())
    {
      $jobs->setDateAjout(new \DateTime($jobs->dateAjout()));
      $jobs->setDateModif(new \DateTime($jobs->dateModif()));
      $jobs->setDateExpire(new \DateTime($jobs->dateExpire()));
      
      return $jobs;
    }
    
    return null;
  }

  public function count()
  {
    return $this->dao->query('SELECT COUNT(*) FROM jobs')->fetchColumn();
  }

  protected function add(Job $jobs)
  {
    $requete=$this->dao->prepare('INSERT INTO jobs SET titre=:titre, contenu=:contenu, lieu=:lieu, renum=:renum, dateAjout=NOW(), dateModif=NOW(), dateExpire=:dateExpire');

    $requete->bindValue(':titre',$jobs->titre());
    $requete->bindValue(':contenu',$jobs->contenu());
    $requete->bindValue(':lieu',$jobs->lieu());
    $requete->bindValue(':renum',$jobs->renum());
    $requete->bindValue(':dateExpire',$jobs->dateExpire());

    $requete->execute();
  }

  public function delete($id)
  {
    $this->dao->exec('DELETE FROM jobs WHERE id='.(int)$id);
  }

  public function modify(Job $jobs)
  {
    $requete=$this->dao->prepare('UPDATE jobs SET titre=:titre, contenu=:contenu, lieu=:lieu, renum=:renum, dateAjout=NOW(), dateModif=NOW(), dateExpire=:dateExpire WHERE id=:id');

    $requete->bindValue(':titre',$jobs->titre());
    $requete->bindValue(':contenu',$jobs->contenu());
    $requete->bindValue(':lieu',$jobs->lieu());
    $requete->bindValue(':renum',$jobs->renum());
    $requete->bindValue(':dateExpire',$jobs->dateExpire());
    $requete->bindValue(':id',$jobs->id(), \PDO::PARAM_INT);

    $requete->execute();
  }
}