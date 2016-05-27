<?php session_start();
/**
 * Created by PhpStorm.
 * User: ELITE
 * Date: 23/05/2016
 * Time: 00:04
 */

    require_once('../config.php');
    require_once(ROOT . 'Connexion.php');
    require_once(MODEL . 'Cart.php');
    require_once(MODEL . 'CartItem.php');
    $connect = new Connexion();
    $myCart = unserialize($_SESSION['cart']);
    foreach ($myCart as $cartItem){
        $myCart->deleteItem($cartItem['item']);
        $quantityLeft = $cartItem['qty'];
        $id = $cartItem['item']->getItemId();
        $query = 'SELECT * FROM article WHERE idArticle = ' . $id;
        $result = $connect->query($query);
        $line = $result->fetch();
        $quantity = $line['quantite'];
        $quantityUpdated = $quantity + $quantityLeft;
        $result = $connect->exec('UPDATE article SET quantite =' . $quantityUpdated . ' WHERE idArticle='.$id);
    }
    $_SESSION['cart'] = serialize($myCart);
    if(isset($_GET['result'])){
        if($_GET['result']=='validated'){
            header('Location: ../view/thankYou.php?id='.$_GET['idCommande']);
        }
    }
    else{
        header('Location: ../view/products.php');
    }
