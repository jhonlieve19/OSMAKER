<?php
include "Connection.php";
$awd = "";
$title = "";

if($_REQUEST)
{
    $awd = $_POST['tbDes'];
    $title = $_POST['tbttle'];
}
 if($conn->query("INSERT INTO awards VALUES(NULL,'$title','$awd',now())"))
    {
     
        header("location: adminAwards.php?message=Awards uploaded");
    }
    else
    {
        echo " an error occured".$conn->error;
    }	
?>