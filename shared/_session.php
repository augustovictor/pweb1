<?php  

	session_start();

	function isUserLogged() {
		if (isset($_SESSION['login']) && isset($_SESSION['email'])) { return true; }
	}

	function mustBeLogged() {
		if(!isUserLogged())
			header("Location: index.php?message=You should sign in first");

	}

	function newUserLogged($login, $email) {
		$_SESSION['login'] = $login;
		$_SESSION['email'] = $email;
		header('Location: index.php?status=loggedIn');
	}

	function logout() {
		session_destroy();
		header('Location: index.php?status=loggedOut');
	}

?>