<?php
/**
 * Created by PhpStorm.
 * User: ELITE
 * Date: 15/05/2016
 * Time: 14:00
 */
require_once('../Connexion.php');
$connect = new Connexion();

$id = htmlspecialchars($_GET['id']);
$sql = "SELECT photo,mime FROM article WHERE idArticle=$id";
$result = $connect->query("$sql");
$row = $result->fetch();
$mime = $row['mime'];
header("Content-type: " . $mime );
$connect=null;
echo $row['photo'];