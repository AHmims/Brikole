<?php
include_once '../includes/Connection.php';
include_once '../includes/Brikoler.php';

// Update Profile
// $Fname = "";
// $Lname = "";
// // $Profession="";
// $Adress="";
// $Telephone="";
function getposts()
{
  $posts = array();
  $posts[0] = $_POST['fname'];
  $posts[1] = $_POST['flastname'];
  // $posts[2]= $_POST['Profession'];
  $posts[3] = $_POST['adress'];
  $posts[4] = $_POST['telephone'];
  $posts[5] = $_POST['fdescription'];
  return $posts;
}

if (isset($_POST['submit'])) {
  $data = getposts();

  $updateProfile_Query = "UPDATE bricoleur SET prenom='$data[0]' ,nom='$data[1]' ,telephone='$data[4]',`lieu`='$data[3]', `description`='$data[5]' WHERE `id_bricoleur` =1;
    ";
  try {
    // $updateProfile_Result = mysqli_query($con,$updateProfile_Query);
    if (mysqli_query($con, $updateProfile_Query)) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . mysqli_error($con);
    }
  } catch (Exception $ex) {
    echo 'Error Update ' . $ex->getMessage();
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- bootstrap links -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  <<<<<<< HEAD <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js">
    </script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous" />
    <!-- --------------- -->

    <link rel="stylesheet" href="../css/navbar-footer.css" />
    <link rel="stylesheet" href="../css/ProfilBrikoleur.css" />
    <title>Profil brikoleur</title>
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
        <li href="#" class="navBarLink navBarButton">Nous Rejoinder</li>
      </ul>
      <!-- <div id="mobileLinks">
=======
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
      integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ"
      crossorigin="anonymous"
    />

    <!-- --------------- -->
      <!-- Script -->
      <script src="../js/ProfilBrikoleur.js"></script>
      <!-- Css -->
      <link rel="stylesheet" href="../css/navbar-footer.css" />
      <link rel="stylesheet" href="../css/ProfilBrikoleur.css" />
      <title>Profil brikoleur</title>
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
              <li href="#" class="navBarLink navBarButton">Nous Rejoinder</li>
            </ul>
            <!-- <div id="mobileLinks">
>>>>>>> 3bf9fa0b49affd3f96c02369f0a8830f2a6adeeb
          <a href="#" class="mobileItem">Nous Rejoinder</a>
          <button class="mobileItem" id="mobileMenuBtn">
            <svg
              width="17.5"
              height="15.5"
              viewBox="0 0 14 12"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M0 1C0 0.734784 0.105357 0.48043 0.292893 0.292893C0.48043 0.105357 0.734784 0 1 0H13C13.2652 0 13.5196 0.105357 13.7071 0.292893C13.8946 0.48043 14 0.734784 14 1C14 1.26522 13.8946 1.51957 13.7071 1.70711C13.5196 1.89464 13.2652 2 13 2H1C0.734784 2 0.48043 1.89464 0.292893 1.70711C0.105357 1.51957 0 1.26522 0 1ZM0 6C0 5.73478 0.105357 5.48043 0.292893 5.29289C0.48043 5.10536 0.734784 5 1 5H13C13.2652 5 13.5196 5.10536 13.7071 5.29289C13.8946 5.48043 14 5.73478 14 6C14 6.26522 13.8946 6.51957 13.7071 6.70711C13.5196 6.89464 13.2652 7 13 7H1C0.734784 7 0.48043 6.89464 0.292893 6.70711C0.105357 6.51957 0 6.26522 0 6ZM6 11C6 10.7348 6.10536 10.4804 6.29289 10.2929C6.48043 10.1054 6.73478 10 7 10H13C13.2652 10 13.5196 10.1054 13.7071 10.2929C13.8946 10.4804 14 10.7348 14 11C14 11.2652 13.8946 11.5196 13.7071 11.7071C13.5196 11.8946 13.2652 12 13 12H7C6.73478 12 6.48043 11.8946 6.29289 11.7071C6.10536 11.5196 6 11.2652 6 11Z"
                fill="white"
              />
            </svg>
          </button>
          
          <div id="mobileMenu">
            <ul>
              <li>
                <a href="#">Accueil</a>
              </li>
              <li>
                <a href="#">Identification</a>
              </li>
            </ul>
          </div>
        </div> -->
          </div>
        </nav>
        <div class="blank_big"></div>
        <div class="content">
          <div class="row no-gutters">
            <div class="column column0 col-lg-2"></div>

            <div class="column column1 col-lg-8">
              <div class="row no-gutters">
                <div class="column column2 col-xl-3">
                  <div class="info1">
                    <img id="profilePic" src="../img/profilImgBrikoleur.png" alt="" />
                    <div class="name_job">
                      <!-- <i class="far fa-bookmark"></i> -->
                      <!-- Update Profile Action -->
                      <i class="fas fa-pen" data-toggle="modal" data-target="#myModal"></i>

                      <p class="P1">Bonjour,</p>
                      <h1 class="P0"><?php echo $nom . ' ' . $prenom; ?></h1>
                      <p class="P2"><?php echo $arrayProfessions[0]; ?></p>
                    </div>
                  </div>
                  <div class="blank"></div>
                  <div class="blank"></div>
                  <div class="blank"></div>
                  <div class="info2">
                    <p class="P2"></p>
                    <p class="P3">
                      <i class="fas fa-map-marker-alt"></i> <?php echo $lieu; ?>
                    </p>
                  </div>
                  <!-- <div class="blank"></div> -->
                  <div class="blank"></div>
                  <div class="blank"></div>
                  <div class="blank"></div>
                  <div class="info3">
                    <div class="">
                      <p class="P3">
                        Télephone Vérifé
                      </p>
                      <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="">
                      <p class="P3">
                        Carte professionnelle / Artisanale
                      </p>
                      <i class="fas fa-check-circle"></i>
                    </div>
                  </div>
                  <div class="blank"></div>
                  <div class="blank"></div>
                  <div class="blank"></div>
                  <!-- <div class="blank"></div> -->
                  <div class="info4">
                    <div class="P3">
                      <i class="fas fa-phone"></i>Affichier Contact
                    </div>
                  </div>
                  <div class="blank"></div>
                  <div class="blank"></div>
                  <div class="blank"></div>
                  <div class="info5">
                    <p class="P0">Professions</p>
                    <!-- Professions -->
                    <div class="P2">
                      <i><span><?php echo $arrayProfessions[0]; ?></span> <span><?php echo $arrayProfessions[1]; ?></span></i>
                    </div>
                  </div>
                  <div class="blank"></div>
                  <div class="blank"></div>
                  <div class="blank"></div>
                  <!-- <div class="info6 p3">
                <p>Badge</p>
                <div class="Badge">
                  <img src="../img/badgeIcon.png" alt="" />
                  <div class="levelParent">
                    <div class="level">
                      <span>Niveau X</span>
                      <span>80%</span>
                    </div>
                    <div class="remainder"></div>
                    <div class="progress"></div>
                  </div>
                </div>
              </div> -->
                  <!-- <div class="blank"></div>
              <div class="blank"></div>
              <div class="blank"></div> -->
                  <<<<<<< HEAD </div> <div class="column column3 col-xl-9">
                    <div class="row row1">
                      <!-- <div class="column column3_1 col-xl-2"></div> -->
                      <div class="column column3_2 col-xl-10">
                        <div class="portfolio">
                          <span>
                            <p class="P0">Portfolio</p>
                            <div>
                              <div class="deletePic">
                                <i class="fas fa-trash-alt"></i>
                              </div>
                              <div class="addPics">
                                <p>
                                  <i class="fas fa-camera"></i> Ajouter des photos
                                </p>
                                =======
                              </div>
                              <div class="column column3 col-xl-9">
                                <div class="row row1">
                                  <!-- <div class="column column3_1 col-xl-2"></div> -->
                                  <div class="column column3_2 col-xl-10">
                                    <div class="portfolio">
                                      <span>
                                        <p class="P0">Portfolio</p>
                                        <div>
                                          <div class="deletePic">
                                            <i class="fas fa-trash-alt"></i>
                                          </div>
                                          <!-- NOTE!! -->
                                          <!-- Please upload Pic is INPUT not div -->
                                          <!-- <div class="addPics">
                          <p>
                            <i class="fas fa-camera"></i> Ajouter des photos
                          </p>
                        </div> -->

                                          <!--  -->
                                          <!-- Upload Image -->
                                          <form method="POST" action="" class="addPics" enctype="multipart/form-data">
                                            <!-- <input type="file" name="UploadPortfolio"  accept="image/*" OnChange="showPreview(this)" required> -->
                                            <input type="file" name="UploadPortfolio">
                                            <button type="submit" name="addImage">Ajouter</button>
                                          </form>
                                        </div>
                                      </span>
                                      <?php
                                      //check if addImage button is clicked
                                      if (isset($_POST['addImage'])) {
                                        $ImageName = $_FILES['UploadPortfolio']['name'];
                                        $ImagePortfolio_tmp = $_FILES['UploadPortfolio']['tmp_name'];
                                        $folder = '../img/';
                                        // $id_image=1;

                                        move_uploaded_file($ImagePortfolio_tmp, $folder . $ImageName);
                                        $sqlUpluadImg = "INSERT INTO `image`(`id_image`, `id_bricoleur`, `refrence_image`)VALUES ('',1,'$ImageName')";

                                        $qry_res = mysqli_query($con, $sqlUpluadImg);

                                        if ($qry_res) {
                                          echo " alert('Image inserted')";
                                          // $id_image++;
                                        } else {
                                          echo "Error: ", mysqli_error($con);
                                        }
                                      }
                                      ?>
                                      <div class="row row-cols-3">
                                        <?php
                                        // Show me my photos
                                        $sqlquery = "SELECT * FROM `image` WHERE `id_bricoleur` = 1 ORDER BY id_image DESC";
                                        $Result = mysqli_query($con, $sqlquery);
                                        if (!$Result) {
                                          printf("Error: %s\n", mysqli_error($con));
                                          exit();
                                        }
                                        ?>

                                        <?php while ($row = mysqli_fetch_assoc($Result)) : ?>
                                          <img src="../img/<?php echo $row['refrence_image'] ?>">
                                        <?php endwhile; ?>


                                        <!-- <img src="../img/portfolio1.png" alt="" />
                      <img src="../img/portfolio2.png" alt="" />
                      <img src="../img/portfolio3.png" alt="" />
                      <img src="../img/portfolio4.png" alt="" />
                      <img src="../img/portfolio5.png" alt="" />
                      <img src="../img/portfolio6.png" alt="" /> -->
                                      </div>
                                    </div>
                                    <div class="blank"></div>
                                    <div class="blank"></div>
                                    <div class="blank"></div>
                                    <div class="blank"></div>


                                    <!--  -->
                                    <!-- Comments -->
                                    <div class="comments">
                                      <p class="P0">Commentaires</p>
                                      <div class="commentContent">
                                        <!-- query -->
                                        <?php
                                        $Comment_query = "SELECT * FROM `commentaire` WHERE id_bricoleur = 1";
                                        $Comment_Result = mysqli_query($con, $Comment_query);
                                        // Check Connected to db
                                        if (!$Comment_Result) {
                                          printf("Error: %s\n", mysqli_error($con));
                                          exit();
                                        }
                                        ?>
                                        <!-- Give Me All Comments of loged brikoler -->
                                        <?php while ($row = mysqli_fetch_assoc($Comment_Result)) : ?>
                                          <div class="ClientComment">
                                            <div class="column commenterImg">
                                              <img src="../img/commentPic.png" alt="" />
                                            </div>
                                            <div class="column commenterInfo">
                                              <p class="P1 commentOwner">Abid Samir</p>
                                              <p class="P2 commentText">
                                                <?php echo $row['commentaire'] ?>
                                              </p>
                                              <p class="commentDate P3"><i>Il y a 2 jours</i></p>

                                            </div>


                                            >>>>>>> 3bf9fa0b49affd3f96c02369f0a8830f2a6adeeb
                                          </div>
                                        <?php endwhile; ?>

                                      </div>
                          </span>
                          <div class="row row-cols-3">
                            <img src="../img/portfolio1.png" alt="" />
                            <img src="../img/portfolio2.png" alt="" />
                            <img src="../img/portfolio3.png" alt="" />
                            <img src="../img/portfolio4.png" alt="" />
                            <img src="../img/portfolio5.png" alt="" />
                            <img src="../img/portfolio6.png" alt="" />
                          </div>
                        </div>
                        <div class="blank"></div>
                        <div class="blank"></div>
                        <div class="blank"></div>
                        <div class="blank"></div>
                        <div class="comments">
                          <p class="P0">Commentaires</p>
                          <div class="commentContent">
                            <div class="column commenterImg">
                              <img src="../img/commentPic.png" alt="" />
                            </div>
                            <div class="column commenterInfo">
                              <p class="P1 commentOwner">Abid Samir</p>
                              <p class="P2 commentText">
                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                elit. Curabitur semper nec urna a imperdiet.
                              </p>
                              <p class="commentDate P3"><i>Il y a 2 jours</i></p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
            </div>

            <div class="column column4 col-lg-2"></div>
          </div>
        </div>
        <div class="blank_big"></div>
        <div id="footerCont">
          <div id="footer">
            <a href="/" class="footerLogo">
              <svg width="114" height="40" viewBox="0 0 114 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4.42272 10.7012L0 14.9812V18.4536L3.23614 21.6898V23.5428L4.31485 23.5447V22.5451C4.31485 22.5185 4.31581 22.4921 4.31771 22.466L4.31485 22.466V21.243L1.07871 18.0068V15.4384L3.34401 13.2462V17.7643L4.42666 18.7696H6.36046L7.44311 17.7643V13.2462L9.70841 15.4384V18.0068L6.47227 21.243V22.4697L6.46968 22.4697C6.4714 22.4946 6.47227 22.5197 6.47227 22.5451V23.5484L7.55099 23.5502V21.6898L10.7871 18.4536V14.9812L6.3644 10.7012V17.2939L5.93686 17.6909H4.85026L4.42272 17.2939V10.7012Z" fill="#FDFDFD" />
                <path d="M3.23614 4.31485H21.2536L24.1371 10.2003L19.2143 20.3877H27.0886L29.3528 27.9352L27.0937 35.3818H7.55099V22.9766H6.47227V30.7433C6.47227 31.3391 5.98932 31.822 5.39356 31.822C4.7978 31.822 4.31485 31.3391 4.31485 30.7433V22.9766H3.23614V39.6966H30.2938L33.8597 27.9421L30.2989 16.0728H26.0916L28.9356 10.1873L23.9445 0H3.23614V4.31485Z" fill="#FDFDFD" />
                <path d="M5.93292 30.7433C5.93292 31.0412 5.69144 31.2827 5.39356 31.2827C5.09568 31.2827 4.85421 31.0412 4.85421 30.7433C4.85421 30.4454 5.09568 30.2039 5.39356 30.2039C5.69144 30.2039 5.93292 30.4454 5.93292 30.7433Z" fill="#FDFDFD" />
                <path d="M7.55099 4.31485H3.23614L7.55099 8.6297V4.31485Z" fill="#FDFDFD" />
                <path d="M35.4492 39.6966H39.5904V30.7467C39.5904 30.3118 39.6713 29.9022 39.8331 29.518C39.9949 29.1337 40.2174 28.7999 40.5006 28.5168C40.7838 28.2336 41.1175 28.0111 41.5018 27.8493C41.8861 27.6875 42.2956 27.6066 42.7305 27.6066H46.3863V23.4805H42.7305C41.8203 23.4805 40.9405 23.6474 40.091 23.9811C39.2415 24.3047 38.4831 24.7699 37.8156 25.3767L36.4504 23.4502H35.4492V39.6966Z" fill="#FDFDFD" />
                <path d="M48.3128 39.6966H52.4844V23.4502H48.3128V39.6966Z" fill="#FDFDFD" />
                <path d="M56.0947 39.6966H60.4483V35.343L63.7704 30.8984L68.5488 39.6966H73.494L66.6223 27.1212L73.494 17.9437H68.5488L60.4483 28.8202V17.9437H56.0947V39.6966Z" fill="#FDFDFD" />
                <path fill-rule="evenodd" clip-rule="evenodd" d="M89.0882 34.8272C89.523 33.7755 89.7404 32.6428 89.7404 31.4293C89.7404 30.1348 89.523 28.9617 89.0882 27.91C88.6533 26.8481 88.0617 25.943 87.3133 25.1947C86.565 24.4362 85.6852 23.8547 84.6739 23.4502C83.6727 23.0356 82.5956 22.8282 81.4428 22.8282C80.3 22.8282 79.223 23.0457 78.2117 23.4805C77.2105 23.9154 76.3307 24.5171 75.5722 25.2857C74.8239 26.0442 74.2323 26.9493 73.7974 28.001C73.3625 29.0528 73.1451 30.1955 73.1451 31.4293C73.1451 32.6428 73.3625 33.7755 73.7974 34.8272C74.2323 35.8689 74.8239 36.774 75.5722 37.5426C76.3307 38.301 77.2105 38.9027 78.2117 39.3477C79.223 39.7826 80.3 40 81.4428 40C82.5956 40 83.6727 39.7826 84.6739 39.3477C85.6852 38.9027 86.565 38.301 87.3133 37.5426C88.0617 36.774 88.6533 35.8689 89.0882 34.8272ZM85.2351 29.6241C85.4576 30.1601 85.5688 30.7618 85.5688 31.4293C85.5688 32.0866 85.4576 32.6884 85.2351 33.2345C85.0228 33.7805 84.7295 34.2457 84.3553 34.63C83.9811 35.0143 83.5412 35.3127 83.0356 35.525C82.54 35.7374 82.0091 35.8436 81.4428 35.8436C80.8764 35.8436 80.3405 35.7323 79.8348 35.5099C79.3393 35.2773 78.9044 34.9638 78.5303 34.5694C78.1662 34.175 77.878 33.7098 77.6656 33.1738C77.4532 32.6378 77.347 32.0563 77.347 31.4293C77.347 30.7618 77.4532 30.1601 77.6656 29.6241C77.878 29.078 78.1662 28.6128 78.5303 28.2286C78.9044 27.8341 79.3393 27.5358 79.8348 27.3336C80.3405 27.1212 80.8764 27.015 81.4428 27.015C82.0091 27.015 82.54 27.1212 83.0356 27.3336C83.5412 27.5358 83.9811 27.8341 84.3553 28.2286C84.7295 28.6128 85.0228 29.078 85.2351 29.6241Z" fill="#FDFDFD" />
                <path d="M92.031 39.6966H96.2026V16.988H92.031V39.6966Z" fill="#FDFDFD" />
                <path fill-rule="evenodd" clip-rule="evenodd" d="M106.321 35.8284C106.159 35.8082 105.997 35.7728 105.835 35.7222L113.602 26.3627C113.218 25.8166 112.773 25.3261 112.267 24.8913C111.761 24.4463 111.215 24.0721 110.629 23.7688C110.052 23.4654 109.44 23.2328 108.793 23.071C108.146 22.9092 107.484 22.8282 106.806 22.8282C105.663 22.8282 104.586 23.0356 103.575 23.4502C102.574 23.8648 101.694 24.4463 100.935 25.1947C100.187 25.943 99.5955 26.8481 99.1606 27.91C98.7258 28.9719 98.5083 30.145 98.5083 31.4293C98.5083 32.6833 98.7258 33.8362 99.1606 34.8879C99.5955 35.9295 100.187 36.8296 100.935 37.5881C101.694 38.3465 102.574 38.9381 103.575 39.3629C104.586 39.7876 105.663 40 106.806 40C107.484 40 108.141 39.9191 108.778 39.7573C109.425 39.6056 110.037 39.3781 110.614 39.0747C111.2 38.7713 111.741 38.4022 112.237 37.9673C112.742 37.5324 113.187 37.042 113.572 36.4959L110.538 33.4468C110.376 33.8109 110.163 34.1446 109.901 34.448C109.648 34.7413 109.354 34.9941 109.021 35.2065C108.697 35.4087 108.348 35.5655 107.974 35.6767C107.6 35.788 107.211 35.8436 106.806 35.8436C106.644 35.8436 106.482 35.8385 106.321 35.8284ZM107.382 27.0453C107.575 27.0656 107.767 27.1111 107.959 27.1819L103.135 33.5833C103.054 33.4418 102.988 33.28 102.938 33.0979C102.887 32.9159 102.842 32.7288 102.801 32.5367C102.771 32.3344 102.746 32.1372 102.725 31.9451C102.715 31.7529 102.71 31.581 102.71 31.4293C102.71 30.7517 102.816 30.145 103.029 29.609C103.241 29.0629 103.529 28.5977 103.893 28.2134C104.268 27.8291 104.703 27.5358 105.198 27.3336C105.704 27.1212 106.24 27.015 106.806 27.015C107.008 27.015 107.2 27.0251 107.382 27.0453Z" fill="#FDFDFD" />
                <path d="M51.7991 16.5809L53.1961 19.0006L51.7991 21.4203H49.0051L47.6081 19.0006L49.0051 16.5809H51.7991Z" fill="#FDFDFD" />
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
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M0 0V18H18V0H0ZM12.9485 2.34888C13.0792 2.3461 13.2153 2.35035 13.3561 2.35986C13.8732 2.36056 14.4133 2.40719 14.9491 2.45434L14.8909 4.5857H13.4517C12.7768 4.57076 12.5331 4.83279 12.5112 5.59423V7.26855H14.9491L14.8524 9.55151H12.5112V15.9071H10.1327V9.55152H8.48145V7.26855H10.1327V5.30859C10.1327 3.89546 10.7301 2.99598 11.907 2.54004C12.2092 2.42112 12.5563 2.3572 12.9485 2.34888Z" fill="#F4F4F4" />
                    </svg>
                  </a>
                  <a href="#">
                    <svg width="21" height="18" viewBox="0 0 21 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M19.607 4.20301C19.4931 3.78041 19.2705 3.39501 18.9614 3.08518C18.6522 2.77534 18.2673 2.55187 17.845 2.43701C16.279 2.00701 10.014 2.00001 10.014 2.00001C10.014 2.00001 3.75 1.99301 2.183 2.40401C1.76093 2.52415 1.37682 2.75078 1.06757 3.06214C0.758311 3.3735 0.534287 3.75913 0.417002 4.18201C0.00400165 5.74801 1.46514e-06 8.99601 1.46514e-06 8.99601C1.46514e-06 8.99601 -0.00399852 12.26 0.406001 13.81C0.636001 14.667 1.311 15.344 2.169 15.575C3.751 16.005 9.999 16.012 9.999 16.012C9.999 16.012 16.264 16.019 17.83 15.609C18.2525 15.4943 18.6377 15.2714 18.9477 14.9622C19.2576 14.653 19.4814 14.2682 19.597 13.846C20.011 12.281 20.014 9.03401 20.014 9.03401C20.014 9.03401 20.034 5.76901 19.607 4.20301ZM8.01 12.005L8.015 6.00501L13.222 9.01001L8.01 12.005Z" fill="#F4F4F4" />
                      <path d="M9.01416 13.5L0.0141602 9V18H20.0142V0H0.0141602V8.5L6.01416 3.5L17.0142 8L9.01416 13.5Z" fill="#F4F4F4" />
                    </svg>
                  </a>
                  <a href="#">
                    <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M0.0141602 0V18H18.0142V0H0.0141602ZM14.4142 6.3V6.6375C14.4142 10.35 11.6017 14.5125 6.53916 14.5125C4.96416 14.5125 3.50166 14.0625 2.26416 13.275H2.93916C4.28916 13.275 5.41416 12.825 6.42666 12.0375C5.18916 12.0375 4.17666 11.25 3.83916 10.125H4.40166C4.62666 10.125 4.85166 10.125 5.07666 10.0125C3.83916 9.7875 2.82666 8.6625 2.82666 7.3125C3.16416 7.5375 3.61416 7.65 4.06416 7.65C3.27666 7.2 2.82666 6.3 2.82666 5.4C2.82666 4.8375 2.93916 4.3875 3.16416 4.05C4.51416 5.7375 6.65166 6.75 8.90166 6.8625C8.90166 6.6375 8.78916 6.4125 8.78916 6.1875C8.78916 4.6125 10.0267 3.375 11.6017 3.375C12.3892 3.375 13.0642 3.7125 13.6267 4.275C14.3017 4.1625 14.8642 3.9375 15.4267 3.6C15.2017 4.275 14.7517 4.8375 14.1892 5.175C14.7517 5.0625 15.3142 4.95 15.7642 4.725C15.4267 5.4 14.9767 5.85 14.4142 6.3Z" fill="#F4F4F4" />
                    </svg>
                  </a>
                  <a href="#">
                    <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M0.0141602 0V18H18.0142V0H0.0141602ZM4.42846 3.53869C5.14141 3.54672 5.84372 4.03857 5.87427 4.89002C5.88951 5.64714 5.2297 6.22383 4.40979 6.24133H4.39002C3.68417 6.23319 2.99484 5.72899 2.96289 4.89002C2.97295 4.14132 3.60229 3.55645 4.42846 3.53869ZM12.0771 7.11585C12.861 7.12071 13.6007 7.35324 14.2085 7.9728C14.8401 8.6772 15.0429 9.64845 15.0654 10.6359V15.1271H12.477V10.9413C12.4713 10.1568 12.2025 9.20313 11.1642 9.17139C10.5556 9.17787 10.1265 9.5315 9.83263 10.1228C9.75241 10.3131 9.74086 10.5319 9.73705 10.7501V15.1271H7.14978C7.15968 12.9389 7.17329 10.7509 7.16846 8.56275C7.16846 7.94118 7.16247 7.52265 7.14978 7.30701H9.73705V8.41004C9.95667 8.09769 10.2002 7.80147 10.527 7.56298C10.9701 7.24671 11.5025 7.12546 12.0771 7.11585ZM3.11561 7.30701H5.70288V15.1271H3.11561V7.30701Z" fill="#F4F4F4" />
                    </svg>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <script src="../js/navbar_footer.js"></script>

        <!-- ModalForm Update Profile -->
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Update Your Profile</h4>
              </div>
              <div class="modal-body">
                <div class="UpdateBrikole">

                  <!--  -->
                  <form action="" method="POST">
                    <p>Nom</p><input type="text" name="fname" value="<?php echo $nom; ?>"><br>
                    <p>Last nom</p><input type="text" name="flastname" value="<?php echo $prenom; ?>"><br>
                    <!-- <p>Profession:</p><input type="text" name="Profession"><br> -->
                    <p>Adress:</p> <input type="text" name="adress" value="<?php echo $lieu; ?>"><br>
                    <p>Télephone:</p><input type="text" name="telephone" value="<?php echo $telephone; ?>"><br>
                    <!-- <p>description:</p>       <input type="textarea" name="fdescription" value="<?php echo $description; ?>"><br> -->
                    <textarea name="fdescription"><?php echo $description; ?></textarea><br>
                    <input type="submit" name="submit" value="Update Profile">
                  </form>


                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      </body>

</html>