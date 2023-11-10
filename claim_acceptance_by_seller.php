<?php
$claim_id=$_GET["claim_id"];
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


$server="sql202.infinityfree.com";
$username="if0_34562582";
$password="LH6pXpZlrH";
$dbname="if0_34562582_swap";
$con = mysqli_connect($server,$username,$password,$dbname);
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql="SELECT * FROM claims WHERE claim_id=$claim_id "; 
$result2=mysqli_query($con,$sql);
$row2=mysqli_fetch_array($result2);
$p_id=$row2["p_id"];
$u_id=$row2["u_id"];
$s_id=$row2["s_id"];
$claim_date=$row2["date"];
$claim_time=$row2["time"];

$sql="SELECT * FROM product_data WHERE p_id=$p_id "; 
$resultx=mysqli_query($con,$sql);
$rowx=mysqli_fetch_array($resultx);
$title=$rowx["title"];
$cat=$rowx["category"];
$price=$rowx["price"];
$des=$rowx["descriptions"];

$sql="SELECT * FROM user_data WHERE id=$u_id "; 
$resulty=mysqli_query($con,$sql);
$rowy=mysqli_fetch_array($resulty);
$un=$rowy["firstname"];
$us=$rowy["surname"];
$ug=$rowy["gender"];
$uc=$rowy["college"];
$ust=$rowy["stream"];
$ub=$rowy["branch"];
$usem=$rowy["sem"];
$ue=$rowy["email"];
$up=$rowy["phone"];

$sql="SELECT * FROM seller_register WHERE s_id=$s_id "; 
$resulty=mysqli_query($con,$sql);
$rowy=mysqli_fetch_array($resulty);
$sn=$rowy["s_firstname"];
$ss=$rowy["s_surname"];
$sg=$rowy["s_gender"];
$sc=$rowy["s_college"];
$sst=$rowy["s_stream"];
$sb=$rowy["s_branch"];
$ssem=$rowy["s_sem"];
$se=$rowy["s_email"];
$sp=$rowy["s_phone"];

