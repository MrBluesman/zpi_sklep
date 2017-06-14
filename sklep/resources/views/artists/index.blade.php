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
            <td>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <a href="{{ route('artists.editArtist', $artist) }}" type="button" class="btn btn-info">Edytuj</a>
                    </div>
                </div>
            </td>
            <td>
                <form class="form-horizontal" role="form" method="POST" action="{{ route('artists.delete', $artist) }}">
                    <input name="_method" type="hidden" value="DELETE">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-danger">
                                Usuń
                            </button>
                        </div>
                    </div>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <a href="{{ route('artists.addArtist') }}" type="button" class="btn btn-primary">Dodaj artystę</a>
    {{--<div><a href="{{ route('artists.index') }}" type="button" class="btn btn-default">Wróć</a></div>--}}
    <a class="btn btn-default" href="{{ route('home.index') }}">Wróć</a>
@endsection
