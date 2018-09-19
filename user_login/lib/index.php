<?php 
	include '../inc/header.php';
	include'../lib/user.php';
	//include 'c:/xampp/htdocs/user_login/lib/user.php';

	Session::checkSession();
?>
<?php
	$loginmsg = session::get("loginmsg");
	if(isset($loginmsg)){
		echo $loginmsg;
	}
//////////*This NULL value remove the LOGIN POPUP Message */	
	Session::set("loginmsg",NULL); 
?>

<!--check-->

 
<div class="panel panel-default">

	<div class="pannel-heading">
		<h2> User List <span class="pull-right"> Welcome! <strong>
			
			<?php
				$name= Session::get('name');
				if (isset($name)) {
					echo $name;
				}
			?>

		    </strong>
		</span>
			
		</h2>
	</div>
	<div class="pannel-body">
		<table class="table table-striped">
			<th width="20%">ID</th>
			<th width="20%">Name</th>
			<th width="20%">Username</th>
			<th width="20%">Email</th>
			<th width="20%">Action</th>
<?php
	$user=new User(); 
	$userdata= $user->getUserData();

//////////////////////////////////////////////////////////////////////////////////////////////////////////
	if($userdata){
		$i=0;
		foreach ($userdata as $sdata) {
			$i++;

?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $sdata['Name'];?></td> <!--here write the Name/username like what you write on your DB table....and it is all CASE SENSITIVE-->
				<td><?php echo $sdata['username'];?></td>
				<td><?php echo $sdata['email'];?></td>
				<td>
					<a class="btn btn-primary" href="profile.php?id=<?php echo $sdata['id']; ?>">View </a>
				</td>
			</tr>
<?php } } else { ?>
 	<tr><td colspan="5"><h2>NO USER DATA FOUND</h2></td></tr>
 <?php }  ?>
			
		</table>
	</div>


		
</div>






<?php
	include '../inc/footer.php';
?>
		