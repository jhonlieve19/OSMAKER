<?php
    //error_reporting(0);
	include "Connection.php";
	$file_name = "";
	$user = "";
	
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
        }
    if($file_size > 2097152)
        {
			$errors[] ='File size must be exately 2MB';
			header("location: Wrtcontest.php?message=File size must be exately 2MB    ");
        }

        if(empty($_FILES['image']['name']))
        {
            header("location:Wrtcontest.php?msg=Required Image!");
        }

		if($_POST)
		{
			$user = $_POST['tbauthor'];
		}
		if(isset($_FILES['image']))
		{
			$file_name = $_FILES['image']['name'];	
			echo $file_name;
		}
		
		if(empty($file_name))
		{
			header("location: WrtContest.php?message=Please Choose file");
			die();
		}else
		{
			
           if($conn->query("UPDATE accounts SET Profile='$file_name' WHERE Username = '$user'"))
			{
			move_uploaded_file($file_tmp,"Uploads/Profile".$file_name);
               header("location: Profile.php?message= Successfully upload");
			}
			else
			{
				echo " an error occured".$conn->error;
			}
			
		}	
    ?>