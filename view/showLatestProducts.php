<?php
/**
 * Created by PhpStorm.
 * User: ELITE
 * Date: 15/05/2016
 * Time: 14:24
 */

include_once('../config.php');
require_once(ROOT . 'Connexion.php');
$connect = new Connexion();

echo '<div id="latestProducts" class="row">
<div class="col-md-1"></div><div class="col-md-10">';

if(isset($_GET['result'])){
    $result=$_GET['result'];
    if($result=="success"){
        include_once(VIEW . 'alerts/loginSuccessfulAlert.php');
        $_SESSION['login']=true;
    }
    if($result=="signupSuccessful"){
        include_once(VIEW . 'alerts/signupSuccessfulAlert.php');
    }
    if($_GET['result']=="validated"){
        include_once(VIEW . 'alerts/purchaseSuccess.php');
    }
    if($result=="signoff"){
        include_once(VIEW . 'alerts/signoffAlert.php');
    }
}

$connect = new Connexion();
$query = 'SELECT * from article ORDER BY idArticle DESC LIMIT 3 ';
$result = $connect->query($query);
foreach($result as $line){
    $id = $line['idArticle'];
    echo '  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="getImage.php?id='. $id .'" alt="downloading image ..." width="300" height="300"/>
      <div class="caption">';
   echo'     <h3>';
    echo $line['label'];
    echo '    </h3>
        <p>Prix : ';
    echo $line['prixUnitaire'];
    echo '</p><p>Quantité : ';
    echo $line['quantite'];
    echo ' Piéces </p></p>';
    if($line['quantite']==0){
        echo '<p><a href="article.php?articleId=';
        echo $id;
        echo '" class="btn btn-primary" role="button">Show Article</a> <a href="../control/addToCart.php?articleId='; echo $id; echo'" class="btn btn-default disabled" role="button">Add to Chart</a></p>';
    }
    else{
        echo '<p><a href="article.php?articleId=';
        echo $id;
        echo '" class="btn btn-primary" role="button">Show Article</a> <a href="../control/addToCart.php?articleId='; echo $id; echo'" class="btn btn-default" role="button">Add to Chart</a></p>';
    }
    echo '</div>
    </div>
  </div>';
}

echo '</div></div><div class="col-md-1"></div>';