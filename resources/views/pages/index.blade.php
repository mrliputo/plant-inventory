@extends('layouts.guest_app')


@section('content')

<div class="home-images">
	<div class="scanner-div col-lg-5 col-md-5 col-sm-5">
		<div class="scanner">
			<div class="text-div">
				<p>Gunakan teknologi QR code untuk mengakses informasi detail tanaman di Taman Hutan
				Kota M Sabki. <a class="home-link" href="{{ url('/read/pemanfaatan-qrcode') }}">Selengkapnya...</a></p>
				<a href="{{ url('/files/Plant-0.2.apk') }}"><button class="main-button little-margin-bottom">Download QR Code Reader</button></a>
			</div>
		</div>
	</div>
	<div class="slideshow-div col-lg-7 col-md-7 col-sm-7">

		<div id="myCarousel" class="carousel slide" data-ride="carousel">

			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
			</ol>

			<div class="carousel-inner">

				@if(count($trees) > 0)
				@foreach($trees as $key => $tree)
				<div class="item{{ $key == 0 ? " active" : "" }}">
					<a href="{{ route('tree.show', $tree->id) }}">
						<img class="ss-im" src="/images/species/thumbs/{{ $tree->species->image }}" alt="{{ $tree->species->spesies }}">
						<div class="carousel-caption">
							<h3><em>{{ $tree->species->spesies }}</em></h3>
						</div>	
					</a>
				</div>
				@endforeach
				@endif

			</div>

			<a class="left carousel-control" href="#myCarousel" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
				<span class="sr-only">Next</span>
			</a>
			
		</div>

	</div>
</div>

<div class="clear"></div>

<div class="home-text">
	<p>Sistem Informasi Inventarisasi Tanaman merupakan aplikasi basis data untuk mengolah
	data tanaman koleksi Taman Hutan Kota Muhammad Sabki Kota Jambi. Taman Hutan Kota Muhammad Sabki adalah salah satu ruang terbuka hijau di Kota Jambi dengan luas 11 Ha. Sebagai pusat pelestarian keanekaragaman hayati. Taman Hutan Kota Muhamamd Sabki saat ini memiliki kurang lebih 187 jenis tanaman dan akan terus bertambah koleksinya.</p>
	<p>Terdapat beberapa jenis pohon yang telah tumbuh secara alami, diantaranya Gaharu, Sindur, Pinang Hutan, Durian Hutan, dan lain-lain. Selain sebagai pusat pelestarian keanekaragaman hayati, Taman Hutan Kota Muhammad Sabki juga sebagai sarana edukasi sehingga Taman Hutan Kota Muhammad Sabki berusaha menyediakan informasi yang memadai mengenai tanaman yang ada.</p>
	<p>Kini Taman Hutan Kota Muhammad Sabki telah memanfaatkan teknologi QR code untuk pelabelan tanaman. QR code yang dipasang di setiap pohon dapat dipindai menggunakan perangkat Android yang sudah dipasang QR code reader, selanjutnya secara otomatis memindai data yang telah tertanam pada QR code, maka berbagai informasi tentang pohon tersebut dengan mudah kita baca di HP.</p>
</div>

<div class="map-div">
	<div id="map" class="col-lg-7 col-md-7 col-sm-7 col-xs-12"></div> 
	<div id="address" class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
		<a href="{{ route('showLocationSearchPage') }}"><button class="main-button">Lokasi Sebaran Pohon</button></a>
		<h4>Taman Hutan Kota Muhammad Sabki<br />Kota Jambi</h4><br />
		<p>Alamat:</p>
		<p>Kenali Asam Bawah, Kota Baru</p>
		<p>Kota Jambi, 36129</p>
		<p>Indonesia</p>
	</div>
</div>

@endsection


@section('script')

<script type="text/javascript">


	$(document).ready(function() {
		/* Make all the images inside the carousel to fit their parent */

		var carousel = $('.carousel-inner');
		var carouselRatio = carousel.width() / carousel.height();

		$('.ss-im').each(function() {
			var imageSize = getImageSize($(this));
			var imageRatio = imageSize.width / imageSize.height;
			var imgClass = (carouselRatio > imageRatio) ? 'tall' : 'wide';
			$(this).addClass(imgClass);
		});


		/* Re-arrange the elements based on the screen resolution */
		if ($(window).width() < 768) {
			$(".slideshow-div").insertBefore(".scanner-div");
			$('.slideshow-div').css("margin-bottom", "20px");

			var address = $("#address");
			var map = $("#map");

			address.insertBefore("#map");
			address.css("padding", "0");
			address.css("margin-bottom", "20px");
		}

		if ($(window).width() < 311) {
			$(".mobile-brand").html("SIIT");
			$(".mobile-brand").css("font-size", "18px");
		}
	});


	function getImageSize($mainImage) {
		var mainImage = $mainImage[0],
		d = {};

		if (mainImage.naturalWidth === undefined) {
			var i = new Image();
			i.src = mainImage.src;
			d.width = i.width;
			d.height = i.height;
		} else {
			d.width = mainImage.naturalWidth;
			d.height = mainImage.naturalHeight;
		}
		return d;
	}

	/* Map function */
	function initMap() {
		var pos = {lat: -1.6539553, lng: 103.5861447};
		var map = new google.maps.Map(
			document.getElementById('map'), {zoom: 15, center: pos});
		var marker = new google.maps.Marker({position: pos, map: map});
	}


</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHzEtuVlr36M5MJwT7EtHna7cLFTzDTWs&callback=initMap">
</script>

@endsection