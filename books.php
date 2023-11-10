<!DOCTYPE html>
<head><title>Books</title>
<link rel="stylesheet" href="css/books.css">
</head>
<body>
<div class="main">
    








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
                                    
                                        
                                        $sql="SELECT * FROM product_data WHERE category='book' ORDER BY price ASC"; 
                                        
                                        if($result=mysqli_query($con,$sql))
                                        {  if(mysqli_num_rows($result)>0)
                                            {?>
                                            <div class="table">
                                                <h3><p>Category:- Books</p></h3><hr>
                                                <table >
                                                <?php 

                                                    while ($row=mysqli_fetch_array($result)) 
                                                    { $check=$row["deleted"];
                                                                                                
                                                        if(isset($check)){}
                                                         else{   ?>
                                                        <tr>
                                                            <td class="text-center" ><a href="display.php?p_id=<?php echo $row['p_id']; ?>"><img src="img/<?php echo $row['image']; ?>" width="200px"></a></td>
                                                            <td class="text-center"  ><p><b><a href="display.php?p_id=<?php echo $row['p_id']; ?>"><div style="text-transform:uppercase;"><?php echo $row['title']; ?></div></a></b></p>
                                                            <p><?php echo "Category: ".$row['category']; ?></p>
                                                            <p><b><?php echo "Price: ".$row['price']."/- </b><br>(In rupee)"; ?></p>
                                                            
                                                        </tr>
                                                        <?php }
                                                    }?>
                                                </table>
                                            </div>
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
</body>
                                
</html>