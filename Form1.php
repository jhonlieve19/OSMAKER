<?php
session_start();
error_reporting(0);
include "Connection.php";
$code = "";
if($_POST)
{
    $username =  mysqli_real_escape_string($conn,$_POST['tbuser']);
    $password =  mysqli_real_escape_string($conn,$_POST['tbpassword']);


    $result = $conn->query("SELECT * FROM accounts WHERE Username LIKE '$username' AND Password LIKE '$password'");
    if($result->num_rows > 0)
    {
        while ($row = $result->fetch_assoc())
        {
            $userdb = $row['Username'];
            $passdb = $row['Password'];
            $_SESSION['idno'] = $row['AccNo']; 
        }
        if($username == "Admin"){
            header("location: index.php?message=Invalid User");
        }
        else{
            if($userdb == $username &&  $passdb == $password )
            {
                $_SESSION['Username'] = $username;
            }
            else{
                header("location: index.php?message=Invalid User");
                die();
            }
        }

    }
    else
    {
        header("location: index.php?FailLog=username does not exist or enter your username & password");
        die();
    } 

}
if(isset($_SESSION['Username'])){
    //echo'na set na';
    $usr = $_SESSION['Username'];
}
else{
    header("location:index.php?msg=Login First");
}

if(isset($_POST['search']))
{

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
        <link href="css/hover.css" rel="stylesheet">
        


        <style type="text/css">
            #rght{
                margin-left: 6.7em;

            }

            .con{
                margin-top: 8em;
                background-color: transparent;
                height: auto;
                padding: 1em;
                border: 1px;
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
             .hvr-fade {
                display: inline-block;
                vertical-align: middle;
                -webkit-transform: perspective(1px) translateZ(0);
                transform: perspective(1px) translateZ(0);
                box-shadow: 0 0 1px transparent;
                overflow: hidden;
                -webkit-transition-duration: 0.2s;
                transition-duration: 0.2s;
                -webkit-transition-property: color, background-color;
                transition-property: color, background-color;
            }
            .hvr-fade:hover, .hvr-fade:focus, .hvr-fade:active {
               
                color: white;
            }

            img{
                width:175px;
                height:175px;
                position: relative;
                left: -4px;
                top: -4px;
                margin-bottom: 4%;
                border-radius: 2px

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
            .h-link{
                display: inline-block;
            }
            .h-link:hover{
                color: red;
                text-decoration: none;
            }
            #content
            {
                width: 900px;
                margin: 0 auto;
                font-family:Arial, Helvetica, sans-serif;
            }
            .page
            {
                float: right;
                margin: 0;
                padding: 0;
            }
            .page li
            {
                list-style: none;
                display:inline-block;
            }
            .page li a, .current
            {
                display: block;
                padding: 5px;
                text-decoration: none;
                color: #8A8A8A;
            }
            .current
            {
                font-weight:bold;
                color: #000;
            }
            .button
            {
                padding: 5px 15px;
                text-decoration: none;
                background-color: tan;
                color: green;
                font-size: 13PX;
                border-radius: 3px;
                margin: 0 4PX;
                display: block;
                float: left;
            }
            .button:hover{
                background-color: skyblue;
            }
            .container
            {
                background-color: transparent;

            }
            body
            {
                background: linear-gradient(100deg, #1f9b82, #0f6c98);
            }
            a
            {
                font-family: 'Oxygen';
            }
            .footlogo p
            {
                float: right;
                position: relative;
                left: 70px;
                top: 50px;
                color: white
            }
            .footlogo img
            {
                float: right;
                width: 100px;
                height: 55px;
                position: relative;
                top: 0px;
                left: -30px;
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
                top: -40px;
                text-indent:30px;
            }

            .liness
            {
                border: 0.5px solid white;
                width: 1150px;
                position: relative;
                top: 80px
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
                <br><br>
                &emsp; <a class="h-link" href="Form1.php"><h3 id ="h3prop">All Story</h3></a>&emsp;
                <p style="text-indent:2%;"></p>


                <?php 

                // include "Connection.php";


                $start=0;
                $limit=6;

                if(isset($_GET['id']))
                {
                    $id=$_GET['id'];
                    $start=($id-1)*$limit;
                }





                //GET_AGE FROM DATABASE  
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
                //echo ageCalculator($dob);
                $_age = ageCalculator($dob);
                if($_age <= 18){
                    //echo 'minor';

                    $result = $conn->query("select * from Uploads WHERE exclusive LIKE 'Off' AND status = 'display' ORDER BY seqNo Desc LIMIT $start, $limit");
                    if($result->num_rows > 0)
                    {
                        while ($row = $result->fetch_assoc())
                        {   
                            $seq = $row['seqNo'];
                            $filename = $row['filename'];
                            $title = $row['title'];
                            $auth = $row['author'];

                            echo '

						   <div class = "hvr-grow-shadow" id = "ins" >
								<form action="Read.php?code='.$seq.'" method="post">
									<input type="text" name="tbseq" value="'.$seq.'" hidden>
										<center>		
											<img src="Uploads/'.$filename.'">
										</center>
										<h5>'.$title.'</h5>
								    <h6>by: '.$auth.'</h6> 
										<input id="btnpass" class= "hvr-fade" type="submit" value="Rea">
								</form>
							</div>

						   ';
                        } 
                    }

                    echo "<br><br><br><br><br>";
                    $conn=mysql_connect("localhost","root","");
                    mysql_select_db("storytelleronline",$conn);
                    $res=mysql_num_rows(mysql_query("select * from Uploads"));
                    $total=ceil($res/$limit);

                    $total=ceil($res/$limit);

                    if($id>1)
                    {
                        echo "<a href='?id=".($id-1)."'><button class='button'>PREVIOUS</button></a>";
                    }
                    if($id!=$total)
                    {
                        echo "<a href='?id=".($id+1)."'><button class='button'>NEXT</button></a>";
                    }

                    echo "<ul class='page'>";
                    for($i=1;$i<=$total;$i++)
                    {
                        if($i==$id) { echo "<li class='current'>".$i."</li>"; }

                        else { echo "<li><a href='?id=".$i."'>".$i."</a></li>"; }
                    }
                    echo "</ul>";

                }
                else
                {
                    //echo 'mature';
                    // $result = $conn->query("SELECT * FROM uploads WHERE status = 'display' ORDER BY seqNo Desc");
                    $result = $conn->query("select * from Uploads WHERE status = 'display' ORDER BY seqNo Desc LIMIT $start, $limit");
                    if($result->num_rows > 0)
                    {
                        while ($row = $result->fetch_assoc())
                        {   
                            $seq = $row['seqNo'];
                            $filename = $row['filename'];
                            $title = $row['title'];
                            $auth = $row['author'];

                            echo '

						   <div id="ins" class="hvr-grow-shadow">
								<form action="Read.php?code='.$seq.'" method="post">
									<input type="text" name="tbseq" value="'.$seq.'" hidden>
										<center>		
											<img src="Uploads/'.$filename.'">
										</center>
										<h5>'.$title.'</h5>
								    <h6>by: '.$auth.'</h6>
										<input id="btnpass" class= "hvr-fade" type="submit" value="Read Story">
								</form>
							</div>

						   ';
                        } 
                    }

                    echo "<br><br><br><br><br>";
                    $conn=mysql_connect("localhost","root","");
                    mysql_select_db("storytelleronline",$conn);
                    $res=mysql_num_rows(mysql_query("select * from Uploads"));
                    $total=ceil($res/$limit);

                    $total=ceil($res/$limit);

                    if($id>1)
                    {
                        echo "<a href='?id=".($id-1)."'><button class='button'>PREVIOUS</button></a>";
                    } 
                    if($id!=$total)
                    {
                        echo "<a href='?id=".($id+1)."'><button class='button'>NEXT</button></a>";
                    }

                    echo "<ul class='page'>";
                    for($i=1;$i<=$total;$i++)
                    {
                        if($i==$id) 
                        { 
                            echo "<li class='current'>".$i."</li>"; 
                        }
                        else 
                        { 
                            echo "<li><a href='?id=".$i."'>".$i."</a></li>"; 
                        }
                    }
                    echo "</ul>";
                }


                ?>

                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <div class="liness">
                </div>
                <br>
            </div>
            <br>
            <br>
            <br>
            <br>   

            <div class="footlogo">
                <img src="Images/osmlogo.png">
                <p>© OSM Developers, 2017</p>
            </div>
        </div>

    </body>

</html>