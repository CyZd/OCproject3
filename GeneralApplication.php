<?php
namespace ocproject3;

abstract class GeneralApplication
{
    protected $requestHTTP, $responseHTTP, $name;

    public function __construct()
    {
        $this->requestHTTP=new RequestHTTP;
        $this->responseHTTP=new ResponseHTTP;
        $this->name='';
    }

    abstract public function run();

    public function requestHTTP()
    {
        return $this->requestHTTP;
    }

    public function responseHTTP()
    {
        return $this->responseHTTP;
    }

    public function name()
    {
        return $this->name;
    }

    public function selectController()
    {
        $pathfinder= new Pathfinder;

        $xml=new DOMDocument;
        $xml->load(__DIR__.'/../../App'.$this->name.'/config/paths.xml');

        $path=$xml->getElementsByTagName('path');

        foreach ($path as $value)
        {
            $variables=[];

            if ($value->hasAttribute('vars'))
            {
                $variables=explode(',',$value->getAttribute('vars'));
            }

            $pathfinder->addPath(new Path($value->getAttribute('url'),$value->getAttribute('module'),$value->getAttribute('action'),$value->getAttribute('vars')));
        }
        try
        {
            $pathFound=$pathfinder->getPath($this->requestHTTP->requestOrigin());
        }
        catch(RuntimeException $error)
        {
            if ($error->getCode()==Pathfinder::NO_PATH_FOUND)
            {
                $this->responseHTTP->redirect404();
            }
        }

        //ajout des vars dans le tableau de $_GET (???)
        $_GET=array_merge($_GET, $pathFound->pathVarsArray());

        $selectedController='Application\\'.$this->name.'\\Modules\\'.$pathFound->module().'\\'.$pathFound->module().'Controller';
        return new $selectedController($this, $pathFound->module(), $pathFound->action());
    }

}
?>