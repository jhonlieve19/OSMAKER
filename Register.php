<?php
include "Connection.php";


$fname = "";
$lname = "";
$bday = "";
$user = "";
$password1 =""; 
$password2 = "";
$email = "";


if($_POST){
    $fname = mysqli_real_escape_string($conn,$_REQUEST['tbname']);
    $lname = mysqli_real_escape_string($conn,$_REQUEST['tblastname']);
    $bday = mysqli_real_escape_string($conn,$_REQUEST['tbbday']);
    $user = mysqli_real_escape_string($conn,$_REQUEST['tbusername']);
    $password1 = mysqli_real_escape_string($conn,$_REQUEST['tbpassword1']);
    $password2 = mysqli_real_escape_string($conn,$_REQUEST['tbpassword2']);
    $email = mysqli_real_escape_string($conn,$_REQUEST['tbemail']);


    if($password1 != $password2){
        header("location:index.php?alert=Password not match");

        die();
    }
    else{
        $password = $_REQUEST['tbpassword1'];
    }


}


if(!preg_match("/^[a-zA-Z0-9 ]*$/",$fname))
{
    header("location:index.php?message=Wrong format First name");

}
if(!preg_match("/^[a-zA-Z0-9]*$/",$lname))
{
    header("location:index.php?message=Wrong format Lastname");

}
if(!preg_match("/^[a-zA-Z0-9]*$/",$user))
{
    header("location:index.php?message=Wrong format Username");

}
if(!preg_match("/^[a-zA-Z0-9]*$/",$password))
{
    header("location:index.php?message=Wrong format Password");


}


$exist = false;
$result = $conn->query("SELECT * FROM accounts WHERE Username LIKE '$user'");
if($result->num_rows > 0){
    $exist = true;
    header("location: index.php?message=Username already exist");

}
else{

    echo $fname.$lname.$bday.$user.$password.$email;
    $id = 0;

    $sql = "INSERT INTO accounts VALUES (NULL,'$fname','$lname','$bday','$user','$password','$email','L2.jpg')";
    if($conn->query($sql))
    {
        $sql = "select * from accounts where Username='$user'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while ($row=$result->fetch_assoc()) {
                $id = $row['AccNo'];
            }
        }
        $sql1 = "insert into subscription(author_sub,accno,date) values(0,'$id',current_date)";
        if($conn->query($sql1)){
            header("location: index.php?message=Inserted!");   
        }
    }
    else
    {
        echo " an error occured".$conn->error;
    }
}

?>