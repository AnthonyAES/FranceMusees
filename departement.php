<?php
$id=$_GET['id'];
$hostname='localhost';
$username='santhony';
$password='santhony@2017';
try {
    $conn = new PDO("mysql:host=$hostname;dbname=santhony;charset=utf8", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM musee WHERE nom_dep LIKE '$id%' ORDER by nom_dep DESC"); 
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
<body>
     <?php  
        foreach($result as $article){
            $linkDep = $article['nom_dep'];
            $linkDep_ = str_replace(' ', '_', $linkDep);
            $adr_img = $article['lien_image'];
            echo "<p class='img-acc'>";
            echo "<img src='".$adr_img."'>";
            echo "</p>";
        echo "<div class='homeart'>";
        echo  "<div class='post-preview'><a href='musee.php?id=" . $article['id'] . "'><h2 class='post-title'>";
        echo $article['nom_du_musee'];
        echo "</h2></a>";
            
        echo "<p class='post-subtitle-mess'>";
        echo $article['cp'];
        echo " ";
        echo $article['ville'];
        echo "</p>";
            
        echo "<p class='post-meta'>";
        echo $article['periode_ouverture']; 
        echo "</p></div>";
        echo "<div class='more'><a href='musee.php?id=" . $article['id'] . "'>Lire plus...</a></div>";
        echo "</div><hr>";
    }       
                        
               
               
               
    ?>
</body>
</html>