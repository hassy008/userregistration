<?php
	$filepath=realpath(dirname(__FILE__));
//	include_once  $filepath.'../../ lib/session.php';
	include_once '../lib/session.php';
	Session::init();
    Session::checkLogin();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Registration Using PHP</title>
 	
 	<!--<link rel="stylesheet" href="inc/bootstrap.min.css" />
 	<script src="inc/bootstrap.min.js" ></script>
 	<script src="inc/jquery.min.js" ></script>-->

	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<!-- this php block for LOGOUT OPTION -->
<?php
	if (isset($_GET['action']) && $_GET['action']=="logout") {
		Session::destroy();
	}
?>

<body>
<div class="container">		
	<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="index.php">Login Register System</a>
				</div>
				<ul class="nav navbar-nav pull-right">


			<?php 
				$id=Session::get ("id");
				$userlog=Session::get("login");

				if ($userlog == true) {
				
			?>
					<li><a href="profile.php?id=<?php echo $id;?>">Profile</a></li>	
					<li><a href="?action=logout">Logout</a></li>

					<?php }

					 else { ?>

					<li><a href="login.php">Login</a></li>
					<li><a href="reg.php">Register</a></li>
					<?php } ?>

				</ul>
			</div>
		</nav>

