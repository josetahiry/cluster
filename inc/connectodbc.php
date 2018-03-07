<?php
	function getodbc(){
		$tns = "
		(DESCRIPTION =
			(ADDRESS_LIST =
				(ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521))
			)
			(CONNECT_DATA =
				(SERVICE_NAME = XE)
			)
		)
		";
		$user = "tahiry";
		$pass = "root";
		try {
			$conn = new PDO("oci:dbname=".$tns, $user, $pass);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $conn;
		}
		catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
	}
?>