<!DOCTYPE html>
<?php
require_once "payment_book_config.php";
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
if(isset($_GET['seqNo'])){
    $seqNo = $_GET['seqNo'];
}


//selection

$uploaderId = "";
$price = 0;
$email = "";

$sql = "select * from uploads where seqNo = ".$_GET['seqNo']."";

$result =$conn->query($sql);
if($result->num_rows > 0){
    while ($row = $result->fetch_assoc()) {
        $uploaderId = $row['uploaderid'];
        $price = $row['price'];
    }
}
$sql1 = "select * from accounts where AccNo = $uploaderId";
$result1 = $conn->query($sql1);
if($result1->num_rows > 0){
    while ($row = $result1->fetch_assoc()) {
        $email = $row['Email'];
    }
}

$_SESSION['seqno'] = $config['seqno'];
$_SESSION['uploader'] = $uploaderId;
$_SESSION['email'] =$email;
$_SESSION['price'] = 1;

?>
<hmtl>
    <title>Online Story Maker</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="icon" href="Images/o.png">
    <link rel="stylesheet" href="index.css">
    <link href="css/hover.css" rel="stylesheet" media="all">
    <head>
        <style type="text/css">
            @font-face
            {
                font-family:'Oxygen';
                src: url(fonts/Oxygen-Regular.ttf) format('truetype');
            }
            #paypal
            {
                
            }
            #logo
            {
                margin: 50px 0 50px 0
            }
            #logoimg
            {
                width: 300px;
                height: 230px
            }
            #word
            {
                 font-family:'Oxygen';
            }

        </style>

    </head>
    <body>
        <center>
            <div id = paypal>
                <div id = "logo">
                    <img src ="Images/osm_icon.ico" alt="OSM" id = "logoimg"/>
                </div>
                <center><p id="word">
                    On this page you are going to subscribe the Online Story Maker via Paypal transaction click the button below to continue.
                    </p></center>

                <form action="<?php echo $config['url']; ?>" method="post">

                    <input type="hidden" name="business" value="<?php echo $config['business'] ?>">
                    <input type="hidden" name="return" value="<?php echo $config['return'] ?>">
                    <input type="hidden" name="cmd" value="_xclick-subscriptions">
                    <input type="hidden" name="item_name" value="OSM">
                    <input type="hidden" name="item_number" value="OSM">
                    <input type="hidden" id="val" name="a3" value="<?php echo $config['price'] ?>">
                    <input type="hidden" name="p3" value="1">
                    <input type="hidden" name="t3" value="M">
                    <input type="hidden" name="src" value="1">
                    
                    <center><img src="Images/paypallogo.png" alt="paypal"></center>
                    <input type="image" name="submit class"
                           src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/btn_subscribe_113x26.png"
                           alt="Subscribe">
                    <img alt="" width="1" height="1"
                         src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
                </form>
            </div>
        </center>
    </body>

</hmtl>