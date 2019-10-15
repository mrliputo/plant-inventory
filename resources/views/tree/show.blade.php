@extends('layouts.species_app')

@section('content')

<div class="content-label label-tab">
	<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 col-lg-offset-1 col-md-offset-1 col-sm-offset-1">
		<p id="tab-label">Foto <em>{{ $tree->species->spesies }}</em></p>
	</div>

	@if(Auth::check())
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 top-button tab-button print-button pull-right">
		<a href="{{ route('generateQrcode', $tree->id) }}" target="__blank">
			<button class="main-button">Cetak QRCode</button>
		</a>
	</div>
	@endif
	
</div>

<div id="foto" class="col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-lg-8 col-md-8 col-sm-8 col-xs-12 tabcontent">
	<img class="species-img" src="/images/species/{{ $tree->species->image }}">
	<div class="clear"></div>
	<div class="location-map species-map">
		<h4>Sebaran lokasi <em>{{ $tree->species->spesies }}</em></h4>
		<div class="species-page-map" id="map"></div>
	</div>
	<div style="margin-top: 20px">
		<a href="{{ route('showLocationSearchPage') }}"><button class="main-button col-md-6 col-sm-6 col-xs-12 col-md-offset-3 col-sm-offset-3">Cari lokasi tanaman lain</button></a>
	</div>
</div>

<div id="taksonomi" class="col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-lg-8 col-md-8 col-sm-8 col-xs-12 tabcontent">
	<div class="taksonomi well col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-lg-10 col-md-10 col-sm-10 col-xs-12">
		<table class="classification-table">
			<tr>
				<th>No. Registrasi</th>
				<td>{{ $tree->id }}</td>
			</tr>
			<tr>
				<th>Nama Lokal</th>
				<td>{{ $tree->species->nama_lokal }}</td>
			</tr>
			<tr>
				<th>Nama Ilmiah</th>
				<td class="desc-value-scientific">{{ $tree->species->spesies }}</td>
			</tr>
			<tr>
				<th>Genus</th>
				<td class="desc-value-scientific">{{ $tree->species->genus }}</td>
			</tr>
			<tr>
				<th>Famili</th>
				<td>{{ $tree->species->famili }}</td>
			</tr>
			<tr>
				<th>Ordo</th>
				<td>{{ $tree->species->ordo }}</td>
			</tr>
			<tr>
				<th>Kelas</th>
				<td>{{ $tree->species->kelas }}</td>
			</tr>
			<tr>
				<th>Divisi</th>
				<td>{{ $tree->species->divisi }}</td>
			</tr>
			<tr>
				<th>Kingdom</th>
				<td>{{ $tree->species->kingdom }}</td>
			</tr>
			<tr>
				<th>Umur</th>
				<td>{{ $age }}</td>
			</tr>
			<tr>
				<th>Latitude</th>
				@if($tree->latitude != "")
				<td>{{ $tree->latitude }}°</td>
				@else
				<td>-</td>
				@endif
			</tr>
			<tr>
				<th>Longitude</th>
				@if($tree->longitude != "")
				<td>{{ $tree->longitude }}°</td>
				@else
				<td>-</td>
				@endif
			</tr>
		</table>
	</div>
</div>

<div id="ciri-ciri_botani" class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-lg-10 col-md-10 col-sm-10 col-xs-12 tabcontent">
	<div class="well col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-lg-10 col-md-10 col-sm-10 col-xs-12">
		@if(count(unserialize($tree->species->botani)) == 1)
		<p>{{ unserialize($tree->species->botani)[0] }}</p>
		@else
		<ol>
			@foreach (unserialize($tree->species->botani) as $botani)
			<li>{{ $botani }}</li>
			@endforeach
		</ol>
		@endif
	</div>
</div>

<div id="syarat_tumbuh" class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-lg-10 col-lg-10 col-md-10 col-sm-10 col-xs-12 tabcontent">
	<div class="well col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-lg-10 col-md-10 col-sm-10 col-xs-12">
		@if(count(unserialize($tree->species->syarat_tumbuh)) == 1)
		<p>{{ unserialize($tree->species->syarat_tumbuh)[0] }}</p>
		@else
		<ol>
			@foreach (unserialize($tree->species->syarat_tumbuh) as $syarat_tumbuh)
			<li>{{ $syarat_tumbuh }}</li>
			@endforeach
		</ol>
		@endif
	</div>
</div>

<div id="manfaat" class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-lg-10 col-md-10 col-sm-10 col-xs-12 tabcontent">
	<div class="well col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-lg-10 col-md-10 col-sm-10 col-xs-12">
		@if(count(unserialize($tree->species->manfaat)) == 1)
		<p>{{ unserialize($tree->species->manfaat)[0] }}</p>
		@else
		<ol>
			@foreach (unserialize($tree->species->manfaat) as $manfaat)
			<li>{{ $manfaat }}</li>
			@endforeach
		</ol>
		@endif
	</div>
</div>

<div class="clear"></div>

@endsection


@section('script')

<script type="text/javascript">
	$(document).ready(function() {
		document.getElementById("foto").style.display = "block";
	});

	function initMap() {

		var locations ={!! json_encode($locations) !!};
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
		
		    if(locations[i].latitude == "null" 
		        || locations[i].latitude == ""
		        || locations[i].latitude == null) {
			    marker.setMap(null);
			}
		    
		    
		}
	}

	function openContent(evt, tabId) {
		var i, tabcontent, tablinks;
		tabcontent = document.getElementsByClassName("tabcontent");
		for (i = 0; i < tabcontent.length; i++) {
			tabcontent[i].style.display = "none";
		}
		tablinks = document.getElementsByClassName("tablinks");
		for (i = 0; i < tablinks.length; i++) {
			tablinks[i].className = tablinks[i].className.replace(" tab-active", "");
		}
		document.getElementById(tabId).style.display = "block";

		var labeltext = tabId.replace('_', ' ').replace(/(?:^|\s)\S/g, function(a) { return a.toUpperCase(); });

		document.getElementById("tab-label").innerHTML = labeltext + ' <em>{{ $tree->species->spesies }}</em>';
		evt.currentTarget.className += " tab-active";
	}
</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHzEtuVlr36M5MJwT7EtHna7cLFTzDTWs&callback=initMap">
</script>

@endsection