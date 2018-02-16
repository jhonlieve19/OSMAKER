<?php  
session_start();
include "Connection.php";

$sql = "insert into book_payment(seqno,uploaderid,payerid,author_paypal_email) values('$_SESSION[seqno]','$_SESSION[uploader]','$_SESSION[idno]','$_SESSION[email]')";

if($conn->query($sql)){
	echo "<h1>Payment successfuly Done!</h1>";
	$_SESSION['seqno'] = "";
	$_SESSION['uploader'] = "";
	$_SESSION['email'] ="";
	$_SESSION['price'] = "";
}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<a href="Read.php">Logout</a>
</body>
</html>