<?php
include "Connection.php";
$id = "";
if($_POST){
    $id = $_POST['id'];

}
echo $id;

if($conn->query("DELETE FROM howtobe WHERE howId ='$id'"))
{

    header("location: Administrator.php?msg=Tip deleted");
}
else
{
    echo " an error occured".$conn->error;
}


?>