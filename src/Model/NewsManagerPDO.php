<?php
namespace Model;

use \Entity\News;

class NewsManagerPDO extends NewsManager
{
  protected function add(News $news)
  {
    $requete = $this->dao->prepare('INSERT INTO news SET auteur = :auteur, titre = :titre, chapitre = :chapitre, contenu = :contenu, imgPath = :imgPath, dateAjout = NOW(), dateModif = NOW()');
    
    $requete->bindValue(':titre', $news->titre());
    $requete->bindValue(':auteur', $news->auteur());
    $requete->bindValue(':contenu', $news->contenu());
    $requete->bindValue(':chapitre', $news->chapitre());
    $requete->bindValue(':imgPath', $news->imgPath());
    $requete->execute();
  }

  public function count()
  {
    return $this->dao->query('SELECT COUNT(*) FROM news')->fetchColumn();
  }

  public function delete($id)
  {
    $this->dao->exec('DELETE FROM news WHERE id = '.(int) $id);
  }

  public function getList($debut = -1, $limite = -1)
  {
    $sql = 'SELECT id, auteur, titre, contenu, chapitre, dateAjout, dateModif, imgPath FROM news ORDER BY id DESC';
    
    if ($debut != -1 || $limite != -1)
    {
      $sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
    }
    
    $requete = $this->dao->query($sql);
    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\News');
    
    $listeNews = $requete->fetchAll();
    
    foreach ($listeNews as $news)
    {
      $news->setDateAjout(new \DateTime($news->dateAjout()));
      $news->setDateModif(new \DateTime($news->dateModif()));
    }
    
    $requete->closeCursor();
    
    return $listeNews;
  }
  
  public function getUnique($id)
  {
    $requete = $this->dao->prepare('SELECT id, auteur, titre, chapitre, contenu, dateAjout, dateModif, imgPath FROM news WHERE id = :id');
    $requete->bindValue(':id', (int) $id, \PDO::PARAM_INT);
    $requete->execute();
    
    //$requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, DIRECTORY_SEPARATOR.'Entity'.DIRECTORY_SEPARATOR.'News');
    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\News');
    
    if ($news = $requete->fetch())
    {
      $news->setDateAjout(new \DateTime($news->dateAjout()));
      $news->setDateModif(new \DateTime($news->dateModif()));
      
      return $news;
    }
    
    return null;
  }

  protected function modify(News $news)
  {
    $requete = $this->dao->prepare('UPDATE news SET auteur = :auteur, titre = :titre, chapitre=:chapitre,contenu = :contenu, imgPath = :imgPath, dateModif = NOW() WHERE id = :id');
    
    $requete->bindValue(':titre', $news->titre());
    $requete->bindValue(':auteur', $news->auteur());
    $requete->bindValue(':chapitre', $news->chapitre());
    $requete->bindValue(':contenu', $news->contenu());
    $requete->bindValue(':imgPath', $news->imgPath());
    $requete->bindValue(':id', $news->id(), \PDO::PARAM_INT);
    
    $requete->execute();
  }

  public function deleteFile($id)
  {
    $preRequest= $this->dao->prepare('SELECT imgPath FROM news WHERE id='.(int) $id);
    $preRequest->execute();
    $checkImage=$preRequest->fetch();

    if ($checkImage==null)
    {
      throw New \RunTimeException('No file found to erase');
    }
    else
    {
      $imageDir=dirname(dirname(__DIR__)).DIRECTORY_SEPARATOR.'Web'.DIRECTORY_SEPARATOR.'Uploaded'.DIRECTORY_SEPARATOR;
      $fileName=basename($checkImage[0]);
      $accessDir=opendir($imageDir);
      $toErase=(string)$imageDir.(string)$fileName;
      unlink($toErase);
      closedir($accessDir);

      $requete = $this->dao->prepare('UPDATE news SET imgPath = :imgPath WHERE id ='.(int) $id);
      $requete->bindValue(':imgPath',null);
      $requete->execute();
    }

  }


}