<?php 
	ob_start();
	include('../auth.php');
	include('../_globalkq.php');
?>
<!doctype html>

<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Project Manager | Create Project</title>
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
 if (isset($_POST['projectName']) && !empty($_POST['projectName'])){
 $username = $_SESSION['username'];;
 $projectName = $_POST['projectName'];
 $deadline = $_POST['deadline'];
 $budgets = $_POST['budgets'];

 //$projectName = mysql_real_escape_string($projectName);
 //$username = stripslashes($username);
 //$username = mysql_real_escape_string($username);
 //$deadline = stripslashes($deadline);
 //$budgets = mysql_real_escape_string($budgets);

 //TODO: MAKE PROJECTNAME UNIQUE PER ACCOUNT. IF USER ALREADY USED A PROJECTNAME, THEN PROJECTNAME CANT BE USE
 $checkDup = "SELECT projectname FROM projects WHERE username='$username'";
 $query1 = mysql_query($checkDup, $conn) or die("Couldn't perform query $query (".__LINE__."): " . mysql_error() . '.');
 $bool = false;
 $msg = null;
 while($result1 = mysql_fetch_assoc($query1)){
 	if(strcasecmp( $projectName, $result1['projectname'] ) == 0 ){
 		$bool = true;
 		$msg = "Project name already exist, please use another name";
 	}
 }
if($bool == false){
 $query = "INSERT into projects (username, projectname, deadline, budgets) VALUES ('".$username."','".$projectName."','".$deadline."', '".$budgets."')";
 $result = mysql_query($query, $conn) or die("Couldn't perform query $query (".__LINE__."): " . mysql_error() . '.');
 if($result){
 	header("Location: /main/addDevs.php?projectname=$projectName");
 } 
 else{
 	
 }
} else{

?>

<header class="main-header">
	    <h1><a href="/main/dashboard.php">Project Kumquat</a></h1>
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
	    <form class="well form-horizontal" name="createProject" action="" method="post">
	    	<legend cass="col-md-4">Create New Project</legend>
	    	<div style="color:#b30000; margin-bottom: 10px; text-align: center;"><?php echo $msg; ?></div>
	    	<div class="clearfix"> </div>
	    	<fieldset>
	    		<div>
					<div class="form-group">
					  	<label class="col-md-4 control-label">Project Name</label>  
					  	<div class="col-md-4 inputGroupContainer">
					  		<div class="input-group">
					  			<span class="input-group-addon"><i class="glyphicon glyphicon-user" aria-hidden="true"></i></span>
				  				<input name='projectName' placeholder="Name of the Project" class="form-control" type="text" required>
					    	</div>
					  	</div>
					</div>
					<div class="form-group">
					  	<label class="col-md-4 control-label">Estimated Cost</label>  
					  	<div class="col-md-4 inputGroupContainer">
					  		<div class="input-group">
					  			<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				  				<input name='budgets' placeholder="Available Fundings" class="form-control" type="number" required>
					    	</div>
					  	</div>
					</div>
					<div class="form-group">
					  	<label class="col-md-4 control-label">DeadLine</label>  
					  	<div class="col-md-4 inputGroupContainer">
					  		<div class="input-group">
					  			<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				  				<input name='deadline' placeholder="" class="form-control" type="date" required>
					    	</div>
					  	</div>
					</div>
					<div class="form-group" style="display: none">
	                    <label class="col-md-4 control-label">Mode</label>
	                    <div class="col-md-4">
	                        <div class="radio">
	                            <label>
	                                <input type="radio" name="mode" value="manager" checked/> Manager
	                            </label>
	                        </div>
	                        <div class="radio">
	                            <label>
	                                <input type="radio" name="mode" value="developer" /> Developer
	                            </label>
	                        </div>
	                    </div>
	                </div>
	                <div class="form-group">
					  <label class="col-md-4 control-label">Project Description</label>
					    <div class="col-md-4 inputGroupContainer">
					    <div class="input-group">
					        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
					        	<textarea class="form-control" name="comment" placeholder="Project Description" required=""></textarea>
					  	</div>
					   	</div>
					</div>
					<div class="form-group">
					  	<label class="col-md-4 control-label"></label>
					  	<div class="col-md-4">
					    	<button type="submit" class="btn btn-default" >Create</button>
					  	</div>
					</div>
				</div>
		
			</fieldset>
		</form>
	</div>

<?php

}
} //END if(isset)
else{


 
?>
	<header class="main-header">
	    <h1><a href="/main/dashboard.php">Project Kumquat</a></h1>
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
	    <form class="well form-horizontal" name="createProject" action="" method="post">
	    	<legend cass="col-md-4">Create New Project</legend>
	    	<fieldset>
	    		<div>
					<div class="form-group">
					  	<label class="col-md-4 control-label">Project Name</label>  
					  	<div class="col-md-4 inputGroupContainer">
					  		<div class="input-group">
					  			<span class="input-group-addon"><i class="glyphicon glyphicon-user" aria-hidden="true"></i></span>
				  				<input name='projectName' placeholder="Name of the Project" class="form-control" type="text" required>
					    	</div>
					  	</div>
					</div>
					<div class="form-group">
					  	<label class="col-md-4 control-label">Estimated Cost</label>  
					  	<div class="col-md-4 inputGroupContainer">
					  		<div class="input-group">
					  			<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				  				<input name='budgets' placeholder="Available Fundings" class="form-control" type="number" required>
					    	</div>
					  	</div>
					</div>
					<div class="form-group">
					  	<label class="col-md-4 control-label">DeadLine</label>  
					  	<div class="col-md-4 inputGroupContainer">
					  		<div class="input-group">
					  			<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				  				<input name='deadline' placeholder="" class="form-control" type="date" required>
					    	</div>
					  	</div>
					</div>
					<div class="form-group" style="display: none">
	                    <label class="col-md-4 control-label">Mode</label>
	                    <div class="col-md-4">
	                        <div class="radio">
	                            <label>
	                                <input type="radio" name="mode" value="manager" checked/> Manager
	                            </label>
	                        </div>
	                        <div class="radio">
	                            <label>
	                                <input type="radio" name="mode" value="developer" /> Developer
	                            </label>
	                        </div>
	                    </div>
	                </div>
	                <div class="form-group">
					  <label class="col-md-4 control-label">Project Description</label>
					    <div class="col-md-4 inputGroupContainer">
					    <div class="input-group">
					        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
					        	<textarea class="form-control" name="comment" placeholder="Project Description" required=""></textarea>
					  	</div>
					   	</div>
					</div>
					<div class="form-group">
					  	<label class="col-md-4 control-label"></label>
					  	<div class="col-md-4">
					    	<button type="submit" class="btn btn-default" >Create</button>
					  	</div>
					</div>
				</div>
		
			</fieldset>
		</form>
	</div>
	
	
	<script src="confirm-password.js"></script>
	<script>validatePassword();</script>
<?php } ?>
</body>
</html>

<?php ob_end_flush(); ?>