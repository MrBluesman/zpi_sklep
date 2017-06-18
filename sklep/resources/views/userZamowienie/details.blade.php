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
                <th style="width:15%;"><center>Status</center></th>
                <th style="width:12.5%;">Cena</th>
                <th style="width:12.5%;">Data Utworzenia</th>

            </table>
        </ul>
    </div>
</div>

@endsection
