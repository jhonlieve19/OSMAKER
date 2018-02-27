<?php

include "Connection.php";

if(isset($_POST['btn_save'])){


    $fname = "";
    $lname = "";
    $bday = "";
    $user = "";
    $password1 =""; 
    $password2 = "";
    $email = "";

    $fname = mysqli_real_escape_string($conn,$_REQUEST['tbname']);
    $lname = mysqli_real_escape_string($conn,$_REQUEST['tblastname']);
    $bday = mysqli_real_escape_string($conn,$_REQUEST['tbbday']);
    $user = mysqli_real_escape_string($conn,$_REQUEST['tbusername']);
    $password1 = mysqli_real_escape_string($conn,$_REQUEST['tbpassword1']);
    $password2 = mysqli_real_escape_string($conn,$_REQUEST['tbpassword2']);
    $email = mysqli_real_escape_string($conn,$_REQUEST['tbemail']);

    $countpass = count($password1);
    if($password1 != $password2){
        header("location:index.php?alert=Password not match");

        die();
    }
    else if(strlen($password1) < 8){
        header("location:index.php?leng=Password length error $countpass");
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
    header("location: index.php?existea=Username already exist");

}
else{

    echo $fname.$lname.$bday.$user.$password.$email;
    $id = 0;

    $sql = "INSERT INTO accounts VALUES (NULL,'$fname','$lname','$bday','$user','$password','$email','L2.jpg',0)";

    /*$sql1 = "SELECT * FROM accounts where Username = '$user'";

    $result=$conn->query($sql1);
    if($result->num_rows >0){
        while ($row =$result->fetch_assoc()) {
            $user = $row['Username'];
        }
    }*/



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
            
            $code = uniqid(rand());

            $sql2 = "insert into account_code values(null,'$id','$code')";
            if($conn->query($sql2)){
                header("location: index.php?message=Inserted!"); 
            }   
        }
    }
    else
    {
        echo " an error occured".$conn->error;
    }

}

?>