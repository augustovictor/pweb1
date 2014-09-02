<?php  

	include 'db_config.php';


	$q = '%' . $_GET['q'] . '%';

	// Query to select
	$query = "SELECT titulo FROM filmes WHERE titulo LIKE ?";

	// Prepare query
	$stmt = $mysqli->prepare($query);

	// Bind parameters
	$stmt->bind_param('s', $q);

	// Execute
	$stmt->execute();

	// Bind results
	$stmt->bind_result($titulo);

	while ($stmt->fetch()) {
		echo $titulo . '<br />';
	}


?>