<?php
	include "Connection.php";
    $user = "";
	$code= "";
	
		if($_POST)
		{
			$user = $_REQUEST['tbUser'];
			$code= $_REQUEST['tbCode'];
		}

	 	$exist = false;
		$result = $conn->query("SELECT * FROM likes WHERE userName LIKE '$user' AND Code LIKE '$code'");
		if($result->num_rows > 0){
			$exist = true;
			$conn->query("DELETE FROM likes WHERE userName LIKE '$user' AND Code = '$code'");
			header("location: readOwnStory.php?code=$code");
			die();
		}
    else{
		if($conn->query("INSERT INTO likes VALUES(NULL,'$user','$code','Like',1)"))
		{
			header("location: readOwnStory.php?code=$code");
			die();
		}
	}
			
  ?>