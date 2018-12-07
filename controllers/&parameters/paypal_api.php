<?php
  $serveur_paypal = "https://www.paypal.com/webscr&cmd=_express-checkout&token=";
  
  function construit_url_paypal()
  {
    $version = 56.0; // Version de l'API
     
    /******   DONNEES DE TESTS  ******/
    /*
    //$api_paypal = 'https://api-3t.sandbox.paypal.com/nvp?'; // Site de l'API PayPal. On ajoute déjà le ? afin de concaténer directement les paramètres.
    $user = 'makeyourshow-facilitator_api1.gmail.com';
    $pass = '1364725447';
    $signature = 'AFcWxV21C7fd0v3bYYYRCpSSRl31AAFPcfwjarXrCgHeGnz4W1l2VWj2';
    */
 
    /******   DONNEES DE PRODUCTION ******/
    $api_paypal = 'https://api-3t.paypal.com/nvp?';
    $user = 'decibel_pro_api1.hotmail.fr';
    $pass = 'DF9ZU3QM69XCQ4UN';
    $signature = 'AqWL1hUlXWJknKsZSgzN9h-tns.SAoeAaB1BfmSqAdvsIFGlPFjPxz2i';
 
    $api_paypal = $api_paypal.'VERSION='.$version.'&USER='.$user.'&PWD='.$pass.'&SIGNATURE='.$signature; // Ajoute tous les paramètres
 
    return  $api_paypal; // Renvoie la chaîne contenant tous nos paramètres.
  }
   
  function recup_param_paypal($resultat_paypal)
  {
    $liste_parametres = explode("&",$resultat_paypal); // Crée un tableau de paramètres
    foreach($liste_parametres as $param_paypal) // Pour chaque paramètre
    {
        list($nom, $valeur) = explode("=", $param_paypal); // Sépare le nom et la valeur
        $liste_param_paypal[$nom]=urldecode($valeur); // Crée l'array final
    }
    return $liste_param_paypal; // Retourne l'array
  }
?>
