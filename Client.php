<?php 
	require_once "Model.php";
	class Client extends Model
	{
		protected static $table = 'clients';

		public static function findByUserId($user_id)
		{
			self::dbConnect();
	        $table = static::$table;
	        $query = "SELECT * FROM $table WHERE user_id = :user_id";
	        $stmt = self::$dbc->prepare($query);
	        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
	}