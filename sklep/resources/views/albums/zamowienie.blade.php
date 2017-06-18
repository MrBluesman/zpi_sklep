@extends('layouts.app')

@section('title', 'Zamowienie')

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
                            <td>
                                <strong>{{ $item['item']['tytul'] }}</strong>
                            </td>
                            <td><center>
                                    <span class="badge" style="display:inline;">{{ $item['qty'] }} </span>
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
        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <label class="col-md-3 control-label" style="display:block;">Kod rabatowy</label>
                        <div style="float:right;margin-right: 20px;">
                            Razem: {{$totalprice}} zł
                        </div>
                    </div>
                    <form  method="post" action="{{ route('cart.addDiscountCode') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">


                            <div style="float:right;margin-right: 20px;">
                                @if (!empty($code))
                                    Zniżka: {{$code * 100}} %
                                @endif
                            </div>

                            </br>
                            <div style="float:right;margin-right: 20px;">
                                @php ($total = number_format((1 - $code) * $totalprice, 2))
                                <strong>Do zapłaty: {{$total}}</strong>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div>
        <h3>
            Prosze uzupełnić niezbedne dane do zamówienia
        </h3>
    </div>
    <form action="{{route('zamowienie.store')}}" method="post" >
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group ">
            <label class="control-label " for="miasto">
                Miasto
            </label>
            <input class="form-control" id="miasto" name="miasto" type="text"/>
        </div>
        <div class="form-group ">
            <label class="control-label " for="ulica">
                Ulica
            </label>
            <input class="form-control" id="ulica" name="ulica"  type="text"/>
        </div>
        <div class="form-group ">
            <label class="control-label " for="kod_pocztowy">
                Kod pocztowy
            </label>
            <input class="form-control" id="kod_pocztowy" name="kod_pocztowy"  type="text"/>
        </div>
        <div class="form-group ">
            <label class="control-label " for="numer_domu">
                Numer domu
            </label>
            <input class="form-control" id="numer_domu" name="numer_domu" type="text"/>
        </div>
        <div class="form-group ">
            <label class="control-label " for="numer_mieszkania">
                Numer mieszkania
            </label>
            <input class="form-control" id="numer_mieszkania" name="numer_mieszkania" type="text"/>
        </div>
        <div class="form-group ">
            <label class="control-label " for="metoda_platnosci">
                Metoda Płatności
            </label>
            <select class="select form-control" id="metoda_platnosci" name="metoda_platnosci">
                <option value="przelew">Przelew</option>
                <option value="za_pobraniem">Za Pobraniem</option>
                <option value="paypal">PayPal</option>
            </select>
        </div>

        <div class="form-group">
            <div>
                <button class="btn btn-primary " name="submit" type="submit">
                    Potwierdzam zamowienie
                </button>
            </div>
        </div>
    </form>
@else
    <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
            <h2>Nie masz produktów w koszyku!</h2>
        </div>
    </div>
@endif
@endsection
