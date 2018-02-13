<?php  

include "Connection.php";

if(isset($_POST['request'])){

	$accno = $_POST['accno'];
	$rate = $_POST['rate'];
	$seqno = $_POST['seqno'];

	$sql = "INSERT into ratings values(null,$accno,$rate,$seqno)";

	if($conn->query($sql)){
		echo "Data inserted successfully!";
	}
	else{
		echo "Data insert failed!";
	}
}

?>