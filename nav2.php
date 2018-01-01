<?php
include "Connection.php";
?>
<style  type="text/css">
    #rght{
        margin-left: 30em;

    }
    #rght{
        float: right;
        margin-left: 37em;
    }


</style>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="icon" href="Images/o.png">
<link rel="stylesheet" href="index.css">
<nav class="navbar navbar-default" id="navcolor" >
    <div class="navbar-header">
        <a class="navbar-brand" class="this" href="Form1.php">
            <p class="title">
                <img src="Images/hedd.png" width="" height="" style=" max-height: 120px;
                                                                     max-width:200px;
                                                                     margin-left: -27px;" />
            </p>
        </a>
    </div>
    </div>
<ul class="nav navbar-nav" id="nvcolor">
    <li><button type="button" class = "btn" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-original-title="Browse" data-html="true" data-content="<a href='Form2.php?q=Action'>Action</a> <a href='Form2.php?q=Adventure'>Adventure</a> <a href='Form2.php?q=Fantasy'>Fantasy</a> <a href='Form2.php?q=Horror'>Horror</a> <a href='Form2.php?q=Romance'>Romance</a>"><i class="entypo-check"></i><p class="nv">Discover</p></button></li>

    <li><button type="button" class = "btn" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-original-title="Browse" data-html="true" data-content="<a href='index3.php''>About us</a> <a href='Contest.php'>Contest</a>"><i class="entypo-check"></i><p class="nv">Community</p></button></li>

    <li><button type="button" class = "btn" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-original-title="Browse" data-html="true" data-content="<a href='Create.php'>My Story</a>"><i class="entypo-check"></i><p class="nv">Create Story</p></button></li>



    <li><button type="button" class="btn" id="rght" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-original-title="
        <?php
        include "Connection.php";
        if(isset($_SESSION['Username'])){
            $user = $_SESSION['Username'];
            echo '  Username: @'.$user.'';
        }
        ?>
        " data-html="true" data-content="<a href='Profile.php'>My Profile</a><br><a href='Subscriptions.php'>Subscriptions</a><br><a href='EditAccount.php'> Edit Account</a><br><a href='logout.php'>Logout</a> "><i class="entypo-check"></i><p class="nv">My Account</p></button></li>
</ul>
</nav>
<script>
    $(document).ready(function(){
        $('[data-toggle="popover"]').popover();   
    });
</script>