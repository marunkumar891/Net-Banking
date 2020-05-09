

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
 margin-top:10%;
  max-width: 300px;
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text],input[type=number],input[type=password] {
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
  margin: 460px 563px;
  width:20%;
  height:50px;
  cursor: pointer;
  position:absolute;
}
input[type=number]::-webkit-inner-spin-button{
	-webkit-appearance: none;

</style>
</head>
<body>
<img src = "picture.jpg" height = "100%" width = '100%' class = "image"/>
<div>
    <a href =Untitled-1.php><input type="button" name='back' value="Back" class="btn1"></a>
</div>

<div>
	
  <form method ="post" class="container" >
    <label for="money"><b>Enter money </b></label>
    <input type="text" id="number" placeholder="Enter money" name="money" required autofocus><br><br>

    <label for="num"><b>Enter destination account no.</b></label>
    <input type="number" placeholder="Account no." name="num" required>

    <br><br>

    <button type="submit" name = 'sumb' class="btn" >Proceed</button>
	<?php
	$dbcon = mysqli_connect("localhost","root","","nb");
	if(isset($_POST['sumb'])){
		$money = $_POST['money'];
		$sent_acc = $_POST['num'];
		$query = "select acc_no from account where acc_no = {$sent_acc}";
		$q = mysqli_query($dbcon,$query);
		$qt = mysqli_fetch_assoc($q);
		$sent_acc1 = $qt['acc_no'];
		$query = "select balance from bank where acc_no = {$_COOKIE['login_user']}";
		$q = mysqli_query($dbcon,$query);
		$qt = mysqli_fetch_assoc($q);
		$balance = $qt['balance'];
		$query = "select acc_no from otherbank where acc_no = {$sent_acc}";
		$q = mysqli_query($dbcon,$query);
		$qt = mysqli_fetch_assoc($q);
		$ob = $qt['acc_no'];
		if($sent_acc == $_COOKIE['login_user']){
			echo '<script>';
			echo "alert('You have entered your account number')";
			echo "</script>";
		}
		else if($sent_acc1 != $sent_acc && $ob != $sent_acc){
			echo '<script>';
			echo "alert('The account number doesn\'t exist')";
			echo "</script>";
		}
		else if($balance < $money + $money*0.1){
			echo '<script>';
			echo "alert('You have insufficient balance')";
			echo "</script>";
		}
		else if($ob == $sent_acc){
			$query = "select CURRENT_DATE() as da from otherbank";
			$q = mysqli_query($dbcon,$query);
			$qt = mysqli_fetch_assoc($q);
			$date = $qt['da'];
			$query = "select CURRENT_TIME() as da from otherbank";
			$q = mysqli_query($dbcon,$query);
			$qt = mysqli_fetch_assoc($q);
			$time = $qt['da'];	
			$query = "select balance from otherbank where acc_no = {$sent_acc}";
			$q = mysqli_query($dbcon,$query);
			$qt = mysqli_fetch_assoc($q);
			$bal = $qt['balance'];	
			$query = "update bank set balance = $balance - $money where acc_no = {$_COOKIE['login_user']}";
			$q = mysqli_query($dbcon,$query);
			$query = "insert into `transac` (myac,opac,date,clock,money) values ({$_COOKIE['login_user']},{$sent_acc},'{$date}','{$time}',{$money})";
			mysqli_query($dbcon,$query);
			$query = "update otherbank set balance = $bal + $money where acc_no = {$ob}";
			$q = mysqli_query($dbcon,$query);
			if($money > 50000){
				$balance = $balance - $money*0.01;
				$query = "update bank set balance = $balance - $money*0.01 where acc_no = {$_COOKIE['login_user']}";
				$q = mysqli_query($dbcon,$query);
				$mon = -1;
				$mon1 = $money*0.01;
				$query = "insert into `transac` (myac,opac,date,clock,money) values ({$_COOKIE['login_user']},{$mon},'{$date}','{$time}',{$mon1})";
				$q = mysqli_query($dbcon,$query);
			}
			echo '<script>';
			echo "alert('Your transaction is successful')";
			echo "</script>";
		}
		else{
			$query = "select balance from otherbank where acc_no = {$sent_acc}";
			$q = mysqli_query($dbcon,$query);
			$qt = mysqli_fetch_assoc($q);
			$bal = $qt['balance'];	
			$query = "select country from address where acc_no = {$_COOKIE['login_user']}";
			$q = mysqli_query($dbcon,$query);
			$qt = mysqli_fetch_assoc($q);
			$cot = $qt['country'];
			$query = "select country from address where acc_no = {$sent_acc}";
			$q = mysqli_query($dbcon,$query);
			$qt = mysqli_fetch_assoc($q);
			$cot1 = $qt['country'];
			$query = "select CURRENT_DATE() as da from bank where acc_no = {$sent_acc}";
			$q = mysqli_query($dbcon,$query);
			$qt = mysqli_fetch_assoc($q);
			$date = $qt['da'];
			$query = "select CURRENT_TIME() as da from bank where acc_no = {$sent_acc}";
			$q = mysqli_query($dbcon,$query);
			$qt = mysqli_fetch_assoc($q);
			$time = $qt['da'];			
			$query = "update bank set balance = $balance - $money where acc_no = {$_COOKIE['login_user']}";
			$q = mysqli_query($dbcon,$query);
			$query = "update bank set balance = $bal + $money where acc_no = {$sent_acc}";
			$q = mysqli_query($dbcon,$query);
			$query = "insert into `transac` (myac,opac,date,clock,money) values ({$_COOKIE['login_user']},{$sent_acc},'{$date}','{$time}',{$money})";
			mysqli_query($dbcon,$query);
			if($money > 50000 || $cot1 != $cot){
				$balance = $balance - $money*0.01;
				$query = "update bank set balance = $balance - $money*0.01 where acc_no = {$_COOKIE['login_user']}";
				$q = mysqli_query($dbcon,$query);
				$mon = -1;
				$mon1 = $money*0.01;
				$query = "insert into `transac` (myac,opac,date,clock,money) values ({$_COOKIE['login_user']},{$mon},'{$date}','{$time}',{$mon1})";
				$q = mysqli_query($dbcon,$query);
			}
			echo '<script>';
			echo "alert('Your transaction is successful')";
			echo "</script>";
		}
	}	
  ?>
  </form>
 
</div>


</body>
</html>