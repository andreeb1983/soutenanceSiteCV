<?php require 'inc/init.inc.php'; 

// insertion d'un loisir
if(isset($_POST['contact'])) { // si on a reçu un nouveau message
    if($_POST['contact']!='' && $_POST['name']!='' && $_POST['email']!='' && $_POST['subject']!='' && $_POST['comment']!='') {

        $name = addslashes($_POST['name']);
        $email = addslashes($_POST['email']);
        $subject = addslashes($_POST['subject']);
        $comment = addslashes($_POST['comment']);
        $pdoCV -> exec("INSERT INTO t_contact VALUES (NULL, '$name', '$email', '$subject', '$comment' '1')");

        header("location: comments.php");
            exit();

    } // ferme le if n'est pas vide
} // ferme le if isset

// suppression d'un élément de la BDD
if(isset($_GET['id_contact'])) { // on récupère ce que je supprime dans l'url par son id
    $efface = $_GET['id_contact']; //je passe l'id dans une variable $efface

    $sql = "DELETE FROM t_contact WHERE id_contact = '$efface' "; // delete de la BDD
    $pdoCV -> query($sql); // on peut le faire avec exec également

    header("location: comments.php");
} // ferme le if isset pour la suppression

require_once 'inc/haut.inc.php';

?>


<div class="container"><br><br><br>
    <h1>Messages :</h1>
        <?php
             //requête pour compter et chercher plusieurs enregistrements, on ne peut compter que si on a un prepare
            $sql = $pdoCV -> prepare("SELECT * FROM t_contact");
            $sql -> execute();
            $nbr_contacts = $sql -> rowCount();
        ?>
    <div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Sujet</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tboby>
            <?php while($line_contact=$sql ->fetch())
                {
            ?> 
                <tr>
                    <td><?php echo $line_contact['name']; ?></td>
                    <td><?php echo $line_contact['email']; ?></td>
                    <td><?php echo $line_contact['subject']; ?></td>
                    <td><?php echo $line_contact['comment']; ?></td>
                </tr>
                <?php 
                    }
                ?>
            </tboby>
            <caption><em>La liste des messages : <?php echo $nbr_contacts; ?></em></caption>
        </table>
    </div>
    <hr>
</div>  

<?php
require_once 'inc/bas.inc.php';