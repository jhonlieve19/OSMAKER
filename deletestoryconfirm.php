<?php  

include "Connection.php";


$uploaderid = 0;
$email = "";
$storytitle = "";
$seqno ="";

if(isset($_POST['btn_delete'])){
	$seqno = $_POST['id'];

	$sql = "SELECT * FROM uploads where seqNo=$seqno";

	$result=$conn->query($sql);
	if($result->num_rows > 0){
		while ($row=$result->fetch_assoc()) {
			$uploaderid = $row['uploaderid'];
			$storytitle  =$row['title'];
		}

		$sql = "SELECT * FROM accounts where AccNo=$uploaderid";

		$result=$conn->query($sql);
		if($result->num_rows > 0){
			while ($row=$result->fetch_assoc()) {
				$email = $row["Email"];
			}
		}
	}

}


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<form method="post" action="">
			<br>
			<input type="text" hidden id="title" name="title" value="<?php echo "$storytitle";  ?>">
			<br>
			<br>
			<input type="email"  hidden id="client_email" name="client_email" value="<?php echo "$email"; ?>">
			<br>
			<br>
			<textarea name="reason" id="reason" required="" placeholder="Reason why to delete the story?.."></textarea>
			<br>
			<br>
			<button id="confirm_delete" name="btn_conf">Confirm Delete</button>
		</form>
	</div>
</body>
</html>