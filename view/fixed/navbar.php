<?php
/**
 * Created by PhpStorm.
 * User: ELITE
 * Date: 12/05/2016
 * Time: 15:12
 */

include_once('modalSignUp.php');
include_once('modalCart.php');
echo '
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">ensastore</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Acceuil<span class="sr-only">(current)</span></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-align-justify"></span> Catégories <span class="caret"></span></a>
          <ul class="dropdown-menu">

            <li><a href="products.php?idCateg=hommes&categ=men">Hommes</a></li>
            <li role="separator" class="divider"></li>';
            $query = "SELECT * FROM categorie WHERE gender = 'male'";
            $result = $connect->query($query);
            $lines = $result->fetchAll();
            foreach ($lines as $line){
                $categ = $line['nom'];
                $idCateg=$line['idCategorie'];
                echo '<li id="categories"><a href="products.php?idCateg='.$idCateg.'&categ='.$categ.'">';
                echo $categ ;

                echo '</a></li>';
            }
echo '
            <li role="separator" class="divider"></li>
            <li><a href="products.php?idCateg=femmes&categ=women">Femmes</a></li>
            <li role="separator" class="divider"></li>';

            $query = "SELECT * FROM categorie WHERE gender = 'female'";
            $result = $connect->query($query);
            $lines = $result->fetchAll();
            foreach ($lines as $line){
                $categ = $line['nom'];
                $idCateg=$line['idCategorie'];
                echo '<li id="categories"><a href="products.php?idCateg='.$idCateg.'&categ='.$categ.'">';
                echo $categ ;
                echo '</a></li>';
            }

echo '
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span></button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a data-toggle="modal"data-target="#cartModal"><span class="glyphicon glyphicon-shopping-cart"></span>';
        if($myCart->count()>0){
            echo '<span style="
                background: #ff4c4f;
                position:relative;
                top: 0px;
                left:0px;" class="badge badge-notify">';
                echo $myCart->count();
        }
        echo '</span> Cart</a></li>
        <!-- 
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <span class="glyphicon glyphicon-shopping-cart"></span> Chart<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <button class="btn btn-success">Valider Panier</button>
            <button class="btn btn-danger">Vider</button>
          </ul>
        </li> -->
        <li><a href="signIn.php"><span class="glyphicon glyphicon-user"></span> SignIn</a></li>';
            if(isset($_SESSION['login']) && $_SESSION['login']==true){
                echo '
           <li> <a href="../control/signoff.php"><span class="glyphicon glyphicon-off"></span> Sign Off</a></li> ';
            }
echo '
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>';