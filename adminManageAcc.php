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
    <link rel="icon" href="Images/osmicon.ico">

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
            padding: 5em;
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
        input{
            margin: 4px;
        }
        .idiot{
            background-color: darkcyan;
            border: none;
            color: white;
            padding: 3px 25px;
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

            <h3 class="admint">Admin | Manage Account</h3>        
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
                <form action="" method="get">
                    <label>SEARCH USERNAME: </label>
                    <input type="text" name="username" size="40" autofocus>
                    <input class="idiot" type="submit" value="Search"> 
                </form>

                <hr>

                <table border="0px" width="380px">
                    <?php
                    if(isset($_GET['username']))
                    {
                        $username = $_GET['username'];

                        $result = $conn->query("SELECT Username,Password FROM accounts WHERE Username = '$username' ORDER BY Username ASC");
                        if($result->num_rows > 0)
                        {
                            while($row = $result->fetch_array()){
                                $user = $row['0'];
                                $pass = $row['1'];
                                echo '
                            <label>Account of:</label> <h3>'.$user.'</h3>
                            <br>
                            <form action="ResetAccount.php" method="post">
                            <tr>
                                <td>
                                    Username:
                                </td>
                                <td>
                                    &nbsp;' .$user.'
                                    <input type="text" name="tbuser" value="'.$user.'" hidden>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Reset Password: 
                                </td> 
                                <td>
                                    <input type="text" name="tbpass1" value="'.$pass.'">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Confirm Password:
                                </td>
                                <td>
                                    <input type="text" name="tbpass2" value="'.$pass.'">
                                </td>
                            </tr>
                            <tr>
                            <td></td>
                             <td>
                                 <input type="submit" value="Reset">
                             </td>

                            </tr>

                            </form>


                            ';
                            }
                        }else{
                            echo '<h4 style="color:red;">Username not found!</h4>';
                        }

                    }
                    if(isset($_GET['msg'])){
                        $msg = $_GET['msg'];
                        echo '
               <h4 style="color:red;">Account Reset!</h4>';
                    } 

                    ?>

                </table>

                <hr>
                <br>
                <br>
                <table width="1000px">
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Username</th>
                    <th>E-mail</th>

                    <?php
                    $result = $conn->query("SELECT * FROM accounts ORDER BY Username ASC");
                    if($result->num_rows > 0)
                    {
                        while ($row = $result->fetch_array())
                        {   
                            $fname = $row['1'];
                            $lname = $row['2'];
                            $email = $row['6'];
                            $user = $row['4'];

                            echo '
                            <tr>
                            <td>'.$fname.'</td>
                            <td>'.$lname.'</td>
                            <td>'.$user.'</td>
                            <td>'.$email.'</td>
                            </tr>


                            ';
                        } 
                    }
                    else{
                        echo '<br><br><br><br><br><br>';
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
