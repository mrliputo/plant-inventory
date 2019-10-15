@extends('layouts.guest_app')


@section('content')

<!-- 
Created by Norman Syarif
on 2018-08-09 
-->

<div class="location">
	<div class="location-text col-md-10 col-sm-10 col-xs-12 col-md-offset-1 col-sm-offset-1">
		<h3>Lokasi Pemeliharaan</h3>
		<p>Sebaran lokasi pemeliharaan tanaman yang ada di Taman Hutan Kota Muhammad Sabki Kota Jambi</p>
	</div>
	<div class="location-input col-md-10 col-sm-10 col-xs-12 col-md-offset-1 col-sm-offset-1">
		{!! Form::open(['action' => 'SearchController@returnNonAjaxData', 'method' => 'GET']) !!}
		<input id="q" placeholder="Masukkan nama tanaman..." class="form-control" type="search" name="q" autocomplete="off">
		<button class="submit main-button" type="submit"><i class="glyphicon glyphicon-search"></i></button>
		{!! Form::close() !!}
	</div>
	<div class="clear"></div>
	<div class="results col-md-10 col-sm-10 col-xs-12 col-md-offset-1 col-sm-offset-1">
		<div class="well" style="display: {{  (isset($withSubmit)) ? 'block' : 'none' }}">
			@if(isset($withSubmit))
			@if(count($results) > 0)
			@foreach($results as $result)
			<p><a href="{{ route('showLocation', $result->spesies) }}"><em><strong>{{ $result->spesies }}</strong></em> ({{ $result->nama_lokal }})</a></p>
			@endforeach
			@else
			<p>Pencarian tidak ditemukan.</p>
			@endif
			@endif
		</div>
	</div>

	@if($itemOnMap == 'all' || $itemOnMap == 'selected')
	<div class="location-map col-md-10 col-sm-10 col-xs-12 col-md-offset-1 col-sm-offset-1">
		@if($itemOnMap == 'all')
		<h4>Sebaran lokasi semua tanaman</h4>
		@else
		<h4>Sebaran lokasi tanaman <em>{{ $results[0]['spesies'] }}</em> ({{ $results[0]['nama_lokal'] }})</h4>
		@endif
		<div id="map"></div>
	</div>
	@endif
	
</div>

@endsection


@section('script')

<script type="text/javascript">


	$(document).ready(function() {
		
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
			}
		});

		var currentRequest = null;

		$('#q').keyup(function(e) {
			
			e.preventDefault();
			
			if($('#q').val().length > 1) {

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
							$('.well').css("display", "block");
							result.data.forEach(function(data) {
								var url = "{{ url('location/species') }}/" + encodeURIComponent(data.spesies.trim());

								$('.well').append("<p><a href='" + url + "'><em><strong>" + data.spesies + "</strong></em> (" + data.nama_lokal + ")</a></p>")
							});
						}else{
							$('.well').css("display", "none");
						}
					}
				});
			}else{
				$('.well').css("display", "none");
			}
		});
	});


	@if($itemOnMap == 'all' || $itemOnMap == 'selected')

	/* Map function */
	function initMap() {

		var locations = {!! json_encode($results) !!};
		console.log(locations);

		var map = new google.maps.Map(document.getElementById('map'), {
			zoom: 15,
			center: new google.maps.LatLng(-1.653955, 103.586145),
			mapTypeId: google.maps.MapTypeId.ROADMAP
		});

		var infowindow = new google.maps.InfoWindow();

		var marker, i;

		for (i = 0; i < locations.length; i++) {  
			marker = new google.maps.Marker({
				position: new google.maps.LatLng(locations[i].latitude, locations[i].longitude),
				animation: google.maps.Animation.DROP,
				map: map
			});

			google.maps.event.addListener(marker, 'click', (function(marker, i) {
				return function() {
					infowindow.setContent("<strong><em>" + locations[i].spesies + "</em></strong><br>Nama lokal: " + locations[i].nama_lokal + "<br>No. reg: " + locations[i].id);
					infowindow.open(map, marker);
				}
			})(marker, i));
			
			if(locations[i].latitude == "" || locations[i].latitude == "null" || locations[i].latitude == null) {
				marker.setMap(null);
			}
		}
	}
	
	@endif

</script>

@if($itemOnMap == 'all' || $itemOnMap == 'selected')
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHzEtuVlr36M5MJwT7EtHna7cLFTzDTWs&callback=initMap">
</script>
@endif

@endsection