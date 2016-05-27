<?php session_start();
/**
 * Created by PhpStorm.
 * User: ELITE
 * Date: 22/05/2016
 * Time: 01:09
 */
    require_once('../config.php');
    require_once(ROOT . 'Connexion.php');
    require_once(MODEL . 'Cart.php');
    require_once(MODEL . 'CartItem.php');
    $connect = new Connexion();
    $articleId = htmlspecialchars($_GET['articleId']);
    $myCart = unserialize($_SESSION['cart']);
    $query = 'SELECT * FROM article WHERE idArticle = ' . $articleId;
    $result = $connect->query($query);
    $line = $result->fetch();
    $quantity = $line['quantite'];
    if($line['quantite']>0){
        $result = $connect->exec('UPDATE article SET quantite =' . --$quantity . ' WHERE idArticle='.$articleId);
            $item = new CartItem($articleId,$line['label'],$line['prixUnitaire']);
            $myCart->addItem($item);
            $_SESSION['cart'] = serialize($myCart);
            header('Location: ../view/article.php?articleId='.$articleId);
    }
    else{
        header('Location: ../view/article.php?articleId=' .$articleId .'&result=noItemsLeft');
    }