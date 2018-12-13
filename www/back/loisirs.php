<?php require 'inc/init.inc.php'; 

// insertion d'un loisir
if(isset($_POST['hobby'])) { // si on a reçu un nouveau loisir
    if($_POST['hobby']!="") {

        $hobby = addslashes($_POST['hobby']);
        $photo = addslashes($_POST['photo']);
        $pdoCV -> exec("INSERT INTO t_hobbies VALUES (NULL, '$hobby', '$photo', '1')");

        header("location: loisirs.php");
            exit();

    } // ferme le if n'est pas vide
} // ferme le if isset

// suppression d'un élément de la BDD
if(isset($_GET['id_hobby'])) { // on récupère ce que je supprime dans l'url par son id
    $efface = $_GET['id_hobby']; //je passe l'id dans une variable $efface

    $sql = "DELETE FROM t_hobbies WHERE id_hobby = '$efface' "; // delete de la BDD
    $pdoCV -> query($sql); // on peut le faire avec exec également

    header("location: loisirs.php");
} // ferme le if isset pour la suppression

require_once 'inc/haut.inc.php';

?>


<div class="container"><br><br><br>
    <h1>Loisirs :</h1>
        <?php
             //requête pour compter et chercher plusieurs enregistrements, on ne peut compter que si on a un prepare
            $sql = $pdoCV -> prepare("SELECT * FROM t_hobbies");
            $sql -> execute();
            $nbr_hobbies = $sql -> rowCount();
        ?>
    <div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Loisirs</th>
                    <th>Photo</th>
                    <th>Modifier</th>
                    <th>Suppression</th>
                </tr>
            </thead>
            <tboby>
            <?php while($line_hobby=$sql ->fetch())
                {
            ?> 
                <tr>
                    <td><?php echo $line_hobby['hobby']; ?></td>
                    <td><?php echo $line_hobby['photo']; ?></td>
                    <td><a href="modif_loisir.php?id_hobby=<?php echo $line_hobby['id_hobby']; ?>">Modif</a></td>
                    <td><a href="loisirs.php?id_hobby=<?php echo $line_hobby['id_hobby']; ?>">Suppr</a></td>
                </tr>
                <?php 
                    }
                ?>
            </tboby>
            <caption><em>La liste des loisirs : <?php echo $nbr_hobbies; ?></em></caption>
        </table>
    </div>
    <hr>
    <form action="loisirs.php" method="post">
        <div class=" form-group ">
            <label for="hobby">Loisir </label>
            <input class="form-control" type="text" name="hobby" id="hobby" placeholder="Nouveau loisir" required>
        </div>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFileLang" lang="fr">
             <label class="custom-file-label" for="customFileLang">Selectionner la photo</label>
        </div>
        <div class="form-group">
            <button class="btn btn-secondary form-control" type="submit">Insérer un loisir</button>
        </div>
    </form>
</div>  

<?php
require_once 'inc/bas.inc.php';