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



/* Add styles to the form container */
.container {
  position: absolute;
 margin-left: 40%;
 margin-top:8%;
  max-width: 300px;
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
</style>
</head>
<body>
<img src = "picture.jpg" height = "100%" width = '100%' class = "image"/>

<div>
  <form method="post" class="container" >
    <h1><center>Sign in</center></h1>

    <label for="email"><b>Username</b></label>
    <input type="text" placeholder="Enter name" name="name" autofocus required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <button name = 'subm' type="submit" class="btn" >Sign in</button>
	<center><font size = "2"><a href = "http://localhost/nb/signup.php">Don't you have an account?, click here to signup</a></font></center>
    <?php
		$dbcon = mysqli_connect("localhost","root","","nb");
		if(!$dbcon){
			die("connecting error");
		}
		if(isset($_POST['subm'])){
			$myusername = $_POST['name'];
			$mypassword = $_POST['psw'];
			$query = "select acc_no from account where username = '$myusername' and password = '$mypassword'"; 
			$q = mysqli_query($dbcon,$query);
			$qt = mysqli_fetch_assoc($q);
			$count = $qt['acc_no'];
			if($count){
				setcookie('login_user',$count,time() + 86400);
				header("Location: Untitled-1.php");
			}
			else{
				echo "<script>";
				echo "alert('Invalid Username or Paassword')";
				echo "</script>";
			}
		}
	?>
  </form>
</div>




</body>
</html>
