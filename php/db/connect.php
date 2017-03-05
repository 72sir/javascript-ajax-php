<?php
	function go_mysql($query) {
		require __DIR__ . '/const.php';
		$con = mysqli_connect($host, $user, $password, $database);
		if ($con) {
			mysqli_select_db($con, "ajax");
			$result = mysqli_query($con, $query);
			mysqli_close($con);
			return ($result);
		} else {
			echo "Database Error: " . mysql_error()."<br><b>$query</b>";
			die();
		}
	}
?>


