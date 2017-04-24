@extends('layouts.app')


@section('title', 'Dodawanie płyty')

@section('content')

    <div class="bootstrap-iso">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <form action="{{route('albums.save')}}" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group ">
                            <label class="control-label " for="tytul">
                                Tytuł płyty
                            </label>
                            <input class="form-control" id="tytul" name="tytul" type="text"/>
                        </div>
                        <div class="form-group ">
                            <label class="control-label " for="rok">
                                Rok powstania albumu
                            </label>
                            <input class="form-control" id="rok" name="rok" placeholder="YYYY" type="text"/>
                        </div>
                        <div class="form-group ">
                            <label class="control-label " for="data_wydania">
                                Rok wydania płyty
                            </label>
                            <input class="form-control" id="data_wydania" name="data_wydania" placeholder="YYYY" type="text"/>
                        </div>
                        <div class="form-group ">
                            <label class="control-label " for="cena_fizyczna">
                                Cena fizyczna
                            </label>
                            <input class="form-control" id="cena_fizyczna" name="cena_fizyczna" type="text"/>
                        </div>
                        <div class="form-group ">
                            <label class="control-label " for="cena_cyfrowa">
                                Cena elektroniczna
                            </label>
                            <input class="form-control" id="cena_cyfrowa" name="cena_cyfrowa" type="text"/>
                        </div>
                        <div class="form-group ">
                            <label class="control-label " for="dostepnosc">
                                Ilość egzemplarzy
                            </label>
                            <input class="form-control" id="dostepnosc" name="dostepnosc" type="text"/>
                        </div>
                        <div class="form-group ">
                            <label class="control-label " for="artystaid">
                                Artysta
                            </label>
                            <select class="select form-control" id="artystaid" name="artystaid">
                                @foreach($artists as $artist)
                                    <option value="{{$artist->artysta_id}}">
                                        {{$artist->nazwa}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group ">
                            <label class="control-label " for="gatunekid">
                                Gatunek
                            </label>
                            <select class="select form-control" id="gatunekid" name="gatunekid">
                                @foreach($types as $type)
                                    <option value="{{$type->gatunek_id}}">
                                        {{$type->nazwa}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <div>
                                <button class="btn btn-primary " name="submit" type="submit">
                                    Dodaj
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


