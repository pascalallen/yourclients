<?php
	require_once "../Client.php";
	$user_id = $_POST['user_id'];
	echo json_encode(Client::findByUserId($user_id),true);