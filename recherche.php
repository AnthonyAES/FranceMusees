<form action ="" method="get">
	<span>Recherche par nom :</span> 
	<input type="text" id="search" name="search"/>
	<input type="submit" value="Envoyer">
	<input type="reset" value="Annuler">
</form>


<?php 

header('Content-Type: text/html; charset=UTF-8');

// connexion bdd    
$hostname='localhost';
$username='santhony';
$password='santhony@2017';
$perPage= 6;

if(isset($_GET['search']) && !empty($_GET['search'])) {

$motCle = addslashes($_GET['search']);  

echo 'Vous avez recherché : ' . $motCle . '<br />';      

	try{
		/*$bdd = new PDO("mysql:host=$hostname;dbname=santhony;charset=utf8", $username, $password);
		$bdd->exec("SET CHARACTER SET utf8");
		$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);*/
        $conn = new PDO("mysql:host=$hostname;dbname=santhony", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
            $stmt = $conn->prepare("SELECT COUNT(id) as nbr FROM musee WHERE nom_dep LIKE '". $motCle ."%' OR ville LIKE '". $motCle ."%' OR nom_reg LIKE '". $motCle ."%' OR nom_du_musee LIKE '". $motCle ."%' ");
            $stmt->bindParam(':motcle', $motCle);
            $stmt->execute();
            $result = $stmt->fetch();
             
            $totalEnregistrement = $result['nbr'];
            $nbPage = ceil($totalEnregistrement/$perPage);
            
            if(isset($_GET['p']) && $_GET['p']>0 && $_GET['p']<=$nbPage) {
                $cPage = $_GET['p'];
            } else {
                $cPage = 1;
            }
        
            $count = ($cPage-1)*$perPage;
        
            $stmt = $conn->prepare("SELECT * FROM musee WHERE nom_dep LIKE '". $motCle ."%' OR ville LIKE '". $motCle ."%' OR nom_reg LIKE '". $motCle ."%' OR nom_du_musee LIKE '". $motCle ."%' LIMIT ". $count .", ". $perPage ." ");
            $stmt->bindParam(':motcle', $motCle);
            $stmt->bindParam(':count', $count, PDO::PARAM_INT);
            $stmt->bindParam(':perPage', $perPage, PDO::PARAM_INT);
            $stmt->execute();
            $musees = $stmt->fetchAll();        
        
        for($i=1;$i<=$nbPage;$i++){
            if($i==$cPage){
              echo  " $i /";
            }else {
             echo " <a href='recherche.php?search=$motCle&p=$i'>$i</a> /";   
            }
        }
	}
		catch(PDOException $e){
		echo 'Erreur : '.$e->getMessage();
		echo 'N° : '.$e->getCode();
	}   
    
    foreach($musees as $donnees){
    $adr_img = $donnees['lien_image'];
    echo "<p class='img-acc'>";
    echo "<img src='".$adr_img."'>";
    echo "</p><br />";
	echo $donnees['nom_du_musee'] .'<br />';
	echo $donnees['nom_reg'] .'<br />';
	echo $donnees['ville'] .'<br />';
	echo '<hr />';
    
    }

}

?>