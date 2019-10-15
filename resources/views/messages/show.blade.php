@extends('layouts.admin_app')

@section('content')

<div class="content-label">
	<div class="col-lg-11 col-md-11 col-sm-11 col-xs-12 col-lg-offset-1 col-md-offset-1 col-sm-offset-1">
		<p>Pesan Masuk</p>
	</div>
</div>

<div class="well col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-lg-10 col-md-10 col-sm-10 col-xs-12">
	<table class="message-table">
		<tr>
			<th>Pengirim</th>
			<td>{{ $message->name }}</td>
		</tr>
		<tr>
			<th>E-mail</th>
			<td>{{ $message->email }}</td>
		</tr>
		<tr>
			<th>Dikirim Pada</th>
			<td>{{ date_format(date_create($message->created_at), 'D, d-m-Y, H:i')  }}</td>
		</tr>
		<tr>
			<th>Isi Pesan</th>
			<td>{{ $message->content }}</td>
		</tr>
	</table>
</div>

<div class="clear"></div>

<div class="two-buttons">
	<a href="{{ route('messages.index') }}">
		<button class="main-button">Kembali ke Inbox</button>
	</a>
	<a href="mailto:{{ $message->email }}">
		<button class="main-button">Balas Pesan</button>
	</a>
</div>

@endsection