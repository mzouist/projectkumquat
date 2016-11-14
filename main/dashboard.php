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


<?php
$sql="SELECT * FROM `projects` ";
$query=mysql_query($sql) or die(mysql_error());
$i=1;
?>
<div class="row" style="margin-top: 100px; padding: 0 25px;">
<?php
while($results=mysql_fetch_assoc($query))
{

	?>

<div class = "col-sm-6 col-md-3">
		    <a onclick="document.getElementById('div_name<?php echo $i; ?>').style.display='';return false;" class = "thumbnail">
		       <img src = "https://pbs.twimg.com/profile_images/714225595727609856/fF2yIUyE.jpg" class="img-circle img-responsive">
		       <div class = "caption text-center">
		       		project title here
		       	</div>
		    </a>


	
    <a onclick="document.getElementById('div_name<?php echo $i; ?>').style.display='';return false;" 
href="" style="color:black;"><?php echo $results['projectname']; ?></a>( added by <?php echo $results['username']; ?> )
<br />
<div id="div_name<?php echo $i; ?>" style="display:none;margin:15px 15px 0px 15px;padding:5px;border:1px solid #aaa;">
<?php
	
	$sql2="SELECT * FROM `projects` WHERE `project_id`='".$results['project_id']."'";
	$query2=mysql_query($sql2) or die(mysql_error());
	
	

	while($results2=mysql_fetch_assoc($query2))
	{
		echo '<div id="div_name'.$i.'">budget:' .$results2['budgets'].' deadline: '.$results2['deadline'].'</div>';
	
		
	}

	
?>

<br>
<?php
echo $results['project_id'];
?>
</br>
<a onclick="document.getElementById('div_name<?php echo $i; ?>').style.display='none';return false;" href="" 
style="text-decoration:none;border-bottom:1px dotted blue;">hide</a>
</div>
</br>
	    </div>
<?php
$i++;
}


