<?php
require_once('../../controllers/&parameters/parameters.php');
require_once('../../controllers/&parameters/database.php');
include('../../controllers/&includes/header.php');
include('../../controllers/&includes/menu.php');
include('../../controllers/&includes/slider.php');
?>

<section class="properties">
    <div class="container">
        <h3>STAFF</strong></h3>
        <div class="divider"></div>

<section class="topAgents about">
    <div class="container">
        <div class="row">
<?php
	$req= $bdd->query("SELECT * FROM napple_equipe order by id");
	$req->setFetchMode(PDO::FETCH_OBJ);
	while ($i = $req->fetch())
		{
?>
            <div class="col-lg-3 col-md-3 col-sm-3">
                <img class="agentImg" src="<?php echo $i->img ?>"/><br/><br/>
                <h4><?php echo $i->name ?></h4>
                <p>
				<?php echo $i->rang ?>
                </p>
            </div>
<?php
		}
?>

        </div>
    </div>
</section>


      <!-- end row -->
    </div><!-- end container -->
</section>
<?php
include('../../controllers/&includes/footer.php');
?>
