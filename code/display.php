<!DOCTYPE html>
<head>
        <title>Display</title>
        <link rel="stylesheet" href="css/display.css">

</head>
<body>
<div class="main">

<?php
    session_start();
    $p_id=$_GET['p_id'];
    
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
                $sql="SELECT * FROM product_data WHERE p_id='$p_id'";
                $result=mysqli_query($con,$sql);
                $count=mysqli_num_rows($result);
                $row=mysqli_fetch_array($result);
              
                ?>
                <div class="img_card">
                <img src="img/<?php echo $row['image']; ?>" width="200px">
                <div style="text-transform:uppercase;"><?php echo $row['title']; ?></div>
                <p style="text-decoration:underline"><?php echo "Category: ".$row['category']; ?><br></p>
                <?php echo "Price: ".$row['price']."/- (In rupee)";?> <br><?php
                echo "Description: ".$row['descriptions'];?>
                                        
                
                <form method="POST" action="">
                <button type="submit" name="submit" class="registerbtn">Claim</button>
                </form>
        </div>                    
                <?php
                if(isset($_POST['submit']))
                {   
                        $u_id=$_SESSION["id"];
                        $s_id=$row['s_id'];
                        date_default_timezone_set("Asia/Kolkata");
                        $date=date("Y-m-d");
                        $time=date("h:i:s a"); 
                        
                        $ptr1=0;
                        $sql="SELECT * FROM claims";
                        if($result=mysqli_query($con,$sql))
                        {
                          if(mysqli_num_rows($result)>0)
                          {   
                              while($row=mysqli_fetch_array($result))
                              {
                                  if($p_id==$row["p_id"]&&$u_id==$row["u_id"]&&$s_id==$row["s_id"]){$ptr1=1;}
                              }
                          }
                        }

                        $sql="SELECT * FROM user_data WHERE id=$u_id";
                        $result=mysqli_query($con,$sql);
                        $row=mysqli_fetch_array($result);
                        $u_e=$row["email"];

                        $sql="SELECT * FROM seller_register WHERE s_id=$s_id";
                        $result=mysqli_query($con,$sql);
                        $row=mysqli_fetch_array($result);
                        $s_e=$row["s_email"];

                        $ptr2=0;
                        if($u_e==$s_e){$ptr2=1;}

                        if($ptr1!=1)
                        {
                                if($ptr2!=1)
                                {
                                        $sql="INSERT INTO claims (`p_id`, `u_id`, `s_id`, `date`, `time`, `status`) VALUES ('$p_id','$u_id','$s_id','$date','$time',NULL)";
                                        $result=mysqli_query($con,$sql);
                                                                
                                        if($result) 
                                                {echo '<script type="text/javascript"> alert("Your order is placed.Wait for Acceptance by Seller.")</script>';}
                                        else
                                                { echo '<script type="text/javascript"> alert("Failed to accept your claim")</script>';}
                                }
                                else{ echo '<script type="text/javascript"> alert("It is your own product.you cannot claim it.")</script>';}
                        }
                        else{ echo '<script type="text/javascript"> alert("You already claimed this product.")</script>';}

                       
                }        
        }
?>
        </div>
</body>
</html>

<!-- 
$con = mysqli_connect("localhost","root","","swapshop_next");

                        
                
 
                -->