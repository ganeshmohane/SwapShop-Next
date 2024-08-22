<?php
session_start();
$server="sql202.infinityfree.com";
$username="if0_34562582";
$password="LH6pXpZlrH";
$dbname="if0_34562582_swap";
$con = mysqli_connect($server,$username,$password,$dbname);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
else
 {
   $username=$_POST["un"];
   $password=$_POST["pw"];
  $sql="select * from user_data where username='$username' and password='$password'";
  $result=mysqli_query($con,$sql);
  $row = mysqli_fetch_assoc($result);
  $email_verified_at=$row["email_verified_at"];
  $count= mysqli_num_rows($result);
  if($count>0)
  { if($email_verified_at!=NULL){
   
    $_SESSION["username"]=$row["username"];
    $_SESSION["password"]=$row["password"];
    $_SESSION["name"]=$row["firstname"];
    $_SESSION["surname"]=$row["surname"];
    $_SESSION["id"]=$row["id"];
        Header('Location:home_page.php');
        exit();}
    else{
          Header('Location:login_page.php');
          exit(); 
        }

   }    
  else
  {	
    Header('Location:login_page.php');
    exit();  
    
  }	
 	

 }
?>