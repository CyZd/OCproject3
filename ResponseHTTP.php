<?php
namespace ocproject3;

class ResponseHTTP
{
    public $page;

    public function setPage(Page $page)
    {
        $this->page = $page;
    }

    public function sendPage(Page $page)
    {
        if (isset($this->page))
        {
            die($this->page->buildPage());
        }
    }

    public function redirect($location)
    {
        header('Location:'.$location);
        exit;
    }

    public function redirect404()
    {
        $this->page=new Page($this->app);
        $this->page->setContentFile(__DIR__.'/../../Errors/404.html');
        $this->setHeader('HTTP/1.0 404 Not found');

        $this->sendPage();
    }

    public function setCookie($name, $value, $expireTime, $path, $domain)
    {
        setcookie($name, $value, $expireTime, $path, $domaine, false, true);
    }

    public function setHeader($header)
    {
        header($header);
    }

}
?>