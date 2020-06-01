<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/navbar-footer.css">
    <link rel="stylesheet" href="public/css/SearchResult.css">
    <link rel="stylesheet" href="public/css/searchResultUpdate.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <title>Brikole</title>
</head>

<body>
    <?php
    include './includes/header.php';
    include './Includes/search.php';
    ?>
    <div class="Blank"></div>

    <!-- Contant -->
    <div id="contentSEARCH">
        <div id="contentMainSEARCH">
            <div id="contantTitle">
                <h1>Trouver votre Brikoleur maintenant :</h1>
                <form id="searchBarSEARCH" method="POST">
                    <select name="search_profession" id="" class="searchMenuSelect">
                        <option value='*'>Touts les professions</option>
                        <?php
                        $selectedIndex = "null";
                        if (isset($_POST["search_profession"])) {
                            if ($_POST["search_profession"] != "*") {
                                $selectedIndex = $_POST["search_profession"];
                            }
                        }
                        $professions = getAllDataFromTable("profession");
                        while ($profession = $professions->fetch_assoc()) {
                            $professionId = $profession["id_profession"];
                            $professionName = $profession["libelle_profession"];
                            $state = "";
                            // 
                            if ($selectedIndex == "p:$professionId")
                                $state = "selected";
                            echo "<option value='p:$professionId' $state class='optionTitle'>$professionName</option>";
                            $state = "";
                            // 
                            $sousProfessions = getSousProfessionsByProfessionId($professionId);
                            while ($sousProfession = $sousProfessions->fetch_assoc()) {
                                $sousProfessionId = $sousProfession["id_Sprofession"];
                                $sousProfessionName = $sousProfession["libelle"];
                                // 
                                if ($selectedIndex == "sp:$sousProfessionId")
                                    $state = "selected";
                                echo "<option value='sp:$sousProfessionId' $state class='optionValue'>$sousProfessionName</option>";
                                $state = "";
                            }
                        }
                        ?>
                    </select>
                    <select name="search_city" id="" class="searchMenuSelect">
                        <option value="">Tout le maroc</option>
                        <option value="safi">Safi</option>
                        <option value="tanger">Tanger</option>
                    </select>
                    <!--  -->
                    <button id="searchMenuBtn" type="submit">
                        <span>Trouver</span>
                        <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 16C9.77498 15.9996 11.4988 15.4054 12.897 14.312L17.293 18.708L18.707 17.294L14.311 12.898C15.405 11.4997 15.9996 9.77544 16 8C16 3.589 12.411 0 8 0C3.589 0 0 3.589 0 8C0 12.411 3.589 16 8 16ZM8 2C11.309 2 14 4.691 14 8C14 11.309 11.309 14 8 14C4.691 14 2 11.309 2 8C2 4.691 4.691 2 8 2Z" fill="#FDFDFD" />
                            <path d="M9.41207 6.58609C9.79107 6.96609 10.0001 7.46809 10.0001 8.00009H12.0001C12.001 7.47451 11.8977 6.95398 11.6961 6.46857C11.4946 5.98316 11.1989 5.54251 10.8261 5.17209C9.31207 3.66009 6.68707 3.66009 5.17407 5.17209L6.58607 6.58809C7.34607 5.83009 8.65607 5.83209 9.41207 6.58609Z" fill="#FDFDFD" /> </svg>
                    </button>
                </form>

            </div>
            <div id="Resultcontainer">
                <div id="Results">
                    <?php
                    $bricoleurs = getBricoleur();
                    ?>
                    <div id="sortEngine">
                        <?php
                        $bricoleursCount = $bricoleurs->num_rows;
                        $searchCity = "au Maroc";
                        if (isset($_POST["search_city"])) {
                            $searchCity = "à " . $_POST["search_city"] . ", Maroc";
                        }
                        echo "<h2>";
                        // 
                        echo $bricoleursCount . " Résultats ";
                        echo "<span>";
                        // 
                        echo $searchCity;
                        // 
                        echo "</span>";
                        // 
                        echo "</h2>";
                        ?>
                        <div id="categories">
                            <div id="categoriesBox">
                                <p>Catégories</p>
                            </div>
                            <div class="grid-container">
                                <div>
                                    <p>Spécialité</p>
                                </div>
                                <div>
                                    <p>Spécialité</p>
                                </div>
                                <div>
                                    <p>Spécialité</p>
                                </div>
                                <div>
                                    <p>Spécialité</p>
                                </div>
                                <div>
                                    <p>Spécialité</p>
                                </div>
                                <div>
                                    <p>Spécialité</p>
                                </div>
                                <div>
                                    <p>Spécialité</p>
                                </div>
                                <div>
                                    <p>Spécialité</p>
                                </div>
                            </div>

                        </div>
                        <button class="OrderResult active">Manouvrier</button>
                        <button class="OrderResult" disabled>Agence de service</button>
                    </div>
                    <div class="ResultProfiles">
                        <?php
                        // $bricoleurs = getBricoleur();
                        while ($bricoleur = $bricoleurs->fetch_assoc()) {
                            // echo "<div class='ProfileFound' data-id=" . $bricoleur["id_bricoleur"] . " data-href='./brikoleur.php?id=" . $bricoleur["id_bricoleur"] . "' style='cursor:pointer;'>";
                            echo "<div class='ProfileFound ProfileFound_U' data-id=" . $bricoleur["id_bricoleur"] . " data-href='./brikoleur.php?id=" . $bricoleur["id_bricoleur"] . "' style='cursor:pointer;'>";
                            // 
                            // echo "<div class='PictureProfile'></div>";
                            // echo "<div>";
                            echo "<div class='PictureProfile_U'>";
                            $imageName = getProfileImage($bricoleur["id_bricoleur"]);
                            $imageName = $imageName["refrence_image"];
                            echo "<img src='./public/img/{$imageName}'/>";
                            echo "</div>";
                            // 
                            // echo "<b>" . $bricoleur["nom"] . " " . $bricoleur["prenom"] . "</b>";
                            // echo "<br/>";
                            echo "<div class='profile_infos'>";
                            echo "<span class='profile_name'>" . $bricoleur["nom"] . ' ' . $bricoleur["prenom"] . "</span>";
                            echo "<div class='profile_details'>";
                            $professionName = getBricoleurProfession($bricoleur["id_bricoleur"]);
                            // echo $professionName;
                            echo "<span>" . $professionName . "</span>";
                            $sousProfessionsNames = getSousProfessionsNames($bricoleur["id_bricoleur"]);
                            while ($sousProfessionName = $sousProfessionsNames->fetch_assoc()) {
                                echo "<span>" . $sousProfessionName["libelle"] . "</span>";
                            }
                            echo "</div>";
                            echo "<p class='profile_location'>";
                            echo '<svg width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.5 0C2.0142 0 0 2.09099 0 4.68105C0 9.15947 4.5 15 4.5 15C4.5 15 9 9.15854 9 4.68105C9 2.09193 6.9858 0 4.5 0ZM4.5 7.27111C3.85552 7.27111 3.23744 7.00426 2.78173 6.52926C2.32602 6.05426 2.07 5.41002 2.07 4.73827C2.07 4.06652 2.32602 3.42229 2.78173 2.94729C3.23744 2.47229 3.85552 2.20544 4.5 2.20544C5.14448 2.20544 5.76256 2.47229 6.21827 2.94729C6.67398 3.42229 6.93 4.06652 6.93 4.73827C6.93 5.41002 6.67398 6.05426 6.21827 6.52926C5.76256 7.00426 5.14448 7.27111 4.5 7.27111Z" fill="#FFC000" />
                            </svg>';
                            echo "<span>" . $bricoleur["lieu"] . " , Maroc</span>";
                            // 
                            echo "</p>";
                            // 
                            echo "</div>";
                            // 
                            echo "</div>";
                            // echo "</div>";
                        }
                        ?>
                        <div class="ProfileFound ProfileFound_U">
                            <div class="PictureProfile_U">
                                <img src="./public/img/P1.png" alt="">
                            </div>
                            <div class="profile_infos">
                                <span class="profile_name">Jamal Hachim</span>
                                <div class="profile_details">
                                    <span>profession 1</span>
                                    <span>sous profession 1</span>
                                    <span>sous profession 2</span>
                                </div>
                                <p class="profile_location">
                                    <svg width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.5 0C2.0142 0 0 2.09099 0 4.68105C0 9.15947 4.5 15 4.5 15C4.5 15 9 9.15854 9 4.68105C9 2.09193 6.9858 0 4.5 0ZM4.5 7.27111C3.85552 7.27111 3.23744 7.00426 2.78173 6.52926C2.32602 6.05426 2.07 5.41002 2.07 4.73827C2.07 4.06652 2.32602 3.42229 2.78173 2.94729C3.23744 2.47229 3.85552 2.20544 4.5 2.20544C5.14448 2.20544 5.76256 2.47229 6.21827 2.94729C6.67398 3.42229 6.93 4.06652 6.93 4.73827C6.93 5.41002 6.67398 6.05426 6.21827 6.52926C5.76256 7.00426 5.14448 7.27111 4.5 7.27111Z" fill="#FFC000" />
                                    </svg>
                                    <span>
                                        Safi, Maroc
                                    </span>
                                </p>
                            </div>

                        </div>
                        <!-- <div class="ProfileFound">
                            <div class="PictureProfile"></div>
                            <div> <b>Jamal Hachim</b><br>
                                <button>Specialité 1</button>
                                <button>Specialité 2</button>
                                <p class="City"><i class="fas">&#xf3c5;</i> Safi, Maroc</p>
                            </div>

                        </div>
                        <div class="ProfileFound">
                            <div class="PictureProfile"></div>
                            <div> <b>Jamal Hachim</b><br>
                                <button>Specialité 1</button>
                                <button>Specialité 2</button><br>
                                <p class="City"><i class="fas">&#xf3c5;</i> Safi, Maroc</p>
                            </div>

                        </div>
                        <div class="ProfileFound">
                            <div class="PictureProfile"></div>
                            <div> <b>Jamal Hachim</b><br>
                                <button>Specialité 1</button>
                                <button>Specialité 2</button><br>
                                <p class="City"><i class="fas">&#xf3c5;</i> Safi, Maroc</p>
                            </div>

                        </div>
                        <div class="ProfileFound">
                            <div class="PictureProfile"></div>
                            <div> <b>Jamal Hachim</b><br>
                                <button>Specialité 1</button>
                                <button>Specialité 2</button><br>
                                <p class="City"><i class="fas">&#xf3c5;</i> Safi, Maroc</p>
                            </div>

                        </div>
                        <div class="ProfileFound">
                            <div class="PictureProfile"></div>
                            <div> <b>Jamal Hachim</b><br>
                                <button>Specialité 1</button>
                                <button>Specialité 2</button><br>
                                <p class="City"><i class="fas">&#xf3c5;</i> Safi, Maroc</p>
                            </div>

                        </div> -->
                    </div>
                </div>
                <div id="adertisment">
                    <div class="PremiemBox">
                        <p>Service Premium</p>
                    </div>
                    <div>
                        <div class="Adv">

                            <!-- <img src="../img/Agence.png" alt=""> -->

                            <div class="overlay"></div>
                        </div>
                        <p class="adName"> Agence X</p>
                        <p class="adAdress">Adress</p>
                    </div>
                    <div>
                        <div class="Adv">

                            <!-- <img src="../img/featured1.png" alt=""> -->
                            <div class="overlay"></div>

                        </div>
                        <p class="adName"> Agence X</p>
                        <p class="adAdress">Adress</p>
                    </div>

                </div>
                <div></div>

            </div>
            <div class="Blank"></div>

        </div>
    </div>


    <!-- Footer -->
    <?php
    include 'includes/footer.php';
    ?>
    <!--  -->
    <script src="public/js/navbar_footer.js"></script>
    <script src="public/js/searchResult.js"></script>
</body>

</html>