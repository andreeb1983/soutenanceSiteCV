<?php
require_once 'inc/init.inc.php';

// 1 - redirection si l'internaute n'est pas connecté :
if (!internauteEstConnecte()) {  // si le membre n'est pas connecté, il ne doit pas avoir accès à la page profil
    header('location:connexion.php');  // nous l'invitons à se connecter
    exit();
}

// 2 - préparation du profil à afficher :
// debug($_SESSION);

if(isset($_POST['firstname'])) {
  if($_POST['fistname']!='' && $_POST['lastname']!='' && $_POST['email']!='' && $_POST['phone']!='' && $_POST['password']!='' && $_POST['username']!='' && $_POST['address']!='' && $_POST['zip']!='' && $_POST['city']!='' && $_POST['country']!='')
  $firstname = addslashes($_POST['firstname']);
  $lastname = addslashes($_POST['lastname']);
  $email = addslashes($_POST['email']);
  $phone = addslashes($_POST['phone']);
  $password = addslashes($_POST['password']);
  $username = addslashes($_POST['username']);
  $address = addslashes($_POST['address']);
  $zip = addslashes($_POST['zip']);
  $city = addslashes($_POST['city']);
  $country = addslashes($_POST['country']);
  $id_user = $_POST['id_user'];

  $pdoCV -> exec("UPDATE t_users SET firstname='$firstname', lastname='$lastname', email='$email', phone='$phone', password='$password', username='$username', address='$address', zip='$zip', city='$city', country='$country' WHERE id_user='1'");

  header('location:profil.php');

  exit();
}

// extract($_SESSION['t_users']);  // extrait tous les indices de l'array sous forme de variables auxquelles on affecte la valeur dans l'array. Exemple : $_SESSION['t_users']['username'] devient $pseuso = $_SESSION['t_users']['username'];

//---------------------- AFFICHAGE --------------------------
require_once 'inc/haut.inc.php';
// var_dump($_SESSION);
?>

<?php 
  $sql = $pdoCV->prepare("SELECT * FROM t_users");
  $sql -> execute();
  $nbr_users = $sql -> rowCount();

  while ($line_user=$sql ->fetch())
  { 
?>

  <h2 class="mt-3 mb-4 text-center text-dark marge"><strong class="mt-1"><?php echo  $line_user['comments'] . ' : ' .   $line_user['firstname']; ?></strong></h2>
      
    <div class="card mx-auto" style="width: 20rem;">

      <img class="card-img-top rounded-circle" src="img/photoProfil.jpg" alt="Andree">

      <div class="card-body">
        <h5 class="card-title text-dark"><?php echo  $line_user['firstname'] . ' ' .  $line_user['lastname']; ?></h5>
        <i class="fas fa-map-marker-alt text-info"></i> <address class="card-text text-dark"><?php echo  $line_user['address']; ?><br>
        <?php echo  $line_user['zip'] .' '.  $line_user['city']; ?> <br>
        <?php echo  $line_user['country']; ?><br>
         </address>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item text-dark"><i class="fas fa-phone text-info"></i> <?php echo  $line_user['phone']; ?></li>
        <li class="list-group-item"><i class="fas fa-at text-info"></i> <a href="https://www.google.com/intl/fr/gmail/about/" class="text-dark">a.baptiste.m@gmail.com</a></li>
      </ul>
    </div>
  
<?php
  }
require_once 'inc/bas.inc.php';