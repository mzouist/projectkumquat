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
 	$devName = $_POST['devName'];

 	$projectname = mysql_real_escape_string($projectname);
	$username = stripslashes($username);
	$username = mysql_real_escape_string($username);
	$devName = stripslashes($devName);
	$devName = mysql_real_escape_string($devName);

	$getDev = "SELECT username FROM users WHERE username='$devName'";
	$query2 = mysql_query($getDev, $conn) or die("Couldn't perform query $query (".__LINE__."): " . mysql_error() . '.');
	$row2 = mysql_num_rows($query2);
	if($row2 == 1){

		$getId = "SELECT project_id FROM projects WHERE projectname='$projectname' AND username='$username'";
	 	$query1 = mysql_query($getId, $conn) or die("Couldn't perform query $query (".__LINE__."): " . mysql_error() . '.');
	 	$rows = mysql_num_rows($query1);
		if($rows==1)
		{
			$sqlRecord = mysql_fetch_assoc($query1);
			$project_id =  $sqlRecord['project_id'];
			$query = "INSERT INTO projectdevs (project_id, projectname, developer) VALUES ('$project_id', '$projectname', '$devName')";
			$result = mysql_query($query, $conn) or die("Couldn't perform query $query (".__LINE__."): " . mysql_error() . '.');
			header("Location: /main/addDevs.php?projectname=$projectname");
		} else {
			$msg = "Project does not exist";
			header("Location: /main/addDevs.php?projectname=$projectname");

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
	<div><?php echo $query; ?></div>

	<div class="container" style="margin-top: 100px;">
	    <form class="well form-horizontal" name="addDevs" action="" method="post">
	    	<legend cass="col-md-4">Add New Developers</legend>
	    	<div style="color:#b30000; margin-bottom: 10px; text-align: center;"><?php echo $msg; ?></div>
	    	<div class="clearfix"> </div>
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


			<?php

		}
	} else {
		$msg = "Username does not exist"; 


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
	<div><?php echo $query; ?></div>

	<div class="container" style="margin-top: 100px;">
	    <form class="well form-horizontal" name="addDevs" action="" method="post">
	    	<legend cass="col-md-4">Add New Developers</legend>
	    	<div style="color:#b30000; margin-bottom: 10px; text-align: center;"><?php echo $msg; ?></div>
	    	<div class="clearfix"> </div>
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


		<?php
	}
 
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
	<div><?php echo $query; ?></div>

	<div class="container" style="margin-top: 100px;">
	    <form class="well form-horizontal" name="addDevs" action="" method="post">
	    	<legend cass="col-md-4">Add New Developers</legend>
	    	<div style="color:#b30000; margin-bottom: 10px; text-align: center;"><?php echo $msg; ?></div>
	    	<div class="clearfix"> </div>
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

<?php 
	 }
 ?>
</body>
</html>

<?php ob_end_flush(); ?>