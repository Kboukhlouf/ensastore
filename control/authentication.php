<?php session_start();
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 18/05/2016
 * Time: 17:42
 */

include_once('../config.php');
require_once(ROOT . 'Connexion.php');
$connect = new Connexion();

if(isset($_POST)){
    $email=htmlspecialchars($_POST["inputEmail"]);
    $pass=htmlspecialchars($_POST["inputPassword"]);
    $query = 'SELECT count(*) as counting, idClient FROM client WHERE email =\'' . $email . '\' AND pass = \'' . $pass . '\'';
    $result = $connect->query($query);
    $line = $result->fetch();
    $id = $line['idClient'];
    if ($line['counting'] > 0){
        $_SESSION['client']=$id;
        header('Location: ../view/index.php?result=success');
    }
    else{
        header('Location: ../view/signIn.php?result=failed');
    }
}
else{
    echo 'I didn\'t receive anything!';
}