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

<div class="alert alert-info">
Paypal est un moyen de payment en ligne et sécurisé. Toute transcation se fait avec leur API est n'est pas géré par le site.
</div>

<?php
  $points = array( 
    '100' => '1.50', 
    '200' => '3.00',
    '300' => '4.50',
    '400' => '6.00',
    '500' => '7.50',
    '600' => '9.00',
    '700' => '10.50',
    '800' => '12.00',
    '900' => '13.50',
    '1000' => '15.00',
    '1100' => '16.50',
    '1200' => '18.00',
    '1300' => '19.50',
    '1400' => '21.00',
    '1500' => '22.50',
    '1600' => '24.00',
    '1700' => '25.50',
    '1800' => '27.00',
    '1900' => '28.50',
    '2000' => '30.00',
    '2100' => '31.50',
    '2200' => '33.00',
    '2300' => '34.50',
    '2400' => '36.00',
    '2500' => '37.50',
    '2600' => '39.00',
    '2700' => '40.50',
    '2800' => '42.00',
    '2900' => '43.50',
    '3000' => '45.00',
    '3100' => '46.50',
    '3200' => '48.00',
    '3300' => '49.50',
    '3400' => '51.00',
    '3500' => '52.50',
    '4500' => '67.50',
    '5500' => '82.50',
    '7000' => '105.00'
  );

  require('../../controllers/&parameters/paypal_api.php');
  
  
  if(isset($_POST['choice']))
  {
    $_SESSION['choice'] = array('points' => $_POST['choice'], 'cost' => $points[$_POST['choice']]);
    $requete = construit_url_paypal();
        $requete = $requete."&METHOD=SetExpressCheckout".
                            "&CANCELURL=".urlencode($LinkPaypal).
                            "&RETURNURL=".urlencode($LinkPaypal).
                            "&PaymentDetailsItemName=lol".
                            "&AMT=".urldecode($_SESSION['choice']['cost']).
                                    "&CURRENCYCODE=EUR".
                                    "&DESC=".urlencode("Achat de ".$_SESSION['choice']['points']." points pour ".$_SESSION['choice']['cost']."€").
                                    "&LOCALECODE=FR";                  
        $ch = curl_init($requete);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $resultat_paypal = curl_exec($ch);
        if(!$resultat_paypal)
        {
            echo "<p>Erreur curl</p><br /><p>".curl_error($ch)."</p>";
        }
        else
        {
            $liste_param_paypal = recup_param_paypal($resultat_paypal);

            if($liste_param_paypal['ACK'] == 'Success') 
            {
              echo'<meta http-equiv="refresh" content="0;url='.$serveur_paypal.$liste_param_paypal['TOKEN'].'"/>';
              exit();
            } 
            else 
            {
                echo "<p>Erreur de communication avec le serveur PayPal.<br />".$liste_param_paypal['L_SHORTMESSAGE0']."<br />".$liste_param_paypal['L_LONGMESSAGE0']."</p>";
            }     
        }

        curl_close($ch);
  }

        if(isset($_GET['token'])) 
        {
            $requete = construit_url_paypal();
                  $requete = $requete."&METHOD=DoExpressCheckoutPayment".
                                "&TOKEN=".htmlentities($_GET['token'], ENT_QUOTES).
                                "&AMT=".$_SESSION['choice']['cost'].
                                "&CURRENCYCODE=EUR".
                                "&PayerID=".htmlentities($_GET['PayerID'], ENT_QUOTES).
                                "&PAYMENTACTION=sale";
            $ch = curl_init($requete);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $resultat_paypal = curl_exec($ch); 
            if(!$resultat_paypal) 
            {
                echo "<p>Erreur curl</p><br /><p>".curl_error($ch)."</p>";
            }
            else
            {
                $liste_param_paypal = recup_param_paypal($resultat_paypal);

                if($liste_param_paypal['ACK'] == 'Success')
                {
            $req = $bdd->prepare("UPDATE accounts set points = points + :points where account = :account"); 
            $req->execute(array('points' => $_SESSION['choice']['points'], 'account' => $_SESSION['account'])); 
            
			$achat = $_SESSION['achatsPaypal'] + 1;
			  $account2 = $_SESSION['account'] ;
			  $req = "UPDATE accounts SET achatsPaypal = $achat WHERE account = '$account2' "; 
			  $req = $bdd->prepare($req);
			  $req->execute(); 

			  $IP = $_SERVER['REMOTE_ADDR'];

			  $statement = $bdd->prepare("INSERT INTO napple_logs (logsGuid, logsAccount, logsType, logsCode, logsChoice, logsCost, logsDate, logsIP) VALUES (:logsGuid, :logsAccount, :logsType, :logsCode, :logsChoice, :logsCost, '".date("d-m-Y H:i:s")."', :logsIP)"); 
			  $statement->execute(array(
        "logsGuid" => $_SESSION['id'],
			  "logsAccount" => $_SESSION['account'],
			  "logsType" => 'Paypal',
			  "logsCode" => '-',
			  "logsChoice" => $_SESSION['choice']['points'],
			  "logsCost" => ''.$_SESSION['choice']['cost'].'€',
			  "logsIP" => $IP,
			  ));
            
      ?>
      <div class="alert alert-success">
      <p>
      Votre paiment à été validé avec succès !
      <meta http-equiv="refresh" content="1; URL=../../show/account/">
      </p>
      </div>
      <?php
                }
                else
                {
        ?>
      <div class="alert alert-danger">
      <p>
      Votre paiment n'a pas abouti, veuillez réessayer !
      </p>
      </div>
       <?php
                }
            }
        }
        ?>
       <p>
              <form method="post" id="envoie">
                <center>
                  <select name="choice">
                    <?php
                    foreach($points as $p => $c)
                    {
                      echo '<option value="' .$p. '">' .$p. ' points - ' .$c. '€</option>';
                    }
                    ?>
            </select>
            <br /><br />
            <button id="submit" class="btn btn-info btn-small">J'achète</button>
          </center>
        </form>
      </p>

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
