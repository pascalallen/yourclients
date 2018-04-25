<?php 
	require_once "Model.php";
	class User extends Model
	{
		protected static $table = 'users';

		public static function findByEmail($email)
		{
			self::dbConnect();
	        $table = static::$table;
	        $query = "SELECT * FROM $table WHERE email = :email";
	        $stmt = self::$dbc->prepare($query);
	        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
	        $stmt->execute();
	        $result = $stmt->fetch(PDO::FETCH_ASSOC);
	        // Set the attributes on the calling object based on the result variable's contents
	        $instance = null;
	        if ($result)
	        {
	            $instance = new static;
	            $instance->id = $result['id'];
	            $instance->name = $result['name'];
	            $instance->email = $result['email'];
	            $instance->password = $result['password'];
	        }
	        return $instance;
		}
	}

    ///////////////////////////////////////////////////////////////////////////
    //                      EXAMPLES OF USAGE BELOW!!                     	 //
    ///////////////////////////////////////////////////////////////////////////

	/*
	 * Create new user and assign attributes
	 */
	// $user = new User();
	// $user->first_name = 'Pascal';
	// $user->last_name = 'Allen';
	// $user->email = 'thomaspascalallen@yahoo.com';
	// $user->save();

	/*
	 * Find user by id and update attributes
	 */
	// $user = User::find(13);
	// $user->first_name = 'Thomas';
	// $user->save();

	/*
	 * Get all users and echo their first names
	 */
	// $users = User::all();
	// foreach($users as $user)
	// {
	// 	echo $user->first_name;
	// }