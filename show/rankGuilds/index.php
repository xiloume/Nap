<?php
require_once('../../controllers/&parameters/parameters.php');
require_once('../../controllers/&parameters/database.php');
include('../../controllers/&includes/header.php');
include('../../controllers/&includes/menu.php');
include('../../controllers/&includes/slider2.php');
?>
<section class="genericSection">
    <div class="container">
        <h3>CLASSEMENT : <strong>GUILDES</strong></h3>
        <div class="divider"></div>
        <table class="myProperties">

            <tr class="myPropertiesHeader">
                <td class="myPropertyAddress">Nom</td>
                <td class="myPropertyStatus">Niveau</td>
            </tr>
<?php

    $req= $bdd->query("SELECT * FROM guilds ORDER BY lvl DESC LIMIT 0, 30");
    $req->setFetchMode(PDO::FETCH_OBJ);
    while ($i = $req->fetch())
        {

?>
            <tr>
                <td class="myPropertyAddress"><a href="#"><h4><?php echo $i->name ?></h4></a></td>
                <td class="myPropertyStatus"><?php echo $i->lvl ?></td>
            </tr>
<?php
        }
?>

        </table>
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
<?php
include('../../controllers/&includes/footer.php');
?>
