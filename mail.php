11:06AM
<?php
$username = "calvinpardillo1997@gmail.com";
$pass = "123123123";
$mail->Username = $username; 
$mail->Password = $pass; 
$mail->AddAddress($advisoremail);
$mail->FromName = "RMS-NCT";

$mail->Subject = "New Request from: ".$_SESSION['UID'];
$mail->Body    = "Dear Mr. Adviser you have got new request from 26s12115 ... click here to access it. http://localhost/rms/"; 
//-----------------------------------------------------------------------

$mail->Host = "ssl://smtp.gmail.com"; 
$mail->Port = 465;
$mail->IsSMTP(); 
$mail->SMTPAuth = true;
$mail->From = $mail->Username;
mail("FORGOT PASS","SADasdasdasdHasdas","")
if(!$mail->Send())
    echo "Mailer Error: " . $mail->ErrorInfo;
else
    echo "Message has been sent";
?>