<?php
session_start();
include "Connection.php";
if(isset($_SESSION['Username'])){}
    else
    {
        header("location: index.php?ses=Login first");
        die();
    }

    if(isset($_POST['search']))
    {
        echo $search = $_POST['search'];
    }


    if(isset($_GET['code'])){

        $seqNo = $_GET['code'];
    //echo $seqNo;
    }
    $result = $conn->query("SELECT * FROM uploads WHERE seqNo LIKE '$seqNo'");
    if($result->num_rows > 0)
    {
    }
    else{
        header("location:Form1.php");
    }
    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Online Story Maker</title>

        <script src="js/jquery.min.js"></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <link rel="icon" href="Images/o.png">
        <link rel="stylesheet" href="index.css">
        <link rel="stylesheet" type="text/css" href="readstyle.css">
        <?php
        include "nav2.php";
        ?>
        <script>
            $(document).ready(function(){
                $('[data-toggle="popover"]').popover();   
            });
        </script>
    </head>
    <body>
        <div class="container">
            <div class="con">
                <?php 
                $seqNo = "";
                if(isset($_GET['code'])){

                    $seqNo = $_GET['code'];
                }
                if(isset($_POST['tbseq']))
                    $seqNo = $_POST['tbseq'];
                //echo $seqNo;
                $result = $conn->query("SELECT * FROM uploads WHERE seqNo LIKE '$seqNo'");
                if($result->num_rows > 0)
                {
                    while ($row = $result->fetch_assoc())
                    {   
                        $seq = $row['seqNo'];
                        $writer = $row['uploaderid'];
                        $filename = $row['filename'];
                        $title = $row['title'];
                        $auth = $row['author'];
                        $story = $row['story'];
                        $place = $row['place'];

                    }
                    $result = $conn->query("SELECT * FROM likes WHERE Code LIKE '$seq' AND userName LIKE '$user' ");
                    if($result->num_rows > 0)
                    {
                        while($row = $result->fetch_assoc())
                        {
                            $stat = "Unlike";
                        }
                    }
                    else{
                        $stat = "Like";
                    }

                    $result = $conn->query("SELECT * FROM subscrbe WHERE Uploadercode LIKE '$writer' AND userName LIKE '$user' ");
                    if($result->num_rows > 0)
                    {
                        while($row = $result->fetch_assoc())
                        {
                            $scrb = "Unsubscribe";
                        }
                    }
                    else{
                        $scrb = "Subscribe";
                    }

                    $result = $conn->query("SELECT COUNT(Votes) FROM likes WHERE Code LIKE '$seq'");
                    if($result->num_rows > 0)
                    {
                        while($row = $result->fetch_array())
                        {
                            $vote = $row['0'];
                        }
                    }
                    else{
                        $vote = "0";
                    }
                    echo '
                    <h3 class="color">&emsp; Category: '.$place.'</h3>
                    <hr>
                    <div class="ins">
                    <center>		
                    <img class="" src="Uploads/'.$filename.'">
                    </center><hr>
                    <p class="he">&nbsp; By: '.$auth.'</p>
                    <p>&nbsp; '.$vote.' Likes</p>
                    <center>
                    <table>
                    <ul>
                    <tr>
                    <form action="Like.php" method="post">
                    <input type="text" name="tbUser" value="'.$user.'" size="4" hidden>
                    <input type="text" name="tbCode" value="'.$seq.'" size="4" hidden>
                    <input type="submit" value="'.$stat.'" class="btns">
                    </form>&nbsp;
                    </tr>
                    <tr>

                    <form action="Subscribe.php" method="post">
                    <input type="text" name="tbUser" value="'.$user.'" size="1" hidden>
                    <input type="text" name="tbCode" value="'.$seq.'" size="1" hidden>
                    <input type="text" name="tbwriter" value="'.$writer.'" size="1" hidden>
                    <input type="submit" value="'.$scrb.'" class="btnss">
                    </form>
                    </tr>
                    <ul>
                    </table>
                    <a href="https://twitter.com/intent/tweet?button_hashtag=Ourstory" class="twitter-hashtag-button" data-show-count="false">Tweet #Storya</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                    </center>
                    <br>
                    </div>

                    <div class="right">
                    <h1 class="tit">'.$title.'</h1>
                    <p class="he">&nbsp;By: '.$auth.'</p>
                    <hr>
                    <a href="Form1.php">More Stories</a> &emsp;
                    &emsp; | &emsp;
                    <a href="Profile.php">My Stories</a>';

                    $sql1 = "select * from uploads where isPaid=1 and seqNo=$_GET[code]";
                    $result= $conn->query($sql1);
                    if($result->num_rows > 0){
                       $sql = "select * from book_payment where payerid=$_SESSION[idno] and seqNo=$_GET[code]";
                       $result=$conn->query($sql);
                       if($result->num_rows < 1){
                        echo '| &emsp;
                        <a href="book_payment.php?seqNo='.$seqNo.'">Pay To Read Whole Story</a> ';  
                    }
                }
                echo '
                <hr>
                <div class="content">
                <textarea readonly class="toradius" name="tbBdy" rows="40"  cols="104">';
                $sql = "select * from uploads where isPaid=1 and seqNo=$_GET[code]";

                $result= $conn->query($sql);
                if($result->num_rows >0 ){
                    $sql = "select * from book_payment where payerid=$_SESSION[idno] and seqNo=$_GET[code]";
                    $result=$conn->query($sql);
                    if($result->num_rows > 0){
                        echo $story;
                    }
                    else{

                        echo substr($story, 0,2)."....";         
                    }
                }
                else{
                    echo $story;
                }

                echo '    
                </textarea>
                <hr/>
                </div>
                </form>
                <br><br>
                <center>
                <a class="butoy" href="Form1.php">Click here for more stories</a>
                </center>
                </div><br><br>	
                ';
            }
            else
            {

            }					
            ?>
            <br><br><br><br><br><br>
        </div>
        <br>
    </div>

</body>
<?php
include "footer.php";
?>
</html>
