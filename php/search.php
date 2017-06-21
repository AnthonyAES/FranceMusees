<?php
header('Content-Type: text/html; charset=UTF-8');

// connexion bdd    
$hostname='localhost';
$username='santhony';
$password='santhony@2017';

if(isset($_POST['search'])) {

$chainesearch = addslashes($_POST['search']);  

echo 'Vous avez recherché : ' . $chainesearch . '<br />';      

	try{
		$bdd = new PDO("mysql:host=$hostname;dbname=santhony;charset=utf8", $username, $password);
		$bdd->exec("SET CHARACTER SET utf8");
		$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	}
		catch(PDOException $e){
		echo 'Erreur : '.$e->getMessage();
		echo 'N° : '.$e->getCode();
	}      
		
	$requete = "SELECT * from musee WHERE nom_dep LIKE '". $chainesearch 
	."%' OR ville LIKE '". $chainesearch 
	."%' OR nom_reg LIKE '". $chainesearch 
	."%' OR nom_du_musee LIKE '". $chainesearch ."%'"; 
		
    // Exécution de la requête SQL
    $resultat = $bdd->query($requete) or die(print_r($bdd->errorInfo()));
    echo 'Les résultats de recherche sont : <br />';     
    while($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {       
	echo $donnees['nom_du_musee'] .'<br />';
	echo $donnees['nom_reg'] .'<br />';
	echo $donnees['ville'] .'<br />';
	echo '<hr />';
	}

}

?>