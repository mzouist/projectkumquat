<?php 
	ob_start();
	include('../auth.php');
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
 if (isset($_POST['projectName']) && !empty($_POST['projectName'])){
 $username = $_SESSION['username'];;
 $projectName = $_POST['projectName'];
 $deadline = $_POST['deadline'];
 $budgets = $_POST['budgets'];

 //$projectName = mysql_real_escape_string($projectName);
 //$username = stripslashes($username);
 //$username = mysql_real_escape_string($username);
 //$deadline = stripslashes($deadline);
 //$budgets = mysql_real_escape_string($budgets);
 
 $query = "INSERT into projects (username, projectname, deadline, budgets) VALUES ('".$username."','".$projectName."','".$deadline."', '".$budgets."')";
 $result = mysql_query($query, $conn) or die("Couldn't perform query $query (".__LINE__."): " . mysql_error() . '.');
 if($result){
 	//echo "<div class='login'><h3>You are registered successfully.</h3><br/>Click here to <a href='index.php'>Login</a></div>";
 	header("Location: /main/dashboard.php");
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
						<button type="button" class="btn btn-info login-btn-pos" id="backBtn" style="position:relative; left:25px">
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
		<form name="createProject" action="" method="post">
			<input name='projectName' placeholder='Project Name' type='text' required />
			<br><br>
			<b>Estimate Cost:</b><input name='budgets' placeholder='Estimate Cost' type='number' required />
			<br><br>
			<b>Deadline:</b><input name='deadline' placeholder='Deadline' type='date' required />

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

<?php ob_end_flush(); ?>