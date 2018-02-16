<!DOCTYPE html>
<?php  

session_start();

?>

<html>
    <head>
        <title>Online Story Maker</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <link rel="icon" href="Images/OSM_Icon.ico">
        <link href="css/hover.css" rel="stylesheet" media="all">
        
        
        <style type="text/css">


            @font-face
            {
                font-family:'Oxygen';
                src: url(fonts/Oxygen-Regular.ttf) format('truetype');
            }
            body
            {
                background: linear-gradient(100deg, #1f9b82, #0f6c98);
                 background-size: cover;
                background-attachment: fixed;
               
            }
            .container
            {
                background-color: transparent;
              
            }
            #inside
            {
                
                border: 1px solid black;
                height: 500px;
                margin: 100px 0 0 0;

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
                margin: 30px 0 0 0
            }
            #animal
            {
                height: 1000px
            }
            .footlogo img
            {
                float: right;
                width: 100px;
                height: 55px;
                position: relative;
                top: 0px;
                left: -30px;
            }
            .footlogo p
            {
                float: right;
                position: relative;
                left: 70px;
                top: 50px;
                color: #d3eae0
            }
            .footlogo
            {
                position: relative;
                top: 30px;
                left: 20px
            }
        </style>
    </head>
    <body>
        <div class="container">
            <?php
            include "nav2.php";
            ?>
            <br>

            <div class="liness"></div>


            <div id="inside">

                <?php 

                include "Connection.php";

                $sql = "SELECT * from book_payment where uploaderid=$_SESSION[idno]";

                $result = $conn->query($sql);
                if($result->num_rows > 0){
                    while ($row=$result->fetch_assoc()) {
                        echo "
						<span>
						Your book number: $row[seqno]
						has paid by payerid: $row[payerid]
						</span>";
                    }
                }
                else{
                   
                }

                ?>

            </div>
            <div class="linesss"></div>
            <div class="footlogo">
                <img src="Images/osmlogo.png">
                <p>© OSM Developers, 2017</p>
            </div>
        </div>
        
    </body>

</html>