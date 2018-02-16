<link href="css/hover.css" rel="stylesheet" media="all">
<style type="text/css">
    @font-face
    {
        font-family:'Raleway-Medium';
        src: url(fonts/Raleway-Medium.ttf) format('truetype');
    }

    #imahe
    {
        max-width:130px;
        margin: -65px 0px 0px 0px

    }

    #accs{
        color: black;
        line-height: 2.1;
        text-shadow: 0.1em 0.1em 0.3em white;
        font-family:'Raleway-Medium';
        font-size: 16px;
        position: relative;
        left: -20px
    }
    #accs:hover{
        color: darkcyan;   
        font-size: 16px;
        text-decoration: none;
    }
    .badge
    {
        background-color: red;
        position:relative;
        top: -2px;
        font-size: 12px;
        padding-bottom: 6px;
        padding-right: 8px
    }
</style>
<a id="accs" class = "hvr-underline-from-left" href="Administrator.php">Home</a><br>

<a id="accs" class = "hvr-underline-from-left" href="notification.php">Transaction
    <?php
    $sql2="SELECT * FROM admin_notification WHERE subscriptiont_type='PREMIUM'";
    $resul=mysqli_query($conn, $sql2);
    $count=mysqli_num_rows($resul);
    if($count>0)
    {
        echo '<span class="badge" >'.$count. '</span>';
    }

    ?>
</a><br>
<a id="accs" class = "hvr-underline-from-left" href="adminViewStories.php">Pending Stories</a><br>
<a id="accs" class = "hvr-underline-from-left" href="AdminContest.php">Manage Contest</a><br>
<a id="accs" class = "hvr-underline-from-left" href="adminManageAcc.php">Manage Account</a><br>
<a id="accs" class = "hvr-underline-from-left" href="logoutadmin.php">Logout</a><br>