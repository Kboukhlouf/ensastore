<?php
session_start();
require_once('../config.php');
require_once(MODEL . 'Cart.php');
$myCart = unserialize($_SESSION['cart']);
/**
 * Created by PhpStorm.
 * User: ELITE
 * Date: 24/05/2016
 * Time: 16:40
 */

require_once(ROOT. 'Connexion.php');
$connect = new Connexion();

$today = date("F j, Y, g:i a");
$myfile = fopen("bill.txt", "w") or die("Unable to open file!");
$idClient = $_SESSION['client'];
$query = 'SELECT nom, prenom from client WHERE idClient = ' . $idClient;
$result = $connect->query($query);
echo $_SESSION['client'];
echo '<br>';
$line = $result->fetch();
$insertQuery = 'INSERT INTO `commande`(`idClient`, `date`) VALUES (' .$idClient. ',"' . $today. '")';
$insertResult = $connect->exec($insertQuery);
echo $insertResult;
echo '<br>';
$selectQuery = 'SELECT idCommande FROM commande ORDER BY idCommande DESC LIMIT 1';
$resultSelect = $connect->query($selectQuery);
$mySelectLine = $resultSelect->fetch();
fwrite($myfile,'Id de la Commande : ' . $mySelectLine['idCommande'] . "\n");
fwrite($myfile,'Nom et Prénom : ' . $line['nom'] . ' ' . $line['prenom'] . "\n");
fwrite($myfile,'Date de la Commande : ' . $today . "\n");
fwrite($myfile,'Details de la commande : ' . "\n");
$total = 0;
foreach($myCart as $cartItem){
    $prixqty = $cartItem['qty']*$cartItem['item']->getItemPrice();
    fwrite($myfile,$cartItem['item']->getItemLabel() . ' Prix Unitaire : ' . $cartItem['item']->getItemPrice() . ' Quantité : ' . $cartItem['qty'] . ' Prix*Quantité : ' . $prixqty . " MAD\n");
    $total += $prixqty;
}
fwrite($myfile, 'Total : ' . $total . " MAD\n");
fclose($myfile);

$updateQuery = 'UPDATE commande SET details = LOAD_FILE(\'C:/wamp/www/ensastore/control/bill.txt\') WHERE idCommande = ' . $mySelectLine['idCommande'];
$updateResult = $connect->exec($updateQuery);
echo '<br>'.$updateResult;
header('Location: ../control/clearCart.php?result=validated&idCommande='.$mySelectLine['idCommande']);