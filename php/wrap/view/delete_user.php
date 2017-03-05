<?php
    require __DIR__ . '/../../db/connect.php';

	$user_id = $_POST['user_id'];
	$query="DELETE FROM `users` WHERE ID=$user_id";
	$regs = go_mysql($query);

	print json_encode($result);
?>