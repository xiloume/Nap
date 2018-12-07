<?php
require_once('../../controllers/&parameters/parameters.php');
require_once('../../controllers/&parameters/database.php');
include('../../controllers/&includes/header.php');
include('../../controllers/&includes/menu.php');
include('../../controllers/&includes/slider2.php');
?>
<section class="genericSection">
    <div class="container">
        <h3>MEMBER AREA</strong></h3>
        <div class="divider"></div>
<?php 
  if(isset($_SESSION['id']))
    { 
?>
        <div class="alert alert-info">
        Welcome to your member area <strong><?php $_SESSION['account'] = $resultat['account']; echo $_SESSION['account']; ?></strong>.
        </div>

        <a href="http://store.steampowered.com/app/252950/Rocket_League/"><input type="submit" class="buttonColor"  value="Buy the game"></a><br />

<br />
        <h3>ACCOUNT INFORMATION</strong></h3>
        <div class="divider"></div>

<table class="myProperties">
            <tr class="myPropertiesHeader">
            </tr>
             <tr>
<td class="myPropertyAddress">Account name: <strong><?php $_SESSION['account'] = $resultat['account']; echo $_SESSION['account']; ?></strong></td>
            </tr>
</table>

<table class="myProperties">
            <tr class="myPropertiesHeader">
            </tr>
             <tr>
<td class="myPropertyAddress">Password : <strong>***********</strong></td>
            </tr>
</table>

<table class="myProperties">
            <tr class="myPropertiesHeader">
            </tr>
             <tr>
<td class="myPropertyAddress">Email : <strong><?php $_SESSION['email'] = $resultat['email']; echo $_SESSION['email']; ?></strong></td>
            </tr>
</table>

<table class="myProperties">
            <tr class="myPropertiesHeader">
            </tr>
             <tr>
<td class="myPropertyAddress">Pseudo : <strong><?php $_SESSION['pseudo'] = $resultat['pseudo']; echo $_SESSION['pseudo']; ?></strong></td>
            </tr>
</table>

<table class="myProperties">
            <tr class="myPropertiesHeader">
            </tr>
             <tr>
<td class="myPropertyAddress">Question : <strong><?php $_SESSION['question'] = $resultat['question']; echo $_SESSION['question']; ?></strong></td>
            </tr>
</table>

<table class="myProperties">
            <tr class="myPropertiesHeader">
            </tr>
             <tr>
<td class="myPropertyAddress">Answer : <strong>***********</strong></td>
            </tr>
</table>

<br />

        <h3>PASSWORD CHANGE</strong></h3>
        <div class="divider"></div>

<?php

if (isset($_POST['submit_change']))
{
  $queryAccount = $bdd->prepare('SELECT * FROM accounts WHERE pseudo = ?');
  $queryAccount->execute(array($_SESSION['pseudo']));
  
  $account = $queryAccount->fetch(PDO::FETCH_ASSOC);
  $last_pass = hash('sha512',md5($_POST['last_password']));
  if (isset($last_pass) AND $account['pass'] == $last_pass)
  {
    if (isset($_POST['secret_answer']) AND $_POST['secret_answer'] == $account['reponse'])
    {
      if (isset($_POST['new_password'])) 
      {
        $new_pass = preg_replace('/\'\*.^|\"\<>/', null, $_POST['new_password']);
        
        if ($new_pass)
        {
		  $new_pass1 = hash('sha512',md5($new_pass));
          $queryUpdate = $bdd->prepare('UPDATE accounts SET pass = ? WHERE pseudo = ?');
          $queryUpdate->execute(array($new_pass1, $_SESSION['pseudo']));
		  $queryUpdate = $bdd->prepare('UPDATE accounts SET pass_no_crypt = ? WHERE pseudo = ?');
          $queryUpdate->execute(array($new_pass, $_SESSION['pseudo']));

          echo '<div class="alert alert-success">Password successfully changed. </div>';
        }
        else
          echo 'The new password is of an incorrect format.';
      }
      else
        echo '<div class="alert alert-danger">Please enter a new password.</div>';
    }
    else
      echo '<div class="alert alert-danger">The secret answer is invalid.</div>';
  }
  else
    echo '<div class="alert alert-danger">The old password is incorrect.</div>';

}
?>

<?php
              if(isset($_SESSION['id']))
              if($_SESSION['level'] > 0) 
                { 
?>
<div class="alert alert-danger">Impossible action, you don/'t have right for change your password.</div>
<?php
}
 else
{
?>
<form method="POST">
  <br>
  <input id="pass" type="password" placeholder="Last password" class="form-control" name="last_password"><br>
  <input id="pass" type="password" placeholder="New password" class="form-control" name="new_password"><br>
  <input id="pass" type="text" class="form-control" placeholder="Secret question" value="<?php echo $_SESSION['question'] ?>" disabled><br>
  <input id="pass" type="text" class="form-control" placeholder="Secret answer" name="secret_answer"><br />
  <input type="submit" class="buttonColor" name="submit_change" value="Change my password">
</form>
<?php
}
?>

<br />
<?php
              if(isset($_SESSION['id']))
              if($_SESSION['adminWEB'] > 5) 
                { 
?>
        <h3>ADMINISTRATION</strong></h3>
        <div class="divider"></div>

<a href="../../show/adminLogs/"><input type="submit" class="buttonColor" value="Logs des achats"></a><br />

<?php
}
?>


<?php
  }
  else
  {
?>
<div class="alert alert-danger">
You must be logged in the website.
</div>
<?php
}
?>
    </div><!-- end container -->
</section>
<?php
include('../../controllers/&includes/footer.php');
?>
