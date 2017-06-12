@extends('layouts.app')

@section('title', 'Artyści')

@section('content')

    <table class="table table-bordered">
        <tr>
            <th>Nazwa</th>
            <th>Opis</th>
            <th>Edycja</th>
            <th>Usuwanie</th>
        </tr>
        @foreach($artists as $artist)
        <tr>
            <td><a href="{{route('artists.details', $artist)}}">{{$artist->nazwa}}</a></td>
            <td>{{$artist->opis}}</td>
            <td><a href="{{ route('artists.editArtist', $artist) }}" type="button" class="btn btn-info">Edytuj</a></td>
            <td></td>
        </tr>
        @endforeach
    </table>
    <a href="{{ route('artists.addArtist') }}" type="button" class="btn btn-primary">Dodaj artystę</a>
    {{--<div><a href="{{ route('artists.index') }}" type="button" class="btn btn-default">Wróć</a></div>--}}
    <a class="btn btn-default" href="{{ URL::previous() }}">Wróć</a>
@endsection
