<?php  
	
	include 'db_config.php';
	include 'shared/_session.php';

	// Check if login already exists
		$loginAttempt = $_POST['login'];
		$query = "SELECT login, senha, email FROM usuarios WHERE login=?";
		$stmt = $mysqli->prepare($query);
		$stmt->bind_param('s', $loginAttempt);
		$stmt->execute();

		// Bind results
		$stmt->bind_result($login, $password, $email);

		$senha = md5($_POST['password']);

		$stmt->store_result();

		// Fetch records
		while ($stmt->fetch()) {
			if ($login == $loginAttempt && $senha == $password) {
				newUserLogged($login, $email);
			}
		}

		if($stmt->num_rows == 0) {
			header("Location: index.php?message=Loggin failed.");
		}
		

?>