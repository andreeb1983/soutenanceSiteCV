<?php require 'inc/init.inc.php'; 

// insertion d'un loisir
if(isset($_POST['network'])) { // si on a reçu un nouveau loisir
    if($_POST['network']!='' && $_POST['url']!='') {

        $network = addslashes($_POST['network']);
        $url =addslashes($_POST['url']);
        $pdoCV -> exec("INSERT INTO t_social_networks VALUES (NULL, '$network', '$url', '1')");

        header("location: reseaux.php");
        
            exit();

    } // ferme le if n'est pas vide
} // ferme le if isset

// suppression d'un élément de la BDD
if(isset($_GET['id_social_network'])) { // on récupère ce que je supprime dans l'url par son id
    $efface = $_GET['id_social_network']; //je passe l'id dans une variable $efface

    $sql = "DELETE FROM t_social_networks WHERE id_social_network = '$efface' "; // delete de la BDD
    $pdoCV -> query($sql); // on peut le faire avec exec également

    header("location: reseaux.php");
} // ferme le if isset pour la suppression

require_once 'inc/haut.inc.php';

?>


<div class="container"><br><br><br>
    <h1>Réseaux sociaux :</h1>
        <?php
             //requête pour compter et chercher plusieurs enregistrements, on ne peut compter que si on a un prepare
            $sql = $pdoCV -> prepare("SELECT * FROM t_social_networks");
            $sql -> execute();
            $nbr_social_networks = $sql -> rowCount();
        ?>
    <div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Réseau social</th>
                    <th>URL</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tboby>
            <?php while($line_social_network=$sql ->fetch())
                {
            ?> 
                <tr>
                    <td><?php echo $line_social_network['network']; ?></td>
                    <td><?php echo $line_social_network['url']; ?></td>
                    <td><a href="modif_reseau.php?id_social_network=<?php echo $line_social_network['id_social_network']; ?>">Modif</a></td>
                    <td><a href="reseaux.php?id_social_network=<?php echo $line_social_network['id_social_network']; ?>">Suppr</a></td>
                </tr>
                <?php 
                    }
                ?>
            </tboby>
            <caption><em>La liste des réseaux sociaux : <?php echo $nbr_social_networks; ?></em></caption>
        </table>
    </div>
    <hr>
    <form action="reseaux.php" method="post">
        <div class=" form-group ">
            <label for="network">Réseau social</label>
            <input class="form-control" type="text" name="network" id="network" placeholder="Réseau social" required>
        </div>
        <div class=" form-group ">
            <label for="url">URL</label>
            <input class="form-control" type="text" name="url" id="url" placeholder="URL" required>
        </div>
        <div class="form-group">
            <button class="btn btn-secondary form-control" type="submit">Insérer un réseau social </button>
        </div>
    </form>
</div>  

<?php
require_once 'inc/bas.inc.php';