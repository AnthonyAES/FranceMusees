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

     <?php  
        foreach($result as $article){
            $linkDep = $article['nom_dep'];
            $linkDep_ = str_replace(' ', '_', $linkDep);
            $adr_img = $article['lien_image'];
            $adr_musee = $article['adresse'];
            
        echo "<div class='homeart col-xs-12 col-md-6'>";
        echo  "<div class='post-preview'><h3 class='post-title'>";
        echo $article['nom_du_musee'];
        echo "</h3>";
            
        echo "<p class='img-acc'>";
        echo "<img src='".$adr_img."'>";
        echo "</p>";
          
        echo "<h4>Périodes d'ouverture</h4>";    
        echo "<p class=''>";
        echo $article['periode_ouverture'];
        echo "</p>";

        echo "<h4>Fermeture annuelle</h4>";  
        echo "<p class=''>";
        echo $article['fermeture_annuelle'];
        echo "</p>";
            
        echo "<h4>Adresse</h4>";  
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

