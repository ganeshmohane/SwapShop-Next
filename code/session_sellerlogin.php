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
  $sql="select * from seller_register where s_username='$username' and s_password='$password'";
  $result=mysqli_query($con,$sql);
  $row = mysqli_fetch_assoc($result);
  $email_verified_at=$row["s_email_verified_at"];
  $count= mysqli_num_rows($result);
  if($count>0)
  {
    if($email_verified_at!=NULL){
   
      $_SESSION["username"]=$row["s_username"];
    $_SESSION["password"]=$row["s_password"];
    $_SESSION["name"]=$row["s_firstname"];
    $_SESSION["surname"]=$row["s_surname"];
    $_SESSION["id"]=$row["s_id"];
        Header('Location:seller_dashboard.php');
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