<?php
namespace ocproject3;

abstract class Entity
{
    protected $errors=[], $id;

    public function __construct(array $datas=[])
    {
        $this->hydrate($datas);
    }

    public function hydrate($datas)
    {
        foreach ($datas as $key=>$value)
        {
            $method='set'.ucfirst($key);

            if (is_callable($method))
            {
                $this->$method($value);
            }
        } 
    }

    public function isNew($id)
    {
        return empty($this->id);
    }

    public function errors()
    {
        return $this->errors;
    }

    public function id()
    {
        return $this->id;
    }

    public function setId()
    {
        $this->id=$id;
    }


}

?>