<?php
namespace OCFram;

class Config extends ApplicationComponent
{
  protected $vars = [];

  public function get($var)
  {
    if (!$this->vars)
    {
      $xml = new \DOMDocument;
      $xml->load(dirname(dirname(__DIR__)).DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'App'.DIRECTORY_SEPARATOR.$this->app->name().DIRECTORY_SEPARATOR.'Config'.DIRECTORY_SEPARATOR.'app.xml');

      $elements = $xml->getElementsByTagName('define');

      foreach ($elements as $element)
      {
        $this->vars[$element->getAttribute('var')] = $element->getAttribute('value');
      }
    }

    if (isset($this->vars[$var]))
    {
      return $this->vars[$var];
    }

    return null;
  }

  public function set($var, $newvalue)
  {
      $newvalue=password_hash($newvalue, PASSWORD_DEFAULT);

      $xml = new \DOMDocument;
      $xml->load(dirname(dirname(__DIR__)).DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'App'.DIRECTORY_SEPARATOR.$this->app->name().DIRECTORY_SEPARATOR.'Config'.DIRECTORY_SEPARATOR.'app.xml');

      $elements = $xml->getElementsByTagName('define');

      $elements->item(1)->nodeValue="";
      $elements->item(1)->appendChild($xml->createTextNode($newvalue));

  }
}