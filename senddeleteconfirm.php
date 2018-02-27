<?php  

include "Connection.php";

$code = "";

if(isset($_GET['code1'])){
	$code = $_GET['code1'];
}

if(isset($_POST["btn_conf"])){

	$adminemail = "OSTAdmin@email.com";
	$client_email = $_POST['client_email'];
	$msg = $_POST['reason'];
	$storytitle = $_POST['title'];
	$notice = "Notice Deletion from your story!";

	$nmsg = "Your story title :".$storytitle."\n\nDeleted due to".$msg;

	mail($client_email, $notice, $nmsg,$adminemail);

	$sql = "DELETE FROM uploads WHERE seqNo =$code";

	if($conn->query($sql)){

		header("location: adminViewStories.php?msg=Story deleted");
		echo "Delete success";

	}
	else{

		echo " an error occured".$conn->error;
	}
}



?>