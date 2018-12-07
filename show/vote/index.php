<?php
require_once('../../controllers/&parameters/parameters.php');
require_once('../../controllers/&parameters/database.php');
include('../../controllers/&includes/header.php');
include('../../controllers/&includes/menu.php');
include('../../controllers/&includes/slider2.php');
?>
<section class="genericSection">
    <div class="container">
        <h3>VOTER</strong></h3>
        <div class="divider"></div>
<?php 
  if(isset($_SESSION['id']))
    { 
?>

<?php
        
        {
          $account = $_SESSION['pseudo'];
          $pp = $_SESSION['id'];
          $req = $bdd->prepare('SELECT * FROM accounts where guid = ?');
          $req->execute(array($pp));
          while ($datas = $req->fetch())
          {
            $date = time();
            $ecartminute = ($date - $datas['heurevote'])/60;
            $vote_ip = $bdd->prepare('SELECT * FROM accounts WHERE lastVoteIP = :ip');
            $vote_ip->execute(array('ip' => $_SERVER['REMOTE_ADDR']));
            $vote_allowed = true;

            if($vote_ip->rowCount() != null AND $vote_allowed == false AND $ecartminute > 180)
            {
              echo '<center><div class="alert alert-danger">Vous avez déjà voté pour nous il y à moins de trois heures avec un autre compte.</div></center>';
            }
            elseif($ecartminute > 180)
            {
              $stmt = $bdd->prepare("UPDATE accounts set heurevote = $date, votes = :votes , points = :points, lastVoteIP = :lastVoteIP WHERE pseudo = :account");
              $stmt->execute(array(
                'votes' => $datas['votes'] + 1,
                'points' => $datas['points'] + $Points_par_vote,
                'account' => $account,
                'lastVoteIP' => $_SERVER['REMOTE_ADDR']
              ));

              echo "<script type='text/javascript'> window.location.replace('".$RPG."'); </script>";
            }
            else
            {
              $restant = round(180 - $ecartminute, 0);
        ?>
        <div class="alert alert-danger">
        Vous avez déjà voté pour nous il y à moins de trois heures, veuillez attendre <?php echo $restant; ?> minutes.
        </div>
        
        <?php
            }
          }
        } 
        ?>

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
