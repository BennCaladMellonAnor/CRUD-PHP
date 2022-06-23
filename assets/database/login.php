<?php 
	require_once('database.php');

	class Login extends Database{
		
		public function checkLogin(){
			$cred = strtolower($_POST['credential']);
			$pass = strval($_POST['password']);
			$and = strval("'$cred' AND password LIKE '$pass'");
			$user = parent::queryOne('id', 'users', 'credential', $and);

			if($user){
				return $user;
			}
		}
	}
	
?>