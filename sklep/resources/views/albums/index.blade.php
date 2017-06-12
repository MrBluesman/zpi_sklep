use Illuminate\Support\Facades\Auth;

@extends('layouts.app')

@section('title', 'Płyty')


@section('koszyk')
    @if(Auth::user()!=null && Auth::user()->hasRole('user')))
    <a href="{{ route('cart.getCart') }}"><i class="fa fa-shopping-cart " aria-hidden="true"></i>Koszyk
        <span class="badge"> {{ Session::has('cart') ? Session::get('cart')->totalQty : ''}} </span></a>
    @endif
@endsection

@section('content')
{{-- {{ URL::asset('css/table.css'); }} --}}

<table class="table table-bordered">
  @foreach($albums as $album)
  @if(($loop->index) % 2 == 0)
  <tr>
    @endif
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
        <tr><div><a href="{{ route('albums.edit' , $album) }}" type="button" class="btn btn-default">Edycja</a></div></tr>
        <tr><div><a href="{{ route('albums.delete' , $album) }}" type="button" class="btn btn-default">Usuń</a></div></tr>
        <tr><div><a href="{{ route('cart.addToCart' , $album) }}" type="button" class="btn btn-default" role="button">Dodaj do koszyka</a></div></tr>
    </table>
        </td>
    @if(($loop->index) % 2 == 1)
  </tr>
  @endif
  @endforeach
</table>
<div><a href="{{ url('/') }}" type="button" class="btn btn-default">Wróć</a></div>
<div><a href="{{ url('/albums/add') }}" type="button" class="btn btn-default">Dodaj album</a></div>

@endsection
