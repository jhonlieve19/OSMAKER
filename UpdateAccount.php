<?php

	include "Connection.php";
	$accNo ="";
    $fname = "";
    $lname = "";
    $email = "";
    $bday = "";	
 	$username = "";
    $pass1 = "";
    $pass2 = "";


	if($_POST)
	{
	$accNo = mysqli_real_escape_string($conn,$_REQUEST['tbacc']);
    $fname = mysqli_real_escape_string($conn,$_REQUEST['tbfname']);
    $lname = mysqli_real_escape_string($conn,$_REQUEST['tblname']);
    $email = mysqli_real_escape_string($conn,$_REQUEST['tbemail']);
    $bday = mysqli_real_escape_string($conn,$_REQUEST['tbbday']);	
 	$username = mysqli_real_escape_string($conn,$_REQUEST['tbusrname']);
    $pass1 = mysqli_real_escape_string($conn,$_REQUEST['tbpass1']);
    $pass2 = mysqli_real_escape_string($conn,$_REQUEST['tbpass2']);
		
	}
	if($pass1 != $pass2)
		{
		header("location: EditAccount.php?message=Password not match");
		die();
		}

	$conn->query("UPDATE accounts SET AccNo=$accNo,Firstname='$fname',Lastname='$lname',Birthday='$bday',Username='$username', Password='$pass1',Email='$email' WHERE AccNo='$accNo'");

	echo $accNo."<br>".$fname."<br>".$lname."<br>".$email."<br>".$bday."<br>".$username."<br>".$pass1."<br>".$pass2;
	header("location: Profile.php?message=Account info Updated");

	die();
?>