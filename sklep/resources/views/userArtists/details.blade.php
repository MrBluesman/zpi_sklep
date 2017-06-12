@extends('layouts.app')

@section('title', $artist->nazwa)

@section('content')

    <h1>{{$artist->nazwa}}</h1>
    <div>{{$artist->opis}}</div>
    <div><a href="{{ route('userArtists.index') }}" type="button" class="btn btn-default">Wróć</a></div>

@endsection