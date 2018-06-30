<?php
namespace OCFram;

use \OCFram\HTTPRequest;

class Uploader
{
    public function uploadFile()
    {
        if (!empty($_FILES))
        {
            $fileName=rand().$_FILES['imgPath']['name'];
            //$destination=__DIR__.'\..\..\Web\Uploaded\\'.$fileName;
            $destination=dirname(dirname(__DIR__)).DIRECTORY_SEPARATOR.'Web'.DIRECTORY_SEPARATOR.'Uploaded'.DIRECTORY_SEPARATOR.$fileName;
            move_uploaded_file($_FILES['imgPath']['tmp_name'],$destination);


            return (DIRECTORY_SEPARATOR.'Uploaded'.DIRECTORY_SEPARATOR.$fileName);
        }
    }


}
?>