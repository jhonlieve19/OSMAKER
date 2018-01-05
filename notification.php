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

			$sql = "SELECT count(*) as TotalRegular from admin_notification where subscriptiont_type = 'REGULAR'";

			$result=$conn->query($sql);
			if($result->num_rows>0){
				while ($row=$result->fetch_assoc()) {
					echo "<span>Total Regular USER: $row[TotalRegular]</span>";
				}
			}

			$sql = "SELECT count(*) as TotalPremium from admin_notification where subscriptiont_type = 'PREMIUM'";

			$result=$conn->query($sql);
			if($result->num_rows>0){
				while ($row=$result->fetch_assoc()) {
					echo "<span id='premium'> Total Premium USER: $row[TotalPremium]</span>";
				}
			}

			$sql = "SELECT sum(price) as Total from admin_notification";

			$result=$conn->query($sql);
			if($result->num_rows>0){
				while ($row=$result->fetch_assoc()) {
					echo "<span id='premium'> Total Website CASH: $row[Total]</span><br>";
				}
			}

			echo "<hr>";
			echo "<script>console.log('CONSOLE WORKS!');</script>";

			$sql = "SELECT * FROM admin_notification ORDER BY accno DESC"; 
			$result=$conn->query($sql);
			if($result->num_rows>0){
				while ($row=$result->fetch_assoc()) {

					echo "ID: <span>$row[id]</span> Email: <span>$row[user_email]</span> Has Paid to your website-<span>$row[price]</span> Type: <span>$row[subscriptiont_type]</span><br>";
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