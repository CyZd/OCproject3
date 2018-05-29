<?php
namespace OCFram;
use DateTime;

class IsADateValidator extends Validator
{
  public function isValid($value)
  {
    return (DateTime::createFromFormat('Y-m-d',$value));
  }
}