<?php
namespace ocproject3;

class Config extends ApplicationComponent
{
    protected $variables=[];

    public function get($var)
    {
        if(!$this->vars)
        {
            $xml=new DOMdocument;
            $xml->load(__DIR__.'/../../Application/'.$this->currentApp->name().'/Config/config.xml');

            $elements=$xml->getElementsByTagName('config');

            foreach($elements as $elem)
            {
                $this->variables[$elem->getAttribute('var')]=$elem->getAttribute('value');
            }

        }
        if (isset($this->variables[$var]))
        {
            return $this->variables[$var];
        }

        return null;
    }
}

?>