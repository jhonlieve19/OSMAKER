<!DOCTYPE html>
<?php
session_start();
include "Connection.php";
if(isset($_SESSION['Username']))
{

}
else
{
    header("location: index.php?ses=Login first");
    die();
}



?>


<html>
    <head>

        <style type="text/css">

            @-webkit-keyframes hvr-pulse {
                25% {
                    -webkit-transform: scale(1.1);
                    transform: scale(1.1);
                }
                75% {
                    -webkit-transform: scale(0.9);
                    transform: scale(0.9);
                }
            }
            @keyframes hvr-pulse {
                25% {
                    -webkit-transform: scale(1.1);
                    transform: scale(1.1);
                }
                75% {
                    -webkit-transform: scale(0.9);
                    transform: scale(0.9);
                }
            }
            .hvr-pulse {
                display: inline-block;
                vertical-align: middle;
                -webkit-transform: perspective(1px) translateZ(0);
                transform: perspective(1px) translateZ(0);
                box-shadow: 0 0 1px transparent;
                -webkit-animation-name: hvr-pulse;
                animation-name: hvr-pulse;
                -webkit-animation-duration: 1s;
                animation-duration: 1s;
                -webkit-animation-timing-function: linear;
                animation-timing-function: linear;
                -webkit-animation-iteration-count: infinite;
                animation-iteration-count: infinite;
            }
            .hvr-pulse:hover, .hvr-pulse:focus, .hvr-pulse:active {

            }
            body
            {
                background: linear-gradient(100deg, #1f9b82, #0f6c98);

                background-size: cover;
                background-attachment: fixed
            }
            .contain{
                padding: 3em 7em 0em 7em;
                width: auto;
                height: 900px;
                background-color: white;
            }
            .uperttle{
                color: gray;
                text-decoration-style:solid;
                font-weight: 400;

            }
            .sud{

                width: auto;
                height: 600px;
                background-color:white;

            }
            .upper{
                width: auto;
                height: auto;
                background-color: white;
                padding: 1em;
                border-radius: 4px
            }
            .sapkture{
                width: 300px;
                height: auto;
                background-color: ;
                float: left;
                padding: 1em 2em 3em 2em;
            }
            .sasulat{
                width: 850px;
                height: auto;
                background-color: ;
                padding: 1em 5em 3em 5em;
            }
            .sasulat,.sapkture{
                display: inline-block;
            }
            #cony
            {

                margin-top: 100px;
                box-shadow: 0px 1px 5px 0px rgba(64,64,64,1);
            }
            #trophy
            {
                width: 100px;
                height: 120px;
            }
            #h3prop
            {
                font-family:'Oxygen';
                color: white;
                background-image: url(Images/titlebgform2.png);
                background-repeat: no-repeat;
                width: 240px;
                height: 38px;
                padding-top: 5px;
                padding-bottom: 8px;
                position: relative;
                left: 0px;
                top: -10px;
                text-indent:30px;
            }
            .sapkture,.sasulat
            {

                float:left;
                width: 400px
            }
            #txtarea
            {
                padding-left: 5px;
                border-radius: 3px;
                box-sizing:content-box;
                width: 600px;
                overflow: hidden;
                height: 330%;
                resize: none
            }
            #title
            {
                position: relative;
                top: 20px;
                text-indent: 5px;
                width: 460px;
            }
            #category
            {
                position: relative;
                top: -6px;
                left: 470px;
                height: 26px;
                width: 140px
            }
            #uploadPreview
            {
                position: relative;
                top: 30px;
                border-radius: 4px
            }
            #uploadImage
            {
                border: 1px solid #A8A8A8;
                width: 380px
            }
            #submits
            {
                width: 170px;
                border: 1px solid #F5D718;
                border-radius: 30px;
                color: black;
                background-color: #F5D718;
                height: 40px

            }
            #submits:hover
            {
                background-color:white;
                border-color: #F5D718;
                color: #F5D718
            }
            .hvr-fade {
                display: inline-block;
                vertical-align: middle;
                -webkit-transform: perspective(1px) translateZ(0);
                transform: perspective(1px) translateZ(0);
                box-shadow: 0 0 1px transparent;
                overflow: hidden;
                -webkit-transition-duration: 0.3s;
                transition-duration: 0.3s;
                -webkit-transition-property: color, background-color;
                transition-property: color, background-color;
            }
            .hvr-fade:hover, .hvr-fade:focus, .hvr-fade:active {
                background-color: #2098D1;
                color: white;
            }
        </style>
    </head>
    <body>

        <div class="container">
            <?php
            include "nav2.php";
            ?>
            <div id="cony">
                <div class="upper">
                    <form action="uploadmyStory.php" method="post" enctype="multipart/form-data">
                        <?php
                        if(isset($_REQUEST["ConID"])){
                            $conID = $_REQUEST["ConID"];
                            echo '<input type="text" name="tbConID" value='.$conID.' hidden> ';


                            $result = $conn->query("SELECT * FROM adkontis WHERE conID = '$conID'");
                            if($result->num_rows > 0)
                            {
                                while ($row = $result->fetch_assoc())
                                {
                                    $des = $row['conDescrptn'];
                                }
                                echo"
                                <h3 id ='h3prop'>&emsp;Contest</h3></a>
                                <center><img src='Images/trophy.jpg'  class='hvr-pulse' alt ='Contest' id='trophy'>
                             <h2>$des</h2>
                               <p>Write a stories to win. Writing gives exposure
                               and recognition to all writers who joined.</p></center>
                               <br><hr>

                            ";
                            }

                        }
                        ?>



                        <div class="sud">
                            <div class="sapkture">

                                <label>Upload cover photo for your story</label>
                                <br><br>
                                <?php
                                if(isset($_SESSION['Username']))
                                {
                                    $usr = $_SESSION['Username'];
                                    echo'<input type="text" name="tbuser" value='.$usr.' hidden>';



                                    $exist = false;
                                    $result = $conn->query("SELECT AccNo FROM accounts WHERE Username = '$usr'");
                                    if($result->num_rows > 0)
                                    {
                                        while ($row = $result->fetch_assoc())
                                        {
                                            $accno = $row['AccNo'];
                                        }
                                        echo'

							<input type="text" name="tbid" value='.$accno.' hidden>';
                                    }
                                }

                                ?>  
                                <input id="uploadImage" type="file" name="image"  onchange="PreviewImage();" required />

                                <center>
                                    <img id="uploadPreview" style="width:380px; height:336px;  "/>
                                </center>
                                <br>
                                <br>


                                <br>
                                <script type="text/javascript">
                                    function PreviewImage(){
                                        var oFReader = new FileReader();
                                        oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

                                        oFReader.onload = function(oFREvent){
                                            document.getElementById("uploadPreview").src = oFREvent.target.result;
                                        };
                                    };
                                </script>
                                <br>
                                <br>


                            </div>
                            <div class="sasulat">
                                <label>Title</label><br>
                                <input type="text" name="tbtitle" placeholder="Title" size="65px" required id="title">
                                <select name="tbcategory" required id="category" > 
                                    <option value="Action">Action</option> 
                                    <option value="Adventure">Adventure</option> 
                                    <option value="Fantasy">Fantasy</option> 
                                    <option value="Horror">Horror</option> 
                                    <option value="Romance">Romance</option>
                                </select>


                                <br><br>
                                <textarea class="toradius" name="tbstory" rows="20" cols="90" placeholder="Input your story here..." required id="txtarea"></textarea>

                                <br><br>
                                <input type="submit" id="submits" class='hvr-fade'value="SUBMIT">


                            </div>


                        </div>


                    </form>
                </div>
            </div>
             <div id="fotah">
                    <?php
                    include "footerlogo.php";

                    ?>
                </div>
        </div>



    </body>


</html>