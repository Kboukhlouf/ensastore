<?php

/**
 * Created by PhpStorm.
 * User: ELITE
 * Date: 21/05/2016
 * Time: 01:42
 */
require_once('CartItem.php');

class Cart implements IteratorAggregate, Countable
{

    private $cartItems;
    private $ids;
    static public $myCart;

    private function __construct(){
        $this->cartItems=array();
        $this->ids=array();
    }

    public static function getInstance(){
        if(is_object(Cart::$myCart)) return Cart::$myCart;
        else{
            Cart::$myCart=new Cart();
            return Cart::$myCart;
        }
    }

    public function addItem(CartItem $item){
        $id = $item->getItemId();

        if(!$id) throw new Exception ("Item must have a unique Id");

        if(isset($this->cartItems[$id])){
            $this->updateItem($item,$this->cartItems[$id]['qty']+1);
        }
        else{
            $this->cartItems[$id]=array('item'=>$item,'qty'=>1);
            $this->ids[]=$id;
        }

    }

    public function updateItem(CartItem $item,$qty){
        $id=$item->getItemId();
        if($qty===0){
            $this->deleteItem($item);
        }
        else if(($qty>0) && ($qty!=$this->cartItems[$id]['qty'])){
            $this->cartItems[$id]['qty']=$qty;
        }
    }

    public function deleteItem(CartItem $item){
        $id = $item->getItemId();

        if(!$id) throw new Exception("Item must have a unique Id");

        if(isset($this->cartItems[$id])){
            unset($this->cartItems[$id]);
            $index = array_search($id,$this->ids);
            unset($this->ids[$index]);
            $this->ids=array_values($this->ids);
        }
    }

    public function isEmpty() {
        return (empty($this->cartItems));
    }

    public function getIterator() {
        return new ArrayIterator($this->cartItems);
    }

    public function count(){
        return count($this->cartItems);
    }

    public function __set($att,$value){
        $this->$att=$value;
    }

    public function __get($att){
        return $this->$att;
    }

    public function __destruct(){

    }
}