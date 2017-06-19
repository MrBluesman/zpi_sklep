@extends('layouts.app')

@section('title', 'Zamównienie')

@section('content')
{{-- {{ URL::asset('css/table.css'); }} --}}
<h3>Szczegółowe dane zamówienia nr {{$zamowienie['zamowienie_id']}}</h3>
<div class="row">
    <div class="col-sm-8 col-md-8 col-md-offset-2 col-sm-offset-2">
        <ul class="list-group">
            <table class="table table-bordered">
                <th style="width:10%;">Id zamówienia</th>
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
                <th style="width:10%;">Pozycje Zamówienia</th>
                <th style="width:10%;">Id płyty</th>
                <th style="width:15%;"><center>Nazwa Plyty</center></th>
                <th style="width:12.5%;">Artysta</th>
                <th style="width:12.5%;">Data wydania</th>
                <th style="width:12.5%;">Ilość</th>
                @php ($int = 1)
                @foreach($pozycjezam as $zam)
                <tr>
                    <td>
                        <strong>{{ $int}}</strong>
                        @php ($int++)
                    </td>
                    <td><center><strong>{{$zam->album['plyta_id']}}</strong></center></td>
                    <td><center>
                            <span class="badge" style="display:inline;">{{ $zam->album['tytul'] }} </span>
                        </center>
                    </td>
                    <td><center><strong>{{$zam->album->artist['nazwa']}}</strong></center></td>
                    <td><center><strong>{{$zam->album['data_wydania']}}</strong></center></td>
                    <td><center><strong>{{$zam['ilosc']}} </strong></center></td>

                </tr>
                @endforeach
            </table>
            <table class="table table-bordered">
                <th style="width:10%;">Miasto</th>
                <th style="width:15%;"><center>Kod Pocztowy</center></th>
                <th style="width:12.5%;">Ulica</th>
                <th style="width:12.5%;">Nr Domu</th>
                <th style="width:12.5%;">Nr mieszkania</th>
                    <tr>
                        <td><strong>{{ $adres['miasto']}}</strong></td>
                        <td><center><span class="badge" style="display:inline;">{{ $adres['kod_pocztowy'] }} </span></center></td>
                        <td><center><strong>{{$adres['ulica']}}</strong></center></td>
                        <td><center><strong>{{$adres['nr_domu']}}</strong></center></td>
                        <td><center><strong>{{$adres['nr_mieszkania']}} </strong></center></td>

                    </tr>
            </table>
            <form action="{{route('pracZamowienie.pracZmienStatus', $zamowienie)}}" method="post" >
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group ">
                    <label class="control-label " for="status">
                        Zmień status
                    </label>
                    <select class="select form-control" id="status" name="status" >
                        @foreach($statusy as $status)
                                <option value="{{$status['statusy_id']}}">
                                    {{$status['statusy']}}
                                </option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-primary " name="submit" type="submit">
                    Zmień Status
                </button>
            </form>

        </ul>
    </div>
</div>

@endsection
