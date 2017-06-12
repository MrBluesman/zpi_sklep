@extends('layouts.app')

@section('title', 'Artyści')

@section('content')

    <table class="table table-bordered">
        <tr>
            <th>Nazwa</th>
            <th>Opis</th>
        </tr>
        @foreach($artists as $artist)
        <tr>
            <td><a href="{{route('userArtists.details', $artist)}}">{{$artist->nazwa}}</a></td>
            <td>{{$artist->opis}}</td>
        </tr>
        @endforeach
    </table>
    {{--<div><a href="{{ route('artists.index') }}" type="button" class="btn btn-default">Wróć</a></div>--}}
    <a class="btn btn-default" href="{{ URL::previous() }}">Wróć</a>
@endsection
