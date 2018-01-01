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


        <style>
            .yemail, .tbeml{
                margin-left: 13em;
            }
            .yeee{
                margin-left: 11.3em;
                background-color: darkcyan;
                border: none;
                color: white;
                padding: 13px 30px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                cursor: pointer;
                border-radius: 5px;
            }
            .btndsn{
                background-color: darkcyan;
                border: none;
                color: white;
                padding: 13px 30px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                cursor: pointer;
                border-radius: 5px;
            }
            .btnsub{
                background-color: darkcyan;
                border-radius: 3px;
                border-collapse: collapse;
                width: 300px;
                height: 30px;
                border-style: none;
                margin: 2px;
                color: white;
            }
            .btnsub:hover{
            background-color: skyblue;
            box-shadow: 0em 0em 3em;
            }
            

        </style>

        <style type="text/css">
            <!--
            div.error { display: block; color: #f00; font-weight: bold; font-size: 1.2em; }
            span.error { display: block; color: #f00; font-style: italic; }
            .success { color: #00f; font-weight: bold; font-size: 1.2em; }
            form label { display: block; font-weight: bold; }
            fieldset { width: 90%; }
            legend { font-size: 24px; }
            .note { font-size: 18px;

                -->

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
        <div class="container">
            <br><br> <br><br>
            <br><br>
            <?php
            process_si_contact_form(); 
            if (isset($_SESSION['ctform']['error']) &&  $_SESSION['ctform']['error'] == true):?>
            <div class="error">Invalid captcha key</div><br>
            <?php elseif (isset($_SESSION['ctform']['success']) && $_SESSION['ctform']['success'] == true):?>
            <div class="success">Message sent! go to your email account now</div><br />
            <?php endif; ?>

            <h2>Fill out below to retrieve your password</h2>
            <p>After you complete and submit, your password will be sent to your email.</p>
            <br><br><br>

            <form method="post" action="" id="contact_form">
                <input type="hidden" name="do" value="contact">
                <label>E-mail* (required)</label>
                <input type="email" name="email" placeholder="E-mail" size="50px" required>
                <div>
                    <br>
                    <?php
                    require_once 'securimage.php';
                    $options = array();
                    $options['input_name']             = 'ct_captcha'; // change name of input element for form post
                    $options['disable_flash_fallback'] = false; // allow flash fallback
                    if (!empty($_SESSION['ctform']['captcha_error'])) {

                        $options['error_html'] = $_SESSION['ctform']['captcha_error'];
                    }
                    echo "<div id='captcha_container_1'>\n";
                    echo Securimage::getCaptchaHtml($options);
                    echo "\n</div>\n";
                    ?>
                </div>
                <br>
                <input class="btndsn" type="submit" value="Submit">
            </form>
            <!-- MODAL FOR LOGIN -->
            <div class="modal fade" id="Login" role="dialog">
                <div class="modal-dialog" id="mdl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <center>
                                <img src="Images/hedd.png">
                            </center>
                        </div>
                        <div class="modal-body">
                            <center>
                                <p>Enter your valid account. If you don`t have an account, sign up.</p>
                            </center>
                            <br>
                            <div class="mcon">
                                <form action="" method="post">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="email" type="text" class="form-control" name="tbuser" placeholder="Username" size="5" required>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="password" type="password" class="form-control" name="tbpassword" placeholder="Password" size="5" required>
                                    </div>
                                    <br>
                                    <center>
                                        <input class="btnsub" name="buttonset" type="submit" value="Login" >
                                    </center>
                                    <br>
                                    <center>    
                                        <a href="captcha.php">Forgot Password?</a>
                                    </center>
                                    <br>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--END OF MODAL-->
        </div>
    </body>
    <br>
    <br>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <br><label class="yemail">Your Email here:</label><input class="tbeml" type="email" name="email"/> <br/><br/>
        <input class="yeee" type="submit" name="send" value="Send"/>

    
    </div>
</center>
</div>    
<?php
if(isset($_POST['send']))
{
    //include 'config.php';
    $email= htmlentities($_POST['email']);
    $result = $conn->query("SELECT * FROM accounts WHERE Email = '$email'");
    if($result->num_rows > 0)
    {
        while ($row = $result->fetch_array())
        {   
            $passw = $row['5'];
        }
        //echo $passw;
        mail($email,"Forgot Password","Your password is $passw ", "From: ourstory.com\r\n");
        echo"<script type='text/javascript'>alert('Email Sent.')</script>";
    }
}
else
{
    // echo"<script type='text/javascript'>alert('Email not found.')</script>";
}
?>
<br>
<br>
<br>
<br>
<br>
<br>
<?php
include "footer.php";
?>

</html>
<?php
function process_si_contact_form()
{
    $_SESSION['ctform'] = array(); 
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && @$_POST['do'] == 'contact') {
        foreach($_POST as $key => $value) {
            if (!is_array($key)) {
                if ($key != 'ct_message') $value = strip_tags($value);
                $_POST[$key] = htmlspecialchars(stripslashes(trim($value)));
            }
        }
        $captcha = $_POST['ct_captcha']; // the user's entry for the captcha code
        $name    = substr($name, 0, 64); 
        $errors = array();  

        if (sizeof($errors) == 0) {
            require_once dirname(__FILE__) . '/securimage.php';
            $securimage = new Securimage();
            if ($securimage->check($captcha) == false) {
                $errors['captcha_error'] = '<br/>';

            }
        }
        if (sizeof($errors) == 0) {
            // no errors, send the form
            $_SESSION['ctform']['error'] = false;  // no error with form
            $_SESSION['ctform']['success'] = true; 
            if($_POST)
            {
                $email= htmlentities($_POST['email']);
                //echo 'tama ka';     
                /* 
                echo '<br>'.$email;
                $result = $conn->query("SELECT * FROM accounts WHERE Email = '$email'");
                if($result->num_rows > 0)
                {
                    while ($row = $result->fetch_array())
                    {   
                        $passw = $row['5'];
                    }
                    echo $passw;
                    mail($email,"Forgot Password","Your password is $passw ", "From: ourstory.com\r\n");




                }
                else
                {
                    echo"<script type='text/javascript'>alert('Email not found.')</script>";
                }*/
                header("location:index.php?ml=$email");
            }




        } 
        else{
            foreach($errors as $key => $error) {
                $_SESSION['ctform'][$key] = "<span class=\"error\">$error</span>";
            }
            $_SESSION['ctform']['error'] = true; // set error floag
        }
    }
}
