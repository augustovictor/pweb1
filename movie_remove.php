<?php 
	include 'db_config.php';

	// Query to remove
	$query = "DELETE FROM filmes WHERE id=?";

	// Prepare query
	$stmt = $mysqli->prepare($query);

	// Bind values
	$stmt->bind_param('s', $_GET['movie_id']);

	if ($stmt->execute()) {
		header("Location: movies.php?message=Movie removed");
	}
	else {
		die("Unable to remove movie.");
	}
?>