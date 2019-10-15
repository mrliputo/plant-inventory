@extends('layouts.admin_app')

@section('content')

<div class="content-label">
	<div class="col-lg-11 col-md-11 col-sm-11 col-xs-12 col-lg-offset-1 col-md-offset-1 col-sm-offset-1">
		<p>Tambah Tanaman</p>
	</div>
</div>

<div class="form-container col-lg-8 col-md-8 col-sm-8 col-xs-12 col-lg-offset-2 col-sm-offset-2 col-md-offset-2">

	@include('includes.messages')

	<br>

	<div class="location-input col-md-12 col-sm-12 col-xs-12" style="padding: 0">
		<input id="q" placeholder="Ketikkan nama lokal atau ilmiah tanaman" class="form-control" type="search" name="q" autocomplete="off">
		<button class="submit main-button" id="find-btn">Cek</button>
	</div>

	{!! Form::open(['onsubmit' => 'return check_data()', 'action' => 'TreeController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal']) !!}
	<input type="hidden" id="species_id" name="species_id" required>

	<div class="form-group">
		<div class="results col-md-12 col-sm-12 col-xs-12">
			<div class="well" style="display: {{  (isset($withSubmit)) ? 'block' : 'none' }}"></div>
		</div>
	</div>

	<div class="form-group">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<label for="tgl_tanam">Nomor Registrasi</label>
			{!! Form::text('id', '', ['required', 'disabled', 'id' => 'id', 'placeholder' => 'Nomor Registrasi', 'class' => 'form-control']) !!}
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<label for="tgl_tanam">Tanggal Tanam</label>
			{!! Form::date('tgl_tanam', '', ['disabled', 'id' => 'tgl_tanam', 'placeholder' => 'Tanggal Tanam', 'class' => 'form-control']) !!}
		</div>
	</div>

	<label for="kelas">Koordinat Lokasi</label>
	<div class="form-group">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			{!! Form::number('lat', '', ['disabled', 'id' => 'lat', 'min' => '-90', 'max' => '90', 'step' => '0.00000001', 'placeholder' => 'Latitude', 'class' => 'form-control']) !!}
			<p class="lat-msg input-error"></p>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			{!! Form::number('lng', '', ['disabled', 'id' => 'lng', 'min' => '-180', 'max' => '180', 'step' => '0.00000001', 'placeholder' => 'Longitude', 'class' => 'form-control']) !!}
			<p class="lng-msg input-error"></p>
		</div>
	</div>

	{!! Form::submit('Simpan', ['disabled', 'id' => 'form-submit', 'class' => 'main-submit']) !!}
	{!! Form::close() !!}
</div>

<div class="clear"></div>

@endsection


@section('script')

<script type="text/javascript">

	function clickOnSpeciesId(id, name) {
		$('#species_id').val(id);
		$('#q').val(name);
		$('#id').prop("disabled", false);
		$('#lat').prop("disabled", false);
		$('#lng').prop("disabled", false);
		$('#tgl_tanam').prop("disabled", false);
		$('#form-submit').prop("disabled", false);
		$('.well').html('<p style="color: green">Spesies tersedia. <a target="_blank" href="/species/'+ id +'/edit" style="color: green"><u>Edit taksonomi.</u></a></p>');
	}

	function disableAll() {
		$('#species_id').val('');
		$('.well').html('');
		$('#id').prop("disabled", true);
		$('#lat').prop("disabled", true);
		$('#lng').prop("disabled", true);
		$('#tgl_tanam').prop("disabled", true);
		$('#form-submit').prop("disabled", true);
	}

	$(document).ready(function() {
		setMaxDate($('#tgl_tanam'));


		// AJAX

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
			}
		});

		var currentRequest = null;
		
		$('#find-btn').click(function(e) {
			e.preventDefault();

			if($('#species_id').val() != "") {
				disableAll();
			}

			if($('#q').val().length > 1) {

				$('.well').css("display", "block");
				$('.well').html('Mencari. Harap tunggu...');
				currentRequest = $.ajax({
					url: "{{ url('/location/get_ajax') }}",
					method: "get",
					data: {
						q: $('#q').val()
					},
					beforeSend: function() {
						if(currentRequest != null) {
							currentRequest.abort();
						}
					},
					success: function(result) {
						$('.well').html('');
						if(!$.isEmptyObject(result.data)) {
							result.data.forEach(function(data) {
								var id = data.id;

								$('.well').append("<p><a onclick=\"clickOnSpeciesId(\'"+ id +"\', \'"+ data.spesies +"\')\" href=\"javascript:void(0)\"><em><strong>" + data.spesies + "</strong></em> (" + data.nama_lokal + ")</a></p>")
							});
						}else{
							$('.well').html('<p style="color: red">Spesies tidak ditemukan. <a target="_blank" href="{{ route('species.create') }}" style="color: red"><u>Tambah.</u></a></p>');
						}
					}
				});
			}else{
				$('.well').css("display", "none");
			}
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

		// ./ End of validate coordinates

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
		var tgl = $('#tgl_tanam').val();
		var lat = $('#lat').val();
		var lng = $('#lng').val();
		
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