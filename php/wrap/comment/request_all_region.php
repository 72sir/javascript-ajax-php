<?php
    include("/../../db/connect.php");

    $query="SELECT * FROM `region` WHERE country_id = 3159";

	$result = go_mysql($query);

	if ($result) {
		$num = mysqli_num_rows($result);
		
		$region = array();
		$name = array();
		$all = array();
	 
		for ($i=0; $i<$num; $i++) {
			$row[$i] = mysqli_fetch_row($result);

			$name[$i] = $row[$i][3];
			$region[$i] = $row[$i][0];
		}
	
		$i=0;
		foreach ($region as $r) {
			$all[] = array(
				'id'=>$r,
				'name'=> $name[$i],
			);
			$i++;
		}
		$result = array('region'=>$all); 
	}
	else {
		$result = array('type'=>'error');
	}
	print json_encode($result);
?>