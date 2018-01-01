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
            height: 1000px;
            background-color: ghostwhite;
            margin-left: 290px;
            padding: 2em;
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
            color:darkred;
            font-weight:bolder;
            font-size: 15px;
            text-transform: capitalize;
            text-decoration: none;
        }
        .admint{
            margin-left: 270px;
        }

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
            <h3 class="admint">Administrator View Entries | Votes</h3>        
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
                <?php
                if(isset($_REQUEST['ID'])){
                    $r = $_REQUEST['ID'];
                    $result = $conn->query("SELECT COUNT(entryID) FROM upldcontest WHERE entryID ='$r' ORDER BY date DESC");
                    if($result->num_rows > 0)
                    {
                        while($row = $result->fetch_array()){
                            $rex = $row['0'];
                            echo '<h3>'.$rex .' Entries </h3>';
                        }
                    }
                }
                 if(isset($_REQUEST['ID'])){
                    $r = $_REQUEST['ID'];
                    $result = $conn->query("SELECT endVote FROM adkontis WHERE conID ='$r'");
                    if($result->num_rows > 0)
                    {
                        while($row = $result->fetch_array()){
                            $rr = $row['0'];
                            echo '<h4> End of Voting: '.$rr .'</h4>';
                        }
                    }
                }
                ?>
                <hr>
                <table width="770px" border="1px">
                    <tr>
                        <th>Story Number</th>
                        <th>Title of Story</th>
                        <th>Date Uploaded</th>
                        <th>No of votes</th>
                    </tr>
                    <?php 

                    $count = 0;
                    if(isset($_REQUEST['ID'])){
                        $r = $_REQUEST['ID'];
                    }
                
                    $result = $conn->query("select count(v.code),u.title,u.date from voting v,upldcontest u where u.upID=v.code && entryID='$r' group by v.code ");
                    if($result->num_rows > 0)
                    {
                        while ($row = $result->fetch_array())
                        {   

                            $count++;
                            $de = $row['1'];
                            $date = $row['2'];
                            $vovo=$row['0'];

                            echo "
                               <tr>
                                <td>$count</td>
                                <td>$de</td>
                                <td>$date</td>
                                <td>$vovo</td>
                               </tr>
                               ";

                        } 
                    }
                    else
                    {
                        echo'';
                    }	

                    ?>

                    <?php 

                    $count = 0;
                    if(isset($_REQUEST['ID'])){
                        $r = $_REQUEST['ID'];
                    }
                    $result = $conn->query("SELECT * FROM voting WHERE  conID = '$r'");
                    if($result->num_rows > 0)
                    {
                        while ($row = $result->fetch_array())
                        {   

                        } 



                    }
                    else
                    {
                        echo'';
                    }					
                    ?>
                </table>
            </div>
        </div>  
    </body>
    <?php
    include "footer.php";
    ?>
</hmtl>
