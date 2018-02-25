<?php
include "Connection.php";
$seqNo ="";

if($_POST)
{
$seqNo = $_REQUEST['id'];
    
$conn->query("UPDATE uploads SET status= 'display', state ='rAuthorAll' WHERE seqNo ='$seqNo'");
header("location: adminViewStories.php?msg=1 Story Dislpay");
}

?>