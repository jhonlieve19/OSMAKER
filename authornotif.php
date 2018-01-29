<?php  

session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="col-sm-12"><br></div>
		<div>
			<h4>Author Notification</h4>
			<div class="jumbotron">
				<?php 

				include "Connection.php";

				$sql = "SELECT * from book_payment where uploaderid=$_SESSION[idno]";

				$result = $conn->query($sql);
				if($result->num_rows > 0){
					while ($row=$result->fetch_assoc()) {
						echo "
						<span>
						Your book number: $row[seqno]
						has paid by payerid: $row[payerid]
						</span>";
					}
				}
				else{
					die();
				}

				?>
			</div>
		</div>
	</div>
</body>
</html>