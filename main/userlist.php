<?php include("../auth.php"); //include auth.php file on all secure pages ?>
<?php include("../_globalkq.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<!--title>Welcome Home</title-->
	<title>Project Kumquat | User List</title>
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
					<!-- <a href="registration.php" class="button btn-default"></a> -->
					<a href="/index.php">
						<button type="button" class="btn btn-info login-btn-pos" id="logout">
						Log Out</button>
					</a>
				</li>
		    </ul>
	  </nav>
	</header>


<div class="login">

<?php 

if($_SESSION['username'] == 'user1')
{
echo 'Hello user1';
}
else
{
echo 'You are not user1';
}
?>
<br>
<a href="/main/dashboard.php">Return to Dashboard</a>.

<h1>Project Managers</h1>
<?php
  $qry = mysql_query("SELECT * FROM users WHERE mode='manager'");
?>
<ul>
<?php while($row = mysql_fetch_array($qry)) { ?>
  <li><i><?php echo $row['firstname']; ?></i> as <?php echo $row['username']; ?></li>
<?php } ?>
</ul>


<h1>Developers</h1>
<?php
  $qry = mysql_query("SELECT * FROM users WHERE mode='developer'");
?>
<ul>
<?php while($row = mysql_fetch_array($qry)) { ?>
  <li><i><?php echo $row['firstname']; ?></i> as <?php echo $row['username']; ?></li>
<?php } ?>
</ul>

	    </div>

</body>
</html>