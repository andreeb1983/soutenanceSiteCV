<?php require 'inc/init.inc.php';

// (UPDATE) gestion de la mise à jour d'une information
if(isset($_POST['dates_exp'])){

    $dates_exp = addslashes($_POST['dates_exp']);
    $function_exp = addslashes($_POST['function_exp']);
    $description_exp = addslashes($_POST['description_exp']);
    $id_experience = addslashes($_POST['id_experience']);

    $pdoCV -> exec(" UPDATE t_experiences SET dates_exp ='$dates_exp', function_exp ='$function_exp', description_exp ='$description_exp' WHERE id_experience='$id_experience'");

    header("location: experiences.php");
    exit();
}

// je récupère l'id de ce que je mets à jour
$id_experience = $_GET['id_experience']; // par son id et avec GET
$sql = $pdoCV -> query ("SELECT * FROM t_experiences WHERE id_experience='$id_experience' ");
$line_experience = $sql -> fetch(); // 

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Admin : mise à jour d'une expérience pro</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

    <h1> Mise à jour d'une expérience pro</h1>
    
    <!-- mise à jour formulaire -->
<form action="modif_experience.php" method="post">

    <div class="">
        <label for="dates_exp">Dates</label>
        <input type="text" name="dates_exp" id="dates_exp" value="<?php echo $line_experience['dates_exp']; ?>" required>        
    </div>
   
    <div class="">
        <label for="function_exp">Fonction</label>
        <input type="text" name="function_exp" id="function_exp" value="<?php echo $line_experience['function_exp']; ?>" required>
        
    </div>

     <div class="">
        <label for="description_exp">Description</label>
        <textarea name="description_exp" id="description_exp" cols="30" rows="10"><?php echo $line_experience['description_exp']; ?></textarea>
        
    </div>
    
    <div class="">
        <input type="hidden" name="id_experience" value="<?php echo $line_experience['id_experience']; ?>"> 
        <button type="submit">Mise à jour</button>       
    </div>
    
</form> 
    
</body>
</html>