<?php

  include_once '../includes/Connection.php';
  include_once '../includes/ProfilBrikoleur.php';
  $sql = "SELECT * FROM `bricoleur` WHERE id_bricoleur = '1'";
  $result = $con->query($sql);
  if($result-> num_rows > 0){
      while($row = $result-> fetch_assoc()){
          $nom =   $row["nom"];     
          $prenom =    $row["prenom"];     
          $telephone =    $row["telephone"];     
          $lieu =    $row["lieu"];     
          $description =    $row["description"];      
      }   
    }
  //Give me Brikoler Professions
  // set array
  // $arrayProfessions = array();
  $queryFindProfessions = "SELECT libelle_profession FROM profession,assocprofession,bricoleur where bricoleur.id_bricoleur = assocprofession.id_bricoleur
  and assocprofession.id_profession = profession.Id_Professionn and bricoleur.id_bricoleur = '1'";
  $result_FindProfessions = $con->query($queryFindProfessions);
  if($result_FindProfessions-> num_rows > 0){
      while($row = $result_FindProfessions-> fetch_assoc()){
        $arrayProfessions[]=$row["libelle_profession"];
        // array_push($arrayProfessions,$row["libelle_profession"]);
      }   
    }

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
    $posts[1]= $_POST['flastname'];
    // $posts[2]= $_POST['Profession'];
    $posts[3]= $_POST['adress'];
    $posts[4] = $_POST['telephone'];
    return $posts;
  }
  
  if(isset($_POST['update'])){
    $data = getposts();
    $updateProfile_Query = "UPDATE bricoleur SET prenom='$data[1]' ,nom='$data[0]' ,telephone='$data[4]',`lieu`='$data[3]' WHERE `id_bricoleur` =1;";
    try{
      $updateProfile_Result = mysqli_query($con,$updateProfile_Query);
      if($updateProfile_Result){
        if(mysqli_affected_rows($con)>0){
          echo 'Date Updated';
        }
        else{
          echo 'Data Not Updated';
        }
      } 
      
    }catch(Exception $ex){
      echo 'Error Update '.$ex -> getMessage();
    }
  
}
?>