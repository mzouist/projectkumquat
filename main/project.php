<?php include("../auth.php"); //include auth.php file on all secure pages ?>
<?php include("../_globalkq.php");
	if($_POST['function']=='delete' && $_POST['id']>0)
	{
	   $sql="DELETE FROM projects WHERE project_id='".$_POST['id']."'";
	   $result = mysql_query($sql, $conn) or die("Couldn't perform query $sql(".__LINE__."): " . mysql_error() . '.');
	   header("Location: /main/dashboard.php");
	}
		if($_POST['function']=='deltask' && $_POST['taskid']>0)
	{
	   $sql="DELETE FROM todo WHERE task_id='".$_POST['taskid']."'";
	   $result = mysql_query($sql, $conn) or die("Couldn't perform query $sql(".__LINE__."): " . mysql_error() . '.');
	   header("Location: /main/project.php?id=".$_GET['id']."");
	}
	if(isset($_POST['submit']))
	{
		switch($_GET['home'])
		{
			case 'add':
				 $s = "SELECT * FROM `todo` WHERE `project_id`='".$_POST["pid"]."' AND `title`='".$_POST['taskname']."'";
				 $q = mysql_query($s) or die(mysql_error());
				 $r = mysql_num_rows($q);
				if($r==0)
				{			
					$sql="INSERT INTO `todo` (`project_id`, `title`, `description`) VALUES ('".$_POST['pid']."', '".$_POST['taskname']."', '".$_POST['description']."')";
					mysql_query($sql) or die(mysql_error());	
				}
				else
				{
					$error_flag='Duplicate Entry';	
				}
			break;
			default:
		}
	}
	if($_POST['function']=='addDev' && $_POST['id']>0)
	{
	 	$sql1="SELECT projectname FROM projects WHERE project_id='".$_POST['id']."'";
	 	$result1 = mysql_query($sql1, $conn) or die("Couldn't perform query $sql(".__LINE__."): " . mysql_error() . '.');
	 	$sqlRecord = mysql_fetch_assoc($result1);
		$project_name =  $sqlRecord['projectname'];
	   	header("Location: /main/addDevs.php?projectname=$project_name");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<!--title>Welcome Home</title-->
	<title>Project Kumquat | User List</title>
	<link href="/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="/css/custom.css">
	<link rel="stylesheet" type="text/css" href="/css/dashboard.css">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js"></script> 
    <script type="text/javascript" src="js/scripts.js"></script>  
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
	<div class="well col-sm-6 col-sm-offset-3" style="margin-top: 90px;">
<?php 
	if($_SESSION['mode'] == 'manager'){
		echo 'Hello manager!';
?>
	<br>

	<form method="POST" onsubmit="return confirm('Are you sure you want to delete this Project?');">
	    <input type="hidden" name="function" value="delete">
	    <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">
	    <button type="submit">Delete Project</button>
	</form>
	<form method="post">
		<input type="hidden" name="function" value="addDev">
	    <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">
		<button class="btn btn-default">Add Developer</button>
	</form>
<?php 
	}
	else{
		echo 'Hello developer!';
	}
?>
	<form action="" method="post">
		<input type=hidden name=project_id value="<?php echo $_GET["id"]; ?>">
	</form>
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
	<br/>

<?php
	
	$sql2="SELECT * FROM `projects` WHERE `project_id`=' " . $_GET["id"] . " '";
	$query2=mysql_query($sql2) or die(mysql_error());
		

		while($results2=mysql_fetch_assoc($query2))
		{
?>
	<b>budgets:</b> $
	<?php echo $results2['budgets']; ?> 
	<br><b>deadline:</b> <?php echo $results2['deadline']; ?><br><br>	

<?php		
		}
	}
?>

<?php 
	if($_SESSION['mode'] == 'manager'){
?>

	<br><br>
	 <!---Add task form(manager only)-->
	<form method="post" action="?id=<?php echo $_GET["id"]; ?>&home=add" name="cd">

		<b>Task Name:</b><br><input type='text' id='textinput' name="taskname"><br>

		<b>Description:</b> <br><textarea rows="2" cols="20" name="description" wrap="physical"></textarea>:<br />

		<input type="submit" value="Add to list" name="submit"><br />
		<input type=hidden name="pid" value="<?php echo $_GET["id"]; ?>">

	</form>

<?php 
	}
	else{
		echo 'Below are tasks to be completed by deadline. Please be prompt!';
	}
?>
    
	<!--List Tasks-->
	<h1>Assignments</h1>
<?php
	
	$sql="SELECT * FROM `todo` WHERE `project_id`=' " . $_GET["id"] . " '";
	$query=mysql_query($sql) or die(mysql_error());
		
	while($list=mysql_fetch_assoc($query))
	{
		?>
		
			<form method="POST" onsubmit="return confirm('Are you sure you want to delete this task?');">
	    <input type="hidden" name="function" value="deltask">
	    <input type="hidden" name="taskid" value="<?php echo $list['task_id']; ?>">
	    <button type="submit">x</button>
	</form>
	
		<b>Task: </b><?php echo $list['title']; ?>
		<br><b>description:</b> <?php echo $list['description']; ?><br><br>
	
<?php		
	}
?>
  </div>

</body>
</html>