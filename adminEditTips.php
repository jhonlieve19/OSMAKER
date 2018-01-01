<?php
session_start();
include "Connection.php";

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
            background-color: #9fc2f9;
            float: left;
            padding: 0em 0em 0em 4em;
        }
        .lright{
            width: 1003px;
            height: auto;
            background-color: #B2D1E5;
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
            margin-top: 1em;
            padding-bottom: 13em;
        }
        .inhow{
            width: auto;
            height: auto;
            background-color: white;
            padding: 2em;
            box-shadow: 0px 5px 4px 1px #dcdcdc;

            border-radius: 1em 0em 1em 0em;
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
                <div class="how">
                    <h3>Tips</h3>
                    <?php
                    
                    
                    if($_POST){
                        $id = $_POST['id'];
                        $ttl = $_POST['ttl'];
                        $bdyyy = $_POST["tbparagraph"];}
                    else{header("location:Administrator.php");} 
                    $result = $conn->query("SELECT * FROM howtobe WHERE howId='$id' ORDER BY date Desc");

                    if($result->num_rows > 0)
                    {
                        while ($row = $result->fetch_array())
                        { 
                            $ttl = $row['1'];
                            $bdyyy = $row['2'];
                            $id = $row['0'];
                            
                             echo '
                             <p>'.$bdyyy.'</p><br>
                            <form action="EditTips.php" method="post">
                                 <input type="text" name="id" value="'.$id.'" size="3" hidden>
                                <label>Tip Title: </label> &emsp; <br><input type="text" name="tbtitle" value="'.$ttl.'" size="50" required>
                                <textarea class="toradius" name="tbtips" rows="6" cols="128" required>'.$bdyyy.'</textarea>
                                <br>
                                <input type="submit" value="Save Changes">
                            </form>
                            ';
                        }
                    }
                        
                        
                        
                    
                   ?>
                    <br>
                </div>
            </div>
        </div>

        </div>

    </body>
<?php
include "footer.php";
?>
</hmtl>
