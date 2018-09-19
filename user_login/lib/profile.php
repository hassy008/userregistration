<?php 
	include '../inc/header.php';
		Session::checkSession();
?>

<div class="panel panel-default">

	<div class="pannel-heading">
		<h2> User Profile <span class="pull-right"> <a class="btn btn-danger" href="index.php">Back</a></span>
			
		</h2>
	</div>

	  <div class="panel-body">
		<div style="max-width: 600px; margin:0 auto">
			<form action="" method="POST">
				<div class="form-group">
					<label for="name">Your Name </label>
					<input type="text" id="name" name="name" class="form-control" />
				</div>
				<div class="form-group">
					<label for="username">Username </label>
					<input type="text" id="username" name="username" class="form-control" />
				</div>

				<div class="form-group">
					<label for="email">Email Address</label>
					<input type="text" id="email" name="email" class="form-control" />
				</div>

				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" id="passw ord" name="password" class="form-control" />

				</div>
				<button type="submit" name="update" class="btn btn-success"> Update </button>
			</form>
	</div>
		
  </div>
</div>


<?php
	include '../inc/footer.php';
?>
		