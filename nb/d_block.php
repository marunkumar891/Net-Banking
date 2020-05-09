<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body, html {
    height:100%;
    width:100%;
  font-family: Arial, Helvetica, sans-serif;
 /* background-repeat:no-repeat;*/
  
}

* {
  box-sizing: border-box;
}
.image{
    position:absolute;
}

/*.bg-img {
  /* The image used */
 /* background-image: url("icon.jpg");

  min-height: 180px;

  /* Center and scale the image nicely */
 /* background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}*/

/* Add styles to the form container */
.container {
  position: absolute;
 margin-left: 40%;
 margin-top:15%;
  max-width: 320px;
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}
/* Set a style for the submit button */
.btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn:hover {
  opacity: 1;
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
<img src = "picture.jpg" height = "100%" width = '100%' class = "image"/>

<div>
    <a href =Untitled.php><input type="button" name='back' value="Back" class="btn1"></a>
</div>

<div>
<form method="post" class="container" >

    <label for="Db_cardblock"><b>Are you sure, Do you want to block your debit card?</b></label>
	<br/><br/>Password<br/>
	<input type = 'password' name = 'psw' autofocus required/>
	<button name = 'block' class = 'btn'>Confirm</button>
	<?php
		if(isset($_POST['block'])){
			$mypass = $_POST['psw'];
			$dbcon = mysqli_connect('localhost',"root","",'nb');
			$query = "select password from account where acc_no = {$_COOKIE['login_user']}"; 
			$q = mysqli_query($dbcon,$query);
			$qt = mysqli_fetch_assoc($q);
			$check = $qt['password'];
			$qry = "update bank set debit_card = -1 where acc_no = {$_COOKIE['login_user']}"; 
			if($check == $mypass){
				$q = mysqli_query($dbcon,$qry);
				header("Location: Untitled-1.php");
			}
			else{
				echo '<script>';
				echo 'alert("Invalid password")';
				echo '</script>';
			}
		}
	?>
  </form>
 </div>


</body>
</html>
