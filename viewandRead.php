<!DOCTYPE html>
<?php

session_start();

include "Connection.php";
if(isset($_SESSION['Username'])){
    //echo $val = $_SESSION['Username'];
}
else
{
    header("location: index.php?ses=Login first");
    die();
}

if(isset($_REQUEST['tbconID']))
{
    $ID = $_REQUEST['tbconID'];
    if($ID == 0)
    {
        header("location:ViewEntries.php");
    }
}
else{
    header("location:ViewEntries.php?mm=invalid");
}
?>



<?php
include "nav2.php";
?>
<html>
    <head>
        <style type="text/css">
            .contain{
                padding: 3em 7em 0em 7em;
                width: auto;
                height: 900px;
                background-color: white;
            }
            .uperttle{
                color: gray;
                text-decoration-style:solid;
                font-weight: 400;

            }
            .sud{

                width: auto;
                height: auto;
                background-color:#f2f5f9;
                padding:  2em 3em 3em 2em;

            }

            .entry{
                font-size: 20px;
                color: orange;
            }
            .entry:hover{
                font-style: normal;
                text-decoration: none;
                font-size: 25px;
                color: blue;
                text-shadow: -0.1em 0.1em 1em gray;
                font-family: Century Gothic;

            }

            img{
                width:218px;
                height:310px;
                margin-bottom: 4%;

            }
            .forimage{
                width: 275px;
                height: auto;
                background-color: white;
                padding: 1em 2em 2em 2em;
                float: left;
                margin-left: 2em;


            }
            .forpra{

                width: 780px;
                height: auto;
                background-color: white;
                padding: 2em 2em 12em 2em;

                padding-top: 3em;
            }
            .forpra,.forimage{
                display: inline-block;
            }
            .topttle{
                font-weight: bold;
            }
            .inpara{
                text-indent: 8em;
            }
            .back{
                float: left;

            }
            h2{
                font-family: century gothic;
                color: crimson;
            }
            h4{
                color: darkgoldenrod;
            }
        </style>
    </head>
    <body>
        <div class="contain">

            <div class="sud">
                <?php
                $entryID = "";
                if(isset($_REQUEST['tbconID'])){
                    $ID = $_REQUEST['tbconID'];
                    if(isset($_SESSION['Username'])){
                        $usr = $_SESSION['Username'];
                    }
                    $result = $conn->query("SELECT * FROM upldcontest WHERE upID = '$ID'");
                    if($result->num_rows > 0)
                    {
                        while ($row = $result->fetch_array())
                        {
                            $id= $row['0'];
                            $entryID= $row['1'];
                            $upldr= $row['6'];
                            $ttl= $row['3'];
                            $body= $row['4'];
                            $pik = $row['2'];
                        }
                        $result = $conn->query("SELECT * FROM adkontis WHERE conID = '$entryID'");
                        if($result->num_rows > 0)
                        {
                            while ($row = $result->fetch_array())
                            {
                                $vtend = $row['4'];
                            }
                        }
                        
                        $datetoday = date("Y-m-d");
                        if($datetoday < $vtend){
                            //echo 'Start of voting now';
                        }
                        else{
                            echo '<style type="text/css">
                                    .btns{
                                    background-color:black;
                                    display:none;
                                    }
                                    </style>
                            ';
                        }
                        $result = $conn->query("SELECT * FROM voting WHERE code = '$id' AND username ='$usr'");
                        if($result->num_rows > 0)
                        {
                            while($row = $result->fetch_assoc())
                            {
                                $val = " Unvote " ;
                            }
                        }
                        else{
                            $val = "Vote";
                        }
                        echo"
                            <h2>".$ttl."</h2>
                            <h4>by: ".$upldr."</h4>";

                        $result = $conn->query("SELECT * FROM adkontis WHERE conID = '$entryID'");
                        if($result->num_rows > 0)
                        {
                            while ($row = $result->fetch_assoc())
                            {
                                $des = $row['conDescrptn'];
                                $enDate = $row['endDate'];
                            }

                            $datenow = date("Y-m-d");
                            if($enDate > $datenow){
                                echo ' Submission is on going';
                            }
                            else
                            {
                                echo"
                                     <form action='vote.php' method='post'>
                                        <input type='text' name='userID' value='".$usr."' hidden>
                                        <input type='text' name='contestID' value='".$entryID."' hidden>
                                        <input type='text' name='storyID' value='".$id."' hidden >
                                        <input type='submit' value='".$val."' class='btns'>
                                    </form>";
                            }
                        }

                        echo"
                          <br><br><a class='back' href='ViewEntries.php?ConID=".$entryID."'><< back</a>
                          <br>
                            <hr>
                            <div class='forimage'>
                           <img src='Uploads/".$pik."' >
                            </div>
                            <div class='forpra'>
                            <center>
                            <h5 class='topttle'>".$ttl."</h5>
                               </center>
                               <br>
                            <hr>
                                <p class='inpara'>".$body."
                                </p>
                            </div>
                            ";
                    }
                }else{
                }
                ?>
                <br><br><br>
            </div>
        </div>
        </div>
    </body>
<?php
include "footer.php";
?>
</html>