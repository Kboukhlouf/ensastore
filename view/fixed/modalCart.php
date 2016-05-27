<?php
/**
 * Created by PhpStorm.
 * User: ELITE
 * Date: 17/05/2016
 * Time: 20:00
 */

echo '        <!-- Modal -->
            <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">My Cart</h4>
                      </div>
                          <div id="myCart" class="modal-body">';
                echo '<table class="table table-striped">';
                echo '<div id="count" style="display: none;">' . $myCart->count() . '</div>';
                echo '
                        <thead>
                          <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Remove</th>
                            <th>Total Price</th>
                          </tr>
                        </thead>
                        <tbody>';
                            $total = 0;
                            if (!$myCart->isEmpty()) {
                                foreach ($myCart as $cartItem) {
                                    $cartItemId = $cartItem['item']->getItemId();
                                    $cartItemLabel = $cartItem['item']->getItemLabel();
                                    $cartItemPrice = $cartItem['item']->getItemPrice();
                                    $quantity = $cartItem['qty'];
                                    echo '<tr>';
                                    echo '<th><img src="getImage.php?id='; echo $cartItemId;
                                    echo '" width="50px" height="50px">   ';
                                    echo $cartItemLabel;
                                    echo '</th>';
                                    echo '<th>';
                                    echo '<input value="'; echo $quantity; echo '" type="number" class="form-control" id="exampleInputQuantity" placeholder="XX"
                                                    style="width: 70px;" readonly>';
                                    echo '</th>';

                                    echo '<th><a href="../control/removeItem.php?item='; echo $cartItemId; echo '" role="button" class="btn btn-danger" style="position:relative;
                                                    top: 0px;
                                                    left:10px;
                                                    width: 35px;
                                                    height: 35px;"><span class="glyphicon glyphicon-remove" style="position:relative; top: 0px; left:0px;"></span></a></th>';

                                    echo '<th>';
                                    echo $quantity*$cartItemPrice;
                                    echo '</th>';
                                    $total+=$quantity*$cartItemPrice;
                                    echo '</tr>';
                                }
                            }
                        echo '<tr><th>Cart total</th><th></th><th></th><th>';
                        echo $total;
                        echo '</th></tr>
                        </tbody>
                        </table>';



echo'
                          </div>
                      <div class="modal-footer">
                    <a href="../control/clearCart.php" role="button" style="display: inline; align-content: left;" class="btn btn-danger">Clear Cart</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
                    if(isset($_SESSION['login']) && $_SESSION['login']){
                        if($myCart->isEmpty()){
                            echo '<a role="button" href="cart.php" type="button" class="btn btn-primary disabled" >CheckOut</a>';
                        }
                        else{
                            echo '<a role="button" href="cart.php" type="button" class="btn btn-primary" >CheckOut</a>';
                        }
                    }
                    else{
                        if($myCart->isEmpty()){
                            echo '<a role="button" href="signIn.php?result=required" type="button" class="btn btn-primary disabled" >CheckOut</a>';
                        }
                        else{
                            echo '<a role="button" href="signIn.php?result=required" type="button" class="btn btn-primary" >CheckOut</a>';
                        }
                        echo '</br></br>';
                    }
echo '
                  </div>
                </div>
              </div>
            </div>';