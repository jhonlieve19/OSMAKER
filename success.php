<?php  

session_start();

include "Connection.php";
$email="";

$sql = "update subscription set author_sub=1,date=CURRENT_DATE where accno='$_SESSION[idno]'";

if($conn->query($sql)){
	$sql1 = "SELECT * FROM accounts where AccNo = '$_SESSION[idno]'";
	$result=$conn->query($sql1);
	if($result->num_rows>0){
		while ($row = $result->fetch_assoc()) {
			$email = $row['Email'];
		}
		$sql = "INSERT INTO admin_notification(accno,user_email,subscriptiont_type,price) values('$_SESSION[idno]','$email','$_SESSION[type]','$_SESSION[price]')";
		if($conn->query($sql)){

			echo "<h1>SUBSCRIPTION COMPLETE!</h1><br><a href='create.php'>Back to Create story page</a>";
		}
	}
}

?>