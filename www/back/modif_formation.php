<?php require 'inc/init.inc.php';

if(isset($_POST['dates_training'])) { // si on a reçu une nouvelle compétence
 
    $dates_training = addslashes($_POST['dates_training']);
    $title_training = addslashes($_POST['title_training']);
    $subtitle_training= addslashes($_POST['subtitle_training']);
    $training_establishment= addslashes($_POST['training_establishment']);
    $id_training = addslashes($_POST['id_training']);
    
    $pdoCV -> exec("UPDATE t_trainings SET dates_training='$dates_training', title_training='$title_training', subtitle_training='$subtitle_training', training_establishment='$training_establishment' WHERE id_training='$id_training'");

    header("location: formations.php");
    exit();
}    

// je récupère l'id de ce que je mets à jour
$id_training = $_GET['id_training']; // par son id et avec GET
$sql = $pdoCV -> query ("SELECT * FROM t_trainings WHERE id_training='$id_training' ");
$line_training = $sql -> fetch(); // 

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Admin : mise à jour d'une formation</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <h1> Mise à jour d'une formation</h1>
    
    <!-- mise à jour formulaire -->
<form action="modif_formation.php" method="post">

    <div class="">
        <label for="dates_training">Dates</label>
        <input type="text" name="dates_training" id="dates_training" value="<?php echo $line_training['dates_training']; ?>" required>
    </div>

    <div class="">
        <label for="title_training">Intitulé de la formation</label>
        <input type="text" name="title_training" id="title_training" value="<?php echo $line_training['title_training']; ?>" required>
    </div>

    <div class="">
        <label for="subtitle_training">Description de la formation</label>
        <input type="text" name="subtitle_training" id="subtitle_training" value="<?php echo $line_training['subtitle_training']; ?>" required>
    </div>

    <div class="">
        <label for="training_establishment">Etablissement de formation</label>
        <input type="text" name="training_establishment" id="training_establishment" value="<?php echo $line_training['training_establishment']; ?>" required>
    </div>

    <div class="">
    <input type="hidden" name="id_training" value="<?php echo $line_training['id_training']; ?>">
        <button type="submit">Mise à jour</button>
    </div>

</form> 
    
</body>
</html>