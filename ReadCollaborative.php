
<!DOCTYPE html>
<?php
session_start();
include "Connection.php";
if(isset($_SESSION['Username']))
{
    $username = $_SESSION['Username'];
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

$key = "";
if(isset($_GET['message'])){
    $key = $_GET['message'];
}
$result = $conn->query("SELECT * FROM cstories WHERE storyKey = '$key'");
if($result->num_rows > 0)
{
}
else{
    header("location:Form1.php");
}
?>
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
                margin-left: 30em;
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

            }
            .ins{
                background-color: white;
                height: auto;
                width: 247px;
                margin: 1em;
                float: left;
                padding: 1%;



            }
            img{
                width:200px;
                height:200px;
                margin-bottom: 4%;
            }
            .right{
                width: 805px;
                height: auto;
                background-color: white;
                margin: 1em;
                padding: 0.3% 3% 5% 3%;
                box-shadow: 0px 5px 4px 1px #dcdcdc;


            }
            .right,.ins{
                display: inline-block;
            }
            .in-right{
                width: auto;
                height: auto;
                background-color: transparent;
            }
            .in-rightx{
                width: auto;
                height: auto;
                background-color: transparent;
            }
            .inin-rght{
                background-color: transparent;
            }


        </style>
        <?php
        include "nav2.php";
        ?>
        <script>
            $(document).ready(function(){
                $('[data-toggle="popover"]').popover();   
            });
        </script>
    </head>
    <body>
        <div class="container">
            <div class="con">


                <?php 

                $key = "";
                if(isset($_GET['message'])){
                    $key = $_GET['message'];
                }
                if(isset($_POST['tbKey']))
                    $key = $_POST['tbKey'];
                $result = $conn->query("SELECT * FROM cstories WHERE storyKey = '$key' AND Status = 'Write' ORDER BY date ASC");
                if($result->num_rows > 0)
                {
                    while ($row = $result->fetch_assoc())
                    {   
                        $filename = $row['iCover'];
                        $title = $row['cTitle'];
                        $auth = $row['cWritter'];
                        $story = $row['colBody'];
                        $place = $row['cCat'];

                        echo '
					   <h3>&emsp;Collaborative for fun</h3>
					   	
                         <hr>&emsp;&nbsp;
                            <a href="Form1.php">More Stories</a> &emsp; | &emsp;
                             <a href="CollaborativeStories.php">Collaborative</a>  &emsp; | &emsp;
                             <a href="Profile.php">My Stories</a> 
							<hr>
					   		<div class="ins">
								<center>		
									<img class="img" src="Uploads/'.$filename.'">
                                      <a href="https://twitter.com/intent/tweet?button_hashtag=Ourstory" class="twitter-hashtag-button" data-show-count="false">Tweet #Ourstories</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
								</center>
							</div>
							<div class="right">
								<div class="in-right">
									<h1>'.$title.'</h1>
										<p>&nbsp;By: Random</p>
                                        
									<hr>
									<p style="text-indent:10%;">'.$story.'&emsp; -<i>'.$auth.'</i></p>
								<div>
							</div>
					   	';
                    } 
                }

                ?>
                <?php 
                $key = "";
                if(isset($_GET['message'])){
                    $key = $_GET['message'];
                }
                if(isset($_POST['tbKey']))
                    $key = $_POST['tbKey'];
                $result = $conn->query("SELECT * FROM cstories WHERE storyKey LIKE '$key' AND Status LIKE 'Colaborate' ORDER BY date ASC");
                if($result->num_rows > 0)
                {
                    while ($row = $result->fetch_assoc())
                    {   
                        $filename = $row['iCover'];
                        $title = $row['cTitle'];
                        $auth = $row['cWritter'];
                        $story = $row['colBody'];
                        $place = $row['cCat'];
                        echo '
							<div class="in-right">
								<p style="text-indent:10%;">'.$story.'&emsp; -<i>'.$auth.'</i></p>
							</div>
					   	';
                    } 
                }
                else
                {
                    echo'';
                }					
                ?>
                <?php 
                $key = "";
                if(isset($_GET['message'])){
                    $key = $_GET['message'];
                }
                if(isset($_POST['tbKey']))
                    $key = $_POST['tbKey'];
                $result = $conn->query("SELECT * FROM cstories WHERE storyKey LIKE '$key' AND Status LIKE 'Colaborate' ORDER BY date ASC");
                if($result->num_rows > 0)
                {
                    while ($row = $result->fetch_assoc())
                    {   
                        $filename = $row['iCover'];
                        $title = $row['cTitle'];
                        $auth = $row['cWritter'];
                        $story = $row['colBody'];
                        $place = $row['cCat'];

                    } 
                    if(isset($_SESSION['Username']))
                    {
                        $us = $_SESSION['Username'];

                    }
                    echo '
							<div class="in-rightx">
								<br><hr><br>
								<form action="addascollaborative.php" method="post">

								<p>Type to add paragraph</p>
										<input type="text" name="tbcategory" value="'.$place.'" hidden>
										<input type="text" name="tbusername" value="'.$us.'" hidden>
										<input type="text" name="tbtitle" value="'.$title.'" hidden>
										<input type="text" name="tbskey" value="'.$key.'"hidden >
										<input type="text" name="tbtl" value="'.$title.'" hidden>
										 <textarea class="toradius" name="tbcol" rows="10" cols="102" placeholder="Descripyion of your story here . . . " required></textarea>
							 			<input type="submit" value="ADD THIS STORY">
							</div>
							<br>
							<br>	';
                }
                else
                { 
                    echo'Nothing to show please add the story';
                    if(isset($_SESSION['Username']))
                    {
                        $us = $_SESSION['Username'];

                    }
                    echo '
							<div class="in-rightx">
								<br><hr><br>
								<form action="addascollaborative.php" method="post">

								<p>Type to add paragraph</p>
										<input type="text" name="tbcategory" value="'.$place.'" hidden>
										<input type="text" name="tbusername" value="'.$us.'" hidden>
										<input type="text" name="tbtitle" value="'.$title.'" hidden>
										<input type="text" name="tbskey" value="'.$key.'"hidden >
										<input type="text" name="tbtl" value="'.$title.'" hidden>
										 <textarea class="toradius" name="tbcol" rows="10" cols="102" placeholder="Descripyion of your story here . . . " required></textarea>
							 			<input type="submit" value="ADD THIS STORY">
							</div>
							<br>
							<br>	';
                }					
                ?>
                </form>
        </div>		
        <br><br>
        </div>
    </div>
</div>
<br><br><br><br>
</body>
<footer>
    <center>
        <p><br><span style="font-size:12px; font-family: Century Gothic;"> &copy; Copyright 2016  |<a class="lfooter" href=""> Holy Cross of Davao College</a> | Develop and Powered by team yokai | <a class="lfooter" href="" >About us</a><br>Reproduction in whole or in part in any form or medium without express written permission of team yokai is prohibited. </span></p>
    </center>
    <br> 
</footer>
</html>
