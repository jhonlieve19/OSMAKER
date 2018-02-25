<!DOCTYPE html>
<?php
session_start();
include "Connection.php";
if(isset($_SESSION['Username'])){

    $username = $_SESSION['Username'];
    $usr = $_SESSION['Username'];
}
else
{
    header("location: index.php?ses=Login first");
    die();
}

if(isset($_POST['search']))
{
    echo $search = $_POST['search'];
}
?>
<hmtl>

    <head>
        <title>Online Story Maker</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <link rel="icon" href="Images/OSM_Icon.ico">
        <link href="css/hover.css" rel="stylesheet" media="all">
        <style  type="text/css">
            @font-face
            {
                font-family:'Oxygen';
                src: url(fonts/Oxygen-Regular.ttf) format('truetype');
            }

            html
            {
                overflow-x: hidden;
            }
            .container
            {
                background-color:transparent;
                padding-top: 50px;
                width: 1250px;


            }
            .inside-con{
                width: auto;
                height: auto;
                background-color: white;
                padding-left: 20px;

            }
            .gen{
                background-color: transparent;
                padding: 1em;
                width: auto;
                height: auto;
                margin-top: 0.1em;

            }
            .pro-con{
                background-color: white;
                padding: 1em;
                width: 380px;
                height: 330px;
                float: left;

            }
            .detail-con{
                background-color: white;
                padding-top: 1em;
                padding-left: 8em;
                width: 650px;
                height: 330px;
                margin-left: 310px;
            }
            .concon{
                padding: 1em;
                width: 1150px;
                height: auto;
                padding-left: 10px;
                margin-left: -10px

            }
            .ins{
                background-color: white;
                height: 260px;
                border: 1px solid #EBEBEB;
                width: 150px;
                display: inline-block;
                margin: 20px 20px 30px 0px;
                border-radius: 2px;
                padding: 10px 0 0 0;
                box-shadow: 0px 5px 0px 0px #dcdcdc;
            }
            .ins:hover
            {
                box-shadow: 0px 5px 0px 0px #E8B86F
            }
            #imgs{

            }
            .btnpass{
                width: auto;
                height: auto;
                font-size: 12px;
                border-style: none;
                font-weight:100;
                float: right;
                border: 1px solid orange;
                border-radius: 50px;
                background-color: white;
                margin-right: 10px;
                color: orange
            }
            .btnpass:hover
            {
                background-color: orange;
                color: white
            }
            .py{
                color:darkslategrey;
                font-weight: 100;
            }
            .pz{
                color:darkcyan; 
                font-weight: 100;
            }

            #editlink
            {
                width: 50px;
                height: 30px;
                -webkit-transform: scaleX(-1);
                transform: scaleX(-1);
                text-align: right;;
                font-size: 20px;
                background-size: 15px 15px;
                background-position: 0px 2px;
                position: relative;
                float: right;
                top: -30px;
                left: 195px;
            }
            #editlink:hover
            {

                width: 50px;
                height: 30px;
                text-align: right;
                color: orange;
                background-color: white;

            }


            .editacc{
                background-color: transparent;
                border-style: none;
                position: relative;
                top: -15px;
                left: 225px;
                outline: 0 !important;

            }
            body
            {
                background: linear-gradient(100deg, #1f9b82, #0f6c98);
            }
            .mastercon
            {
                border: 5px solid white;
                box-shadow: 0px 0px 54px 0px rgba(0,0,0,0.3);
                background-color: white

            }
            #h3prop
            {
                font-family:'Oxygen';
                color: white;
                background-image: url(Images/titlebgprofile.png);
                background-repeat: no-repeat;
                width: 240px;
                height: 38px;
                position: relative;
                left: -14px;
                top: -10px;
                text-indent: 40px;
                padding-top: 5px
            }
            #line
            {
                border: 0.5px solid #8b8b8b ;
                width: 700px
            }
            #lines{
                border: 0.5px solid #8b8b8b ;
                width: 1110px;

            }
            #lines1
            {
                border: 0.5px solid #8b8b8b ;
                width: 1110px;
            }


            #makestorylink,#viewtrans
            {
                color:  #077AC1;
                background-color: white;
                border :1px solid #077AC1;
                border-radius: 50px;
                padding: 0px 10px 0px 10px;

            }
            #makestorylink
            {
                border-radius: 50%;
                padding: 3px 9px 3px 9px;
                font-weight: bolder;
                position: relative;
                top: 0px;
                background-color: #077AC1;
                color: white;
            }
            #makestorylink:hover
            {

                border: 1px solid #077AC1;
                background-color: white;
                color:#077AC1

            }
            #viewtrans:hover
            {
                border: 1px solid #077AC1;
                color: #077AC1;
                background-color: white
            }
            #viewtrans
            {
                float: right;
                position: relative;
                left: 160px;
                background-color: #077AC1;
                border: 1px solid #077AC1;
                color: white;   
            }
            #gamay
            {
                margin-left: 35px
            }
            #nocnoc
            {
                margin-left: 10px
            }
            #nocola
            {
                position: relative;
                left: -35px
            }
        </style>
        <script>
            $(document).ready(function(){
                $('[data-toggle="popover"]').popover();   
            });
        </script>

    </head>
    <body>
        <div class="container">
            <?php
            include 'navProfile.php';
            ?>

            <div class="container">
                <div class="mastercon">

                    <div class="inside-con">

                        <div class="gen">
                            <h3 id="h3prop">My Account</h3>
                            <!--generator-->
                            <div class="pro-con">

                                <?php   
                                if(isset($_SESSION['Username'])){
                                    $usr = $_SESSION['Username'];
                                }


                                $result = $conn->query("SELECT * FROM accounts WHERE Username = '".$usr."'");

                                if($result->num_rows > 0)
                                {
                                    while ($row = $result->fetch_array())
                                    {   
                                        $pp = $row['7'];

                                    } 
                                    echo '<center><img src="Uploads/Profile'.$pp.'" style="width:300px; height:300px;box-shadow: 0px 0px 54px 0px rgba(0,0,0,0.1); border-radius:3px"></center>';
                                }
                                else
                                {

                                }					
                                ?>

                            </div>
                            <div class="detail-con">




                                <h5><b>Personal Information</b>
                                </h5>
                                <div id="editlink">
                                    <a href="EditAccount.php" id="acc">   
                                        <p>&#9998;</p>
                                    </a></div>
                                <div id="line"></div>   
                                <br>
                                <table width="300px">
                                    <?php 
                                    if(isset($_SESSION['Username'])){
                                        $usr = $_SESSION['Username'];
                                    }


                                    $result = $conn->query("SELECT * FROM accounts WHERE Username = '".$usr."'");

                                    if($result->num_rows > 0)
                                    {
                                        while ($row = $result->fetch_array())
                                        {   

                                            $fname = $row['1'];
                                            $lname = $row['2'];
                                            $bday = $row['3'];
                                            $usrr = $row['4'];
                                            $em= $row['6'];


                                            echo '
                       <tr>
                           <td><p class="py">First Name:</p></td>
                           <td><p class="pz">'.$fname.'</p></td>
                       </tr>
                        <tr>
                           <td><p class="py">Last Name:</p></td>
                           <td><p class="pz">'.$lname.'</p></td>
                       </tr>
                        <tr>
                           <td><p class="py">Birthday:</p></td>
                           <td><p class="pz">'.$bday.'</p></td>
                       </tr>
                        <tr>
                           <td><p class="py"> Username: </p></td>
                           <td><p class="pz">'.$usrr.'</p></td>
                       </tr>
                        <tr>
                           <td><p class="py">E-mail:</p></td>
                           <td><p class="pz">'.$em.'</p></td>
                       </tr>
                       ';
                                        } 
                                    }
                                    else
                                    {

                                    }					
                                    ?>


                                </table> 
                                <br><br><br><a href="authornotif.php" id="viewtrans" class="hvr-fade">My Transaction</a>
                            </div>
                        </div>
                        <!--end_generator-->

                        <div class="gen">
                            <div class="concon" id="nocnoc">
                                <h5><b>My Stories</b></h5>

                                <div id="lines"></div>
                                <div id="gamay">
                                    <?php 
                                    if(isset($_SESSION['Username'])){


                                        $usr = $_SESSION['Username'];
                                    }

                                    $result = $conn->query("SELECT DISTINCT * FROM uploads WHERE (state = 'rAuthorAll') OR (state = 'rAuthorAdmin') AND author = '".$usr."' ORDER BY date DESC");

                                    if($result->num_rows > 0)
                                    {
                                        while ($row = $result->fetch_assoc())
                                        {   
                                            $title = $row['title'];
                                            $story = $row['story'];
                                            $place = $row['place'];
                                            $auth = $row['author'];
                                            $filename = $row['filename'];
                                            $seq = $row['seqNo'];

                                            echo '

                                <div class="ins">
							    <form action="readOwnStory.php?code='.$seq.'" method="post">
								<input type="text" name="tbseq" value="'.$seq.'" hidden>
								<center>		
								<img src="Uploads/'.$filename.'" style="width:130px; height:130px;"id="imgs">
								</center>
								<h5>&nbsp;&nbsp;'.$title.'</h5>
                                <h6>&nbsp;&nbsp;by: '.$auth.'</h6> <br>
								<input class="btnpass" type="submit" value="Read Story">
							    </form>
						        </div>

					   ';

                                        } 
                                        echo '<br><a href="Create.php" id="makestorylink">+</a>&nbsp; to add stories<br><br><br><br>';
                                    }	
                                    ?>
                                </div>
                                <br>
                                <div class="concon">
                                  
                                    <div id="lines1"></div>


                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </div>
            <?php
            include"footerlogo.php";
            ?>

        </div>

    </body>

</hmtl>