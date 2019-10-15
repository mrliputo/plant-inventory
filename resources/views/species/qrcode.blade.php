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
		padding: 0;
	}
	
	body {
	    background: #ececec;
	}

	.border {
		color: #000;
		border: none;
		padding: 5px 20px;
		background: #fff;
	}

	.names {
		padding-top: 10px;
	}


	.names p:nth-child(1) {
		font-size: 3em;
		font-weight: bold;
		font-style: italic;
	}

	.names p:nth-child(2), .names p:nth-child(3) {
		font-size: 1.5em;
	}

	.preview {
		margin: 20px;
	}

	button {
		background-color: #2F9AFC;
		color: #fff;
		border: none;
		border-radius: 5px;
		font-weight: bold;
		padding: 6px 10px;
		text-align: center;
		font-size: .9em;
		box-shadow: 1px 1px 2px 1px rgba(0, 0, 0, 0.2);
		transition: all .2s ease-in-out;
		margin-top: 20px;
	}
</style>

</head>
<body>

	<p class="preview">Preview</p>

	<div id="printableArea">

		<div class="border col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="names col-lg-9 col-md-9 col-sm-9 col-xs-9">
				<p class="local">{{ $species->item->sn }}</p>
				<p class="scientific">Nama Lokal : {{ $species->item->ln }}</p>
				<p class="scientific">No. Reg. : {{ $species->item->id }}</p>
			</div>

			<div class="image col-lg-3 col-md-3 col-sm-3 col-xs-3 pull-right">
				<img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(200)->generate(json_encode($species))) !!} ">
			</div>
		</div>

	</div>

	<div id="editor"></div>

	<button class="col-lg-2 col-md-2 col-sm-2 col-xs-12 col-lg-offset-5 col-md-offset-5 col-sm-offset-5" onclick="printDiv('printableArea')">Print</button>

	<a href="{{ route('downloadNameTag', $species->item->id) }}" target="__blank">
			<button class="col-lg-2 col-md-2 col-sm-2 col-xs-12 col-lg-offset-5 col-md-offset-5 col-sm-offset-5">Download</button>
	</a>

	<script type="text/javascript">

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