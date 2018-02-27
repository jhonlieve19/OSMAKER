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
@font-face
{
    font-family:'Oxygen';
    src: url(fonts/Oxygen-Regular.ttf) format('truetype');
}
body{
    /*background-image: url(Images/background/main_osmbackgroundzzz.png);*/
    background: linear-gradient(100deg, #1f9b82, #0f6c98); 
}

.mcon{
    padding: 0em 5em 3em 5em;

}
.btnsub{
    background-color: darkcyan;
    border-radius: 25px;
    border-collapse: collapse;
    width: 300px;
    height: 30px;
    border-style: none;
    margin: 2px;
    color: white;
    outline: 0 !important
}
li button{
    background-color:transparent;
}


.btnsub:hover{

    box-shadow: 0em 0em 3em;
    background-color: #08b0b0
}
.tagRight{
    width: 660px;
    height: auto;
    padding: 0.7em 2em 2em 2em;


} 
.container{
    /*  background: linear-gradient(100deg, #f45236, #d01f34);*/

}
.logo img{
    width: 70px;
    height: 40px;
    margin-left: 40px
}
.logo{
    float: left;
    padding-top: 20px;

}

.btn:focus
{

    /*background-color:#046D8B;*/
    outline:0 !important;
    color: white;
    text-shadow: 1px 1px #333333;
    box-shadow: 0px 0px 54px 0px rgba(0,0,0,0.1);
}


#osm{
    width: 900px;
    padding-top: 40px
}
.tagRight,.tagLeft{  
    display: inline-block;
}

.cent{
    padding: 0em 9em 0em 9em;
    width: auto;
    height: auto;

    margin-bottom: 13em;

}
.imgg{
    color: white;
    font-family: century gothic;
}

.rates{
    width: 200px;
    height: auto;

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

    padding: 0em 1em 1em 1em;
    text-indent: 10px;
}
.incent{
    width: auto;
    height: auto;

}
#twit{
    float: left;
    margin-top: 5em;
    display: block;
    padding: 0 0 110px 170px;
    background: url(Images/twitterlink.png) 1px center no-repeat;
    background-size: cover;
    border: 1px solid #d3eae0;
    border-radius: 2px;
}
#twit:hover
{
    background-color: #1b6c79
}
#facebookicon:hover
{
    background-color: #1b6c79
}
#facebookicon
{
    float :left;
    margin-top: 5em;
    margin-left: 3em;
    display: block;
    width: 170px;
    height: 112px;
    border: 1px solid #d3eae0;
    border-radius: 2px
}

.twitterlink
{
    width: 150px;
    height: 110px;
}


#btndsgn{
    background-color: darkcyan;
    color: white;
    padding: 0px 23px;  
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    float: right;
    cursor: pointer;
    border-radius: 25px;
    background-color: #257cdb;
    border-color: #257cdb;
    border: 1px solid #257cdb;
    width: 80px;
    height: 30px;
    text-align: left;
    font-family:'Oxygen';
}
#btndsgn:hover{

    background-color: #1c82f2;
    text-shadow: 1px 1px #7b7c7d  
}
.tgline{
    color: #d3eae0;
}
.signuphere{
    color: white;
}
.signuphere h4{
    color:ghostwhite;
    padding-left: 370px;
    font-family: "Oxygen"
}
#signupform{
    position: relative;
    left: 120px;
    box-shadow: 0px 0px 54px 0px rgba(0,0,0,0.28);

}
#hr1
{
    width: 850px;
}

.footlogo img
{
    float: right;
    width: 100px;
    height: 55px;
    position: relative;
    top: -50px;
    left: -30px;
}
.footlogo p
{
    float: right;
    position: relative;
    left: 70px;
    color: #d3eae0
}

li button a:hover
{
    text-decoration: none;
    color:white
}
#signh3
{
    font-family: 'Oxygen';
    background-image: url(Images/signuphere.png);
    background-repeat: no-repeat;
    background-size: cover;
    width: 245px;
    height: 30px;
    text-indent: 40px;
    font-size:18px;
    padding-top: 5px
}

.navbtn
{
    border: 1px solid transparent;
    outline: 0 !important;
    width: 110px;

}
.navbtn p
{
    position: relative;
    top: 5px;

}
.navbtn:focus
{
    /*background-color:#046D8B;*/
    outline:0 !important;
    color: white;
    border-radius: 20px;
    border: 1px solid white
}
.navbtn:hover
{
    color: white
}

.ctg{

    float: left;
    padding-top: 30px;
    padding-left: 550px;
    color: #d3eae0;
    font-family: 'Oxygen';
    list-style-type: none;  
    height: 65px;
    width: 1000px
}

}
.ctg:focus
{
    text-decoration-color: white
}

#logintxt
{
    color: #d3eae0;
    font-family: 'Oxygen';
}
#logintxt:hover
{
    color: white;
}
.ctg button
{
    float: left;
}
.ctg a:hover
{
    color: red;
    text-decoration: none
}
#free
{
    position: relative;
    left: -30px;
}
#tweet, #share
{
    float: left;
    margin-right: 30px
}
.sm
{
    color: white
}

</style>
<head>
    <title>Online Story Maker</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="icon" href="Images/OSM_Icon.ico">
