<?php

// Contact.class.php 

class Contact{
     private $name;
     private $email;
     private $subject;
     private $comment;

     // bonus email
     private $to;
     private $headers;

     // fonction d'insertion en BDD :
     public function insertContact($name, $email, $subject, $comment){
          // 1- on récupère les saisies de l'utilisateur
          // 2- on se connecte à la BDD
          // 3- on créé une requête d'insertion en 2 temps (prepare / execute)
          // 4- on ferme la requête (protection contre les injections malveillantes)

          // 1- on récupère les saisies de l'utilisateur
          $this->name = strip_tags($name);
          $this->email = strip_tags($email);
          $this->subject = strip_tags($subject);
          $this->comment = strip_tags($comment);

          // 2- on se connecte à la BDD
          require('connexion.php');

          // 3- on créé une requête d'insertion en 2 temps (prepare / execute)
          $req = $bdd->prepare('INSERT INTO t_contact (name, email, subject, comment) VALUES (:name, :email,:subject, :comment)');

          // dans mon execute() je vais affecter à la propriété name, le name de l'auteur qui vient de poster un comment
          $req->execute([
               ':name' => $this->name,
               ':email' => $this->email,
               ':subject' => $this->subject,
               ':comment' => $this->comment
          ]);

          // $req->execute(array(
          //      ':name' => $this->name,
          // );

          // 4- on ferme la requête (protection contre les injections malveillantes)
          $req->closeCursor();
     }

     // bonus : envoi email

    public function sendEmail($name, $subject, $email, $comment) {
     $this->to = 'andree.baptiste@lepoles.com';
     $this->email = strip_tags($email);
     $this->subject = strip_tags($subject);
     $this->comment = strip_tags($comment);    

// rajout pour récupérer toutes les informations dans le corps du mail $this->message ="Nouveau message de : <strong>". $this->nom .'</strong><br>';

     $this->message ="Nouveau message de : <strong>". $this->name .'</strong><br>';
     $this->message .="Email : <em>".$this->email.'</em><br>';
     $this->message .="Sujet : <em>".$this->subject.'</em><br>Message :';
     $this ->message .= strip_tags($comment);

// suite fabrication du message

     $this->headers = 'De : ' . $this->email . "\r\n"; // retours à la ligne
     $this->headers .= 'MIME-version: 1.0' . "\r\n";
     $this->headers .= 'Content-type : text/html; charset=utf-8' . "\r\n"; // enfin, on utilise la fonction prédéfinie mail() de PHP
     mail($this->to, $this->subject, $this->comment, $this->headers);
    }
}