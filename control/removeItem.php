<?php session_start();
/**
 * Created by PhpStorm.
 * User: ELITE
 * Date: 23/05/2016
 * Time: 21:05
 */

require_once('../config.php');
require_once(ROOT . 'Connexion.php');
require_once(MODEL . 'Cart.php');
require_once(MODEL . 'CartItem.php');
$connect = new Connexion();
$myCart = unserialize($_SESSION['cart']);
$id = $_GET['item'];
$quantityLeft = 0;
foreach ($myCart as $cartItem){
    if(($cartItem['item']->getItemId())==$id){
        $myCart->deleteItem($cartItem['item']);
        $quantityLeft = $cartItem['qty'];
    }
}
    $query = 'SELECT * FROM article WHERE idArticle = ' . $id;
    $result = $connect->query($query);
    $line = $result->fetch();
    $quantity = $line['quantite'];
    $quantityUpdated = $quantity + $quantityLeft;
    $result = $connect->exec('UPDATE article SET quantite =' . $quantityUpdated . ' WHERE idArticle='.$id);
$_SESSION['cart'] = serialize($myCart);
header('Location: ../view/products.php');