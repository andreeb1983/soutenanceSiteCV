<?php
// on récupère la classe Contact
require('Contact.class.php');

// on vérifie l'envoi du formulaire
if (!empty($_POST)){
     // avec extract() on accède directement aux champs par leurs names en variable
     //var_dump($_POST);
     extract($_POST);

     // on valide les données 
          // 1- champs renseignés et email valide
           /*  /!\ Effectuer toutes les validations de formulaire ici => strlen($name) > 5 || strlen($name) < 100 ....*/
     $valid = (empty($name) || empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($subject) || empty($comment)) ? false : true;

          // 2- validation des champs avec un comment d'erreur si besoin
     $erreurname = (empty($name)) ? 'Indiquez votre name.' : null;
     $erreuremail = (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) ? 'Entrez un mail valide, merci.' : null;
     $erreursubject = (empty($subject)) ? 'Indiquez l\'objet de votre mail.' : null;
     $erreurcomment = (empty($comment)) ? 'Ecrivez votre comment.' : null;

     // si le formulaire est validé
     if($valid) {
          // on instancie un objet de la classe Contact
          $contact = new Contact;

          // on réalise l'insertion en BDD avec la méthode insertContact()
          $contact->insertContact($name, $email, $subject, $comment);

          // on appelle la méthode sendEmail()
          $contact->sendEmail($name, $email, $subject, $comment); // ne fonctionne pas sur localhost sans un paramétrage spécial

          // on efface les valeurs du formulaire (évite un envoi multiple)
          unset($name);
          unset($subject);
          unset($email);
          unset($comment);
          unset($contact);

          // on créé une variable d'affichage de succès de l'envoi du formulaire
          $success = 'Message bien envoyé !';

     }

}


?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <!--responsive viewport meta tag-->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Formulaire de contact</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css"/>
    </head>

    <body>
        <h2><a href="../index.php" class="pl-2" style="color:#5E1320" >Andrée Baptiste</a></h2>
        <div id="content" class="container">
            <div class="card">
                <div class="card-body">
                    <h3>Formulaire de contact</h3>
                    <!-- <h5>Réalisé en POO</h5> -->

                    <!-- BONUS EMAIL -->
                         <?php if (isset($success)): ?>
                              <div class="alert alert-success" role="alert"><?= $success; ?></div>
                         <?php endif ?>
                    <!-- FIN BONUS EMAIL -->

                    <form action="index.php" method="POST">
                        <div class="form-group">
                            <label for="name">Nom :</label>
                            <span class="error"><?php if (isset($erreurname)) echo $erreurname; ?></span>
                            <input class="form-control" type="text" name="name" value="<?php if (isset($name)) echo $name; ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email :</label>
                            <span class="error"><?php if (isset($erreuremail)) echo $erreuremail; ?></span>
                            <input class="form-control" type="text" name="email" value="<?php if (isset($email)) echo $email; ?>">
                        </div>
                        <div class="form-group">
                            <label for="subject">Sujet :</label>
                            <span class="error"><?php if (isset($erreursubject)) echo $erreursubject; ?></span>
                            <input class="form-control" type="text" name="subject" value="<?php if (isset($subject)) echo $subject; ?>">
                        </div>
                        <div class="form-group">
                            <label for="comment">Message :</label>
                            <span class="error"><?php if (isset($erreurcomment)) echo $erreurcomment; ?></span>
                            <textarea class="form-control" name="comment" cols="30" rows="10"><?php if (isset($comment)) echo $comment; ?></textarea>
                        </div>

                        <input type="submit" class="submit btn btn-block btn-outline-info" value="Envoyer" />

                    </form>
                </div>
            </div>
            <hr>
        </div><!-- /.container -->

        <!-- JS for Bootstrap -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    </body>
</html>