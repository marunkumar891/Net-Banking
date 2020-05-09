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
  top:0;
  left:0;
  margin-left:30%;
  margin top:20%;
  max-width: 300px;
  padding: 16px;
}
.bg-img{
    position:absolute;
    top:0;
    left:0;
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
  margin: 20px 190px;
  cursor: pointer;
  position:absolute;
}


</style>
</head>
<body>
<img src = "picture.jpg" height = "100%" width = '100%' class = "bg-image"/>

<div>
   
</div>

	<div class = 'container'>
	<form method = "post">
		<?php
			$dbcon = mysqli_connect("localhost","root","","nb");
			$query = "select * from transac where myac = {$_COOKIE['login_user']} or opac = {$_COOKIE['login_user']}"; 
			$q = mysqli_query($dbcon,$query);
			$qt = mysqli_fetch_assoc($q);
			if($qt){
			
			$query = "select * from transac where myac = {$_COOKIE['login_user']} or opac = {$_COOKIE['login_user']}"; 
			$q = mysqli_query($dbcon,$query);
			
			echo "<table border = '1' bgcolor = 'white'> <tr><th>From</th><th>To</th><th><pre>    Money    </pre></th><th style=\"width:100\"><pre>       Date        </pre></th><th>Time</th></tr>";
			while($qt = mysqli_fetch_assoc($q)){
			if($qt['opac'] == -1){
				$b = "To bank";
				echo "<tr><td>{$qt['myac']}</td><td>{$b}</td><td>{$qt['money']}</td><td style=\"width:100\">{$qt['date']}</td><td>{$qt['clock']}</td></tr>";
			}
			else{
			echo "<tr><td>{$qt['myac']}</td><td>{$qt['opac']}</td><td>{$qt['money']}</td><td style=\"width:100\">{$qt['date']}</td><td>{$qt['clock']}</td></tr>";
			
			}
			}
			echo "</table>";
			}
		?>
		 <a href =Untitled-1.php class="btn1">Back</a>
	</form>
	</div>
</body>
</html>