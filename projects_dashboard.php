<?php include("auth.php"); //include auth.php file on all secure pages ?>

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




<title>Welcome Home</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
Welcome <?php echo $_SESSION['username']; ?>! <br>



<br><br>
<a href="logout.php">Logout</a>
</div>
</body>
</html>