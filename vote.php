<?php
include "Connection.php";
$userID = "";
$conID = "";
$sID = "";

if($_REQUEST)
{
    $userID = mysqli_real_escape_string($conn,$_REQUEST['userID']);
    $conID= mysqli_real_escape_string($conn,$_REQUEST['contestID']);
    $sID = mysqli_real_escape_string($conn,$_REQUEST['storyID']);
}

$exist = false;
$result = $conn->query("SELECT * FROM voting WHERE username = '$userID' AND conID = '$conID'");
if($result->num_rows > 0){
    $exist = true;
    $conn->query("DELETE FROM voting WHERE username = '$userID' AND conID = '$conID'");
    header("location: viewandRead.php?tbconID=$sID");
    //die();
}
else{
    if($conn->query("INSERT INTO voting VALUES(NULL,'$conID','$userID','$sID','vote',1)"))
    {
        header("location: viewandRead.php?tbconID=$sID");
        die();
    }
}

?>