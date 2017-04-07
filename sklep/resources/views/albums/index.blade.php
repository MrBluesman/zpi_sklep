@extends('layouts.app')

@section('title', 'Płyty')

@section('content')
{{-- {{ URL::asset('css/table.css'); }} --}}

<table class="table table-bordered">
  @foreach($albums as $album)
  @if(($loop->index) % 2 == 0)
  <tr>
    @endif<td> OKLADKA </td>
    <td>
<table class="table table-bordered">
        <tr><td>{{$album->tytul}} ({{$album->rok}})</td></tr>
        <tr><td>{{$album->artist['nazwa']}}</td></tr>
        <tr><td>MP3: {{$album->cena_cyfrowa}} PLN</td></tr>
        <tr><td>CD: {{$album->cena_fizyczna}} PLN</td></tr>
    </table>
        </td>
    @if(($loop->index) % 2 == 1)
  </tr>
  @endif
  @endforeach
</table>
<div><a href="{{ url('/') }}" type="button" class="btn btn-default">Wróć</a></div>


@endsection
