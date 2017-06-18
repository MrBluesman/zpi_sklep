@extends('layouts.app')

@section('title', 'Zamównienie')

@section('content')
{{-- {{ URL::asset('css/table.css'); }} --}}
<h3>Szczegółowe dane zamówienia nr {{$zamowienie['zamowienie_id']}}</h3>
<div class="row">
    <div class="col-sm-8 col-md-8 col-md-offset-2 col-sm-offset-2">
        <ul class="list-group">
            <table class="table table-bordered">
                <th style="width:60%;">Numer zamówienia</th>
                <th style="width:15%;"><center>Status</center></th>
                <th style="width:12.5%;">Cena</th>
                <th style="width:12.5%;">Data Utworzenia</th>
                <th style="width:12.5%;">Zniżka</th>
                <th style="width:12.5%;">Metoda platności</th>

            <tr>
                <td>
                    <strong>{{ $zamowienie['zamowienie_id']}}</strong>
                </td>
                <td><center>
                        @php ($stat = $statusy[$zamowienie['statusId']-1])
                        <span class="badge" style="display:inline;">{{ $stat['statusy'] }} </span>
                    </center>
                </td>
                <td><center><span class="label label-success">{{$zamowienie['cena']}}</span></center></td>
                <td><strong>{{$zamowienie['created_at']}} </strong></td>
                <td><strong>{{$zamowienie['znizka']}} </strong></td>
                <td><strong>{{$zamowienie['metoda_platnosci']}} </strong></td>
            </tr>
            </table>
            <table class="table table-bordered">
                <th style="width:60%;">Numer zamówienia</th>
                <th style="width:15%;"><center>Status</center></th>
                <th style="width:12.5%;">Cena</th>
                <th style="width:12.5%;">Data Utworzenia</th>
                <th style="width:12.5%;">Zniżka</th>
                <th style="width:12.5%;">Metoda platności</th>

                <tr>
                    <td>
                        <strong>{{ $zamowienie['zamowienie_id']}}</strong>
                    </td>
                    <td><center>
                            @php ($stat = $statusy[$zamowienie['statusId']-1])
                            <span class="badge" style="display:inline;">{{ $stat['statusy'] }} </span>
                        </center>
                    </td>
                    <td><center><span class="label label-success">{{$zamowienie['cena']}}</span></center></td>
                    <td><strong>{{$zamowienie['created_at']}} </strong></td>
                    <td><strong>{{$zamowienie['znizka']}} </strong></td>
                    <td><strong>{{$zamowienie['metoda_platnosci']}} </strong></td>
                </tr>
            </table>
        </ul>
    </div>
</div>

@endsection
