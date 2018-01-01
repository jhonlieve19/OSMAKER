<?php
	include "Connection.php";
    $user = "";
	$code = "";
	$wrter = "";
	
		if($_POST)
		{ 
			$user = $_REQUEST['tbUser'];
			$code= $_REQUEST['tbCode'];
			$wrter= $_REQUEST['tbwriter'];
		}

	 	$exist = false;
		$result = $conn->query("SELECT * FROM subscrbe WHERE userName LIKE '$user' AND Uploadercode LIKE '$wrter'");
		if($result->num_rows > 0){
			$exist = true;
			$conn->query("DELETE FROM subscrbe WHERE userName LIKE '$user' AND Uploadercode = '$wrter'");
			header("location: Read.php?code=$code");
			die();
		}
    else{
		if($conn->query("INSERT INTO subscrbe VALUES(NULL,'$user','$wrter','Subscribe',1,now())")) 
		{
			header("location: Read.php?code=$code");
			die();
		}
	}
			
  ?>