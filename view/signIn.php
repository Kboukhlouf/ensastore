<?php session_start();

if(isset($_SESSION)){
    require_once('../config.php');
    require_once(MODEL . 'Cart.php');
    require_once(MODEL . 'CartItem.php');
    $myCart = unserialize($_SESSION['cart']);
}
/**
 * Created by PhpStorm.
 * User: ELITE
 * Date: 17/05/2016
 * Time: 20:38
 */

include_once('../config.php');
require_once(ROOT . 'Connexion.php');
$connect = new Connexion();


echo '</br></br></br>';
include_once(VIEW . 'fixed/header.php');
include_once(VIEW . 'fixed/navbar.php');

echo '<div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">';
//notfictation alert
if(isset($_GET['result'])){
    $result=$_GET['result'];
    if($result=="failed"){
        include_once(VIEW . 'alerts/loginFailedAlert.php');
    }
    if($result=="required"){
        include_once(VIEW . 'alerts/loginRequiredAlert.php');
    }
}

echo '
                    <h4 id="headingHigh">Sign In</h4>
                    </br></br>
                        <form method="post" action="../control/authentication.php">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="inputEmail" class="form-control" id="exampleInputEmail1" placeholder="Email">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="inputPassword" class="form-control" id="exampleInputPassword1" placeholder="Password">
                          </div>
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> Remember me
                            </label>
                          </div>
                          <button name="submit" type="submit" class="btn btn-block btn-success">LogIn</button>
                          <label for="signupButton">Don\'t have an account? Sign up here</label>
                          <!-- Button trigger modal -->
                            <button type="button" class="btn btn-block btn-info" data-toggle="modal" data-target="#signUpModal">Sign Up!
                            </button>
                        </form>
            </div>
            <div class="col-md-4"></div>
        </div>';

include_once(VIEW . 'fixed/footer.php');

$_SESSION['cart'] = serialize($myCart);

