@extends('layouts.app')

@section('title', 'Zarządzanie kodami rabatowymi')

@section('content')

    <table class="table table-bordered">
      <tr>
        <th>Treść</th>
        <th>Zniżka</th>
        <th>Opcje</th>
      </tr>
        @foreach($codes as $code)
        <tr>
            <td>{{$code->tresc}}</td>
            <td>{{$code->znizka * 100}} %</td>
            <td><a href="{{ route('discountCodes.deleteCode', $code->tresc) }}" class="btn btn-danger btn-xs">Usuń</a></td>
        </tr>
        @endforeach
    </table>
    <a href="{{ route('discountCodes.addCode') }}" type="button" class="btn btn-primary">Dodaj kod</a>
    <a href="{{ url('/') }}" type="button" class="btn btn-default">Wróć</a>

@endsection
