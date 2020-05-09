
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

input[type=number]::-webkit-inner-spin-button{
	-webkit-appearance: none;
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
 margin-top:5%;
  max-width: 300px;
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=number], input[type=password] {
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
</style>
</head>
<body>
<img src = "picture.jpg" height = "100%" width = '100%' class = "image"/>


<div>
  <form method = 'post' class="container" >
	

    <h1><center>Sign up</center></h1>

    <label for="acc"><b>Account number</b></label>
    <input type="number" id="number" placeholder="Enter Account no." name="acc" required autofocus><br/>

    <label for="name"><b>Username</b></label>
    <input type="text" placeholder="Enter name" name="name" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" min = '8' max = '20'  required>

    <button type="submit" name = 'sumb' class="btn">Submit</button>
	<center><font size = "2"><a href = "http://localhost/nb/signin.php">Already have an account?, click here to signin</a></font></center>
	<?php
		
		$dbco = mysqli_connect('localhost',"root","",'nb');
		if(!$dbco){
			die("connecting error");
		}
		if(isset($_POST['sumb'])){
			$acc = $_POST['acc'];
			$usrname = $_POST['name'];
			$pass = $_POST['psw'];
			$ser="INSERT INTO account(username,password,acc_no) VALUES ('{$usrname}','{$pass}',{$acc})";
			
			$query = "select username from account where username = '$usrname'"; 
			$q = mysqli_query($dbco,$query);
			$qt = mysqli_fetch_assoc($q);
			$usr = $qt['username'];
			
			$query = "select acc_no from bank where acc_no = $acc"; 
			$q = mysqli_query($dbco,$query);
			$qt = mysqli_fetch_assoc($q);
			$myacc = $qt['acc_no'];
			
			$query = "select acc_no from account where acc_no = $acc"; 
			$q = mysqli_query($dbco,$query);
			$qt = mysqli_fetch_assoc($q);
			$myacc1 = $qt['acc_no'];
			
			if($usr == $usrname){
				echo "<script>";
				echo "alert('Username already exists')";
				echo "</script>";
			}
			elseif($myacc != $acc){
				echo "<script>";
				echo "alert('Invalid account number')";
				echo "</script>";
			}
			elseif($myacc1 == $acc){
				echo "<script>";
				echo "alert('Account number already exists')";
				echo "</script>";
			}
			else{
				mysqli_query($dbco,$ser);
				echo "<script>";
				echo "alert('Please go to the bank for your account verification')";
				echo "</script>";
				header("Location: http://localhost/nb/signin.php");
			}
			
		}
	?>
  </form>
  
</div>


</body>
</html>
