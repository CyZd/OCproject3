<?php
namespace ocproject3;

class Page extends ApplicationComponent
{
    protected $contentFile, $variables=[];

    public function addVariables($var, $value)
    {
        if (!is_string($var) || empty($var))
        {
            throw new InvalidArgumentException('Variable name should be a non-empty string')
        }
        $this->variables[$var]=$value;
    }

    public function getGeneratedPage()
    {
        if (!file_exists($this->contentFile))
        {
            throw new RunTimeException('No such view available')
        }

        extract($this->variables);

        ob_start();
            require $this->contentFile;
            $content=ob_get_clean();

        ob_start();
            require __DIR__.'/../../App/'.$this->app->name().'/templates/layout.php';
        return ob_get_clean();
    }

    public function setContentFile($contentFile)
    {
        $this->contentFile=$contentFile;
    }
}
?>