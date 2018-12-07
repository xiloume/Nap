<link href="../../controllers/&modules/armu/common.css" rel="stylesheet" type="text/css" media="all" />
<?php
require_once('../../controllers/&parameters/parameters.php');
require_once('../../controllers/&parameters/database.php');
include('../../controllers/&includes/header.php');
include('../../controllers/&includes/menu.php');
include('../../controllers/&includes/slider2.php');
?>
<?php	
	$valueGET = $_GET['p'];
    $req= $bdd->query('SELECT * FROM players WHERE id = "'.$valueGET.'"');
    $req->setFetchMode(PDO::FETCH_OBJ);
    while ($i = $req->fetch())
        {
?>
<section class="genericSection">
    <div class="container">
        <h3>JOUEUR - <strong><?php echo $i->name ?></strong></h3>
        <div class="divider"></div>
<br />


<?php
$sexeF = $i->sexe;
$sexeM = $i->sexe;
$skinF = $i->class;
$skinM = $i->class;
require('../../controllers/&modules/armu/classes.php');
?>
<br />
<div class="alert alert-info">
<center>Niveau : <strong><?php echo $i->level ?></strong></center>
</div>
<div class="alert alert-warning">
<center>Experiences : <strong><?php echo $i->xp ?></strong></center>
</div>
<div class="alert alert-info">
<center>
<?php
$align = $i->alignement;
$honor = $i->honor;
require('../../controllers/&modules/armu/align.php');
?></center>
</div>
    
    </div>
</section>
<?php
}
?>
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
