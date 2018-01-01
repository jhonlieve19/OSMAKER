<?php
	include "Connection.php";
	
  
    $image = "";
	$file_name = "";
	$title = "";
	$cat = "";
	$story = "";
	$angnagsulat = "";
	$accno = "";
	$code = "";
	$mature = "";
	
	
    if(isset($_FILES['image']))
    {
        $extensions = array("jpeg","jpg","png");
        $errors = array();
        $file_size = $_FILES['image']['size'];
        $file_tmp =$_FILES['image']['tmp_name'];
        $file_type =$_FILES['image']['type'];
        $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
        $file_name = $_FILES['image']['name'];
    }
    if(in_array($file_ext,$extensions)===false)
        {
			$errors[]="extension not allowed,please choose a JPEG or PNG file";
			die();
        }
    if($file_size > 2097152)
        {
			$errors[] ='File size must be exately 2MB';
			header("location: Create.php?message=File size must be exately 2MB");
			die();
        }
		if($_POST)
		{
			$title = mysqli_real_escape_string($conn,$_REQUEST['tbtitle']);
			$cat = mysqli_real_escape_string($conn,$_REQUEST['tbcategory']);
			$story = mysqli_real_escape_string($conn,$_REQUEST['tbstory']);
			$angnagsulat = mysqli_real_escape_string($conn,$_POST['tbauthor']);
			$accno = mysqli_real_escape_string($conn,$_REQUEST['tbauthorid']);
			$code = mysqli_real_escape_string($conn,$_REQUEST['tbCode']);
			$mature = mysqli_real_escape_string($conn,$_REQUEST['tbmature']);
		}
		if(isset($_FILES['image']))
		{
			$file_name = $_FILES['image']['name'];	
			echo $file_name;
		}
		if(empty($file_name))
		{
			//echo $file_name;
			header("location: Create.php?message=Please Choose file");
			die();
		}else
		{

			if($conn->query("INSERT INTO cstories VALUES(NULL,'$code','$file_name','$title','$story','$cat','$angnagsulat','Write','notdisplay',now())"))
			{
			
			move_uploaded_file($file_tmp,"Uploads/".$file_name);
					header("location: Form1.php?message=Collaborative Successfully upload");
			}
			else
			{
				echo " an error occured".$conn->error;
			}
		}
			
    ?>