@extends('layouts.admin_app')

@section('content')

<div class="content-label">
	<div class="col-lg-11 col-md-11 col-sm-11 col-xs-12 col-lg-offset-1 col-md-offset-1 col-sm-offset-1">
		<p>Taksonomi</p>
	</div>
</div>

<div class="form-container col-lg-8 col-md-8 col-sm-8 col-xs-12 col-lg-offset-2 col-sm-offset-2 col-md-offset-2">

	@include('includes.messages')

	<br>

	<form class="form-horizontal">
	<div class="form-group">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label for="species">Nama Ilmiah</label>
			<p class="species-data"><em>{{ $species->spesies }}</em></p>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<label for="nama_lokal">Nama Lokal</label>
			<p class="species-data">{{ $species->nama_lokal }}</p>
		</div>
	</div>
	<div class="form-group">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<label for="genus">Genus</label>
			<p class="species-data"><em>{{ $species->genus }}</em></p>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<label for="famili">Famili</label>
			<p class="species-data">{{ $species->famili }}</p>
		</div>
	</div>
	<div class="form-group">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<label for="ordo">Ordo</label>
			<p class="species-data">{{ $species->ordo }}</p>		
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<label for="kelas">Kelas</label>
			<p class="species-data">{{ $species->kelas }}</p>
		</div>
	</div>
	<div class="form-group">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<label for="divisi">Divisi</label>
			<p class="species-data">{{ $species->divisi }}</p>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<label for="kingdom">Kingdom</label>
			<p class="species-data">{{ $species->kingdom }}</p>
		</div>
	</div>

	<label for="botani" class="species-data-2">Ciri-ciri Botani</label>

	@if(count(unserialize($species->botani)) == 1)
		<p>{{ unserialize($species->botani)[0] }}</p>
	@else
		<ol style="margin-left: 3%">
			@foreach (unserialize($species->botani) as $botani)
				<li>{{ $botani }}</li>
			@endforeach
		</ol>
	@endif

	<label for="syarat_tumbuh" class="species-data-2">Syarat Tumbuh</label>
	@if(count(unserialize($species->syarat_tumbuh)) == 1)
		<p>{{ unserialize($species->syarat_tumbuh)[0] }}</p>
	@else
		<ol style="margin-left: 3%">
			@foreach (unserialize($species->syarat_tumbuh) as $syarat_tumbuh)
				<li>{{ $syarat_tumbuh }}</li>
			@endforeach
		</ol>
	@endif

	<label for="manfaat" class="species-data-2">Manfaat</label>
	@if(count(unserialize($species->manfaat)) == 1)
		<p>{{ unserialize($species->manfaat)[0] }}</p>
	@else
		<ol style="margin-left: 3%">
			@foreach (unserialize($species->manfaat) as $manfaat)
				<li>{{ $manfaat }}</li>
			@endforeach
		</ol>
	@endif

	<label for="image" class="species-data-2">Gambar</label><br />
	<img class="species-data-img" src="/images/species/{{ $species->image }}">

	</form>
</div>

<div class="clear"></div>

@endsection


@section('script')

<script type="text/javascript" src="{{ asset('js/bcralnit.js') }}"></script>

<script type="text/javascript">

	$(document).ready(function() {
		setMaxDate($('#tgl_tanam'));

		$('textarea').bcralnit({
			width: '40px',
			background: '#ececec'
		});

		// Validate the coordinates
		$('#lat').keyup(function() {
			var lat = $(this).val();
			if(!validateLatitude(lat)){
				$('.lat-msg').html('Latitude tidak valid');
			} else {
				$('.lat-msg').html('');
			}
		});

		$('#lng').keyup(function() {
			var lng = $(this).val();
			if(!validateLongitude(lng)){
				$('.lng-msg').html('Longitude tidak valid');
			} else {
				$('.lng-msg').html('');
			}
		});

	});

	function validateLatitude(lat) {
		return isFinite(lat) && Math.abs(lat) <= 90;
	}

	function validateLongitude(lng) {
		return isFinite(lng) && Math.abs(lng) <= 180;
	}

	// This function checks whether the image is selected
	function check_data() {
		var data = [];
		var image = $('#image').val();
		var tgl = $('#tgl_tanam').val();
		var lat = $('#lat').val();
		var lng = $('#lng').val();
		
		if(image == "") data.push('Gambar');
		if(tgl == "") data.push('Tanggal Tanam');
		if(lat == "" || lng == "") data.push('Koordinat Lokasi')

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

	function setMaxDate(element) {
		var today = new Date();
		var dd = today.getDate();
		var mm = today.getMonth()+1;
		var yyyy = today.getFullYear();
		if(dd<10){
			dd='0'+dd
		} 
		if(mm<10){
			mm='0'+mm
		} 

		today = yyyy+'-'+mm+'-'+dd;
		$(element).attr("max", today);
	}

</script>

@endsection