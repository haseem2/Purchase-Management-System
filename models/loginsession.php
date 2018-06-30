<?php
session_start();

if (isset($_SESSION['uid'])){
	header("location:../admin/home.php");
	exit;
}
include("../config/dbconn.php");

	$user_name = mysqli_real_escape_string($conn, $_POST["username"]);
	$pass_word = mysqli_real_escape_string($conn, $_POST["password"]);

	$user_name = trim($user_name);
	$pass_word = trim($pass_word);
	$user_name = strtolower ($user_name );

	$res = mysqli_query($conn, "SELECT uid,firstname,lastname,usertype, password , email, vemail FROM user WHERE username = '$user_name'");

	$row = mysqli_fetch_array($res);
	
	if($row['password'] == md5($pass_word) && $row['vemail'] == "verified" ){// when user successfully login
		
		//assign session and needed variable
		$_SESSION['uid'] = $row['uid'];
		$uid = $row['uid'];
		$_SESSION['firstname'] = $row['firstname'];
		$_SESSION['lastname'] = $row['lastname'];
		$_SESSION['usertype'] = $row['usertype'];
		
		/* if ($_SESSION['usertype'] == "AD"){ // Admin
			header("location:../view/purchase.php");
		}

		else if ($_SESSION['usertype'] == "LA"){ // Labour
			header("location:../admin/home.php");
		}
		else{ // Viewer
			header("location:../admin/home.php");	
		} */
		header("location:../view/purchase.php");
	}
	else{
		?>
		<script type="text/javascript">

			alert("Your password or username is wrong")
			window.location.href = "../admin/index.php";
		</script>
		<?php
	}
?>
