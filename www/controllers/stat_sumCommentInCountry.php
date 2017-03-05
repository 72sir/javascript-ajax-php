<?php
    require_once __DIR__ . '/../functions/SQL.php';
    require __DIR__ . '/../models/stat.php';

	$query1="SELECT r.name as rName, c.name as cName, COUNT( u.commentName ) AS countComment
			FROM  `users` as u
				inner join `region` as r on u.country_id = r.region_id
				inner join `city` as c on u.city_id = c.city_id
			GROUP BY rName
			HAVING COUNT( u.commentName ) > 0";

	$query2="SELECT r.name as rName, c.name as cName, COUNT( u.commentName ) AS countComment
			FROM  `users` as u
				inner join `region` as r on u.country_id = r.region_id
				inner join `city` as c on u.city_id = c.city_id
			GROUP BY cName
			HAVING COUNT( u.commentName ) > 0
			ORDER BY rName ";

    $res1 = Sql_query($query1);
	$res2 = Sql_query($query2);

	$res = sort_the_data_on_request($res1, 'count');
	$res += sort_the_data_on_request($res2, 'countCity');

	print json_encode($res);


