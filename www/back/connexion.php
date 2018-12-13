<?php require_once 'inc/init.inc.php';

// 2 - Déconnexion de l'internaute :

if (isset($_GET['action']) && $_GET['action'] == 'deconnexion') {  // si l'internaute a cliqué sur "se déconnecter"
    session_destroy();  // on supprime toute la session du membre. Rappel : cette instruction ne s'exécute qu'en fin de script
}

// GET = ? dans les url ;  (?action=....)

// 3 -  On vérifie si l'internaute est déjà connecté :
if (internauteEstConnecte()) {  // s'il est connecté, on le renvoie vers son profil :
        header('location:profil.php');
        exit();  // pour quitter le script
    }

// debug($_POST);

// 1- traitement du formulaire :
    if (!empty($_POST)) {  // si le formulaire est soumis 
    
        // Validation des champs du formulaire :

    if (!isset($_POST['email']) || empty($_POST['email'])) $contenu .= '<div class="text-danger">Entrez un email valide.</div>';

    if (!isset($_POST['password']) || empty($_POST['password'])) $contenu .= '<div class="text-danger">Veuillez entrer votre mot de passe.</div>';

    if (empty($contenu)) {  // s'il n'a pas d'erreur sur le formulaire

        // Vérification du pseudo :

            $t_users = executeRequete("SELECT * FROM t_users WHERE email = :email AND password = :password", array(':email' => $_POST['email'], ':password' => $_POST['password']));  // on sélectionne en base les éventuels membres dont le pseudo correspond au pseudo donné par l'internaute lors de l'inscription

    if ($t_users->rowCount() > 0) {  // si le nombre de ligne est supérieur à 0, alors le login et le mot de passe existent ensemble en BDD
            // on crée une session avec les informations du membre :
            $informations = $t_users->fetch(PDO::FETCH_ASSOC);  // on fait un fetch pour transformer l'objet $membre en un array associatif qui contient en indices le nom de tous les champs de la requête
            debug($informations);

            $_SESSION['t_users'] = $informations;  // nous créons une session avec les infos du membre qui proviennent de la BDD

            header('location:profil.php');
            exit();  // on redirige l'internaute vers sa page de profil, et on quitte ce script avec la fonction exit()

        } else {
            // sinon c'est qu'il y a une erreur sur les identifiants (ils n'existent pas ou pas pour le même membre)
            $contenu.= '<div class="text-danger">Identifiants incorrects. Recommencez !</div>';
        }

    }  // fin du if (empty($contenu))

}  // fin du if (!empty($_POST))


//------------------------------ AFFICHAGE -----------------------

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Andrée Dev' Intégrateur Web</title>
​
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <!-- mon CSS -->
    <style>
        body {
            background: aliceblue;
        }

        .container {
            margin-top: 5%;
        }

        /* .demo{ background: #3c3c3c; } */

        .loader{
            width: 210px;
            height: 210px;
            margin: 50px auto;
        }
        .loader div{
            width: 100px;
            height: 100px;
            float: left;
            position: relative;
            animation: 3s linear 0s normal none infinite running loading-1;
        }
        .loader .box-1{
            top: 15px;
            left: 15px;
            background: rgba(255, 192, 0, 0.5);
            border-radius: 0 50% 50%;
            box-shadow: 0 0 15px #ffc000 inset, 0 0 15px rgba(255, 255, 255, 0.2);
        }
        .loader .box-2{
            top: 15px;
            right: 15px;
            background: rgba(227, 65, 114, 0.5);
            border-radius: 50% 0 50% 50%;
            box-shadow: 0 0 15px #e34172 inset, 0 0 15px rgba(255, 255, 255, 0.2);
        }
        .loader .box-3{
            bottom: 15px;
            left: 15px;
            background: rgba(134, 93, 194, 0.5);
            border-radius: 50% 50% 50% 0;
            box-shadow: 0 0 15px #865dc2 inset, 0 0 15px rgba(255, 255, 255, 0.2);
        }
        .loader .box-4{
            bottom: 15px;
            right: 15px;
            background: rgba(6, 148, 126, 0.5);
            border-radius: 50% 50% 0;
            box-shadow: 0 0 15px #06947e inset, 0 0 15px rgba(255, 255, 255, 0.2);
        }
        @-webkit-keyframes loading-1{
            from { transform:rotate(0deg); }
            to { transform:rotate(360deg); }
        }
        @keyframes loading-1{
            from { transform:rotate(0deg); }
            to { transform:rotate(360deg); }
        }
            
    </style>

    </head>
<body>
    
 <!-- Page Content -->
 
<!-- ici nous aurons le contenu spécifique de notre page -->

<nav class="navbar navbar-dark text-light fixed-top" style="background-color: #0E2A53;">
  <a class="navbar-brand" href="<?php echo RACINE_SITE ?>">Andrée Baptiste</a>
</nav>

<div class="container mx-auto">

<div class="demo">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="loader">
                    <div class="box-1"></div>
                    <div class="box-2"></div>
                    <div class="box-3"></div>
                    <div class="box-4"></div>
                </div>
            </div>
        </div>
    </div>
</div>

 <!-- La marque -->
 <a class="navbar-brand" href="<?php echo RACINE_SITE ?>"><i class=""></i></a>
 <?php echo $contenu ?>


<form action="connexion.php" method="POST" class="card-body">
    
    <div class="form-group">
        <input type="email" id="email" name="email" class="form-control text-dark border border-dark" style="background-color:white" placeholder="@" value="">
    </div>
    
    <div class="form-group">
        <input type="password" id="password" name="password" class="form-control text-dark border border-dark" placeholder="Password" style="background-color:white" value="">
    </div>
    
        <button type="submit" name="connexion" class="btn border-dark"  value="se connecter">Authentification</button>
</form>
</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


<?php
require_once 'inc/bas.inc.php';