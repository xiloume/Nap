<?php
require_once('../../controllers/&parameters/parameters.php');
require_once('../../controllers/&parameters/database.php');
include('../../controllers/&includes/header.php');
include('../../controllers/&includes/menu.php');
include('../../controllers/&includes/slider2.php');
?>
<section class="genericSection">
    <div class="container">
        <h3>ACHAT DE POINT - STARPASS</strong></h3>
        <div class="divider"></div>
<?php 
  if(isset($_SESSION['id']))
    { 
?>
<center>

<?php
  

  if(isset($_SESSION['id']) AND isset($_SESSION['id']))
  {
  if(isset($_POST['code1']))
  {
$ident=$idp=$ids=$idd=$codes=$code1=$code2=$code3=$code4=$code5=$datas='';
$idp = $IDP_STARPASS;
$idd = $IDD_STARPASS;
$ident=$idp.";".$ids.";".$idd;
if(isset($_POST['code1'])) $code1 = $_POST['code1'];
if(isset($_POST['code2'])) $code2 = ";".$_POST['code2'];
if(isset($_POST['code3'])) $code3 = ";".$_POST['code3'];
if(isset($_POST['code4'])) $code4 = ";".$_POST['code4'];
if(isset($_POST['code5'])) $code5 = ";".$_POST['code5'];
$codes=$code1.$code2.$code3.$code4.$code5;
if(isset($_POST['DATAS'])) $datas = $_POST['DATAS'];
$ident=urlencode($ident);
$codes=urlencode($codes);
$datas=urlencode($datas);
$get_f=@file("http://script.starpass.fr/check_php.php?ident=$ident&codes=$codes&DATAS=$datas");
if(!$get_f)
{
exit(" Votre serveur n'a pas les accès pour utiliser Starpass. ");
}
$tab = explode("|",$get_f[0]);

if(!$tab[1]) $url = "http://script.starpass.fr/erreur.php";
else $url = $tab[1];
$pays = $tab[2];
$palier = urldecode($tab[3]);
$id_palier = urldecode($tab[4]);
$type = urldecode($tab[5]);
if(substr($tab[0],0,3) != "OUI")
{
echo '<div class="alert alert-danger">Code incorrect !</div>';
  }
  else
  {
  
  $point = $_SESSION['points'] + $WIN_POINTS;
  
  $account = $_SESSION['account'] ;
  $req = "UPDATE accounts SET points = $point WHERE account = '$account' "; 
  $req = $bdd->prepare($req);
  $req->execute(); 

  $achat = $_SESSION['achatsStarpass'] + 1;
  $account2 = $_SESSION['account'] ;
  $req = "UPDATE accounts SET achatsStarpass = $achat WHERE account = '$account2' "; 
  $req = $bdd->prepare($req);
  $req->execute(); 

  $IP = $_SERVER['REMOTE_ADDR'];

  $statement = $bdd->prepare("INSERT INTO napple_logs (logsAccount, logsType, logsCode, logsChoice, logsCost, logsDate, logsIP) VALUES (:logsAccount, :logsType, :logsCode, :logsChoice, :logsCost, '".date("d-m-Y H:i:s")."', :logsIP)"); 
  $statement->execute(array(
  "logsAccount" => $_SESSION['account'],
  "logsType" => 'Starpass',
  "logsCode" => $_POST['code1'],
  "logsChoice" => $WIN_POINTS,
  "logsCost" => '1,35€',
  "logsIP" => $IP,
  ));

  echo '<div class="alert alert-success">Achat effectué avec succès !</div>';
  echo '<meta http-equiv="refresh" content="0;URL=../../show/account/">';
?>

<?php 
}
}
else
{
echo '<div class="alert alert-danger">Vous devez entrer un code pour pouvoir poursuive le formulaire.</div> ';
}
}
?>

</center>
<?php
  }
  else
  {
?>
<div class="alert alert-danger">
Vous devez être connecté pour accéder à cette page.
</div>
<?php
}
?>
    </div><!-- end container -->
</section>
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<?php
include('../../controllers/&includes/footer.php');
?>
