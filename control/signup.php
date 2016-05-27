<?php
/**
 * Created by PhpStorm.
 * User: ELITE
 * Date: 20/05/2016
 * Time: 15:23
 */


include_once('../config.php');
require_once(ROOT . 'Connexion.php');
$connect = new Connexion();

 if(isset($_POST)){
     $nom = htmlspecialchars($_POST['inputNom']);
     $prenom = htmlspecialchars($_POST['inputPrenom']);
     $email = htmlspecialchars($_POST['inputEmail']);
     $password = htmlspecialchars($_POST['inputPassword']);
     $result=0;
     try{
         $query = 'INSERT INTO `client`(`nom`, `prenom`, `email`, `pass`) VALUES ("' .$nom. '","' .$prenom . '","' .$email. '"," ' .$password. '")';
         $result=$connect->exec($query);
     }
     catch(PDOException $e){
         echo $e->errorInfo();
     }
     if($result==1){
         $query = 'SELECT * FROM client WHERE nom= "' . $nom . '" AND prenom="' . $prenom . '"';
         echo $query;
         $resultSelect = $connect->query($query);
         $line = $resultSelect->fetch();
         $_SESSION['client'] = $line['idClient'];
         header('Location: ../view/index.php?result=signupSuccessful');
     }
     else{
         header('Location : ../view/signIn.php?result=failed');
     }
 }