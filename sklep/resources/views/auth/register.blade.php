@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Rejestracja</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}


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
                          <label class="col-md-6 control-label">Dane</label>

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


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
