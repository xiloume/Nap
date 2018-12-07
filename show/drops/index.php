<?php
require_once('../../controllers/&parameters/parameters.php');
require_once('../../controllers/&parameters/database.php');
include('../../controllers/&includes/header.php');
include('../../controllers/&includes/menu.php');
include('../../controllers/&includes/slider2.php');
?>
<section class="genericSection">
    <div class="container">
        <h3>DROPVIEWER</h3>
        <div class="divider"></div>

<?php
    if (isset($_POST['send_form']))
    {
        if (isset($_POST['drop']) AND $_POST['drop'])
        {
            $queryDrops = $bdd->prepare('SELECT * FROM drops WHERE UPPER(NameItem) LIKE UPPER(:drop) OR UPPER(NameMob) LIKE UPPER(:drop) OR UPPER(mob) LIKE UPPER(:drop) OR UPPER(item) LIKE UPPER(:drop)');
            $queryDrops->execute(array('drop' => '%'.$_POST['drop']. '%'));

            if ($queryDrops->rowCount() > 0)
            {
?>
<br />
<form method="POST">
    <input type="text" name="drop" placeholder="Nom du drop" id="login">
    <input class="buttonColor" type="submit" name="send_form">
</form>
<br />

<table class="myProperties">

            <tr class="myPropertiesHeader">
                <td class="myPropertyAddress">Drop</td>
                <td class="myPropertyStatus">Seuil minimum</td>
                <td class="myPropertyStatus">Taux</td>
		<td class="myPropertyStatus">Quantité</td>

            </tr>
<?php
                while($drop = $queryDrops->fetch())
                {
?>
            <tr>
                <td class="myPropertyAddress">L'objet <b><?php echo $drop['NameItem']; ?></b> se drop sur <b><?php echo $drop['NameMob']; ?></b></td>
                <td class="myPropertyStatus"><?php echo $drop['seuil']; ?> PP</td>
                <?php
                $TauxDrop = $drop['taux'] / 10000;
                ?>
                <td class="myPropertyStatus"><?php echo $TauxDrop ?>%</td>
		<td class="myPropertyStatus"><?php echo $drop['max']; ?></td>
            </tr>
    <?php
                }
    ?>
</table>
<br />
<form method="POST">
    <input type="text" name="drop" placeholder="Nom du drop" id="login">
    <input class="buttonColor" type="submit" name="send_form">
</form>
<br />
<?php
            }
            else
                echo 'Aucun résultat. <a href="../../show/drops/">Nouvelle recherche</a>';
        }
        else
            echo 'Veuillez entrer un drop à rechercher.';
    }
    else
    {
?>
<br />
<form method="POST">
    <input type="text" name="drop" placeholder="Nom du drop" id="login">
    <input class="buttonColor" type="submit" name="send_form">
</form>
<br />
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
<?php
include('../../controllers/&includes/footer.php');
?>
