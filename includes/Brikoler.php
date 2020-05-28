<?php

  include_once '../includes/Connection.php';
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

  
?>