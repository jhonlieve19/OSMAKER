<?php 

include "Connection.php";

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="notification.css">
</head>
<body>

	<div>
		<h1>Notification Dashboard | ADMIN</h1>
	</div>

	<div class="notification-area">
		<div class="notification-data">
			<?php 

			include "Connection.php";

			$accno = array();
			$price = array();
			echo "<script>console.log('CONSOLE WORKS!');</script>";

			$sql = "SELECT * FROM admin_notification ORDER BY accno DESC"; 
			$result=$conn->query($sql);
			if($result->num_rows>0){
				while ($row=$result->fetch_assoc()) {
					array_push($accno, $row['accno']);
					array_push($price, $row['price']);
				}

			}
			foreach ($accno as $key => $value) {
				
				echo "<script>console.log($value)</script>";
				$sql1 = "SELECT * FROM accounts where AccNo = $value ORDER BY AccNo DESC";
				$result1=$conn->query($sql1);
				if($result1->num_rows >0){
					while ($row=$result1->fetch_assoc()) {
						echo "ID: <span>".$row["AccNo"]."</span>"." Name: <span>".$row["FirstName"]."</span>"." -Has paid to your website<br><br>";
						echo "<script>console.log($row[AccNo])</script>";
					}
				}
			}

			?>
		</div>
	</div>

	<?php 

	include "footer.php";

	?>
</body>
</html>