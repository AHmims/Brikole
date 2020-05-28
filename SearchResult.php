<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/navbar-footer.css">
    <link rel="stylesheet" href="public/css/SearchResult.css">
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
                            echo "<option value='p:$professionId' $state style='background-color:grey'>$professionName</option>";
                            $state = "";
                            // 
                            $sousProfessions = getSousProfessionsByProfessionId($professionId);
                            while ($sousProfession = $sousProfessions->fetch_assoc()) {
                                $sousProfessionId = $sousProfession["id_Sprofession"];
                                $sousProfessionName = $sousProfession["libelle"];
                                // 
                                if ($selectedIndex == "sp:$sousProfessionId")
                                    $state = "selected";
                                echo "<option value='sp:$sousProfessionId' $state>$sousProfessionName</option>";
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
                        <button class="OrderResult active">Manouvrier
                        </button>
                        <button class="OrderResult">Agence de service
                        </button>
                    </div>
                    <div class="ResultProfiles">
                        <?php
                        // $bricoleurs = getBricoleur();
                        while ($bricoleur = $bricoleurs->fetch_assoc()) {
                            echo "<div class='ProfileFound'>";
                            // 
                            echo "<div class='PictureProfile'></div>";
                            echo "<div>";
                            // 
                            echo "<b>" . $bricoleur["nom"] . " " . $bricoleur["prenom"] . "</b>";
                            echo "<br/>";
                            $sousProfessionsNames = getSousProfessionsNames($bricoleur["id_bricoleur"]);
                            while ($sousProfessionName = $sousProfessionsNames->fetch_assoc()) {
                                echo "<button>" . $sousProfessionName["libelle"] . "</button>";
                            }
                            echo "<p class='City'>";
                            // 
                            echo "<i class='fas'>&#xf3c5;</i> ";
                            echo $bricoleur["lieu"] . ", Maroc";
                            // 
                            echo "</p>";
                            // 
                            echo "</div>";
                            // 
                            echo "</div>";
                        }
                        ?>
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
</body>

</html>