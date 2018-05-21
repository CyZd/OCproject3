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
        exit;
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