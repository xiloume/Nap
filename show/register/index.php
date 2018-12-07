<?php
require_once('../../controllers/&functions/getip.php');
require_once('../../controllers/&parameters/parameters.php');
require_once('../../controllers/&parameters/database.php');
include('../../controllers/&includes/header.php');
include('../../controllers/&includes/menu.php');
include('../../controllers/&includes/slider2.php');
?>

<!-- start main content -->
<section class="properties">
    <div class="container">
        <div class="row">

            <div class="col-lg-4 col-lg-offset-4">
                <h3>REGISTER</h3>
                <div class="divider"></div>
<?php 
  if(isset($_SESSION['id']))
    { 
?>
<div class="alertBox warning"><h4>Vous êtes déjà connecté au site Napple.</h4></div>
<?php
  }
  else
  {
?>
                <!-- start login form -->
                <div class="filterContent sidebarWidget">

<?php

  if(isset($_POST) && isset($_POST['account']) && isset($_POST['pass'])
  && isset($_POST['pass2']) && isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['question']) && isset($_POST['reponse'])
  && isset($_POST['secure']))
  {

  if(get_magic_quotes_gpc()){
    $_POST['account'] = stripslashes(trim($_POST['account']));
    $_POST['pass'] = stripslashes(hash($_POST['pass']));
    $_POST['pass2'] = stripslashes(trim($_POST['pass2']));
    $_POST['pseudo'] = stripslashes(trim($_POST['pseudo']));
    $_POST['email'] = stripslashes(trim($_POST['email']));
    $_POST['question'] = stripslashes(trim($_POST['question']));
    $_POST['reponse'] = stripslashes(trim($_POST['reponse']));
    $_POST['secure'] = stripslashes(trim($_POST['secure']));
  }

    $Account = $_POST['account'];
    $Password = $_POST['pass'];
    $Password2 = $_POST['pass2'];
    $Pseudo = $_POST['pseudo'];
    $Email = $_POST['email'];
    $Question = $_POST['question'];
    $Reponse = $_POST['reponse'];
    $Secure = $_POST['secure'];

    if (!empty($_POST['account']))
    {
      $Account = $_POST['account'];
    }
    else
    {
      echo '<div class="alert alert-danger">The account name is empty.</div>';
    }
    if (!empty($_POST['pass']))
    {
      $Password = $_POST['pass'];
	  $Passwordnocrypt = $_POST['pass'];
    }
    else
    {
      echo '<div class="alert alert-danger">The password is empty.</div>';
    }
    if (!empty($_POST['pass2']))
    {
      $Password2 = $_POST['pass2'];
    }
    else
    {
      echo '<div class="alert alert-danger">The second password is empty.</div>';
    }
    if (!empty($_POST['pseudo']))
    {
      $Pseudo = $_POST['pseudo'];
    }
    else
    {
      echo '<div class="alert alert-danger">The pseudo is empty.</div>';
    }
    if (!empty($_POST['email']))
    {
      $Email = $_POST['email'];
    }
    else
    {
      echo '<div class="alert alert-danger">The email is empty.</div>';
    }
    if (!empty($_POST['question']))
    {
      $Question = $_POST['question'];
    }
    else
    {
      echo '<div class="alert alert-danger">The question is empty.</div>';
    }
    if (!empty($_POST['reponse']))
    {
      $Reponse = $_POST['reponse'];
    }
    else
    {
      echo '<div class="alert alert-danger">The answer is empty.</div>';
    }
    if (!empty($_POST['secure']))
    {
      $Secure = $_POST['secure'];
    }
    else
    {
      echo '<div class="alert alert-danger">The captcha is empty.</div>';
    }

    if (!empty($Account)
      AND !empty($Password)
      AND !empty($Pseudo)
      AND !empty($Email)
      AND !empty($Question)
      AND !empty($Reponse)
      AND !empty($Secure)
      )

    if ($Password != $Password2)
    {
      echo '<div class="alert alert-danger">The two password are not uniform.</div>';
    }
    else
    {


    $query = $bdd->query("SELECT guid FROM accounts WHERE account = '$Account'"); 
    $result = $query->rowCount(); 
    if($result == 1) 
    { 
    echo '<div class="alert alert-danger">The name of this account is already used.</div>'; 
    } 
    
    $query = $bdd->query("SELECT guid FROM accounts WHERE pseudo = '$Pseudo'"); 
    $result = $query->rowCount(); 
    if($result == 1) 
    { 
    echo '<div class="alert alert-danger">This pseudo is already used.</div>'; 
    } 
    $query = $bdd->query("SELECT guid FROM accounts WHERE email = '$Email'"); 
    $result = $query->rowCount(); 
    if($result == 1) 
    { 
    echo '<div class="alert alert-danger">The email is already used.</div>'; 
    } 
    else



    {
	$crypt = hash('sha512',md5($Password));
    if($i = $bdd->prepare("
      INSERT INTO accounts (account,pass,pseudo,email,question,reponse,pass_no_crypt)
      VALUES (:account,:pass,:pseudo,:email,:question,:reponse,:passnocrypt)")
    )

    $i->bindParam(':account', $Account, PDO::PARAM_STR);
    $i->bindParam(':pass', $crypt, PDO::PARAM_STR);
    $i->bindParam(':pseudo', $Pseudo, PDO::PARAM_STR);
    $i->bindParam(':email', $Email, PDO::PARAM_STR);
    $i->bindParam(':question', $Question, PDO::PARAM_STR);
    $i->bindParam(':reponse', $Reponse, PDO::PARAM_STR);
	$i->bindParam(':passnocrypt', $Passwordnocrypt, PDO::PARAM_STR);
    $i->execute();

    echo '<div class="alert alert-success">You are now registered on our servicies</div>';

   }


       }
    }

?>

                    <form action="" method="POST" role="form">
                        <div class="row">

                            <div class="col-lg-12 col-md-12 col-sm-6">
                                <div class="formBlock">
                                <label for="login"><center>Account name</center></label><br/>
                                <input type="text" name="account" id="login" />
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-6">
                                <div class="formBlock">
                                <label for="pass"><center>Password</center></label><br/>
                                <input type="password" name="pass" id="pass" />
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-6">
                                <div class="formBlock">
                                <label for="pass"><center>Password(verify)</center></label><br/>
                                <input type="password" name="pass2" id="pass" />
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-6">
                                <div class="formBlock">
                                <label for="pass"><center>Pseudo</center></label><br/>
                                <input type="text" name="pseudo" id="pass" />
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-6">
                                <div class="formBlock">
                                <label for="pass"><center>Email</center></label><br/>
                                <input type="email" name="email" id="pass" />
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-6">
                                <div class="formBlock">
                                <label for="pass"><center>Question</center></label><br/>
                                <input type="text" name="question" id="pass" />
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-6">
                                <div class="formBlock">
                                <label for="pass"><center>Answer</center></label><br/>
                                <input type="text" name="reponse" id="pass" />
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-6">
                                <div class="formBlock">
                                <img src="../../controllers/&modules/captcha/secure.php"> <br />
                                <br />
                                <label for="pass"><center>Captcha</center></label><br/>
                                <input type="text" name="secure" id="pass" />
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-6">
                                <div class="formBlock">
                                    <input class="buttonColor" type="submit" value="Submit" style="margin-top:24px;">
                                </div>
                            </div>



                            <div style="clear:both;"></div>
                        </div><!-- end row -->

                    </form><!-- end form -->
<?php
}
?>


                </div><!-- end login form -->
            </div><!-- end col -->
            
        </div>
    </div><!-- end container -->
</section>
<!-- end main content -->


<?php
include('../../controllers/&includes/footer.php');
?>
