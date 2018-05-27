<?php
namespace ocproject3;

abstract class Model
{
    protected $database, $presentModels=[];

    public function __construct($database)
    {
        $this->database=$database;
    }

    public function getModelOf($module)
    {
        if(empty($module))
        {
            throw new InvalidArgumentException('Invalid module')
        }

        if (!isset($this->presentModels[$module]))
        {
            $model='\\Model'.$module.'Model';
        }

        $this->presentModels[$module]= new $model($this->database);
    }

    return $this->model[$module];
}
?>