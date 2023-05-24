<?php

function connect(){
// 1- connexion vers BD

$servername = "localhost" ;
$DBuser = "root" ;
$DBpassword = "" ;
$DBname = "ecommerce" ;

try {
    $conn = new PDO("mysql:host=$servername;dbname=$DBname", $DBuser, $DBpassword);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }

return $conn;

}


function getAllCategories(){
// 1- connexion vers BD
$conn = connect();

// 2- creation de la requete

$requette = "SELECT * FROM categories";


// 3- execution de le requete

$resultat = $conn->query($requette);

// 4- resultat de la requete

$categories = $resultat->fetchAll();

//var_dump($categories);

return $categories;

}


function getAllProducts(){
// 1- connexion vers BD
$conn = connect();

// 2- creation de la requete

$requette = "SELECT * FROM produits";


// 3- execution de le requete

$resultat = $conn->query($requette);

// 4- resultat de la requete

$produits = $resultat->fetchAll();

//var_dump($produits);

return $produits;
}



function searchProduits($keywords){

// 1- connexion vers BD
$conn = connect();

// 2- creation de la requete

$requette = "SELECT * FROM produits WHERE nom LIKE '%$keywords%'";

// 3- execution de le requete

$resultat = $conn->query($requette);

// 4- resultat de la requete

$produits = $resultat->fetchAll();

return $produits;

}

function getProduitById($id){

    $conn = connect();
    $requette = "SELECT * FROM produits WHERE id = $id";
    $resultat = $conn->query($requette);
    $produit = $resultat->fetch();

    return $produit;
}


function AddVisiteur($data){
  $conn = connect();
  $mphash = md5($data['mp']);
  $requette = "INSERT INTO visiteur(nom,prenom,email,mp,telephone) VALUES('".$data['nom']."','".$data['prenom']."','".$data['email']."','".$mphash."','".$data['telephone']."')";
  $resultat = $conn->query($requette);

  if ($resultat){
    return true;
  }else{
    return false;
  }
}

function ConnectVisiteur($data){
  $conn = connect();
  $email = $data['email'];
  $mp = md5($data['mp']);
  $requette = "SELECT * FROM visiteur WHERE email = '$email' AND mp = '$mp'";
  $resultat = $conn->query($requette);
  $visiteur = $resultat->fetch();
  
  return $visiteur;
}

function ConnectAdmin($data){
  $conn = connect();
  $email = $data['email'];
  $mp = md5($data['mp']);
  $requette = "SELECT * FROM Administrateur WHERE email = '$email' AND mp = '$mp'";
  $resultat = $conn->query($requette);
  $visiteur = $resultat->fetch();
  
  return $visiteur;
}

?>