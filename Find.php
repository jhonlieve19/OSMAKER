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
    $search = $_POST['search'];
    if(empty($search)){
        header("location:Form1.php");
    }else if($search === ""){
        header("location:Form1.php");
    }
}
else{

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
    @font-face
    {
        font-family:'Oxygen';
        src: url(fonts/Oxygen-Regular.ttf) format('truetype');
    }
    @font-face
    {
        font-family:'Roboto-Regular';
        src: url(fonts/Roboto-Regular.ttf) format('truetype');
    }

    body
    {
        background: linear-gradient(100deg, #1f9b82, #0f6c98); 
        font-family:'Oxygen';
        background-attachment: fixed
    }
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

        height: auto;
        width: auto;
        padding-top: 80px;

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
        -webkit-transition-duration: 0.3s;
        transition-duration: 0.3s;
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
        border-radius: 2px;
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
    #rght{
        float: right;
        margin-left: 11.6em;
    }   
    #eyts3
    {
        color: white;
        font-family: 'Roboto-Regular';

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
    #h3prop
    {
        font-family:'Oxygen';
        color: white;
        background-image: url(Images/titlebgform2.png);
        background-repeat: no-repeat;
        width: 240px;
        height: 38px;
        padding-top: 5px;
        padding-bottom: 8px;
        position: relative;
        left: -14px;
        top: 0px;
        text-indent:30px;
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
    <div class="container">
        <?php
        include "nav.php";
        ?>
        <div class="liness">

        </div>
        <div class="con">

            &emsp; <a class="h-link" href="Form1.php"><h3 id ="h3prop">&nbsp;&nbsp;&nbsp;Search</h3></a>&emsp;
            <p style="text-indent:2%;"></p>

            <?php
            if (isset($_GET['search'])){
                $qry =  mysqli_real_escape_string($conn,$_GET['search']);
                echo '<h3 style="text-indent:2%;" id= "eyts3">Results for : "'.$qry.'" </h3><br>
                ';
            }

            if(isset($_SESSION['Username'])){
    //echo'na set na';
                $usr = $_SESSION['Username'];
            }

            ?>
            <?php 

            $dob = 0;


            $result = $conn->query("SELECT * FROM accounts WHERE Username LIKE '$usr'");
            if($result->num_rows > 0)
            {
                while($row = $result->fetch_array())
                {
                    $bday = $row['3'];
                }
                $dob = $bday;
                function ageCalculator($dob)
                {
                    if(!empty($dob)){
                        $birthdate = new DateTime($dob);
                        $today   = new DateTime('today');
                        $age = $birthdate->diff($today)->y;
                        return $age;
                    }else{
                        return 0;
                    }
                }
            }

            $_age = ageCalculator($dob);
            if($_age<=18){

                $sql = "SELECT * FROM uploads WHERE title LIKE '%$qry' OR author like '%$qry' OR story like '%$qry' AND status = 'display' AND exclusive='Off' ORDER BY up_date DESC";


                //$sql = "SELECT * FROM uploads WHERE title LIKE '%".$qry."%' OR story LIKE '%".$qry."%' OR place LIKE '%".$qry."%' OR author LIKE '%".$qry."%' AND status = 'display' AND exclusive='Off' ORDER BY up_date DESC";

                

                $result = $conn->query($sql);

                if($result->num_rows > 0)
                {
                    while ($row = $result->fetch_assoc())
                    {   
                        $mtitle = $row['title'];
                        $story = $row['story'];
                        $title = $row['place'];
                        $auth = $row['author'];
                        $filename = $row['filename'];
                        $seq = $row['seqNo'];

                        echo '

                        <div class="hvr-grow-shadow" id="ins">
                        <form action="Read.php?code='.$seq.'" method="post">
                        <input type="text" name="tbseq" value="'.$seq.'" hidden>
                        <center>        
                        <img src="Uploads/'.$filename.'">
                        </center>
                        <h5>'.$title.'</h5>
                        <h6>by: '.$auth.'</h6> 
                        <input id="btnpass" class="hvr-fade" type="submit" value="Read Story">
                        </form>
                        </div>

                        ';
                    } 
                }
                else
                {
                    echo'<br><br><br>&emsp;&emsp;We couldn`t find a record for <label style="color: red;">'.$qry.'</label> in our catalog.<br><br><br><br><br><br><br><br><br><br><br>';
                }   
            }
            else{

            }




            ?>

        </div>
        <br>
        <div class="liness">

        </div>
        <?php
        include "footerlogo.php";
        ?>

    </div>

</body>

</html>
