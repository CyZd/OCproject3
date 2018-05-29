<?php
namespace Entity;

use \OCFram\Entity;
use DateTime;

class Job extends Entity
{
  protected $auteur,
            $titre,
            $contenu,
            $lieu,
            $renum,
            $dateAjout,
            $dateModif,
            $dateExpire;

  const AUTEUR_INVALIDE = 1;
  const TITRE_INVALIDE = 2;
  const CONTENU_INVALIDE = 3;
  const LIEU_INVALIDE = 4;
  const RENUMERATION_INVALIDE = 5;

  public function isValid()
  {
    return !(empty($this->auteur) || empty($this->titre) || empty($this->contenu) || empty($this->lieu) || empty($this->renum));
  }


  // SETTERS //

  public function setAuteur($auteur)
  {
    if (!is_string($auteur) || empty($auteur))
    {
      $this->erreurs[] = self::AUTEUR_INVALIDE;
    }

    $this->auteur = $auteur;
  }

  public function setTitre($titre)
  {
    if (!is_string($titre) || empty($titre))
    {
      $this->erreurs[] = self::TITRE_INVALIDE;
    }

    $this->titre = $titre;
  }

  public function setContenu($contenu)
  {
    if (!is_string($contenu) || empty($contenu))
    {
      $this->erreurs[] = self::CONTENU_INVALIDE;
    }

    $this->contenu = $contenu;
  }

  public function setLieu($lieu)
  {
    if (!is_string($lieu) || empty($lieu))
    {
      $this->erreurs[] = self::LIEU_INVALIDE;
    }

    $this->lieu = $lieu;
  }

  public function setRenum($renum)
  {
    if (!is_int($renum) || empty($renum))
    {
      $this->erreurs[] = self::RENUMERATION_INVALIDE;
    }

    $this->renum = $renum;
  }

  public function setDateAjout(\DateTime $dateAjout)
  {
    $this->dateAjout = $dateAjout;
  }

  public function setDateModif(\DateTime $dateModif)
  {
    $this->dateModif = $dateModif;
  }

  public function setDateExpire($dateExpire)
  {
    $this->dateExpire = $dateExpire;
  }

  // GETTERS //

  public function auteur()
  {
    return $this->auteur;
  }

  public function titre()
  {
    return $this->titre;
  }

  public function contenu()
  {
    return $this->contenu;
  }

  public function lieu()
  {
    return $this->lieu;
  }

  public function renum()
  {
    return $this->renum;
  }

  public function dateAjout()
  {
    return $this->dateAjout;
  }

  public function dateModif()
  {
    return $this->dateModif;
  }

  public function dateExpire()
  {
    return $this->dateExpire;
  }
}