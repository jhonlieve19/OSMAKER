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
    echo $search = $_POST['search'];
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
    <link rel="icon" href="Images/o.png">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" type="text/css" href="form2style.css">
    <?php
    include "nav.php";
    ?>
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
        <div class="con">

            <hr>
            <?php
            if (isset($_GET['q'])){
                $getQ = $_GET['q'];
                echo '<h2 style="text-indent:2%;">'.$getQ.'</h2>
                <p style="text-indent:2%;">stories</p>';
            }
            ?>
            <?php 
            $result = $conn->query("SELECT * FROM uploads WHERE place LIKE '$getQ' AND status = 'display' ORDER BY date ASC ");
            if($result->num_rows > 0)
            {
                while ($row = $result->fetch_assoc())
                {   
                    $seq = $row['seqNo'];
                    $filename = $row['filename'];
                    $title = $row['title'];
                    $auth = $row['author'];

                    echo '

                    <div class="ins">
                    <form action="Read.php?code='.$seq.'" method="post">
                    <input type="text" name="tbseq" value="'.$seq.'" hidden>
                    <center>		
                    <img src="Uploads/'.$filename.'">
                    </center>
                    <label>'.$title.'</label>

                    <p>By: '.$auth.'</p> 
                    <input class="btnpass" type="submit" value="Read...">
                    </form>
                    </div>

                    ';
                } 
            }
            else
            {
                echo'&emsp;Nothing to show at this moment';
            }					
            ?>

        </div>
        <br>

        <div class="con">
            <hr>

            <?php 
            $result = $conn->query("SELECT * FROM cstories WHERE cCAT LIKE '$getQ' AND Status LIKE 'Write' AND state='display' ORDER BY date Desc");
            if($result->num_rows > 0)
            {
                while ($row = $result->fetch_assoc())
                {   
                    $seq = $row['storySeq'];
                    $filename = $row['iCover'];
                    $title = $row['cTitle'];
                    $auth = $row['cWritter'];
                    $key = $row['storyKey'];

                    echo '

                    <div class="ins">
                    <form action="ReadCollaborative.php" method="post">
                    <input type="text" name="tbKey" value="'.$key.'" hidden>
                    <input type="text" name="tbseq" value="'.$seq.'" hidden>
                    <center>		
                    <img src="Uploads/'.$filename.'">
                    </center>
                    <label>'.$title.'</label>

                    <p>By: '.$auth.'</p> 
                    <input class="btnpass" type="submit" value="Read...">
                    </form>
                    </div>
                    ';
                } 
            }
            else
            {
                    //echo'&emsp;Nothing to show at this moment';
            }					
            ?>



        </div>
        <br>


    </div>
</div>
<br>
<br>
<br>
</body>
<?php
include "footer.php";
?>
</html>
