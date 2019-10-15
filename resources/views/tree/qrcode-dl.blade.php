<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Sistem Informasi Inventarisasi Tanaman') }}</title>

	<!-- Styles -->
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">

	<style type="text/css">
	*, html {
		margin: 0;
		padding: 5px;
		background: #fff;
	}

	.border {
		color: #000;
		border: none;
		padding: 5px 20px;
	}

	.names {
		padding-top: 10px;
	}


	.names p:nth-child(1) {
		font-size: 5em;
		font-weight: bold;
		font-style: italic;
		margin-top: 25px;
	}

	.names p:nth-child(2), .names p:nth-child(3) {
		font-size: 2.5em;
	}
</style>

</head>
<body>

	<div id="printableArea">

		<div class="border col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="names col-lg-9 col-md-9 col-sm-9 col-xs-9">
				<p class="local">{{ $species->item->sn }}</p>
				<p class="scientific">Nama Lokal : {{ $species->item->ln }}</p>
				<p class="scientific">No. Reg. : {{ $species->item->id }}</p>
			</div>

			<div class="image col-lg-3 col-md-3 col-sm-3 col-xs-3 pull-right">
				<img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(310)->generate(json_encode($species))) !!} ">
			</div>
		</div>

	</div>

	<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>

	<script type="text/javascript">

		$(document).ready(function() {
			var pdf = new jsPDF('p','pt','a4');
			pdf.addHTML(document.body ,function() {
				pdf.save('label.pdf');
			});

			setInterval(function(){
				window.close();
			},1000);
		});

		function printDiv(divName) {
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;

			document.body.innerHTML = printContents;
			window.print();
			document.body.innerHTML = originalContents;
		}

	</script>

</body>
</html>