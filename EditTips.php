<?php

include "Connection.php";
$id = "";
$tip = "";
$ttle = "";

if($_POST)
{
    $ttle = $_REQUEST['tbtitle'];
    $tip = $_REQUEST['tbtips'];
    $id = $_REQUEST['id'];
}
$conn->query("UPDATE howtobe SET title='$ttle',dDescript='$tip' WHERE howId='$id'");
header("location: Administrator.php?message=New tips Updated");

die();
?>