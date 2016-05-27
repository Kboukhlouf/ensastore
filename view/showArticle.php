<?php
/**
 * Created by PhpStorm.
 * User: ELITE
 * Date: 21/05/2016
 * Time: 21:08
 */
    echo '
            <div class="jumbotron">
              <h1 style="text-align: center;">';
    echo $label;
    echo '</h1>
        <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">';
if(isset($_GET['result'])){
    $result=$_GET['result'];
    if($result=="noItemsLeft"){
        include_once(VIEW . 'alerts/noItemsLeft.php');
    }
}
    echo '    </br>
              <p style="align-content: center; text-align: center;">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';
    echo '</p>
            <img style="display: block;margin-left: auto;margin-right: auto;" src="getImage.php?id='; echo $articleId;
            echo '" width="500" height="500">
              </br>';
    if(isset($_GET['result'])){
        $result=$_GET['result'];
        if($result=="noItemsLeft"){
            echo '<p style="text-align: center;"><a class="btn btn-primary disabled" href="../control/addToCart.php?articleId='; echo $articleId; echo'" role="button">Add to Cart</a></p>';
        }
    }
    else{
        echo '<p style="text-align: center;"><a class="btn btn-primary" href="../control/addToCart.php?articleId='; echo $articleId; echo'" role="button">Add to Cart</a></p>';
    }
    echo '
            </div>';
    echo '</div>
          <div class="col-md-1"></div>';
    echo '</div>';