<?php

error_reporting(0);
ini_set('display_errors', 1);
session_start(); 
include "Connection.php";
?>
<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <meta http-equiv="Content-type" content="text/html;charset=UTF-8">
        <link rel="stylesheet" href="securimage.css" media="screen">
        <title>Online Story Maker</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <link rel="icon" href="Images/o.png">
        <link rel="stylesheet" href="index.css">




        <style type="text/css">
            .btnsend{
                border-style: none;
                background-color: lightskyblue;
                color: white;
                font-size: 14px;
                 width: 140px;
                height: 60px;
                border-radius: 4px;;
            }
            .btnsend:hover{
                border-style: none;
                background-color: white;
                border-style:solid;
                border-color: lightskyblue;
                color: lightblue;
               
            }
            .con{
                width: 700px;
                height: auto;
                background-color: whitesmoke;
                padding: 4em;
                padding-top: 6em;
                padding-bottom: 10em;
                margin-bottom: 7em;
            }
        </style>
    </head>
    <nav class="navbar navbar-default" id="navcolor">
        <div class="navbar-header">
            <a class="navbar-brand" class="this" href="index.php">
                <p class="title">
                    <img class="lg" src="Images/hedd.png" width="" height="" style=" max-height: 120px;
                                                                                          max-width:200px;
                                                                                          margin-left: -27px;" />
                </p>
            </a>
        </div>
       
    </nav>
    <body>
        <div>
            <br>
            <br>
              <center>
            <div class="con">
                <h3>Password recovery</h3>
                <hr>
            <p>Please type your email to recover your password we will </p>
            <p>  sent your info into your account check your account now</p>
                <br>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <input type="email" name="email" placeholder = "Type your email here..." size="50" requried/> <br/><br/>
                <input class="btnsend" type="submit" name="send" value="SEND"/>

            </form>
               
                </div>
                 </center>
        </div>
        <?php
        if(isset($_POST['send']))
        {   
            $email = mysqli_real_escape_string($conn,$_REQUEST['send']);
            $result = $conn->query("SELECT Password FROM accounts WHERE Email = '$email'");
            if($result->num_rows > 0)
            {
                while ($row = $result->fetch_assoc())
                {
                    $passdb = $row['Password'];
                }
                echo $passdb;
                $to = $email;
                $subject = "Ourstory.com password recovery";
                $message=" <p>Your password is </p><p>$passdb</p>";
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= 'From: osmaker.juysolutions.com' . "\r\n";
                mail($to, $subject, $message, $headers);
                echo'haha';
            }
            else
            {

            }
        }
        ?>
    </body>
    <?php
    include "footer.php";
    ?>
</html>