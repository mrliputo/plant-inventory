@extends('layouts.admin_app')

@section('content')

<div class="content-label">
    <div class="col-lg-11 col-md-11 col-lg-11 col-sm-11 col-xs-12 col-lg-offset-1 col-md-offset-1 col-sm-offset-1">
        <p>Ubah Password</p>
    </div>
</div>

<div class="contact-container col-lg-8 col-md-8 col-sm-8 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offset-2">

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ session('success') }}
        </div>
    @endif

    <div class="setting-section">
        {!! Form::open(['action' => 'Auth\AccountController@changePassword', 'method' => 'POST']) !!}

        <label for="current-password">Password Saat Ini</label>
        <input id="current-password" type="password" name="current-password" placeholder="Password Saat Ini" class="form-control" required>

        @if ($errors->has('current-password'))
        <span class="help-block">
            <strong class="form-error">{{ $errors->first('current-password') }}</strong>
        </span>
        @endif


        <label for="new-password">Password Baru</label>
        <input id="new-password" type="password" name="new-password" placeholder="Password Baru" class="form-control" required>
        
        @if ($errors->has('new-password'))
        <span class="help-block">
            <strong class="form-error">{{ $errors->first('new-password') }}</strong>
        </span>
        @endif

        <label for="new-password-confirm">Konfirmasi Password Baru</label>
        <input id="new-password-confirm" type="password" name="new-password_confirmation" placeholder="Konfirmasi Password Baru" class="form-control" required>
        <p class="pass-unmatch">&zwnj;</p>

        {!! Form::submit('Ubah', ['class' => 'main-submit']) !!}

        {!! Form::close() !!}
    </div>
</div>

@endsection
