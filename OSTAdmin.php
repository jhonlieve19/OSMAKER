<!--DOCTYPE html-->
<?php
session_start();
if(isset($_SESSION['adminuser']))
{
    header("location:Administrator.php");
}
else{
    // header("location:OSTAdmin.php?msg=Login First");
}
?>

<html>
<head>
    <title>Online Story Telling</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="icon" href="Images/o.png">
    <link rel="stylesheet" type="text/css" href="ostadmin.css">
</head>
<body>

    <center>
        <div class="containerfluid" id="con">
            <div class="ak">
                <h1> <img class="tind" src="Images/hedd.png">ONLINE STORY MAKER ADMIN</h1>
                

                <form action="Administrator.php" method="post">
                    <table border="0">
                        <tr>
                            <td>Username: </td>
                            <td>&emsp;<input type="text" name="user" placeholder="Username" required autofocus></td>
                        </tr>
                        <tr>
                            <td>Password:</td>
                            <td>&emsp;<input type="password" name="pass" placeholder="Password"  required></td>
                        </tr>

                    </table>
                    <br>
                    <input class="btn" type="submit" value="Login" class="btn btn-warning">

                    <?php
                    if(isset($_REQUEST['msg'])){
                        $msg = $_REQUEST['msg'];

                        echo '<br><br><p style="color:red;font-weight:bold;">'.$msg.'</p><br>';
                    }
                    ?>
                </form>
            </div>
        </div>
    </center>
</body>
</html>