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

    <!--<head>-->
    <title>Online Story Maker</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="icon" href="Images/o.png">
    <link rel="stylesheet" href="index.css">
    <style type="text/css">
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
            background-color: #f7f7f7;
            height: auto;
            width: auto;
            padding: 1em;
            box-shadow: 0px 5px 4px 0px #001a09;
        }
        .ins{
            background-color: white;
            height: auto;
            width: 247px;
            margin: 1em;
            display: inline-block;
            padding: 1%;
            box-shadow: 0px 5px 4px 1px #dcdcdc;


        }
        img{
            width:218px;
            height:250px;
            margin-bottom: 4%;

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
        body{
            background-color:#00664d;
        }

    </style>
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

        <br>

        <?php 
        $storyCode ="";
        $result = $conn->query("SELECT * FROM subscrbe WHERE userName LIKE '$usr'");

        /* $res = $array($result);
                $resHolder = count($res);
                for($x = 0 ; $x < $resHolder; $x++){
                    echo $res[$x];
                }*/

        if($result->num_rows > 0)
        {
            while ($row = $result->fetch_array())
            {
                $storyCode = $row['2'];
                echo $storyCode.'<br>';

            }

            echo'	
						<div class="con">
						<h4 style="text-indent:2%;">Subscribe Stories</h4>
						<p style="text-indent:2%;"></p>
						<hr>';
            $result = $conn->query("SELECT * FROM uploads WHERE uploaderid LIKE '$storyCode' ORDER BY date ASC");

            if($result->num_rows > 0)
            {
                while ($row = $result->fetch_array())
                {   
                    $seq = $row['0'];
                    $filename = $row['2'];
                    $title = $row['3'];   
                    $auth = $row['7'];
                    //echo $seq;
                    echo '
					   <div class="ins">
							<form action="Read.php" method="post">
								<input type="text" name="tbseq" value="'.$seq.'" hidden>
									<center>		
										<img src="Uploads/'.$filename.'">
									</center>
									<label>'.$title.'</label>

								<p>By: '.	$auth.'</p> 
									<input class="btnpass" type="submit" value="Read...">
							</form>
						</div>';	
                } 

            }

        }		
        echo'</div><br>';
        ?>
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
