<?php
include 'includes/Connection2.php';

$db = Database::connect();

// $query1 = "SELECT bricoleur.prenom as prenom , bricoleur.nom as nom , image.refrence_image as image , profession.libelle_profession as profession , sp.id_Sprofession as Sprofession , bsp.id_bricoleur
//         FROM bricoleur 
//         LEFT JOIN image ON (bricoleur.id_bricoleur = image.id_bricoleur AND image.type_image = 'profile')
//         LEFT JOIN ((SELECT id_profession , id_Sprofession FROM sous_profession GROUP BY id_profession) as sp , (SELECT id_bricoleur , id_Sprofession FROM bricoleur_sous_profession GROUP BY id_bricoleur) as bsp) 
//         ON (bricoleur.id_bricoleur = bsp.id_bricoleur AND bsp.id_Sprofession = sp.id_Sprofession)
//         LEFT JOIN profession ON sp.id_profession = profession.id_profession
//         ORDER BY RAND() LIMIT 5"

$query1 = "SELECT bricoleur.id_bricoleur as id , bricoleur.prenom as prenom , bricoleur.nom as nom , image.refrence_image as image , profession.libelle_profession as profession 
        FROM bricoleur 
        LEFT JOIN image ON (bricoleur.id_bricoleur = image.id_bricoleur AND image.type_image = 'profile')
        LEFT JOIN bricoleur_profession ON bricoleur.id_bricoleur = bricoleur_profession.id_bricoleur
        LEFT JOIN profession ON bricoleur_profession.id_profession = profession.id_profession
        ORDER BY RAND() LIMIT 5";

$brikoleurs = $db->prepare($query1);                         

$brikoleurs->execute();

$empty = "";

// $query2 = "SELECT bricoleur.prenom as prenom , bricoleur.nom as nom , imageProfile.refrence_image as imageProfile , GROUP_CONCAT(imagePortfolio.refrence_image) as imagePortfolio , profession.libelle_profession as profession , sp.id_Sprofession as Sprofession , bsp.id_bricoleur
//         FROM bricoleur 
//         LEFT JOIN image as imageProfile ON (bricoleur.id_bricoleur = imageProfile.id_bricoleur AND imageProfile.type_image = 'profile')
//         LEFT JOIN (image as imagePortfolio) ON (bricoleur.id_bricoleur = imagePortfolio.id_bricoleur AND imagePortfolio.type_image = 'portfolio')
//         LEFT JOIN ((SELECT id_profession , id_Sprofession FROM sous_profession GROUP BY id_profession) as sp , (SELECT id_bricoleur , id_Sprofession FROM bricoleur_sous_profession GROUP BY id_bricoleur) as bsp) 
//         ON (bricoleur.id_bricoleur = bsp.id_bricoleur AND bsp.id_Sprofession = sp.id_Sprofession)
//         LEFT JOIN profession ON sp.id_profession = profession.id_profession ";

$query2 = "SELECT bricoleur.prenom as prenom , bricoleur.nom as nom , imageProfile.refrence_image as imageProfile , GROUP_CONCAT(imagePortfolio.refrence_image) as imagePortfolio , profession.libelle_profession as profession 
        FROM bricoleur 
        LEFT JOIN image as imageProfile ON (bricoleur.id_bricoleur = imageProfile.id_bricoleur AND imageProfile.type_image = 'profile')
        LEFT JOIN (image as imagePortfolio) ON (bricoleur.id_bricoleur = imagePortfolio.id_bricoleur AND imagePortfolio.type_image = 'portfolio')
        LEFT JOIN bricoleur_profession ON bricoleur.id_bricoleur = bricoleur_profession.id_bricoleur
        LEFT JOIN profession ON bricoleur_profession.id_profession = profession.id_profession ";



$db = Database::disconnect();

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/navbar-footer.css">
    <link rel="stylesheet" href="public/css/index.css">
    <title>Brikole</title>
</head>

