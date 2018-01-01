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

        #rght{f
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
        form,.btnpass{
          display: inline-block;
        }
        .link{
            display: inline-block;
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

            <h3 class="admint">Welcome Administrator / Dashboard</h3>        
        </div>
        <div class="head">

            <div class="left">
                <a href="Administrator.php">
                    <p class="title">
                        <img src="Images/OurStories.png" style=" max-height: 120px;
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
                        

                        <?php 
                        if(isset($_SESSION['Username'])){
                            $usr = $_SESSION['Username'];
                        }
                         if(isset($_GET['code']))
                            $code = $_GET['code'];
                        


                        $result = $conn->query("SELECT * FROM cstories WHERE storySeq = '$code'");

                        if($result->num_rows > 0)
                        {
                            while ($row = $result->fetch_assoc())
                            {   
                               $filename = $row['iCover'];
                                $title = $row['cTitle'];
                                $auth = $row['cWritter'];
                                $story = $row['colBody'];
                                $place = $row['cCat'];
                                $date = $row['Date'];
                                $seq = $row['storySeq'];

                                echo '
					   <div class="ins">
                       <h5 class="link"><b><a href="adminViewStories.php">Pending Stories</a></b></h5> &emsp; | &emsp;
                            <h5 class="link"><b>Category: &nbsp; '.$place.'</b></h5> &emsp;  | &emsp;
                            <h5 class="link"><b>Submit date: &nbsp;' .$date.'</b></h5> &emsp; 
                            
                            <hr>
							<form action="adminUpcoll.php" method="post">
								<input type="text" name="id" value="'.$seq.'" hidden>
									<center>		
										<img src="Uploads/'.$filename.'" style="width:200px; height:200px;">
									</center>
                                    <br>
									<label>'.$title.'</label>

								<p>By: '.$auth.'</p> 
								<p>By: '.$story.'</p> 
                                <br>
								
                                <br>
									<input class="btnpass" type="submit" value="Accept">
							</form>
                            <form action="adminDelcoll.php" method="post">
								<input type="text" name="id" value="'.$seq.'" hidden>
								<input class="btnpass" type="submit" value="Delete">
							</form>
						</div>

					   ';
                            } 
                        }
                        else{

                            echo '<label>No stories yet</label>';
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
