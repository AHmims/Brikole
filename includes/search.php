<?php
function getBricoleur()
{
    include 'Connection.php';
    $city = "";
    $profession = "";
    if (isset($_POST["search_city"]))
        // $city = strtolower($_POST["search_city"]);
        $city = $_POST["search_city"];
    if (isset($_POST["search_profession"]))
        $profession = $_POST["search_profession"];
    $query = "SELECT nom,prenom,lieu,id_bricoleur FROM bricoleur";
    if ($profession != "") {
        if ($profession != "*") {
            $params = explode(":", $profession);
            // HAD SOME PROBLEMS WITH THE 'LIKE' STATEMENT
            // SOLUTION : https://stackoverflow.com/questions/18527659/php-mysqli-prepared-statement-like#answer-36593020
            if ($params[0] == "sp")
                $query .= " WHERE LOWER(lieu) LIKE CONCAT('%',LOWER(?),'%') AND id_bricoleur IN (SELECT id_bricoleur FROM bricoleur_sous_profession WHERE id_Sprofession = ?)";
            else if ($params[0] == "p")
                $query .= " WHERE LOWER(lieu) LIKE CONCAT('%',LOWER(?),'%') AND id_bricoleur IN (SELECT id_bricoleur FROM bricoleur_sous_profession WHERE id_Sprofession IN (SELECT id_Sprofession FROM sous_profession WHERE id_profession = ?))";
            // 
            $req = $con->prepare($query);
            $req->bind_param("ss", $city, $params[1]);
            $req->execute();
            return $req->get_result();
        } else {
            $query .= " WHERE LOWER(lieu) LIKE CONCAT('%',LOWER(?),'%')";
            $req = $con->prepare($query);
            $req->bind_param("s", $city);
            $req->execute();
            return $req->get_result();
        }
    } else {
        return $con->query($query);
    }
}
// 
function getSousProfessionsNames($bricoleurId)
{
    include 'Connection.php';
    // 
    $query = "SELECT libelle FROM sous_profession WHERE id_Sprofession IN (SELECT id_Sprofession FROM bricoleur_sous_profession WHERE id_bricoleur = ?)";
    $req = $con->prepare($query);
    $req->bind_param("s", $bricoleurId);
    $req->execute();
    return $req->get_result();
}
// 
function getAllDataFromTable($table)
{
    include 'Connection.php';
    // 
    $req = "SELECT * FROM $table";
    $res = $con->query($req);
    // 
    return $res;
}
function getSousProfessionsByProfessionId($professionId)
{
    include 'Connection.php';
    // 
    $query = "SELECT * FROM sous_profession WHERE id_profession = ?";
    $req = $con->prepare($query);
    $req->bind_param("s", $professionId);
    $req->execute();
    return $req->get_result();
}
// 
function getProfessionName($professionId)
{
    include 'Connection.php';
    // 
    $professionName = null;
    $query = "SELECT libelle_profession FROM profession WHERE id_profession = ?";
    $req = $con->prepare($query);
    $req->bind_param("s", $professionId);
    $req->execute();
    $req->bind_result($professionName);
    $req->fetch();
    return $professionName;
}
function getSousProfessionName($sousProfessionId)
{
    include 'Connection.php';
    // 
    $sousProfessionName = null;
    $query = "SELECT libelle FROM sous_profession WHERE id_Sprofession = ?";
    $req = $con->prepare($query);
    $req->bind_param("s", $sousProfessionId);
    $req->execute();
    $req->bind_result($sousProfessionName);
    $req->fetch();
    return $sousProfessionName;
}
