<?php

/**
 * functions.inc.php
 * This page regroup all the functions in connection with databse
 * Author : El behedy Ramy
 */
 
//Unique connection with Database
require_once 'Model.php';
$database = Model::getModel(); 

/* EXAMPLES FUNCTIONS */

function selectTable($reqSQL)
{
    global $database;
    try {
        $req = $database->prepare($reqSQL);
        //$requete->bindValue(':name', '$name');
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    } catch (PDOException $e) {
        die('<p> Erreur[' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
    }
}