$sql3="UPDATE `claims` SET `status`=if(claim_id=$claim_id,1,0) WHERE p_id=$p_id";
$result3=mysqli_query($con,$sql3);
if($result3)
{
    $sql4="UPDATE `product_data` SET deleted='deleted' WHERE p_id=$p_id"; 
    $result4=mysqli_query($con,$sql4);
   
                                                                                
}
if($result4)
{   $sql="SELECT * FROM user_data WHERE id=$u_id"; 
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($result);
    $email=$row["email"];
    $name=$row["firstname"];
    $surname=$row["surname"];
    $filename=$claim_id.'-'.$name.'-'.$date=date("Y-m-d").'.pdf';

    

    require 'vendor/autoload.php';
    require_once __DIR__ . '/vendor/autoload.php';
    
    $mail = new PHPMailer(true);
    $mpdf = new \Mpdf\Mpdf();
    $mpdf->SetDirectionality('L');
    $mpdf->AddPage('L');
    

    $data='';
    $data .='<p><h1 style="color:#4f0079; font-family:impact,sans-serif; font-size:40px; ">SWAPSHOP</h1><p align="right">Invoice Number:'.$claim_id.$u_id.$s_id.$p_id.'</p></p> <hr> ';
    $data .='<table border="1" style="border-collapse: collapse" width="100%" >
                <tr style="font-weight: bold"  >
                                    <td  width="100%" colspan="4" height="50px" >
                                        <strong>Order ID:'.$claim_id.'</strong><br><br><br>
                                        <strong>Order Date:</strong>'.$claim_date.'<br><br><br>
                                        <strong>Invoice Date:</strong>'.date("Y-m-d").'<br><br><br>
                                    </td>
                                    <td  width="100%" colspan="4" height="50px" >
                                        <strong>Bill To <br>'.$un.' '.$us.'</strong><br>
                                        '.$ug.'<br><br>
                                        '.$uc.'<br>
                                        '.$ust.'<br>
                                        '.$ub.'<br>
                                        '.$usem.'<br><br>
                                        '.$ue.'<br>
                                        '.$up.'<br>
                                    </td>
                                    <td  width="100%" colspan="4" height="50px" >
                                        <strong>Bill from <br>'.$sn.' '.$ss.'</strong><br>
                                        '.$sg.'<br><br>
                                        '.$sc.'<br>
                                        '.$sst.'<br>
                                        '.$sb.'<br>
                                        '.$ssem.'<br><br>
                                        '.$se.'<br>
                                        '.$sp.'<br>
                                    </td>
                                    
                </tr>
                </table><hr>';
    $data .='<table border="1" style="border-collapse: collapse" width="100%" >
                <tr style="font-weight: bold"  >
                                    
                                        <th width="55%" colspan="2" height="50px">Product</th>
                                        <th width="15%" colspan="4" height="50px">Category</th>
                                        <th width="15%" colspan="4" height="50px">Quantity</th>
                                        <th width="15%" colspan="6" height="50px">Price</th>
                </tr>
                <tr style="font-weight: bold"  >
                                    <td  width="55%" colspan="2" height="50px" >
                                        <strong><div style="text-transform:uppercase;">'.$title.'</div> </strong><br><br>'.$des.'<br>
                                       
                                    </td>
                                    <td align="center" width="15%" colspan="4" height="50px" >
                                    '.$cat.'
                                    </td>
                                    <td align="center" width="15%" colspan="4" height="50px" >
                                    1
                                    </td>
                                    <td align="center" width="15%" colspan="6" height="50px" >
                                    '.$price.'
                                    </td>
                </tr>
                <tr style="font-weight: bold"  >
                                    <td align="center" width="85%" colspan="10"  height="50px" >
                                        <strong>Grand Total </strong>
                                       
                                    </td>
                                    <td align="center" width="15%" colspan="6"  height="50px" >
                                    <strong>'.$price.'/- </strong>
                                    </td>
                                    
                </tr>
                </table><hr><p align="center">This is a computer generated invoice.No signature required.</p>';
                $data .='<p><i>The good sold as are intended for end user consumption and not for re-sale.</i><p align="right" color="#4f0079">Team SWAPSHOP</p></p>';
    $mpdf->WriteHTML($data);
    $attachment = $mpdf->Output($filename,'S');

    try {
         //Enable verbose debug output
         $mail->SMTPDebug = 0;//SMTP::DEBUG_SERVER;
    
         //Send using SMTP
         $mail->isSMTP();
    
    //     //Set the SMTP server to send through
         $mail->Host = 'smtp.gmail.com';
    
    //     //Enable SMTP authentication
         $mail->SMTPAuth = true;
    
    //     //SMTP username
         $mail->Username = 'swapshop.next@gmail.com';
    
    //     //SMTP password
         $mail->Password = 'pejvmsudgytfcqhs';
    
    //     //Enable TLS encryption;
         $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    
    //     //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
         $mail->Port = 587;
    
    //     //Recipients
         $mail->setFrom('swapshop.next@gmail.com', 'swapshop' );
    
    //     //Add a recipient
         $mail->addAddress($email,$name);
    
    //     //Set email format to HTML
         $mail->isHTML(true);
    
        
    
         $mail->Subject = 'Acceptance Invoice';
         $mail->Body    = '<p><b style="font-size: 30px;">Congratulations!</b></p><br><p><i>Dear '.$name.' '.$surname.','.'<br>your claim is accepted by the seller.<br>Invoice is attached with this mail , Please checkout. <br>We hope you have a better experience.<br>Thank You for shopping with us.</i></p><br><p>From<br><b>Team SWAPSHOP</b></p>';
    
         $mail->addStringAttachment($attachment, $filename,'base64','application/pdf');
         $mail->send();
         // echo 'Message has been sent';
         $x=$claim_id."-".$sn.'.pdf';
         $mpdf->Output($x,'D');
    
           
            
            //  if($result4) {
            //      echo '<script type="text/javascript"> alert("MESSAGE SENT SUCCESFULLY")</script>';
            //              }
            //  else{ echo '<script type="text/javascript"> alert("DATA NOT SAVED, PLEASE TRY AGAIN LATER")</script>';}
        
     } catch (Exception $e) {
         echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
     }    
   
                                                                                
}
 if($result3 && $result4)
 {
     echo '<script type="text/javascript"> alert("This claim is accepted")</script>';
 }
else{ echo '<script type="text/javascript"> alert("Failed to accepted")</script>';}

header("location: seller_dashboard.php");
?>

<!-- <td  width="100%" colspan="4" height="50px" >
    This is a declaration that <br>'.$sn.' '.$ss.' is willingly<br> to give his product to <br>'.$un.' '.$us.' at the <br>fixed price of rupees '.$price.'. 
</td> -->