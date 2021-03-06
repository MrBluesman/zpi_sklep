<?php
/**
 * Created by PhpStorm.
 * User: Damian
 * Date: 15.05.2017
 * Time: 11:57
 */

namespace App;


class Cart
{

    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;
    public $discountCode = null;

    public function __construct($oldCart){
        if ($oldCart){
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
            $this->discountCode = $oldCart->discountCode;
        }
    }


    public function add($item, $id){

        $storedItem = ['qty'=>0, 'price'=>$item->cena_fizyczna, 'item'=> $item];
        if($this->items) {
            if(array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }

        $storedItem['qty']++;
        $storedItem['price'] = $item->cena_fizyczna * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->cena_fizyczna;
        $this->totalPrice = number_format($this->totalPrice,2);
    }

    public function delete($item, $id){
        if($this->items) {
            if(array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }

        $storedItem['qty']--;
        $storedItem['price'] = $item->cena_fizyczna * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty--;
        $this->totalPrice -= $item->cena_fizyczna;
        $this->totalPrice = number_format($this->totalPrice,2);
        if($storedItem['qty'] == 0) {
          unset($this->items[$id]);
        }
    }

    public function deleteAll($item, $id){
        if($this->items) {
            if(array_key_exists($id, $this->items)) {
              $this->totalQty -= $this->items[$id]['qty'];
              $this->totalPrice -= $item->cena_fizyczna * $this->items[$id]['qty'];
              $this->totalPrice = number_format($this->totalPrice,2);
              unset($this->items[$id]);
            }
        }
    }

    public function hasItems() {
      return $this->totalQty != 0;
    }


    public function addDiscount($code) {
      $this->discountCode = $code;
    }





}
