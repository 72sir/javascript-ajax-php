<?php
    include("/../../db/connect.php");

    $lastName = $_POST['lastName'];
	$firstName = $_POST['firstName'];
	$middleName = $_POST['middleName'];
	$phoneName = $_POST['phoneName'];
	$emailName = $_POST['emailName'];
	$country_id = $_POST['country_id'];
	$city_id = $_POST['city_id'];
	$commentName = $_POST['commentName'];

	$query="INSERT INTO `users`(`lastName`, `firstName`, `middleName`, `phoneName`, `emailName`, `country_id`, `city_id`, `commentName`)
	VALUES ('$lastName', '$firstName', '$middleName', '$phoneName', '$emailName', $country_id, $city_id, '$commentName')";

	$result = go_mysql($query);
	print("Save comment.");

?>			