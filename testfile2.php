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
        <link rel="stylesheet" type="text/css" href="testfile.css">
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
                        <form action="testfile.php" method="post" enctype="multipart/form-data">
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

                            <!--word count-->
                            <p>NOTE: You need at least 300 words to submit your story. You have: <label id="output"></label> word/s. </p>
                            <script type="text/javascript">
                                $(document).ready(function(){
                                    $("#inputTextToSave").keydown(function(){
                                        $("#output").text(WordCount($(this).val()));
                                    });

                                    function WordCount(str){
                                        return str.split(" ").length;
                                    }
                                });
                            </script>

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
                            <h5>&nbsp;Import textfile from notepad</h5>
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
                             
                             <input type="checkbox" name="waybuot" value="On">


                            <div id="freebtn">
                                <div class = 'free'>
                                    <p>Free Story</p><br>

                             <input type="checkbox" name="waybuot" value="On">
                                    <button name="free" id="freesubmit" class ='hvr-fade'>SUBMIT</button>
                                </div>

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