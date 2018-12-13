<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
	<title>Andrée Baptiste | Développeur Intégrateur Web</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/mystyleAdmin.css">
  
</head>

<body>

	<!-- Navigation -->
    <nav class="navbar navbar-dark text-light navbar-expand-lg" style="background-color: #0E2A53;">
      <div class="container-fluid">
        <!-- La marque -->
       <a class="navbar-brand" href="<?php echo RACINE_SITE ?>" target="_blank">Andrée Baptiste</a>
       
        <!-- Le burger -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav1" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <!-- Le menu -->
        <div class="collapse navbar-collapse" id="nav1">
	        <ul class="navbar-nav ml-auto">
	            <?php

                   
                    // menu si internaute est un admin :
                    if (internauteEstConnecteEtAdmin()) {
                        echo '<li><a class="nav-link" href="'. RACINE_SITE .'profil.php">Profil</a></li>';
                        echo '<li><a class="nav-link" href="'. RACINE_SITE .'competences.php">Compétences</a></li>';
                        echo '<li><a class="nav-link" href="'. RACINE_SITE .'formations.php">Formations</a></li>';
                        echo '<li><a class="nav-link" href="'. RACINE_SITE .'experiences.php">Expériences pro</a></li>';
                        echo '<li><a class="nav-link" href="'. RACINE_SITE .'loisirs.php">Loisirs</a></li>';
                        echo '<li><a class="nav-link" href="'. RACINE_SITE .'reseaux.php">Réseaux</a></li>';
                        echo '<li><a class="nav-link" href="'. RACINE_SITE .'comments.php">Messages</a></li>';
                    }  

                    // menu si internaute connecté :
                     if (internauteEstConnecte()) {
                        echo '<li><a class="nav-link" href="'. RACINE_SITE .'connexion.php?action=deconnexion">Se déconnecter</a></li>';                    
                    }   
        	        ?>
        	    </ul>
            </div>
        </div>
    </nav>

   
    