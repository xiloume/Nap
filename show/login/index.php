<?php
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
                <h3>MEMBER AREA</h3>
                <div class="divider"></div>
<?php 
  if(isset($_SESSION['id']))
    { 
?>
<div class="alert alert-danger"><h4>You are already connected at Rocket&co</h4></div>
<?php
  }
  else
  {
?>
                <p style="font-size:13px;">You don't have account ? <a href="../../show/register/">Registration</a></p>
                <!-- start login form -->
                <div class="filterContent sidebarWidget">

                    <form action="" method="POST" role="form">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-6">
                                <div class="formBlock">
                                <label for="login"><center>Account name</center></label><br/>
                                <input type="text" name="user" id="login" />
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
                                    <input class="buttonColor" type="submit" value="Login" style="margin-top:24px;">
                                    <?php
  if(isset($erreur))
    {
      echo $erreur ;
    }
?>
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

<br />
<br />
<br />
<br />
<br />
<?php
include('../../controllers/&includes/footer.php');
?>
