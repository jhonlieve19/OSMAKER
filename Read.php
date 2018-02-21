<?php
session_start();
include "Connection.php";
if(isset($_SESSION['Username'])){}
else
{
    header("location: index.php?ses=Login first");
    die();
}

if(isset($_POST['search']))
{
    echo $search = $_POST['search'];
}


if(isset($_GET['code'])){

    $seqNo = $_GET['code'];

    //echo $seqNo;
}
$result = $conn->query("SELECT * FROM uploads WHERE seqNo LIKE '$seqNo'");
if($result->num_rows > 0)
{
}
else{
    header("location:Form1.php");
}
?>
<!DOCTYPE html>
<html>

    <head>
        <title>Online Story Maker</title>

        <script src="js/jquery.min.js"></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <link rel="icon" href="Images/OSM_Icon.ico">
        <link href="css/hover.css" rel="stylesheet" media="all">
<style type="text/css">
    img.rat{
        width: 40;
        height: 40;
        display: inline;
    }
</style>

        <style>

            @font-face
            {
                font-family:'Oxygen';
                src: url(fonts/Oxygen-Regular.ttf) format('truetype');
            }
            @font-face
            {
                font-family:'Opensans3';
                src: url(fonts/Opensans3.ttf) format('truetype');
            }
            @font-face
            {
                font-family:'Roboto-Regular';
                src: url(fonts/Roboto-Regular.ttf) format('truetype');
            }
            body
            {
                background: linear-gradient(100deg, #1f9b82, #0f6c98);
                background-repeat: no-repeat;
                background-attachment: fixed;
                font-family:'Oxygen';
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
                background-color: transparent;

            }
            .con-con
            {
                margin-top: 80px;
                background-color: white;
                box-shadow: 0px 0px 54px 0px rgba(0,0,0,0.3);

            }
            .ins{
                background-color: white;
                height: auto;
                width: 247px;
                margin: 1em;
                float: left;
                padding: 1%;
                border: 1px solid #EDEDED;
                border-radius: 5px;
                position: relative;
                left: 10px;
                font-family:'Oxygen';

            }
            .imahe
            {
                width:220px;
                height:220px;
                border-radius: 2px;
                margin-bottom: 4%;
                position: relative;
                top: -15px

            }
            .right{
                width: 805px;
                height: auto;
                background-color: white;
                margin: 1em;
                padding: 0.3% 3% 15% 3%;
                border: 1px solid #EDEDED;
                border-radius: 5px

            }
            .right,.ins{
                display: inline-block;
            }
            .btns{
                background-color: #4367B0;
                border-style:hidden;
                padding: 0px 7px 5px 7px;
                color: white;
                border-radius: 3px;
                width: 115px;
                height: 20px;
                position: relative;
                left: 3px;
                margin-bottom: 10px;
                font-size: 13px;

            }
           
            .btns:hover{
                background-color: skyblue;
                box-shadow: 0em 0em 3em;
            }
            .btnss{

                background-color: #E03938;

                font-size: 13px;
                border-style:hidden;
                padding: 0px 7px 5px 7px;
                color: white;
                border-radius: 3px;
                height: 20px;
                width: 115px;
                border-color: aquamarine;
            }
            .btnss:hover{
                background-color: skyblue;
                box-shadow: 0em 0em 3em;
            }
            table{
                border-collapse: collapse;
                border-color:white;
            }
            textarea {
                resize: none;
                border-style: none;
                min-height: auto;
                max-height: auto;
                outline: none;
                font-family: 'Roboto-Regular';
            }
            #butoy{
                color: #31A1CD;
                border: 1px solid #31A1CD;
                padding: 10px 20px 10px 20px;
                border-radius: 50px
            }
            #butoy:hover
            {
                text-decoration: none;
                background-color: #31A1CD;
                color: white
            }
            .tit{
                color: #0997D5;
            }
            .color{
                color: white;
                background-color: transparent;
                background-image: url(Images/titlebgprofile.png);
                background-repeat: no-repeat;
                height: 50px;
                position: relative;
                top: 30px;
                left: 20px;
                padding-top: 5px;

            }


            .content{

                margin: 0 auto;
                width: 600px;
                padding: 10px;
                min-height: 300px;

            }

            .read-more-link, .show-less-link{
                text-decoration: none;
                font-weight: bolder;
                color: green;
            }
            .liness
            {
                border: 0.5px solid white;
                width: 1150px;
                position: relative;
                top: 80px
            }
            .read
            {
                position: relative;
                left: 10px;
                color: dodgerblue
            }
            .he
            {
                color: dodgerblue
            }
            .watch
            {
                background-color: ghostwhite;
                border-radius: 10px;

                border: 1px solid #E4E4E4;
                width: 200px;
                position: relative;
                left: 12px
            }
            .toradius
            {
                font-family: 'Roboto-Regular';
                letter-spacing: 2px;
                position: relative;
                left: -45px;
               
                
            }
            textarea {

                box-sizing:content-box;
                width: 115%;
                overflow: hidden
            }
            .maker{
                color: #B2B4B2
            }
            #more
            {
                padding: 5px 20px 5px 20px;
                color: #31A1CD;
                border: 1px solid #31A1CD;
                border-radius: 30px;
                width: 125px;
                text-align: center
            }
            #more:hover
            {
                text-decoration: none;
                border-radius: 30px;
                background-color: #31A1CD;
                color: white;
                padding: 5px 20px 5px 20px
            }
            #type
            {
                color: #5A545B;
                font-family: 'Roboto-Regular'
            }
            #type1
            {
                color: limegreen;
                font-weight: normal;
                font-family: 'Oxygen'
            }
            

        </style>

        <script>
            $(document).ready(function(){
                $('[data-toggle="popover"]').popover();   
            });
        </script>
    </head>

    <body>
        <div class="container">
            <?php
            include "nav2.php";
            ?>

            <div class="con">
                <div class="con-con">
                    <?php 
                    $seqNo = "";
                    if(isset($_GET['code'])){

                        $seqNo = $_GET['code'];
                    }
                    if(isset($_POST['tbseq']))
                        $seqNo = $_POST['tbseq'];
                    //echo $seqNo;
                    $result = $conn->query("SELECT * FROM uploads WHERE seqNo LIKE '$seqNo'");
                    if($result->num_rows > 0)
                    {
                        while ($row = $result->fetch_assoc())
                        {   
                            $seq = $row['seqNo'];
                            $writer = $row['uploaderid'];
                            $filename = $row['filename'];
                            $title = $row['title'];
                            $auth = $row['author'];
                            $story = $row['story'];
                            $place = $row['place'];

                        }
                        $result = $conn->query("SELECT * FROM likes WHERE Code LIKE '$seq' AND userName LIKE '$user' ");
                        if($result->num_rows > 0)
                        {
                            while($row = $result->fetch_assoc())
                            {
                                $stat = "Unlike";
                            }
                        }
                        else{
                            $stat = "Like";
                        }

                        $result = $conn->query("SELECT * FROM subscrbe WHERE Uploadercode LIKE '$writer' AND userName LIKE '$user' ");
                        if($result->num_rows > 0)
                        {
                            while($row = $result->fetch_assoc())
                            {
                                $scrb = "Unsubscribe";
                            }
                        }
                        else{
                            $scrb = "Subscribe";
                        }

                        $result = $conn->query("SELECT COUNT(Votes) FROM likes WHERE Code LIKE '$seq'");
                        if($result->num_rows > 0)
                        {
                            while($row = $result->fetch_array())
                            {
                                $vote = $row['0'];
                            }
                        }
                        else{
                            $vote = "0";
                        }

                        $sql = "SELECT * FROM vcounter where seqno = $seqNo";

                        $result=$conn->query($sql);
                        if($result->num_rows>0){
                            $sql = "UPDATE vcounter set viewcount=viewcount+1 where seqno=$seqNo";

                            if($conn->query($sql)){
                                /*echo "counted!";*/
                            }
                            else{
                            }
                        }
                        else{
                            $sql = "INSERT INTO vcounter values(null,$seqNo,1)";

                            if($conn->query($sql)){
                                /* echo "counted!";*/
                            }
                            else{
                                /* echo "not counted!";*/
                            }
                        }


                        echo '
                    <h3 class="color">&emsp;&emsp;Read Story</h3>
                    <br>
                    <br>
                    <div class="ins">

                    <center>
                    <br>
                    <img class="imahe" src="Uploads/'.$filename.'">
                    </center>

                    <hr>
                    <p class="he" id="type">&nbsp;&nbsp; Title &nbsp;&nbsp;&nbsp;&nbsp;:<b id="type1"> '.$title.'&nbsp;</b></p>
                    <p class="he" id="type">&nbsp;&nbsp; Author :<b id="type1"> '.$auth.'&nbsp;</b></p>
                    <p class="he" id="type">&nbsp;&nbsp; Cat. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<b id="type1"> '.$place.'&nbsp;</b></p>
                    <p class="he" id="type">&nbsp;&nbsp; Likes &nbsp;&nbsp;&nbsp;:<b id="type1"> '.$vote.'&nbsp;</b></p>';


                        $sql = "SELECT * FROM vcounter where seqno = $seqNo";
                        $result = $conn->query($sql);
                        if($result->num_rows >0){
                            while ($row = $result->fetch_assoc()) {
                                echo "<p class = 'read' id='type'>Read &nbsp;&nbsp;&nbsp;:<b id='type1'> $row[viewcount]&nbsp;</b></p>
                                <hr>";
                            }
                        } 
                        
                        include "Connection.php";
               //ratings..
                $sql = "SELECT * from ratings where AccNo=$_SESSION[idno] and seqno=$_GET[code]";

                $result= $conn->query($sql);
                if($result->num_rows > 0){
                    while ($row = $result->fetch_assoc()) {
                        echo "<h4>You rated this story: <span id='rate_txt'>$row[rate] stars</span></h4>";
                    }
                }
                else{
                    echo '
                    <div id="rate_content">
                    <h4>Rate this Story</h4>
                    <p>
                    <img src="img/gstar.png" width="50" height="50" class="rat" id="n1">
                    <img  src="img/gstar.png" width="50" height="50" class="rat" id="n2">


                    <img src="img/gstar.png" width="50" height="50" class="rat" id="n3">

                    <img src="img/gstar.png" width="50" height="50" class="rat" id="n4">

                    <img src="img/gstar.png" width="50" height="50" class="rat" id="n5">
                    </p>
                    </div>
                    ';
                    echo "
                    <div class='hidden' id='done_rate'>
                    <h4>Thank you for rating $user's story. Please refresh to see your rate.</h4>
                    </div>
                    ";

                }

                        echo'
                    <center>
                    <table>
                    <ul>
                    <tr>
                    <form action="Like.php" method="post">
                    <input type="text" name="tbUser" value="'.$user.'" size="4" hidden>
                    <input type="text" name="tbCode" value="'.$seq.'" size="4" hidden>
                    <input type="submit" value="'.$stat.'" class="btns">
                    </form>&nbsp;
                    </tr>
                    <tr>


                    <form action="Subscribe.php" method="post">
                    <input type="text" name="tbUser" value="'.$user.'" size="1" hidden>
                    <input type="text" name="tbCode" value="'.$seq.'" size="1" hidden>
                    <input type="text" name="tbwriter" value="'.$writer.'" size="1" hidden>
                    <input type="submit" value="'.$scrb.'" class="btnss">
                    </form>
                    </tr>
                    <ul>
                    </table>
                    <a href="https://twitter.com/intent/tweet?button_hashtag=Ourstory"  class="twitter-hashtag-button" data-show-count="false">Tweet #Storya</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>

                    </center>
                    <br>
                    </div>

                    <div class="right">
                    <h1 class="tit">'.$title.'</h1>
                    <p class="maker">&nbsp;Author: '.$auth.'</p>

                    <center><hr>
                    <a href="Form1.php" id="more" class= "hvr-back-pulse">More Stories</a> &emsp;
                    &emsp;
                    <a href="Profile.php" id = "more" class= "hvr-back-pulse">My Stories</a>&emsp;';


                     



                        $sql1 = "select * from uploads where isPaid=1 and seqNo=$_GET[code]";
                        $result= $conn->query($sql1);
                        if($result->num_rows > 0){
                            $sql = "select * from book_payment where payerid=$_SESSION[idno] and seqNo=$_GET[code]";
                            $result=$conn->query($sql);
                            if($result->num_rows < 1){
                                echo ' &emsp;
                        <a href="book_payment.php?seqNo='.$seqNo.'" id ="more" class= "hvr-back-pulse">Subscribe</a></center> ';  
                            }
                        }
                        echo '
                <hr>
                <div class="content">
                <textarea readonly class="toradius" name="tbBdy" rows="40px">';
                        $sql = "select * from uploads where isPaid=1 and seqNo=$_GET[code]";

                        $result= $conn->query($sql);
                        if($result->num_rows >0 ){
                            $sql = "select * from book_payment where payerid=$_SESSION[idno] and seqNo=$_GET[code]";
                            $result=$conn->query($sql);
                            if($result->num_rows > 0){
                                echo $story;
                            }
                            else{

                                echo substr($story, 0,2)."....";         
                            }
                        }
                        else{
                            echo $story;
                        }

                        echo '    
                </textarea>
                <hr/>
                </div>
                </form>
                <br><br>
                <center>
                <a id="butoy" class="hvr-wobble-vertical" href="Form1.php">More Stories</a>
                </center>
                </div><br><br>	
                ';
                    }
                    else
                    {

                    }					
                    ?>

                </div>
                <p class="hidden" id="seq_no"><?php if(isset($_GET['code'])){echo $_GET['code'];} ?></p>
    <p class="hidden" id="my_id"><?php echo $_SESSION['idno']; ?></p>
    <br>
