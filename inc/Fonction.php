<?php
    function getConnexion()
  {
      $users='itu';
      $pass='itu';
      $port=90;
      $host='192.168.1.109';
      $dbname='master';
      $dsn='mysql:host='.$host.':'.$port.';dbname='.$dbname;      	
	try {
				
		$dbh = new PDO($dsn, $users, $pass);
		return $dbh;
				
	} catch (PDOException $e) {
		print "Erreur ! : " . $e->getMessage();
		die();
		}
  }

function getServerId(){
  try{
    $req="SELECT @@server_id as id";
    $liste;
    $con=getConnexion();
    $res2=$con->query($req);
    $res2->setFetchMode(PDO::FETCH_OBJ);
    while($ligne = $res2->fetch()){
        $liste=$ligne->id;
    }
    return $liste;
  }catch (Exception $ex) {
    echo ($ex->getMessage());
  } 
}

function getTypeByArticle($art)
{
     try
      {
    $req="select idtype from article where id='".$art."'";
    echo $req;
    $liste;
    $con=getConnexion();
    $res2=$con->query($req);
    $res2->setFetchMode(PDO::FETCH_OBJ);
    while($ligne = $res2->fetch())
    {
        $liste=$ligne->idtype;
    }
    return $liste;
      }
     catch (Exception $ex) {
        echo ($ex->getMessage());
    } 
}
 function listType()
  {
   try
      {
    $liste=array();
    $con=getConnexion();
    $res2=$con->query("select *from type");
    $res2->setFetchMode(PDO::FETCH_OBJ);

     while($ligne = $res2->fetch())
    {
        $liste[]=$ligne;
    }
    $con=null;    
    return $liste;
    } catch (Exception $ex) {
        echo ($ex->getMessage());
    } 
      
  }
 
  function getArticleByType($type)
  {
      try
      {
    $req="select*from article where idtype='".$type."'";
    $liste=array();
    $con=getConnexion();
    $res2=$con->query($req);
    $res2->setFetchMode(PDO::FETCH_OBJ);
    while($ligne = $res2->fetch())
    {
        $liste[]=$ligne;
    }
    return $liste;
      }
  
     catch (Exception $ex) {
        echo ($ex->getMessage());
    } 
  }
    function getArticleByid($id)
    {
         try
      {
    $req="select*from article where id='".$id."'";
    $liste;
    $con=getConnexion();
    $res2=$con->query($req);
    $res2->setFetchMode(PDO::FETCH_OBJ);
    while($ligne = $res2->fetch())
    {
        $liste=$ligne;
    }
    $con=null;
    return $liste;
      }
  
     catch (Exception $ex) {
        echo ($ex->getMessage());
    } 
    }
    function getArticle()
  {
      try
      {
    $req="select*from article";
    $liste=array();
    $con=getConnexion();
    $res2=$con->query($req);
    $res2->setFetchMode(PDO::FETCH_OBJ);
    while($ligne = $res2->fetch())
    {
        $liste[]=$ligne;
        
    }
     $con=null; 
    return $liste;
      }
  
     catch (Exception $ex) {
        echo ($ex->getMessage());
    } 
  }
  function getLocationImage($id)
  {
      try
      {
    $req="select location from image where id='".$id."'";
    $liste;
    $con=getConnexion();
    $res2=$con->query($req);
    $res2->setFetchMode(PDO::FETCH_OBJ);
    while($ligne = $res2->fetch())
    {
        $liste=$ligne->location;
    }
     $con=null; 
    return $liste;
      }

     catch (Exception $ex) {
        echo ($ex->getMessage());
    }
  }
  function getStock($art)
  {
    try
      {
    $req="select quantite from stock where idArticle='".$art."'";
    $liste;
    $con=getConnexion();
    $res2=$con->query($req);
    $res2->setFetchMode(PDO::FETCH_OBJ);
    while($ligne = $res2->fetch())
    {
        $liste=$ligne->quantite;
    }
     $con=null; 
    return $liste;
      }

     catch (Exception $ex) {
        echo ($ex->getMessage());
    }
  }
  function getPU($art)
  {
      try
      {
    $req="select prixunitaire from article where id='".$art."'";
    $liste;
    $con=getConnexion();
    $res2=$con->query($req);
    $res2->setFetchMode(PDO::FETCH_OBJ);
    while($ligne = $res2->fetch())
    {
        $liste=$ligne->prixunitaire;
    }
     $con=null; 
    return $liste;
      }

     catch (Exception $ex) {
        echo ($ex->getMessage());
    }
  }
  function countPanier($pseudo)
  {
      $req="select count(*) as isa from panier where idPseudo='".$pseudo."'";
      $liste;
    $con=getConnexion();
    $res2=$con->query($req);
    $res2->setFetchMode(PDO::FETCH_OBJ);
    while($ligne = $res2->fetch())
    {
        $liste=$ligne->isa;
    }
     $con=null; 
    return $liste;
  }
  function countArticle($art,$pseudo)
  {
      $req="select count(*) as isa from panier where idArticle='".$art."' and idPseudo='".$pseudo."'";
    $liste;
    $con=getConnexion();
    $res2=$con->query($req);
    $res2->setFetchMode(PDO::FETCH_OBJ);
    while($ligne = $res2->fetch())
    {
        $liste=$ligne->isa;
    }
     $con=null; 
    return $liste;
  }
  function totalArticle($art,$pseudo)
  {
      $isa=countArticle($art,$pseudo);
      $pu=getPU($art);
      $total=$isa*$pu;
      return $total;
  }
  function totalPanier($pseudo)
  {
      $total=0;
      $list=getArticlePanier($pseudo);
      foreach ($list as $mylist) {
        $total+=totalArticle($mylist,$pseudo);
      }
      return $total;
  }
  function getArticlePanier($pseudo)
  {
      try
      {
    $req="select distinct idArticle from panier where idPseudo='".$pseudo."'";
    $liste=array();
    $con=getConnexion();
    $res2=$con->query($req);
    $res2->setFetchMode(PDO::FETCH_OBJ);
    while($ligne = $res2->fetch())
    {
        $liste[]=$ligne->idArticle;
        
    }
     $con=null; 
    return $liste;
      }
  
     catch (Exception $ex) {
        echo ($ex->getMessage());
    } 

  }

  function addPanier($art,$pseudo)
  {
      try
    {
    $insert="insert into panier values('".$pseudo."','".$art."',1)";
    $con=getConnexion();
    $resultats1=$con->query($insert);
    $type=getTypeByArticle($art);
    $con=null;
    }
 catch (Exception $ex) {
        echo ($ex->getMessage());
    }
  }
  function delPanier($art,$pseudo)
  {
      try
    {
    $insert="delete from panier where idArticle='".$art."' and idPseudo='".$pseudo."' limit 1";
    $con=getConnexion();
    $resultats1=$con->query($insert);
    $type=getTypeByArticle($article);
    $con=null;
    }
 catch (Exception $ex) {
        echo ($ex->getMessage());
    }
  }
  function deletePanier($art,$pseudo)
  {
       try
    {
    $insert="delete from panier where idArticle='".$art."' and idPseudo='".$pseudo."'";
    $con=getConnexion();
    $resultats1=$con->query($insert);
    $type=getTypeByArticle($article);
    $con=null;
    }
 catch (Exception $ex) {
        echo ($ex->getMessage());
    }
  }
  function getStockArticle($art)
  {
      try
      {
    $req="select quantite as qu from stock where idArticle='".$art."'";
    $liste;
    $con=getConnexion();
    $res2=$con->query($req);
    $res2->setFetchMode(PDO::FETCH_OBJ);
    while($ligne = $res2->fetch())
    {
        $liste=$ligne->qu;
        
    }
     $con=null; 
    return $liste;
      }
  
     catch (Exception $ex) {
        echo ($ex->getMessage());
    } 
  }
  function isDispo($art)
  {
      $result;
      if(getStockArticle($art)!=0)
      {
          $result=1;
      }
      else
      {
          $result=0;
      }
      return $result;
  }
  function gestionStock($art,$action)
  {
      if($action==1)
      {
          echo $action;
          ajoutStock($art);
      }
      else{
          echo $action;
          enleveStock($art);
      }
  }
  function enleveStock($art)
  {
      $stock=getStockArticle($art);
      $stock=$stock-1;
      $req="update stock set quantite=".$stock." where idArticle='".$art."'";
        echo $req;
      $con=getConnexion();
     $resultats1=$con->query($req);
  }
   function ajoutStock($art)
  {
      $stock=getStockArticle($art);
      $stock=$stock+1;
      $req="update stock set quantite=".$stock." where idArticle='".$art."'";
      echo $req;
      $con=getConnexion();
     $resultats1=$con->query($req);
  }
  function insert($article,$pseudo)
{
    try
{
    $insert="insert into panier values('".$pseudo."','".$article."',1)";
    ECHO $insert;
    $con=getConnexion();
    $resultats1=$con->query($insert);
    $type=getTypeByArticle($article);
    $con=null;
/*header('Location:../#portfolioModal'.$type);*/

}
 catch (Exception $ex) {
        echo ($ex->getMessage());
    }   
}
?>