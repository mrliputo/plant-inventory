@extends('layouts.guest_app')

@section('content')

@if (count($errors) > 0
    && !($errors->has('username') || $errors->has('password')));
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="content-label">
    <div class="col-lg-11 col-md-11 col-sm-11 col-xs-12 col-lg-offset-1 col-md-offset-1 col-sm-offset-1">
        <p>Admin Login</p>
    </div>
</div>

<div class="contact-container col-lg-8 col-md-8 col-sm-8 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offset-2">
    {!! Form::open(['action' => 'Auth\LoginController@showLoginForm', 'method' => 'POST']) !!}

    <label for="username">Username</label>
    {!! Form::text('username', old('username'), ['id' => 'username', 'placeholder' => 'Username', 'class' => 'form-control', 'required', 'autofocus']) !!}

    @if ($errors->has('username'))
    <span class="help-block">
        <strong class="form-error">{{ $errors->first('username') }}</strong>
    </span>
    @endif

    <label for="password">Password</label>
    <input id="password" type="password" name="password" placeholder="Password" class="form-control" required>
    @if ($errors->has('password'))
    <span class="help-block">
        <strong class="form-error">{{ $errors->first('password') }}</strong>
    </span>
    @endif

    {!! Form::submit('Login', ['class' => 'main-submit']) !!}

    {!! Form::close() !!}
</div>

@endsection
