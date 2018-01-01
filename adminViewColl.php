<?php
session_start();
include "Connection.php";
if(isset($_SESSION['adminuser'])){
    //echo'na set na';
    $usr = $_SESSION['adminuser'];
}
else
{
    header("location:OSTadmin.php");
}

?>
<hmtl>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="icon" href="Images/o.png">
    <link rel="stylesheet" href="index.css">
    <style type="text/css">
        #rght{
            margin-left: 30em;
        }
        .head{
            background-color: white;
            width: auto;
            height: auto;
            padding: 0em 2em 0em 2em;
        }
        .in{
            width: auto;
            height: auto;
            background-color:dimgray;
            padding: 1em 3em 1em 3em;
            color: #6FB7E9;
        }
        #rght{
            margin-left: 855px;

        }

        #rght{
            padding-left:;
        }
        .btn{

        }
        .nv{
            padding: 0.1px;
        }
        .left{
            width: 290px;
            height: 600px;
            float: left;
            padding: 0em 0em 0em 4em;
        }
        .lright{
            width: 1003px;
            height: auto;
            background-color: ghostwhite;
            margin-left: 290px;
            padding: 2em 0.7em 0em 0.7em;
        }
        .left,.lrigh{
            display: inline-block;

        }
        .accs{
            color: black;
            line-height: 2.1;
            text-shadow: 0.1em 0.1em 0.3em white;
        }
        .accs:hover{
            color: darkred;
            font-weight:bolder;
            font-size: 15px;
            text-transform: capitalize;
            text-decoration: none;
        }
        .admint{
            margin-left: 270px;
            color: silver;
        }
        .adpe{
            text-indent: 10%;
        }
        .how{
            width: auto;
            height: auto;
            background-color: ;
            padding: 2em 0.9em 1em 0.9em;
            border-radius: 0.5em 1em 0.2em 1em;
            margin-top: 4em;
        }
        .inhow{
            width: auto;
            height: auto;
            background-color: white;
            padding: 2em;
            box-shadow: 0px 5px 4px 1px #dcdcdc;

            border-radius: 1em 0em 1em 0em;
        }
        .concon{
            background-color: ghostwhite;
            padding: 1em;
            width: auto;
            height: auto;

        }
        .ins{
            background-color: white;
            height: auto;
            width: 220px;
            margin: 11px;
            display: inline-block;
            padding: 1%;
            box-shadow: 0px 5px 4px 1px #dcdcdc;
        }

    </style>
    <head>
        <script>
            $(document).ready(function(){
                $('[data-toggle="popover"]').popover();   
            });
        </script>
    </head>
    <body>
        <div class="in">

            <h3 class="admint">Admin | Collaborative Stories</h3>        
        </div>
        <div class="head">

            <div class="left">
                <a href="Administrator.php">
                    <p class="title">
                        <img src="Images/hedd.png" style=" max-height: 120px;
                                                                max-width:200px;
                                                                margin-top: -59px;
                                                                margin-left: -55px;" />
                    </p>
                </a>
                <br>
                <?php
                include "adminsublinks.php";
                ?>
            </div>
            <div class="lright">
                <div class="gen">
                    <div class="concon">
                        <h5><b>Pending stories</b></h5>
                        <hr>

                        <?php 
                        if(isset($_SESSION['Username'])){
                            $usr = $_SESSION['Username'];
                        }


                        $result = $conn->query("SELECT * FROM cstories WHERE state = 'notdisplay' AND Status = 'Write'  ORDER BY date Desc");

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
							<form action="adminReadColl.php?code='.$seq.'" method="post">
								<input type="text" name="tbseq" value="'.$seq.'" hidden>
									<center>		
										<img src="Uploads/'.$filename.'" style="width:200px; height:200px;">
									</center>
									<label>'.$title.'</label>

								<p>By: '.$auth.'</p> 
									<input class="btnpass" type="submit" value="View...">
							</form>
						</div>

					   ';
                            } 
                        }
                        else{

                            echo '<label>No stories at this moment</label><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
                        }					
                        ?>
                    </div>
                </div>



            </div>


        </div>

        </div>

    </div>
<br>
<br>
<br>
<br>

</body>
<?php
include "footer.php";
?>
</hmtl>
