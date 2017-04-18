@extends('layouts.app')

@section('title', 'Użytkownicy')

@section('content')

    <table class="table table-bordered">
      <th>ID</th>
      <th>Nazwisko</th>
      <th>Imię</th>
      <th>Typ konta</th>
      <th>Email</th>
      <th>Pesel</th>
      <th>Numer telefonu</th>
      <td>Opcje</th>
        @foreach($users as $user)
        <tr>
            <td>{{$user->osoba_id}}</td>
            <td>{{$user->nazwisko}}</td>
            <td>{{$user->imie}}</td>
            <td>{{$user->typKonta["typ"]}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->pesel}}</td>
            <td>{{$user->nr_telefonu}}</td>
            @if($user->zbanowany == 0)
              <td><a href="{{ route('userManagementPanel.blockUser', $user->osoba_id) }}" class="btn btn-danger btn-xs">Zablokuj</a></td>
            @else
              <td><a href="{{ route('userManagementPanel.unblockUser', $user->osoba_id) }}" class="btn btn-warning btn-xs">Odblokuj</a></td>
            @endif

        </tr>
        @endforeach
    </table>
    <div><a href="{{ url('/') }}" type="button" class="btn btn-default">Wróć</a></div>
@endsection
