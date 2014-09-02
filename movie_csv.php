<?php  

	include 'db_config.php';
	include 'shared/_session.php';

	if ($_GET['movie_id']) {

		$id = $_GET['movie_id'];

		// Query to select movie
		$query = "SELECT titulo, genero, data_lancamento, path FROM filmes WHERE id=?";

		// Prepare query
		$stmt = $mysqli->prepare($query);

		// Bind values
		$stmt->bind_param('i', $id);

		// Execute
		$stmt->execute();

		// Bind result
		$stmt->bind_result($titulo, $genero, $data_lancamento, $path);

		while ($stmt->fetch()) {}

		$titulo = iconv('UTF-8', 'Windows-1252', $titulo);
		$genero = iconv('UTF-8', 'Windows-1252', $genero);
		$data_lancamentoText = iconv('UTF-8', 'Windows-1252', 'Data de lançamento');

		// create a file pointer connected to the output stream
		$file = fopen('filme.csv', 'w');

		// output the column headings
		fputcsv($file, array('Titulo', 'Genero', $data_lancamentoText));

		fputcsv($file, array($titulo, $genero, $data_lancamento));

		fclose($file);
		

		header('Content-type: text/csv');
		header('Content-Disposition: attachment; filename="filme.csv"');
		readfile('filme.csv');

		
	}

	
?>