<?php
/**
 * Created by PhpStorm.
 * User: ELITE
 * Date: 24/05/2016
 * Time: 19:50
 */

echo '<div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">';
echo '</br></br>';
echo '<h1 align="center" id="headingHigh">Thank you for trusting ensastore </br> See you Later!</h1>';
echo '</br></br>';

if(isset($_GET['id'])){
    $idCommande = $_GET['id'];
}

$query = "SELECT cl.nom as Nom, cl.prenom as Prenom, cl.email as Email, co.details as Details FROM commande co ,client cl WHERE co.idCommande = " . $idCommande . " AND co.idClient=cl.idClient";
$result = $connect->query($query);
$line = $result->fetch();
$nom = $line['Nom'];
$prenom = $line['Prenom'];
$email = $line['Email'];
$details = $line['Details'];

echo '<div class="bs-example" data-example-id="striped-table">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email </th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>'; echo $nom; echo'</td>
                    <td>'; echo $prenom; echo'</td>
                    <td>'; echo $email; echo'</td>
                    <th><textarea class="form-control"  rows="8" style="width:400px;" placeholder="';echo $details; echo'"></textarea></th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <th><a class="btn btn-block btn-info" style="position:relative;
                                                    top: 0px;
                                                    left:10px;
                                                    height: 35px;" role="button" href="../control/download.php">Download your Bill  <span class="glyphicon glyphicon-download"></span></a></th>
                </tr>
            </tbody>
        </table>
    </div>';

echo '</div>
            <div class="col-md-3"></div>
        </div>
        </br></br>';