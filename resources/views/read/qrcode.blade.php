@extends('layouts.article_app')

@section('title')
	Pemanfaatan Teknologi QR Code untuk Identifikasi Tanaman
@endsection

@section('content')
	<p>Saat berjalan di hutan kota tentunya kita ingin mengetahui informasi detail mengenai suatu tanaman. Hutan Kota HM Sabki kota Jambi kini telah memanfaatkan teknologi QR code untuk pelabelan pohon. QR code yang dipasang di setiap pohon dapat dipindai menggunakan HP Android yang sudah dipasang <a href="{{ url('files/Plant-0.2.apk') }}">QR Code Reader</a>, selanjutnya secara otomatis memindai data yang telah tertanam pada QR code, jika memiliki akses Internet bisa terhubung ke halaman website Sistem Informasi Inventarisasi Tanaman Hutan Kota HM Sabki, maka berbagai informasi tentang pohon tersebut dengan mudah kita baca di HP.</p>
	<p>Dengan adanya label QR code pada tegakan pohon sangat bermanfaat untuk hutan pendidikan, masyarakat bisa langsung belajar mengenai nama lokal tanaman, taksonomi tanaman, ciri-ciri, syarat tumbuh, tahun tanam, serta manfaat dari tanaman tersebut.</p> 
	<p>Ingin mencoba?<br />
	Gunakan HP Android anda yang telah terinstall <a href="{{ url('files/Plant-0.2.apk') }}">QR Code Reader</a> untuk memindai QR Code di bawah ini.</p>
	<img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(200)->generate(json_encode($species))) !!} ">
@endsection