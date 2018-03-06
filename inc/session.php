<?php 
function open ()//pour l'ouverture
{
		
		gc();//on appelle la fonction gc		
		return true;//true ou false selon la réussite ou non de la connexion à la bdd
}
function close()
{
	return true;
}
function read ($sid)
{

   $sql="select * from session";
		try{
			$con=connexionMySQL();
			$stmt=$con->query($sql);
			$donne=array();
			while($d=$stmt->fetch()){
					$donne[]=$d['sess_datas'];
			}
		}catch (PDOException $e) {
        	print "Erreur ! : " . $e->getMessage();
        	die();
       		}
		return $donne;

}
function write ($sid, $data)
{
	try{
	
	$expire = intval(time() + 7200);//calcul de l'expiration de la session (ici par exemple, deux heures).
		
	//$sql = "select * from session WHERE sess_id = '.$sid.' ";
		
			$con=connexionMySQL();
			//$return=$con->query($sql);
	 
	//if(!isset($return[0]))//si la session n'existe pas encore
	//{
		$sql = "INSERT INTO session VALUES('".$sid."','".$data."','".$expire."')";//alors on la crée
	/*}
	else//sinon
	{
		$sql = "UPDATE session 
			SET sess_datas = '.$data.',
			sess_expire = '.$expire.'
			WHERE sess_id = '.$sid.' ";//on la modifie
	}	*/	
	
	$query=$con->query($sql);	
	}catch (PDOException $e) {
       	 print "Erreur ! : " . $e->getMessage();
       	 die();
       	}
	return $query;
}
function destroy ($sid)//destruction
{
	try{
	$sql = "DELETE FROM session WHERE sess_id = '".$sid."' ";//on supprime la session de la bdd
	$con=connexionMySQL();
	$query=$con->query($sql);
	}catch (PDOException $e) {
        	print "Erreur ! : " . $e->getMessage();
        	die();
       	}
	return $query;
}
function gc ()
{
	try{
	$sql = "DELETE FROM session WHERE sess_expire < ".time(); //on supprime les vieilles sessions 			
	$con=connexionMySQL();
	$query=$con->query($sql);
	}catch (PDOException $e) {
        	print "Erreur ! : " . $e->getMessage();
        	die();
       	}
	return $query;
}
?>