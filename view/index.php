<?php
/**
 * Created by PhpStorm.
 * User: ELITE
 * Date: 12/05/2016
 * Time: 15:19
 */
    include_once('../config.php');
    require_once(MODEL . 'Cart.php');
    session_start();
    if(isset($_GET['result'])){
        if($_GET['result']=="signedUp" || $_GET['result']=="success" || $_GET['result']=="signupSuccessful"){
            $_SESSION['login']=true;
        }
    }
    if(isset($_SESSION['cart'])){
        $myCart = unserialize($_SESSION['cart']);
    }
    else{
        $myCart = Cart::getInstance();
    }
    include_once('../config.php');
    require_once(ROOT . 'Connexion.php');
    $connect = new Connexion();
    echo '<p></p>';
    include_once(VIEW . 'fixed/header.php');
    include_once(VIEW . 'fixed/navbar.php');
    echo '</br></br>';
    echo '<h1 align="center" id="headingHigh">Discover Our Latest Products</h1>';
    echo '</br></br>';
    include_once(VIEW . 'showLatestProducts.php');
    include_once(VIEW . 'fixed/footer.php');

    $_SESSION['cart']=serialize($myCart);