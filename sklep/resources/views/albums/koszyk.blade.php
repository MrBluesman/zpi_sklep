@extends('layouts.app')

@section('title', 'Koszyk')

@section('content')
{{-- {{ URL::asset('css/table.css'); }} --}}
@if(Session::has('cart'))
    <div class="row">
        <div class="col-sm-8 col-md-8 col-md-offset-2 col-sm-offset-2">
            <ul class="list-group">
                  <table class="table table-bordered">
                    <th style="width:60%;">Nazwa</th>
                    <th style="width:15%;"><center>Ilość<center></th>
                    <th style="width:12.5%;">Cena jednostkowa</th>
                    <th style="width:12.5%;">Kwota</th>
                @foreach($cartItems as $item)
                    <tr>
                        <td><a href="{{ route('cart.removeItem' , $item['item']) }}" style="color:red;">X</a>
                          <strong>{{ $item['item']['tytul'] }}</strong>

                        </td>
                        <td><center>
                          <a href="{{ route('cart.incrementQuantity' , $item['item']) }}" style="text-decoration: none">
                          <h3 style="display:inline;"><span class="glyphicon glyphicon-plus" style="color:green;display:inline;"></span></h3>
                          </a>
                          <span class="badge" style="display:inline;">{{ $item['qty'] }} </span>
                          <a href="{{ route('cart.decrementQuantity' , $item['item']) }}" style="text-decoration: none">
                          <h3 style="display:inline;margin-left:5px;"><span class="glyphicon glyphicon-minus" style="color:red;display:inline;"></span></h3>
                          </a>
                          </center>
                        </td>
                        <td><center><span class="label label-success">{{$item['item']['cena_fizyczna']}}</span></center></td>
                        <td><span class="badge">{{$item['price']}} </span></td>
                    </tr>
                @endforeach
              </table>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">

            <strong>Total: {{ $totalprice }}</strong>

        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
            <button type="button" class="btn btn-success">Checkout</button>
        </div>
    </div>
@else
    <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
            <h2>No Items in Cart!</h2>
        </div>
    </div>
@endif
@endsection
