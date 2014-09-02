<?php  
	include 'db_config.php';
	include 'shared/_session.php';

	if (isset($_POST)) {

		// Check if login already exists
		$loginAttempt = $_POST['login'];
		$query = "SELECT login FROM usuarios WHERE login=?";
		$stmt = $mysqli->prepare($query);
		$stmt->bind_param('s', $loginAttempt);
		$stmt->execute();

		// Bind results
		$stmt->bind_result($login);

		// Fetch records
		while ($stmt->fetch()) {
			if ($login == $loginAttempt) {
				header("Location: index.php?message=Login already exists.");
			}
			break;
		}

		// Query to insert
		$query = "INSERT INTO usuarios VALUES(?, ?, ?, ?, ?)";

		// Prepare query
		$stmt = $mysqli->prepare($query);

		// Password md5
		$password = md5($_POST['password']);

		$id = '';
		// Bind parameters
		if ($stmt->bind_param('sssss', $id, $_POST['login'], $_POST['email'], $_POST['name'], $password)) {
			if ($stmt->execute()) {
				newUserLogged($_POST['login'], $_POST['email']);
				header("Location: index.php?status=success");
			}
			else {
				die("Unable to execute");
			}
		}
		else {
			die("Unable to bind parameters.");
		}

		$mysqli->close();

	}

?>