<?php
session_start();
include "Connection.php";
if(isset($_SESSION['Username'])){}
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
        <link href="bootstrap-toggle-master/css/bootstrap-toggle.min.css">
        <link rel="stylesheet" type="text/css" href="createstyle.css">
        <nav class="navbar navbar-default" id="navcolor">
            <div class="navbar-header">
                <a class="navbar-brand" class="this" href="Form1.php">
                    <p class="title">
                        <img src="Images/hedd.png" width="" height="" style=" max-height: 120px;
                        max-width:200px;
                        margin-left: -27px;" />
                    </p>
                </a>
            </div>
            <ul class="nav navbar-nav" id="nvcolor">
                <li><button type="button" class = "btn" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-original-title="Browse" data-html="true" data-content="<a href='Form2.php?q=Action'>Action</a> <a href='Form2.php?q=Adventure'>Adventure</a> <a href='Form2.php?q=Fantasy'>Fantasy</a> <a href='Form2.php?q=Horror'>Horror</a> <a href='Form2.php?q=Romance'>Romance</a>"><i class="entypo-check"></i><p class="nv">Categories</p></button></li>

                <li><button type="button" class = "btn" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-original-title="Browse" data-html="true" data-content="<a href='Contest.php'>Contest</a>"><i class="entypo-check"></i><p class="nv">Community</p></button></li>


                <li><button type="button" class = "btn" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-original-title="Browse" data-html="true" data-content="<a href='Create.php'>My Story</a>"><i class="entypo-check"></i><p class="nv">Create Story</p></button></li>

                <li><button type="button" class = "btn" id="rght" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-original-title="Settings" data-html="true" data-content="<a href='Subscriptions.php'>Subscriptions</a><br><a href='EditAccount.php'>Edit Account</a> <a href='logout.php'>Logout</a> "><i class="entypo-check"></i><p class="nv">My Account</p></button></li>
            </ul>
        </nav>
        <script>
            $(document).ready(function(){
                $('[data-toggle="popover"]').popover();   
            });
        </script>
        <?php
        if(isset($_GET['message'])){
            $prmt = $_GET['message'];
            echo ' <script>
            window.alert("File size must be axactly 2MB or less ");
            </script>';
        }
        ?>


    </head>
    <body>
        <br><br><br><br>
        <div class="con">
            <label>Guidelines for making a story:</label>
            <p>Reader and readers loves a stories but in making a story do not write a nonsense stories or else the admin must ignore your story. Write a story professionally. If you create a story specially for matures and It has a malicios scene or lines of your story you must checked the checkbox below. Thank you!</p>
            <br>
            <br>
            <hr>
            <div class="in-con">
                <div class="in-cl">
                    <form action="Insert_Up.php" method="post" enctype="multipart/form-data">
                        <label>Cover Photo Here</label>
                        <br><br>
                        <?php
                        if(isset($_SESSION['Username']))
                        {
                            $author = $_SESSION['Username'];

                            $exist = false;
                            $result = $conn->query("SELECT AccNo FROM accounts WHERE Username = '$author'");
                            if($result->num_rows > 0)
                            {
                                while ($row = $result->fetch_assoc())
                                {
                                    $accno = $row['AccNo'];
                                }
                                echo'
                                <input type="text" name="tbauthor" value='.$author.' hidden>
                                <input type="text" name="tbauthorid" value='.$accno.' hidden>';
                            }
                        }
                        ?>
                        <input id="uploadImage" type="file" name="image" onchange="PreviewImage();" required />
                        <br><br>
                        <center>
                            <img id="uploadPreview" style="width:450px; height:400px; "/>
                        </center>
                        <script type="text/javascript">
                            function PreviewImage(){
                                var oFReader = new FileReader();
                                oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

                                oFReader.onload = function(oFREvent){
                                    document.getElementById("uploadPreview").src = oFREvent.target.result;
                                };
                            };
                        </script>
                    </div>
                    <div class="in-cr">

                        <label>Title</label><br>
                        <input type="text" name="tbtitle" placeholder="Title" size="65px" required>

                        <select name="tbcategory" required > 
                            <option value="Action">Action</option> 
                            <option value="Adventure">Adventure</option> 
                            <option value="Fantasy">Fantasy</option> 
                            <option value="Horror">Horror</option> 
                            <option value="Romance">Romance</option>
                        </select>
                        <br><br>
                        <label>Your Story Here</label>
                        <textarea class="toradius" name="tbstory" rows="20" cols="90" placeholder="Drop your story..." required></textarea>
                        <div class="checkbox">  
                            <label>
                                <input type="checkbox" name="tbmature" value="On">
                                <p>This Story contains malicious things, check this box and be readable by 18y.o above</p>
                            </label>
                        </div>
                        <button name="free">SUBMIT FOR FREE</button>

                        <?php 
                        include "Connection.php";

                        $sql = "select * from subscription where accno = '$_SESSION[idno]' and author_sub=0";

                        $result = $conn->query($sql);
                        if($result->num_rows > 0){
                            echo "  <br><br><br><p>Wanna Earn and Learn more?</p><a href='learn.php'>Click Here</a>
                            </form>";
                        }
                        else{
                            echo "
                            <input type='number' name='price' value=1 min=1 placeholder='Price for the book.' required>
                            <button name='paid'>SUBMIT FOR PAID</button>";
                        }
                        ?>

                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>


        </body>
        <?php
        include "footer.php";
        ?>
        </html>
