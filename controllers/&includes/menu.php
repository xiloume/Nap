
<!-- Start Header -->
<header class="navbar yamm navbar-default navbar-fixed-top">

<div class="container">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="../../show/home/"><img src="../../assets/001/images/slider/logo.png"/><span>Rocket League</span></a>
    </div>
    <div class="navbar-collapse collapse">

        <!--  start login/register -->
        <ul class="userButtons">  
<?php 
  if(isset($_SESSION['id']))
    { 
?>
            <li class="userBtn"><a href="../../show/account/" class="buttonGrey">My account</a></li>
            <li class="userBtn"><a href="index.php?deco=1" class="buttonGrey"><font color="red">Disconnection</font></a></li>
<?php
  }
  else
  {
?>
            <li class="userBtn"><a href="../../show/login/" class="buttonGrey">Connection</a></li>
            <li class="userBtn"><a href="../../show/register/" class="buttonGrey">Register</a></li>
<?php
}
?>
        </ul>
        <!-- end login/register -->

        <ul class="nav navbar-nav">

            <li class="dropdown menu-item-has-children">
                <a href="../../show/home/" class="current">&nbsp HOME</a>
            </li>
<?php 
  if(isset($_SESSION['id']))
    { 
?>
            <li class="dropdown menu-item-has-children">
                <a href="#">JOIN US</a>
                <ul class="dropdown-menu">
                <li><a href="http://store.steampowered.com/app/252950/Rocket_League/"><img src="../../assets/001/com/setup.png">&nbsp Download</a></li>    
                </ul>
            </li>
<?php
  }
  else
  {
?>
            <li class="dropdown menu-item-has-children">
                <a href="#">JOIN US</a>
                <ul class="dropdown-menu">
					<li><a href="http://store.steampowered.com/app/252950/Rocket_League/"><img src="../../assets/001/com/setup.png">&nbsp Download </a></li>
                </ul>
            </li>
<?php
}
?>
            <li class="dropdown menu-item-has-children">
                <a href="#">COMMUNITY</a>
                <ul class="dropdown-menu">
                    <li><a href="../../show/team/"><img src="../../assets/001/com/staff.png">&nbsp Team</a></li>
                    <li><a href="../../show/rules/"><img src="../../assets/001/com/regle.png">&nbsp Rules</a></li>
                </ul>
            </li>
			

            <li class="dropdown menu-item-has-children">
                <a href="#">UTILITIES</a>
                <ul class="dropdown-menu">
					<li><a href="https://discord.gg/cVuCSDj"><img src="../../assets/001/com/discord.png">&nbsp Discord</a></li>
					<li><a href="../../show/presentation"><img src="../../assets/001/com/drop.png">&nbsp Presentation</a></li>
                </ul>
            </li>

     
        </ul>        
    </div><!--/.navbar-collapse -->
</div><!-- end header container -->
</header><!-- End Header -->