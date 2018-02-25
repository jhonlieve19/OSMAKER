<?php

include "Connection.php";

$image = "";
$file_name = "";
$title = "";
$cat = "";
$mature ="";
$story = "";
$author = "";
$accno = "";

$maturity = "";

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
	header("location: testfile2.php?msg=extension not allowed,please choose a JPEG or PNG file");
}
if($file_size > 3000)
{
	header("location: testfile2.php?mess=File size must be exately 3MB or less   ");
}

if(isset($_FILES['image']))
{
	$file_name = $_FILES['image']['name'];	
	echo $file_name;
}

if(empty($file_name))
{
	die();
}
else
{
	$title = mysqli_real_escape_string($conn,$_REQUEST['tbtitle']);
	$cat = mysqli_real_escape_string($conn,$_REQUEST['tbcategory']);
	$mature = mysqli_real_escape_string($conn,$_REQUEST['tbmature']);
	$story = mysqli_real_escape_string($conn,$_REQUEST['tbstory']);
	$author = mysqli_real_escape_string($conn,$_REQUEST['tbauthor']);
	$accno = mysqli_real_escape_string($conn,$_REQUEST['tbauthorid']);
	$price = mysqli_real_escape_string($conn,$_REQUEST['price']);
	//$maturity = $_POST['waybuot'];

	if(isset($_POST["free"])){
		$sql = "SELECT * FROM uploads where title like '$title'";

		$result=$conn->query($sql);
		if($result->num_rows>0){
			header("location: Create.php?message1=Title already exist in the database");
		}
		else{
			echo "<script>alert('Niagi ko dri nga script');</script>";
			if(empty($mature)){
				if($conn->query("INSERT INTO uploads VALUES(NULL,$accno,'$file_name','$title','$story','$cat','Off','$author','notdisplay',now(),0,0,'rAuthorAdmin',0)"))
				{
					echo "/*<br><br><br>".$accno;
					move_uploaded_file($file_tmp,"Uploads/".$file_name);
					header("location: testfile2.php?message=Successfully upload");
				}
				else
				{
					echo " an error occured".$conn->error;
				}
			}
			else
			{
				if($conn->query("INSERT INTO uploads VALUES(NULL,$accno,'$file_name','$title','$story','$cat','$mature','$author','notdisplay',now()),0,0,'rAuthorAdmin',1"))
				{
					echo "<br><br><br>".$accno;
					move_uploaded_file($file_tmp,"Uploads/".$file_name);
					header("location: testfile2.php?message=Successfully Upload");
				}
				else
				{
					echo " an error occured".$conn->error;
				}
			}
		}
	}
	else if(isset($_POST['paid'])){
		$sql = "SELECT * FROM uploads where title like '$title'";

		$result=$conn->query($sql);
		if($result->num_rows>0){
			$errors[] ='Title already exist in the database';
			header("location: Create.php?message1=Title already exist in the database");
		}
		else{
			if(empty($mature)){
				if($conn->query("INSERT INTO uploads VALUES(NULL,$accno,'$file_name','$title','$story','$cat','Off','$author','notdisplay',now(),1,$price,'rAuthorAdmin',0)"))
				{
					echo "<br><br><br>".$accno;
					move_uploaded_file($file_tmp,"Uploads/".$file_name);
					header("location: testfile2.php?message=Successfully upload");
				}
				else
				{
					echo " an error occured".$conn->error;
				}
			}
			else
			{
				if($conn->query("INSERT INTO uploads VALUES(NULL,$accno,'$file_name','$title','$story','$cat','$mature','$author','notdisplay',now()),1,$price",'rAuthorAdmin',1))
				{
					echo "<br><br><br>".$accno;
					move_uploaded_file($file_tmp,"Uploads/".$file_name);
					header("location: testfile2.php?message=Successfully Upload");
				}
				else
				{
					echo " an error occured".$conn->error;
				}
			}
		}
	}
}	
?>