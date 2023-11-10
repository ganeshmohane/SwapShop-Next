<!DOCTYPE html>
<head><title>Search</title>
<link rel="stylesheet" href="css/search.css">
</head>
    <body>
        <div class="main">
        <div class="search">
                            <center><form method="POST" action="search_mid.php">
                            <input type="text" name="search" placeholder="search here..." size="12" required/>
                            <button type="submit"  class="registerbtn">search</button>
                            </form></center>
                            <br>
                            <hr>
        </div>
  
<?php session_start();
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
                                    
                                        $search=$_SESSION['search'];
                                        $sql1="SELECT * FROM product_data WHERE title like '%$search%' ORDER BY price ASC"; 
                                        $sql2="SELECT * FROM product_data WHERE category like'%$search%' ORDER BY price ASC"; 
                                        $sql3="SELECT * FROM product_data WHERE price like '%$search%' ORDER BY price ASC "; 
                                        $sql4="SELECT * FROM product_data WHERE descriptions like '%$search%' ORDER BY price ASC"; 
                                       
                                        $result1=mysqli_query($con,$sql1);
                                        $result2=mysqli_query($con,$sql2);
                                        $result3=mysqli_query($con,$sql3);
                                        
                                        
                                        if(mysqli_num_rows($result1)>0){ $query=$sql1;  }
                                        elseif(mysqli_num_rows($result2)>0){$query=$sql2;}
                                        elseif(mysqli_num_rows($result3)>0){$query=$sql3;}
                                        else{$query=$sql4;}
                                        
                                        if($result=mysqli_query($con,$query))
                                        {  if(mysqli_num_rows($result)>0)
                                            {?>
                                            <div class="results">
                                                <h3><p>You searched for <i><b><?php echo"$search"?></b></i></p></h3>
                                                <table >
                            
                                                        <tr>
                                                            
                                                        </tr><?php

                                                    while ($row=mysqli_fetch_array($result)) 
                                                    { $check=$row["deleted"];
                                                                                                
                                                        if(isset($check)){}
                                                         else{ 
                                                                                                
                                                        ?>
                                                        <tr>
                                                            <td class="text-center" ><a href="display.php?p_id=<?php echo $row['p_id']; ?>"><img src="img/<?php echo $row['image']; ?>" width="200px"></a></td>
                                                            <td class="text-center"  ><p><b><a href="display.php?p_id=<?php echo $row['p_id']; ?>"><div style="text-transform:uppercase;"><?php echo $row['title']; ?></div></a></b></p>
                                                            <p><?php echo "Category: ".$row['category']; ?></p>
                                                            <p><b><?php echo "Price: ".$row['price']."/- </b><br>(In rupee)"; ?></p>
                                                            </td>
                                                        </tr>
                                                        <?php }
                                                    }?>
                                                </table>
                                            <?php
                                            mysqli_free_result($result);
                                            
                                            }
                                            else
                                            {
                                                echo "No matching records are found";
                                            }
                                        }

                                    }
                                ?>
                                            </div>
        </div>
</body>
</html>