<?php  
	include 'db_config.php';
	include 'shared/_session.php';

	if (isset($_POST['submit'])) {

		$id = '';

		$regexTitle ="/^([a-z A-Z]|\d)+(-?(\w)?|\d)*/";
		$regexDate = "/[0-9]\d{3}\-[0-9]\d{1}\-[0-9]\d{1}/";

		if(!preg_match($regexTitle, $_POST['titulo'])) {
			header("Location: movie_add_view.php?message=Wrong format in title.");
			exit();
		}

		if(!preg_match($regexDate, $_POST['data_lancamento'])) {
			header("Location: movie_add_view.php?message=Wrong format in data_lancamento.");
			exit();
		}

		$fileName = 'default-movie.png';

		if (!empty($_FILES['file']['name'])) {
			$fileName = strTolower($_FILES['file']['name']);
			$fileType = $_FILES['file']['type'];
			$fileSize = $_FILES['file']['size'];

			// Image
			if ($_FILES["file"]["error"] > 0) {
				echo "Error: " . $_FILES["file"]["error"] . "<br>";
			}
		}



		if (move_uploaded_file($_FILES['file']['tmp_name'], ('uploads/' . $fileName)) || isset($fileName)) {
			// Query to insert
			$query = "INSERT INTO filmes VALUES(?, ?, ?, ?, ?)";

			// Prepare query
			$stmt = $mysqli->prepare($query);

			// Bind parameters
			if ($stmt->bind_param('sssss', $id, $_POST['titulo'], $_POST['genero'], $_POST['data_lancamento'], $fileName)) {
				if ($stmt->execute()) {
					header("Location: movies.php?message=Movie added.");
				}
				else {
					die("Unable to execute.");
				}
			}
			else {
				die("Unable to bind parameters.");
			}
		}
		else {
			die("Unable to upload");
		}

	}

	if (isset($_POST['submitXml'])) {
		$xmlFileName = $_FILES['file']['name'];
		if (move_uploaded_file($_FILES['file']['tmp_name'], ('xml/' . $xmlFileName))) {
			if(file_exists('xml/' . $xmlFileName)) {
				$xml = simplexml_load_file('xml/' . $xmlFileName);

				$id = '';
				$titulo = (string)$xml->titulo;
				$genero = (string)$xml->genero;
				$data_lancamento = (string)$xml->data_lancamento;
				$imgFileName = 'default-movie.png';

				// Query to insert
				$query = "INSERT INTO filmes VALUES(?, ?, ?, ?, ?)";

				// Prepare query
				$stmt = $mysqli->prepare($query);

				// Bind parameters
				$stmt->bind_param('sssss', $id, $titulo, $genero, $data_lancamento, $imgFileName);

				// Execute
				if ($stmt->execute()) {
					header("Location: movies.php?message=Movie added.");
				}
				else
					die("Unable to execute");

			}
		}
		

	}

?>