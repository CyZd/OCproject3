<?php
namespace OCFram;

class ImageField extends Field
{
  
  public function buildWidget()
  {
    $widget = '';
    
    if (!empty($this->errorMessage))
    {
      $widget .= $this->errorMessage.'<br />';
    }
    
    $widget .= '<label>'.$this->label.'</label><input type="file" accept=".jpg, .jpeg, .png"name="'.$this->name.'"';
    
    if (!empty($this->value))
    {
      $widget .= ' value="'.$this->value.'"';
    }
    
    if (!empty($this->maxLength))
    {
      $widget .= ' maxlength="'.$this->maxLength.'"';
    }
    
    return $widget .= ' />';
  }
  

}