</div>
<script type="text/javascript" src="js/rating.js"></script>
<script type="text/javascript">
    $(document).ready(function(){

        $rate = 0;
        $idno = $("#my_id").text();
        $newidno = parseInt($idno);
        $seqno = $("#seq_no").text();
        $newseqno = parseInt($seqno);
        $ratetxt = $("#rate_txt").text();

        if(parseInt($ratetxt) <= 3){
            $("#rate_txt").css("color","red");
        }
        else 
        if(parseInt($ratetxt) > 3){
            $("#rate_txt").css("color","green");
        }




        $("#n1").click(function(){

            console.log($newidno);

            $rate = 1;

            my_ajax();

            $("#rate_content").addClass('hidden');
            $("#done_rate").removeClass('hidden');

        });
        $("#n2").click(function(){
            $rate = 2;
            my_ajax();

            $("#rate_content").addClass('hidden');
            $("#done_rate").removeClass('hidden');

        });
        $("#n3").click(function(){
            $rate = 3;
            my_ajax();

            $("#rate_content").addClass('hidden');
            $("#done_rate").removeClass('hidden');

        });
        $("#n4").click(function(){
            $rate = 4;
            my_ajax();

            $("#rate_content").addClass('hidden');
            $("#done_rate").removeClass('hidden');

        });
        $("#n5").click(function(){
            $rate = 5;
            my_ajax();

            $("#rate_content").addClass('hidden');
            $("#done_rate").removeClass('hidden');


        });
        function my_ajax(){

            $.ajax({
                url: "ratings_insert.php",
                type: "POST",
                async: false,
                data: {
                    "request":1,
                    "accno": $newidno,
                    "rate" : $rate,
                    "seqno": $newseqno

                },
                success: function(data){
                    console.log(data);
                }

            });

        }
    });
</script>
                <br>
            </div>
            <?php
            include"footerlogo.php";
            ?>
        </div>

    </body>
</html>
