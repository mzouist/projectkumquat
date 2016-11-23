<?php include("../auth.php"); //include auth.php file on all secure pages ?>
<?php include("../_globalkq.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<!--title>Welcome Home</title-->
	<title>Project Kumquat | Dashboard</title>
	<link href="/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="/css/custom.css">
	<link rel="stylesheet" type="text/css" href="/css/dashboard.css">
	
	</head>
<body>
	<header class="main-header" style="z-index: 999;">
	    <h1><a href="/index.php">Project Kumquat</a></h1>
	    <nav>
		    <ul>
				<li>
					<a href="/main/createProject.php">
						<button type="button" class="btn btn-info login-btn-pos" id="create">
						Create Project</button>
					</a>
				</li>
				<li>
					<a href="/main/userlist.php">
						<button type="button" class="btn btn-info login-btn-pos" id="userlist">
						View Users</button>
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

<?php 

?>



	<div class="form" style="position:relative; left: 100px; bottom: -65px;">
	<p>Hello <b><?php echo $_SESSION['username']; ?></b>!</p>
	Your are a <?php echo $_SESSION['mode']; ?> <---Should specify is Manager or Developer!
<<<<<<< Updated upstream
	<p>Below are current projects.</p> 
=======
	<p>Below are current projects.</p> <a href="userlist.php">View Users</a>.
>>>>>>> Stashed changes

	</div>

<?php

	$sql="SELECT * FROM `projects` ";
	$query=mysql_query($sql) or die(mysql_error());
	$i=1;
?>
<div class="form" style="margin-top: 100px;">
<?php

	//IF THE USER IS MANAGER
	if($_SESSION['mode'] == 'manager'){

		while($results=mysql_fetch_assoc($query))
{

	?>

<div class = "col-sm-6 col-md-3">
		   		    

  <a href="project.php?id=<?php echo $results['project_id']; ?>">

		       <img src = "https://pbs.twimg.com/profile_images/714225595727609856/fF2yIUyE.jpg" class="img-circle img-responsive">
		       <div class = "caption text-center">
		       		<h1><?php echo $results['projectname']; ?></h1>
		       	</div>
		    </a>


</div>
	    </div>
<?php
<<<<<<< Updated upstream
$i++;
}
?>


=======
		$i++;
	}
}
?>

<?php 
	
	//IF THE USER IS DEVELOPER
	if($_SESSION['mode'] == 'developer'){
	
	}
?>










>>>>>>> Stashed changes
</body>
</html>