<?php
namespace ocproject3;

abstract class Controller extends ApplicationComponent
{
    protected $action, $module, $page, $view, $model;

    public function __construct(GeneralApplication $app, $module, $action)
    {
        parent::__construct($app);

        $this->page=new Page($app);

        $this->setModule($module);
        $this->setAction($action);
        $this->setView($action);

        $this->model=new Model;
    }

    public function execute()
    {
        $method='exec'.ucfirst($this->action);

        if (is_callable($method))
        {
            $this->method($this->app->requestHTTP());
        }
    }

    public function page()
    {
        return $this->page;
    }

    public function setModule($module)
    {
        if (!is_string($module) || empty($module))
        {
            throw new \InvalidArgumentException('The module must be a valid string chain');
        }

        $this->module = $module;
    }

    public function setAction($action)
    {
        if (!is_string($action) || empty($action))
        {
            throw new \InvalidArgumentException('The action must be a valid string chain');
        }

        $this->action = $action;
    }

    public function setView($view)
    {
        if (!is_string($view) || empty($view))
        {
            throw new \InvalidArgumentException('The view must be a valid string chain');
        }

        $this->view = $view;

        $this->page->setContentFile(__DIR__.'/../../App/'.$this->app->name().'/modules/'.$this->module.'/views/'.$this->view.'.php');
    }
}
?>