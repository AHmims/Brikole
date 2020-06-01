<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/navbar-footer.css">
    <link rel="stylesheet" href="../css/UPRofil.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    <?php 
        session_start();
        include 'header.php';
        
        $conn = new mysqli("localhost", "root", "", "brikole");  
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
        if(isset($_POST['BTNVal']))
        {
            //echo $_SESSION['id_Brikoleur_inscription'];
            $id_brik = $_SESSION['id_Brikoleur_inscription'];
            $_SESSION['idBrikoleur'] = $id_brik;
            $bio = $_POST['Bio'];
            $ImgP = time() .'_'.  $_FILES['upload']['name'];
            $cible = '../img/Img_Profil_Brikoleur/'.$ImgP;
            if(move_uploaded_file($_FILES['upload']['tmp_name'],$cible)){
                $req = "INSERT INTO `image` (id_bricoleur, refrence_image, type_image) VALUES ('$id_brik', '$ImgP', 'Profil')";
            }
            else
                $req = "INSERT INTO `image` (id_bricoleur, refrence_image, type_image) VALUES ('$id_brik', 'recent3.png', 'Profil')";
            $resSP = mysqli_query($conn, $req);
            if($bio != ""){
                $reqBio = "UPDATE bricoleur SET `description` = '.$bio' WHERE `bricoleur`.`id_bricoleur` = '$id_brik' ";
            }   
            $resSP = mysqli_query($conn, $reqBio);
            //echo '<script>window.location.href = "ProfilBrikoleur.php"; </script>';
            //header('Location:ProfilBrikoleur.php');
        }
        
        
    ?>
    <div id="conteneurUProfil">
        <img src="../icon/logo-min.svg" alt="BriKoleLogo" />
        <p id="parag">Choisissez votre profil:</p>
    
        <form action="" method="POST" enctype = "multipart/form-data">
            <div id="ZoneImgBio">
                <div id="left">
                    <div id='left_img_file'>
                        <img id="DisplayProfil" src="../img/recent3.png" alt="">
                        <div class="button-wrapper">
                        <span class="label">choisissez image Profil</span>
                        <input type="file" onchange="DisplayImg(this)" name="upload" id="upload" class="upload-box" placeholder="Upload File">
                    </div>
                </div>  
            </div><br>
                <div id="right">
                    <div class="ui-input-container">
                        <label class="ui-form-input-container">
                            <textarea class="ui-form-input" id="word-count-input" name="Bio"></textarea>
                            <span class="form-input-label">Biographie</span>
                        </label>
                    </div>
                </div>
            </div>
            <div id="divButt">
                        <input type="submit" value="RETOUR" id="annulation" name="BTNSS">
                        <input type="submit" value="VALIDER" id="confirmation" name="BTNVal">
                    </div>
        </form>
    </div>
    <?php
        include 'footer.php';
    ?>
    <script src='../js/script_UploadProfil.js'></script>
</body>
</html>