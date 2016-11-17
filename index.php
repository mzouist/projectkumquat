<?php 
	session_start();
	ob_start();
	include('_globalkq.php');
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Project Kumquat</title>
	<meta name="description" content="The HTML5 Herald">
	<meta name="author" content="SitePoint">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>

<body class="login-page">
	<header class="main-header">
	    <h1><a href="index.php">Project Kumquat</a></h1>
	    <nav>
		    <ul>
		        <li>
					<!-- <a href="registration.php" class="button btn-default"></a> -->
					<a href="registration.php">
						<button type="button" class="btn btn-info login-btn-pos" id="register">
						Register</button>
					</a>
				</li>
		    </ul>
	  </nav>
	</header>
<?php
//require('_globalkq.php');
 // If form submitted, insert values into the database.
 if (isset($_POST['username']) && !empty($_POST['username']) && !empty($_POST['password'])){
 	//$username = $dom->getElementById('username');
 	//$password = $dom->getElementById('password');
	$username = $_POST['username'];
	$password = $_POST['password'];
	$mode = $_POST['mode'];
	$username = stripslashes($username);
	$username = mysql_real_escape_string($username);
	$password = stripslashes($password);
	$password = mysql_real_escape_string($password);
	$mode = stripslashes($mode);
	$mode = mysql_real_escape_string($mode);
	//Checking is user existing in the database or not
	$query = "SELECT * FROM users WHERE username= '". $username ."' AND password='".md5($password)."'";
	$result = mysql_query($query, $conn) or die("Couldn't perform query $query (".__LINE__."): " . mysql_error() . '.');
	$rows = mysql_num_rows($result);

	if($rows==1)
	{
		$_SESSION['username'] = $username;
		$_SESSION['mode'] = $mode;
		//$action = "/main/dashboard.php";
		header("Location: /main/dashboard.php"); // Redirect user to index.php
		$_SESSION['error_flag'] = "";
	}
	else {
		header("Location: /index.php");
		//$error_flag= "<div class='login'><h3>Username/password is incorrect.</h3><br</div>";
		//$action = "/main/dashboard.php";
		$_SESSION['error_flag'] = "Incorrect login info";
	}
}
?>
	
	<div class='login'>
		<h2>Welcome</h2>
		<form action="" method="post">
			<input name='username' placeholder='Username' type='text' required/>
			<input id='pw' name='password' placeholder='Password' type='password' required/>
			<div class='remember'>
				<input checked='' id='remember' name='remember' type='checkbox'/>
				<label for='remember'></label>Remember me
				
				<div> <?php echo $_SESSION['error_flag']; ?> </div>
			</div>
			<input type='submit' value='Sign in' class="login-buttons"/>
		</form>
		<a class='forgot'>Forgot your password?</a>
	</div>

	<div style="position:relative; top: 50vh;"><?php echo $result; ?></div>

	<!--script src="/js/scripts.js"></script-->
	<script src="/js/jquery-3.1.1.min.js"></script>


</body>
</html>
<?php ob_end_flush(); ?>