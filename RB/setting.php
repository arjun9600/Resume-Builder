<!DOCTYPE html>
<html>
<head>
	<title>RB</title>
  <?php require 'assets/function.php'; ?>
	<?php require "assets/autoloader.php" ?>
	<?php require "assets/sessions.php" ?>
	<style type="text/css">
	<?php include 'css/myStyle.css'; ?>		

	.treb{font-family: arial}
.flex{display: flex}
.hub-top {position: fixed;top: 0;z-index: 20;width: 100%;;height: 111px;}
.logo{padding:27px 5px 27px 27px;}
.logo i{color: white;font-size: 77pt}
.login{margin: 11px; color:white;}
.m1{margin: 1px}
.dashboard{background: #141414;position: fixed;height: 100%;width: 15%;box-shadow: 2px 2px 22px black;padding-top: 111px;}
.dashboard ul{list-style: none;padding: 0}
.dashboard ul li{color: #B54A00;padding: 6px 22px;display: block;font-size: 13.5pt;box-shadow: 1px 2px 2px black;margin-top: 3px;font-family: impact;letter-spacing: 1px; line-height:40px}
.dashboard ul li:hover{box-shadow: 0px 0px 3px #ff6900;cursor: pointer;color: #ff6900;}
.settingbtn {color:#B54A00; letter-spacing: 1px; padding: 1px 11px; font-size: 13.5pt ;font-family: impact; background: #141414;}
.settingbtn:hover{box-shadow: 0px 0px 3px #ff6900;cursor: pointer;color: #ff6900;} 
.dashboard ul li i{float: left;padding-top: 12px;}
.admin-pic{position: relative;top: -88px;left: 33px}
.admin-name{position: relative;top: -166px;left: 166px;font-size: 13pt;}
.admin-pic img{width: 111px ;height: 111px}
.name{text-align:center; font-size: 15px;}
.center{text-align: center;}
a:hover {text-decoration:none;}
.pa{color:#ff6900;font-family: impact;font-size:40px}
.but{height: 35px; width:340px;background: #141414;color: #B54A00;font-family:impact;letter-spacing: 1px;font-size:17px;border-color:#141414}
.but:hover{box-shadow: 0px 0px 3px #ff6900;cursor: pointer;color: #ff6900;} 

</style>
</head>
<body style="background: url(photo/bg2.jpg) fixed;">


<div class="background-image"></div>
<div class="hub-top">
	<div class="logo flex pull-left ">
		<a href="index.php"><img src="photo/logo.png" style=" height: 57px; width: 82px;"></a>
	</div>

	<div class="login pull-right " style="margin-right: 33px;margin-top:33px">
		<div><img src="photo/user.png" class="img-responsive" style="width: 55px;margin:auto;"></div>
		<div class="treb name "><span ><?php echo userName(); ?></span><br>
								<a href="setting.php"><button class="settingbtn">Setting</button></a>
		</div>

	</div>

</div>
<div class="dashboard treb " style="background-color: rgba(0, 0, 0, 0.4);  opacity: inherit;">

	<ul>
		<a href="index.php" ><li><i class="fa fa-home fa-fw"></i> Home</li></a>
		<a href="newCv.php"><li><i class="fa fa-edit fa-fw"></i> Build New CV</li></a>
		<a href="savedCv.php"><li><i class="fa fa-user-circle fa-fw"></i>Saved CV's</li></a>
		<a href="contactUs.php"><li><i class="fa fa-phone fa-fw"></i> Contact Us</li></a>
    	<a href="setting.php"><li  style="background: #141414; color: #ff6900;"><i class="fa fa-gear fa-fw"></i>Account Setting</li></a>
		<a href="logout.php"><li><i class="fa fa-sign-out fa-fw"></i> Logout</li></a>
	</ul>
</div>

<div class="well well-sm" style="margin-left: 15.5%;padding-top: 160px;background-color: rgba(0, 0, 0, 0);  opacity: inherit;">
  <div class="panel panel-primary" style="width: 100%;margin:auto">
  		<div class="pa center"><h3>Change Account Setting</h3></div>
  		<div class="panel-body center">
  			<form method="POST">
          <label>Name</label> 
          <input type="text" name="name" value="<?php echo userName(); ?>" class='form-control' style='width: 55%;margin:auto' required>
          <label>Username</label> 
          <input type="text" name="username" value="<?php echo user(); ?>" class='form-control' style='width: 55%;margin:auto' required>
          <label>Password</label>
          <input type="password" name="password" value="<?php echo pass(); ?>"  placeholder="password" class='form-control' style='width: 55%;margin:auto' required>  
          <button class="but " style="width: 55%;margin: auto;margin-top:4px;" type="submit" name="update">Update</button>
        </form><br>
  		</div>

  </div>
 
   
</div>

</body>
</html>

<?php 
// if (isset($_POST['update']))
// {
//   echo "<script>alert('checking. hali is pr kam krne intzar kr')</script>";  
// }

// if (isset($_POST['update'])) 
// {
// 	$user = $_POST['username'];
// 	 $_SESSION["username"] = $_POST["username"];  
//       $_SESSION['last_login_timestamp'] = time(); 
//     $pass = $_POST['password'];
//     $con = new mysqli('localhost','root','','cv');

//     $result = $con->query("Update users SET password='$pass' WHERE username='$user'");
// }



if (isset($_POST['update'])) 
{
	// session_start();
	$user = $_POST['username'];
	 $_SESSION["username"] = $_POST["username"];  
      $_SESSION['last_login_timestamp'] = time(); 
    $pass = $_POST['password'];
    $con = new mysqli('localhost','root','','cv');

    $result = $con->query("Update users SET password='$pass' WHERE username='$user'");
    session_destroy();
}
 ?>

 ?>