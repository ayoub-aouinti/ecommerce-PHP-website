<?php


session_start();
//1- recuperation des donnees de la formulaire

$nom = $_POST['nom'];
$description = $_POST['description'];
$prix = $_POST['prix'];
$createur = $_POST['createur'];
$categories = $_POST['categorie'];

// uplod image
$target_dir = "../../images/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
if (move_uploaded_file($_FILES["image"]["name"], $target_file)) {
    $image = $_FILES["image"]["name"];
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
$date_creation = date("Y-m-d"); //"2023-05-25"


//2-la chaine de connexion
include "../../includ/functions.php";
$conn = connect();


//3- creation de la requette

$requette = "INSERT INTO produits(nom,description,prix,image,categories,createur,date_creation) VALUES ('$nom','$description','$prix','$image','$categories','$createur','$date_creation')";


//4- execution de la requette 

$resultat = $conn->query($requette);

if ($resultat){
    header('location:liste.php?ajout=ok');
}






?>