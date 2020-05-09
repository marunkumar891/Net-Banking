<?php
	$helo = "cat";
	setcookie('nam',$helo,TIME() + 86400);
	header("Location: trial2.php");
?>