?>



	
	<div class="row" style="margin-top: 100px; padding: 0 25px;">
		<div class = "col-sm-6 col-md-3">
		    <a href="#" class = "thumbnail">
		       <img src = "https://pbs.twimg.com/profile_images/714225595727609856/fF2yIUyE.jpg" class="img-circle img-responsive">
		       <div class = "caption text-center">
		       		project title here
		       	</div>
		    </a>
	    </div>
		<div class = "col-sm-6 col-md-3">
		    <a href="#" class = "thumbnail">
		       <img src = "https://pbs.twimg.com/profile_images/714225595727609856/fF2yIUyE.jpg" class="img-circle img-responsive">
		       <div class = "caption text-center">
		       		project title here
		       	</div>
		    </a>
	    </div>
		<div class = "col-sm-6 col-md-3">
		    <a href="#" class = "thumbnail">
		       <img src = "https://pbs.twimg.com/profile_images/714225595727609856/fF2yIUyE.jpg" class="img-circle img-responsive">
		       <div class = "caption text-center">
		       		project title here
		       	</div>
		    </a>
	    </div>
		<div class = "col-sm-6 col-md-3">
		    <a href="#" class = "thumbnail">
		       <img src = "https://pbs.twimg.com/profile_images/714225595727609856/fF2yIUyE.jpg" class="img-circle img-responsive">
		       <div class = "caption text-center">
		       		project title here
		       	</div>
		    </a>
	    </div>
		<div class = "col-sm-6 col-md-3">
		    <a href="#" class = "thumbnail">
		       <img src = "https://pbs.twimg.com/profile_images/714225595727609856/fF2yIUyE.jpg" class="img-circle img-responsive">
		       <div class = "caption text-center">
		       		project title here
		       	</div>
		    </a>
	    </div>
		<div class = "col-sm-6 col-md-3">
		    <a href="#" class = "thumbnail">
		       <img src = "https://pbs.twimg.com/profile_images/714225595727609856/fF2yIUyE.jpg" class="img-circle img-responsive">
		       <div class = "caption text-center">
		       		project title here
		       	</div>
		    </a>
	    </div>
		<div class = "col-sm-6 col-md-3">
		    <a href="#" class = "thumbnail">
		       <img src = "https://pbs.twimg.com/profile_images/714225595727609856/fF2yIUyE.jpg" class="img-circle img-responsive">
		       <div class = "caption text-center">
		       		project title here
		       	</div>
		    </a>
	    </div>
		<div class = "col-sm-6 col-md-3">
		    <a href="#" class = "thumbnail">
		       <img src = "https://pbs.twimg.com/profile_images/714225595727609856/fF2yIUyE.jpg" class="img-circle img-responsive">
		       <div class = "caption text-center">
		       		project title here
		       	</div>
		    </a>
	    </div>
		<div class = "col-sm-6 col-md-3">
		    <a href="#" class = "thumbnail">
		       <img src = "https://pbs.twimg.com/profile_images/714225595727609856/fF2yIUyE.jpg" class="img-circle img-responsive">
		       <div class = "caption text-center">
		       		project title here
		       	</div>
		    </a>
	    </div>
		<div class = "col-sm-6 col-md-3">
		    <a href="#" class = "thumbnail">
		       <img src = "https://pbs.twimg.com/profile_images/714225595727609856/fF2yIUyE.jpg" class="img-circle img-responsive">
		       <div class = "caption text-center">
		       		project title here
		       	</div>
		    </a>
	    </div>
		<div class = "col-sm-6 col-md-3">
		    <a href="#" class = "thumbnail">
		       <img src = "https://pbs.twimg.com/profile_images/714225595727609856/fF2yIUyE.jpg" class="img-circle img-responsive">
		       <div class = "caption text-center">
		       		project title here
		       	</div>
		    </a>
	    </div>
		<div class = "col-sm-6 col-md-3">
		    <a href="#" class = "thumbnail">
		       <img src = "https://pbs.twimg.com/profile_images/714225595727609856/fF2yIUyE.jpg" class="img-circle img-responsive">
		       <div class = "caption text-center">
		       		project title here
		       	</div>
		    </a>
	    </div>
		<div class = "col-sm-6 col-md-3">
		    <a href="#" class = "thumbnail">
		       <img src = "https://pbs.twimg.com/profile_images/714225595727609856/fF2yIUyE.jpg" class="img-circle img-responsive">
		       <div class = "caption text-center">
		       		project title here
		       	</div>
		    </a>
	    </div>
		<div class = "col-sm-6 col-md-3">
		    <a href="#" class = "thumbnail">
		       <img src = "https://pbs.twimg.com/profile_images/714225595727609856/fF2yIUyE.jpg" class="img-circle img-responsive">
		       <div class = "caption text-center">
		       		project title here
		       	</div>
		    </a>
	    </div>
		<div class = "col-sm-6 col-md-3">
		    <a href="#" class = "thumbnail">
		       <img src = "https://pbs.twimg.com/profile_images/714225595727609856/fF2yIUyE.jpg" class="img-circle img-responsive">
		       <div class = "caption text-center">
		       		project title here
		       	</div>
		    </a>
	    </div>
		<div class = "col-sm-6 col-md-3">
		    <a href="#" class = "thumbnail">
		       <img src = "https://pbs.twimg.com/profile_images/714225595727609856/fF2yIUyE.jpg" class="img-circle img-responsive">
		       <div class = "caption text-center">
		       		project title here
		       	</div>
		    </a>
	    </div>
		
	</div>


	<div class="form" style="position:relative; bottom: -65px;">
	<p>Welcome <?php echo $_SESSION['username']; ?>!</p>
	<p>This is secure area.</p>
	<p><a href="dashboard.php">Dashboard</a></p>
	<a href="/index.php">Logout</a>
	</div>
</body>
</html>