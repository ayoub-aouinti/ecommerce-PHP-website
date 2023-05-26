<?php



//echo "id de la categorie".$_GET['idc'];

$idcategorie = $_GET['idc'];

include "../../includ/functions.php";

$conn = connect();

$requette = "DELETE FROM categories WHERE id='$idcategorie'";

$resultat = $conn->query($requette);
if ($resultat) {
    //echo "categorie supprimer";
    header('location: liste.php?delete=ok');
}

?>