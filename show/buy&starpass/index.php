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
1 CODE = <?php echo $WIN_POINTS; ?> POINTS
</div>

<div id="starpass_<?php echo $IDD_STARPASS; ?>"></div>
<script type="text/javascript" src="http://script.starpass.fr/script.php?idd=<?php echo $IDD_STARPASS; ?>&amp;&theme=blue_ocean&amp;last=1&amp;verif_en_php=1‘>">
</script>
<noscript>Veuillez activer le Javascript de votre navigateur s'il vous pla&icirc;t.<br />
<a href="http://www.starpass.fr/">Micro Paiement StarPass</a>
</noscript> 

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
