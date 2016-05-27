<?php

/**
 * Created by PhpStorm.
 * User: ELITE
 * Date: 21/05/2016
 * Time: 01:53
 */
class CartItem
{
    private $itemId;
    private $label;
    private $price;

    public function __construct($_itemId,$_label,$_price){
        $this->itemId=$_itemId;
        $this->label=$_label;
        $this->price=$_price;
    }

    public function getItemId(){
        return $this->itemId;
    }

    public function getItemLabel(){
        return $this->label;
    }
    public function getItemPrice(){
        return $this->price;
    }

    public function __toString()
    {
        return 'ItemId => ' . $this->itemId . ' label => ' . $this->label . ' price => ' . $this->price;
    }

    public function __destruct()
    {
    }

}