@extends('layouts.app')

@section('title', 'Dodawanie artysty')

@section('content')
    <form action="{{route('artists.updateArtist', $artist)}}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            @if(old('nazwa')=='')
             <input type="text" name="nazwa" class="form-control" placeholder="Podaj nazwę artysty/zespołu" value="{{ $artist->nazwa }}">
            @else
                <input type="text" name="nazwa" class="form-control" placeholder="Podaj nazwę artysty/zespołu" value="{{ old('nazwa') }}">
            @endif
        </div>
        <div class="form-group">
            @if(old('opis')=='')
                <textarea name="opis" class="form-control" placeholder="Podaj opis artysty">{{ $artist->opis }}</textarea>
            @else
                <textarea name="opis" class="form-control" placeholder="Podaj opis artysty">{{ old('opis') }}</textarea>
            @endif
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Edytuj</button>
            <a href="{{ route('artists.index') }}" type="button" class="btn btn-default">Wróć</a>
        </div>
    </form>
@endsection