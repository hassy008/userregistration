<?php 
	include '../inc/header.php';
	include '../lib/user.php';
	Session::checkLogin();
?>

<?php 
	$user=new User();        //Object

	if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['login'])) {
		$userLogin= $user->userLogin($_POST);
	}
?>

<div class="panel panel-default">

	<div class="panel-heading">
		<h2> User Login </h2>
	</div>

		<div class="panel-body">
	<div style="max-width: 600px; margin:0 auto">

<?php
	if (isset($userLogin)) {
		echo $userLogin;
	}
?>

			<form action="" method="POST">
				<div class="form-group">
					<label for="email">Email Address</label>
					<input type="text" id="email" name="email" class="form-control" >
					</div>

					<div class="form-group">
					<label for="password">Password</label>
					<input type="password" id="passw ord" name="password" class="form-control">

				</div>
				<button type="submit" name="login" class="btn btn-success">Login</button>
			</form>
	</div>
		
  </div>
</div>

<!--<div class="container">
  <h2>Vertical (basic) form</h2>
  <div style="max-width: 600px; margin:0 auto">
  <form action="/action_page.php">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>
</div>

-->


<?php
	include '../inc/footer.php';
?>
		