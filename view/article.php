<?php session_start();
    require_once('../config.php');
    require_once(MODEL . 'Cart.php');
    $myCart = unserialize($_SESSION['cart']);
/**
 * Created by PhpStorm.
 * User: ELITE
 * Date: 21/05/2016
 * Time: 21:00
 */
    include_once('../config.php');
    require_once(ROOT . 'Connexion.php');
    $connect = new Connexion();
    include_once(VIEW . 'fixed/header.php');
    include_once(VIEW . 'fixed/navbar.php');
    include_once(VIEW . 'fixed/sidebar.php');
    $articleId = $_GET['articleId'];
    $query = 'SELECT * FROM article WHERE idArticle =' . $articleId ;
    $result=$connect->query($query);
    $line = $result->fetch();
    $label = $line['label'];

    include_once('showArticle.php');
    include_once(VIEW . 'fixed/footer.php');
    $_SESSION['cart'] = serialize($myCart);