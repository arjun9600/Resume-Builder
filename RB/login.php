<!DOCTYPE html>
<html>
<head>
	<title>RB</title>
	<?php require "assets/autoloader.php" ?>
	<style type="text/css" id="#some2">
	<?php include 'css/myStyle.css'; ?>
	.loginDiv{width: 366px;float: right;margin-right: 111px;margin-top:100px;background-color: rgba(0, 0, 0, 0.4); border: 1px solid #ff6900; opacity: inherit;;text-align: center;padding: 11px;box-shadow: 2px 1px 22px #000000}	
	.loginDiv h2 span{ color: white;text-shadow: 2px 2px 11px black;}
	.loginDiv input{border-radius: 0}
	.loginDiv button{border-radius: 0}
	.m1{margin-top: 2px}
	.logo{padding:27px 5px 27px 27px;}
	.flex{display: flex}
	.but{background: #141414 ; height: 35px; width:340px;font-family: impact; letter-spacing: 1px;font-size:17px;color:#B54A00}
	.but:hover{box-shadow: 0px 0px 3px #ff6900;cursor: pointer;color: #ff6900;} 
	.h2{font-family: impact;letter-spacing: 1px;}
	.or{font-size: 23px;font-family: arial;}
	</style>
</head>
<body style="background: url('photo/bg2.jpg');background-size: 100%">
	<div class="logo flex pull-left ">
		<a href="index.php"><img src="photo/logo.png" style=" height: 57px; width: 82px;"></a>
	</div>
	<div class="loginDiv">
		<h2><span class="h2">Login</span></h2>
		<form method="POST" >
			<input type="text" name="username" placeholder="username" required class="form-control">
			<input type="password" name="password" placeholder="password" required class="form-control">
			<button type="Submit" name="login" class=" but btn-successtn m1">SIGN IN</button>
		</form>
		<hr>
		<h2><span class="or">OR</span></h2>
		<hr>
		<h2><span class="h2">Register</span></h2>
		<form method="POST">
			<input type="text" name="Rname" placeholder="Enter your name" required class="form-control">
			<input type="text" name="Rusername" placeholder="username" required class="form-control">
			<input type="password" name="Rpassword" placeholder="password" required class="form-control">
			<button name="register" class=" but btn-successtn m1">SIGN UP</button>
		</form>
	</div>
</body>
</html>

<?php 
if (isset($_POST['register'])) {
$conn = new mysqli('localhost','root','','cv');
$name = $_POST["Rname"];
$user = $_POST["Rusername"];
$pass = $_POST["Rpassword"];

$check_users = mysqli_query($conn, "SELECT username FROM users where username = '$user' ");
if(mysqli_num_rows($check_users) > 0){
    // echo('User Already exists');
	echo 
     	"<script>
     		alert('User Already exists please login');
     	</script>";
}
else{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $result = mysqli_query($conn, "INSERT INTO users (name, username, password) VALUES ('$name', '$user', '$pass')");
}
    // echo('Registered Successfully');
    echo 
     	"<script>
     		alert('Registered Successfully');
     	</script>";
}

	// $con = new mysqli('localhost','root','','cv');
 // 	$con->query("insert into users (name,username,password) values ('$_POST[Rname]','$_POST[Rusername]','$_POST[Rpassword]')"); 
 //    echo "<script>window.location.href='login2.php'</script>";
}
if (isset($_POST['login'])) 
{
	$user = $_POST['username'];

    $pass = $_POST['password'];
    $con = new mysqli('localhost','root','','cv');

    $result = $con->query("select * from users where username='$user' AND password='$pass'");
    if($result->num_rows>0)
    {	
    	session_start();
    	$data = $result->fetch_assoc();
    	$_SESSION['userId']=$data['id'];
    	$_SESSION["username"] = $_POST["username"];  
    $_SESSION['last_login_timestamp'] = time(); 
    	header('location:index.php');
  
    }
    else
    {
     	echo 
     	"<script>
     		alert('Username or Password Incorrect');
     	</script>";
    }
}

 ?>