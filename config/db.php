<?php 

require_once $_SERVER['DOCUMENT_ROOT'] . '/Hackthon-Back/config/config.php';

	class Conection {

		public static function connect() {
			try {
				$conn = new PDO(DRIVE . ":host=" . LOCAL_DO_BANCO . ";dbname=" . NOME_DO_BANCO . ";charset=" . CHARSET , USUARIO, SENHA);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				return $conn;
			} catch (PDOException $e) {
				echo "Database Error: " . $e->getMessage();
			}
		}
	};

