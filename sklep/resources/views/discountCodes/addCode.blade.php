@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dodawanie kodu rabatowego</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('discountCodes.saveCode') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('tresc') ? ' has-error' : '' }}">
                            <label for="tresc" class="col-md-4 control-label">Treść kodu</label>

                            <div class="col-md-6">
                                <input id="tresc" type="text" class="form-control" name="tresc" value="{{ old('tresc') }}" required autofocus>

                                @if ($errors->has('tresc'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tresc') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('znizka') ? ' has-error' : '' }}">
                            <label for="znizka" class="col-md-4 control-label">Wartość zniżki</label>

                            <div class="col-md-6">
                                <input id="znizka" type="text" class="form-control" name="znizka" value="{{ old('znizka') }}" required autofocus>

                                @if ($errors->has('znizka'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('znizka') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Dodaj
                                </button>

                                  <a class="btn btn-secondary" href="{{ route('discountCodes.index') }}">
                                    Wróć
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
