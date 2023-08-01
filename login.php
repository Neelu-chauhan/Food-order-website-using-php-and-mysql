<?php 

//start session
session_start();
define('SITEURL','http://localhost/php%20course/food_website/');
$host="localhost";
$user="root";
$password="";
$name="food_web1";
$con=mysqli_connect($host,$user,$password,$name);
// $data=mysqli_query($con);
if($con){
	// echo "database connected";
}
else{
	echo "please check again";
}
 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LOGIN PAGE</title>
	<link rel="stylesheet" type="text/css" href="admin/admin.css">
	<style type="text/css">
		@media only screen and (max-width:960px){
	.login{
		width: 80%;
	}
}
		body
		{
			background-color: #0d40d9;
		}
	.login{
	width: 20%;
	border: 2px solid gray;
	margin:10% auto ;
	padding: 2%;
	background-color: whitesmoke;
/*	box-shadow: 2px 2px 2px 2px  black;*/
	box-shadow:  10px 10px 5px black;
	position: sticky;
}

.neelu1 input{
	padding: 2%;
	margin: 0.5%;
	width: 70%;
	font-weight: bold;
/*	background-color: white;*/
}
.neelu1 label{
	font-weight: bold;
}
.btn{
	background-color: #0f0d8f;
	padding: 2%;
	font-weight: bold;
	font-size: 1.1rem;
	color: black;
	border-radius: 7px 7px 7px 7px;
}
.btn:hover{
	background-color:blue ;
	color: black;
}
a{
	text-decoration: none;
}

	</style>
</head>
<body>
	<div class="login">	
		<h1 class="text-center"><b>Login</b></h1>
		<?php 
		if(isset($_SESSION['login']))
		{
			echo $_SESSION['login'];
			unset ($_SESSION['login']);

		}
		if(isset($_SESSION['no-login-messge']))
		{
			echo $_SESSION['no-login-messge'];
			unset ($_SESSION['no-login-messge']);
		}


		 ?>
		 <br><br>

		<form action="" method="POST" enctype="multipart/form-data">
		<div class="neelu1">
		<label>Username:</label><br>	
			<input type="name" name="name" placeholder="Enter username" required ><br><br>
		<label>Password:</label><br>	
			<input type="Password" name="pass" placeholder="Enter your Password" required><br><br>
	</div>
	<input type="submit" name="submit" value="Login" class=" btn "><br><br>





		</form>


		<p class="text-center"><b>Created by-<a href="neeelu">Neelu</a></b></p>
	</div>

</body>
</html>

<?php 
if(isset($_POST['submit']))
{
	// $name=$_POST['name'];
	$name=mysqli_real_escape_string($con,$_POST['name']);
	// $pass=$_POST['pass'];
	$pass=mysqli_real_escape_string($con,$_POST['pass']);

	// echo $name;
	$select="SELECT * FROM tbl_admin WHERE username='$name' AND password='$pass'";
	$data=mysqli_query($con,$select);
	$count=mysqli_num_rows($data);
	if($count==1)
	{
		// //user available
			$_SESSION['login']="<div class='btn-secondary'>Login successfull.</div>";
			$_SESSION['user']=$name; //check user logged or not
			header("Location:".SITEURL.'index.php');
	}
	else{

			$_SESSION['login']="<div class='btn-danger'>Username & password didn't same.</div>";
			header("Location:".SITEURL.'login.php');

	}
}


 ?>