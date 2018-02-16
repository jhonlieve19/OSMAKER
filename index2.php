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
        <link href="css/.css" rel="stylesheet">

        <style type="text/css">
            @font-face
            {
                font-family:'Oxygen';
                src: url(fonts/Oxygen-Regular.ttf) format('truetype');
            }
            #storytype
            {
                font-family: 'Oxygen';
            }

            #rght{
                margin-left: 6.7em;

            }
            .tb{
                margin: 7px 2px 0px 5px;
                border-bottom-color: transparent;
                border-style:hidden;
                padding: 3px;
                border-radius: 5px;
            }
            .con{
                background-color: transparent;
                height: auto;
                padding: 1em;
                border: 1px;
                border-top-color: red;
                border-radius: 2px
            }
            #ins{
                background-color: white;
                height: 300px;
                width: 191px;
                margin: 1em 1em 1em 1em;
                display: inline-block;
                border-radius: 4px;
                padding: 1%;
                font-family:'Oxygen';
                position: relative;
                box-shadow: 0px 1px 5px 0px rgba(64,64,64,1);

            }
            #ins:hover
            {
                border-bottom: 5px solid #E81D29;



            }
            .hvr-grow-shadow {
                display: inline-block;
                vertical-align: middle;
                -webkit-transform: perspective(1px) translateZ(0);
                transform: perspective(1px) translateZ(0);
                box-shadow: 0 0 1px transparent;
                -webkit-transition-duration: 0.3s;
                transition-duration: 0.3s;
                -webkit-transition-property: box-shadow, transform;
                transition-property: box-shadow, transform;
            }
            .hvr-grow-shadow:hover, .hvr-grow-shadow:focus, .hvr-grow-shadow:active {
                box-shadow: 0 10px 10px -10px rgba(0, 0, 0, 0.5);
                -webkit-transform: scale(1.1);
                transform: scale(1.1);
            }


            img,.lg{
                width:175px;
                height:175px;
                position: relative;
                left: -4px;
                top: -4px;
                margin-bottom: 4%;
                border-radius: 2px;
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
            body{
                background: linear-gradient(100deg, #1f9b82, #0f6c98);
                background-attachment: fixed;
                background-repeat: no-repeat;
                background-size: cover;
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
            #navcolor
            {
                background-color: transparent;
                border: 1px solid transparent;
            }
            #nvcolor
            {
                background-color: transparent;
                color: white;
            }
            .container
            {



            }
            li button{
                background-color:transparent;
            }
            #logintxt{
                color: #d3eae0;
                float: right;
                position: relative;
                top: -8px;
                font-family: 'Oxygen';
            }
            #logintxt:focus
            {
                outline: 0 !important;
            }
            #logintxt:hover
            {
                color: white
            }
            #logintxt1:hover
            {
                color: white
            }
            #logintxt1{
                color: #d3eae0;
                float: right;
                position: relative;
                top: 5px;
                left: 10px;
                font-family: 'Oxygen';
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
            #maincon
            {   
                padding-top: 40px;
                background-color: transparent;
            }
            ul li
            {
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
            .footlogo p
            {
                float: right;
                position: relative;
                left: 70px;
                top: 50px;
                color: #d3eae0
            }
            #logomodal
            {
                width: 440px;
                height:150px
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
            .navbtn
            {
                border: 1px solid transparent;
                width: 110px
            }
            .navbtn p
            {
                position: relative;
                top: 5px
            }
            .navbtn:focus
            {
                outline:0 !important;
                color: white;
                border-radius: 20px;
                border: 1px solid white
            }
            .navbtn:hover
            {
                color:white
            }
            .ctg a:hover
            {
                color: red;
                text-decoration: none
            }
            #h3prop
            {
                font-family:'Oxygen';
                color: white;
                background-image: url(Images/signuphere.png);
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
            #signinview
            {
                color: #E81D29;
                border: 1px solid #E81D29;
                border-radius: 50px;
                width: 100px;
                text-align: center;
                float: right;
            }
            #signinview:hover
            {

                cursor: pointer;
                color: white;
                background-color: #E81D29
            }
            #nothing
            {
                color: white
            }
            #hrnav
            {
                color:d3eae0;
                position: relative;
                top: -20px
            }
            .hvr-fade {
                display: inline-block;
                vertical-align: middle;
                -webkit-transform: perspective(1px) translateZ(0);
                transform: perspective(1px) translateZ(0);
                box-shadow: 0 0 1px transparent;
                overflow: hidden;
                -webkit-transition-duration: 0.2s;
                transition-duration: 0.2s;
                -webkit-transition-property: color, background-color;
                transition-property: color, background-color;
            }
            .hvr-fade:hover, .hvr-fade:focus, .hvr-fade:active {
               
                color: white;
            }

        </style>
    </head>
    <!--        -------------------------------------------------------------------------------------------------------------------------->
    <body>
        <div class="container">
            <nav class="navbar navbar-default" id="navcolor">
                <div class="logo">
                    <a href="index.php"><img src ="Images/osmlogo.png";></a>
                </div>
                <div class="ctg">
                    <ul class="nav navbar-nav" id="nvcolor">
                        <li><button type="button" class = "navbtn" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-html="true" data-content=" <a href='index2.php?q=Action'>Action</a> <a href='index2.php?q=Adventure'>Adventure</a> <a href='index2.php?q=Fantasy'>Fantasy</a> <a href='index2.php?q=Horror'>Horror</a> <a href='index2.php?q=Romance'>Romance</a>"><i class="entypo-check"></i><p class="nv">Category</p></button></li>

                        <li><button type="button" class = "navbtn" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-html="true" data-content="<a href='index5.php'>Contest</a><br><a href='aboutus.php'>About us</a>"><i class="entypo-check"></i><p class="nv">Community</p></button></li>



                        <li><a class="rght" href="#" id = "logintxt" data-toggle="modal" data-target="#Login"><p>Sign in</p></a></li>

                        <li><button type ="button" class="navbtn"><a href="index.php"><p id="logintxt1">Create account</p></a></button></li>
                    </ul>
                </div>
            </nav>
            <hr id="hrnav">

            <!--        --------------------------------------------------------------------------------------------------------------------------->
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





            <div class="con" id="maincon">
                <div class="modal fade" id="Login" role="dialog">
                    <div class="modal-dialog" id="mdl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <center>
                                    <img src="Images/osmlogomodal.png" id="logomodal">
                                </center>
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


                <?php 
                if(isset($_REQUEST['q']))
                    $q = $_REQUEST['q'];
                echo' <h4 id="h3prop">&emsp;'.$q.' Stories</h4>
                ';
                $result = $conn->query("SELECT * FROM uploads WHERE place LIKE '$q' ORDER BY rand() LIMIT 8");
                if($result->num_rows > 0)
                {
                    while ($row = $result->fetch_assoc())
                    {   
                        $seq = $row['seqNo'];
                        $filename = $row['filename'];
                        $title = $row['title'];
                        $auth = $row['author'];

                        echo '

					   <div class="hvr-grow-shadow" id="ins">


									<center>		
										<img src="Uploads/'.$filename.'">
									</center>
									<h5>'.$title.'</h5>

								<h6>by: '.$auth.'</h6> 

                                <p id ="signinview" class= "hvr-fade" data-toggle="modal" data-target="#Login">Read story</>



							</form>

						</div>

					   ';

                    } 
                }
                else
                {
                    echo'<p id = "nothing">&emsp;Nothing to show at this moment</p><br><br><br><br><br>';
                }					
                ?>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>

            </div>


            <div class="con">




                <?php 

                if(isset($_REQUEST['q']))
                    $q = $_REQUEST['q'];
                //echo '<h2>&emsp;Our '.$q.' Collaborative Stories</h2><hr>';
                $result = $conn->query("SELECT * FROM cstories WHERE status = 'Write' AND cCAT LIKE '$q' ORDER BY rand() LIMIT 8");
                if($result->num_rows > 0)
                {
                    while ($row = $result->fetch_assoc())
                    {   
                        $seq = $row['storySeq'];
                        $filename = $row['iCover'];
                        $title = $row['cTitle'];
                        $auth = $row['cWritter'];
                        $key = $row['storyKey'];

                        echo '


					   <div class="hvr-grow-shadow" id="ins">

									<center>		
										<img src="Uploads/'.$filename.'">
									</center>
										<h5>'.$title.'</h5>

								<h6>by: '.$auth.'</h6> 

						</div>

					   ';
                    } 
                }
                else
                {
                    //    echo'&emsp;Nothing to show at this moment<br><br><br><br><br><br><br><br><br><br>';
                }					
                ?>



            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <hr id="hrnav">
            <div class="footlogo">
                <img src="Images/osmlogo.png">
                <p>© OSM Developers, 2017</p>
            </div>
        </div>  

    </body>

</html>