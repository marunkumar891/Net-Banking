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
    <a href =Untitled-1.php><input type="button" name='back' value="Back" class="btn1"></a>
</div>

<div>
  <form action="/action_page.php" class="container" >

    <label for="Balance_enquiry"><b>Balance</b></label>
	<?php
		$dbcon = mysqli_connect('localhost',"root","",'nb');
		$query = "select balance from bank where acc_no = {$_COOKIE['login_user']}"; 
		$q = mysqli_query($dbcon,$query);
		$qt = mysqli_fetch_assoc($q);
		$bal = $qt['balance'];	
		echo "<input type='text' id='number' placeholder='Enter money' value = '$bal'  disabled><br><br>";
	?>
  </form>
</div>


</body>
</html>
