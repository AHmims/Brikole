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
        include 'header.php';
    ?>
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
            echo'<div id="ZoneProf">';
            while($ligne = mysqli_fetch_assoc($res1)){
                echo'<div class="PartieRadCheck">
                <input class="Radio" type="radio" class="Profession" name="drone" value="Profession1">
                <label for="Profession1">'.$ligne["libelle_profession"].'</label>';
                $id_prof = $ligne["id_profession"];
                $sql = "SELECT libelle FROM profession , sous_profession where profession.id_profession = sous_profession.id_profession AND profession.id_profession ='$id_prof'";
                $res = mysqli_query($conn, $sql);
                $rows = $rows =mysqli_num_rows($res);
                if($rows>=1){
                    while($enreg = mysqli_fetch_assoc($res)){
                        echo'<div class="Check" id="AChraf">
                        <div>
                            <input type="checkbox" id="scales" name="scales">
                            <label for="scales">'.$enreg["libelle"].'</label>
                        </div>
                        </div>';
                    }
                }
                echo'</div>';
            }
            echo'</div>';
            
            
        ?>
        
    </div>
    <div id="divButt">
        <input type="submit" value="ANNULER" id="annulation" name="BTNSS">
        <input type="submit" value="CONTINUER" id="confirmation" name="BTNIns">
    </div>
    <div class="blank"></div>

    <?php
        include 'footer.php';
    ?>
    
</body>
</html>