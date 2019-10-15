@extends('layouts.guest_app')

@section('content')

<div class="content-label">
	<div class="col-lg-11 col-md-11 col-sm-11 col-xs-12 col-lg-offset-1 col-md-offset-1 col-sm-offset-1">
		<p>Hubungi Kami</p>
	</div>
</div>

<div class="contact-container col-lg-8 col-md-8 col-sm-8 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offset-2">
	@include('includes.messages')
	{!! Form::open(['action' => 'MessagesController@store', 'method' => 'POST']) !!}

	<label for="name">Nama Lengkap</label>
	{!! Form::text('name', '', ['id' => 'name', 'placeholder' => 'Nama Lengkap', 'class' => 'form-control', 'required']) !!}

	<label for="email">Email</label>
	{!! Form::email('email', '', ['id' => 'email', 'placeholder' => 'Email', 'class' => 'form-control', 'required']) !!}

	<label for="message">Isi Pesan</label>
	{!! Form::textarea('content', '', ['id' => 'message', 'placeholder' => 'Isi Pesan', 'class' => 'form-control', 'required']) !!}
	
	{!! Form::submit('Kirim', ['class' => 'main-submit']) !!}
	{!! Form::close() !!}
</div>

@endsection