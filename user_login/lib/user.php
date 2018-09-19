<?php

include_once'session.php';
include 'database.php';

	class user {
		private $db; 
		public function __construct()
		{
			$this->db=new Database();
		}
		public function userRegistration($data){
			$name      = $data['name'];
			$username  = $data['username'];
			$email     = $data['email'];
			$password  = $data['password'];//////////////////////////////////////////////////////////////////////////////////////////////
			$chk_email =$this->emailCheck($email); 

			//check any email is already exist or not//

			if ($name=="" OR $username=="" OR $email =="" OR $password =="") {
				# code...
			$msg="<div class='alret alert-danger'><strong>Error!</strong>Field must not be empty</div>";
			return $msg;
			}

			if (strlen($username)<3) {
				$msg="<div class='alert alert-danger'><strong>Error!</strong>Username is too short</div>";
			return $msg;


			}elseif (preg_match('/a-z0-9_-]+/i', $username)) {
				# code...
				$msg="<div class='alert alert-danger'><strong>Error!</strong>Username must only contain alphanumerical, dashes and underscores!</div>";
			}

			if (filter_var($email, FILTER_VALIDATE_EMAIL)===false) {
				# code...

				$msg="<div class='alert alert-danger'><strong>Error!</strong>Email is not valid</div>";

			return $msg;

			}

		

			if ($chk_email==true) {
				# code...
				$msg="<div class='alert alert-danger'><strong>Error!</strong>The email address already exist</div>";

			return $msg;
			}

		$sql="INSERT INTO tbl_user(name,username,email,password) VALUES(:name, :username, :email, :password)";
			$query =$this->db->pdo->prepare($sql);
			$query->bindValue(':name', $name);
			$query->bindValue(':username', $username);
			$query->bindValue(':email', $email);
			$query->bindValue(':password', $password);
			$result=$query->execute();

			if ($result) {
				# code...
				$msg="<div class='alert alert-success'>Thank you, You have been registered</div>";
				return $msg;
			}else {
				$msg = "<div class='alert alert-danger'><strong>ERROR</strong> Sorry, You ain't do it</div>";
				return $msg;
				}

			}

		

		public function emailCheck($email){
			$sql="SELECT email FROM tbl_user WHERE email= :email";
			$query =$this->db->pdo->prepare($sql);
			$query->bindValue(':email', $email);
			$query->execute();

			if ($query->rowCount()>0){
				return true;
			}else{
				return false;
			}
		}

		public function getLoginUser($email, $password){
			$sql="SELECT * FROM tbl_user WHERE email= :email AND password= :password LIMIT 1";
			$query =$this->db->pdo->prepare($sql);
			$query->bindValue(':email', $email);
			$query->bindValue(':password', $password);
			$query->execute();
			$result = $query->fetch(PDO::FETCH_OBJ);
			return $result;
		}

		public function userLogin($data){
			$email=$data['email'];
			$password=$data['password'];
///////////////////////////////////////////////////////////////////////////////////////////
			$chk_email = $this->emailCheck($email);
			if ( $email=="" OR $password=="") {
				# code...
				$msg="<div class='alret alert-danger'><Strong>ERROR!</strong> Field must not empty</div>";
				return $msg;
			}
			if (filter_var($email, FILTER_VALIDATE_EMAIL)===false) {
				# code...
				$msg="<div class='alret alert-danger'><strong>ERROR!</strong> The email address is not valid</div>";
				return $msg;
			}
			if ($chk_email==false) {
				# code...
				$msg="<div class='alert alert-danger'><strong>ERROR!</strong>The email address is Not exist</div>";
				return $msg;
			}

			$result=$this-> getLoginUser($email, $password);

			if ($result) {
				session::init();
				session::set ("login", true);
				session::set ("id", $result->id);
				session::set ("name", $result->name);
				session::set("username", $result->username);
				session::set ("loginmsg","<div class='alert alert-success'>Welcome, You are Logged In</div>");
				header("location:index.php");
			}else{
				$msg="<div class='alert alert-danger'><strong>ERROR!</strong>Data Not Found</div>";
				return $msg;
			}
		}

		public function getUserData(){
			$sql="SELECT * FROM tbl_user ORDER BY id DESC";
			$query =$this->db->pdo->prepare($sql);
			$query->execute();
			$result = $query->fetchAll();
			return $result;
		}
	}
?>  