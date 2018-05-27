<?php
namespace ocproject3;

use \ocprojet3\GeneralApplication;

class FrontendApplication extends GeneralApplication
{
    public function __construct()
    {
        parent::__construct();

        $this->name='Frontend';
    }

    public function run()
    {
        $controller=$this->selectController();
        $controller->execute();
        $this->ResponseHTTP->setPage($controller->page());
        $this->ResponseHTTP->sendPage();
    }
}
?>