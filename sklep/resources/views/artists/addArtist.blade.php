@extends('layouts.app')

@section('title', 'Dodawanie artysty')

@section('content')
    <form action="{{route('artists.saveArtist')}}" method="POST">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
            <input type="text" name="nazwa" class="form-control" placeholder="Podaj nazwę artysty/zespołu">
        </div>
        <div class="form-group">
            <textarea name="opis" class="form-control" placeholder="Podaj opis artysty"></textarea>
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Zapisz i dodaj</button>
            <a href="{{ route('artists.index') }}" type="button" class="btn btn-default">Wróć</a>
        </div>
    </form>
@endsection