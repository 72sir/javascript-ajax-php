<?php
    include("/../../db/connect.php");
	$country_id = @intval($_POST['country_id']);

    $query="SELECT * FROM `city` WHERE region_id=$country_id";

	$result = go_mysql($query);

    if ($result)
        $num = mysqli_num_rows($result);

        $city = array();
        $id_city = array();

        for ($i=0; $i<$num; $i++) {
            $row[$i] = mysqli_fetch_row($result);
            $id_city[$i] = $row[$i][0];
            $city[$i] = $row[$i][3];
        }

        $i=0;
        foreach ($city as $r) {
            $regions[] = array('id'=>$id_city[$i], 'title'=>$r);
            $i++;
        }
        $result = array('type'=>'success', 'regions'=>$regions);
	}
	else {
		$result = array('type'=>'error');
	}
	print json_encode($result);
?>			