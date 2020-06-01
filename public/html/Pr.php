<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/navbar-footer.css">
    <link rel="stylesheet" href="../css/Profession.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <?php 
        session_start();
        include 'header.php';
        
    ?>
    <form action="" method="POST">
    <div id="conteneurProf">
        <img src="../icon/logo-min.svg" alt="BriKoleLogo" />
        <p id="parag">Selectionnez votre profession:</p>
        <?php 
            $conn = new mysqli("localhost", "root", "", "bd_brikole");  
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            // --------------------Requete ts les prefessions; 
            $sql1 = "SELECT * FROM profession";
            $res1 = mysqli_query($conn, $sql1);
            ?>
            <div id="ZoneProf">
            <?php while($ligne = mysqli_fetch_assoc($res1)):?>
                <div class="PartieRadCheck">
                <label value="<?php echo $ligne["libelle_profession"] ;?>" class="container"><?php echo $ligne["libelle_profession"] ;?>
                    <input type="radio" class="Radio"  name="radio" value="<?php echo $ligne["id_profession"] ;?>">
                    <span class="checkmark"></span>
                </label>
                <?php
                $id_prof = $ligne["id_profession"];
                $sql = "SELECT * FROM profession , sous_profession where profession.id_profession = sous_profession.id_profession AND profession.id_profession ='$id_prof'";
                $res = mysqli_query($conn, $sql);
                $rows = $rows =mysqli_num_rows($res);
                ?>
                <?php if($rows>=1): ?>
                    <?php while($enreg = mysqli_fetch_assoc($res)):?>
                        <div class="Check">
                                <label class="container1">
                                    <?php echo $enreg["libelle"];?>
                                    <input type="checkbox" name="check[]" class="Check InputB" value="<?php echo $enreg["id_Sprofession"]; ?>">
                                    <span class="checkmark1"></span>
                                </label>
                        </div>  
                    <?php endwhile; ?>
                <?php endif; ?>
                </div>
            <?php endwhile; ?>
        </div>  
    
        
    </div>
    <div id="divButt">
        <input type="submit" value="RETOUR" id="annulation" name="BTNSS">
        <input type="submit" value="CONTINUER >" id="confirmation" name="BTNIns2">
    </div>
    <div class="blank"></div>
    </form>
    <!-- Partie traitement  -->
    <?php
        $IdBrikoleur = $_SESSION['id_Brikoleur_inscription'];
        //echo $IdBrikoleur;
        if(isset($_POST['BTNIns2'])){
            $Profession = $_POST['radio'];
            $SProfession = $_POST['check'];
            $count = 0;
            if(isset($Profession)){
                $reqP = "INSERT INTO association_2 VALUES ({$Profession},{$IdBrikoleur}) ";
                if(count($SProfession)>0){
                    $reqSP = "INSERT INTO bricoleur_sous_profession VALUES ";
                    $count = 0;
                    foreach ( $SProfession as $value ) {
                        if($count > 0)
                            $reqSP .= ",";
                        $reqSP .= "({$value},{$IdBrikoleur})";
                        $count++;
                    }
                    
                    $resSP = mysqli_query($conn, $reqSP);
                    //echo($reqSP) ;
                }
                $resP = mysqli_query($conn, $reqP);
                
            }
            // header('Location:UploadProfile.php');
            
            echo '<script>window.location.href = "UploadProfile.php"; </script>';
        }
    ?>

    <?php
        include 'footer.php';
    ?>
        <script>
            Radio = document.getElementsByClassName("Radio");
            CheckBox = document.getElementsByClassName("Check");
            tableau_SP = [];
            for (let i = 0; i < Radio.length; i++) {
                CheckBox[i].style = "display:none";
            }
            for (let i = 0; i < Radio.length; i++) {
                Radio[i].addEventListener('click', (e) => {
                    for (j = 0; j < Radio.length; j++) {
                        Radio[j].checked = false;
                    }
                    Radio[i].checked = true;
                    console.log(Radio[i].value);
                    if (e.currentTarget.checked) {
                        for (k = 0; k < CheckBox.length; k++) {
                            CheckBox[k].checked = false;
                            CheckBox[k].style = "display:none";
                            if (CheckBox[k].parentElement == e.target.parentElement
                                .parentElement) {
                                CheckBox[k].style = "display:block";
                            }    
                        }
                    }
                });
            } 
        </script>
    
</body>
</html>