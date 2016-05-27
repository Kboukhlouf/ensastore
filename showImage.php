<?php
/**
 * Created by PhpStorm.
 * User: ELITE
* Date: 14/05/2016
* Time: 19:17
*/

require ('Connexion.php');
$connect = new Connexion();

$sql = "SELECT photo FROM article";
$statement = $connect->query($sql);
header("Content-Type : image/jpg");
while($row = $statement->fetch()) { ?>
    <img src="showImage.php?data=<?= $row['photo']; ?>"><br />
<?php } ?>