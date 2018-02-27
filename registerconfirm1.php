<?php  


include "Connection.php";
$code = ""; 

if(isset($_POST['btn_verify'])){
    $code = $_POST['code'];
    $verifycode = "";


    $sql = "SELECT * FROM account_code where accno=$_SESSION[idno]";

    $result = $conn->query($sql);
    if($result->num_rows > 0){
        while ($row = $result->fetch_assoc()) {
            $verifycode = $row['code'];
        }

        if($code == $verifycode){

            $sql = "DELETE FROM account_code where accno=$_SESSION[idno]";
            if($conn->query($sql)){

                header("location:From1.php?msg=verifycomplete!");
            }

        }
        else{
            echo "code error!";
            //header("location:index.php?msg=verifycodeerror!");
        }
    }else{

            header("location:registerconfirm.php?msg=verifycodeerror!");
    }


}

?>