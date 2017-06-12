@extends('layouts.app')

@section('title', 'Zatrudnianie nowego pracownika')

@section('content')
    {{--<form action="{{route('artists.saveArtist')}}" method="POST">--}}
        {{--<input type="hidden" name="_token" value="{{csrf_token()}}">--}}
        {{--<div class="form-group">--}}
            {{--<input type="text" name="nazwa" class="form-control" placeholder="Podaj nazwę artysty/zespołu">--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--<textarea name="opis" class="form-control" placeholder="Podaj opis artysty"></textarea>--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--<button class="btn btn-primary">Zapisz i dodaj</button>--}}
            {{--<a href="{{ route('artists.index') }}" type="button" class="btn btn-default">Wróć</a>--}}
        {{--</div>--}}
    {{--</form>--}}
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Zatrudnianie nowego pracownika</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('pracManagementPanel.save') }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label class="col-md-8 control-label">E-mail i hasło:</label>

                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Hasło</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">Potwierdź hasło</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-8 control-label">Dane osobowe:</label>

                            </div>

                            <div class="form-group{{ $errors->has('imie') ? ' has-error' : '' }}">
                                <label for="imie" class="col-md-4 control-label">Imię</label>

                                <div class="col-md-6">
                                    <input id="imie" type="text" class="form-control" name="imie" value="{{ old('imie') }}" required autofocus>

                                    @if ($errors->has('imie'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('imie') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('nazwisko') ? ' has-error' : '' }}">
                                <label for="nazwisko" class="col-md-4 control-label">Nazwisko</label>

                                <div class="col-md-6">
                                    <input id="nazwisko" type="text" class="form-control" name="nazwisko" value="{{ old('nazwisko') }}" required autofocus>

                                    @if ($errors->has('nazwisko'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('nazwisko') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('pesel') ? ' has-error' : '' }}">
                                <label for="pesel" class="col-md-4 control-label">Pesel</label>

                                <div class="col-md-6">
                                    <input id="pesel" type="text" class="form-control" name="pesel" value="{{ old('pesel') }}" required autofocus>

                                    @if ($errors->has('pesel'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('pesel') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('nr_telefonu') ? ' has-error' : '' }}">
                                <label for="nr_telefonu" class="col-md-4 control-label">Numer telefonu</label>

                                <div class="col-md-6">
                                    <input id="nr_telefonu" type="text" class="form-control" name="nr_telefonu" value="{{ old('nr_telefonu') }}" required autofocus>

                                    @if ($errors->has('nr_telefonu'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('nr_telefonu') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-6">
                                    <button type="submit" class="btn btn-primary">
                                        Zatrudnij
                                    </button>
                                    <a href="{{ route('pracManagementPanel.index') }}" type="button" class="btn btn-default">Wróć</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection