<?php
session_start();
error_reporting(0);
include "Connection.php";
$code = "";
if($_POST)
{
    $username =  mysqli_real_escape_string($conn,$_POST['tbuser']);
    $password =  mysqli_real_escape_string($conn,$_POST['tbpassword']);


    $result = $conn->query("SELECT Username,Password FROM accounts WHERE Username LIKE '$username' AND Password LIKE '$password'");
    if($result->num_rows > 0)
    {
        while ($row = $result->fetch_assoc())
        {
            $userdb = $row['Username'];
            $passdb = $row['Password'];
        }
        if($username == "Admin"){
            header("location: index.php?message=Invalid User");
        }
        else{
            if($userdb == $username &&  $passdb == $password )
            {
                $_SESSION['Username'] = $username;

            }
            else{
                header("location: index.php?message=Invalid User");
                die();
            }
        }

    }
    else
    {
        header("location: index.php?FailLog=username does not exist or enter your username & password");
        die();
    } 

}
if(isset($_SESSION['Username'])){
    //echo'na set na';
    $usr = $_SESSION['Username'];
}
else{
    header("location:index.php?msg=Login First");
}

if(isset($_POST['search']))
{

}
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
        <link href="css/hover.css" rel="stylesheet" media="all">
        <style type="text/css">
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

            .uperttle{
                color: White;
                text-decoration-style:solid;
                font-weight: 400;
                font-family:'Oxygen';


            }
            .sud
            {
                padding: 1em 1em 3em 1em;
                width: auto;
                height: 600px;
            }
            .upper
            {
                width: auto;
                height: auto;   
                background-color: transparent;
                padding: 1em;
                font-family:'Oxygen;
            }
            .enter
            {
               width: 1100px;
                height: auto;
                background-color: #FEFEFE;
                border: 1px solid white;
                border-radius: 10px;
                margin: 1em;
                display: inline-block;
                padding: 2em;
                box-shadow: 0em 0.2em 0.1em 0em transparent;
                padding-bottom: 5em;
            }
            .done:hover
            {
                background-color:#167673;
            }
            .btnente
            {
                background-color: transparent;
                width: 270px;
                height: 40px;
                color: gray;
            }
            .btnenter:hover
            {
                background-color: orange;
                color: white
            }
            .btnwin
            {
                background-color: transparent;
                border-radius: 5px;
                border: 1px solid white;
                width: 270px;
                height: 40px;
                color: white;
            }
            .btnwin:hover
            {
                border-style:solid;
                background-color: white;
                color: darkcyan;
                border-color: white;
            }
            .done
            {
                width: 330px;
                height: auto;
                background-color: transparent;
                border: 1px solid white;
                border-radius: 3px;
                margin: 1em;
                display: inline-block;
                padding: 2em;
                padding-bottom: 5em;
                font-family: 'Oxygen';
                color: white
            }
            .le
            {
                font-family: century gothic;
                font-size: 30px;
                color: 
            }
            .maincon
            {
                margin-top: 20px;
                background-color: transparent;
                height: auto;
            }
            h2,p
            {
                font-family:'Oxygen';
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
            #words
            {
                padding-left: 10px;
                color: whitesmoke
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
            .done p
            {
                float: left;
                text-indent: 10px;
                color: white;
            }
            .done h1
            {
                font-weight: bold
            }
            #linya
            {
                float: left;
                border: 0.5px solid white;
                width: 50px;
                position: relative;
                top: 10px;
                margin-left: 10px
            }
            #linyas
            {
                padding-left: 5px
            }
            #nocontest
            {
                color: white;
                font-family: 'Oxygen';
                text-indent: 10px
            }
            #trophy
            {
                width: 200px;
                height: 200px;
                margin-right: 100px;
                margin-left: 100px;
                padding-top: 20px
            }
            #word
            {
                padding-top: 20px;
                padding-left: 30px
            }
            #imaged,#word
            {
                float: left;
              
            }
             #entries{
                background-color: #F5D718;
                border: 1px solid #F5D718;
                color: black;
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
            #entries:hover{
                border-style:solid;
                background-color: white;
                color: #F5D718;
                border-color: #F5D718;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <?php
            include "nav2.php";
            ?>
            <div class="liness">
            </div>
            <br>
            <br>
            <br>
            <br>
            <div class="maincon">
                <div class="upper">

                    <h4 id="h3prop">Contest</h4>
                    <div id="words">
                        <h2 class="uperttle">Create your own story and win</h2>
                        <p>Make a story to win. Making story gives exposure and recognition to all makers who joined.
                            Aspiring makers throughout the world are invited to enter this prestigious story making competition.</p>
                        <br>
                    </div>
                </div>
                <div class="sud">

                    <?php 
                    $datenow = date("Y-m-d");
                    $result = $conn->query("SELECT * FROM adkontis WHERE startDate < now() ORDER BY conID Desc ");
                    if($result->num_rows > 0)
                    {
                        while ($row = $result->fetch_array())
                        {   
                            $id = $row['0'];
                            $de = $row['1'];
                            $st = $row['2'];
                            $en = $row['3'];
                            $enV = $row['4'];
                            if($datenow < $enV)
                            {
                                echo '
					     <div class="enter">
                         <div id="imaged">
                         <img src="Images/trophy.jpg" alt ="Contest" id="trophy">
                         </div>
                         <div id="word">
                            <label class="le">'.$de.'</label>
                            <p>WELCOME TO THIS WRITING CONTEST, JOIN NOW!</p>
                         
                           <br>
                           <form action="ViewEntries.php?ConID='.$id.'" method="post">
                            <input type="text" value="'.$id.'" name="ConID" size="2" hidden>
                            
                            <input id="entries" type="submit" value="VIEW CONTEST" class="hvr-fade">
                            
                           </form>
                           </div>
                          </div>';

                            }
                            else{

                                echo '
					     <div class="done">

                            <center><h1>'.$de.'</h1>
                            <div id = "linyas"><div id = "linya"></div><p>This contest is closed</p><div id = "linya"></div></div></center>



                           <br><br><br><br>
                           <form action="ViewEntries.php?ConID='.$id.'" method="post">
                            <input type="text" value="'.$id.'" name="ConID" size="2" hidden>
                            <center>
                            <input class="btnwin" type="submit" value="V I E W &nbsp; W I N N E R">
                            </center>

                           </form>
                          </div>';
                            }
                        }
                    }
                    else
                    {
                        echo'<p id ="nocontest">No Contest yet</p> <br>';
                    }					
                    ?>
                </div>

            </div>
            <br><br><br><br><br><br><br><br><br><br><br>
            <div class="linesss">
            </div>
            <div class="footlogo">
                <img src="Images/osmlogo.png">
                <p>© OSM Developers, 2017</p>
            </div>
        </div>

    </body>
</html>