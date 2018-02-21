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
        <link href="bootstrap-toggle-master/css/bootstrap-toggle.min.css">
        <link rel="icon" href="Images/OSM_Icon.ico">
        <link href="css/hover.css" rel="stylesheet" media="all">


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
        <style type="text/css">
            @font-face
            {
                font-family:'Oxygen';
                src: url(fonts/Oxygen-Regular.ttf) format('truetype');
            }
            body
            {
                overflow-x: hidden;
                background: linear-gradient(100deg, #1f9b82, #0f6c98);
                font-family:'Oxygen';
                background-repeat: no-repeat;
                background-attachment: fixed

            }
            .con
            {
                background-color: white;
                height: 1300px;
                width: 1200px;
                position: relative;
                top: 100px;
                left: -25px;
                box-shadow: 0px 0px 54px 0px rgba(0,0,0,0.3);

            }
            .in-con
            {
                background-color: transparent;
                height: 700px ;
                width: auto;
                padding: 1em 2em 1em 2em;
            }
            .in-cl
            {
                background-color: white;
                height: 595px;
                width: 320px;
                float: left;
                padding: 1em 1em 1em 1em;


            }
            .in-cr
            {
                background-color:white;
                height: auto;
                width: 680px;
                padding: 1em 1em 2em 1em;
                float: right;

            }

            #guidelines
            {
                font-family:'Oxygen';
                width: 1100px;
                float: left;
                margin-left: 40px
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
                left: 30px;
                top: 30px;
                text-indent: 40px;

            }
            #h3prop p
            {
                position: absolute;
                top:5px
            }

            #droplist
            {
                height: 26px;
                position: relative;
                top: 1px;
                left: 6px
            }
            #storytitle
            {
                padding-left: 5px;
                width: 557px;

            }
            #txtarea
            {
                padding-left: 5px;
                border-radius: 3px;
                box-sizing:content-box;
                width: 99%;
                overflow: hidden;
                height: 330%;
                resize: none
            }
            #uploadPreview
            {
                position: relative;
                top: 26px;
                border-radius: 3px;
                background-image: url(Images/no%20thumbnail.png)
            }
            .checkbox
            {

                position: relative;
                top: -50px;
                left: -450px;
                width: 1080px;
                
            }
            #submit
            {
                color: white;
                border-radius: 5px;
                border: 1px solid transparent;
                background-color: #257cdb;
                width: 150px;
                height: 30px
            }
            #submit:hover
            {
                background-color: #1c82f2;
                text-shadow: 1px 1px #7b7c7d;
            }
            h3 p
            {
                position: relative;
                top:-30px
            }
            .concon
            {
                padding-top: 20px
            }
            .footer
            {
                position: relative;
                left: 100px
            }
            .guidelines
            {
                padding: 0px 30px 0px 30px
            }
            #uploadImage
            {
                border: 1px solid #A8A8A8;
                width: 450px;
                position: relative;
                top: 1px;
                height: 26px;
                padding: 1px 0px 2px 1px
            }
            label
            {
                font-family:'Oxygen';
                padding-left: 5px;
                font-family:sans-serif;
                font-weight: 100
            }
            #fotah
            {
                position: relative;
                left: 40px
            }
            #prize
            {
                width: 140px;
                text-align: center;
            }
            #freebtn
            {
                float: left;

                position: relative;
                left: -400px;
                width: 1000px;
                height: 150px
            }
            .free,.paid
            {
                float: left;

                width: 490px;
                height: 130px;
                text-align: center;

            }
            .free p,.paid p
            {
                font-family: 'Oxygen';
                font-weight: bold;
                font-size: 20px
            }
            #freesubmit,#paidsubmit
            {
                color: white;
                border-radius: 20px;
                border: 1px solid white;
                background-color: #257cdb;
                width: 150px;
                height: 30px
            }
            #freesubmit

            {
                position: relative;
                top: 35px
            }
            #paidsubmit
            {
                position: relative;
                top: 5px
            }
            #freesubmit:hover,#paidsubmit:hover
            {
                background-color: white;
                border: 1px solid #257cdb;
                color: #257cdb;

            }
            #price
            {
                width: 80px;
                text-indent: 1.8em;
                border-radius: 5px;
                position: relative;
                left: -6px;
                border: 1px solid #23B36D
            }
            #lbl
            {
                position: relative;
                top:0px;
                left: 10px;
                font-size: 15px;
                z-index: 1
            }
            #fileToLoad
            {
                width: 300px;
                border:1px solid #A7A7A7;
                border-radius: 2px;
            }
            #import
            {
                position: relative;
                left: 320px;
                top: -44px;
                border: 1px solid #257cdb;
                background-color: #257cdb;
                border-radius: 15px;
                color: white;
                width: 80px;
                
            }
            #import:hover
            {
                background-color: white;
                color: #257cdb;
                border: 1px solid #257cdb;
            }
            #inputTextToSave
            {
                resize: none
            }

        </style>

    </head>
    <body>
        <div class="container">
            <?php
            include "navcreate.php";
            ?>
            <center>
                <span style="background: red;color: white">
                    <?php
                    if(isset($_GET['message1'])){
                        echo $_GET['message1'];
                    } 
                    else if(isset($_GET['msg'])){
                        echo $_GET['msg'];
                    }
                    else if(isset($_GET['message'])){
                        echo $_GET['message'];
                    }
                    ?>            
                </span>
            </center>


            <div class="con">
                <h3 id="h3prop"><p>Make Story</p></h3>  <br><br>
                <div class="guidelines">
                    <label>Guidelines for making a story:</label>
                    <p>Reader and readers loves a stories but in making a story do not write a nonsense stories or else the admin must ignore your story. Write a story professionally. If you create a story specially for matures and It has a malicios scene or lines of your story you must checked the checkbox below. Thank you!</p>
                </div>
                <br>
                <br>
                <hr>
                <div class="in-con">
                    <div class="in-cl">
                        <form action="Insert_Up.php" method="post" enctype="multipart/form-data">
                            <label>Upload Thumbnail Photo</label>
                            <br>   
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
                            <br>
                            <center>
                                <img id="uploadPreview" style="width:450px; height:406px; "/>
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
                            <input type="text" name="tbtitle" placeholder="Story title here..." size="65px" required id="storytitle">

                            <select name="tbcategory" required id = "droplist"> 
                                <option value="Action">Action</option> 
                                <option value="Adventure">Adventure</option> 
                                <option value="Fantasy">Fantasy</option> 
                                <option value="Horror">Horror</option> 
                                <option value="Romance">Romance</option>
                            </select>
                            <br><br>
                            <label>Your Story Here</label>
                            <textarea class="toradius" id="inputTextToSave" name="tbstory" rows="20" cols="90" placeholder="Input your story here..." required id="txtarea"></textarea>

                            <script type="text/javascript">

                                function saveTextAsFile()
                                {
                                    var textToSave = document.getElementById("inputTextToSave").value;
                                    var textToSaveAsBlob = new Blob([textToSave], {type:"text/plain"});
                                    var textToSaveAsURL = window.URL.createObjectURL(textToSaveAsBlob);
                                    var fileNameToSaveAs = document.getElementById("inputFileNameToSaveAs").value;

                                    var downloadLink = document.createElement("a");
                                    downloadLink.download = fileNameToSaveAs;
                                    downloadLink.innerHTML = "Download File";
                                    downloadLink.href = textToSaveAsURL;
                                    downloadLink.onclick = destroyClickedElement;
                                    downloadLink.style.display = "none";
                                    document.body.appendChild(downloadLink);

                                    downloadLink.click();
                                }

                                function destroyClickedElement(event)
                                {
                                    document.body.removeChild(event.target);
                                }

                                function loadFileAsText()
                                {
                                    var fileToLoad = document.getElementById("fileToLoad").files[0];

                                    var fileReader = new FileReader();
                                    fileReader.onload = function(fileLoadedEvent) 
                                    {
                                        var textFromFileLoaded = fileLoadedEvent.target.result;
                                        document.getElementById("inputTextToSave").value = textFromFileLoaded;
                                    };
                                    fileReader.readAsText(fileToLoad, "UTF-8");
                                }

                            </script>
                            <h5>&nbsp;Import story from notepad</h5>
                            <input type="file" id="fileToLoad">
                            <br>
                            <button onclick="loadFileAsText()" class="hvr-fade" id="import">Import</button><br><br>

                            <div class="checkbox" >  
                                <br>
                                <label>
                                    <input type="checkbox" name="tbmature" value="On">
                                    <p>If the story contains unpleasant or inappropriate words, check this box and be readable by 18 years old  and above.</p>
                                </label>
                            </div>
                            <div id="freebtn">
                                <div class = 'free'>
                                    <p>Free Story</p><br>
                                    <button name="free" id="freesubmit" class ='hvr-fade'>SUBMIT</button>
                                </div>

                                <?php 

                                ?>
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
                        <div class = 'paid'>
                        <p>Paid Story</p>
                        <h6>Story Price</h6>
                        <label id = 'lbl'>&#x24;</label><input type='number' name='price' value=1 min=1 placeholder='0' required id = 'price'><br>
                        <button name='paid' id ='paidsubmit' class ='hvr-fade'>SUBMIT</button>
                        </div>";

                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="fotah">
                    <?php
                    include "footerlogo.php";

                    ?>
                </div>
            </div>
        </div>
    </body>

</html>