<?php
namespace ocproject3;

class RequestHTTP
{
    public function getIsset($value)
    {
        return isset($_GET[$value]);
    } 

    public function getData($value)
    {
        return $_GET[$value];
    }

    public function postIsset($value)
    {
        return isset($_POST[$value]);
    }

    public function postData($value)
    {
        return $_POST[$value];
    }

    public function cookieIsset($value)
    {
        return isset($_COOKIE[$value]);
    }

    public function cookieData($value)
    {
        return $_COOKIE[$value];
    }

    public function requestMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }    

    public function requestOrigin()
    {
        return $_SERVER['REQUEST_URI'];
    }
}
?>