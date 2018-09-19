<?php

	class session {

		public static function init (){
			if (version_compare(phpversion(),'5.4.0','<' )) {
				# code...
				if (session_id()=='') {
					# code...
					session_start();
				}
				}else{
					if (session_status()==PHP_SESSION_NONE) {
						# code...
			 			session_start();
					}
				}
			}

//here we use ('') becauses we are working with couple of values//////

			public static function set ($key, $val){
				$_SESSION[$key]=$val;
			}


//when we "SET" the value and now we "GET our value"
			public static function get ($key){
				if (isset($_SESSION[$key])) {
					# code...
					return $_SESSION[$key];
				}else {
					return false;
				}
			}






			public static function checkSession (){
				if (self::get("login")== false) {
					# code...
					self::destroy();
					header('location:login.php');
				}
			}

			public static function checkLogin(){
				if (self::get("lgoin")==true) {

					header('location:index.php');
				
				}
			}


			//this php block for LOGOUT OPTION 

			public static function destroy(){
				session_destroy();
				session_unset();
				header("location: login.php");
			}

	 	}		
	
?>  