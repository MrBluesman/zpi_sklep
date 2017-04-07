@extends('layouts.app')

@section('title', 'Artyści')

@section('content')

    <table class="table table-bordered">
        @foreach($artists as $artist)
        <tr>
            <th><a href="{{route('artists.details', $artist)}}">{{$artist->nazwa}}</a></th>
            <th>{{$artist->opis}}</th>
        </tr>
        @endforeach
    </table>
    <a href="{{ route('artists.addArtist') }}" type="button" class="btn btn-primary">Dodaj artystę</a>

@endsection
