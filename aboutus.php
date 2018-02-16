<?php

include "Connection.php";

?>
<!DOCTYPE html>
<html>

    <head>
        <title>Online Story Maker</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <link rel="icon" href="Images/OSM_Icon.ico">

        <style type="text/css">
            @font-face
            {
                font-family:'Oxygen';
                src: url(fonts/Oxygen-Regular.ttf) format('truetype');
            }
            #rght
            {
                margin-left: 6.7em;

            }
            .tb{
                margin: 7px 2px 0px 5px;
                border-bottom-color: transparent;
                border-style:hidden;
                padding: 3px;
                border-radius: 5px;
            }

            }
            .ins{
                background-color: white;
                height: auto;
                width: 247px;
                margin: 1em;
                display: inline-block;
                padding: 1%;
                box-shadow: 0px 5px 4px 1px #dcdcdc;
            }
            img,.lg{
                width:218px;
                height:120px;
                margin-bottom: 4%;
            }
            .btnpass{
                width: auto;
                height: auto;
                background-color: transparent;
                font-family: Century Gothic;
                color: darkcyan;
                font-size: 15px;
                border-style: none;
                font-weight:100;
            }

            .tophead{
                width: auto;
                height: 30px;
                background-color: ;
            }
            .TopImage{
                max-height: 400%;
                max-width:98%;
                margin-top: -22px;
                margin-left: -27px;
            }

            .mcon{
                padding: 0em 5em 3em 5em;
                background-color: ;
            }
            .btnsub{
                background-color:darkcyan;
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

            .main-container{
                width: 357px;
                height: auto;
                background-color: whitesmoke;
                padding: 2em;
                margin: 10px;
                display: inline-block;
                box-shadow: 0px 5px 4px 1px #dcdcdc;
            }
            .entries{
                background-color: transparent;
                border: 1px solid white;
                color: white;
                padding: 10px 25px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                cursor: pointer;
                border-radius: 25px;
                font-family:'Oxygen';
                outline: 0 !important
            }
            .entries:hover{
                border-style:solid;
                background-color: white;
                color: darkcyan;
                border-color: white;
            }
            body
            {
                background: linear-gradient(100deg, #1f9b82, #0f6c98);
                font-family: 'Oxygen'
            }
            .container
            {

            }
            .logo img
            {
                width: 70px;
                height: 40px;
                margin-left: 40px
            }
            .logo
            {
                float: left;
                padding-top: 20px
            }
            .ctg
            {
                float: right;
                padding-top: 30px;
                padding-left: 100px;
                padding-right: 50px;
                color: #d3eae0;
                font-family: 'Oxygen';
            }

            #logintxt{
                color: #d3eae0;
                font-family: 'Oxygen';

            }
            #logintxt1{
                color: #d3eae0;
                font-family: 'Oxygen';
                position: relative;
                top: -1px
            }
            #logintxt:hover
            {
                color: white
            }
            #logintxt1:hover
            {
                color: white
            }

            li button a:hover
            {
                text-decoration: none;
            }
            .con
            {
                margin-top: 8em;
                background-color: transparent;
                height: auto;
                padding: 1em;
                border: 1px;
                border-top-color: red;
                border-radius: 2px;
            }
            #currentcon
            {
                width: 330px;
                height: auto;
                background-color: transparent;
                border: 1px solid white;
                border-radius: 3px;
                margin: 1em;
                display: inline-block;
                padding: 2em;
                box-shadow: 0em 0.2em 0.1em 0em transparent;
                padding-bottom: 5em;
            }
            #currentcon:hover
            {
                background-color:#167673;
            }
            h2
            {
                font-family:'Oxygen';
            }
            #contesttitle
            {
                font-family:'Oxygen';
                color: white;
                padding-bottom: 50px;
                position: relative;
                left: 35px

            }
            #modlogo
            {
                background-image: url(Images/osmlogomodal.png);
                background-repeat: no-repeat;
                height: 150px;
                background-position: center
            }
            .footlogo p
            {
                float: right;
                position: relative;
                left: 70px;
                top: 50px;
                color: #d3eae0
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

            .navbtn
            {
                background-color: transparent;
                border: 1px solid transparent;
                outline: 0 !importnat;
                width: 110px;
            }
            .navbtn:focus
            {
                outline:0 !important;
                color: white;
                border-radius: 20px;
                border: 1px solid white
            }
            .navbtn p
            {
                position: relative;
                top: 5px;
            }
            #logintxt1
            {
                position: relative;
                top: 5px;
            }
            ul li a:hover
            {
                text-decoration: none;
                color: red
            }
            #contestname
            {
                color: white;
            }
            #contestname:hover
            {
                text-decoration: none;
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
                top: -40px;
                text-indent: 5%;
            }
            #line
            {
                float: left;
                height: 1px;
                color: white;
                width: 50px;
                border: 0.5px solid white;
                position: relative;
                top: 7px
            }
            #line2
            {
                float: left;
                width: 100px
            }
            .divabout
            {
                color: white;
                font-family: 'Oxygen'
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
                top: 0px
            }
            #osm
            {
                width: 600px;
                height: 350px;
                padding-top: 40px;

            }
            .content
            {
                position: relative;
                top:-50px;
                color: whitesmoke;
                font-family: 'Oxygen'
            }
            .socialmedia
            {
                height: 200px;
                padding-left: 230px
            }
            #fb,#twit
            {
                float: left;  
                height: 180px;
                width: 260px;
                margin-left: 45px;
                border: 1px solid wheat;
                border-radius: 5px
            }
            #fb:hover,#twit:hover
            {
                background-color: #0f646a;
                cursor: pointer
            }
            #imgfb
            {
                width: 250px;
                height: 170px;
                float: right
            }
            #imgtwit
            {
                float: left;
                width: 250px;
                height: 200px;
                position: relative;
                top: -16px;
            }
            #socialmediah3:after,
            #socialmediah3:before
            {
                content:"\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0\00a0";
                text-decoration:line-through;
                font-size: 15px;
                position: relative;
                top: -3px
            }
            .contact p, .contact a
            {
                color: white
            }
            #information
            {
                position: relative;
                left: 460px;
                top: 20px
            }
        </style>
    </head>
    <body>
        <div class="container">

            <div class="logo">
                <a href = "index.php"><img src="Images/osmlogo.png" alt ="Online Story Maker"></a>
            </div>

            <div class="ctg">
                <ul class="nav navbar-nav" id="nvcolor">

                    <li><button type="button" class = "navbtn" data-toggle="popover" data-placement="bottom" data-trigger="focus"  data-html="true" data-content=" <a href='index2.php?q=Action'>Action</a> <a href='index2.php?q=Adventure'>Adventure</a> <a href='index2.php?q=Fantasy'>Fantasy</a> <a href='index2.php?q=Horror'>Horror</a> <a href='index2.php?q=Romance'>Romance</a>"><i class="entypo-check"></i><p id="logintxt">Categories</p></button></li>

                    <li><button type="button" class = "navbtn" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-html="true" data-content="<a href='index5.php'>Contest</a><br><a href='index3.php'>About us</a>"><i class="entypo-check"></i><p id="logintxt">Community</p></button></li>

                    <li><button type ="button" class="navbtn" clashref="#" data-toggle="modal" data-trigger="focus" data-target="#Login"><p id="logintxt">Sign in</p></button></li>



                    <li><button type ="button" class="navbtn"><a href="index.php"><p id="logintxt1">Create account</p></a></button></li>

                </ul>
            </div>

            <script>
                $(document).ready(function(){
                    $('[data-toggle="popover"]').popover();   
                });
            </script>
            <script>
                document.onkeydown=function(evt)
                {
                    var keyCode = evt ? (evt.which ? evt.which : evt.keyCode) : event.keyCode;
                    if(keyCode == 13)
                    {
                        document.squery.submit();
                    }
                }
            </script>
            <script>
                $(document).ready(function(){
                    $("#flip").click(function(){
                        $("#panel").slideDown("slow");
                    });
                });
            </script>


            <div class="liness">
            </div>
            <div class = con>
                <div class="modal fade" id="Login" role="dialog">
                    <div class="modal-dialog" id="mdl">
                        <div class="modal-content">
                            <div class="modal-header" id="modlogo">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <center>
                                    <p>No account yet ? Click Sign up to create your account.</p>
                                    <br>
                                </center>

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
                                            <a href="index.php">Sign up</a>     &emsp;|&emsp; 
                                            <a href="captcha.php">Forgot Password?</a>

                                        </center>

                                        <br>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="abs">
                    <br>
                    <h4 id="h3prop">About us</h4>
                    <div class = "content">
                        <center><img src="Images/osmindex1.png" alt="OSM" id="osm"></center>

                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,</p><br><br>

                        <center><h3 id="socialmediah3"> Social Media Links </h3></center><br><br>
                        <div class="socialmedia">
                            <div id="fb">
                                <img src="Images/facebooklink.png" alt="facebook" id="imgfb">
                            </div>
                            <div id="twit">
                                <img src="Images/twitterlink.png" alt="twitter" id="imgtwit">
                            </div>
                        </div><br>
                        <div class="contact">
                            <center><h3 id="socialmediah3"> Contact us </h3></center><br>
                            <cnter><div id="information">
                                <p>&#9742;&nbsp;&nbsp;&nbsp;&nbsp; 228-6236</p><br>
                                <p>&#9993;&nbsp;&nbsp;&nbsp;&nbsp; <a href="mailto:onlinestorymaker@gmail.com">onlinestorymaker@gmail.com</a></p><br>
                                <p>&#8962;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Sta. Ana Avenue Davao City</p><br>
                            </div></cnter>
                        </div>

                    </div>
                    <br>
                    <br>
                    <br>
                </div>
                <br>
                <div class="linesss">
                </div>
                <div class="footlogo">
                    <img src="Images/osmlogo.png">
                    <p>© OSM Developers, 2017</p>
                </div>
            </div>
        </div>
    </body>

</html>

