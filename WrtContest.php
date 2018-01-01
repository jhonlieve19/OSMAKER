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


include "nav2.php";
?>


<html>
    <head>
        <style type="text/css">
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
                background-color:#f2f5f9;

            }
            .upper{
                width: auto;
                height: auto;
                background-color: whitesmoke;
                padding: 1em;
                border-radius: 10px 50px 1px 1px;
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

        </style>
    </head>
    <body>
        <div class="contain">
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
                             <h2>$des</h2>
                               <p>Write a stories to win. Writing gives exposure </p>
             <p>and recognition to all writers who enter.</p>

                            ";
                        }

                    }
                    ?>


                    <hr>
                    </div>
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
                        <hr>
                        <center>
                            <img id="uploadPreview" style="width:450px; height:400px; "/>
                        </center>
                        <br>
                        <br>

                        <input id="uploadImage" type="file" name="image" onchange="PreviewImage();" required />
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
                        <input type="text" name="tbtitle" placeholder="Title" size="65px" required>


                        <br><br>
                        <textarea class="toradius" name="tbstory" rows="20" cols="100" placeholder="Descripyion of your story here . . . " required></textarea>
                        <select name="tbcategory" required > 
                            <option value="Action">Action</option> 
                            <option value="Adventure">Adventure</option> 
                            <option value="Fantasy">Fantasy</option> 
                            <option value="Horror">Horror</option> 
                            <option value="Romance">Romance</option>
                        </select>
                        <br><br>
                        <input type="submit" value="SUBMIT MY ENTRY">

                        </form>

                </div>


            </div>



        </div>
        </div>



    </body>

<?php
include "footer.php";
?>
</html>