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
        <link rel="icon" href="Images/OSM_Icon.ico">
        <link href="bootstrap-toggle-master/css/bootstrap-toggle.min.css">
        <link href="css/hover.css" rel="stylesheet" media="all">

        <style type="text/css">

            @font-face
            {
                font-family:'Oxygen';
                src: url(fonts/Oxygen-Regular.ttf) format('truetype');
            }
            @font-face
            {
                font-family:'Roboto-Regular';
                src: url(fonts/Roboto-Regular.ttf) format('truetype');
            }
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
                background-color: White;
                width: 1200px;
                height: 1000px;
                padding: 3em 15em 10em 15em;
                align-self: center;
                box-shadow: 0px 0px 54px 0px rgba(0,0,0,0.3);
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
            #updt
            {
                background-color: #257cdb;
                border-color: #257cdb;
                border: 1px solid #257cdb;
                color: white;
                width: 80px;
                height: 30px;
                border-radius:30px;
                float: left;
                margin-top: 40px;
            }
            #updt:hover
            {
                border: 1px solid #257cdb;
                color: #257cdb;
                background-color: white;
            }

            body
            {
                background: linear-gradient(100deg, #1f9b82, #0f6c98);
                font-family:'Oxygen';
                background-size: cover;
                background-repeat: no-repeat;
                background-attachment: fixed
            }
            .container
            {
                background-color:transparent;
                padding-top: 50px;
                width: 1250px;
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
                left: -114px;
                top: -10px;
                text-indent: 40px;
                padding-top: 5px
            }
            .backtoprofile
            {
                background-color: transparent;
                border-style: none;
                position: relative;
                top: px;
                left: 120px;
                outline: 0 !important;
                float: right
            }
            #line
            {
                border: 0.5px solid #8b8b8b ;
                width: 1000px;
                position: relative;
                left: -105px
            }
            #tbr
            {
                color: #307ECB;
                width: 595px;
                font-family: 'Century Gothic';
                background-color: white
            }
            #btnsave
            {
            }
            #btnsave1
            {
                border-radius: 25px;
                background-color: #1c82f2;
                border: 1px solid #1c82f2;
                position: relative;
                left: ;
                color: white;
                width: 80px;
                height: 30px
            }
            #btnsave1:hover
            {
                background-color: white;
                border: 1px solid #1c82f2;
                color: #1c82f2
            }
            label, b
            {



            }
            #uploadPreview
            {
                background-image: url(Images/no%20profile.jpg);
                background-size: cover;

                background-position: -2px;
                border-radius: 4px
            }


            #uplod,#uplodpic,#lbel
            {
                position: relative;
                left: -100px
            }
            #personal
            {
                position: absolute;
                left: 590px;
                top: 235px
            }
            #type
            {
                color: #5A545B;
                font-size: 14px;
                position: relative;
                top: 8px;
                font-family:'Oxygen';
            }
            #uploadImage
            {
                border: 1px solid #CACACA;
                width: 280px;
                border-radius: 4px
            }

        </style>

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

        <div class="container">
            <?php
            include "navEditProfile.php";
            ?>

            <div class="container">
                <div class="con">
                    <h3 id="h3prop">Edit Account</h3>

                    <a href="Profile.php"><button class="backtoprofile">&lt;&lt; Back to Account</button></a>

                    <label id="lbel">Edit your account</label>
                    <div id="line"></div>
                    <br>
                    <br>
                    <p><b id="uplod">Upload Account Picture</b></p>
                    <br>
                    <form action="UploadProfile.php" method="post" enctype="multipart/form-data" id="uplodpic">


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
                        <br>


                        <img id="uploadPreview" style="width:280px; height:280px; "/>

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
                        <input type="submit" value="Upload" id="btnsave1" class="hvr-fade">
                    </form><div id="personal">
                    <br><br><label>Personal Information</label>
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

				<input class='form-control' id='tbr' type='hidden' name='tbacc' value='$acc' readonly ><br>
                <p id ='type'>First Name<p>
				<input class='form-control' id='tbr' type='text' name='tbfname' value='$fname' required>
                <p id ='type'>Last Name<p>
				<input class='form-control' id='tbr' type='text' name='tblname' value='$lname' required>
				<p id ='type'>Birthday<p>
				<input class='form-control' id='tbr' type='date' name='tbbday' value='$bday' required readonly>
                <p id ='type'>Email Address<p>
				<input class='form-control' id='tbr' type='email' name='tbemail' value='$email' required readonly>
                <p id ='type'>Username<p>
				<input class='form-control' id='tbr' type='text' name='tbusrname' value='$usrname' required readonly>
                <p id ='type'>Password<p>
				<input class='form-control' id='pass' type='password' name='tbpass1' value='$pass' required>
                <p id ='type'>Re-type Password<p>
				<input class='form-control' id='tbr' type='password' name='tbpass2' value='$pass' required>
<input type="checkbox" onclick="myFunction()">Show Password>

<script>
function myFunction() {
    var x = document.getElementById("pass");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>
                
						";
                            }
                        }
                        else
                        {
                            echo "No result.";
                        }

                        ?>
                        <input id="updt" type="submit" value="Save" class="hvr-fade" >

                    </form>
                    </div>
                </div>
            </div>
            <?php
            include "footerlogo.php";
            ?>
        </div>

    </body>

</html>
