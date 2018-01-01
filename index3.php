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
        <link rel="icon" href="Images/o.png">
        <link rel="stylesheet" href="index.css">
        <style type="text/css">
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
                background-color: #f7f7f7;
                height: auto;
                width: auto;
                padding: 1em;
                border: 1px;
                border-top-color: red;
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
            body{
                background-color:;
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
            .abs{
                padding: 3em;
                text-indent: 2em;
                margin-bottom:  15em;
            }
  

        </style>
        <nav class="navbar navbar-default" id="navcolor">
            <div class="navbar-header">
                <a class="navbar-brand" class="this" href="index.php">
                    <p class="title">
                        <img class="lg" src="Images/LogoCaps.png" width="" height="" style=" max-height: 120px;
                                                                                              max-width:200px;
                                                                                              margin-left: -27px;" />
                    </p>
                </a>
            </div>
            <ul class="nav navbar-nav" id="nvcolor">
                <li><button type="button" class = "btn" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-original-title="Browse" data-html="true" data-content=" <a href='index2.php?q=Action'>Action</a> <a href='index2.php?q=Adventure'>Adventure</a> <a href='index2.php?q=Fantasy'>Fantasy</a> <a href='index2.php?q=Horror'>Horror</a> <a href='index2.php?q=Romance'>Romance</a>"><i class="entypo-check"></i><p class="nv">Categories</p></button></li>

                <li><button type="button" class = "btn" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-original-title="Browse" data-html="true" data-content="<a href='index5.php'>Contest</a><br><a href='index3.php'>About Us</a>"><i class="entypo-check"></i><p class="nv">Community</p></button></li>



            </ul>
        </nav>
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

    </head>

    <body>
        <div class="container">
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
                                <p>Please enter your valid account if you dont have an account please sign up first.</p>
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
            <div class="abs">
                <?php 
                $result = $conn->query("SELECT * FROM howtobe WHERE category = 'About'");
                if($result->num_rows > 0)
                {
                    while ($row = $result->fetch_array())
                    {   

                        $st = $row['2'];


                        echo "
                       <br>
                       <br>
					  <h2>About US</h2>
                      <hr>
                      <p>".$st."</p>
					   ";
                    } 
                }
                else
                {
                    echo'';
                }					
                ?>
            </div>
        </div>

        <br>
        <br>
        <br>
    </body>
    <?php
    include "footer.php";
    ?>
</html>
