<?php
$imageOrigin=array("http://localhost", "http://192.168.1.1");
$imagePath=__DIR__.'/../../../Uploaded/';

$imageToCheck=$_FILES;

if(isset($imageToCheck) && in_array($_SERVER['HTTP_ORIGIN'],$imageOrigin))
{
    if (preg_match("/([^\w\s\d\-_~,;:\[\]\(\).])|([\.]{2,})/", $imageToCheck['name'])) 
    {
        header("Nom de fichier invalide.");
        return;
    }

    
    $targetPath=time().$imageToCheck['name'];

    move_uploaded_file($imageToCheck, $imagePath.$targetPath);

    echo json_encode(array('location'=>$imagePath.$targetPath));
}
else
{
    header("HTP/1.1 500 server error");
}
?>