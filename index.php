<?php
include "Connection.php";
session_start();


if(isset($_SESSION['Username'])){
    header("location: Form1.php");
}

?>

<!DOCTYPE html>
<html lang="en">
    <style type="text/css">
        .TopImage{
            max-height: 300%;
            max-width:15%;
            margin-top: -430px;
            margin-left: 10px;
            position: fixed;
        }
        #navcolor{
            background: -webkit-linear-gradient(-10deg, #0098cc,#0099cc);
            border-style: none;
            width: auto;
            height: 4.5em;
            padding; 0em 2em 2em 2em;
            padding-top: 6px;

            padding-right: 10.3em;
            color: ;
        }
        .btn{
            display: inline-block;

        }
        .mcon{
            padding: 0em 5em 3em 5em;
            background-color: ;
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
        .tagRight{
            width: 660px;
            height: auto;
            padding: 0.7em 2em 2em 2em;
            

        } 
        

        }
        .tagRight,.tagLeft{
            display: inline-block;
        }

        .cent{
            padding: 0em 9em 0em 9em;
            width: auto;
            height: auto;
            background-color: ;
            margin-bottom: 13em;

        }
        .imgg{
            color: red;
            font-family: century gothic;
        }

        .rates{
            width: 200px;
            height: auto;
            background-color: ;
            padding: 0em 1em 0em 1em;
            margin-bottom: 0em;
            letter-spacing: 4px ;

        }
        .rates,.imgg{
            display: inline-block;
        }
        .tell{
            width: auto;
            height: auto;
            background-color: ;
            padding: 0em 1em 1em 1em;
            text-indent: 10px;
        }
        .incent{
            width: auto;
            height: auto;
            background-color: ;
        }
        #twit{
            margin-top: 5em;
        }
        .btndsgn{
            background-color: darkcyan;
            border: none;
            color: white;
            padding: 13px 30px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            float: right;
            cursor: pointer;
            border-radius: 5px;
            
        }
        .btndsgn:hover{
            background-color: skyblue;
            box-shadow: 0em 0em 3em;
        }
        .tgline{
            color: darkseagreen;
        }
        
    </style>
    <head>
        <title>Online Story Maker</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <link rel="icon" href="Images/o.png">
        <link rel="stylesheet" href="index.css">
    </head>
    <body>
        <script>
            $(document).ready(function(){
                $('[data-toggle="popover"]').popover();   
            });
        </script>
        <div class="">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="Images/DD.jpg" width="300px" height="345px">
                        <div class="carousel-caption">
                            <h1>Read, Excel, Express</h1>
                            <h4>"Some Stories, you use up. Others use you up" <br><br>-Chuck Palahniuk</h4>
                        </div>
                    </div>
                    <div class="item">
                        <img src="Images/money.jpg" width="300px" height="345px">
                        <div class="carousel-caption">
                            <h1>Earn by Creating and Sharing your Stories.&#128512</h1>
                            <h4>Subscribe.Read.Like</h4>
                        </div>

                    </div>
                </div>
            </div>
            <nav class="navbar navbar-default" id="navcolor">
                <div class="navbar-header">
                    <a class="navbar-brand" class="this" href="index.php">
                        <p class="title">
                            <img src="Images/LogoCaps.png" width="" height="" style=" max-height: 120px;
                                                                                   max-width:200px;
                                                                                   margin-left: -50px;" />
                        </p>
                    </a>
                </div>
                <ul class="nav navbar-nav" id="nvcolor">
                    <li><button type="button" class = "btn" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-original-title="Browse" data-html="true" data-content=" <a href='index2.php?q=Action'>Action</a> <a href='index2.php?q=Adventure'>Adventure</a> <a href='index2.php?q=Fantasy'>Fantasy</a> <a href='index2.php?q=Horror'>Horror</a> <a href='index2.php?q=Romance'>Romance</a>"><i class="entypo-check"></i><p class="nv">Categories</p></button></li>

                    <li><button type="button" class = "btn" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-original-title="Browse" data-html="true" data-content="<a href='index5.php'>Contest</a><br><a href='index3.php'>About Us</a>"><i class="entypo-check"></i><p class="nv">Community</p></button></li>

                    <li><a class="rght" href="#" data-toggle="modal" data-target="#Login"><p class="nr" ><span class="glyphicon glyphicon-user"></span> Login</p></a></li>
                </ul>
            </nav>
            <!-- MODAL FOR LOGIN -->
            <div class="modal fade" id="Login" role="dialog">
                <div class="modal-dialog" id="mdl">
                    <div class="modal-content"> 
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <center>
                                <img src="Images/LogoCaps.png">
                            </center>
                        </div>
                        <div class="modal-body">
                            <center>

                                <p>Enter your valid account. If you don`t have an account, sign up</p>
                            </center>
                            <br>
                            <div class="mcon">
                                <form action="Form1.php" method="post">
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
                                        <input class="btnsub" type="submit" value="Login" >
                                    </center>
                                    <br>
                                    <center> 
                                        <a href="index.php">Sign up</a> &emsp;|&emsp; 
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

            <div class="cent">
                <br>
                <br>
                <br>
                <label>&emsp;Like, Vote and Subscribe!</label>
                <hr>
                <div class="tagLeft">
                    <div class="imgg">
                        <h1>Create and subscribe stories and share it to the world!</h1>

                    </div>
                    <p class="tgline">Help us to share this site all over the world, Click Tweet and Share below.</p>


                    <!---->

                    <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>

                    <a id="twit" class="twitter-share-button" href="https://twitter.com/intent/tweet?text="
                       data-size="large">
                        Tweet</a>

                    <div id="fb-root"></div>
                    <script>(function(d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (d.getElementById(id)) return;
                            js = d.createElement(s); js.id = id;
                            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";
                            fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));</script>
                    <div class="fb-share-button" data-href="http://ourstory.juysolutions.com/index.php" data-layout="button" data-size="large" data-mobile-iframe="true">
                        <a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Share</a></div>







                    <div class="tell">
                        <hr>
                        <?php
                        $result = $conn->query("SELECT title,dDescript FROM howtobe WHERE category = 'Tips' ORDER BY rand() LIMIT 1 ");

                        if($result->num_rows > 0)
                        {
                            while ($row = $result->fetch_array())
                            { 
                                $ttle = $row['0'];
                                $bdy = $row['1']; 
                            }
                            echo ' 
                            <h4>'.$ttle.'</h4>
                            <p>'.$bdy.'</p>.</div><br> ';
                        }

                        ?>
                    </div>

                    <div class="tagRight">
                        <div class="panel panel-default">
                            <div class="panel-heading"><span class="glyphicon glyphicon-pencil"></span>&emsp;<label>SIGN UP HERE</label></div>
                            <div class="panel-body">
                                <form action="Register.php" method="post">
                                    <input class="form-control" id="tbr" type="text" name="tbname" placeholder="First name" required><br>
                                    <input class="form-control" id="tbr" type="text" name="tblastname" placeholder="Last name" required>
                                    &nbsp;<br>&nbsp;<label>Birthday</label><br>
                                    <input class="form-control" id="tbr" type="date" name="tbbday" placeholder="Birthday" required><br>
                                    <input class="form-control" id="tbr" type="email" name="tbemail" placeholder="E-mail" required><br>
                                    <input class="form-control" id="tbr" type="text" name="tbusername" placeholder="Username" required><br>
                                    <input class="form-control" id="tbr" type="password" name="tbpassword1" placeholder="Password" required><br>
                                    <input class="form-control" id="tbr" type="password" name="tbpassword2" placeholder="Retype Password" required><br>

                                    &emsp;<input class="btndsgn" type="submit" value="Register">
                                </form>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
            <?php
            if(isset($_GET['FailLog'])){
                $prmt = $_GET['FailLog'];
                echo ' <script>
                            window.alert("Incorrect Username and Password");
                        </script>';
            }

            if(isset($_GET['alert'])){
                $prmt = $_GET['alert'];
                echo ' <script>
                            window.alert("ERROR: Password does not match -- Please try again ");
                        </script>';
            }
            if(isset($_GET['message'])){
                $prmt = $_GET['message'];
                echo ' <script>
                            window.alert("Welcome Guest you are now registered! Enjoy!");
                        </script>';
            }
            ?>

            </body>
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
                $time       = date('r');
                $_SESSION['ctform']['timetosolve'] = $securimage->getTimeToSolve();
                $_SESSION['ctform']['error'] = false;  // no error with form
                $_SESSION['ctform']['success'] = true; 

                header("location:index.php?pswd=sola");

                /*if($_POST)
                {
                    $username =  mysqli_real_escape_string($conn,$_POST['tbuser']);


                    $result = $conn->query("SELECT * FROM accounts WHERE Username = '$username'");
                    if($result->num_rows > 0)
                    {
                        while ($row = $result->fetch_assoc())
                        {
                            $passdb = $row['Password'];
                        }
                        echo $pasdb;
                    }
                } 
            */

            } 
            else{
                foreach($errors as $key => $error) {
                    $_SESSION['ctform'][$key] = "<span class=\"error\">$error</span>";
                }
                $_SESSION['ctform']['error'] = true; // set error floag
            }
        }
    }

