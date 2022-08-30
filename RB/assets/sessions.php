<?php
session_start();
 if(isset($_SESSION["username"]))  
      {  
           if((time() - $_SESSION['last_login_timestamp']) > 10000) // 900 = 15 * 60  
           {  
                header("location:logout.php");
                
           }  
      }  
      else  
      {  
           header('location:login.php');  
      } 
if(!isset($_SESSION['userId']))
{
  header('location:login.php');
}
 ?>