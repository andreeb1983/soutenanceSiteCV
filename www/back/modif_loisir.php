<?php require 'inc/init.inc.php';

// gestion de la mise à jour d'une information
if(isset($_POST['hobby'])){

    $hobby = addslashes($_POST['hobby']);    
    $photo = addslashes($_POST['photo']);    
    $id_hobby = $_POST['id_hobby'];

    $pdoCV -> exec(" UPDATE t_hobbies SET hobby='$hobby', photo='$photo' WHERE id_hobby='$id_hobby' ");
    header('location:loisirs.php');
    exit();
}

// je récupère l'id de ce que je mets à jour
$id_hobby = $_GET['id_hobby']; // par son id et avec GET
$sql = $pdoCV -> query ("SELECT * FROM t_hobbies WHERE id_hobby='$id_hobby' ");
$line_hobby = $sql -> fetch(); // 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Admin : mise à jour loisir</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

    <h1> Mise à jour d'un loisir</h1>
    
    <!-- mise à jour formulaire -->
<form action="modif_loisir.php" method="post">
    <div class="">
        <label for="hobby">Loisir</label>
        <input type="text" name="hobby" id="hobby" value="<?php echo $line_hobby['hobby']; ?>" required>
    </div>
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="customFileLang" lang="fr">
        <label class="custom-file-label" for="customFileLang">Selectionner la photo</label>
    </div>
    <div class="">
    <input type="hidden" name="id_hobby" value="<?php echo $line_hobby['id_hobby']; ?>">
        <button type="submit">Mise à jour</button>
    </div>
</form> 
    
</body>
</html>