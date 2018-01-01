<?php
    //error_reporting(0);
	include "Connection.php";
  
	
	
if(isset($_REQUEST['tbAbout']))
{  
    $about = "";

    $about = mysqli_real_escape_string($conn,$_REQUEST['tbAbout']);
  
    //echo $about;
    if(empty($about))
    {
        header("location: Administrator.php?message=Required value");
    }else{
       if($conn->query("UPDATE howtobe SET dDescript = '$about' WHERE category='About'"))
        {
         
        header("location: Administrator.php?message=About us Successfully upload");
        }
        else
        {
            echo " an error occured".$conn->error;
        } 
    } 
}
    //how to be
 else if(isset($_REQUEST['tbtips']) && ($_REQUEST['tbtitle']))
{  
    $howto = "";
    $ttle = "";
    $ttle = $_REQUEST['tbtitle'];
    $howto = $_REQUEST['tbtips'];
    if(empty($howto))
    {
        header("location: Administrator.php?message=Required value");
    }else{
       if($conn->query("INSERT INTO howtobe VALUES(NULL,'$ttle','$howto','Admin','Tips',now())"))
        {
            header("location: Administrator.php?message=Tips Successfully upload");
        }
        else
        {
            echo " an error occured".$conn->error;
        } 
    } 
}
else{
    
}
   	
?>