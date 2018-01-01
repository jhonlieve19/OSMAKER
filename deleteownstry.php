<?php
include "Connection.php";
$id = "";
if($_POST){
    $id = $_POST['id'];

}
echo $id;

if($conn->query("DELETE FROM uploads WHERE SeqNo ='$id'"))
{

 header("location: Profile.php?del=Contest Deleted");
}
else
{
    echo " an error occured".$conn->error;
}


?>