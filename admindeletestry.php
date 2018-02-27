<?php
include "Connection.php";
$id = "";
if(isset($_GET['code1'])){
	
	$id = $_GET['code1'];
}
if(isset($_POST['btn_conf'])){
	$adminemail = "OSTAdmin@email.com";
	$client_email = $_POST['client_email'];
	$msg = $_POST['reason'];
	$storytitle = $_POST['title'];
	$notice = "Notice Deletion from your story!";

	$nmsg = "Your story title :".$storytitle." Deleted due to ".$msg;

	mail($client_email, $notice, $nmsg, $adminemail);

	if($conn->query("DELETE FROM uploads WHERE seqNo =$id"))
	{
		echo "Done";
		//header("location: adminViewStories.php?msg=Story deleted");
	}
	else
	{
		echo " an error occured".$conn->error;
	}
}

?>