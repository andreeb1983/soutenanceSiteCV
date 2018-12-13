<?php require 'inc/init.inc.php';

// (UPDATE) gestion de la mise à jour d'une information
if(isset($_POST['skill'])){

    $skill = addslashes($_POST['skill']);
    $level = addslashes($_POST['level']);
    $category = addslashes($_POST['category']);
    $id_skill = $_POST['id_skill'];

    $pdoCV -> exec(" UPDATE t_skills SET skill='$skill', level ='$level', category='$category' WHERE id_skill='$id_skill' ");
    header('location:competences.php');
    exit();
}


// je récupère l'id de ce que je mets à jour
$id_skill = $_GET['id_skill']; // par son id et avec GET
$sql = $pdoCV -> query ("SELECT * FROM t_skills WHERE id_skill='$id_skill' ");
$line_skill = $sql -> fetch(); // 

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Admin : mise à jour loisir</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

    <h1> Mise à jour d'une compétence</h1>
    
    <!-- mise à jour formulaire -->
<form action="modif_competence.php" method="post">
    <div class="form-group">
        <label for="skill">Compétence</label>
        <input class="form-control" type="text" name="skill" id="skill" value="<?php echo $line_skill['skill']; ?>" required>        
    </div>
   
    <div class="form-group">
        <label for="level">Niveau</label>
        <input class="form-control" type="text" name="level" id="level" value="<?php echo $line_skill['level']; ?>" required>        
    </div>
    
    <div class="form-group">       
        <label for="category">Catégorie</label>
        <select name="category" id="category" class="form-control">
            <option value="back"
                <?php // pour ajouter selected="selected" à la balise d'option si c'est la catégorie de la compétence
                    if(!(strcmp("back", $line_skill['category']))){ //strcmp compare deux chaîne de caractères
                        echo "selected=\"selected\"";
                    }
                ?>>back</option>

            <option value="cms"
            <?php // pour ajouter selected="selected" à la balise d'option si c'est la catégorie de la compétence
                    if(!(strcmp("cms", $line_skill['category']))){ //strcmp compare deux chaîne de caractères
                        echo "selected=\"selected\"";
                    }
                ?>>cms</option>

            <option value="framework"
            <?php // pour ajouter selected="selected" à la balise d'option si c'est la catégorie de la compétence
                    if(!(strcmp("framework", $line_skill['category']))){ //strcmp compare deux chaîne de caractères
                        echo "selected=\"selected\"";
                    }
                ?>>framework</option>

            <option value="front"
            <?php // pour ajouter selected="selected" à la balise d'option si c'est la catégorie de la compétence
                    if(!(strcmp("front", $line_skill['category']))){ //strcmp compare deux chaîne de caractères
                        echo "selected=\"selected\"";
                    }
                ?>>front</option>         
           
            <option value=langue"
            <?php // pour ajouter selected="selected" à la balise d'option si c'est la catégorie de la compétence
                    if(!(strcmp("langue", $line_skill['category']))){ //strcmp compare deux chaîne de caractères
                        echo "selected=\"selected\"";
                    }
                ?>>langue</option>
        </select>
    </div>       
    </div>
    <div class="form-group">
    <input type="hidden" name="id_skill" value="<?php echo $line_skill['id_skill']; ?>"> 
    <button type="submit">Mise à jour</button>       
    </div>


    
</form> 
    
</body>
</html>