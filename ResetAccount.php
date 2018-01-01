<?php
include "Connection.php";
$username = "";
$pass1 = "";
$pass2 = "";
if($_POST)
{
    $username = $_REQUEST['tbuser'];
    $pass1 = $_REQUEST['tbpass1'];
    $pass2 = $_REQUEST['tbpass2'];
    echo $username.$pass1.$pass2;
}
if($pass1 != $pass2)
{
    header("location: adminManageAcc?msg=Password not match");
}else{
$conn->query("UPDATE accounts SET Username='$username', Password='$pass1' WHERE Username='$username'");
header("location: adminManageAcc.php?msg=Account Reset");  
}

?>