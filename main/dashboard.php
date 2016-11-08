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
	<header class="main-header">
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
					<!-- <a href="registration.php" class="button btn-default"></a> -->
					<a href="/index.php">
						<button type="button" class="btn btn-info login-btn-pos" id="logout">
						Log Out</button>
					</a>
				</li>
		    </ul>
	  </nav>
	</header>


	<div class="form" style="position:relative; bottom: -65px;">
	<p>Welcome <?php echo $_SESSION['username']; ?>!</p>
	<p>This is secure area.</p>
	<p><a href="dashboard.php">Dashboard</a></p>
	<a href="/index.php">Logout</a>
	</div>
</body>
</html>