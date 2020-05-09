<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body, html {
  height: 100%;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

.bg-image {
 
  
  /* Add the blur effect */
  filter: blur(8px);
  -webkit-filter: blur(8px);
  
  /* Full height */
  height: 100%; 
  
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position:absolute;

}

.btn-group button {
  background-color: #4CAF50; /* Green background */
  border: 1px solid green; /* Green border */
  color: white; /* White text */
  padding: 10px 24px; /* Some padding */
  cursor: pointer; /* Pointer/hand icon */
  width: 40%; /* Set a width if needed */
  display: block; /* Make the buttons appear below each other */
  position:absolute;
  margin-top:15%;
  margin-left:28%;
 
}

.btn-group button:not(:last-child) {
  border-bottom: none; /* Prevent double borders */
}

/* Add a background color on hover */
.btn-group button:hover {
  background-color: #3e8e41;
}

.btn1{
	background-color: #4CAF50;
  	color: white;	
	  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 20px 1200px;
  cursor: pointer;
  position:absolute;
}

</style>
</head>
<body>
<img src = "picture.jpg" height = "100%" width = '100%' class = "bg-image"/>

<div>
	<form method = "post" action = "signout.php">
		<button name='sign' class="btn1">SignOut</button>
	</form>
</div>

<div class="btn-group">
  <a href="details.php"><button type='submit'>transfer money</button></a>
  <br><br><br><br>
  <a href="b_check.php"><button>check balance</button></a><br><br><br><br>
  <a href="nb_block.php"><button>Block Net banking Account</button></a><br><br><br><br>
   <a href="history.php"><button>History of Transactions</button></a><br><br><br><br>
  <form method = "post">

  <button name = 'dc'>Debit card blocking</button>
  
	<?php
		if(isset($_POST['dc'])){
			$dbcon = mysqli_connect('localhost',"root","",'nb');
			$query = "select debit_card from bank where acc_no = {$_COOKIE['login_user']}"; 
			$q = mysqli_query($dbcon,$query);
			$qt = mysqli_fetch_assoc($q);
			$check = $qt['debit_card'];
			echo $check;
			if($check == 0){	
				echo '<script>';
				echo "alert('You don\'t have an debit card')";
				echo "</script>";
			}
			else if($check == -1){	
				echo '<script>';
				echo "alert('Your debit card is already blocked')";
				echo "</script>";
			}
			
			else if($check == 1){	
				header("Location: http://localhost/nb/d_block.php");
			}
			
		}
	?>
	</form>
  
  </div>
</html>
