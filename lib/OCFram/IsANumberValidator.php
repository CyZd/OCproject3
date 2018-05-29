<?php
namespace OCFram;

class IsANumberValidator extends Validator
{
  public function isValid($value)
  {
    $int=(int)$value;
    $float=(float)$value;
    if (is_float($float)|| is_int($int))
    {
        return true;
    }
    else{
        return false;
    }
  }
}