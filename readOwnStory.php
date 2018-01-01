<?php
session_start();
include "Connection.php";

if(isset($_SESSION['Username'])){
     $user = $_SESSION['Username'];
}
else
{
    $user = $_SESSION['Username'];
    header("location: index.php?ses=Login first");
    die();
}

if(isset($_POST['search']))
{
    echo $search = $_POST['search'];
}
if(isset($_GET['code'])){

    $seqNo = $_GET['code'];
    //echo $seqNo;
}
$result = $conn->query("SELECT * FROM uploads WHERE seqNo LIKE '$seqNo' AND author = '$user' AND status = 'display'");
if($result->num_rows > 0)
{
}
else{
    header("location:Profile.php");
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
        <link rel="icon" href="Images/o.png">
        <link rel="stylesheet" href="index.css">
        <style type="text/css">

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
                height:220px;
                margin-bottom: 4%;

            }
            .right{
                width: 805px;
                height: auto;
                background-color: white;
                margin: 1em;
                padding: 0.3% 3% 15% 3%;

            }
            .right,.ins{
                display: inline-block;
            }
            .btns{
                background-color: royalblue;
                border-style:hidden;
                padding: 5px 7px 5px 7px;
                color: white;
                border-radius: 3px;
                border-color: aquamarine;

            }
            .btnss{
                background-color: goldenrod;
                border-style:hidden;
                padding: 5px 7px 5px 7px;
                color: white;
                border-radius: 3px;
                border-color: aquamarine;

            }
            table{
                border-collapse: collapse;
                border-color:white;
            }
            textarea {
                resize: none;
                border-style: none;
                outline: none;
                min-height: auto;
                max-height: auto;
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
                $seqNo = "";
                if(isset($_GET['code'])){

                    $seqNo = $_GET['code'];
                }
                if(isset($_POST['tbseq']))
                    $seqNo = $_POST['tbseq'];
                //echo $seqNo;
                $result = $conn->query("SELECT * FROM uploads WHERE seqNo LIKE '$seqNo' AND status = 'display'");
                if($result->num_rows > 0)
                {
                    while ($row = $result->fetch_assoc())
                    {   
                        $seq = $row['seqNo'];
                        $writer = $row['uploaderid'];
                        $filename = $row['filename'];
                        $title = $row['title'];
                        $auth = $row['author'];
                        $story = $row['story'];
                        $place = $row['place'];

                    }
                    $result = $conn->query("SELECT * FROM likes WHERE Code LIKE '$seq' AND userName LIKE '$user' ");
                    if($result->num_rows > 0)
                    {
                        while($row = $result->fetch_assoc())
                        {
                            $stat = "Unlike";
                        }
                    }
                    else{
                        $stat = "Like";
                    }



                    $result = $conn->query("SELECT COUNT(Votes) FROM likes WHERE Code LIKE '$seq'");
                    if($result->num_rows > 0)
                    {
                        while($row = $result->fetch_array())
                        {
                            $vote = $row['0'];
                        }
                    }
                    else{
                        $vote = "0";
                    }

                    echo '
					   <hr>
					   <div class="ins">
							<center>		
								<img class="" src="Uploads/'.$filename.'">
							</center><hr>

								<p>&nbsp; By: '.$auth.'</p>
								<p>&nbsp; '.$vote.' Likes</p>
								<center>
								<table>
								<ul>
								<tr>
									<form action="proLike.php" method="post">
									<input type="text" name="tbUser" value="'.$user.'" size="4" hidden>
									<input type="text" name="tbCode" value="'.$seq.'" size="4" hidden>
									<input type="submit" value="'.$stat.'" class="btns">
									</form>&nbsp;
									</tr>
									<tr>

									<form action="EditOwnStory.php?code='.$seq.'" method="post">
									<input type="text" name="tbUser" value="'.$user.'" size="1" hidden>
									<input type="text" name="tbCode" value="'.$seq.'" size="1" hidden>
									<input type="text" name="tbwriter" value="'.$writer.'" size="1" hidden>
									<input type="submit" value="Edit Story" class="btnss">
									</form>
									</tr>
                                    
                                 
									<ul>
								</table>
                                <form action="deleteownstry.php" method="post">
									<input type="text" name="id" value="'.$seq.'" size="1" hidden>
									<input type="submit" value="Delete Story" class="btnss">
									</form>
								</center>
							<br>
						</div>

						<div class="right">
							<h1>'.$title.'</h1>
							<p>&nbsp;By: '.$auth.'</p>
                            <p>'.$place.'</p>
                            <hr>
                            <a href="Profile.php">Back to Profile</a> &emsp; | &emsp;
                            <a href="Form1.php">More Stories</a> 
							<hr>

                             <textarea readonly class="toradius" name="tbBdy" rows="30" cols="104" placeholder="Description of about us.." required>'.$story.'</textarea>
                              <br><br>
                               <center>
                               <a href="Form1.php">Click here for more stories</a>
                              </center>
						</div><br><br>	
					   	';
                }
                else
                {
                }					
                ?>


                <br><br><br><br><br><br>

            </div>
            <br>


        </div>

    </body>
    <footer>
        <center>
            <p><br><span style="font-size:12px; font-family: Century Gothic;"> &copy; Copyright 2016  |<a class="lfooter" href=""> Holy Cross of Davao College</a> | Develop and Powered by team yokai | <a class="lfooter" href="" >About us</a><br>Reproduction in whole or in part in any form or medium without express written permission of team yokai is prohibited. </span></p>
        </center>
        <br> 
    </footer>
</html>
