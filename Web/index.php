<?php

require __DIR__. '/../vendor/autoload.php';


const DEFAULT_APP = 'Backend';

// Si l'application n'est pas valide, on va charger l'application par défaut qui se chargera de générer une erreur 404
if (!isset($_GET['app']) || !file_exists(__DIR__.'/../src/App/'.$_GET['app'])) $_GET['app'] = DEFAULT_APP;


// Il ne nous suffit plus qu'à déduire le nom de la classe et de l'instancier
$appClass = 'App\\'.$_GET['app'].'\\'.$_GET['app'].'Application';

$app = new $appClass;
$app->run();