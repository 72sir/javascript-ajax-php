<?php
	function Sql_connect() {
		require __DIR__ . '/const.php';
		$link = mysqli_connect($host, $user, $password, $database);
        return $link;
	}

	function Sql_query($query) {
	    $link = Sql_connect();

		if ($link) {
            return (mysqli_query($link, $query));
        } else {
			return [['Database Error'] =>  "Erros"];
		}
    }


?>

