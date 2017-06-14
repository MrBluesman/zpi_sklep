@extends('layouts.app')

@section('title', 'Strona główna')


@section('content')

    {{--{{ Auth::user()->hasRole('prac') }}--}}
    <a class="btn btn-primary" href="{{ route('artists.index') }}">Artyści</a>
    <a class="btn btn-primary" href="{{ route('albums.index') }}">Albumy</a>
    <a class="btn btn-primary" href="{{ route('discountCodes.index') }}">Kody rabatowe</a>
    {{--<a class="btn btn-primary" href="{{ route('userManagementPanel.index') }}">Zarządzanie użytkownikami</a>--}}
@endsection
