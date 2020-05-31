<?php
include '../Includes/Connection2.php';

$db = Database::connect();

$brikoleurs = $db->prepare("SELECT bricoleur.prenom as prenom , bricoleur.nom as nom , image.refrence_image as image , profession.libelle_profession as profession , sp.id_Sprofession as Sprofession , bsp.id_bricoleur
                            FROM bricoleur 
                            LEFT JOIN image ON (bricoleur.id_bricoleur = image.id_bricoleur AND image.type_image = 'profile')
                            LEFT JOIN ((SELECT id_profession , id_Sprofession FROM sous_profession GROUP BY id_profession) as sp , (SELECT id_bricoleur , id_Sprofession FROM bricoleur_sous_profession GROUP BY id_bricoleur) as bsp) 
                            ON (bricoleur.id_bricoleur = bsp.id_bricoleur AND bsp.id_Sprofession = sp.id_Sprofession)
                            LEFT JOIN profession ON sp.id_profession = profession.id_profession
                            ORDER BY RAND() LIMIT 5");                         

$brikoleurs->execute();

$empty = "";

$query = "SELECT bricoleur.prenom as prenom , bricoleur.nom as nom , imageProfile.refrence_image as imageProfile , GROUP_CONCAT(imagePortfolio.refrence_image) as imagePortfolio , profession.libelle_profession as profession , sp.id_Sprofession as Sprofession , bsp.id_bricoleur
FROM bricoleur 
LEFT JOIN image as imageProfile ON (bricoleur.id_bricoleur = imageProfile.id_bricoleur AND imageProfile.type_image = 'profile')
LEFT JOIN (image as imagePortfolio) ON (bricoleur.id_bricoleur = imagePortfolio.id_bricoleur AND imagePortfolio.type_image = 'portfolio')
LEFT JOIN ((SELECT id_profession , id_Sprofession FROM sous_profession GROUP BY id_profession) as sp , (SELECT id_bricoleur , id_Sprofession FROM bricoleur_sous_profession GROUP BY id_bricoleur) as bsp) 
ON (bricoleur.id_bricoleur = bsp.id_bricoleur AND bsp.id_Sprofession = sp.id_Sprofession)
LEFT JOIN profession ON sp.id_profession = profession.id_profession ";



$db = Database::disconnect();

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/navbar-footer.css">
    <link rel="stylesheet" href="../css/index.css">
    <title>Brikole</title>
</head>

<body>
    <nav id="navBarCont">
        <div id="navBar">
            <a href="/">
                <img src="../icon/logo-full.svg" alt="BriKoleLogo" />
            </a>
            <ul id="navBarLinks">
                <li href="#" class="navBarLink">Accueil</li>
                <div class="navBarSeperator"></div>
                <li href="#" class="navBarLink">Identification</li>
                <div class="navBarSeperator"></div>
                <li href="#" class="navBarLink navBarButton">Nous Rejoindre</li>
            </ul>
        </div>
    </nav>
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
                                <img src="../img/robot.png" alt="DiscoverElement">
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
                                <img src="../img/wood.png" alt="DiscoverElement">
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
                                <img src="../img/robot.png" alt="DiscoverElement">
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

                        <div class="contentRightFeatured">
                            <div class="contentRightFeaturedPreview">
                                <?php if($row['image']){ ?>
                                    <img src="../img/<?php echo $row['image'] ?>" alt="featuredBrikoleur" />
                                <?php }else{ ?>
                                    <img src="../img/recent3.png" alt="featuredBrikoleur" />
                                <?php } ?>
                            </div>
                            <div class="contentRightFeaturedText">
                                <span class="contentRightFeaturedName"><?php echo $row['prenom'].' '.$row['nom'] ?></span>
                                <span class="contentRightFeaturedProf"><?php echo $row['profession'] ?></span>
                            </div>
                        </div>

                    <?php }
                }?>

                <!-- <div class="contentRightFeatured">
                    <div class="contentRightFeaturedPreview">
                        <img src="../img/featured2.png" alt="featuredBrikoleur2" />
                    </div>
                    <div class="contentRightFeaturedText">
                        <span class="contentRightFeaturedName">Mahmoud SOCADYA</span>
                        <span class="contentRightFeaturedProf">Paintre</span>
                    </div>
                </div>
                <div class="contentRightFeatured">
                    <div class="contentRightFeaturedPreview">
                        <img src="../img/featured3.png" alt="featuredBrikoleur3" />
                    </div>
                    <div class="contentRightFeaturedText">
                        <span class="contentRightFeaturedName">Yazid EL BECRI</span>
                        <span class="contentRightFeaturedProf">carreleur</span>
                    </div>
                </div>
                <div class="contentRightFeatured">
                    <div class="contentRightFeaturedPreview">
                        <img src="../img/featured4.png" alt="featuredBrikoleur4" />
                    </div>
                    <div class="contentRightFeaturedText">
                        <span class="contentRightFeaturedName">Mohamed ELBAKILI</span>
                        <span class="contentRightFeaturedProf">electricien</span>
                    </div>
                </div>
                <div class="contentRightFeatured">
                    <div class="contentRightFeaturedPreview">
                        <img src="../img/featured5.png" alt="featuredBrikoleur5" />
                    </div>
                    <div class="contentRightFeaturedText">
                        <span class="contentRightFeaturedName">Youssef LIRSI</span>
                        <span class="contentRightFeaturedProf">Plombier</span>
                    </div>
                </div> -->
                
                <div class="contentRightFeatured">
                    <div id="contentRightFeaturedMore">
                    </div>
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

                    if(isset($_COOKIE['recentResIds'])){

                        $recentResIdsArrayObj = json_decode($_COOKIE['recentResIds']);

                        foreach(array_reverse($recentResIdsArrayObj) as $recentResId){

                            $currentId = $recentResId->{'id'};
                            $db = Database::connect();
                            $searchedBrikoleurs = $db->prepare($query."WHERE bricoleur.id_bricoleur = $currentId");
                            $searchedBrikoleurs->execute();
                            $db = Database::disconnect();

                            if($searchedBrikoleurs->rowCount()){
                                while($row = $searchedBrikoleurs->fetch()){?>
                                    
                                    <?php if($row['imagePortfolio']){ ?>
                                        <div class="contentRecentItem" style="background-image: url('../img/<?php echo explode(',',$row['imagePortfolio'])[array_rand(explode(',',$row['imagePortfolio']),1)] ?>');">
                                    <?php }else{ ?>
                                        <div class="contentRecentItem" style="background-image: url('../img/recent3.png');">                                        
                                    <?php } ?>

                                        <div class="contentRecentItemInfo">

                                            <?php if($row['imageProfile']){ ?>

                                                <div class="contentRecentItemPreview"
                                                    style="background-image: url('../img/<?php echo $row['imageProfile'] ?>');">
                                                </div>

                                            <?php }else{ ?>
                                                
                                                <div class="contentRecentItemPreview"
                                                    style="background-image: url('../img/recentProfile1.png');">
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
                            <?php 
                                }
                            }else{ ?>
                                <div style="font-family: 'Roboto', sans-serif;">Pas de recherches récentes.</div>
                            <?php }
                        }
                    }else{?>
                        <div style="font-family: 'Roboto', sans-serif;">Pas de recherches récentes.</div>
                    <?php } ?>
                
                <!-- <div class="contentRecentItem" style="background-image: url('../img/recent1.png');">
                    <div class="contentRecentItemInfo">
                        <div class="contentRecentItemPreview"
                            style="background-image: url('../img/recentProfile1.png');"></div>
                        <div class="contentRecentItemTxt">
                            <span class="contentRecentItemTitle">
                                Radwan Fakir
                            </span>
                            <span class="contentRecentItemProff">
                                Jardinier
                            </span>
                        </div>
                    </div>
                </div> -->
                <!-- <div class="contentRecentItem" style="background-image: url('../img/recent2.png');">
                    <div class="contentRecentItemInfo">
                        <div class="contentRecentItemPreview"
                            style="background-image: url('../img/recentProfile2.png');"></div>
                        <div class="contentRecentItemTxt">
                            <span class="contentRecentItemTitle">
                                Radwan Fakir
                            </span>
                            <span class="contentRecentItemProff">
                                Jardinier
                            </span>
                        </div>
                    </div>
                </div>
                <div class="contentRecentItem" style="background-image: url('../img/recent3.png');">
                    <div class="contentRecentItemInfo">
                        <div class="contentRecentItemPreview"
                            style="background-image: url('../img/recentProfile3.png');"></div>
                        <div class="contentRecentItemTxt">
                            <span class="contentRecentItemTitle">
                                Radwan Fakir
                            </span>
                            <span class="contentRecentItemProff">
                                Jardinier
                            </span>
                        </div>
                    </div>
                </div>
                <div class="contentRecentItem" style="background-image: url('../img/recent4.png');">
                    <div class="contentRecentItemInfo">
                        <div class="contentRecentItemPreview"
                            style="background-image: url('../img/recentProfile4.png');"></div>
                        <div class="contentRecentItemTxt">
                            <span class="contentRecentItemTitle">
                                Radwan Fakir
                            </span>
                            <span class="contentRecentItemProff">
                                Jardinier
                            </span>
                        </div>
                    </div>
                </div>
                <div class="contentRecentItem" style="background-image: url('../img/recent5.png');">
                    <div class="contentRecentItemInfo">
                        <div class="contentRecentItemPreview"
                            style="background-image: url('../img/recentProfile1.png');"></div>
                        <div class="contentRecentItemTxt">
                            <span class="contentRecentItemTitle">
                                Radwan Fakir
                            </span>
                            <span class="contentRecentItemProff">
                                Jardinier
                            </span>
                        </div>
                    </div>
                </div> -->
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
    <div id="footerCont">
        <div id="footer">
            <a href="/" class="footerLogo">
                <svg width="114" height="40" viewBox="0 0 114 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M4.42272 10.7012L0 14.9812V18.4536L3.23614 21.6898V23.5428L4.31485 23.5447V22.5451C4.31485 22.5185 4.31581 22.4921 4.31771 22.466L4.31485 22.466V21.243L1.07871 18.0068V15.4384L3.34401 13.2462V17.7643L4.42666 18.7696H6.36046L7.44311 17.7643V13.2462L9.70841 15.4384V18.0068L6.47227 21.243V22.4697L6.46968 22.4697C6.4714 22.4946 6.47227 22.5197 6.47227 22.5451V23.5484L7.55099 23.5502V21.6898L10.7871 18.4536V14.9812L6.3644 10.7012V17.2939L5.93686 17.6909H4.85026L4.42272 17.2939V10.7012Z"
                        fill="#FDFDFD" />
                    <path
                        d="M3.23614 4.31485H21.2536L24.1371 10.2003L19.2143 20.3877H27.0886L29.3528 27.9352L27.0937 35.3818H7.55099V22.9766H6.47227V30.7433C6.47227 31.3391 5.98932 31.822 5.39356 31.822C4.7978 31.822 4.31485 31.3391 4.31485 30.7433V22.9766H3.23614V39.6966H30.2938L33.8597 27.9421L30.2989 16.0728H26.0916L28.9356 10.1873L23.9445 0H3.23614V4.31485Z"
                        fill="#FDFDFD" />
                    <path
                        d="M5.93292 30.7433C5.93292 31.0412 5.69144 31.2827 5.39356 31.2827C5.09568 31.2827 4.85421 31.0412 4.85421 30.7433C4.85421 30.4454 5.09568 30.2039 5.39356 30.2039C5.69144 30.2039 5.93292 30.4454 5.93292 30.7433Z"
                        fill="#FDFDFD" />
                    <path d="M7.55099 4.31485H3.23614L7.55099 8.6297V4.31485Z" fill="#FDFDFD" />
                    <path
                        d="M35.4492 39.6966H39.5904V30.7467C39.5904 30.3118 39.6713 29.9022 39.8331 29.518C39.9949 29.1337 40.2174 28.7999 40.5006 28.5168C40.7838 28.2336 41.1175 28.0111 41.5018 27.8493C41.8861 27.6875 42.2956 27.6066 42.7305 27.6066H46.3863V23.4805H42.7305C41.8203 23.4805 40.9405 23.6474 40.091 23.9811C39.2415 24.3047 38.4831 24.7699 37.8156 25.3767L36.4504 23.4502H35.4492V39.6966Z"
                        fill="#FDFDFD" />
                    <path d="M48.3128 39.6966H52.4844V23.4502H48.3128V39.6966Z" fill="#FDFDFD" />
                    <path
                        d="M56.0947 39.6966H60.4483V35.343L63.7704 30.8984L68.5488 39.6966H73.494L66.6223 27.1212L73.494 17.9437H68.5488L60.4483 28.8202V17.9437H56.0947V39.6966Z"
                        fill="#FDFDFD" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M89.0882 34.8272C89.523 33.7755 89.7404 32.6428 89.7404 31.4293C89.7404 30.1348 89.523 28.9617 89.0882 27.91C88.6533 26.8481 88.0617 25.943 87.3133 25.1947C86.565 24.4362 85.6852 23.8547 84.6739 23.4502C83.6727 23.0356 82.5956 22.8282 81.4428 22.8282C80.3 22.8282 79.223 23.0457 78.2117 23.4805C77.2105 23.9154 76.3307 24.5171 75.5722 25.2857C74.8239 26.0442 74.2323 26.9493 73.7974 28.001C73.3625 29.0528 73.1451 30.1955 73.1451 31.4293C73.1451 32.6428 73.3625 33.7755 73.7974 34.8272C74.2323 35.8689 74.8239 36.774 75.5722 37.5426C76.3307 38.301 77.2105 38.9027 78.2117 39.3477C79.223 39.7826 80.3 40 81.4428 40C82.5956 40 83.6727 39.7826 84.6739 39.3477C85.6852 38.9027 86.565 38.301 87.3133 37.5426C88.0617 36.774 88.6533 35.8689 89.0882 34.8272ZM85.2351 29.6241C85.4576 30.1601 85.5688 30.7618 85.5688 31.4293C85.5688 32.0866 85.4576 32.6884 85.2351 33.2345C85.0228 33.7805 84.7295 34.2457 84.3553 34.63C83.9811 35.0143 83.5412 35.3127 83.0356 35.525C82.54 35.7374 82.0091 35.8436 81.4428 35.8436C80.8764 35.8436 80.3405 35.7323 79.8348 35.5099C79.3393 35.2773 78.9044 34.9638 78.5303 34.5694C78.1662 34.175 77.878 33.7098 77.6656 33.1738C77.4532 32.6378 77.347 32.0563 77.347 31.4293C77.347 30.7618 77.4532 30.1601 77.6656 29.6241C77.878 29.078 78.1662 28.6128 78.5303 28.2286C78.9044 27.8341 79.3393 27.5358 79.8348 27.3336C80.3405 27.1212 80.8764 27.015 81.4428 27.015C82.0091 27.015 82.54 27.1212 83.0356 27.3336C83.5412 27.5358 83.9811 27.8341 84.3553 28.2286C84.7295 28.6128 85.0228 29.078 85.2351 29.6241Z"
                        fill="#FDFDFD" />
                    <path d="M92.031 39.6966H96.2026V16.988H92.031V39.6966Z" fill="#FDFDFD" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M106.321 35.8284C106.159 35.8082 105.997 35.7728 105.835 35.7222L113.602 26.3627C113.218 25.8166 112.773 25.3261 112.267 24.8913C111.761 24.4463 111.215 24.0721 110.629 23.7688C110.052 23.4654 109.44 23.2328 108.793 23.071C108.146 22.9092 107.484 22.8282 106.806 22.8282C105.663 22.8282 104.586 23.0356 103.575 23.4502C102.574 23.8648 101.694 24.4463 100.935 25.1947C100.187 25.943 99.5955 26.8481 99.1606 27.91C98.7258 28.9719 98.5083 30.145 98.5083 31.4293C98.5083 32.6833 98.7258 33.8362 99.1606 34.8879C99.5955 35.9295 100.187 36.8296 100.935 37.5881C101.694 38.3465 102.574 38.9381 103.575 39.3629C104.586 39.7876 105.663 40 106.806 40C107.484 40 108.141 39.9191 108.778 39.7573C109.425 39.6056 110.037 39.3781 110.614 39.0747C111.2 38.7713 111.741 38.4022 112.237 37.9673C112.742 37.5324 113.187 37.042 113.572 36.4959L110.538 33.4468C110.376 33.8109 110.163 34.1446 109.901 34.448C109.648 34.7413 109.354 34.9941 109.021 35.2065C108.697 35.4087 108.348 35.5655 107.974 35.6767C107.6 35.788 107.211 35.8436 106.806 35.8436C106.644 35.8436 106.482 35.8385 106.321 35.8284ZM107.382 27.0453C107.575 27.0656 107.767 27.1111 107.959 27.1819L103.135 33.5833C103.054 33.4418 102.988 33.28 102.938 33.0979C102.887 32.9159 102.842 32.7288 102.801 32.5367C102.771 32.3344 102.746 32.1372 102.725 31.9451C102.715 31.7529 102.71 31.581 102.71 31.4293C102.71 30.7517 102.816 30.145 103.029 29.609C103.241 29.0629 103.529 28.5977 103.893 28.2134C104.268 27.8291 104.703 27.5358 105.198 27.3336C105.704 27.1212 106.24 27.015 106.806 27.015C107.008 27.015 107.2 27.0251 107.382 27.0453Z"
                        fill="#FDFDFD" />
                    <path
                        d="M51.7991 16.5809L53.1961 19.0006L51.7991 21.4203H49.0051L47.6081 19.0006L49.0051 16.5809H51.7991Z"
                        fill="#FDFDFD" />
                </svg>
            </a>
            <div class="footerContent">
                <ul>
                    <li>
                        <a href="#">- Conditions générales d'utilisation</a>
                    </li>
                    <li>
                        <a href="#">- Politique de confidentialité</a>
                    </li>
                    <li>
                        <a href="#">- Utilisation des cookies</a>
                    </li>
                </ul>
                <div class="footerSocial">
                    <span>Réseaux Sociaux :</span>
                    <div class="footerSocialCont">
                        <a href="#">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M0 0V18H18V0H0ZM12.9485 2.34888C13.0792 2.3461 13.2153 2.35035 13.3561 2.35986C13.8732 2.36056 14.4133 2.40719 14.9491 2.45434L14.8909 4.5857H13.4517C12.7768 4.57076 12.5331 4.83279 12.5112 5.59423V7.26855H14.9491L14.8524 9.55151H12.5112V15.9071H10.1327V9.55152H8.48145V7.26855H10.1327V5.30859C10.1327 3.89546 10.7301 2.99598 11.907 2.54004C12.2092 2.42112 12.5563 2.3572 12.9485 2.34888Z"
                                    fill="#F4F4F4" />
                            </svg>
                        </a>
                        <a href="#">
                            <svg width="21" height="18" viewBox="0 0 21 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M19.607 4.20301C19.4931 3.78041 19.2705 3.39501 18.9614 3.08518C18.6522 2.77534 18.2673 2.55187 17.845 2.43701C16.279 2.00701 10.014 2.00001 10.014 2.00001C10.014 2.00001 3.75 1.99301 2.183 2.40401C1.76093 2.52415 1.37682 2.75078 1.06757 3.06214C0.758311 3.3735 0.534287 3.75913 0.417002 4.18201C0.00400165 5.74801 1.46514e-06 8.99601 1.46514e-06 8.99601C1.46514e-06 8.99601 -0.00399852 12.26 0.406001 13.81C0.636001 14.667 1.311 15.344 2.169 15.575C3.751 16.005 9.999 16.012 9.999 16.012C9.999 16.012 16.264 16.019 17.83 15.609C18.2525 15.4943 18.6377 15.2714 18.9477 14.9622C19.2576 14.653 19.4814 14.2682 19.597 13.846C20.011 12.281 20.014 9.03401 20.014 9.03401C20.014 9.03401 20.034 5.76901 19.607 4.20301ZM8.01 12.005L8.015 6.00501L13.222 9.01001L8.01 12.005Z"
                                    fill="#F4F4F4" />
                                <path
                                    d="M9.01416 13.5L0.0141602 9V18H20.0142V0H0.0141602V8.5L6.01416 3.5L17.0142 8L9.01416 13.5Z"
                                    fill="#F4F4F4" />
                            </svg>
                        </a>
                        <a href="#">
                            <svg width="19" height="18" viewBox="0 0 19 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M0.0141602 0V18H18.0142V0H0.0141602ZM14.4142 6.3V6.6375C14.4142 10.35 11.6017 14.5125 6.53916 14.5125C4.96416 14.5125 3.50166 14.0625 2.26416 13.275H2.93916C4.28916 13.275 5.41416 12.825 6.42666 12.0375C5.18916 12.0375 4.17666 11.25 3.83916 10.125H4.40166C4.62666 10.125 4.85166 10.125 5.07666 10.0125C3.83916 9.7875 2.82666 8.6625 2.82666 7.3125C3.16416 7.5375 3.61416 7.65 4.06416 7.65C3.27666 7.2 2.82666 6.3 2.82666 5.4C2.82666 4.8375 2.93916 4.3875 3.16416 4.05C4.51416 5.7375 6.65166 6.75 8.90166 6.8625C8.90166 6.6375 8.78916 6.4125 8.78916 6.1875C8.78916 4.6125 10.0267 3.375 11.6017 3.375C12.3892 3.375 13.0642 3.7125 13.6267 4.275C14.3017 4.1625 14.8642 3.9375 15.4267 3.6C15.2017 4.275 14.7517 4.8375 14.1892 5.175C14.7517 5.0625 15.3142 4.95 15.7642 4.725C15.4267 5.4 14.9767 5.85 14.4142 6.3Z"
                                    fill="#F4F4F4" />
                            </svg>
                        </a>
                        <a href="#">
                            <svg width="19" height="18" viewBox="0 0 19 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M0.0141602 0V18H18.0142V0H0.0141602ZM4.42846 3.53869C5.14141 3.54672 5.84372 4.03857 5.87427 4.89002C5.88951 5.64714 5.2297 6.22383 4.40979 6.24133H4.39002C3.68417 6.23319 2.99484 5.72899 2.96289 4.89002C2.97295 4.14132 3.60229 3.55645 4.42846 3.53869ZM12.0771 7.11585C12.861 7.12071 13.6007 7.35324 14.2085 7.9728C14.8401 8.6772 15.0429 9.64845 15.0654 10.6359V15.1271H12.477V10.9413C12.4713 10.1568 12.2025 9.20313 11.1642 9.17139C10.5556 9.17787 10.1265 9.5315 9.83263 10.1228C9.75241 10.3131 9.74086 10.5319 9.73705 10.7501V15.1271H7.14978C7.15968 12.9389 7.17329 10.7509 7.16846 8.56275C7.16846 7.94118 7.16247 7.52265 7.14978 7.30701H9.73705V8.41004C9.95667 8.09769 10.2002 7.80147 10.527 7.56298C10.9701 7.24671 11.5025 7.12546 12.0771 7.11585ZM3.11561 7.30701H5.70288V15.1271H3.11561V7.30701Z"
                                    fill="#F4F4F4" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>