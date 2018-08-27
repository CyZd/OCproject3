<?php
namespace OCFram;
use \OCFram\BackController;
use \OCFram\HTTPRequest;

class PDOFactory
{
  public $host,$dbname,$dbRootName,$dbPassName;

  public static function getMysqlConnexion()
  {
    $dbvars=[];
    $xml = new \DOMDocument;
    $xml->load(dirname(dirname(__DIR__)).'\\config'.'\\dbconfig.xml');
    $dbvars=[];
    $elements = $xml->getElementsByTagName('define');
    foreach ($elements as $element)
      {
        $dbvars[$element->getAttribute('var')] = $element->getAttribute('value');
      }
    $host='localhost';
    $dbname='test';
    $dbRootName=$dbvars['rootname'];
    $dbPassName=$dbvars['password'];

    //$db = new \PDO('mysql:host=localhost;dbname=test;charset=UTF8', 'root', 'CorrectBatteryHorse84*');
    $db = new \PDO(sprintf('mysql:host=%s;dbname=%s;charset=UTF8',$host,$dbname), $dbRootName, $dbPassName);
    $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    
    return $db;
  }
}