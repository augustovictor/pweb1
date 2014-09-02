<?php  

	class Usuario {
		private $login;
		private $nome;
		private $email;
		private $senha;

		function __construct($login, $nome, $email, $senha) {
			$this->login = $login;
			$this->nome = $nome;
			$this->email = $email;
			$this->senha = $senha;
		}

		public function getLogin() {
			return $this->login;
		}
		public function getEmail() {
			return $this->email;
		}

		public function getNome() {
			return $this->nome;
		}

		// public function register() {
		// 	$query = "INSERT INTO ";
		// }

	}

?>