<body>
    
    <?php include 'includes/header.php' ?>

    <div id="content">
        <div id="contentMain">
            <div id="contentLeft">
                <div id="contantHero">
                    <h1>un BriKoleur en un click !</h1>
                    <h2>
                        <span class="contantHeroUnderline">Savoir</span>
                        <span class="contantHeroHighlite">Plus ></span>
                    </h2>
                </div>
                <div id="contentSearch">
                    <h3 class="contentSearchTitle">Trouver vos Brikoleurs maintenant :</h3>
                    <div id="searchBar">
                        <select name="" id="" class="searchMenuSelect">
                            <option value="opt">Profession...</option>
                        </select>
                        <select name="" id="" class="searchMenuSelect">
                            <option value="opt">Ville...</option>
                        </select>
                        <button id="searchMenuBtn">
                            <span>Trouver</span>
                            <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M8 16C9.77498 15.9996 11.4988 15.4054 12.897 14.312L17.293 18.708L18.707 17.294L14.311 12.898C15.405 11.4997 15.9996 9.77544 16 8C16 3.589 12.411 0 8 0C3.589 0 0 3.589 0 8C0 12.411 3.589 16 8 16ZM8 2C11.309 2 14 4.691 14 8C14 11.309 11.309 14 8 14C4.691 14 2 11.309 2 8C2 4.691 4.691 2 8 2Z"
                                    fill="#FDFDFD" />
                                <path
                                    d="M9.41207 6.58609C9.79107 6.96609 10.0001 7.46809 10.0001 8.00009H12.0001C12.001 7.47451 11.8977 6.95398 11.6961 6.46857C11.4946 5.98316 11.1989 5.54251 10.8261 5.17209C9.31207 3.66009 6.68707 3.66009 5.17407 5.17209L6.58607 6.58809C7.34607 5.83009 8.65607 5.83209 9.41207 6.58609Z"
                                    fill="#FDFDFD" /> </svg>
                        </button>
                    </div>
                </div>
                <div id="contentTrending">
                    <h6>Les plus cherchées aujourd'hui : </h6>
                    <div id="contentTrendingCont">
                        <span class="contentTrendingTopic">Peintre</span>
                        <span class="contentTrendingTopic">Forgeron</span>
                        <span class="contentTrendingTopic">Maçon</span>
                        <span class="contentTrendingTopic">Plombier</span>
                    </div>
                </div>
                <div id="contentStatistics">
                    <h3>Pourquoi BriKole ?</h3>
                    <div id="contentStatisticsCont">
                        <div class="contentStatisticsItem">
                            <span class="contentStatisticsItemNumber">420</span>
                            <span class="contentStatisticsItemTxt">Agences de Services</span>
                        </div>
                        <div class="contentStatisticsItem">
                            <span class="contentStatisticsItemNumber">5384</span>
                            <span class="contentStatisticsItemTxt">Brikoleurs</span>
                        </div>
                        <div class="contentStatisticsItem">
                            <span class="contentStatisticsItemNumber">12849</span>
                            <span class="contentStatisticsItemTxt">Visites chaque jour</span>
                        </div>
                    </div>
                </div>
                <div id="contentDiscover">
                    <h3>Explorer :</h3>
                    <div id="contentDiscoverCont">
                        <div class="contentDiscoverElement">
                            <div class="contentDiscoverElementPreview">
                                <img src="public/img/robot.png" alt="DiscoverElement">
                            </div>
                            <div class="contentDiscoverElementTxt">
                                <h6>programmation robotique.</h6>
                                <span>
                                    une activité qui consiste à développer des programmes transmise à un robot pour lui
                                    faire réaliser une tâche.
                                </span>
                            </div>
                        </div>
                        <div class="contentDiscoverElement">
                            <div class="contentDiscoverElementPreview">
                                <img src="public/img/wood.png" alt="DiscoverElement">
                            </div>
                            <div class="contentDiscoverElementTxt">
                                <h6>Sculpture sur bois.</h6>
                                <span>
                                    La sculpture est une œuvre qu'on obtient en retirant de la matière. Le bois est sans
                                    doute le premier matériau
                                </span>
                            </div>
                        </div>
                        <div class="contentDiscoverElement">
                            <div class="contentDiscoverElementPreview">
                                <img src="public/img/robot.png" alt="DiscoverElement">
                            </div>
                            <div class="contentDiscoverElementTxt">
                                <h6>programmation robotique.</h6>
                                <span>
                                    une activité qui consiste à développer des programmes transmise à un robot pour lui
                                    faire réaliser une tâche.
                                </span>
                            </div>
                        </div>
                    </div>
                    <div id="contentDiscoverNavigation">
                        <div class="contentDiscoverNavigationDot NavigationDotActive"></div>
                        <div class="contentDiscoverNavigationDot"></div>
                        <div class="contentDiscoverNavigationDot"></div>
                    </div>
                </div>
            </div>
            <div id="contentRight">

            <?php
                if($brikoleurs->rowCount()){
                    // print_r($brikoleurs->fetchAll());
                    while($row = $brikoleurs->fetch()){
            ?>

                        <!-- <a href="" style="all: unset;"> -->
                            <div class="contentRightFeatured">
                                <a href="public/html/ProfilBrikoleur.php?id=<?php echo $row['id'] ?>">
                                    <div class="contentRightFeaturedPreview">
                                        <?php if($row['image']){ ?>
                                            <img src="public/img/<?php echo $row['image'] ?>" alt="featuredBrikoleur" />
                                        <?php }else{ ?>
                                            <img src="public/img/recent3.png" alt="featuredBrikoleur" />
                                        <?php } ?>
                                    </div>
                                </a>
                                <div class="contentRightFeaturedText">
                                    <span class="contentRightFeaturedName"><?php echo $row['prenom'].' '.$row['nom'] ?></span>
                                    <span class="contentRightFeaturedProf"><?php echo $row['profession'] ?></span>
                                </div>
                            </div>
                        <!-- </a> -->

                    <?php }
                }?>
                
                <div class="contentRightFeatured">
                    <a href="public/html/SearchResult.php">
                        <div id="contentRightFeaturedMore">
                        </div>
                    </a>
                    <div class="contentRightFeaturedText">
                        <span class="contentRightFeaturedName">Decouvrir plus ...</span>
                    </div>
                </div>
            </div>
        </div>
        <div id="contentRecent">
            <h3>Recherches récentes :</h3>
            <div id="contentRecentCont">
                
                <?php

                    if(isset($_COOKIE['historique'])){

                        $recentResIdsArrayObj = json_decode($_COOKIE['historique']);

                        foreach(array_reverse($recentResIdsArrayObj) as $recentResId){

                            $currentId = $recentResId->{'id'};
                            $db = Database::connect();
                            $searchedBrikoleurs = $db->prepare($query2."WHERE bricoleur.id_bricoleur = $currentId");
                            $searchedBrikoleurs->execute();
                            $db = Database::disconnect();

                            if($searchedBrikoleurs->rowCount()){
                                while($row = $searchedBrikoleurs->fetch()){?>
                                    <a href="public/html/ProfilBrikoleur.php?id=<?php echo $currentId ?>" style="all: unset; cursor:pointer;">
                                        <?php if($row['imagePortfolio']){ ?>
                                            <div class="contentRecentItem" style="background-image: url('public/img/<?php echo explode(',',$row['imagePortfolio'])[array_rand(explode(',',$row['imagePortfolio']))] ?>');">
                                        <?php }else{ ?>
                                            <div class="contentRecentItem" style="background-image: url('public/img/recent3.png');">                                        
                                        <?php } ?>

                                            <div class="contentRecentItemInfo">

                                                <?php if($row['imageProfile']){ ?>

                                                    <div class="contentRecentItemPreview"
                                                        style="background-image: url('public/img/<?php echo $row['imageProfile'] ?>');">
                                                    </div>

                                                <?php }else{ ?>
                                                    
                                                    <div class="contentRecentItemPreview"
                                                        style="background-image: url('public/img/recentProfile1.png');">
                                                    </div>                                           

                                                <?php } ?>

                                                <div class="contentRecentItemTxt">
                                                    <span class="contentRecentItemTitle">
                                                        <?php echo $row['prenom'].' '.$row['nom'] ?>
                                                    </span>
                                                    <span class="contentRecentItemProff">
                                                    <?php echo $row['profession'] ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>    
                                    </a>                       
                            <?php 
                                }
                            }else{ ?>
                                <div style="font-family: 'Roboto', sans-serif;">Pas de recherches récentes.</div>
                            <?php }
                        }
                    }else{?>
                        <div style="font-family: 'Roboto', sans-serif;">Pas de recherches récentes.</div>
                    <?php } ?>
                
                
            </div>
        </div>
        <!-- <div id="contentTrust">
            <h3>Qui nous fait confiance</h3>
            <div id="contentTrustCont">
                <div class="contentTrustItem">
                    <span>Entreprise X</span>
                </div>
                <div class="contentTrustItem">
                    <span>Entreprise X</span>
                </div>
                <div class="contentTrustItem">
                    <span>Entreprise X</span>
                </div>
                <div class="contentTrustItem">
                    <span>Entreprise X</span>
                </div>
                <div class="contentTrustItem">
                    <span>Entreprise X</span>
                </div>
                <div class="contentTrustItem">
                    <span>Entreprise X</span>
                </div>
            </div>
        </div> -->
    </div>
    
    <?php include 'includes/footer.php' ?>

</body>

</html>