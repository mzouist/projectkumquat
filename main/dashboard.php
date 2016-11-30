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

<!-- <div class="container body">
	<div class="col-md-3 left-col">
	</div>
	<div class="top_nav">
	</div>
	<div class="right_col">
	</div>
	<footer class="footer">
	</footer>
</div> -->

	<header class="main-header" style="z-index: 999;">
	    <h1><a href="/index.php">Project Kumquat - <?php echo $_SESSION['mode']; ?></a></h1>
	    <nav>
		    <ul>
		    	<!-- <li>
					<a href="/main/testing.php">
						<button type="button" class="btn btn-info login-btn-pos" id="create">
						Testing (Delete After)</button>
					</a>
				</li> -->
				<li>
					<a href="/main/createProject.php">
						<button type="button" class="btn btn-info login-btn-pos" id="create">
						Create Project</button>
					</a>
				</li>
				<?php 
				if($_SESSION['mode'] == 'manager'){
				?>
				<li>
					<a href="/main/userlist.php">
						<button type="button" class="btn btn-info login-btn-pos" id="userlist">
						View Users</button>
					</a>
				</li>
				<?php } ?>
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



	<!-- <div class="form" style="position:relative; left: 100px; bottom: -65px;">
	<p>Hello <b><?php echo $_SESSION['username']; ?></b>!</p>
	Your are a <?php echo $_SESSION['mode']; ?>
	<p>Below are current projects.</p> <a href="userlist.php">View Users</a>.

	</div -->

<?php
	$sql="SELECT * FROM `projects` ";
	$query=mysql_query($sql) or die(mysql_error());
	$i=1;
?>
<div class="container">
<div class="form" style="margin-top: 80px;">
<?php
	$count = 0;
	//IF THE USER IS MANAGER
	if($_SESSION['mode'] == 'manager'){
	while($results=mysql_fetch_assoc($query))
	{
		$count++;
?>

	<div class = "col-sm-6 col-md-3" style="margin-bottom: 30px;">
			   		    
		<a href="project.php?id=<?php echo $results['project_id']; ?>" class="thumbnail" style="margin-bottom: 0 !important;">
            <img src="http://placehold.it/175x175"" width="175" class="img-circle img-responsive" style="margin-top: 10px"/>
            <div class="caption">
              <h3 style="text-align: center; color:#3c8dc5; margin-top: 0px;"><?php echo $count; ?>. <?php echo $results['projectname']; ?></h3>
              

              <p>
              
              </p>
              
            </div>
          </a>

	    <!-- <div href="project.php?id=<?php echo $results['project_id']; ?>">

	       <a>
	      	 <img src="http://placehold.it/250x250" width="250" height="250" class="img-circle img-responsive img-center">
	      	</a>
	       <div class = "caption text-center">
	       		<h3 style="text-align: center; margin-top: 0; color:#3c8dc5;"><?php echo $count;?>. <?php echo $results['projectname']; ?></h3>
	       	</div>
	    </div> -->


	</div>

<?php
		$i++;
	}
}
?>
</div>
</div>

<?php 
	
	//IF THE USER IS DEVELOPER
	if($_SESSION['mode'] == 'developer'){
	
	}
?>










</body>
</html>