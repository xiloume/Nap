<?php

if (isset($_POST['user']) AND isset($_POST['pass']))
	{
		$pass_hache = $_POST['pass'];
		$pseudo = $_POST['user'];
		$pass_norm = hash('sha512',md5($pass_hache));
		$req = $bdd->prepare('SELECT * FROM accounts WHERE account = :pseudo AND pass = :pass');
		$req->execute(array('pseudo' => $pseudo,'pass' => $pass_norm));
		$resultat = $req->fetch();
		if (!$resultat)
			{
				$erreur = '<div class="alert alert-danger">Incorrect identifier</div>';
			}
		else
			{
				header('Location: ../../show/account/index.php'); 
				$_SESSION['id'] = $resultat['guid'];
				$_SESSION['account'] = $resultat['account'];
				$_SESSION['pseudo'] = $resultat['pseudo'];
				$_SESSION['email'] = $resultat['email'];
				$_SESSION['question'] = $resultat['question'];
				$_SESSION['reponse'] = $resultat['reponse'];
				$_SESSION['points'] = $resultat['points'];
				$_SESSION['level'] = $resultat['level'];
				$_SESSION['achatsStarpass'] = $resultat['achatsStarpass'];
				$_SESSION['achatsPaypal'] = $resultat['achatsPaypal'];
				$_SESSION['adminWEB'] = $resultat['adminWEB'];
			}
	}

if (isset($_SESSION['id']))
	{
		$id = $_SESSION['id'];
		$req = $bdd->prepare('SELECT * FROM accounts WHERE guid = :id');
		$req->execute(array(
			'id' => $id));

		$resultat = $req->fetch();

		if (!$resultat)
			{
				$erreur = '<div class="alert alert-danger">incorrect identifier</div>';
			}
		else
			{
				$_SESSION['id'] = $resultat['guid'];
				$_SESSION['account'] = $resultat['account'];
				$_SESSION['pseudo'] = $resultat['pseudo'];
				$_SESSION['email'] = $resultat['email'];
				$_SESSION['question'] = $resultat['question'];
				$_SESSION['reponse'] = $resultat['reponse'];
				$_SESSION['points'] = $resultat['points'];
				$_SESSION['level'] = $resultat['level'];
				$_SESSION['achatsStarpass'] = $resultat['achatsStarpass'];
				$_SESSION['achatsPaypal'] = $resultat['achatsPaypal'];
				$_SESSION['adminWEB'] = $resultat['adminWEB'];
			}
	}
	
if (isset($_GET['deco']))
	{
		session_destroy();
		header('Location: ../../show/home/');     
	}

	
?>