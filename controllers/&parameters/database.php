<?php

/* @author; Poseidon */


$data = array
(
			'SQL_HOST' => 'localhost',
			'SQL_USER' => 'goudardq',
			'SQL_PASSWORD' => 'zoh4iew4yahj',
			'SQL_DB' => 'goudardq',
);

$PDO[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$bdd= new PDO('mysql:host='.$data['SQL_HOST'].';dbname='.$data['SQL_DB'], $data['SQL_USER'], $data['SQL_PASSWORD'], $PDO);
$bdd->exec("SET CHARACTER SET utf8");

$req = $bdd->prepare("SELECT * FROM napple_logs WHERE logsCost");
$req->execute();
$fi = 1;
while($resultats = $req->fetch(PDO::FETCH_OBJ)) 
	{ 
		$fi += $resultats->logsCost;
	}

$req = $bdd->query('SELECT * FROM accounts');
$accounts = $req->rowCount();
$accounts+=0;

$req = $bdd->query('SELECT * FROM players WHERE logged = 1');
$joueurs = $req->rowCount();
$joueurs+=0;

include('../../controllers/&functions/login.php');

?>