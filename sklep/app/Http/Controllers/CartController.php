<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Album;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;

class CartController extends Controller
{

  public function addToCart(Request $request, Album $album)
  {
      //$album = Album::find($id);
      //$oldCart = Session::has('Cart') ? Session::get('cart') : null;
      $oldCart = Session::has('cart')?$request->session()->get('cart'):null;
      $cart = new Cart($oldCart);
      $cart->add($album, $album['plyta_id'], 1);

      $request->session()->put('cart',$cart);
      //dd($request->session()->get('cart'));
      return redirect()->route('albums.index');

  }


  public function getCart()
  {
      if(!Session::has('cart'))
      {
          return view('albums.koszyk', ['cartItems'=> null]);
      }
      $oldCart = Session::get('cart');
      $cart = new Cart($oldCart);
      //dd(session()->get('cart'));
      return view('albums.koszyk', ['cartItems'=> $cart->items, 'totalprice'=>$cart->totalPrice]);
  }

  public function incrementQuantity(Request $request, Album $album)
  {
    $oldCart = Session::has('cart')?$request->session()->get('cart'):null;
    $cart = new Cart($oldCart);
    $cart->add($album, $album['plyta_id'], 1);

    $request->session()->put('cart',$cart);
    //dd($request->session()->get('cart'));
    return \redirect()->route('cart.getCart');
  }

  public function decrementQuantity(Request $request, Album $album)
  {
    $oldCart = Session::has('cart')?$request->session()->get('cart'):null;
    $cart = new Cart($oldCart);
    $cart->delete($album, $album['plyta_id']);
    if($cart->hasItems()) {
      $request->session()->put('cart',$cart);
    } else {
      $request->session()->forget('cart');
    }
    //dd($request->session()->get('cart'));
    return \redirect()->route('cart.getCart');
  }

  public function removeItem(Request $request, Album $album) {
    $oldCart = Session::has('cart')?$request->session()->get('cart'):null;
    $cart = new Cart($oldCart);
    $cart->deleteAll($album, $album['plyta_id'], 1);

    if($cart->hasItems()) {
      $request->session()->put('cart',$cart);
    } else {
      $request->session()->forget('cart');
    }
    //dd($request->session()->get('cart'));
    return \redirect()->route('cart.getCart');
  }

}
