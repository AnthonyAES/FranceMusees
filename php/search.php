<?php
		
	$requete = "SELECT * from musee WHERE nom_dep LIKE '". $motCle 
	."%' OR ville LIKE '". $motCle 
	."%' OR nom_reg LIKE '". $motCle 
	."%' OR nom_du_musee LIKE '". $motCle ."%'"; 
		
    // Exécution de la requête SQL
    $resultat = $conn->query($requete) or die(print_r($conn->errorInfo()));
    echo 'Les résultats de recherche sont : <br />';     
    while($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {   
    $adr_img = $donnees['lien_image'];
    echo "<p class='img-acc'>";
    echo "<img src='".$adr_img."'>";
    echo "</p><br />";
	echo $donnees['nom_du_musee'] .'<br />';
	echo $donnees['nom_reg'] .'<br />';
	echo $donnees['ville'] .'<br />';
	echo '<hr />';
	}


?>