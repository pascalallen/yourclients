<?php
	class Auth
	{
		private static $email;
		private static $password;
		private static $error = "Oops, something went wrong";
		
		public static function attempt($email, $password)
		{	
			self::$email = $email; 
			self::$password = $password;

			// CHECK IF USER
			require_once "User.php";
			// find user by email
			if (User::findByEmail(self::$email)) { 

				$user = User::findByEmail(self::$email);
				
			    // if input is correct, assign session variable and log
			    if(password_verify(self::$password, $user->password)){

					$_SESSION['user'] = $user->id;
				    return true;
				}
				return false;

			}

			// show default error message
			$_SESSION['error_msg'] = self::$error;
			return false;

		}

		//check for any authenticity
		public static function check()
		{
			if(isset($_SESSION['user'])){
				return true;
			}
			return false;
		}
		
		public static function user()
		{
			return isset($_SESSION['user']) ? $_SESSION['user'] : null;
		}
		
		public static function logout()
		{
			$_SESSION = array();
		    // If it's desired to kill the session, also delete the session cookie.
		    // Note: This will destroy the session, and not just the session data!
		    if (ini_get("session.use_cookies")) {
		        $params = session_get_cookie_params();
		        setcookie(session_name(), '', time() - 42000,
		            $params["path"], $params["domain"],
		            $params["secure"], $params["httponly"]
		        );
		    }
		    // Finally, destroy the session.
		    session_destroy();
		    header('Location: index.php');
		}
	}
?>