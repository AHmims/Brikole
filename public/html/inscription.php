<?php
    // Create connection
    $conn = new mysqli("localhost", "root", "", "bd_brikole");  
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    if(isset($_POST['BTNIns']))
        {  
        $Nom = $_POST['Nom'];
        $Prenom = $_POST['Prenom'];
        $Num = $_POST['Num'];
        $Email = $_POST['Email'];
        $Pass = $_POST['Pass'];
        $CPass = $_POST['CPass'];
        $Lieu= $_POST['Lieu'];
        if($Nom&&$Prenom&&$Num&&$Email&&$Pass&&$CPass&&$Lieu)
        {
            if($Pass==$CPass) {
                // $Password = md5($Password);
                $reg = "SELECT * FROM Bricoleur WHERE Email='$Email'";
                $res = mysqli_query($conn, $reg);
                $rows = mysqli_num_rows($res);
                if($rows==0) {
                $req = "INSERT INTO `bricoleur`(`prenom`, `nom`, `telephone`, `lieu`, `Email`, `MP`) VALUES ('$Prenom','$Nom','$Num','$Lieu','$Email','$Pass')";
                $res = mysqli_query($conn, $req);
                die('<script>alert("Inscription Bien fait !!")</script>');
                }
                else echo '<script>alert("Email est déjà Existant")</script>';
            }
            else echo '<script>alert("le mot de passe est incorrect")</script>';
        }
        else echo '<script>alert("Svp Remplir tous les champs !!")</script>';
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/navbar-footer.css">
        <link rel="stylesheet" href="../css/inscription.css">
        <title>Document</title>
    </head>
    <body>
        <?php 
            include 'header.php';
        ?>
        <form action="" method="POST">
            <div id="conteneurIns" >
                <img src="../icon/logo-min.svg" alt="BriKoleLogo" />
                <p id="parag3">Rejoignez-nous dès maintenant!</p>
                <div class="divInput">
                    <div class="holderplace">
                        <input type="text" placeholder="Nom..." name="Nom">
                        <div class="verif"><img src="../icon/more.png" alt=""></div>
                    </div>
                    <div class="holderplace">
                        <input type="text" placeholder="Prenom..." name="Prenom">
                        <div class="verif"><img src="../icon/more.png" alt=""></div>
                    </div>
                    <div class="holderplace">
                        <input type="tel" placeholder="Numero de telephone..." name="Num">
                        <div class="verif"><img src="../icon/more.png" alt=""></div>
                    </div>
                    <div class="holderplace">
                        <input type="email" placeholder="Email..." name="Email">
                        <div class="verif"><img src="../icon/more.png" alt=""></div>
                    </div>
                    <div class="holderplace">
                        <input type="password" placeholder="Passeword..." name="Pass">
                        <div class="verif"><img src="../icon/more.png" alt=""></div>
                    </div>
                    <div class="holderplace">
                        <input type="password" placeholder="Confirmation passeword..." name="CPass">
                        <div class="verif"><img src="../icon/more.png" alt=""></div>
                    </div>
                    <div class="holderplace">
                        <input type="text" placeholder="Lieu..." name="Lieu">
                        <div class="verif"><img src="../icon/more.png" alt=""></div>
                    </div>
                    <div id="divButt">
                        <input type="submit" value="ANNULER" id="annulation" name="BTNSS">
                        <input type="submit" value="CONTINUER" id="confirmation" name="BTNIns">
                    </div>
                </div>
                <div id="ligne" style="margin-top:390px">
                    <svg  width="414" height="16" viewBox="0 0 414 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="207" y="3.75732" width="6" height="6" transform="rotate(45 207 3.75732)" fill="#E9E9E9" />
                        <path d="M199.707 8L207 0.707107L214.293 8L207 15.2929L199.707 8Z" stroke="#E9E9E9" />
                        <line x1="214" y1="8" x2="414" y2="8" stroke="#E9E9E9" />
                        <line y1="8" x2="200" y2="8" stroke="#E9E9E9" />
                    </svg>
                </div>
                
                <p id="parag2" >Pas encore membre ? <span style="cursor:pointer"> <a style="text-decoration:none;color:#FFC000" href="http://localhost/Brikole/public/html/identification.php">S’identifier</a></span></p>
            </div>
        </form>

        <?php
            include 'footer.php';
        ?>
            
    </body>
</html>
