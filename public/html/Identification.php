<?php
    session_start(); // ouvrir une session



    /// Partie ProfilBrikoler.php n est pas valide y a des erreurs au niveau de recuperation de saisson id brikoleur.

    // if (isset($_SESSION['idBrikoleur'])) { // si il y'a une session ouvert
    //     header('location: ProfilBrikoleur.php'); // redirect vers la page dashbord
    //     exit();
    // }


    // Connection DB
    // Create connection
        $conn = new mysqli("localhost", "root", "", "bd_brikole");  
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }           




            if(isset($_POST['BTNLOGIN']))
            {
                $Email = $_POST['Email'];
                $Password= $_POST['Passeword'];
                    if($Email&&$Password) {
                        // $Password = md5($Password);
                        $sql = "SELECT * FROM bricoleur WHERE Email='$Email' AND MP='$Password'";
                        $res = mysqli_query($conn, $sql);
                        $rows =mysqli_num_rows($res);
                        $ligne = mysqli_fetch_assoc($res);
                        if($rows==1){
                        $_SESSION['idBrikoleur']=$ligne["id_bricoleur"];
                        $a= $_SESSION['idBrikoleur'];
                        //echo $a;
                        header('Location:PR.php');
                        }
                        else echo '<script>alert("Email ou mot de passe est incorret")</script>';
            }   
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/navbar-footer.css">
        <link rel="stylesheet" href="../css/identification.css">
        <title>Document</title>
    </head>
    <body>
        <?php 
            include 'header.php';
        ?>
        <form action="" method="POST">
            <div id="conteneurIdent">
                <img src="../icon/logo-min.svg" alt="BriKoleLogo" />
                <p id="parag3">S'identifier</p>
                <div class="divInput">
                    <input type="email" name='Email' placeholder="Email...">
                    <input type="password" name="Passeword" placeholder="Mot de passe...">
                    <div id="divButt">
                        <input type="button" value="ANNULER" id="annulation">
                        <input type="submit" value="LOGIN >" name="BTNLOGIN" id="confirmation">
                    </div>
                </div>
                <div id="ligne1">
                    <svg  width="416" height="18" viewBox="0 0 416 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="208" cy="9" r="3" fill="#E9E9E9" />
                        <circle cx="208" cy="9" r="8.5" stroke="#E9E9E9" />
                        <line x1="216" y1="9" x2="416" y2="9" stroke="#E9E9E9" />
                        <line y1="9" x2="200" y2="9" stroke="#E9E9E9" />
                    </svg>
                </div>
                

                <p id="parag2" >Pas encore membre ? <span style="cursor:pointer"> <a style="text-decoration:none;color:#FFC000" href="http://localhost/Brikole/public/html/inscription.php">S’inscrire</a></span></p>
            </div>
        </form>

        <?php
        include 'footer.php';
        ?>
    </body>
</html>






















    
