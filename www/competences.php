<?php require 'inc/init.inc.php'; 

// insertion d'une compétence
if(isset($_POST['skill'])) { // si on a reçu une nouvelle compétence
    if($_POST['skill']!='' && $_POST['level']!='' && $_POST['category']!='' ) {

        $skill = addslashes($_POST['skill']);
        $level = addslashes($_POST['level']);
        $category = addslashes($_POST['category']);

        $pdoCV -> exec("INSERT INTO t_skills VALUES (NULL, '$skill', '$level', '$category', '1')");

        header("location: competences.php");
            exit();

    } // ferme le if n'est pas vide
} // ferme le if isset

$order = '';

if(isset($_GET['order']) && isset($_GET['column'])){

	if($_GET['column'] == 'skills'){
        $order = ' ORDER BY skill';}
    elseif($_GET['column'] == 'level'){
        $order = ' ORDER BY level';}
    elseif($_GET['column'] == 'category'){
        $order = ' ORDER BY category';}    
	if($_GET['order'] == 'asc'){
        $order.= ' ASC';}
	elseif($_GET['order'] == 'desc'){
        $order.= ' DESC';}
}

// suppression d'un élément de la BDD
if(isset($_GET['id_skill'])) { // on récupère ce que je supprime dans l'url par son id
    $efface = $_GET['id_skill']; //je passe l'id dans une variable $efface

    $sql = "DELETE FROM t_skills WHERE id_skill = '$efface' "; // delete de la BDD
    $pdoCV -> query($sql); // on peut le faire avec exec également

    header("location: competences.php");
} // ferme le if isset pour la suppression

require_once 'inc/haut.inc.php';

?>


<div class="container"><br><br><br>
    <h1>Compétences :</h1>
        <?php
             //requête pour compter et chercher plusieurs enregistrements, on ne peut compter que si on a un prepare
            $sql = $pdoCV -> prepare("SELECT * FROM t_skills".$order);
            $sql -> execute();
            $nbr_skills = $sql -> rowCount();
            //var_dump($_POST);
        ?>
    <div>
    
    <table class="table table-striped">
    <caption>La liste des compétences : <?php echo $nbr_skills; ?></caption>
        <thead>
            <tr>
                <th>Compétences <a href="competences.php?column=skills&order=asc">ASC</a> | <a href="competences.php?column=skills&order=desc">DESC</a></th>
                <th>Niveau <a href="competences.php?column=level&order=asc">ASC</a> | <a href="competences.php?column=level&order=desc">DESC</a></th>
                <th>Catégorie <a href="competences.php?column=category&order=asc">ASC</a> | <a href="competences.php?column=category&order=desc">DESC</a></th>
                <th>Modifier</th>
                <th>Suppression</th>
                   
            </tr>
        </thead>
        <tbody>
        <?php while($line_skill=$sql ->fetch())
            {
        ?> 
            <tr>
                <td><?php echo $line_skill['skill']; ?></td>
                <td><?php echo $line_skill['level']; ?></td>
                <td><?php echo $line_skill['category']; ?></td>
                <td><a href="modif_competence.php?id_skill=<?php echo $line_skill['id_skill']; ?>">Modifier</a></td>
                <td><a href="competences.php?id_skill=<?php echo $line_skill['id_skill']; ?>">Supprimer</a></td>
            </tr>
            <?php 
                }
            ?>
        </tbody>
    </table>
    <!-- <hr> -->
    <form action="competences.php" method="post">
        <div class="form-group">
            <label for="skill">Compétence </label>
            <input class="form-control" type="text" name="skill" id="skill" placeholder="Nouvelle compétence" required>
        </div>
        <div class="form-group">
            <label for="level">Niveau en %</label>
            <input class="form-control" type="text" name="level" id="level" placeholder="Niveau en %" required>
        </div>
        <div class="form-group">        
            <label for="category">Catégorie</label>
            <select class="custom-select" name="category" id="category">
                <option selected>Choisis...</option>
                <option value="front">Front</option>
                <option value="back">Back</option>
                <option value="cms">CMS</option>
                <option value="framework">Framework</option>
                <option value="langue">Langue</option>
            </select>
        </div>
        <div class="form-group">
            <button class="btn btn-secondary form-control" type="submit">Insérer une compétence</button>
        </div>
    </form>
</div>  

<?php
require_once 'inc/bas.inc.php';