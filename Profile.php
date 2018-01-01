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
    <title>Online Story Maker</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="icon" href="Images/o.png">
    <link rel="stylesheet" href="index.css">
    <head>
        <style  type="text/css">
            .head{
                background-color: transparent;
                width: auto;
                height: auto;
                padding: 0em 11em 0em 11em;
            }
            .inside-con{
                width: auto;
                height: auto;
                background-color: white;
            }
            .gen{
                background-color: white;
                padding: 1em;
                width: auto;
                height: auto;
                margin-top: 0.1em;
            }
            .pro-con{
                background-color: ghostwhite;
                padding: 1em;
                width: 300px;
                height: 300px;
                float: left;

            }
            .detail-con{
                background-color: ghostwhite;
                padding: 1em;
                width: 700px;
                height: 300px;
                margin-left: 310px;
            }
            .concon{
                background-color: ghostwhite;
                padding: 1em;
                width: 1010px;
                height: auto;

            }
            .ins{
                background-color: white;
                height: auto;
                width: 220px;
                margin: 11px;
                display: inline-block;
                padding: 1%;
                box-shadow: 0px 5px 4px 1px #dcdcdc;
            }
            img{
                width:180px;
                height:200px;
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
            .py{
                color:darkslategrey;
                font-weight: 100;
            }
            .pz{
                color:darkred; 
                font-weight: 100;
            }
            #acc{
                margin-left: 28em;
            }
            .ea{
                background-color: yellow;
            
            }
            

        </style>
        <script>
            $(document).ready(function(){
                $('[data-toggle="popover"]').popover();   
            });
        </script>
       <?php
        include 'nav2.php';
        ?>
    </head>
<body>

    <div class="head">
        <div class="inside-con">
            <!--generator-->
            <div class="gen">
                <div class="pro-con">
                    <h5><b>Profile</b></h5>
                    <hr>
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
                        echo '<center><img src="Uploads/Profile'.$pp.'" style="width:200px; height:200px;"></center>';
                    }
                    else
                    {

                    }					
                    ?>

                </div>
                <div class="detail-con">


                    <h5><b>Personal Information</b><a href="EditAccount.php" id="acc"><button class="ea">Edit Account</button></a></h5>
                    <hr>
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
                </div>
            </div>
            <!--end_generator-->

            <div class="gen">
                <div class="concon">
                    <h5><b>List of my stories</b></h5>
                    <hr>

                    <?php 
                    if(isset($_SESSION['Username'])){


                        $usr = $_SESSION['Username'];
                    }


                    $result = $conn->query("SELECT * FROM uploads WHERE status = 'display' AND author = '".$usr."' ORDER BY date DESC");

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
										<img src="Uploads/'.$filename.'" style="width:200px; height:200px;">
									</center>
									<label>'.$title.'</label>

								<p>By: '.$auth.'</p> 
									<input class="btnpass" type="submit" value="Read...">
							</form>
						</div>

					   ';
                        } 
                    }
                    else{

                        echo '<label>No stories yet </label> <br><br>To add stories -> <a href="Create.php">click here</a><br><br><br><br>';
                    }					
                    ?>
                </div>
                <br>
            </div>
        </div>
    </div>

    <br>

</body>
<?php
include"footer.php";
?>
</hmtl>