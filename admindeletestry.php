<?php
include "Connection.php";
$id = "";
if($_POST){
    $id = $_POST['id'];

}
echo $id;

if($conn->query("DELETE FROM uploads WHERE seqNo ='$id'"))
{

    header("location: adminViewStories.php?msg=Story deleted");
}
else
{
    echo " an error occured".$conn->error;
}


?>