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

                <input type="hidden" id="val" name="a3" value="5.00">
                <input type="hidden" name="p3" value="1">
                <input type="hidden" name="t3" value="M">

                <input type="hidden" name="src" value="1">

                <input type="hidden" name="on0" value="Format">Format <br />
               
                <!-- dri na part ang selection for check -->
                 <select id="sel" name="os0">
                    <option value="REGULAR">REGULAR</option>
                    <option value="PREMIUM">PREMIUM</option>
                </select> 
               <br />

                <input type="image" name="submit"
                       src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/btn_subscribe_113x26.png"
                       alt="Subscribe">
                <img alt="" width="1" height="1"
                     src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
            </form>
           <!--  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                
                
                <button>Check</button>

            </form> -->
            <script>
                $(document).ready(function(){
                    $("#sel").change(function(){
                        if($(this).val()=='REGULAR'){

                            console.log($("#sel option[value='REGULAR']").prop("selected",true).val());

                            $("input[name=a3]").val("5");
                            console.log($("input[name=a3]").val());

                        }
                        else if($(this).val()=='PREMIUM'){

                            console.log($("#sel option[value='PREMIUM']").prop("selected",true).val());

                            $("input[name=a3]").val("10");
                            console.log($("input[name=a3]").val());

                        }

                        // window.location.href="learn.php?price="+$(this).val();
                    });
                });
            </script>
        </center>
    </body>
    <?php  

    include "Connection.php";

    if(isset($_POST['submit'])){

        $_SESSION['type'] = '';
        $type = $_POST['os0'];

        $_SESSION['type'] =$type;
        echo $_SESSION['type'];
    }

    ?>


    <?php
    include"footer.php";
    ?>
</hmtl>