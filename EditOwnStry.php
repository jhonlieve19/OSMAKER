<?php

include "Connection.php";
$code = "";
$ttle = "";
$upStory = "";
$cat = "";

if($_POST)
{
    $ttle = $_REQUEST['tbtitle'];
    $upStory = $_REQUEST['tbBdy'];
    $code = $_REQUEST['tbCode'];
    $cat = $_REQUEST['cat'];
}
echo $code.$ttle.$upStory.$cat;

$conn->query("UPDATE uploads SET title='$ttle',story='$upStory',place='$cat' WHERE seqNo='$code'");
    
header("location: readOwnStory.php?code=$code");

?>