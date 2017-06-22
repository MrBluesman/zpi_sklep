@extends('layouts.app')

@section('title', 'Moje zamowienia')

@section('content')
{{-- {{ URL::asset('css/table.css'); }} --}}
<h3>Witaj w moich zamówieniach</h3>
<div class="row">
    <div class="col-sm-8 col-md-8 col-md-offset-2 col-sm-offset-2">
        <ul class="list-group">
            <table class="table table-bordered">
                <th style="width:60%;">Numer zamówienia</th>
                <th style="width:15%;"><center>Status<center></th>
                <th style="width:12.5%;">Cena</th>
                <th style="width:12.5%;">Data Utworzenia</th>
                @foreach($zamowiania as $zamowienie)
                    <tr>
                        <td>
                            <a href="{{ route('userZamowienie.userDetails', $zamowienie) }}">{{ $zamowienie['zamowienie_id']}}</a>
                        </td>
                        <td><center>
                                @php ($stat = $statusy[$zamowienie['statusId']-1])
                                <span class="badge" style="display:inline;">{{ $stat['statusy'] }} </span>
                            </center>
                        </td>
                        <td><center><span class="label label-success">{{$zamowienie['cena']}}</span></center></td>
                        <td><span class="badge">{{$zamowienie['created_at']}} </span></td>
                    </tr>
                @endforeach
            </table>
        </ul>
    </div>
</div>

@endsection
