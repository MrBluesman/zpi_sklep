@extends('layouts.app')

@section('title', 'Strona główna')

@section('content')

    <a class="btn btn-primary" href="{{ route('artists.index') }}">Artyści</a>

@endsection