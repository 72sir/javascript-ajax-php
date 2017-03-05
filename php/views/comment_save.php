<?php
    require_once __DIR__ . '/../functions/SQL.php';

    $lastName = $_POST['lastName'];
	$firstName = $_POST['firstName'];
	$middleName = $_POST['middleName'];
	$phoneName = $_POST['phoneName'];
	$emailName = $_POST['emailName'];
	$country_id = $_POST['country'];
	$city_id = $_POST['city'];
	$commentName = $_POST['commentName'];

    if (isset($lastName) && isset($firstName) && isset($middleName) && isset($phoneName) && isset($emailName)
       && isset($country_id) && isset($city_id) && isset($commentName)) {
        $query="INSERT INTO `users`(`lastName`, `firstName`, `middleName`, `phoneName`, `emailName`, `country_id`, `city_id`, `commentName`)
        VALUES ('$lastName', '$firstName', '$middleName', '$phoneName', '$emailName', $country_id, $city_id, '$commentName')";

        print Sql_query($query);
    }

?>			