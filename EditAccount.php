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


    <style type="text/css">

    #rght{
        margin-left: 6.7em;

    }
    .tb{
        margin: 7px 2px 0px 5px;
        border-bottom-color: transparent;
        border-style:hidden;
        padding: 3px;
        border-radius: 5px;
    }
    .con{
        background-color: transparent;
        height: 1200px;
        width: auto;
        padding: 1em 15em 1em 15em;
        align-self: center;


    }
    .in-con{
        background-color: #ffffff;
        height: 550px ;
        width: auto;
        padding: 3em 5em 1em 5em;
        /*box-shadow: 0px 5px 4px 1px ;*/
    }
    .pr{
        padding-left: 740px;
    }
    #rght{
        float: right;
        margin-left: 11.6em;
    }
    .ge{
        font-family: century gothic;
        color: peru;
    }
    .bp{
        background-color: blueviolet;
    }
    .updt{
        background-color: cadetblue;
    }


</style>
<?php
include "Nav.php";
?>
<script>
    $(document).ready(function(){
        $('[data-toggle="popover"]').popover();   
    });
</script>
<script>
    document.onkeydown=function(evt){
        var keyCode = evt ? (evt.which ? evt.which : evt.keyCode) : event.keyCode;
        if(keyCode == 13)
        {
                    //your function call here
                    document.squery.submit();
                }
            }
        </script>

    </head>
    <body>

        <div class="con">
            <div class="in-con">
                <label class="ge">Edit Account </label><a href="Profile.php" class="pr"><button class="bp">Back to Profile ></button></a>
                <hr>    
                <p><b>Upload Profile Picture</b></p>
                <form action="UploadProfile.php" method="post" enctype="multipart/form-data">


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
                            ';
                        }
                    }
                    ?>
                    <input id="uploadImage" type="file" name="image" onchange="PreviewImage();" required />


                    <img id="uploadPreview" style="width:250px; height:200px; "/>

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
                    <input type="submit" value="Save profile">
                </form>
                <br><hr><br><label>Personal Information</label>
                <form action="UpdateAccount.php" method="post">
                    <?php
                    if(isset($_SESSION['Username']))

                        $user = $_SESSION['Username'];
                    //echo $user;

                    $result = $conn->query("SELECT * FROM accounts WHERE Username = '$user'");
                    if($result->num_rows > 0)
                    {  
                        while ($row = $result->fetch_array())
                        {
                            $acc = $row['0'];
                            $fname = $row['1'];
                            $lname = $row['2'];
                            $bday = $row['3'];
                            $usrname = $row['4'];
                            $pass = $row['5'];
                            $email = $row['6'];
                            echo "

                            <input class='form-control' id='tbr' type='hidden' name='tbacc' value='$acc' readonly >
                            <input class='form-control' id='tbr' type='text' name='tbfname' value='$fname' required>
                            <input class='form-control' id='tbr' type='text' name='tblname' value='$lname' required>
                            &emsp;Birthday
                            <input class='form-control' id='tbr' type='date' name='tbbday' value='$bday' required readonly>
                            <input class='form-control' id='tbr' type='email' name='tbemail' value='$email' required readonly>
                            <input class='form-control' id='tbr' type='text' name='tbusrname' value='$usrname' required readonly>
                            <input class='form-control' id='tbr' type='password' name='tbpass1' value='$pass' required>
                            <input class='form-control' id='tbr' type='password' name='tbpass2' value='$pass' required>
                            ";
                        }
                    }
                    else
                    {
                        echo "No result.";
                    }

                    ?>
                    <input class="updt" type="submit" value="Update" class="">
                </form>
            </div>
        </div>
    </body>
    <?php
    include "footer.php";
    ?>
    </html>
