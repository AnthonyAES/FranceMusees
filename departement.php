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
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Musées de France</title>
    </head>
    <body>

        <form action ="recherche.php" method="get">
            <span>Recherche par nom :</span> 
            <input type="text" id="search" name="search"/>
            <input type="submit" value="Envoyer">
            <input type="reset" value="Annuler">
        </form>

        <?php  
        foreach($result as $article){
            $linkDep = $article['nom_dep'];
            $linkDep_ = str_replace(' ', '_', $linkDep);
            $adr_img = $article['lien_image'];
            echo "<p class='img-acc'>";
            echo "<img src='".$adr_img."'>";
            echo "</p>";
            echo "<div class='homeart'>";
            echo "<div class='post-preview'><a data-toggle=\"modal\" data-target=\"#myModal\"  href='musee.php?id=" . $article['id'] . "'><h2 class='post-title'>";
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
            echo "<div class='more'><a data-toggle=\"modal\" data-target=\"#myModal\" href='musee.php?id=" . $article['id'] . "'>Lire plus...</a></div>";
            echo "</div><hr>";
        }       

        ?>


        <!--<div class="modal-museum-bg container-fluid hidden">
            <div class="modal-core row">
                <div class="col-xs-12 col-md-6">
                    
                </div>
                <div class="col-xs-12 col-md-6" id="map">

                </div>
            </div>
        </div>-->
        
<!-- FENETRE MODALE-->

        <div id="myModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Modal title</h4>
                    </div>
                    <div class="modal-body">
                        <div class="col-xs-12 col-md-6">
                    <?php include 'musee.php' ?>
                </div>
                <div class="col-xs-12 col-md-6" id="map">

                </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <script
                src="https://code.jquery.com/jquery-3.2.1.min.js"
                integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
                crossorigin="anonymous"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/map.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAm34dUtahqxI1t4InV-JOGMRxdE5KsPD4&callback=initMap"
                async defer></script>
        <script src="js/script.js"></script>
    </body>
</html>