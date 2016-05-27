<?php
session_start();
    if(isset($_SESSION)){
        require_once('../config.php');
        require_once(MODEL . 'Cart.php');
        require_once(MODEL . 'CartItem.php');
        $myCart = unserialize($_SESSION['cart']);
    }
/**
 * Created by PhpStorm.
 * User: ELITE
 * Date: 12/05/2016
 * Time: 22:04
 */
    include_once('../config.php');
    require_once(ROOT . 'Connexion.php');
    $connect = new Connexion();
    include_once(VIEW . 'fixed/header.php');
    include_once(VIEW . 'fixed/navbar.php');
    include_once(VIEW . 'fixed/sidebar.php');

    echo '</br></br></br>';
    echo '<div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                Filter by price interval: <b>MAD 100</b>
                    <input id="mySlider" type="text" class="span2" value="" data-slider-min="100" data-slider-max="3000" data-slider-step="5" data-slider-value="[200,5000]"/>
                 <b>MAD 3000</b>
             </div>
            <div class="col-md-3"></div>
        </div>';

    require('showProducts.php');
    include_once(VIEW . 'fixed/footer.php');

    $_SESSION['cart'] = serialize($myCart);
