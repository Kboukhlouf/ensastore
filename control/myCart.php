<?php
/**
 * Created by PhpStorm.
 * User: ELITE
 * Date: 23/05/2016
 * Time: 18:01
 */

echo '<div  id="myCartBody">';
                echo '<table class="table table-striped">';
                echo '<div id="count" style="display: none;">' . $myCart->count() . '</div>';
                echo '
                        <thead>
                          <tr>
                            <th>Product</th>
                            <th>Quantity</th>
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
                                                    style="width: 70px;" readonly><span class="badge" style="
                                                    background: #ff4c4f;
                                                    position:relative;
                                                    top: 17px;
                                                    left:0px;
                                                    width: 20px;
                                                    height: 20px;">';
                                    echo '</th>';

                                    echo '<th>';
                                    echo $quantity*$cartItemPrice;
                                    echo '</th>';
                                    $total+=$quantity*$cartItemPrice;
                                    echo '</tr>';
                                }
                            }
                        echo '<tr><th>Cart total</th><th></th><th>';
                        echo $total;
                        echo '</th></tr>
                        </tbody>
                        </table>';



echo'
                          </div>
                            <a href="../control/clearCart.php" role="button"  class="btn btn-danger">Clear Cart</a>
                            <a href="../control/validate.php" role="button" class="btn btn-primary">CheckOut</a>

                            </br></br>';