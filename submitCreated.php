<?php
	include "Connection.php";
    
  /*
    $fname = "";
    $lname = "";
    $user = "";
    $password ="";
	*/
	
    if($_POST){
	    $fname = $_REQUEST['tbname'];
		$lname = $_REQUEST['tblastname'];
		$bday = $_REQUEST['tbbday'];
		$user = $_REQUEST['tbusername'];
		$password1 = $_REQUEST['tbpassword1'];
		$password2 = $_REQUEST['tbpassword2'];
		$email = $_REQUEST['tbemail'];
		
		if($password1 != $password2){
		header("location:index.php?alert=Password not match");
			
		die();
		}
		else{
			$password = $_REQUEST['tbpassword1'];
		}
		echo $fname.$lname.$bday.$user.$password;
	}


     if(!preg_match("/^[a-zA-Z0-9]*$/",$fname))
    {
		header("location:index.php?message=Wrong format First name");
        die();
    }
	if(!preg_match("/^[a-zA-Z0-9]*$/",$lname))
    {
		header("location:index.php?message=Wrong format Lastname");
        die();
    }
	   if(!preg_match("/^[a-zA-Z0-9]*$/",$user))
    {
		header("location:index.php?message=Wrong format Username");
        die();
    }
	     if(!preg_match("/^[a-zA-Z0-9]*$/",$password))
    {
		header("location:index.php?message=Wrong format Password");
			
        die();
    }
    
    
    $exist = false;
    $result = $conn->query("SELECT * FROM accounts WHERE Username LIKE '$user'");
    if($result->num_rows > 0){
        $exist = true;
         header("location: index.php?message=Username already exist");
        die();
    }
    else{
    $conn->query("INSERT INTO accounts VALUES (NULL,'$fname','$lname','$bday','$user','$password','$email')");

        header("location: index.php?message=Success!");
    }

?>