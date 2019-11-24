<?php
/**
 * Model.php
 * Connection with db
 * Author : El behedy Ramy
 */

class Model
{

    private $database;
    private static $instance = null; 

    private function __construct()
    {
        try {
            //remplace your logs in this file 
            require 'logs.conf.inc.php';
            $this->database = new PDO($dsn, $login, $mdp);
            $this->database->query("SET NAMES 'utf8'");
            $this->database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('<p> La connexion a échoué. Erreur[' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
    }

    public static function getModel()
    {

        
        if (self::$instance == null) {
            self::$instance = new Model(); 
            return self::$instance;

        }
    }
    
    public function prepare($reqSQL)
    {
        return $this->database->prepare($reqSQL);
    }
}