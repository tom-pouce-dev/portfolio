<?php

//on lance les sessions
session_start();

//on cree un connexion vers db
define('SQL_HOST','mysql2.web4all.fr'); 
define('SQL_USER','155827_antoine'); 
define('SQL_PASS','Tpqdldj77'); 
define('SQL_DBNAME','155827_fablab'); 

try{
	$mysql = new PDO('mysql:dbname='.SQL_DBNAME.';charset=utf8;host='.SQL_HOST,SQL_USER,SQL_PASS);

} catch(Exception $e){
	die('Erreur : ' . $e->getMessage());
}

//on inclu un fichier de fonctions
include('functions.php');


