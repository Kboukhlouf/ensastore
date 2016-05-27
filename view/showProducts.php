<?php
/**
 * Created by PhpStorm.
 * User: ELITE
 * Date: 15/05/2016
 * Time: 16:26
 */

include_once('../config.php');
require_once(ROOT . 'Connexion.php');
$connect = new Connexion();

$range = '0,5000';


if(isset($_REQUEST['idCateg']) || isset($_REQUEST['categ'])){
    $idCateg = $_REQUEST['idCateg'];
    $categ = $_REQUEST['categ'];
    if(isset($_REQUEST['range'])){
        $range =  $_REQUEST['range'];
    }
}
else{
    $idCateg = "hommes";
    $categ = "hommes";
}

$values = explode(',',$range);

echo '<div id="products" class="row">
<div class="col-lg-1"></div>';
echo '<div class="col-lg-10">';

$connect = new Connexion();
if($categ=='men'){
    echo '<br>';
    echo '<h1 align="center" id="headingHigh"> Latest ensastore products for Men</h1>';
    echo '</br></br>';
}
else if($categ=='women'){
    echo '</br>';
    echo '<h1 align="center" id="headingHigh"> Latest ensastore products for Women</h1>';
    echo '</br></br>';
}
else{
    echo '</br>';
    echo '<h1 align="center" id="headingHigh"> ' .$categ . ' ensastore</h1>';
    echo '</br></br>';
}

if($idCateg=="hommes"){
    $query = 'SELECT * FROM article a,categorie c WHERE (a.prixUnitaire BETWEEN ' . $values['0'] . ' AND ' . $values['1'] . ') AND c.gender=\'male\' AND c.idCategorie = a.idCategorie' ;
    echo '<div id="nomCateg" style="display:none;">' . $categ . '</div>';
    echo '<div id="idCateg" style="display:none;">' . $idCateg . '</div>';
    $result = $connect->query($query);
    foreach($result as $line){
        $id = $line['idArticle'];
        echo '  <div class="col-md-4">
                    <div class="thumbnail">
                      <img src="getImage.php?id='. $id .'" alt="downloading.." width="300" height="300"/>
                      <div class="caption"> <div>';
        echo'     <h3 id="labeling">';
        echo $line['label'];
        echo '  </div>  </h3>
        <p>Prix : ';
        echo $line['prixUnitaire'];
        echo ' MAD</p><p>Quantité : ';
        echo $line['quantite'];
        echo ' Piéces</p></p>';
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
}
else if($idCateg=="femmes"){
    $query = 'SELECT * FROM article a,categorie c where (a.prixUnitaire BETWEEN ' . $values['0'] . ' AND ' . $values['1'] . ') AND c.gender=\'female\' AND c.idCategorie = a.idCategorie  ORDER BY a.idArticle DESC';
    echo '<div id="nomCateg" style="display:none;">' . $categ . '</div>';
    echo '<div id="idCateg" style="display:none;">' . $idCateg . '</div>';
    $result = $connect->query($query);
    foreach($result as $line){
        $id = $line['idArticle'];
        echo '  <div class="col-md-4">
    <div class="thumbnail">
      <img src="getImage.php?id='. $id .'" alt="downloading.." width="300" height="300"/>
      <div class="caption"> <div>';
        echo'     <h3 id="labeling">';
        echo $line['label'];
        echo '  </div>  </h3>
        <p>Prix : ';
        echo $line['prixUnitaire'];
        echo ' MAD</p><p>Quantité : ';
        echo $line['quantite'];
        echo ' Piéces</p></p>';
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
}
else{
    $query = 'SELECT * FROM article a, categorie c WHERE  a.idCategorie = ' . $idCateg . ' AND a.idCategorie=c.idCategorie AND (a.prixUnitaire BETWEEN ' . $values['0'] . ' AND ' . $values['1'] .')';
    echo '<div id="nomCateg" style="display:none;">' . $categ . '</div>';
    echo '<div id="idCateg" style="display:none;">' . $idCateg . '</div>';
    $result = $connect->query($query);
    foreach($result as $line){
        $id = $line['idArticle'];
        echo '  <div class="col-md-4">
    <div class="thumbnail">
      <img src="getImage.php?id='. $id .'" alt="downloading.." width="300" height="300"/>
      <div class="caption"> <div>';
        echo'     <h3 id="labeling">';
        echo $line['label'];
        echo '  </div>  </h3>
        <p>Prix : ';
        echo $line['prixUnitaire'];
        echo ' MAD</p><p>Quantité : ';
        echo $line['quantite'];
        echo ' Piéces</p></p>';
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
}

echo '</div>
      <div class="col-lg-1"></div>
      </div>';