</head>
<body>
    <script>
        $(document).ready(function(){
            $('[data-toggle="popover"]').popover();   
        });
    </script>
    <div class="container">

        <div class="logo">
            <a href = "index.php"><img src="Images/osmlogo.png" alt ="Online Story Maker"></a>
        </div>
        <div class="ctg">

            <li><button type="button" class = "navbtn" id = "cat"data-toggle="popover" data-placement="bottom" data-trigger="focus"  data-html="true" data-content=" <a href='index2.php?q=Action'>Action</a><br><a href='index2.php?q=Adventure'>Adventure</a><br><a href='index2.php?q=Fantasy'>Fantasy</a><br><a href='index2.php?q=Horror'>Horror</a><br><a href='index2.php?q=Romance'>Romance</a>"><i class="entypo-check"></i><p>Category</p></button></li>

            <li><button type="button" class = "navbtn" id ="comm" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-html="true" data-content="<a href='index5.php'>Contest</a><br><a href='aboutus.php'>About Us</a>"><i class="entypo-check"></i><p>Community</p></button></li>

            <li><button type ="button" class="navbtn" clashref="#" data-toggle="modal" data-trigger="focus" data-target="#Login"><p id="logintxt">Sign in</p></button></li>



            <li><button type ="button" class="navbtn"><a href="#signuplink"><p id="logintxt">Create account</p></a></button></li>



        </div>
        <!-- MODAL FOR LOGIN -->

        <div class="modal fade" id="Login" role="dialog">
            <div class="modal-dialog" id="mdl">
                <div class="modal-content"> 
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <center>
                            <img src="Images/osmlogomodal.png">

                        </center>
                    </div>
                    <div class="modal-body">
                        <center>

                            <p>No account yet? click create account to make one.</p>
                        </center>
                        <br>
                        <div class="mcon">
                            <form action="registerconfirm.php" method="post">
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
                                    <input class="btnsub" name="btn_login" type="submit" value="Sign in" >
                                </center>
                                <br>
                                <center> 
                                    <a href="index.php">Create account</a>
                                    &emsp;|&emsp;
                                    <a href="captcha.php">Forgot Password?</a>   

                                </center>
                                <br>
                            </form>
                        </div>
                    </div>
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
        if(isset($_GET['leng'])){
            $prmt = $_GET['leng'];
            echo ' <script>
            window.alert("ERROR: Password must be atlest minimum of 8 characters-- Please try again ");
            </script>';
        }
        if(isset($_GET['exist'])){
            $prmt = $_GET['exist'];
            echo ' <script>
            window.alert("ERROR: Username Already exists -- Please try again ");
            </script>';
        }
        if(isset($_GET['message'])){
            $prmt = $_GET['message'];
            echo ' <script>
            window.alert("Welcome Guest you are now registered! Enjoy!");
            </script>';
        }
        ?>
        <!--END OF MODAL-->


        <div class="cent">     
            <img id = "osm" src="Images/osmindex1.png">
            <hr>
            <div class="tagLeft">
                <div class="section">
                    <div class = "signuphere">
                        <a name="signuplink"></a>
                        <h3 id="signh3">Sign up here</h3>
                        <br>
                        <h4 id="free">It’s free and always will be.</h4>
                    </div>


                    <div class="tagRight">
                        <div class="panel panel-default" id="signupform">
                            <div class="panel-heading"><span class="glyphicon glyphicon-pencil"></span>&emsp;<label>Sign up</label></div>
                            <div class="panel-body" id="formbtn">
                                <form action="Register.php" method="post">
                                    <input class="form-control" id="tbr" type="text" name="tbname" placeholder="First name" required><br>
                                    <input class="form-control" id="tbr" type="text" name="tblastname" placeholder="Last name" required>
                                    &nbsp;<br>&nbsp;<label>Birthday</label><br>
                                    <input class="form-control" id="tbr" type="date" name="tbbday" placeholder="Birthday" required><br>
                                    <input class="form-control" id="tbr" type="email" name="tbemail" placeholder="E-mail" required><br>
                                    <input class="form-control" id="tbr" type="text" name="tbusername" placeholder="Username" required><br>
                                    <input class="form-control" id="pas" type="password" name="tbpassword1" placeholder="Password" required><br>
                                    <input class="form-control" id="rpas" type="password" name="tbpassword2" placeholder="Retype Password" required><br>
                                    <input id="btndsgn" name="btn_save" class ="button" type="submit" value="Save">
                                </form>
                            </div>
                        </div>

                        <br>
                        <br>
                        <br>
                        <hr id="hr1">
                        <p class="tgline">Help us to share this site all over the world, Click Tweet and Share below.</p>


                        <!-- -->
                        <br>
                        <h3 id="signh3" class="sm">Social Media</h3>
                        <br>
                        <div id="socialmedia">

                            <div id="tweet">
                                <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                                <a id="twit" class="twitter-share-button" href="https://twitter.com/intent/tweet?text="data-size="large">Tweet</a>
                            </div>
                            <div id="share">
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
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>


            </div>
            <div class="footlogo">
                <img src="Images/osmlogo.png">
                <p>© OSM Developers, 2017</p>
            </div>

        </div>


    </body>
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

