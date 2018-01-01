<!DOCTYPE html>
<?php
session_start();
include "Connection.php";
if(isset($_SESSION['Username']))
{
    $username = $_SESSION['Username'];
    // echo $username;
}

?>
<?php
if(isset($_REQUEST['ConID'])){
    $conID = $_REQUEST['ConID'];
    if($conID == 0){
        header("location:Contest.php");

    }
}
else{
    header("location:Contest.php");
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
                padding:  2em 1.5em 3em 1.5em;

            }
            .upper{
                width: auto;
                height: auto;
                background-color: whitesmoke;
                padding: 1em;
                border-radius: 10px 50px 1px 1px;

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
            .encon{
                width: 260px;
                height: auto;
                background-color: white;
                display: inline-block;
                padding: 1em;
                margin: 0.5em;
                box-shadow: 0px 5px 4px 1px #dcdcdc;
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
            img{
                width:218px;
                height:210px;
                margin-bottom: 4%;

            }
            .congr{
                background-color: orange;
                color: white;
            }
            .join{
                width: 120px;
                height: 60px;
                border-style: none;
                background-color: darkcyan;
                color: white;
                font-size: 20px;
                font-family: Century Gothic;
                border-radius: 4px;
            }
            .join:hover{
                background-color: skyblue;
                border-style: ridge;
                border-color: orange;
                color: orange;
            }


        </style>
    </head>
    <body>
        <div class="contain">
            <div class="upper">
                <?php
                $enDate = "";

                $datenow = date("Y-m-d");
                if(isset($_REQUEST['ConID'])){
                    $conID = $_REQUEST['ConID'];
                    echo '<input type="text" name="tbConID" value='.$conID.' hidden size="1"> ';
                    $result = $conn->query("SELECT * FROM adkontis WHERE conID = '$conID'");
                    if($result->num_rows > 0)
                    {
                        while ($row = $result->fetch_assoc())
                        {
                            $des = $row['conDescrptn'];
                            $enDate = $row['endDate'];
                            $endVote = $row['endVote'];
                        }
                        echo"
                        <center>
                             <h2>$des</h2>
                               <p>Write a stories to win. Writing gives exposure </p>
                                 <p>and recognition to all writers who will join.</p>
                                   </center>
                                  <hr>
                                  <button><a href='Contest.php'><< back</a></button>

                                <form action='WrtContest.php?' method='post' >
                                <input type='text' name='ConID' value='$conID' hidden size='1'>";
                    }

                    if($enDate > $datenow){
                        echo '<br> <center><input type="submit" class="join" value="Join Now"></center></form>';
                    }
                    else
                    {
                        $result = $conn->query("SELECT * FROM upldcontest WHERE entryID = '$conID'");
                        if($result->num_rows > 0)
                        {
                            $datenow = date("Y-m-d");
                            $endofVotingg = "";
                            $result = $conn->query("SELECT * FROM adkontis WHERE conID = '$conID'");
                            if($result->num_rows > 0)
                            {
                                while ($row = $result->fetch_assoc())
                                {
                                    $endofVotingg = $row['endVote'];
                                }
                                if($datenow < $endofVotingg){
                                    echo 'Voting is now going on';
                                }
                                else{
                                    echo '<br><center><h2 class="congr"> Congratulations we have a winner for this contest </h2></center>';
                                }

                            }


                        }
                        else{
                            echo 'No Entries to vote';
                        }
                        echo'</form>';
                    }
                }

                else{
                    header("location:Contest.php");
                } 
                ?>
            </div>
            <div class="winner">


                <?php
                $endofVoting = "";
                $datenow = date("Y-m-d");
                $result = $conn->query("SELECT * FROM adkontis WHERE conID = '$conID'");
                if($result->num_rows > 0)
                {
                    while ($row = $result->fetch_assoc())
                    {
                        $enDate = $row['endDate'];
                        $endofVoting = $row['endVote'];
                    }
                }
                if($endofVoting < $datenow){
                    $result = $conn->query(" select count(v.code),u.title,u.date,u.uploader,u.filename,u.upID from voting v,upldcontest u where u.upID=v.code && entryID='$conID' group by v.code ORDER BY count(v.code) DESC LIMIT 1");
                    if($result->num_rows > 0)
                    {
                        while ($row = $result->fetch_array())
                        {
                            $Vote = $row['0'];
                            $ttlee = $row['1'];
                            $upID = $row['5'];
                            $uploader = $row['3'];
                            $file = $row['4'];
                        }
                        echo'<style type="text/css">
                        .winner{
                            width: auto;
                            height: auto;
                            background-color:#eff2f7;
                            padding: 1em;
                            padding-bottom: 17em;
                        }
                        .winto{
                            display: inline-block;
                            float: left;
                            padding: 0em 1em 0em 2.5em;
                        }
                        .c1{
                            padding-left: 5px;
                        }

                        </style>';
                        echo '
                        <div class="winto">
                            <img src="Uploads/'.$file.'">
                        </div>
                        <div class="winto">
                            <h4>The Winner of '.$des.'</h4>
                            <hr>
                            <h2 class="c1">'.$ttlee.'</h2>
                            <h4 class="c1">by: '.$uploader.'</h4>
                            <p class="c1"> Votes: '.$Vote.'</p>
                        <form action="viewandRead.php?tbconID='.$upID.'" method="post" >
                             <input class="btnpass" type="submit" value="Read...">
                        </form>
                        </div>';
                    }
                }
                else {
                }
                ?>

            </div>
            <div class="sud">
                <hr>
                <?php
                $result = $conn->query("SELECT * FROM upldcontest WHERE entryID = '$conID' ");

                if($result->num_rows > 0)
                {
                    while ($row = $result->fetch_array())
                    {   
                        $id = $row['0'];
                        $entID = $row['1'];
                        $filename = $row['2'];
                        $title = $row['3'];
                        $upl = $row['6'];
                        echo '

                                   <div class="encon">
                                        <form action="viewandRead.php?tbconID='.$id.'" method="post" >
                                            <input type="text" name="tbconID" value="'.$id.'" hidden>
                                                <center>		
                                                    <img src="Uploads/'.$filename.'">
                                                </center>
                                                <label>'.$title.'</label>
                                            <p>By: '.$upl.'</p> 
                                                <input class="btnpass" type="submit" value="Read...">
                                        </form>
                                    </div>

                                   ';
                    } 
                }
                ?>
                <br><br><br>

            </div>
        </div>
        </div>
    </body>
</html>