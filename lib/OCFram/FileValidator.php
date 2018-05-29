<?php
namespace OCFram;

class FileValidator extends Validator
{
  protected $maxSize;
  
  public function __construct($errorMessage, $maxSize)
  {
    parent::__construct($errorMessage);
    
    $this->setMaxSize($maxSize);
  }
  
  public function isValid($value)
  {
    if ($_FILES['fichier']['size'] <= $this->maxSize)
    {
      return true;
    }
    else{
      return false;
    }
  }
  
  public function setMaxSize($maxSize)
  {
    $maxSize = (int) $maxSize;
    
    if ($maxSize > 0)
    {
      $this->maxSize = $maxSize;
    }
    else
    {
      throw new \RuntimeException('La taille maximum est indefinie.');
    }
  }
}