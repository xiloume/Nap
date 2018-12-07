<?php
require_once('../../controllers/&parameters/parameters.php');
require_once('../../controllers/&parameters/database.php');
include('../../controllers/&includes/header.php');
include('../../controllers/&includes/menu.php');
include('../../controllers/&includes/slider2.php');
?>
<section class="genericSection">
    <div class="container">
        <h3>BOUTIQUE</strong></h3>
        <div class="divider"></div>
<?php 
  if(isset($_SESSION['id']))
    { 
?>

<div class="alert alert-info">
Rendez-vous au zaap Astrub pour utiliser la boutique du serveur.
</div>

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
<?php
include('../../controllers/&includes/footer.php');
?>
