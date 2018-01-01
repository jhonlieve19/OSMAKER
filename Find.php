<?php
    session_start();
    include "Connection.php";
    if(isset($_SESSION['Username'])){
		
		$username = $_SESSION['Username'];
		$usr = $_SESSION['Username'];
	}
    else
    {
       header("location: index.php?ses=Login first");
        die();
    }

	if(isset($_POST['search']))
	{
        $search = $_POST['search'];
        if(empty($search)){
            header("location:Form1.php");
        }else if($search === ""){
            header("location:Form1.php");
        }
	}
    else{
        
    }
?>
<!DOCTYPE html>
<html>
	
<head>
  <title>Online Story Maker</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
		<link rel="icon" href="Images/o.png">
	<link rel="stylesheet" href="index.css">
	<style type="text/css">
		#rght{
		margin-left: 6.7em;

		}
		.tb{
		 margin: 7px 2px 0px 5px;
		 border-bottom-color: transparent;
		border-style:hidden;
		padding: 3px;
		border-radius: 5px;
		}
		.con{
			background-color: #f7f7f7;
			height: auto;
			width: auto;
			padding: 1em;
		
		}
		.ins{
			background-color: white;
			height: auto;
			width: 247px;
			margin: 1em;
			display: inline-block;
			padding: 1%;
            box-shadow: 0px 5px 4px 1px #dcdcdc;
			
		}
		img{
			width:218px;
			height:250px;
			margin-bottom: 4%;
		}
		.btnpass{
			width: auto;
			height: auto;
			background-color: transparent;
			font-family: Century Gothic;
			color: darkcyan;
			font-size: 15px;
			border-style: none;
			font-weight:100;
		}
          #rght{
                float: right;
                margin-left: 11.6em;
            }   
		
	</style>
	<?php
		include "nav.php";
	?>
	<script>
		$(document).ready(function(){
			$('[data-toggle="popover"]').popover();   
		});
	</script>
	<script>
    	document.onkeydown=function(evt)
		{
			var keyCode = evt ? (evt.which ? evt.which : evt.keyCode) : event.keyCode;
			if(keyCode == 13)
			{
				document.squery.submit();
			}
    	}
	</script>
	<script>
		$(document).ready(function(){
			$("#flip").click(function(){
				$("#panel").slideDown("slow");
			});
		});
	</script>
</head>
<body>
    <br><br><br><br>
	<div class="container">
		<div class="con">
			
			
			<?php
			if (isset($_GET['search'])){
				$qry =  mysqli_real_escape_string($conn,$_GET['search']);
				echo '<h3 style="text-indent:2%;">Results for : "'.$qry.'" </h3>
				<hr>';
			}
			?>
			<?php 
			
				 $result = $conn->query("SELECT * FROM uploads WHERE (title LIKE '%".$qry."%') OR (story LIKE '%".$qry."%') OR (place LIKE '%".$qry."%') OR (author LIKE '%".$qry."%') AND status = 'display' ORDER BY date DESC");
			
				if($result->num_rows > 0)
				{
					while ($row = $result->fetch_assoc())
					{   
						$mtitle = $row['title'];
						$story = $row['story'];
						$title = $row['place'];
						$auth = $row['author'];
						$filename = $row['filename'];
						$seq = $row['seqNo'];
						
					   echo '
					  
					   <div class="ins">
							<form action="Read.php?code='.$seq.'" method="post">
								<input type="text" name="tbseq" value="'.$seq.'" hidden>
									<center>		
										<img src="Uploads/'.$filename.'">
									</center>
									<label>'.$mtitle.'</label>
							
								<p>By: '.$auth.'</p> 
									<input class="btnpass" type="submit" value="Read...">
							</form>
						</div>
						
					   ';
					} 
				}
				else
				{
					echo'<br><br><br>&emsp;&emsp;We couldn`t find a record for <label style="color: red;">'.$qry.'</label> in our catalog.<br><br><br><br><br><br><br><br><br><br><br>';
				}					
			?>
			
		</div>
		<br>
		
		
	</div>
<br><br>

</body>
	<?php
    include "footer.php";
    ?>
</html>
