<?php
namespace ocproject3;

class AuthorPost
{
    protected $postId, $postTitle, $creationDate, $modifDate, $content, $chapterNumber, $errors=[];

    const TITRE_INVALIDE=1;
    const CONTENU_INVALIDE=2;
    const CHAPITRE_INVALIDE=3;

    public function __construct(array $postDatas)
    {
        $this->hydrate($postDatas);
    }


    public function hydrate(array $postDatas)
    {
        foreach ($postDatas as $key=>$value)
        {
            $method='set'.ucfirst($key);
            if (method_exists($this,$method))
            {
                $this->$method($value);
            }
        }
    }

//setters
    public function setPostId($int)
    {
        $int=(int)$int;
        if (isset($int))
        {
            $this->postId=$int;
        }
    }

    public function setPostTitle($string)
    {
        if(isset($string))
        {
            $this->postTitle=$string;
        }
    }

    public function setCreationDate(Datetime $creationDate)
    {
        if(isset($creationDate))
        {
            $this->creationDate=$creationDate;
        }
    }

    public function setModifDate(Datetime $modifDate)
    {
        if(isset($modifDate))
        {
            $this->modifDate=$modifDate;
        }
    }

    public function setContent($string)
    {
        if(isset($string))
        {
            $this->content=$string;
        }
    }

    public function setChapterNumber($int)
    {
        $int=(int)$int;
        if (isset($int))
        {
            $this->chapterNumber=$int;
        }
    }


//getters
    public function getPostId()
    {
        return $this->postId;
    }

    public function getPostTitle()
    {
        return $this->postTitle;
    }

    public function getCreationDate()
    {
        return $this->creationDate;
    }

    public function getModifDate()
    {
        return $this->modifDate;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getChapterNumber()
    {
        return $this->chapterNumber;
    }
}
?>