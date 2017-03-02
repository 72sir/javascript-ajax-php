<?php
	include("/../../db/connect.php");

	$query="SELECT r.name as rName, c.name as cName, COUNT( u.commentName ) AS countComment
			FROM  `users` as u 
				inner join `region` as r on u.country_id = r.region_id 
				inner join `city` as c on u.city_id = c.city_id 
			GROUP BY rName
			HAVING COUNT( u.commentName ) >0";

	$result = go_mysql($query);

	$query="SELECT r.name as rName, c.name as cName, COUNT( u.commentName ) AS countComment
			FROM  `users` as u 
				inner join `region` as r on u.country_id = r.region_id 
				inner join `city` as c on u.city_id = c.city_id 
			GROUP BY cName
			HAVING COUNT( u.commentName ) >0
			ORDER BY rName ";
	$result2 = go_mysql($query);

	function sort_the_data_on_request($result, $name_arr){
		if ($result) {
			$num = mysqli_num_rows($result);
			
			$nameRegion = array();
			$nameCity = array();
			$countComment = array();
		 
			for ($i=0; $i<$num; $i++) {
				$row[$i] = mysqli_fetch_row($result);

				$nameRegion[$i] = $row[$i][0];
				$nameCity[$i] = $row[$i][1];
				$countComment[$i] = $row[$i][2];
			}
		
			$i=0;
			foreach ($countComment as $r) {
				$count[] = array(
					'nameRegion'=>$nameRegion[$i],
					'nameCity'=>$nameCity[$i],
					'countComment'=> $countComment[$i],
				);
				$i++;
			}
			$result = array($name_arr=>$count);
			return $result;
		}
		else {
			$result = array('type'=>'error');
		}
	}

	$result = sort_the_data_on_request($result, 'count');
	$result += sort_the_data_on_request($result2, 'countCity');

	print json_encode($result);
?>


