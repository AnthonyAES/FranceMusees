<!DOCTYPE html>
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
        
        <!-- FAVICON -->
        <link rel="apple-touch-icon-precomposed" sizes="57x57" href="favicomatic/apple-touch-icon-57x57.png" />
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="favicomatic/apple-touch-icon-114x114.png" />
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="favicomatic/apple-touch-icon-72x72.png" />
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="favicomatic/apple-touch-icon-144x144.png" />
        <link rel="apple-touch-icon-precomposed" sizes="60x60" href="favicomatic/apple-touch-icon-60x60.png" />
        <link rel="apple-touch-icon-precomposed" sizes="120x120" href="favicomatic/apple-touch-icon-120x120.png" />
        <link rel="apple-touch-icon-precomposed" sizes="76x76" href="favicomatic/apple-touch-icon-76x76.png" />
        <link rel="apple-touch-icon-precomposed" sizes="152x152" href="favicomatic/apple-touch-icon-152x152.png" />

        <link rel="icon" type="image/png" href="favicomatic/favicon-196x196.png" sizes="196x196" />
        <link rel="icon" type="image/png" href="favicomatic/favicon-96x96.png" sizes="96x96" />
        <link rel="icon" type="image/png" href="favicomatic/favicon-32x32.png" sizes="32x32" />
        <link rel="icon" type="image/png" href="favicomatic/favicon-16x16.png" sizes="16x16" />
        <link rel="icon" type="image/png" href="favicomatic/favicon-128.png" sizes="128x128" />

        <meta name="application-name" content="&nbsp;"/>
        <meta name="msapplication-TileColor" content="#FFFFFF" />
        <meta name="msapplication-TileImage" content="mstile-144x144.png" />
        <meta name="msapplication-square70x70logo" content="mstile-70x70.png" />
        <meta name="msapplication-square150x150logo" content="mstile-150x150.png" />
        <meta name="msapplication-wide310x150logo" content="mstile-310x150.png" />
        <meta name="msapplication-square310x310logo" content="mstile-310x310.png" />

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

           <form class="cherche col-xs-offset-2 col-xs-8 col-md-offset-4 col-md-4" action ="recherche.php" method="get">
                <input type="text" id="search" class="search-box col-xs-10 col-md-10" name="search"/>
                <button type="submit" class="send col-xs-2">
                    <svg id="Calque_1" data-name="Calque 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 33.25 37.04"><circle class="line-1" cx="13.05" cy="13.05" r="10.72"/><line class="line-1" x1="30.92" y1="34.71" x2="19.87" y2="21.32"/></svg>
                </button>
            </form>
        </article>

        <article class="row">
            <div class="liste col-md-4 col-lg-offset-1 col-lg-2 col-xs-12 visible-md-block visible-lg-block">

                <div class="col-xs-offset-1 col-xs-10">

                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a id="region-A" data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                        Hauts de France</a>
                                </h4>
                            </div>
                            <div id="collapse1" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        <li><a id="list-02-A" href="departement.php?id=02">Aisne</a></li>
                                        <li><a id="list-59-A" href="departement.php?id=59">Nord</a></li>
                                        <li><a id="list-60-A" href="departement.php?id=60">Oise</a></li>
                                        <li><a id="list-62-A" href="departement.php?id=62">Pas-de-Calais</a></li>
                                        <li><a id="list-80-A" href="departement.php?id=80">Somme</a></li>
                                    </ul> 
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a id="region-B" data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                        Pays de la Loire</a>
                                </h4>
                            </div>
                            <div id="collapse2" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        <li><a id="list-44-B" href="departement.php?id=44">Loire-Atlantique</a></li>
                                        <li><a id="list-49-B" href="departement.php?id=49">Maine-et-Loire</a></li>
                                        <li><a id="list-53-B" href="departement.php?id=53">Mayenne</a></li>
                                        <li><a id="list-72-B" href="departement.php?id=72">Sarthe</a></li>
                                        <li><a id="list-85-B" href="departement.php?id=85">Vendée</a></li>
                                    </ul> 
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a id="region-C" data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                                        Occitanie</a>
                                </h4>
                            </div>
                            <div id="collapse3" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        <li><a id="list-09-C" href="departement.php?id=09">Ariège</a></li>
                                        <li><a id="list-11-C" href="departement.php?id=11">Aude</a></li>
                                        <li><a id="list-12-C" href="departement.php?id=12">Aveyron</a></li>
                                        <li><a id="list-30-C" href="departement.php?id=30">Gard</a></li>
                                        <li><a id="list-31-C" href="departement.php?id=31">Haute-Garonne</a></li>
                                        <li><a id="list-32-C" href="departement.php?id=32">Gers</a></li>
                                        <li><a id="list-34-C" href="departement.php?id=34">Hérault</a></li>
                                        <li><a id="list-46-C" href="departement.php?id=46">Lot</a></li>
                                        <li><a id="list-48-C" href="departement.php?id=48">Lozère</a></li>
                                        <li><a id="list-65-C" href="departement.php?id=64">Hautes-Pyrénées</a></li>
                                        <li><a id="list-66-C" href="departement.php?id=66">Pyrénées-Orientales</a></li>
                                        <li><a id="list-81-C" href="departement.php?id=81">Tarn</a></li>
                                        <li><a id="list-82-C" href="departement.php?id=82">Tarn-et-Garonne</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a id="region-D" data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                                        Normandie</a>
                                </h4>
                            </div>
                            <div id="collapse4" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        <li><a id="list-14-D" href="departement.php?id=14">Calvados</a></li>
                                        <li><a id="list-27-D" href="departement.php?id=27">Eure</a></li>
                                        <li><a id="list-50-D" href="departement.php?id=50">Manche</a></li>
                                        <li><a id="list-61-D" href="departement.php?id=61">Orne</a></li>
                                        <li><a id="list-76-D" href="departement.php?id=76">Seine-Maritime</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a id="region-E" data-toggle="collapse" data-parent="#accordion" href="#collapse5">
                                        Grand-Est</a>
                                </h4>
                            </div>
                            <div id="collapse5" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        <li><a id="list-08-E" href="departement.php?id=08">Ardennes</a></li>
                                        <li><a id="list-10-E" href="departement.php?id=10">Aube</a></li>
                                        <li><a id="list-51-E" href="departement.php?id=51">Marne</a></li>
                                        <li><a id="list-52-E" href="departement.php?id=52">Haute-Marne</a></li>
                                        <li><a id="list-54-E" href="departement.php?id=54">Meurthe-et-Moselle</a></li>
                                        <li><a id="list-55-E" href="departement.php?id=55">Meuse</a></li>
                                        <li><a id="list-57-E" href="departement.php?id=57">Moselle</a></li>
                                        <li><a id="list-67-E" href="departement.php?id=67">Bas-Rhin</a></li>
                                        <li><a id="list-68-E" href="departement.php?id=68">Haut-Rhin</a></li>
                                        <li><a id="list-88-E" href="departement.php?id=88">Vosges</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a id="region-F" data-toggle="collapse" data-parent="#accordion" href="#collapse6">
                                        Bourgogne-Franche-Comté</a>
                                </h4>
                            </div>
                            <div id="collapse6" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        <li><a id="list-21-F" href="departement.php?id=21">Côte-d'Or</a></li>
                                        <li><a id="list-25-F" href="departement.php?id=25">Doubs</a></li>
                                        <li><a id="list-39-F" href="departement.php?id=39">Jura</a></li>
                                        <li><a id="list-58-F" href="departement.php?id=58">Nièvre</a></li>
                                        <li><a id="list-70-F" href="departement.php?id=70">Haute-Saône</a></li>
                                        <li><a id="list-71-F" href="departement.php?id=71">Saône-et-Loire</a></li>
                                        <li><a id="list-89-F" href="departement.php?id=89">Yonne</a></li>
                                        <li><a id="list-90-F" href="departement.php?id=90">Territoire de Belfort</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a id="region-G" data-toggle="collapse" data-parent="#accordion" href="#collapse7">
                                        Auvergne-Rhônes-Alpes</a>
                                </h4>
                            </div>
                            <div id="collapse7" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        <li><a id="list-01-G" href="departement.php?id=01">Ain</a></li>
                                        <li><a id="list-03-G" href="departement.php?id=03">Allier</a></li>
                                        <li><a id="list-07-G" href="departement.php?id=07">Ardèche</a></li>
                                        <li><a id="list-15-G" href="departement.php?id=15">Cantal</a></li>
                                        <li><a id="list-26-G" href="departement.php?id=26">Drôme</a></li>
                                        <li><a id="list-38-G" href="departement.php?id=38">Isère</a></li>
                                        <li><a id="list-42-G" href="departement.php?id=42">Loire</a></li>
                                        <li><a id="list-43-G" href="departement.php?id=43">Haute-Loire</a></li>
                                        <li><a id="list-63-G" href="departement.php?id=63">Puy-de-Dôme</a></li>
                                        <li><a id="list-73-G" href="departement.php?id=73">Savoie</a></li>
                                        <li><a id="list-69-G" href="departement.php?id=69">Rhône</a></li>
                                        <li><a id="list-74-G" href="departement.php?id=74">Haute-Savoie</a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a id="region-H" data-toggle="collapse" data-parent="#accordion" href="#collapse8">
                                        Île-de-France</a>
                                </h4>
                            </div>
                            <div id="collapse8" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        <li><a id="list-75-H" href="departement.php?id=75">Paris</a></li>
                                        <li><a id="list-77-H" href="departement.php?id=77">Seine-et-Marne</a></li>
                                        <li><a id="list-78-H" href="departement.php?id=78">Yvelines</a></li>
                                        <li><a id="list-91-H" href="departement.php?id=91">Essonne</a></li>
                                        <li><a id="list-92-H" href="departement.php?id=92">Hauts-de-Seine</a></li>
                                        <li><a id="list-93-H" href="departement.php?id=93">Seine-Saint-Denis</a></li>
                                        <li><a id="list-94-H" href="departement.php?id=94">Val-de-Marne</a></li>
                                        <li><a id="list-95-H" href="departement.php?id=95">Val-d'Oise</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a id="region-I" data-toggle="collapse" data-parent="#accordion" href="#collapse9">
                                        Centre-Val-de-Loire</a>
                                </h4>
                            </div>
                            <div id="collapse9" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        <li><a id="list-18-I" href="departement.php?id=18">Cher</a></li>
                                        <li><a id="list-28-I" href="departement.php?id=28">Eure-et-Loir</a></li>
                                        <li><a id="list-36-I" href="departement.php?id=36">Indre</a></li>
                                        <li><a id="list-37-I" href="departement.php?id=37">Indre-et-Loire</a></li>
                                        <li><a id="list-41-I" href="departement.php?id=41">Loir-et-Cher</a></li>
                                        <li><a id="list-45-I" href="departement.php?id=45">Loiret</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a id="region-J" data-toggle="collapse" data-parent="#accordion" href="#collapse10">
                                        Provence-Alpes-Côtes d'Azur</a>
                                </h4>
                            </div>
                            <div id="collapse10" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        <li><a id="list-04-J" href="departement.php?id=04">Alpes-de-Haute-Provence</a></li>
                                        <li><a id="list-05-J" href="departement.php?id=05">Hautes-Alpes</a></li>
                                        <li><a id="list-06-J" href="departement.php?id=06">Alpes-Maritimes</a></li>
                                        <li><a id="list-13-J" href="departement.php?id=13">Bouches-du-Rhône</a></li>
                                        <li><a id="list-83-J" href="departement.php?id=83">Var</a></li>
                                        <li><a id="list-84-J" href="departement.php?id=84">Vaucluse</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a id="region-K" data-toggle="collapse" data-parent="#accordion" href="#collapse11">
                                        Bretagne</a>
                                </h4>
                            </div>
                            <div id="collapse11" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        <li><a id="list-22-K" href="departement.php?id=22">Côtes-d'Armor</a></li>
                                        <li><a id="list-29-K" href="departement.php?id=29">Finistère</a></li>
                                        <li><a id="list-35-K" href="departement.php?id=35">Ille-et-Vilaine</a></li>
                                        <li><a id="list-56-K" href="departement.php?id=56">Morbihan</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a id="region-L" data-toggle="collapse" data-parent="#accordion" href="#collapse12">
                                        Nouvelle-Aquitaine</a>
                                </h4>
                            </div>
                            <div id="collapse12" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        <li><a id="list-16-L" href="departement.php?id=16">Charente</a></li>
                                        <li><a id="list-17-L" href="departement.php?id=17">Charente-Maritime</a></li>
                                        <li><a id="list-19-L" href="departement.php?id=19">Corrèze</a></li>
                                        <li><a id="list-23-L" href="departement.php?id=23">Creuse</a></li>
                                        <li><a id="list-24-L" href="departement.php?id=24">Dordogne</a></li>
                                        <li><a id="list-33-L" href="departement.php?id=33">Gironde</a></li>
                                        <li><a id="list-40-L" href="departement.php?id=40">Landes</a></li>
                                        <li><a id="list-47-L" href="departement.php?id=47">Lot-et-Garonne</a></li>
                                        <li><a id="list-64-L" href="departement.php?id=64">Pyrénées-Atlantiques</a></li>
                                        <li><a id="list-79-L" href="departement.php?id=79">Deux-Sèvres</a></li>
                                        <li><a id="list-86-L" href="departement.php?id=86">Vienne</a></li>
                                        <li><a id="list-87-L" href="departement.php?id=87">Haute-Vienne</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a id="region-M" data-toggle="collapse" data-parent="#accordion" href="#collapse13">
                                        Corse</a>
                                </h4>
                            </div>
                            <div id="collapse13" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        <li><a id="list-2A-M" href="departement.php?id=2A">Corse-du-Sud</a></li>
                                        <li><a id="list-2B-M" href="departement.php?id=2B">Haute-Corse</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a id="region-N" data-toggle="collapse" data-parent="#accordion" href="#collapse14">
                                        DOM</a>
                                </h4>
                            </div>
                            <div id="collapse14" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        <li><a id="list-MY-N" href="departement.php?id=976">Mayotte</a></li>
                                        <li><a id="list-GD-N" href="departement.php?id=971">Guadeloupe</a></li>
                                        <li><a id="list-GY-N" href="departement.php?id=973">Guyane</a></li>
                                        <li><a id="list-LR-N" href="departement.php?id=974">La Réunion</a></li>
                                        <li><a id="list-MA-N" href="departement.php?id=972">Martinique</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>  

                </div>

            </div>

            <div class="liste-mobile col-sm-8 col-xs-12 col-sm-offset-2 visible-xs-block visible-sm-block">
                <form class="col-xs-12">
                    <select class="col-xs-12" name="departements" id="dep_select">
                        <option value="02">Aisne</option>
                        <option value="59">Nord</option>
                        <option value="60">Oise</option>
                        <option value="62">Pas-de-Calais</option>
                        <option value="80">Somme</option>
                        <option value="44">Loire-Atlantique</option>
                        <option value="49">Maine-et-Loire</option>
                        <option value="53">Mayenne</option>
                        <option value="72">Sarthe</option>
                        <option value="85">Vendée</option>
                        <option value="09">Ariège</option>
                        <option value="11">Aude</option>
                        <option value="12">Aveyron</option>
                        <option value="30">Gard</option>
                        <option value="31">Haute-Garonne</option>
                        <option value="32">Gers</option>
                        <option value="34">Hérault</option>
                        <option value="46">Lot</option>
                        <option value="48">Lozère</option>
                        <option value="65">Hautes-Pyrénées</option>
                        <option value="66">Pyrénées-Orientales</option>
                        <option value="81">Tarn</option>
                        <option value="82">Tarn-et-Garonne</option>
                        <option value="14">Calvados</option>
                        <option value="27">Eure</option>
                        <option value="50">Manche</option>
                        <option value="61">Orne</option>
                        <option value="76">Seine-Maritime</option>
                        <option value="08">Ardennes</option>
                        <option value="10">Aube</option>
                        <option value="51">Marne</option>
                        <option value="52">Haute-Marne</option>
                        <option value="54">Meurthe-et-Moselle</option>
                        <option value="55">Meuse</option>
                        <option value="57">Moselle</option>
                        <option value="67">Bas-Rhin</option>
                        <option value="68">Haut-Rhin</option>
                        <option value="88">Vosges</option>
                        <option value="21">Côte-d'Or</option>
                        <option value="25">Doubs</option>
                        <option value="39">Jura</option>
                        <option value="58">Nièvre</option>
                        <option value="70">Haute-Saône</option>
                        <option value="71">Saône-et-Loire</option>
                        <option value="89">Yonne</option>
                        <option value="90">Territoire de Belfort</option>
                        <option value="01">Ain</option>
                        <option value="03">Allier</option>
                        <option value="07">Ardèche</option>
                        <option value="15">Cantal</option>
                        <option value="26">Drôme</option>
                        <option value="38">Isère</option>
                        <option value="42">Loire</option>
                        <option value="43">Haute-Loire</option>
                        <option value="63">Puy-de-Dôme</option>
                        <option value="73">Savoie</option>
                        <option value="69">Rhône</option>
                        <option value="74">Haute-Savoie</option>
                        <option value="75">Paris</option>
                        <option value="77">Seine-et-Marne</option>
                        <option value="78">Yvelines</option>
                        <option value="91">Essonne</option>
                        <option value="92">Hauts-de-Seine</option>
                        <option value="93">Seine-Saint-Denis</option>
                        <option value="94">Val-de-Marne</option>
                        <option value="95">Val-d'Oise</option>
                        <option value="18">Cher</option>
                        <option value="28">Eure-et-Loir</option>
                        <option value="36">Indre</option>
                        <option value="37">Indre-et-Loire</option>
                        <option value="41">Loir-et-Cher</option>
                        <option value="45">Loiret</option>
                        <option value="04">Alpes-de-Haute-Provence</option>
                        <option value="05">Hautes-Alpes</option>
                        <option value="06">Alpes-Maritimes</option>
                        <option value="13">Bouches-du-Rhône</option>
                        <option value="83">Var</option>
                        <option value="84">Vaucluse</option>
                        <option value="22">Côtes-d'Armor</option>
                        <option value="29">Finistère</option>
                        <option value="35">Ille-et-Vilaine</option>
                        <option value="56">Morbihan</option>
                        <option value="16">Charente</option>
                        <option value="17">Charente-Maritime</option>
                        <option value="19">Corrèze</option>
                        <option value="23">Creuse</option>
                        <option value="24">Dordogne</option>
                        <option value="33">Gironde</option>
                        <option value="40">Landes</option>
                        <option value="47">Lot-et-Garonne</option>
                        <option value="64">Pyrénées-Atlantiques</option>
                        <option value="79">Deux-Sèvres</option>
                        <option value="86">Vienne</option>
                        <option value="87">Haute-Vienne</option>
                        <option value="2A">Corse-du-Sud</option>
                        <option value="2B">Haute-Corse</option>
                        <option value="MY">Mayotte</option>
                        <option value="GD">Guadeloupe</option>
                        <option value="GY">Guyane</option>
                        <option value="LR">La Réunion</option>
                        <option value="MA">Martinique</option>
                    </select>
                    <div class="arrow col-xs-1"><p>▼</p></div>  
                </form>
            </div>

            <div class="box-vign col-md-8 col-lg-8 col-sm-12 col-xs-12">
                <?php  
    foreach($result as $article){
        $linkDep = $article['nom_dep'];
        $linkDep_ = str_replace(' ', '_', $linkDep);
        $adr_img = $article['lien_image'];
        echo "<div class='vignette col-xs-12 col-sm-6 col-md-6 col-lg-4'>"; 

        echo "<div class='head_vignette'>";
        echo "<p class='img-acc'>";
        echo "<img src='".$adr_img."'>";
        echo "</p>";

        echo "<div class='title_vignette'>";   
        echo  "<a id='linkN".$article['id']."' data-toggle='modal' data-target='#myModal" . $article['id'] . " ' href='musee.php?id=" . $article['id'] . "'><h3 id='nameMusee".$article['id']."' class='post-title'>";
        echo $article['nom_du_musee'];
        echo "</h3></a>";

        echo "</div>";

        echo "</div>";

        echo "<div class='body_vignette'>";
        echo "<h3 class='name_vignette'>ADRESSE</h3>";

        echo "<p id='adresscom".$article['id']."' class='post-subtitle-mess'>";
        echo $article['adresse'];
        echo " ";
        echo $article['cp'];
        echo " ";
        echo $article['ville'];
        echo "</p>";

        echo "<h3 class='name_vignette'>Période d'ouverture</h3>";
        echo "<p class='post-meta'>";
        echo $article['periode_ouverture']; 
        echo "</p>";
        echo "<div class='more'><a id='linkB".$article['id']."' data-toggle='modal' data-target='#myModal" . $article['id'] . "' href='musee.php?id=" . $article['id'] . "'>Lire plus...</a>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }   
                ?>
            </div>
            <?php

            foreach($result as $article){
                echo '<div id="myModal'.$article['id'].'" class="modal fade" tabindex="-1" role="dialog">';
                echo '<div class="modal-dialog row" role="document">';
                echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                echo '<div class="modal-content col-xs-12">';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }


            ?>



        </article>
        <a href="#"  class="scroll-button"><img src="img/up-arrow.svg" alt="fleche vers le haut" width="64" height="128"></a>
        <?php include 'footer.php' ?>

        <script
                src="https://code.jquery.com/jquery-3.2.1.min.js"
                integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
                crossorigin="anonymous"></script>
        <script src="js/script.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAm34dUtahqxI1t4InV-JOGMRxdE5KsPD4"></script>
        <script src="js/map.js"></script>
        <script src="js/scroll.js"></script>

    </body>
</html>



