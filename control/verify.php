<?php
/**
 * Created by PhpStorm.
 * User: ELITE
 * Date: 20/05/2016
 * Time: 16:44
 */

    include_once('../config.php');
    require_once(ROOT . 'Connexion.php');
    $connect = new Connexion();

    $email = htmlspecialchars($_GET['verify']);
    $query = "SELECT count(*) FROM client WHERE email = " . $email;
    $result = $connect->query($query);
    if($result>=1){
        echo 'error';
    }
    else{
        echo 'allright';
    }