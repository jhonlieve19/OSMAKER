<!DOCTYPE html>
<?php
require_once "config.php";
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
<hmtl>
    <title>Online Story Maker</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="icon" href="Images/o.png">
    <link rel="stylesheet" href="index.css">
    <head>


    </head>
    <body>
        <center>
            <p>
                On this content you are going to subscribe the Online Story Maker and have some transaction in order for you to earn.
            </p>
            <br><br><br>
            <!--
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="UTSUE3FJLK5RN">
<input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>-->



            <form action="<?php echo $config['url']; ?>" method="post">

                <input type="hidden" name="business" value="<?php echo $config['business']; ?>">
                 <input type="hidden" name="return" value="<?php echo $config['return']; ?>">
                <input type="hidden" name="cmd" value="_xclick-subscriptions">

                <input type="hidden" name="item_name" value="OSM">
                <input type="hidden" name="item_number" value="OSM">
 
                <input type="hidden" id="val" name="a3" value="500.00">
                <input type="hidden" name="p3" value="1">
                <input type="hidden" name="t3" value="M">

                <input type="hidden" name="src" value="1">

                <input type="hidden" name="on0" value="Format">Format <br />
                <select id="sel" onchange="change()" name="os0">
                    <option value="REGULAR" selected>REGULAR</option>
                    <option value="PREMIUM">PREMIUM</option>
                </select> <br />

                <input type="image" name="submit"
                       src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/btn_subscribe_113x26.png"
                       alt="Subscribe">
                <img alt="" width="1" height="1"
                     src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
            </form>
            <script>

                function change(){
                    var sel = document.getElementById('sel');
                    var val = document.getElementById('val');

                    if(sel.value.toString() == 'REGULAR'){
                        val.value = 500.00;
                        //alert(val.value.toString());
                    }
                    else if(sel.value.toString() == 'PREMIUM'){
                        val.value = 700.00;
                        // alert(val.value.toString());
                    }
                    //alert(sel.value.toString());
                }

            </script>
        </center>
    </body>
    <?php
    include"footer.php";
    ?>
</hmtl>