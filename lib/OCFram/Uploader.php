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
            $destination=dirname(dirname(__DIR__)).'\Uploaded\\'.$fileName;
            move_uploaded_file($_FILES['imgPath']['tmp_name'],$destination);

            return $destination;
        }
    }


}
?>