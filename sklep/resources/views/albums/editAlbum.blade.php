@extends('layouts.app')


@section('title', 'Edycja plyty')

@section('content')

    <div class="bootstrap-iso">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <form action="{{route('albums.change', $album)}}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group ">
                            <label class="control-label " for="tytul">
                                Tytuł płyty
                            </label>
                            <input class="form-control" id="tytul" name="tytul" type="text" value="{{$album->tytul}}"/>
                        </div>
                        <div class="form-group ">
                            <label class="control-label " for="rok">
                                Rok powstania albumu
                            </label>
                            <input class="form-control" id="rok" name="rok" placeholder="YYYY" type="text" value="{{$album->rok}}"/>
                        </div>
                        <div class="form-group ">
                            <label class="control-label " for="data_wydania">
                                Rok wydania płyty
                            </label>
                            <input class="form-control" id="data_wydania" name="data_wydania" placeholder="YYYY" type="text" value="{{$album->data_wydania}}"/>
                        </div>
                        <div class="form-group ">
                            <label class="control-label " for="cena_fizyczna">
                                Cena fizyczna
                            </label>
                            <input class="form-control" id="cena_fizyczna" name="cena_fizyczna" type="text" value="{{$album->cena_fizyczna}}"/>
                        </div>
                        <div class="form-group ">
                            <label class="control-label " for="cena_cyfrowa">
                                Cena elektroniczna
                            </label>
                            <input class="form-control" id="cena_cyfrowa" name="cena_cyfrowa" type="text" value="{{$album->cena_cyfrowa}}"/>
                        </div>
                        <div class="form-group ">
                            <label class="control-label " for="dostepnosc">
                                Ilość egzemplarzy
                            </label>
                            <input class="form-control" id="dostepnosc" name="dostepnosc" type="text" value="{{$album->	dostepnosc}}"/>
                        </div>
                        <div class="form-group ">
                            <label class="control-label " for="artystaid">
                                Artysta
                            </label>
                            <select class="select form-control" id="artystaid" name="artystaid" value="{{$album->artystaid}}">
                                <option  value="{{$album->artystaId}}"> {{$album->artist['nazwa']}} </option>
                                @foreach($artists as $artist)
                                    @if ($album->artystaId == $artist->artysta_id)
                                    @else
                                        <option value="{{$artist->artysta_id}}">
                                            {{$artist->nazwa}}
                                        </option>
                                    @endif

                                @endforeach
                            </select>
                        </div>
                        <div class="form-group ">
                            <label class="control-label " for="gatunekid">
                                Gatunek
                            </label>
                            <select class="select form-control" id="gatunekid" name="gatunekid">
                                <option  value="{{$album->gatunekId}}"> {{$album->type['nazwa']}} </option>
                                @foreach($types as $type)
                                    @if ($album->gatunekId == $type->gatunek_id)
                                    @else
                                        <option value="{{$type->gatunek_id}}">
                                            {{$type->nazwa}}
                                        </option>
                                    @endif

                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="plik">
                                <input type="file" id="plik" name="plik" >
                            </label>
                        </div>
                        <div class="form-group">
                            <div>
                                <button class="btn btn-primary " name="submit" type="submit">
                                    Edytuj
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
