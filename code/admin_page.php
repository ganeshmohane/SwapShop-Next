<?php
   session_start();
   ?>
<html>
   <head>
   <link rel="stylesheet" href="css/admin_page.css">
   </head>
   <body>
      <div class="main">
         <?php 
            if (isset($_SESSION['username'])) 
                    {    ?>
         <div style="text-align:center; text-weight:bolder; font-size: 30px;">
            <?php echo "welcome ". $_SESSION['name']; echo " ".$_SESSION['surname'];?>
            <button><a href="session_logout.php">logout</a></button>
            <hr>
         </div>
         <?php 
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
            
                
                $sql="SELECT * FROM user_data  ORDER BY id DESC"; 
                
                if($result=mysqli_query($con,$sql))
                {  if(mysqli_num_rows($result)>0)
                    { 
                    ?>
         <h2>
            <p>List of USERS on SWAPSHOP</p>
         </h2>
         <table >
            <tr>
               <th class="text-center" width="5%">Name</th>
               <th class="text-center" width="5%">Gender</th>
               <th class="text-center" width="5%">College</th>
               <th class="text-center" width="5%">Stream</th>
               <th class="text-center" width="5%">Branch</th>
               <th class="text-center" width="5%">Semester</th>
            </tr>
            <?php
               while ($row=mysqli_fetch_array($result)) 
               {                                       
                   ?>
            <tr>
               <td class="text-center" align="center" width="5%"><?php echo $row['firstname']." ".$row['surname']; ?></td>
               <td class="text-center" align="center" width="5%"><?php echo $row['gender']; ?></td>
               <td class="text-center" align="center" width="5%"><?php echo $row['college']; ?></td>
               <td class="text-center" align="center" width="5%"><?php echo $row['stream']; ?></td>
               <td class="text-center" align="center" width="5%"><?php echo $row['branch']; ?></td>
               <td class="text-center" align="center" width="5%"><?php echo $row['sem']; ?></td>
            </tr>
            <?php 
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
            ?>
         <hr>
         <?php
            $sql="SELECT * FROM seller_register  ORDER BY s_id DESC"; 
                
                if($result=mysqli_query($con,$sql))
                {  if(mysqli_num_rows($result)>0)
                    { 
                    ?>
         <h2>
            <p>List of SELLER on SWAPSHOP</p>
         </h2>
         <table >
            <tr>
               <th class="text-center" width="5%">Name</th>
               <th class="text-center" width="5%">Gender</th>
               <th class="text-center" width="5%">College</th>
               <th class="text-center" width="5%">Stream</th>
               <th class="text-center" width="5%">Branch</th>
               <th class="text-center" width="5%">Semester</th>
            </tr>
            <?php
               while ($row=mysqli_fetch_array($result)) 
               {                                       
                   ?>
            <tr>
               <td class="text-center" align="center" width="5%"><?php echo $row['s_firstname']." ".$row['s_surname']; ?></td>
               <td class="text-center" align="center" width="5%"><?php echo $row['s_gender']; ?></td>
               <td class="text-center" align="center" width="5%"><?php echo $row['s_college']; ?></td>
               <td class="text-center" align="center" width="5%"><?php echo $row['s_stream']; ?></td>
               <td class="text-center" align="center" width="5%"><?php echo $row['s_branch']; ?></td>
               <td class="text-center" align="center" width="5%"><?php echo $row['s_sem']; ?></td>
            </tr>
            <?php 
               }?>
         </table>
         <hr>
      </div>
      <?php
         mysqli_free_result($result);
         
         }
         else
         {
             echo "No matching records are found";
         }
         }

         
            $sql="SELECT * FROM msg  ORDER BY m_id DESC"; 
                
                if($result=mysqli_query($con,$sql))
                {  if(mysqli_num_rows($result)>0)
                    { 
                    ?>
         <h2>
            <p>List of Grievance & Suggestions</p>
         </h2>
         <table >
            <tr>
               <th class="text-center" width="5%">From</th>
               <th class="text-center" width="5%">type</th>
               <th class="text-center" width="5%">subject</th>
               <th class="text-center" width="5%">Message</th>
               <th class="text-center" width="5%">date & time</th>
            </tr>
            <?php
               while ($row=mysqli_fetch_array($result)) 
               {  if($row['u_id']==0)
                  {  $y=$row['s_id'];
                     $sql="SELECT * FROM seller_register WHERE s_id=$y "; 
                  $result1=mysqli_query($con,$sql);
                  $row1=mysqli_fetch_array($result1); 
                  $name=$row1['s_firstname'];
                  $surname=$row1['s_surname'];
                  $x="seller";
                  }else{
                     $y=$row['u_id'];
                  $sql="SELECT * FROM user_data WHERE id=$y "; 
                  $result2=mysqli_query($con,$sql);
                  $row2=mysqli_fetch_array($result2); 
                  $name=$row2['firstname'];
                  $surname=$row2['surname'];
                  $x="user";
                  }
                   ?>
            <tr>
               <td class="text-center" align="center" width="5%"><?php echo $name." ".$surname; ?><br><?php echo $x; ?><br><?php echo $row['email']; ?></td>
               <td class="text-center" align="center" width="5%"><?php echo $row['type']; ?></td>
               <td class="text-center" align="center" width="5%"><?php echo $row['subject']; ?></td>
               <td class="text-center" align="center" width="5%"><?php echo $row['msg']; ?></td>
               <td class="text-center" align="center" width="5%"><?php echo $row['date']; ?><br><?php echo $row['time']; ?></td>
               
            </tr>
            <?php 
               }?>
         </table>
         <hr>
      </div>
      <?php
         mysqli_free_result($result);
         
         }
         else
         {
             echo " No Grievance & Suggestions";
         }
         }

         }
         }                      
         else 
         { ?>
         <div style="text-align:center; color:red; text-weight:bolder; text-decoration:underline;">
      <h3>You have been LOGGED OUT !!</h3>
      <h3>LOGIN First !!</h3></div>
      <?php
         }   
         ?>
   </body>
</html>