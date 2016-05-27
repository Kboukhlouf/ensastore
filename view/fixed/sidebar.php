<?php
/**
 * Created by PhpStorm.
 * User: ELITE
 * Date: 12/05/2016
 * Time: 15:13
 */

echo '<div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav"><p></p>';

echo '<li id="categories"><a href="products.php?idCateg=hommes&categ=men"><strong>Hommes</strong></a></li>
            <li role="separator" class="divider"></li>';

            $query = "SELECT * FROM categorie WHERE gender = 'male'";
            $result = $connect->query($query);
            $lines = $result->fetchAll();
            foreach ($lines as $line){
                $idCateg = $line['idCategorie'];
                $categ = $line['nom'];
                echo '<li><a href="products.php?idCateg='.$idCateg.'&categ='.$categ.'">';
                echo $categ ;
                echo '</a></li>';
            }
echo '
            <li role="separator" class="divider"></li>
            <li id="categories"><a href="products.php?idCateg=femmes&categ=women"><strong>Femmes</strong></a></li>
            <li role="separator" class="divider"></li>';

            $query = "SELECT * FROM categorie WHERE gender = 'female'";
            $result = $connect->query($query);
            $lines = $result->fetchAll();
            foreach ($lines as $line){
                $idCateg = $line['idCategorie'];
                $categ = $line['nom'];
                echo '<li><a href="products.php?idCateg='.$idCateg.'&categ='.$categ.'">';
                echo $categ ;
                echo '</a></li>';
            }

echo'
            </ul>
        </div>
        <!-- /#page-content-wrapper -->';