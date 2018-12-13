<?php require 'inc/init.inc.php';

// gestion de la mise à jour d'une information
if(isset($_POST['network'])){

    $network = addslashes($_POST['network']);
    $url = addslashes($_POST['url']);
    $id_social_network = $_POST['id_social_network'];

    $pdoCV -> exec(" UPDATE t_social_networks SET network='$network', url = '$url' WHERE id_social_network='$id_social_network' ");
    header('location:reseaux.php');
    exit();
}

// je récupère l'id de ce que je mets à jour
$id_social_network = $_GET['id_social_network']; // par son id et avec GET
$sql = $pdoCV -> query ("SELECT * FROM t_social_networks WHERE id_social_network='$id_social_network' ");
$line_network = $sql -> fetch(); // 

require_once 'inc/haut.inc.php'

?>

    <h1> Mise à jour d'un réseau social</h1>
    
    <!-- mise à jour formulaire -->
<form action="modif_reseau.php" method="post">
    <div class="form-group">
        <label for="network">Réseau</label>
        <input class="form-control" type="text" name="network" id="network" value="<?php echo $line_network['network']; ?>" required>
    </div>
    <div class="form-group">
        <label for="url">URL</label>
        <input class="form-control" type="text" name="url" id="url" value="<?php echo $line_network['url']; ?>" required>
    </div>

    <div class="form-group">
    <input class="form-control" type="hidden" name="id_social_network" value="<?php echo $line_network['id_social_network']; ?>">
        <button type="submit">Mise à jour</button>
    </div>
</form> 
    
</body>
</html>