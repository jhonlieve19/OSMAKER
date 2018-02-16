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
    <link rel="icon" href="Images/OSM_Icon.ico">
  
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
       
        .admint{
            margin-left: 270px;
            color: silver;
        }
        .crtleft{
            width: auto;
            height: auto;
            background-color: #E9F2F9;
            padding: 1em;
        }
        table,tr{

        }
        form{
            display: inline-block;
        }
        .da{
            background-color: darkcyan;
            border: none;
            color: white;
            padding: 10px 25px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }
        .vew, .wev{
            background-color: darkcyan;
            border: none;
            color: white;
            padding: 8px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
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

            <h3 class="admint">Admin | Manage Contest</h3>        
        </div>
        <div class="head">
            <div class="left">
                <a href="Administrator.php">
                    <p class="title">
                        <img src="Images/OSM_Icon.ico" style=" max-height: 120px;
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
                
                <script>
                    $(function() {
                        $( "#datepicker" ).datepicker({ minDate: 0 });
                    });
                </script> 
                <div class="crtleft">
                    <form action="adContest.php" method="post">
                        <h4>Set New Contest</h4>
                        <br>
                        <table border="0" height="100px" width="500px"> 
                            <tr>
                                <td>Contest Title: </td>
                                <td><input type="text" name="des" placeholder="Contest Description" size="43px" required></td>
                            </tr>
                            <tr>
                                <td> <p>Start Date: </p></td>
                                <td>
                                    <input value="<?php echo date("Y-m-d"); ?>" type="text" onfocus="(this.type='date');" onblur="(this.type='text')" id="date" min="<?php echo date("Y-m-d"); ?>" name="dstart" required>
                                </td>
                            </tr>
                            <tr>
                                <td><p>End Date: </p></td>
                                <td>
                                    <input value="<?php echo date("Y-m-d"); ?>" type="text" onfocus="(this.type='date');" onblur="(this.type='text')" id="date" min="<?php echo date("Y-m-d"); ?>" name="dend" required>
                                </td>
                            </tr>
                            <tr>
                                <td><p>End Vote: </p></td>
                                <td>
                                    <input value="<?php echo date("Y-m-d"); ?>" type="text" onfocus="(this.type='date');" onblur="(this.type='text')" id="date" min="<?php echo date("Y-m-d"); ?>" name="vote" required>
                                </td>
                            </tr>
                        </table>
                        <?php
                        if(isset($_GET['s'])){
                            $s = $_GET['s'];
                            echo '<p style="color:white; background-color: #ff3834;";><br><b>'.$s.'</b></p>';
                        }
                        ?>
                        <br>
                        <input class="da" type="submit" value=" Set Contest" >
                    </form>
                </div>
                <hr>
                <?php
                if(isset($_GET['del'])){
                    $msgs = $_GET['del'];
                  echo '<h4 style="color:white; background-color: blue; " ><b>&emsp;'.$msgs.'!</b></h4><br>';
                }
                if(isset($_GET['msg'])){
                    $msgs = $_GET['msg'];
                    echo '<h4 style="color:white; background-color: blue; " ><b>&emsp;'.$msgs.'!</b></h4><br>';
                }
                ?>
                <table width="770px" border="0px">
                    <tr>
                        <th>ID</th>
                        <th>Description</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                    </tr>
                    <?php 
                    $result = $conn->query("SELECT * FROM adkontis ORDER BY conID Desc");
                    if($result->num_rows > 0)
                    {
                        while ($row = $result->fetch_array())
                        {   
                            $id = $row['0'];
                            $de = $row['1'];
                            $st = $row['2'];
                            $en = $row['3'];

                            echo "
                       <tr>
                        <td>$id</td>
                        <td>$de</td>
                        <td>$st</td>
                        <td>$en&emsp;</td>
                        <td> 
                        <form action='AdminConView.php?msg='$id' method='get'>
                        <input type='text' name='ID' value='$id' hidden>
                        <input type='submit' name='' value='View'>
                        </form>

                        <form action='deletekontis.php' method='post'>
                        <input type='text' name='ID' value='$id' size='3' hidden>
                        <input type='submit' name='' value='Delete'>
                        </form>
                        </td>
                       </tr>
					   ";
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
