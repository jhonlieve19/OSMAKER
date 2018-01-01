<?php  

session_start();

include "Connection.php";

$sql = "update subscription set author_sub=1,date=CURRENT_DATE where accno='$_SESSION[idno]'";

if($conn->query($sql)){

	echo "<h1>SUBSCRIPTION COMPLETE!</h1><br><a href='create.php'>Back to Create story page</a>";

}



?>