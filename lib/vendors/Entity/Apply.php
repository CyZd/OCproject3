<?php
namespace Entity;

use \OCFram\Entity;

class Apply extends Entity
{
  protected $job,
            $candidat,
            $numero,
            $fichier,
            $date;

  const CANDIDAT_INVALIDE = 1;
  const NUMERO_INVALIDE = 2;
  const FICHIER_INVALIDE = 3;

  public function isValid()
  {
    return !(empty($this->candidat) || empty($this->numero));
  }

  public function setJob($job)
  {
    $this->job = (int) $job;
  }

  public function setCandidat($candidat)
  {
    if (!is_string($candidat) || empty($candidat))
    {
      $this->erreurs[] = self::CANDIDAT_INVALIDE;
    }

    $this->candidat = $candidat;
  }

  public function setNumero($numero)
  {
    if (is_string($numero) || empty($candidat))
    {
      $this->erreurs[] = self::NUMERO_INVALIDE;
    }

    $this->numero = $numero;
  }

  public function setFichier($fichier)
  {
    if (empty($fichier))
    {
      $this->erreurs[] = self::FICHIER_INVALIDE;
    }

    $this->fichier = $fichier;
  }

  public function setDate(\DateTime $date)
  {
    $this->date = $date;
  }

  public function job()
  {
    return $this->job;
  }

  public function candidat()
  {
    return $this->candidat;
  }

  public function numero()
  {
    return $this->numero;
  }

  public function fichier()
  {
    return $this->fichier;
  }

  public function date()
  {
    return $this->date;
  }
}