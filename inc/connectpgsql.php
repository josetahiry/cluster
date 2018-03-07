<?php
	function getpgsql(){
		$user='postgres';
		$pass='root';
		$dsn='pgsql:host=localhost;port=5432;dbname=TP1';

		try {
			$dbh = new PDO($dsn, $user, $pass);
			return $dbh;
		}
		catch (PDOException $e) {
			print "Erreur: " . $e->getMessage()."<br />";
			die();
		}
	}
?>