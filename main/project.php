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
					<a href="/main/dashboard.php">
						<button type="button" class="btn btn-info login-btn-pos" id="dashboard">
						Dashboard</button>
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

<br>
	<?php

	// The value of the variable name is found
	echo "<b>Displaying Project #" . $_GET["id"] . "</b>";

	?>
	
<?php
$sql="SELECT * FROM `projects` WHERE `project_id`='" . $_GET["id"] . "'";
$query=mysql_query($sql) or die(mysql_error());
$i=1;
?>
<?php
while($results=mysql_fetch_assoc($query))
{
	?>
	<h1><?php echo $results['projectname']; ?></h1> ( added by <?php echo $results['username']; ?> )
<br />

<?php
	
	$sql2="SELECT * FROM `projects` WHERE `project_id`=' " . $_GET["id"] . " '";
	$query2=mysql_query($sql2) or die(mysql_error());
		

	while($results2=mysql_fetch_assoc($query2))
	{
		?>
		<b>budgets:</b> $
		<?php echo $results2['budgets']; ?> 
		<br><b>deadline:</b> <?php echo $results2['deadline']; ?>
	
<?php		
	}
}
	
?>


	    </div>

</body>
</html>