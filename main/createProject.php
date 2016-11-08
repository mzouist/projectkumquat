<?php 
	include('../_globalkq.php');
?>
<!doctype html>

<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Project Manager | Registration</title>
	<meta name="description" content="The HTML5 Herald">
	<meta name="author" content="SitePoint">
	<link href="/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="/css/custom.css">
</head>
<body>


<?php
 require('../_globalkq.php');
 // If form submitted, insert values into the database.
 if (isset($_POST['username'])){
 $firstname = $_POST['firstname'];
 $lastname = $_POST['lastname'];
 $username = $_POST['username'];
 $password = $_POST['password'];
 $mode = $_POST['mode'];

 
 $firstname = stripslashes($firstname);
 $lastname = mysql_real_escape_string($lastname);
 $username = stripslashes($username);
 $username = mysql_real_escape_string($username);
 $password = stripslashes($password);
 $password = mysql_real_escape_string($password);
 $mode = stripslashes($mode);
 $mode = mysql_real_escape_string($mode);
 
 $query = "INSERT into `users` (firstname, lastname, username, password, mode) VALUES ('$firstname','$lastname','$username', '".md5($password)."', '$mode')";
 $result = mysql_query($query);
 if($result){
 	echo "<div class='login'><h3>You are registered successfully.</h3><br/>Click here to <a href='index.php'>Login</a></div>";
 } 
 else{
 	echo "<div class='login'><h3>Account already exists. </h3><br/>Click here to <a href='index.php'>Go Back</a></div>";
 }
 }else{
 
?>
	<header class="main-header">
	    <h1><a href="/index.php">Project Kumquat</a></h1>
	    <nav>
		    <ul>
		    	<li>
					<!-- <a href="registration.php" class="button btn-default"></a> -->
					<a href="/main/dashboard.php">
						<button type="button" class="btn btn-info login-btn-pos" id="backBtn">
						Back</button>
					</a>
				</li>
		        <li>
					<!-- <a href="registration.php" class="button btn-default"></a> -->
					<a href="/index.php">
						<button type="button" class="btn btn-info login-btn-pos" id="logout">
						Log Out</button>
					</a>
				</li>
		    </ul>
	  	</nav>
	</header>
	<div class='login'>
		<h2>Create New Project</h2>
		<form name="createProject" action="" method="get">
			<input name='projectName' placeholder='Project Name' type='text' required />
			<input name='deadline' placeholder='Deadline' type='text' required />
			<input name='budgets' placeholder='Estimate Cost' type='text' required />

			<br><br>

			<!--input type="radio" name="mode" value="developer"/><font>
				<span style="padding-left:5px;">Developer</span></font>
			<input style="margin-left: 60px;" type="radio" name="mode" value="manager"/><font>
				<span style="padding-left:5px;">Manager</span>
				</font--><br><br>
	        <input type="submit" name="submit" value="Create" class="btn btn-default"/>
		</form>
			
	</div>

	<script src="confirm-password.js"></script>
	<script>validatePassword();</script>
<?php } ?>
</body>
</html>