<?php

namespace App\Http\Controllers;

use App\ShippingAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ShippingAddressController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
    public function index()
    {
        //wyświetlanie
        $address = DiscountCode::all();

        return view('shippingAddress.index', compact('adress'));
    }


    public function saveAddress(Request $request)
    {

    }


}
