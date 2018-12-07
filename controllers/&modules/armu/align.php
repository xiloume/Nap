<?php

if($align == 0)
{
	echo 'Aucune spécialisation.';
}

else

if($align == 1)
{
	if($honor == 0)
	{
		echo '<center><strong> Recrue </strong><br /><img src="../../controllers/&modules/armu/grades/bonta1.png"></center>';
	}
	else
	if($honor > 0 && $honor < 500)
	{
		echo '<center><strong> Aspirant </strong><br /><img src="../../controllers/&modules/armu/grades/bonta2.png"></center>';
	}
	else
	if($honor > 500 && $honor < 1500)
	{
		echo '<center><strong> Sentinelle </strong><br /><img src="../../controllers/&modules/armu/grades/bonta3.png"></center>';
	}
	else
	if($honor > 1500 && $honor < 3000)
	{
		echo '<center><strong> Défenseur </strong><br /><img src="../../controllers/&modules/armu/grades/bonta4.png"></center>';
	}
	else
	if($honor > 3000 && $honor < 5000)
	{
		echo '<center><strong> Chevalier </strong><br /><img src="../../controllers/&modules/armu/grades/bonta5.png"></center>';
	}
	else
	if($honor > 5000 && $honor < 7500)
	{
		echo '<center><strong> Champion </strong><br /><img src="../../controllers/&modules/armu/grades/bonta6.png"></center>';
	}
	else
	if($honor > 7500 && $honor < 10000)
	{
		echo '<center><strong> Conquérant </strong><br /><img src="../../controllers/&modules/armu/grades/bonta7.png"></center>';
	}
	else
	if($honor > 10000 && $honor < 12500)
	{
		echo '<center><strong> Stratège </strong><br /><img src="../../controllers/&modules/armu/grades/bonta8.png"></center>';
	}
	else
	if($honor > 12500 && $honor < 15000)
	{
		echo '<center><strong> Commandeur </strong><br /><img src="../../controllers/&modules/armu/grades/bonta9.png"></center>';
	}
	else
	if($honor > 12500 && $honor < 17500)
	{
		echo '<center><strong> Héros </strong><br /><img src="../../controllers/&modules/armu/grades/bonta10.png"></center>';
	}
	else
	if($honor > 17500)
	{
		echo '<center><strong> Héros </strong><br /><img src="../../controllers/&modules/armu/grades/bonta10.png"></center>';
	}
}

if($align == 2)
{
	if($honor == 0)
	{
		echo '<center><strong> Recrue </strong><br /><img src="../../controllers/&modules/armu/grades/dem1.png"></center>';
	}
	else
	if($honor > 0 && $honor < 500)
	{
		echo '<center><strong> Aspirant </strong><br /><img src="../../controllers/&modules/armu/grades/dem2.png"></center>';
	}
	else
	if($honor > 500 && $honor < 1500)
	{
		echo '<center><strong> Sentinelle </strong><br /><img src="../../controllers/&modules/armu/grades/dem3.png"></center>';
	}
	else
	if($honor > 1500 && $honor < 3000)
	{
		echo '<center><strong> Défenseur </strong><br /><img src="../../controllers/&modules/armu/grades/dem4.png"></center>';
	}
	else
	if($honor > 3000 && $honor < 5000)
	{
		echo '<center><strong> Chevalier </strong><br /><img src="../../controllers/&modules/armu/grades/dem5.png"></center>';
	}
	else
	if($honor > 5000 && $honor < 7500)
	{
		echo '<center><strong> Champion </strong><br /><img src="../../controllers/&modules/armu/grades/dem6.png"></center>';
	}
	else
	if($honor > 7500 && $honor < 10000)
	{
		echo '<center><strong> Conquérant </strong><br /><img src="../../controllers/&modules/armu/grades/dem7.png"></center>';
	}
	else
	if($honor > 10000 && $honor < 12500)
	{
		echo '<center><strong> Stratège </strong><br /><img src="../../controllers/&modules/armu/grades/dem8.png"></center>';
	}
	else
	if($honor > 12500 && $honor < 15000)
	{
		echo '<center><strong> Commandeur </strong><br /><img src="../../controllers/&modules/armu/grades/dem9.png"></center>';
	}
	else
	if($honor > 12500 && $honor < 17500)
	{
		echo '<center><strong> Héros </strong><br /><img src="../../controllers/&modules/armu/grades/dem10.png"></center>';
	}
	else
	if($honor > 17500)
	{
		echo '<center><strong> Héros </strong><br /><img src="../../controllers/&modules/armu/grades/dem10.png"></center>';
	}
}


?>