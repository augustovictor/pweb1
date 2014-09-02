<?php 

	// Set variables

	$xml_file_name = 'db.xml';
	$xml_file = null;

	// Get values from db.xml
	if (file_exists($xml_file_name)) {
		$xml_file = simplexml_load_file($xml_file_name);
			
		$host = (string)$xml_file->host;
		$user = (string)$xml_file->user;
		$password = (string)$xml_file->password;
		$database = (string)$xml_file->db;


		// Connects to database

		// Create conection
		$mysqli = new mysqli($host, $user, $password, $database);
		
		if ($mysqli->connect_error) {
			die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
		}
		
			

	}

?>