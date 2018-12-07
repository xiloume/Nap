<?php
require_once('../../controllers/&parameters/parameters.php');
require_once('../../controllers/&parameters/database.php');
include('../../controllers/&includes/header.php');
include('../../controllers/&includes/menu.php');
include('../../controllers/&includes/slider2.php');
?>
<section class="genericSection">
    <div class="container">
        <h3>CLASSEMENT : <strong>VOTEURS</strong></h3>
        <div class="divider"></div>
        <table class="myProperties">

            <tr class="myPropertiesHeader">
                <td class="myPropertyAddress">Pseudo</td>
                <td class="myPropertyStatus">Vote(s)</td>

            </tr>
<?php

    $req= $bdd->query("SELECT * FROM accounts ORDER BY votes DESC LIMIT 0, 30");
    $req->setFetchMode(PDO::FETCH_OBJ);
    while ($i = $req->fetch())
        {

?>
            <tr>
                <td class="myPropertyAddress"><a href="#"><h4><?php echo $i->pseudo ?></h4></a></td>
                <td class="myPropertyStatus"><?php echo $i->votes ?></td>
            </tr>
<?php
        }
?>

        </table>
    </div><!-- end container -->
</section>
<?php
include('../../controllers/&includes/footer.php');
?>
