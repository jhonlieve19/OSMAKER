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
            .ins{
                background-color: white;
                height: auto;
                width: 247px;
                margin: 1em;
                box-shadow: 0px 5px 4px 1px #dcdcdc;
                display: inline-block;
                padding: 1%;}
             img{
                width:218px;
                height:250px;
                margin-bottom: 4%;

            }
            .heee{
                color: firebrick;
                font-style: italic;
                font-family: century gothic;
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
            .ndcon{
                width: auto;
                height: 100px;
                background-color:; 
                padding: 2em;
                margin-bottom: 5em;
                
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
                margin:5px;
                display: inline-block;
                box-shadow: 0px 5px 4px 1px #dcdcdc;
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
            <div class="ndcon">
                <h3 class="heee">My Subscriptions</h3>
                <hr>

            </div>
            <div class="s-container">
            <?php 
            $sUploader = "";
            $piktr = "";
            $result = $conn->query("SELECT s.Uploadercode,a.firstname,a.lastname,a.email,a.Profile FROM subscrbe s,accounts a WHERE s.userName = '$usr' && s.Uploadercode=a.AccNo group by a.accNo");
            if($result->num_rows > 0)
            {
                while ($row = $result->fetch_array())
                {
                    $sUploader = $row['0'];
                    $fname = $row['1'];
                    $lname = $row['2'];
                    $email = $row['3'];
                    $piktr = $row['4'];
                 
                    echo'
                     <div class="sub-container">
                        <img src="Uploads/Profile'.$piktr.'" alt="Profile" style="width:200px; height:200px;">
                        <hr>
                        <h5>'.$fname.'</h5>
                        <h5>'.$lname.'</h5>
                        <h5>'.$email.'</h5>
                        <form action="viewSubscriptions.php?subsid='.$sUploader.'&subscribe=sub" method="post"> 
                      
                        <input type="submit" value="View Stories">
                        </form>
                    </div>
                    
                    ';
                    
                }
            }
            else
            {
                echo'&emsp;Nothing to show at this moment <br><br><br><br><br><br><br><br><br><br>';

            }
            echo'</div>
						<br>';	

            ?> 
            </div>
            
            
            
        </div>
        </div>
    <br>
    <br>
    <br>
    </body>
<?php
    include "footer.php";
    ?>
</html>
