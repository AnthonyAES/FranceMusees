<?php
$id=$_GET['id'];
$hostname='localhost';
$username='santhony';
$password='santhony@2017';
try {
    $conn = new PDO("mysql:host=$hostname;dbname=santhony;charset=utf8", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM musee WHERE id=$id"); 
    $stmt->execute();
    // set the resulting array to associative
    $result = $stmt->fetchAll();
    
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Musées de France</title>
</head>
    <style>
        #map{
            width: 100%;
            height: 500px;
        }
    </style>
<body>
     <?php  
        foreach($result as $article){
            $linkDep = $article['nom_dep'];
            $linkDep_ = str_replace(' ', '_', $linkDep);
            $adr_img = $article['lien_image'];
            $adr_musee = $article['adresse'];
            
        echo "<div class='homeart'>";
        echo  "<div class='post-preview'><h2 class='post-title'>";
        echo $article['nom_du_musee'];
        echo "</h2>";
            
        echo "<p class='img-acc'>";
        echo "<img src='".$adr_img."'>";
        echo "</p>";
          
        echo "<h3>Périodes d'ouverture</h3>";    
        echo "<p class=''>";
        echo $article['periode_ouverture'];
        echo "</p>";

        echo "<h3>Fermeture annuelle</h3>";  
        echo "<p class=''>";
        echo $article['fermeture_annuelle'];
        echo "</p>";
            
        echo "<h3>Adresse</h3>";  
        echo "<p class='adressecomp'>";
        echo $article['adresse'];
        echo "<br>";
        echo $article['cp'];
        echo " ";
        echo $article['ville'];
        echo "</p>";
            
        echo "</div>";
        echo "</div>";
    }       
                       
               
    ?>
    
    <div id="map"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/map.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAm34dUtahqxI1t4InV-JOGMRxdE5KsPD4&callback=initMap"
    async defer></script>
    
</body>
</html>