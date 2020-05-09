<?php
	$dbcon = mysqli_connect("localhost","root","","nb");
		setcookie('login_user',"",time()-3600);
		header("Location: signin.php");
?>