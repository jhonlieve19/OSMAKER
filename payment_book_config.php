<?php  

include "Connection.php";
$seqNo = $_GET['seqNo'];
$uploaderId = "";
$price = 0;
$email = "";


$sql = "select * from uploads where seqNo = ".$_GET['seqNo']."";

$result =$conn->query($sql);
if($result->num_rows > 0){
	while ($row = $result->fetch_assoc()) {
		$uploaderId = $row['uploaderid'];
		$price = $row['price'];
	}
}
$sql1 = "select * from accounts where AccNo = $uploaderId";
$result1 = $conn->query($sql1);
if($result1->num_rows > 0){
	while ($row = $result1->fetch_assoc()) {
		$email = $row['Email'];
	}
}

$config['seqno'] = $seqNo;
$config['url']="https://sandbox.paypal.com/cgi-bin/webscr";
$config['business']=$email;
$config['return'] = "http://localhost/story/payment_success.php?seqNo=$seqNo";
$config['price'] = $price;

?>