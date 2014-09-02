<?php  
	include 'db_config.php';
	include 'shared/_session.php';

	$img_path = '';


	if (!isset($_POST['submit'])) {
		// Retrieve values from database
		$id = $_GET['movie_id'];


		// Query to select
		$query = "SELECT titulo, genero, data_lancamento, path FROM filmes WHERE id=?";
		$stmt = $mysqli->prepare($query);
		$stmt->bind_param('i', $id);
		$stmt->execute();

		// Bind results
		$stmt->bind_result($titulo, $genero, $data_lancamento, $path);

		while ($stmt->fetch()) {}

		$img_path = $path;
	}


	// Form Submited		
	if (isset($_POST['submit'])) {

		// Validate title and date format
		$regexTitle ="/^([a-z A-Z]|\d)+(-?(\w)?|\d)*/";
		$regexDate = "/[0-9]\d{3}\-[0-9]\d{1}\-[0-9]\d{1}/";

		if(!preg_match($regexTitle, $_POST['titulo'])) {
			header("Location: movie_edit_view.php?movie_id={$_GET['movie_id']}&message=Wrong format in title.");
			exit();
		}

		if(!preg_match($regexDate, $_POST['data_lancamento'])) {
			header("Location: movie_edit_view.php?movie_id={$_GET['movie_id']}&message=Wrong format in data_lancamento.");
			exit();
		}
		if ($_FILES["file"]['name'] != $img_path) {
			// Image
			if ($_FILES["file"]["error"] > 0) {
				echo "Error: " . $_FILES["file"]["error"] . "<br>";
			}
			
			$fileName = strTolower($_FILES['file']['name']);
			$fileType = $_FILES['file']['type'];
			$fileSize = $_FILES['file']['size'];

			if (move_uploaded_file($_FILES['file']['tmp_name'], ('uploads/' . $fileName))) {

			}

			// Query to insert
			$query = "UPDATE filmes SET titulo=?, genero=?, data_lancamento=?, path=? WHERE id=?";

			// Prepare query
			$stmt = $mysqli->prepare($query);

			$id = $_GET['movie_id'];

			$titulo = $_POST['titulo'];
			$genero = $_POST['genero'];
			$data_lancamento = $_POST['data_lancamento'];

			// Bind parameters
			if ($stmt->bind_param('ssssi', $_POST['titulo'], $_POST['genero'], $_POST['data_lancamento'], $fileName, $id)) {
				if ($stmt->execute()) {
					header("Location: movies.php?message=Movie updated.");
				}
				else {
					die("Unable to execute");
				}
			}
			else {
				die("Unable to bind parameters.");
			}
		}
		// End isset($fileName)

		if ($_FILES["file"]['name'] == $img_path) {
			// Query to insert
			$query = "UPDATE filmes SET titulo=?, genero=?, data_lancamento=? WHERE id=?";

			// Prepare query
			$stmt = $mysqli->prepare($query);

			$id = $_GET['movie_id'];

			$titulo = $_POST['titulo'];
			$genero = $_POST['genero'];
			$data_lancamento = $_POST['data_lancamento'];

			// Bind parameters
			if ($stmt->bind_param('sssi', $_POST['titulo'], $_POST['genero'], $_POST['data_lancamento'], $id)) {
				if ($stmt->execute()) {
					header("Location: movies.php?message=Movie updated.");
				}
				else {
					die("Unable to execute");
				}
			}
			else {
				die("Unable to bind parameters.");
			}
		}
		// End isset($fileName)

		// $mysqli->close();
	}

?>

<?php include 'shared/_header.php'; ?>

<div class="container">

	<?php include 'shared/_topbar.php'; ?>

	<hr class="col-md-12">
		
	

	<div class="row col-md-12">

		<h1> Edit movie <?php echo '<i>' . $titulo . '</i>'; ?> </h1>

		<form action="movie_edit_view.php?movie_id=<?php echo $_GET['movie_id']; ?>" class="form col-md-6" method="post" role="form" enctype="multipart/form-data">
			<div class="form-group col-md-8">
				<label for="titulo">Título</label>
				<input type="text" id="titulo" class="form-control" name="titulo" value="<?php echo $titulo; ?>" placeholder="Name" required="true" />
			</div>

			<div class="form-group col-md-8">
				<label for="genero">Gênero</label>
				<select class="form-control" id="genero" name="genero">
					<option <?php if($genero == 'Ação') echo 'selected'; ?> >Ação</option>
					<option <?php if($genero == 'Aventura') echo 'selected'; ?> >Aventura</option>
					<option <?php if($genero == 'Comédia') echo 'selected'; ?> >Comédia</option>
					<option <?php if($genero == 'Guerra') echo 'selected'; ?> >Guerra</option>
					<option <?php if($genero == 'Horror') echo 'selected'; ?> >Horror</option>
					<option <?php if($genero == 'Policial') echo 'selected'; ?> >Policial</option>
					<option <?php if($genero == 'Suspense') echo 'selected'; ?> >Suspense</option>
					<option <?php if($genero == 'Terror') echo 'selected'; ?> >Terror</option>
				</select>
			</div>

			<div class="form-group col-md-8">
				<label for="data_lancamento">Data de lançamento</label>
				<input type="date" id="data_lancamento" class="form-control" value="<?php echo $data_lancamento; ?>" name="data_lancamento" placeholder="Name" required="true" />
			</div>

			<div class="form-group col-md-8">
				<label for="file">Poster</label>
				<img class="col-md-12 img-respnsive" src="uploads/<?php echo $path; ?>" />
				<br />
				<input type="file" id="file" name="file" value="null" />
				<p class="help-block">You can upload an awesome poster!</p>
			</div>

			<div class="form-group col-md-8">
				<button type="submit" name="submit" class="btn btn-success">Save</button>
				<a href="movies.php" class="btn btn-danger"> Cancel </a>
			</div>

		</form>

	</div>

</div>

<?php include 'shared/_footer.php' ?>