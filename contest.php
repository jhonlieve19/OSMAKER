<!DOCTYPE html>
<?php
include "nav2.php";
?>
<html>
    <head>
        
        <style type="text/css">
            .contain{
                padding: 3em 7em 0em 7em;
                width: auto;
                height: 900px;
                background-color: white;
            }
            .uperttle{
                color: gray;
                text-decoration-style:solid;
                font-weight: 400;

            }
            .sud{
                padding: 1em 1em 3em 1em;
                width: auto;
                height: 600px;
                background-color: ;

            }
            .upper{
                width: auto;
                height: auto;
                background-color: whitesmoke;
                padding: 1em;

            }
            .enter{
                width: 344px;
                height: auto;
                background-color: white;
                margin: 1em;
                display: inline-block;
                padding: 2em;
                box-shadow: 0em 0.2em 0.1em 0em gray;
                padding-bottom: 5em;
            }
            .btnenter{

                border-color: orange;
                border-style:solid;
                background-color: transparent;
                width: 270px;
                height: 40px;
                color: gray;



            }
            .btnenter:hover{
                background-color: orange;
                color: white
            }
            .btnwin{

                border-color: blue;
                border-style:solid;
                background-color: transparent;
                width: 270px;
                height: 40px;
                color: gray;



            }
            .btnwin:hover{
                background-color: blue;
                color: white
            }
             .done{
                width: 344px;
                height: auto;
                background-color: whitesmoke;
                margin: 1em;
                display: inline-block;
                padding: 2em;
                box-shadow: 0em 0.2em 0.1em 0em gray;
                padding-bottom: 5em;
            }
            .le{
                font-family: century gothic;
                font-size: 30px;
            }
        </style>
    </head>
    <body>
        <div class="contain">
            <div class="upper">
                <h2 class="uperttle">Create your own story and win</h2>
                <p>Write a stories to win. Writing gives exposure and recognition to all writers who enter.</p>
                <p>Aspiring writers throughout the world are invited to enter this prestigious writing competition.</p>
                <br>
            </div>
            <div class="sud">

                <?php 
                $datenow = date("Y-m-d");
                $result = $conn->query("SELECT * FROM adkontis WHERE startDate < now() ORDER BY conID Desc ");
                if($result->num_rows > 0)
                {
                    while ($row = $result->fetch_array())
                    {   
                        $id = $row['0'];
                        $de = $row['1'];
                        $st = $row['2'];
                        $en = $row['3'];
                        $enV = $row['4'];
                        if($datenow < $enV)
                        {
                            echo '
					     <div class="enter">

                            <label class="le">'.$de.'</label>
                            <p>WELCOME TO THIS WRITING CONTEST, JOIN NOW!</p>
                          <hr>
                           <br>
                           <form action="ViewEntries.php?ConID='.$id.'" method="post">
                            <input type="text" value="'.$id.'" name="ConID" size="2" hidden>
                            <center>
                            <input class="btnenter" type="submit" value="E N T E R">
                            </center>
                           </form>
                          </div>';

                        }
                        else{
                            
                            echo '
					     <div class="done">

                            <h4>'.$de.'</h4>
                            <p>This contest is closed</p>
                          <hr>
                           <br>
                           <form action="ViewEntries.php?ConID='.$id.'" method="post">
                            <input type="text" value="'.$id.'" name="ConID" size="2" hidden>
                            <center>
                            <input class="btnwin" type="submit" value="V I E W &nbsp; W I N N E R">
                            </center>
                            
                           </form>
                          </div>';

                        }
                    }



                 

                }
                else
                {
                    echo'No Contest yet <br>';
                }					
                ?>



            </div>
        </div>



    </body>

    <?php
    include "footer.php";
    ?>
</html>