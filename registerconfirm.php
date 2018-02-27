<?php  

session_start();

include "Connection.php";



if(isset($_POST['btn_login'])){

	$username =  mysqli_real_escape_string($conn,$_POST['tbuser']);
	$password =  mysqli_real_escape_string($conn,$_POST['tbpassword']);

	$sql = "SELECT * FROM accounts where WHERE Username LIKE '$username' AND Password LIKE '$password' and isConfirm=1";

	$result= $conn->query($sql);
	if($result->num_rows > 0){
		echo "
		<form method='post' action='registerconfirm1.php'>
		<input type='text' name='code' placeholder='Enter your code here'>
		<button name='btn_verify'>Enter verification code</button>
		</form>";
	}
	else{
		$result = $conn->query("SELECT * FROM accounts WHERE Username LIKE '$username' AND Password LIKE '$password'");
		if($result->num_rows > 0)
		{

			//header("location:Form1.php?msg=confirmsuccess");
			while ($row = $result->fetch_assoc())
			{
				$_SESSION['Username']=$row['Username'];
				$userdb = $row['Username'];
				$passdb = $row['Password'];
				$_SESSION['idno'] = $row['AccNo']; 
			}
			if($username == "Admin"){

				header("location: index.php?message=Invalid User");
			}
			else{
				if($userdb == $username &&  $passdb == $password )
				{
					$_SESSION['Username'] = $username;

					$sql = "SELECT * FROM account_code where accno = $_SESSION[idno]";

					$result = $conn->query($sql);
					if($result->num_rows > 0){
						header("location:Form1.php?msg=confirmsuccess");
					}

				}
				else{
					header("location: index.php?message=Invalid User");
					die();
				}
			}
		}
		else
		{
			header("location: index.php?FailLog=username does not exist or enter your username & password");
			die();
		} 

	}
	
}

?>