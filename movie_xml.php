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

		$doc = new DOMDocument('1.0', 'UTF-8');

		$doc->formatOutput = true;

		$root = $doc->createElement('movie');
		$root = $doc->appendChild($root);

		// Title
		$nodeTitulo = $doc->createElement('titulo');
		$nodeTitulo = $root->appendChild($nodeTitulo);

		$tituloText = $doc->createTextNode($titulo);
		$tituloText = $nodeTitulo->appendChild($tituloText);

		// Gender
		$nodeGenero = $doc->createElement('genero');
		$nodeGenero = $root->appendChild($nodeGenero);

		$generoText = $doc->createTextNode($genero);
		$generoText = $nodeGenero->appendChild($generoText);

		// Release date
		$nodeDate = $doc->createElement('data_lancamento');
		$nodeDate = $root->appendChild($nodeDate);

		$dateText = $doc->createTextNode($data_lancamento);
		$dateText = $nodeDate->appendChild($dateText);

		// Path
		// $nodePath = $doc->createElement('path');
		// $nodePath = $root->appendChild($nodePath);

		// $pathText = $doc->createTextNode($path);
		// $pathText = $nodePath->appendChild($pathText);

		

		header('Content-type: text/xml');
		header('Content-Disposition: attachment; filename="filme.xml"');
		echo $doc->saveXML();
		// $doc->saveXml();


		
	}

	
?>