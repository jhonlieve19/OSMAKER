<?php
    //error_reporting(0);
	include "Connection.php";
	$file_name = "";
	$user = "";
    $id = "";
    $title = "";
    $story = "";
    $cat = "";
    $conID = "";
	
	
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

		if($_REQUEST)
		{
			$user = mysqli_real_escape_string($conn, $_POST['tbuser']);
			$id =  mysqli_real_escape_string($conn,$_POST['tbid']);
			$title =  mysqli_real_escape_string($conn,$_POST['tbtitle']);
			$story =  mysqli_real_escape_string($conn,$_POST['tbstory']);
			$cat =  mysqli_real_escape_string($conn,$_POST['tbcategory']);
			$conID = mysqli_real_escape_string($conn,$_REQUEST['tbConID']);
			echo $user;
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
			
            if($conn->query("INSERT INTO upldcontest VALUES(NULL,$conID,'$file_name','$title','$story','$cat','$user',now())"))
            {
                echo "<br><br><br>".$accno;
                move_uploaded_file($file_tmp,"Uploads/".$file_name);
                header("location: ViewEntries.php?ConID=$conID");
            }
            else
            {
                echo " an error occured".$conn->error;
            }
			
		}	
    ?>