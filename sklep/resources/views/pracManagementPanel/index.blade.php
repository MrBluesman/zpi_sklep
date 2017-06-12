@extends('layouts.app')

@section('title', 'Użytkownicy')

@section('content')

    <table class="table table-bordered">
      <th>ID</th>
      <th>Nazwisko</th>
      <th>Imię</th>
      {{--<th>Typ konta</th>--}}
      <th>Email</th>
      <th>Pesel</th>
      <th>Numer telefonu</th>
      <td>Opcje</th>
        @foreach($users as $user)
        <tr>
            <td>{{$user->osoba_id}}</td>
            <td>{{$user->nazwisko}}</td>
            <td>{{$user->imie}}</td>
            {{--<td>{{$user->typKonta["typ"]}}</td>--}}
            <td>{{$user->email}}</td>
            <td>{{$user->pesel}}</td>
            <td>{{$user->nr_telefonu}}</td>
            <td>
                {{--{{ dd($user) }}--}}
                <a href="{{ route('pracManagementPanel.edit', $user->osoba_id) }}" class="btn btn-primary btn-xs">Edytuj</a>
              {{--<a href="{{ route('pracManagementPanel.destroy', $user->osoba_id) }}" class="btn btn-danger btn-xs">Zwolnij</a>--}}
                <form class="form-horizontal" role="form" method="POST" action="{{ route('pracManagementPanel.destroy', $user->osoba_id) }}">
                    <input name="_method" type="hidden" value="DELETE">
                    {{ csrf_field() }}
                    {{--<div class="form-group">--}}
                        {{--<div class="col-md-6 col-md-offset-4">--}}
                            <button type="submit" class="btn btn-danger btn-xs">
                                Zwolnij
                            </button>
                        {{--</div>--}}
                    {{--</div>--}}
                </form>
            </td>

        </tr>
        @endforeach
    </table>
    <a href="{{ route('pracManagementPanel.add') }}" type="button" class="btn btn-primary">Zatrudnij nowego pracownika</a>
    <a href="{{ url('/') }}" type="button" class="btn btn-default">Wróć</a>
@endsection
