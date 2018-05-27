<?php
namespace ocproject3;

session_start();

class User
{
    public function getAttribute($attrib)
    {
        return isset($_SESSION[$attrib])? $_SESSION[$attrib] : null;
    }

    public function setAttribute($attrib, $value)
    {
        $_SESSION[$attrib]=$value;
    }

    public function getFlashMessage()
    {
        $flashMessage= $_SESSION['flash'];
        unset($_SESSION['flash']);

        return $flashMessage;
    }

    public function hasFlash()
    {
        return isset($_SESSION['flash']);
    }

    public function isAuthenticated()
    {
        return isset($_SESSION['auth'])&& $_SESSION['aut']===true;
    }

    public function setAuthenticated($authenticated = true)
    {
        if (!is_bool($authenticated))
        {
            throw new \InvalidArgumentException('The value in method User::setAuthenticated() must be a boolean');
        }

        $_SESSION['auth'] = $authenticated;
    }

    public function setFlashMessage($value)
    {
        $_SESSION['flash'] = $value;
    }
}
?>