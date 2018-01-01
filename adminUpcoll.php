<?php
include "Connection.php";
$seqNo ="";

if($_POST)
{
$seqNo = $_REQUEST['id'];
    
$conn->query("UPDATE cstories SET state= 'display' WHERE storySeq ='$seqNo'");
header("location: adminViewColl.php?msg=1 Collaborative Story Dislpay");
}

?>