<?php
session_start();
include "Connection.php";

$code = "";

if($_POST)
{
    $username = $_POST['user'];
    $password = $_POST['pass'];


    $result = $conn->query("SELECT Username,Password FROM accounts WHERE Username LIKE '$username' AND Password LIKE '$password'");
    if($result->num_rows > 0)
    {
        while ($row = $result->fetch_assoc())
        {
            $userdb = $row['Username'];
            $passdb = $row['Password'];
        }
        if($userdb == "Admin" &&  $passdb == $password )
        {
            $_SESSION['adminuser'] = $username;

        }
        else{
            header("location: OSTadmin.php?msg=Invalid User");
            die();
        }
    }
    else
    {
        header("location: OSTadmin.php?msg=username does not exist or enter your username & password");
        die();
    } 

}
if(isset($_SESSION['adminuser'])){
    //echo'na set na';
    $usr = $_SESSION['adminuser'];
}
else{
    header("location:OSTadmin.php?msg=Login First!");
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
        .sv{
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
        .et{
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
        .dt{
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
        .eau{
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

            <h3 class="admint">Admin | Home - Dashboard</h3>        
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


                <label>ABOUT US:</label>


                <?php
                $result = $conn->query("SELECT * FROM howtobe WHERE category = 'About' ORDER BY date Desc");

                if($result->num_rows > 0)
                {
                    while ($row = $result->fetch_array())
                    { 
                        $ttle = $row['1'];
                        $bdy = $row['2'];


                        echo ' 
                                    <p class="adpe">'.$bdy.'</p>
                            ';

                    }
                }
                ?>

                <br>

                <a href="Admnistrator.php" ><button class="eau">Edit About Us</button></a>

                <hr>

                <div class="how">

                    <label>GIVE SOME TIPS ON HOW TO BE A GOOD STORY MAKER</label>

                    <form action="uploadtoHOW.php" method="post">
                        <label>Tip Header: </label> &emsp; <input type="text" name="tbtitle" placeholder="Title" size="114" required>
                        <textarea class="toradius" name="tbtips" rows="6" cols="128" placeholder="Tips here..." required></textarea>
                        <br>
                        <input class="sv" type="submit" value="Save">
                    </form>

                    <?php
                    $result = $conn->query("SELECT * FROM howtobe WHERE category = 'Tips' ORDER BY date Desc");

                    if($result->num_rows > 0)
                    {
                        while ($row = $result->fetch_array())
                        { 
                            $ttle = $row['1'];
                            $bdy = $row['2'];
                            $tipId = $row['0'];


                            echo ' <div class="inhow">

                            <h3>'.$ttle.'</h3>
                                    <p>'.$bdy.'</p>
                                    <form action="deleteTips.php" method="post">
                                    <input type="text" name="id" value="'.$tipId.'" size="3" hidden>
                                    <input type="Submit" class="dt" value="Delete tip">   
                                    </form>
                                     <form action="adminEditTips.php" method="post">
                                    <input type="text" name="id" value="'.$tipId.'" size="3" hidden >
                                    <input type="text" name="ttl" value="'.$ttle.'" size="3" hidden >
                                    <input type="text" name="tbparagraph" value="'.$bdy.'" size="3" hidden >
                                    <input type="Submit" class="et" value="Edit tip">   
                                    </form>

                                    </div><br><br><br>

                            ';


                        }
                    }
                    ?>

                </div>


            </div>

        </div>

        </div>

    </body>
<?php
include "footer.php";
?>
</hmtl>
