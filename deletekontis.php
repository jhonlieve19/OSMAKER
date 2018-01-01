<?php
include "Connection.php";
$id = "";
if($_POST){
    $id = $_POST['ID'];

}
echo $id;

if($conn->query("DELETE FROM adkontis WHERE conId ='$id'"))
{

    header("location: AdminContest.php?del=Contest deleted");
}
else
{
    echo " an error occured".$conn->error;
}


?>