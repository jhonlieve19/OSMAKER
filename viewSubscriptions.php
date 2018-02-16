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
if(isset($_GET['subsid'])){
    $subsID = $_GET['subsid'];
    if($subsID == ""){
        header("location:Subscriptions.php");
    }
}else{
    header("location:Subscriptions.php");
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
                background-color: #f7f7f7;
                height: auto;
                width: auto;
                padding: 1em;
            }
            #ins{
                background-color: white;
                height: 300px;
                width: 191px;
                margin: 1em 1em 1em 1em;
                display: inline-block;
                border-radius: 4px;
                padding: 1%;
                font-family:'Oxygen';
                position: relative;
                box-shadow: 0px 1px 5px 0px rgba(64,64,64,1);

            }
            #ins:hover
            {
                border-bottom: 5px solid #E81D29;
            }
            .hvr-grow-shadow {
                display: inline-block;
                vertical-align: middle;
                -webkit-transform: perspective(1px) translateZ(0);
                transform: perspective(1px) translateZ(0);
                box-shadow: 0 0 1px transparent;
                -webkit-transition-duration: 0.2s;
                transition-duration: 0.2s;
                -webkit-transition-property: box-shadow, transform;
                transition-property: box-shadow, transform;
            }
            .hvr-grow-shadow:hover, .hvr-grow-shadow:focus, .hvr-grow-shadow:active {
                box-shadow: 0 10px 10px -10px rgba(0, 0, 0, 0.5);
                -webkit-transform: scale(1.1);
                transform: scale(1.1);
            }


            img,.lg{
                width:175px;
                height:175px;
                position: relative;
                left: -4px;
                top: -4px;
                margin-bottom: 4%;
                border-radius: 2px
            }
            #btnpass{
                width: auto;
                height: auto;
                color: #E81D29;
                font-size: 15px;
                border:1px solid #E81D29;
                font-weight:100;
                float: right;
                border-radius: 30px;
                padding: 2px 8px 2px 8px;
                background-color: white;
            }
            #btnpass:hover
            {
                border-radius: 30px;
                padding: 2px 8px 2px 8px;
                background-color: #E81D29;
                color: white;
            }
            .ndcon{
                width: auto;
                height: 100px;
                background-color:transparent; 
                padding: 2em;
                margin-bottom: 5em;
                margin-top: 3em

            }
            .s-container{
                width: auto;
                height: auto;
                padding-bottom: 5em;
                background-color: transparent;
                margin: 0em 1em 0em 1em;

            }
            .sub-container{
                width: 260px;
                height: auto;
                background-color: white;
                padding: 2em;
                margin:7px;
                display: inline-block;
                box-shadow: 0px 5px 4px 1px #dcdcdc;
            }
            body
            {
                background: linear-gradient(100deg, #1f9b82, #0f6c98);
                background-attachment: fixed;
                background-size: cover;
            }
            #ima
            {
                position: relative;
                top: 0px
            }
            .liness
            {
                border: 0.5px solid white;
                width: 1150px;
                position: relative;
                top: 80px
            }
            .linesss
            {
                border: 0.5px solid white;
                width: 1150px;
                position: relative;
                top: 140px
            }
            .hvr-fade {
                display: inline-block;
                vertical-align: middle;
                -webkit-transform: perspective(1px) translateZ(0);
                transform: perspective(1px) translateZ(0);
                box-shadow: 0 0 1px transparent;
                overflow: hidden;
                -webkit-transition-duration: 0.2s;
                transition-duration: 0.2s;
                -webkit-transition-property: color, background-color;
                transition-property: color, background-color;
            }
            .hvr-fade:hover, .hvr-fade:focus, .hvr-fade:active {

                color: white;
            }
            #h3prop
            {
                font-family:'Oxygen';
                color: white;
                background-image: url(Images/titlebgform2.png);
                background-repeat: no-repeat;
                width: 300px;
                height: 38px;
                padding-top: 5px;
                padding-bottom: 8px;
                position: relative;
                left: -14px;
                top: -40px;
                text-indent: 15px;
            }
           
        </style>

        <script>
            $(document).ready(function(){
                $('[data-toggle="popover"]').popover();   
            });


        </script>

        <script>
            document.onkeydown=function(evt)
            {
                var keyCode = evt ? (evt.which ? evt.which : evt.keyCode) : event.keyCode;
                if(keyCode == 13)
                {
                    document.squery.submit();
                }
            }
        </script>
        <script>
            $(document).ready(function(){
                $("#flip").click(function(){
                    $("#panel").slideDown("slow");
                });
            });
        </script>

    </head>
    <body>
        <br>
        <div class="container">
            <?php
            include "nav2.php";
            ?> 
            <br>
             <div class="liness">

            </div>
            <div class="ndcon">
                <br><br>
                <br><br>
                &emsp; <h3 id ="h3prop">&nbsp;&nbsp;&nbsp;Author Stories</h3>&emsp;
                <p style="text-indent:2%;"></p>

            </div>
            <div class="s-container">
                
                <?php
                if(isset($_GET['subsid']))
                    $subsID = $_GET['subsid'];
                $result = $conn->query("SELECT * FROM uploads WHERE uploaderid = ' $subsID ' AND status = 'display'");
                if($result->num_rows > 0)
                {
                    while ($row = $result->fetch_assoc())
                    {
                        $seq = $row['seqNo'];
                        $filename = $row['filename'];
                        $title = $row['title'];
                        $auth = $row['author'];

                        echo '

					  <div class = "hvr-grow-shadow" id = "ins" >
							<form action="Read.php?code='.$seq.'" method="post">
								<input type="text" name="tbseq" value="'.$seq.'" hidden>
									<center>		
										<img src="Uploads/'.$filename.'"id ="pic">
									</center>
									<h5>'.$title.'</h5>
								    <h6>by: '.$auth.'</h6> 
									<input id="btnpass" type="submit" class= "hvr-fade" value="Read Story">
							</form>
						</div>

					   ';
                    }
                }
                else
                {
                    echo'&emsp;Nothing to show at this moment';

                }
                echo'</div>
						<br>';	

                ?> 

                <div class="linesss">
                   
                </div>
                 <br>
                    <br>
                    <br>
                <?php
                include "Footerlogo.php";
                ?>
            </div>


            <br>


        </div>

    </body>

</html>
