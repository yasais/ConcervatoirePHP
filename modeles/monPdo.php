<?php
class MonPdo
{

private static $serveur='mysql:host=localhost';
private static $bdd='dbname=conservatoireefrei'; //khjhmdup_conservatoire conservatoireefrei
private static $user='root' ;  //khjhmdup_yasmine  root
private static $mdp='' ;    //Qwr4HYJ5nqePhF ''
private static $monPdo;
private static $unPdo = null;

//	Constructeur privé, crée l'instance de PDO qui sera sollicitée
//	pour toutes les méthodes de la classe
private function __construct()
{
    MonPdo::$unPdo = new PDO(MonPdo::$serveur.';'.MonPdo::$bdd, MonPdo::$user, MonPdo::$mdp);
    MonPdo::$unPdo->query("SET CHARACTER SET utf8");
    MonPdo::$unPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
public function __destruct()
{ 
    MonPdo::$unPdo = null;
}
/**
*	Fonction statique qui cree l'unique instance de la classe
* Appel : $instanceMonPdo = MonPdo::getMonPdo();
*	@return */
public static function getInstance()
{
    if(self::$unPdo == null)
    {
        self::$monPdo= new MonPdo();
    }
    return self::$unPdo;
}



}
?>
