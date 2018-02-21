<?php 

include "Connection.php";

?>
<!DOCTYPE html>
<html>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="icon" href="Images/OSM_Icon.ico">

    <head>
        <title></title>

    </head>
    <style type="text/css">
        @font-face
        {
            font-family:'Oxygen';
            src: url(fonts/Oxygen-Regular.ttf) format('truetype');
        }
        #rght{
            margin-left: 30em;
        }
        .head{
            background-color: white;
            width: auto;
            height: auto;
            padding: 0em 2em 0em 2em;
        }
        .in{
            width: auto;
            height: auto;
            background-color:dimgray;
            padding: 1em 3em 1em 3em;
            color: #6FB7E9;
        }
        #rght{
            margin-left: 855px;

        }

        #rght{
            padding-left:;
        }
        .btn{

        }
        .nv{
            padding: 0.1px;
        }
        .left{
            width: 290px;
            height: 600px;
            float: left;
            padding: 0em 0em 0em 4em;
        }
        .lright{
            width: 1003px;
            height: 1000px;
            background-color: ghostwhite;
            margin-left: 290px;
            padding: 2em;
        }
        .left,.lrigh{
            display: inline-block;


        }
        .left
        {
            height: 300px
        }

        h3{
            margin-left: 270px;
            color: silver;

        }
        .crtleft{
            width: auto;
            height: auto;
            background-color: #E9F2F9;
            padding: 1em;
        }
        form{
            display: inline-block;
        }
        .da{
            background-color: darkcyan;
            border: none;
            color: white;
            padding: 10px 25px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }
        .vew, .wev{
            background-color: darkcyan;
            border: none;
            color: white;
            padding: 8px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }
        .notification-area
        {
            float: left;
            width: 1010px;
            padding-bottom: 100px;
            padding-left: 50px;
            font-family:'Oxygen';
            background-color: ghostwhite
        }
        #for
        {
            clear: both;
        }
        #red
        {
            color: red;
            font-weight: 800
        }
        #blue
        {
            color: dodgerblue;
            font-weight: 800
        }
        #green
        {
            color: green;
            font-weight: 800
        }
        #email
        {
            color: blue;
            text-decoration: underline
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

    </style>

    <body>

        <div class="in">
            <h3>Notification Dashboard | Administrator</h3>
        </div>
        <div class="head">
            <div class="left">
                <a href="Administrator.php">
                    <p class="title     ">
                        <img src="Images/OSM_Icon.ico" style=" max-height: 120px;
                                                              max-width:200px;
                                                              margin-top: -59px;
                                                              margin-left: -55px;" />
                    </p>
                </a>
                <br>
                <?php
                include "adminsublinks.php";
                ?>
            </div>
            <div class="notification-area">
                <div class="notification-data">
                    <br><br><br>
                     <table>
                                <tr>
                                <th>ID</th>
                                <th>Email</th>
                                <th>Paid</th>
                                <th>Type</th>
                                </tr>
                    <?php 

                    include "Connection.php";

                    $sql = "SELECT count(*) as TotalRegular from admin_notification where subscriptiont_type = ''";

                    $result=$conn->query($sql);
                    if($result->num_rows>0){
                        while ($row=$result->fetch_assoc()) {
                            echo "<span>Total Regular User&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <b id ='blue'>$row[TotalRegular]</b></span><br/>";
                        }
                    }

                    $sql = "SELECT count(*) as TotalPremium from admin_notification where subscriptiont_type = 'PREMIUM'";

                    $result=$conn->query($sql);
                    if($result->num_rows>0){
                        while ($row=$result->fetch_assoc()) {
                            echo "<span id='premium'> Total Premium USER&nbsp&nbsp&nbsp: <b id='red'>$row[TotalPremium]</b></span><br/>";
                        }
                    }

                    $sql = "SELECT sum(price) as Total from admin_notification";

                    $result=$conn->query($sql);
                    if($result->num_rows>0){
                        while ($row=$result->fetch_assoc()) {
                            echo "<span id='premium'> Total Website Cash&nbsp&nbsp&nbsp&nbsp&nbsp : <b id='green'>$$row[Total]</b></span><br>";
                        }
                    }

                    echo "<hr>";
                    echo "<script>console.log('CONSOLE WORKS!');</script>";

                    $sql = "SELECT * FROM admin_notification ORDER BY accno DESC"; 
                    $result=$conn->query($sql);
                    if($result->num_rows>0){
                        while ($row=$result->fetch_assoc()) {

                            //echo "ID: <span>$row[id]</span> Email: <span id = 'email'>$row[user_email]</span> Has Paid to your website://<b id='green'>$$row[price]</b> Type: <span><b id='red'>$row		[subscriptiont_type]</b></span><br>";

                            echo"
                           
                                <tr>
                                <td>$row[id]</td>
                                <td>$row[user_email]</td>
                                <td>$row[price]</td>
                                <td>$row[subscriptiont_type]</td>
                                </tr>
                           
                            ";
                        }

                    }

                    ?>
                </div>
            </div>
        </div>
         </table>
        <div id="fot">
            <?php 

            include "footer.php";

            ?>
        </div>
    </body>
</html>
