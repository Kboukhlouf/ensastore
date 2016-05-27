<?php
/**
 * Created by PhpStorm.
 * User: ELITE
 * Date: 23/05/2016
 * Time: 17:58
 */
session_start();
if(isset($_SESSION)){
    $disconnect = false;
    require_once('../config.php');
    require_once(MODEL . 'Cart.php');
    require_once(MODEL . 'CartItem.php');
    $myCart = unserialize($_SESSION['cart']);
}

    include_once('../config.php');
    require_once(ROOT . 'Connexion.php');
    $connect = new Connexion();
    echo '<p></p>';
    include_once(VIEW . 'fixed/header.php');
    include_once(VIEW . 'fixed/navbar.php');
    echo '</br></br>';
    echo '<h1 align="center" id="headingHigh">My Cart</h1>';
    echo '</br></br>';
    echo '<div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">';

    include('../control/myCart.php');
    echo '</div>
            <div class="col-md-3"></div>
           </div>';
    include_once(VIEW . 'fixed/footer.php');

    $_SESSION['cart']=serialize($myCart);