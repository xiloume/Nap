<?php
require_once('../../controllers/&parameters/parameters.php');
require_once('../../controllers/&parameters/database.php');
include('../../controllers/&includes/header.php');
include('../../controllers/&includes/menu.php');
include('../../controllers/&includes/slider2.php');
?>
<?php
              if(isset($_SESSION['id']))
              if($_SESSION['adminWEB'] > 5) 
                { 
?>
<section class="genericSection">
    <div class="container">
        <h3>LOGS : <strong>ACHATS</strong></h3>
        <div class="divider"></div>
        <table class="myProperties">

            <tr class="myPropertiesHeader">
                <td class="myPropertyStatus">Account</td>
                <td class="myPropertyAddress">Type</td>
                <td class="myPropertyStatus">Code Starpass</td>
                <td class="myPropertyAddress">Points</td>
                <td class="myPropertyStatus">Prix</td>
                <td class="myPropertyAddress">Date</td>
                <td class="myPropertyStatus">IP</td>
            </tr>
<?php

    $req= $bdd->query("SELECT * FROM napple_logs ORDER BY logsID");
    $req->setFetchMode(PDO::FETCH_OBJ);
    while ($i = $req->fetch())
        {

?>
            <tr>
<td class="myPropertyStatus"><?php echo $i->logsAccount ?></td>
<td class="myPropertyStatus"><?php echo $i->logsType ?></td>
<td class="myPropertyStatus"><?php echo $i->logsCode ?></td>
<td class="myPropertyStatus"><?php echo $i->logsChoice ?></td>
<td class="myPropertyStatus"><?php echo $i->logsCost ?></td>
<td class="myPropertyStatus"><?php echo $i->logsDate ?></td>
<td class="myPropertyStatus"><?php echo $i->logsIP ?></td>
            </tr>
<?php
        }
?>

Total des paiements : <strong><?php echo $fi; ?>€</strong>

<?php
  }
  else
  {
?>
<meta http-equiv="refresh" content="0; URL=http://google.fr">
<?php
}
?>

        </table>
    </div><!-- end container -->
</section>
<?php
include('../../controllers/&includes/footer.php');
?>
