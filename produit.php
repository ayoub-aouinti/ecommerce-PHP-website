<?php

include "includ/functions.php";

$categories = getAllCategories();

if (isset($_GET['id'])){
    $produit = getProduitById($_GET['id']);
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-SHOP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
   
<?php 

include "includ/header.php";

?>


    <div class="row col-12 mt-4">
        <div class="card col-8 offset-2"> 
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php echo $produit['nom'] ?></h5>
                <p class="card-text"><?php echo $produit['description'] ?></p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><?php echo $produit['prix'] ?> DT</li>
                <li class="list-group-item"><?php echo $produit['categories'] ?></li>
            </ul>
        </div>
    </div>
    


      

    <div class="bg-dark text-center p-5 mt-4">
      <p class="text-white">
           tout les droits reservées 2023
      </p>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>