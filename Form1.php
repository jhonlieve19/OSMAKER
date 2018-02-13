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
        <link rel="icon" href="Images/o.png">
        <link rel="stylesheet" href="index.css">
        <style type="text/css">
            #rght{
                margin-left: 6.7em;

            }
            .tb{
                margin: 7px 70px 0px 5px;
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
                padding-bottom: 7em;
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
        <br>
        <div class="container">
            <div class="con">
                <hr>
                &emsp; <a class="h-link" href="Form1.php"><h4 style="text-indent:2%;">Stories</h4></a>&emsp;
                <p style="text-indent:2%;">Just for fun</p>
                <hr>

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

            </div>
            <br>

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
