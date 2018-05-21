<?php
namespace ocproject3;

abstract class GeneralApplication
{
    protected $requestHTTP, $responseHTTP, $name;

    public function __construct()
    {
        $this->requestHTTP=new RequestHTTP;
        $this->responseHTTP=new ResponseHTTP;
        $this->name='';
    }

    abstract public function run();

    public function requestHTTP()
    {
        return $this->requestHTTP;
    }

    public function responseHTTP()
    {
        return $this->responseHTTP;
    }

    public function name()
    {
        return $this->name;
    }

}
?>