<?php

include "Connection.php";
$des ="";
$start ="";
$end ="";
$endvote = "";
$today = date("Y-m-d");


if($_POST)
{
    $des= $_REQUEST['des'];
    $start = $_REQUEST['dstart'];
    $end = $_REQUEST['dend'];
    $endvote = $_REQUEST['vote'];

}if($start < $end ){
    echo"pwede <br>";
    echo 'start '.$start.'<br>end '.$end;
    if($endvote > $end ){
        if($endvote != $today)
        {
            if($conn->query("INSERT INTO adkontis VALUES (NULL,'$des','$start','$end','$endvote')"))
            {
                header("location: AdminContest.php?msg=New Contest added");
            }
            else
            {
                echo " an error occured".$conn->error;
            }
        }
        else{

            header("location: AdminContest.php?s=The date of end vote is invalid!");
        }
    }
    else{
        echo "di pwede";
        header("location: AdminContest.php?s=End vote must be set after the closing of submission");
    }
}
else{
    echo"dili <br>";
    echo 'start '.$start.'<br>end '.$end;
    header("location: AdminContest.php?s=Start date must be set before the end date and end date must be set after the start date!");
}
?>

