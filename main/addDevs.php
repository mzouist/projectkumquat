<?php 
	ob_start();
	include('../auth.php');
	include('../_globalkq.php');
?>
<!doctype html>

<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Project Manager | Add New Developers</title>
	<meta name="description" content="The HTML5 Herald">
	<meta name="author" content="SitePoint">
	<link href="/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="/css/custom.css">
	<link rel="stylesheet" href="/css/font-awesome.min.css">
</head>
<body>


<?php
 require('../_globalkq.php');
 // If form submitted, insert values into the database.
 if (isset($_POST['devName']) && !empty($_POST['devName'])){
 	$username = $_SESSION['username'];;
 	$projectname = $_GET['projectname'];
 	$devName = $_GET['devName'];
 // $deadline = $_POST['deadline'];
 // $budgets = $_POST['budgets'];

 //$projectName = mysql_real_escape_string($projectName);
	$username = stripslashes($username);
	$username = mysql_real_escape_string($username);
 //$deadline = stripslashes($deadline);
 //$budgets = mysql_real_escape_string($budgets);
 
 $query = "";
 //$result = mysql_query($query, $conn) or die("Couldn't perform query $query (".__LINE__."): " . mysql_error() . '.');
 // if($result){
 // 	header("Location: /main/addDevs.php?projectname=$projectname");
 //	}
 } 
 else{
 
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

	<div class="container" style="margin-top: 100px;">
	    <form class="well form-horizontal" name="addDevs" action="" method="post">
	    	<legend cass="col-md-4">Add New Developers</legend>

	    	<fieldset>
	    		<div>
					<div class="form-group">
					  	<label class="col-md-4 control-label">Add Developers</label>  
					  	<div class="col-md-4 inputGroupContainer">
					  		<div class="input-group">
					  			<span class="input-group-addon"><i class="glyphicon glyphicon-user" aria-hidden="true"></i></span>
				  				<input name='devName' placeholder="Developer Username" class="form-control" type="text" required>
					    	</div>
					  	</div>
					</div>
					<div class="form-group">
					  	<label class="col-md-4 control-label"></label>
					  	<div class="col-md-4">
					    	<button type="submit" class="btn btn-default" >Add</button>
					  	</div>
					</div>
				</div>
			</fieldset>
		</form>
	</div>

	<script src="confirm-password.js"></script>
	<script>validatePassword();</script>
<?php 
	 }
 ?>
</body>
</html>

<?php ob_end_flush(); ?>