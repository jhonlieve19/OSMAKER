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
            background-color: ;
            float: left;
            padding: 0em 0em 0em 4em;
        }
        .lright{
            width: 1003px;
            height: 900px;
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
            height: auto;
        }
        .inhow{
            height: auto;
        }
        .ge, .sc{
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

            <h3 class="admint">Administrator Dashboard</h3>        
        </div>
        <div class="head">

            <div class="left">
                <a href="Administrator.php">
                    <p class="title">
                        <img src="Images/award%20(1).png" style=" max-height: 120px;
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
                <label>About us!</label>
                <hr>

                <p class="adpe">
                    <?php
                    $result = $conn->query("SELECT * FROM howtobe WHERE category = 'About' ORDER BY date Desc");

                    if($result->num_rows > 0)
                    {
                        while ($row = $result->fetch_array())
                        { 
                            $ttle = $row['1'];
                            $bdy = $row['2'];


                            echo ' <div class="inhow">

                            <h3>'.$ttle.'</h3>
                                    <p>'.$bdy.'</p>.</div>
                                     </p>
            <br>
            <hr>
            <a href="Administrator.php"><button class="ge">Back</button></a>
         <form action="uploadtoHOW.php" method="post">
                <textarea class="toradius" name="tbAbout" rows="6" cols="132" placeholder="Description of about us.." required>'.$bdy.'</textarea>
                <br>
             <input class="sc" type="submit" value="Save Changes">
            </form>
                            ';

                        }
                    }
                    ?>



            </div>

        </div>

    </body>
    <?php
    include "footer.php";
    ?>
</hmtl>
