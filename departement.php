<?php
if(!empty($_GET['id'])){
    $id= $_GET['id'];
} else {
   $id= 0;
}
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
        <!-- METAS -->
        <meta charset="UTF-8">
        <title>Annuaire des Musées de France</title>
        <meta name="description" content="annuaire gratuit et libre de tous les musées de France, pour simplifier vos recherches culturelles" />
        <meta name="keywords" content="musée, musées, annuaire, liste, culture, culturel, visite, expositions, nouveautés" />
        <meta name="abstract" content="annuaire gratuit et libre de tous les musées de France, pour simplifier vos recherches culturelles" />
        <meta name="revisit-after" content="3 days" />
        <meta name="generator" content="www.absolute-referencement.com">
        <meta name="language" content="fr" />
        <meta name="robots" content="All" />

        <meta name="viewport" content="width=device-width, user-scalable=no" />

        <!-- CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">




        <!-- TYPO -->
        <link href="https://fonts.googleapis.com/css?family=Didact+Gothic" rel="stylesheet">
    </head>


    <body class="container-fluid">
    
        <?php include 'header.php' ?>

        <article class="row box-search">

            <h3 class="col-xs-offset-1 col-xs-10 col-md-offset-3 col-md-6">Trouvez ici facilement le musée que vous cherchiez</h3>

            <form class=" col-xs-offset-1 col-xs-10 col-md-offset-3 col-md-6" action ="recherche.php" method="get">
                <input type="text" id="search" class="search-box col-xs-offset-2 col-xs-7" name="search"/>
                <button type="submit" class="col-xs-2 send">
                    <svg id="Calque_1" data-name="Calque 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 33.25 37.04"><circle class="line-1" cx="13.05" cy="13.05" r="10.72"/><line class="line-1" x1="30.92" y1="34.71" x2="19.87" y2="21.32"/></svg>
                </button>
            </form>
        </article>
    
    <!--<form action ="recherche.php" method="get">
        <span>Recherche par nom :</span> 
        <input type="text" id="search" name="search"/>
        <input type="submit" value="Envoyer">
        <input type="reset" value="Annuler">
    </form>-->
       <article class="row">
        <div class="list col-md-4"></div>
    <div class="box-vign col-md-8">
     <?php  
        foreach($result as $article){
            $linkDep = $article['nom_dep'];
            $linkDep_ = str_replace(' ', '_', $linkDep);
            $adr_img = $article['lien_image'];
        echo "<div class='vignette col-xs-4'>";    
            echo "<p class='img-acc'>";
            echo "<img src='".$adr_img."'>";
            echo "</p>";
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
        echo "</div>";
    }       
                        
               
               
               
    ?>
        </div>
        </article>
</body>
</html>