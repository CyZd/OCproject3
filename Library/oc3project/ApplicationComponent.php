<?php
namespace ocproject3;

abstract class ApplicationComponent
{
    protected $currentApp;

    public function __construct(GeneralApplication $app)
    {
        $this->currentApp=$app;
    }

    public function currentApp()
    {
        return $this->currentApp;
    }
}
?>