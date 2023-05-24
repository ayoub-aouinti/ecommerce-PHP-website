<?php
session_start();

if (isset($_SESSION['nom'])){
    //header('location:profile.php');
}


include "../includ/functions.php";
$visiteur = true;


if (!empty($_POST)){ // click sur le button sauvgarder
    $visiteur = ConnectAdmin($_POST);
    if(count($visiteur) > 0){ //utilisateur connectee
        Session_start();
        $_SESSION['email'] = $visiteur['email'];
        $_SESSION['nom'] = $visiteur['nom'];     
        $_SESSION['mp'] = $visiteur['mp'];
        header('location:profile.php'); //redirection vers la page profile
    }
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.5/sweetalert2.min.css">
</head>
<body>


    <div class="col-12 p-5">

        <h1 class="text-center">Espace Admin : Connexion</h1>
        <form action="connexion.php" method="post">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                <input type="password" name="mp" class="form-control" id="exampleInputPassword1">
            </div>

            <button type="submit" class="btn btn-primary">Connecter</button>
        </form>
    </div>

    <!--Footre-->
<?php

include "../includ/footer.php";

?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.5/sweetalert2.all.min.js"></script>

<?php
if(!$visiteur){
  print "
  <script>
    Swal.fire({
    title: 'Erreur',
    text: 'Cordonnees non valides',
    icon: 'error',
    confirmButtonText: 'ok',
    timer: 2000
  })
  </script>
  ";
}

?>
</html>