@extends('layouts.app')

@section('title', 'Zarządzanie kodami rabatowymi')

@section('content')

    <table class="table table-bordered">
      <tr>
        <th>Treść</th>
        <th>Zniżka</th>
        <th>Opcje</th>
      </tr>

    </table>
    <a href="{{ route('discountCodes.addCode') }}" type="button" class="btn btn-primary">Dodaj kod</a>
    <a href="{{ url('/') }}" type="button" class="btn btn-default">Wróć</a>

@endsection
