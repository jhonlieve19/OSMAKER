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
        <link rel="icon" href="Images/OSM_Icon.ico">
        <link href="css/hover.css" rel="stylesheet" media="all">

    </head>
    <style type="text/css">

        @font-face
        {
            font-family:'Oxygen';
            src: url(fonts/Oxygen-Regular.ttf) format('truetype');
        }

        
        .ak{

            background-color: transparent;
            border: 1px solid white;
            border-radius: 10px;
            height: 400px;
            width: 500px;
            font-size: 20px;
        }
        .ak img
        {
            padding-left: 25px;
            position: relative;
            top: 10px
        }
        .ak p
        {
            color: white;
            font-family: 'Oxygen'
        }
        form
        {

        }
        #con{
            margin-top: 8%;

        }
        td{
            height: 30px;
        }
        body
        {
            background: linear-gradient(100deg, #4296ce, #3578a7);
            font-family: 'Oxygen'
        }
        #btnadmin
        {
            border: 1px solid white;
            background-color: transparent;
            border-radius: 25px;
            width: 100px;
            color: white;
            font-size: 15px
        }
        #btnadmin:hover
        {
            background-color: white;
            color: #4296ce;
        }

        .logo{
            width: 264px;
            height: 80px;
            margin-left: -40px;
        }
        #login
        {
            color: whitesmoke
        }
        #txtbox
        {
            border-radius: 15px;
            border: 1px solid white;
            outline: 0 !important;
            padding-left: 15px;
            width: 150px
        }
    </style>
    <body>

        <center>

            <div class="container" id="con">
                <div class="ak">
                    <a href="index.php"><img class="logo" src="Images/osmlogomodaladmin.png"></a>

                    <hr>
                    <form action="Administrator.php" method="post">
                        <p>ADMIN</p>
                        <br>
                        <table border="0">
                            <tr>
                                <td id="login">Username: </td>
                                <td>&emsp;<input type="text" name="user" placeholder="Username" required autofocus id ="txtbox"></td>
                            </tr>
                            <tr>
                                <td id="login">Password:</td>
                                <td>&emsp;<input type="password" name="pass" placeholder="Password"  required id ="txtbox"></td>
                            </tr>

                        </table>
                        <br>
                        <input id="btnadmin" type="submit" value="LOGIN" class="hvr-fade">


                    </form>
                </div>
            </div>
        </center>
    </body>
</html>