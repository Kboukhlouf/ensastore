<?php
/**
 * Created by PhpStorm.
 * User: ELITE
 * Date: 24/05/2016
 * Time: 19:05
 */
session_start();
if(isset($_SESSION)){
    require_once('../config.php');
    require_once(MODEL . 'Cart.php');
    require_once(MODEL . 'CartItem.php');
    $myCart = unserialize($_SESSION['cart']);
}

include_once('../config.php');
require_once(ROOT . 'Connexion.php');
$connect = new Connexion();
include_once(VIEW . 'fixed/header.php');
include_once(VIEW . 'fixed/navbar.php');
include_once(VIEW . 'thanks.php');
include_once(VIEW . 'fixed/footer.php');

$_SESSION['cart'] = serialize($myCart);
