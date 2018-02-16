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
        <link rel="icon" href="Images/OSM_Icon.ico">



        <style>
            @font-face
            {
                font-family:'Oxygen';
                src: url(fonts/Oxygen-Regular.ttf) format('truetype');
            }
            body
            {
                background: linear-gradient(100deg, #1f9b82, #0f6c98);
                background-attachment: fixed;
                background-size: cover;
            }
            .container
            {
                background-color: transparent;
            }
            #inside
            {
                margin: 100px 0 100px 0;
                background-color: white;
                padding: 2em 0 5em 4em;
                border: 1px solid white;
                border-radius: 4px;
                 box-shadow: 0px 0px 54px 0px rgba(0,0,0,0.3);
            }
            .footlogo img
            {
                float: right;
                width: 100px;
                height: 55px;
                position: relative;
                top: 0px;
                left: -30px;
            }
            .footlogo p
            {
                float: right;
                position: relative;
                left: 70px;
                top: 50px;
                color: #d3eae0
            }
            .footlogo
            {
                position: relative;
                top: -40px;
                left: 20px
            }
            #h3prop
            {
                font-family:'Oxygen';
                color: white;
                background-image: url(Images/titlebgabout.png);
                background-repeat: no-repeat;
                background-size: cover;
                width: 300px;
                padding-top: 8px;
                padding-bottom: 8px;
                position: relative;
                left: -14px;
                top: 0px;
                text-indent: 5%;
            }
            .liness
            {
                border: 0.5px solid white;
                width: 1150px;
                position: relative;
                top: 80px
            }
            .linesss
            {
                border: 0.5px solid white;
                width: 1150px;
                position: relative;
                top: -50px
            }
            #btn
            {
            
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
    <body>
        <div class="container">
            <?php
            include "nav2.php";
            ?>
            <br>
            <div class="liness"></div>
            <div id = "inside">
                
                <h4 id="h3prop">Password Recovery</h4>
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
                    <input type="hidden" name="do" value="contact" id="btn">
                    <label>E-mail Address</label>
                    <input type="email" id="btn" name="email" placeholder="E-mail" size="50px" required>
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

                    <input class="btndsn" type="submit" value="Submit">
                </form>
                <!-- MODAL FOR LOGIN -->

                <!--END OF MODAL-->
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <br><label class="yemail">Your Email here:</label><input class="tbeml" type="email" name="email"/> <br/><br/>
                    <input type="submit" id="btn" name="send" value="Send"/>



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
                            echo"<type='text/javascript'>alert('Email Sent.')</script>";
                        }
                    }else
                    {
                        // echo"<script type='text/javascript'>alert('Email not found.')</script>";
                    }
                    ?>


                </form>

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
                ?>
            </div>
            <div class="linesss"></div>
            <div class="footlogo">
                <img src="Images/osmlogo.png">
                <p>© OSM Developers, 2017</p>
            </div>
        </div>
    </body>
</html>
