@extends('layouts.guest_app')

@section('content')

<div class="error-msg">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">
			<img src="/images/404.png">
			<p class="error-text">Ups! Halaman tidak ditemukan.</p>
			<a href="javascript:history.back()"><button class="main-button">Kembali</button></a>
		</div>
	</div>
</div>

@endsection
