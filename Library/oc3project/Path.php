<?php
namespace ocproject3;

class Path
{
    protected $action, $module, $url, $pathVars=[], $pathVarsArray=[];

    public function __construct($url, $module, $action, $pathVars)
    {
        $this->action=$action;
        $this->module=$module;
        $this->url=$url;
        $this->pathVars=$pathVars;
    }

    public function isMatch($url)
    {
        if(preg_match('`^'.$this->url.'$`', $url, $result))
        {
            return $result;
        }
        else
        {
            return false;
        }
    }

    public function setPathVars($values)
    {
        $this->pathVars=$values;
    }

    public function setPathVarsArray($values)
    {
        $this->pathVarsArray=$values;
    }

    public function action()
    {
        return $this->action;
    }

    public function module()
    {
        return $this->module;
    }

    public function pathVars()
    {
        return $this->pathVars;
    }

    public function pathVarsArray()
    {
        return $this->pathVarsArray;
    }


}
?>