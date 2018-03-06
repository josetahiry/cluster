<?php
	function connexion($pseudo, $pass){
		try{
			$conn = connexionMySQL();
			$Res = $conn->query("select * from player where pseudo='".$pseudo."' and password='".$pass."'");
			$i = 0;
			$Res->setFetchMode(PDO::FETCH_OBJ);
			while( $ligne = $Res->fetch() ){
				$i++;
			}
			$Res->CloseCursor();
			return $i;
		}
		catch(Exception $e){
			echo 'Erreur:'.$e->getMessage().'<br />';
			die();
		}
	}
	function inscription($pseudo, $age, $pass){
		try{
			$conn = connexionMySQL();
			$Res = $conn->query("insert into player values('".$pseudo."',".$age.",'".$pass."')");
			$Res->setFetchMode(PDO::FETCH_OBJ);
		}
		catch(Exception $e){
			echo 'Erreur:'.$e->getMessage().'<br />';
			die();
		}
	}
	function checkexist($pseudo){
		try{
			$conn = connexionMySQL();
			$Res = $conn->query("select * from player where pseudo='".$pseudo."'");
			$i = 0;
			$Res->setFetchMode(PDO::FETCH_OBJ);
			while( $ligne = $Res->fetch() ){
				$i++;
			}
			$Res->CloseCursor();
			return $i;
		}
		catch(Exception $e){
			echo 'Erreur:'.$e->getMessage().'<br />';
			die();
		}
	}
	if(isset($_GET["name"])){
		$name = $_GET['name'];
		$number = $_GET['number'];
		$level = $_GET['level'];
		addColor($name, $number, $level);
	}
	function addColor($n, $nb, $lvl){
		$connexion=connexionMySQL();
		try{
		$connexion->exec("insert into score values('$n',$nb)");
		header("Location:../pages/mastermindstat.php?level=$lvl");
		}catch(PDOException $e){
		echo ($e->getMessage());
		}
	}
	function showAll(){
		$connexion=connexionMySQL();
		try{
		$resultats1=$connexion->query("select*from score"); // on va chercher tous les membres de la table qu'on trie par ordre croissant
		$resultats1->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet
		$result=array();
		while( $ligne = $resultats1->fetch() ) // on récupère la liste des membres 
		{
			$result[] = $ligne;
		} 
		$connexion = null;
		}catch(PDOException $e){
		echo ($e->getMessage());
		}
		return $result;
	}
	function getStat(){
		$connexion=connexionMySQL();
		try{
		$resultats1=$connexion->query("select name, avg(attempt)*count(name) as att from score group by name order by att");
		$resultats1->setFetchMode(PDO::FETCH_OBJ);
		$result=array();
		while( $ligne = $resultats1->fetch() )
		{
			$result[] = $ligne;
		} 
		$connexion = null;
		}catch(PDOException $e){
		echo ($e->getMessage());
		}
		return $result;
	}
?>