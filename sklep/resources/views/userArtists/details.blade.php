@extends('layouts.app')

@section('title', $artist->nazwa)

@section('content')

    <h1>{{$artist->nazwa}}</h1>
    <div>{{$artist->opis}}</div>


    @foreach($albums as $album)
            <tr>
                <td>
                    @if($album->plik == null ){OKLADKA}
                    @else
                        <img src="{{$album->plik}}"/>
                    @endif
                </td>
                <td>
                    <table class="table table-bordered">
                        <tr><td>{{$album->tytul}} ({{$album->rok}})</td></tr>
                        <tr><td>{{$album->artist['nazwa']}}</td></tr>
                        <tr><td>MP3: {{$album->cena_cyfrowa}} PLN</td></tr>
                        <tr><td>CD: {{$album->cena_fizyczna}} PLN</td></tr>
                        <tr><div><a href="{{ route('cart.addToCart' , $album) }}" type="button" class="btn btn-default" role="button">Dodaj do koszyka</a></div></tr>
                    </table>
                </td>
            </tr>
    @endforeach

    <div><a href="{{ route('userArtists.index') }}" type="button" class="btn btn-default">Wróć</a></div>
    {{--<div><a href="{{ URL::previous() }}" type="button" class="btn btn-default">Wróć</a></div>--}}

@endsection