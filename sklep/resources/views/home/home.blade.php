
@extends('layouts.app')

@section('title', 'Strona główna')

@section('koszyk')
    <a href="{{ route('cart.getCart') }}"><i class="fa fa-shopping-cart " aria-hidden="true"></i>Koszyk
        <span class="badge"> {{ Session::has('cart') ? Session::get('cart')->totalQty : ''}} </span></a>
@endsection

@section('content')

    {{--<a class="btn btn-primary" href="{{ route('artists.index') }}">Artyści</a>--}}
    <a class="btn btn-primary" href="{{ route('albums.index') }}">Albumy</a>
    {{--<a class="btn btn-primary" href="{{ route('discountCodes.index') }}">Kody rabatowe</a>--}}
    {{--<a class="btn btn-primary" href="{{ route('userManagementPanel.index') }}">Zarządzanie użytkownikami</a>--}}
@endsection
