<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Login DamsProt</title>
	<link rel="stylesheet" href="../Style/Style.css" />
</head>

<body>
	<?php include('Include/header.php');?>
	<?php include('Include/menu.php');?>
	<?php 
	$utilisateur = "courtoisa";
	$motDePasse = "aeWuughu4hai";
	?>
	<br>
	<div class="blocLogin">
		<div class="Enregistrement">
			<form method="POST" action="Login.php">
				<label for="Nom">Nom :</label> <input type="text"  name="Nom" id="Nom" value=""/><br />
				<label for="Prenom">Prenom :</label> <input type="text"  name="Prenom" id="Prenom" value=""/><br />
				<label for="Mail">Mail :</label> <input type="email"  name="Mail" id="Mail" value=""/><br />
				<label for="Telephone">Telephone :</label> <input type="tel"  name="Telephone" id="Telephone" value=""/><br />
				<label for="Identifiant">Identifiant :</label> <input type="text"  name="Identifiant" id="Identifiant" value=""/><br />
				<label for="Motdepasse">Motdepasse :</label> <input type="text"  name="Motdepasse" id="Motdepasse" value=""/><br />
				<label for="Ville">Ville :</label> <input type="text"  name="Ville" id="Ville" value=""/><br />
				<label for="CodePostal">CodePostal :</label> <input type="text"  name="CodePostal" id="CodePostal" value=""/><br />
				<label for="Adresse">Adresse :</label> <input type="text"  name="Adresse" id="Adresse" value=""/><br />
				<label for="Complementadresse">Complement d\'adresse :</label> <input type="text"  name="Complementadresse" id="Complementadresse" value=""/><br />
				<label for="InfoEntreprise">InfoEntreprise</label> <input type="text"  name="InfoEntreprise" id="InfoEntreprise" value=""/><br />
				<label for="Habilition">Habilitation</label> <input type="text"  name="Habilition" id="Habilition" value=""/><br />
				<input type="submit" name="Envoyer" value="Envoyer" />
			</form>
			<?php
				if(isset($_POST['Envoyer'] )){
				$erreur = NULL;
				$i = 0;
				$temps = time(); 

				//------- Debut des parametres Nom -----------
				 $erreur_Nom = NULL;
				 if ($_POST['Nom'] == NULL)
				{ $erreur_Nom = "Vous n'avez pas remplie le champs Nom";
				$i++;
				    }
				if(strlen($_POST['Nom']) > 25)
				{ $erreur_Nom = "Le champs Nom est trop long";
				$i++;
				}
				  if (strlen($_POST['Nom']) < 3)
				{ $erreur_Nom= "Le champs Nom est trop court";
				$i++;
				}
				//------- Fin des parametres Nom -----------

				//------- Debut des parametres Prenom -----------
				 $erreur_Prenom = NULL;
				 if ($_POST['Prenom'] == NULL)
				{ $erreur_Prenom = "Vous n'avez pas remplie le champs Prenom";
				$i++;
				    }
				if(strlen($_POST['Prenom']) > 25)
				{ $erreur_Prenom = "Le champs Prenom est trop long";
				$i++;
				}
				  if (strlen($_POST['Prenom']) < 3)
				{ $erreur_Prenom= "Le champs Prenom est trop court";
				$i++;
				}
				//------- Fin des parametres Prenom -----------

				//------- Debut des parametres Mail -----------
				 $erreur_Mail = NULL;
				 if ($_POST['Mail'] == NULL)
				{ $erreur_Mail = "Vous n'avez pas remplie le champs Mail";
				$i++;
				    }
				if (strlen($_POST['Mail']) > 25)
				{ $erreur_Mail= "Le champs Mail est trop long";
				$i++;
				}
				  if (strlen($_POST['Mail']) < 3)
				{ $erreur_Mail = "Le champs Mail est trop court";
				$i++;
				}
				 if(!preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['Mail']))
				{ $erreur_Mail = "Mauvais format du champ Mail";
				$i++;
				    }
				//------- Fin des parametres Mail -----------

				//------- Debut des parametres Telephone -----------
				 $erreur_Telephone = NULL;
				 if ($_POST['Telephone'] == NULL)
				{ $erreur_Telephone = "Vous n'avez pas remplie le champs Telephone";
				$i++;
				    }
				if(strlen($_POST['Telephone']) > 100)
				{ $erreur_Telephone = "Le champs Telephone est trop long";
				$i++;
				}
				  if (strlen($_POST['Telephone']) < 3)
				{ $erreur_Telephone = "Le champs Telephone est trop court";
				$i++;
				}
				 if(!preg_match('`[0-9]{10}`', $_POST['Telephone']))
				{ $erreur_Telephone = "Mauvais format du champ Telephone";
				$i++;
				    }
				//------- Fin des parametres Telephone -----------

				//------- Debut des parametres Identifiant -----------
				 $erreur_Identifiant = NULL;
				 if ($_POST['Identifiant'] == NULL)
				{ $erreur_Identifiant = "Vous n'avez pas remplie le champs Identifiant";
				$i++;
				    }
				if(strlen($_POST['Identifiant']) > 50)
				{ $erreur_Identifiant = "Le champs Identifiant est trop long";
				$i++;
				}
				  if (strlen($_POST['Identifiant']) < 3)
				{ $erreur_Identifiant= "Le champs Identifiant est trop court";
				$i++;
				}
				//------- Fin des parametres Identifiant -----------

				//------- Debut des parametres Motdepasse -----------
				 $erreurMotDePasse = NULL;
				 if ($_POST['Motdepasse'] == NULL)
				{ $erreurMotDePasse = "Vous n'avez pas remplie le champs Motdepasse";
				$i++;
				    }
				if(strlen($_POST['Motdepasse']) > 10)
				{ $erreurMotDePasse = "Le champs Motdepasse est trop long";
				$i++;
				}
				  if (strlen($_POST['Motdepasse']) < 3)
				{ $erreurMotDePasse= "Le champs Motdepasse est trop court";
				$i++;
				}
				//------- Fin des parametres Motdepasse -----------

				//------- Debut des parametres Ville -----------
				 $erreur_Ville = NULL;
				 if ($_POST['Ville'] == NULL)
				{ $erreur_Ville = "Vous n'avez pas remplie le champs Ville";
				$i++;
				    }
				if(strlen($_POST['Ville']) > 250)
				{ $erreur_Ville = "Le champs Ville est trop long";
				$i++;
				}
				  if (strlen($_POST['Ville']) < 3)
				{ $erreur_Ville= "Le champs Ville est trop court";
				$i++;
				}
				//------- Fin des parametres Ville -----------

				//------- Debut des parametres CodePostal -----------
				 $erreurCodePostal = NULL;
				 if ($_POST['CodePostal'] == NULL)
				{ $erreurCodePostal = "Vous n'avez pas remplie le champs CodePostal";
				$i++;
				    }
				if(strlen($_POST['CodePostal']) > 5)
				{ $erreurCodePostal = "Le champs CodePostal est trop long";
				$i++;
				}
				  if (strlen($_POST['CodePostal']) < 3)
				{ $erreurCodePostal= "Le champs CodePostal est trop court";
				$i++;
				}
				//------- Fin des parametres CodePostal -----------

				//------- Debut des parametres Adresse -----------
				 $erreur_Adresse = NULL;
				 if ($_POST['Adresse'] == NULL)
				{ $erreur_Adresse = "Vous n'avez pas remplie le champs Adresse";
				$i++;
				    }
				if(strlen($_POST['Adresse']) > 38)
				{ $erreur_Adresse = "Le champs Adresse est trop long";
				$i++;
				}
				  if (strlen($_POST['Adresse']) < 3)
				{ $erreur_Adresse= "Le champs Adresse est trop court";
				$i++;
				}
				//------- Fin des parametres Adresse -----------

				//------- Debut des parametres Habilition -----------
				 $erreur_Habilition = NULL;
				 if ($_POST['Habilition'] == NULL)
				{ $erreur_Habilition = "Vous n'avez pas remplie le champs Habilition";
				$i++;
				    }
				if(strlen($_POST['Habilition']) > 38)
				{ $erreur_Habilition = "Le champs Habilition est trop long";
				$i++;
				}
				  if (strlen($_POST['Habilition']) < 3)
				{ $erreur_Habilition= "Le champs Habilition est trop court";
				$i++;
				}
				//------- Fin des parametres Habilition -----------
				if($i > 0){
				echo '<script type="text/javascript">window.alert("'.$erreur_Nom."\\n".$erreur_Prenom."\\n".$erreur_Mail."\\n".$erreur_Telephone."\\n".$erreur_Identifiant."\\n".$erreurMotDePasse."\\n".$erreur_Ville."\\n".$erreurCodePostal."\\n".$erreur_Adresse."\\n".$erreur_Habilition."\\n".'")</script>';

				} else {
					try { 
					$db = new PDO('mysql:host=localhost;dbname=courtoisa', $utilisateur, $motDePasse);
					}
					catch (Exception $e) {  
						die('Erreur : ' . $e->getMessage()); 
					} 
					$query=$db->prepare('INSERT INTO ds_utilisateur (
					nom, prenom, mail, telephone, identifiant, mdp, ville, codePostal, adresse, complement_adr, info_entreprise, habilitation
					) VALUES (:Nom, :Prenom, :Mail, :Telephone, :Identifiant, :Motdepasse, :Ville, :CodePostal, :Adresse, :Complementadresse, :InfoEntreprise, :Habilition)');
					$query->bindValue(':Nom', $_POST['Nom'], PDO::PARAM_STR);
					$query->bindValue(':Prenom', $_POST['Prenom'], PDO::PARAM_STR);
					$query->bindValue(':Mail', $_POST['Mail'], PDO::PARAM_STR);
					$query->bindValue(':Telephone', $_POST['Telephone'], PDO::PARAM_STR);
					$query->bindValue(':Identifiant', $_POST['Identifiant'], PDO::PARAM_STR);
					$query->bindValue(':Motdepasse', $_POST['Motdepasse'], PDO::PARAM_STR);
					$query->bindValue(':Ville', $_POST['Ville'], PDO::PARAM_STR);
					$query->bindValue(':CodePostal', $_POST['CodePostal'], PDO::PARAM_STR);
					$query->bindValue(':Adresse', $_POST['Adresse'], PDO::PARAM_STR);
					$query->bindValue(':Complementadresse', $_POST['Complementadresse'], PDO::PARAM_STR);
					$query->bindValue(':InfoEntreprise', $_POST['InfoEntreprise'], PDO::PARAM_STR);
					$query->bindValue(':Habilition', $_POST['Habilition'], PDO::PARAM_STR);
					$query->execute();
					$query->CloseCursor();
				}}
			?>
		</div>
		<h2>OU</h2>
		<div class="Connexion">
			<form method="POST" action="Login.php">
				<fieldset id="section-2">
					<label for="Login">Identifiant :</label> <input type="text"  name="Login" id="Login" value=""/><br />
					<label for="MDP">Mot de passe :</label> <input type="text"  name="MDP" id="MDP" value=""/><br />
					<input type="submit" name="connecter" value="Connexion" />
				</fieldset>
			</form>
			<?php
				if(isset($_POST['Connexion'] )){
				$erreur = NULL;
				$i = 0;
				$temps = time(); 

				//------- Debut des parametres Adresse -----------
				 $erreur_Identifiant = NULL;
				 if ($_POST['Login'] == NULL)
				{ $erreur_Identifiant = "Vous n'avez pas remplie le champs Identifiant";
				$i++;
				    }
				if(strlen($_POST['Login']) > 5)
				{ $erreur_Identifiant = "Le champs Identifiant est trop long";
				$i++;
				}
				  if (strlen($_POST['Login']) < 3)
				{ $erreur_Identifiant = "Le champs Identifiant est trop court";
				$i++;
				}
				//------- Fin des parametres Adresse -----------

				//------- Debut des parametres Habilition -----------
				 $erreur_MDP = NULL;
				 if ($_POST['MDP'] == NULL)
				{ $erreur_MDP = "Vous n'avez pas remplie le champs mot de passe";
				$i++;
				    }
				if(strlen($_POST['MDP']) > 38)
				{ $erreur_MDP = "Le champs mot de passe est trop long";
				$i++;
				}
				  if (strlen($_POST['MDP']) < 3)
				{ $erreur_MDP = "Le champs mot de passe est trop court";
				$i++;
				}
				//------- Fin des parametres Habilition -----------
				if($i > 0){
				echo '<script type="text/javascript">window.alert("'.$erreur_Login."\\n".$erreur_MDP."\\n".'")</script>';

				} else {
					try { 
					$db = new PDO('mysql:host=localhost;dbname=courtoisa', $utilisateur, $motDePasse);
					}
					catch (Exception $e) {  
						die('Erreur : ' . $e->getMessage()); 
					} 
					$query=$db->prepare('SELECT * FROM ds_utilisateur WHERE utilisateur = :pseudo AND mdp = :pass');
					$query->bindValue(':pseudo', $_POST['Login'], PDO::PARAM_STR);
					$query->bindValue(':pass', $_POST['MDP'], PDO::PARAM_STR);
					$query->execute();
					$query->CloseCursor();
				}}
			?>
		</div>
	</div>
	<?php include('Include/footer.php');?>
</body>
</html>