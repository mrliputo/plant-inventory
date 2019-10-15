@extends('layouts.admin_app')

@section('content')

<div class="content-label">
	<div class="col-lg-11 col-md-11 col-sm-11 col-xs-12 col-lg-offset-1 col-md-offset-1 col-sm-offset-1">
		<p>Tambah Spesies</p>
	</div>
</div>

<div class="form-container col-lg-8 col-md-8 col-sm-8 col-xs-12 col-lg-offset-2 col-sm-offset-2 col-md-offset-2">

	@include('includes.messages')

	<br>

	{!! Form::open(['onsubmit' => 'return check_data()', 'action' => 'SpeciesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal']) !!}
	<div class="form-group">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label for="species">Nama Ilmiah</label>
			{!! Form::text('spesies', '', ['id' => 'species' , 'placeholder' => 'Nama Ilmiah', 'class' => 'form-control', 'required']) !!}
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<label for="nama_lokal">Nama Lokal</label>
			{!! Form::text('nama_lokal', '', ['id' => 'nama_lokal', 'placeholder' => 'Nama Lokal', 'class' => 'form-control', 'required']) !!}	
		</div>
	</div>
	<div class="form-group">
		
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<label for="genus">Genus</label>
			{!! Form::text('genus', '', ['id' => 'genus', 'placeholder' => 'Genus', 'class' => 'form-control', 'required']) !!}
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<label for="famili">Famili</label>
			{!! Form::text('famili', '', ['id' => 'famili', 'placeholder' => 'Famili', 'class' => 'form-control', 'required']) !!}
		</div>
	</div>
	<div class="form-group">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<label for="ordo">Ordo</label>
			{!! Form::text('ordo', '', ['id' => 'ordo', 'placeholder' => 'Ordo', 'class' => 'form-control', 'required']) !!}			
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<label for="kelas">Kelas</label>
			{!! Form::text('kelas', '', ['id' => 'kelas', 'placeholder' => 'Kelas', 'class' => 'form-control', 'required']) !!}	
		</div>
	</div>
	<div class="form-group">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<label for="divisi">Divisi</label>
			{!! Form::text('divisi', '', ['id' => 'divisi', 'placeholder' => 'Divisi', 'class' => 'form-control', 'required']) !!}
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<label for="kingdom">Kingdom</label>
			{!! Form::select('kingdom', ['Plantae' => 'Plantae', 'Fungi' => 'Fungi'], 'Plantae', ['id' => 'kingdom', 'class' => 'form-control', 'required']) !!}
		</div>
	</div>

	<label for="botani">Ciri-ciri Botani</label>
	{!! Form::textarea('botani', '', ['id' => 'botani', 'placeholder' => 'Ciri-ciri Botani', 'class' => 'form-control mb-13', 'required']) !!}

	<label for="syarat_tumbuh">Syarat Tumbuh</label>
	{!! Form::textarea('syarat_tumbuh', '', ['id' => 'syarat_tumbuh', 'placeholder' => 'Syarat Tumbuh', 'class' => 'form-control mb-13', 'required']) !!}

	<label for="manfaat">Manfaat</label>
	{!! Form::textarea('manfaat', '', ['id' => 'manfaat', 'placeholder' => 'Manfaat', 'class' => 'form-control mb-13', 'required']) !!}

	<label for="image">Upload Gambar</label>
	{!! Form::file('image', ['id' => 'image']) !!}
	<p class="image-note">Recommended size: ~1000x700 pixels, < 2MB</p>

	{!! Form::submit('Simpan', ['class' => 'main-submit']) !!}
	{!! Form::close() !!}
</div>

<div class="clear"></div>

@endsection


@section('script')

<script type="text/javascript" src="{{ asset('js/bcralnit.js') }}"></script>

<script type="text/javascript">

	$(document).ready(function() {

		$('textarea').bcralnit({
			width: '40px',
			background: '#ececec'
		});

	});

	// This function checks whether the image is selected
	function check_data() {
		var data = [];
		var image = $('#image').val();
		
		if(image == "") data.push('Gambar');

		if (data.length != 0) {
			var msg = "Anda belum mengisi data berikut:\n";

			for (i = 0; i < data.length; i++) { 
				msg += "- " + data[i] + "\n";
			}

			msg += "\nLanjutkan?";

			if(confirm(msg)) return true;
			else return false;

		}else return true;
	}

</script>

@endsection