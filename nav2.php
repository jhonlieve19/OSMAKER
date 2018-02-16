<?php
include "Connection.php";
?>
<style  type="text/css">
    @font-face
    {
        font-family:'Oxygen';
        src: url(fonts/Oxygen-Regular.ttf) format('truetype');
    }
    .navs
    {
        color: #d3eae0
    }
    .navs li
    {
        float: left;
        list-style-type: none;
        font-family:'Oxygen';
        padding-top: 23px;
    }
    .navbtn
    {
        width: 95px;
        border-radius: 4px;
        border-style: none;
        margin: 5px;
        background: transparent;
    }
    .navbtn:focus
    {
        outline:0 !important;
        color: white;
        border-radius: 20px;
        border: 1px solid white
    }
    .navbtn:hover
    {
        color: white;
    }
    #myacc a:hover
    {
        color: white;
    }
    .navbtn p
    {
        position: relative;
        top: 5px;
    }
   
    .divbtn
    {
        position: relative;
        left: 20px;

    }
    .myaccount
    {
        width: 200px;
        float: right;
        position: relative;
        top: px;
        left: -15px;
        font-family:'Oxygen';
    }
    #rght
    {
        margin-left: 250px;
        width: 65px;
        position: relative;
        top: 0px;
        left: 70px;

    }
   

    #myacc:hover
    {
        color: #d3eae0;
        font-family:'Oxygen';
        color: #d3eae0;
        font-family:'Oxygen';
        width: 50px;
        height: 35px;
        position: relative;
        left: ;
        top: 5px
    }


    #myacc
    {
        color: #d3eae0;
        font-family:'Oxygen';
        color: #d3eae0;
        font-family:'Oxygen';
        width: 50px;
        height: 35px;
        position: relative;
        left: ;
        top: 5px
    }

    #searchbox
    {
        color: black;
        padding-left: 10px;
        margin-left: 30px;
        outline:0 !important;

    }
    .logo img
    {
        width: 70px;
        height: 40px;
        margin-left: 40px
    }
    .logo
    {
        float: left;
        padding-top: 20px
    }
    echo
    {
        color: black
    }
    #user
    {
        color: red;
        font-size: 14px
    }
    #usertxt
    {
        color: darkcyan;
        font-size: 14px
    }
    .tb{
        margin: 7px 2px 0px 5px;
        border-bottom-color: transparent;
        border-style:hidden;
        padding: 3px;
        border-radius: 5px;
    }
     .navbtn1
    {
        background-color: transparent;
        border: 1px solid transparent;
        background-image: url(Images/account.png);
        background-position: center;
        background-repeat: no-repeat;
        background-size: 35px 35px;
        /*background-size: 20px 27px;*/
       display: inline-block;
        vertical-align: middle;
        -webkit-transform: perspective(1px) translateZ(0);
        transform: perspective(1px) translateZ(0);
        box-shadow: 0 0 1px transparent;
    }
    .navbtn1:focus
    {
        outline: 0 !important;
        border: 1px solid transparent;

        background-position: center;
        background-repeat: no-repeat;
        
    }
   

    .navbtn1:hover, .navbtn1:focus, .navbtn1:active {
       -webkit-animation-name: hvr-wobble-horizontal;
        animation-name: hvr-wobble-horizontal;
        -webkit-animation-duration: 1s;
        animation-duration: 1s;
        -webkit-animation-timing-function: ease-in-out;
        animation-timing-function: ease-in-out;
        -webkit-animation-iteration-count: 1;
        animation-iteration-count: 1;
    
    }
  



    @-webkit-keyframes hvr-wobble-horizontal {
        16.65% {
            -webkit-transform: translateX(8px);
            transform: translateX(8px);
        }
        33.3% {
            -webkit-transform: translateX(-6px);
            transform: translateX(-6px);
        }
        49.95% {
            -webkit-transform: translateX(4px);
            transform: translateX(4px);
        }
        66.6% {
            -webkit-transform: translateX(-2px);
            transform: translateX(-2px);
        }
        83.25% {
            -webkit-transform: translateX(1px);
            transform: translateX(1px);
        }
        100% {
            -webkit-transform: translateX(0);
            transform: translateX(0);
        }
    }
    @keyframes hvr-wobble-horizontal {
        16.65% {
            -webkit-transform: translateX(8px);
            transform: translateX(8px);
        }
        33.3% {
            -webkit-transform: translateX(-6px);
            transform: translateX(-6px);
        }
        49.95% {
            -webkit-transform: translateX(4px);
            transform: translateX(4px);
        }
        66.6% {
            -webkit-transform: translateX(-2px);
            transform: translateX(-2px);
        }
        83.25% {
            -webkit-transform: translateX(1px);
            transform: translateX(1px);
        }
        100% {
            -webkit-transform: translateX(0);
            transform: translateX(0);
        }
    }
    
    {
        color: red
    }
   

</style>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="icon" href="Images/OSM_Icon.ico">


<div class = "navs">

    <div class="logo">
        <a href = "index.php"><img src="Images/osmlogo.png" alt ="Online Story Maker" id="ima"></a>
    </div>

    <div class="divbtn">
        <li><button type="button" class = "navbtn" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-html="true" data-content="<a href='Form2.php?q=Action'>Action</a><br><a href='Form2.php?q=Adventure'>Adventure</a><br><a href='Form2.php?q=Fantasy'>Fantasy</a><br><a href='Form2.php?q=Horror'>Horror</a><br><a href='Form2.php?q=Romance'>Romance</a>"><i class="entypo-check"></i><p class="nv" id="discover">Category</p></button></li>

        <li><button type="button" class = "navbtn" data-toggle="popover" data-placement="bottom" data-trigger="focus"  data-html="true" data-content="<a href='index3.php'>About us</a><br><a href='Contest.php'>Contest</a> "><i class="entypo-check"></i><p class="nv"id = "community">Community</p></button></li>

        <li><button type="button" class = "navbtn" data-toggle="popover" data-placement="bottom" data-trigger="focus"  data-html="true" data-content="<a href='Create.php'>Make Story</a>"><i class="entypo-check"></i><p class="nv" id = "create">Make Story</p></button></li>
    </div>

    <form name="squery" action="Find.php" method="get">

        <li>
            &emsp;<input class="tb" id = "searchbox"type="text" name="search" placeholder=" Search Stories or Maker...." size="37">
        </li>

    </form>

    <li><button type="button" class="navbtn1" id="rght" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-original-title="
        <a>
        <?php
        include "Connection.php";
        if(isset($_SESSION['Username'])){
            $user = $_SESSION['Username'];
            echo '<a id = usertxt>User: </a><a id = user>'.$user.'</a>';
        }
        ?>
        </a>
    
        " data-html="true" data-content="<a href='Profile.php'>My Account</a><br><a href='authornotif.php'>My Transaction</a><br><a href='Subscriptions.php'>Subscription</a><br><a href='EditAccount.php'> Edit Account</a><br><a href='logout.php'>Logout</a> "><i class="entypo-check"></i><p class="nv" id="myacc"></p></button></li>

</div>
<script>
    $(document).ready(function(){
        $('[data-toggle="popover"]').popover();   
    });
</script>