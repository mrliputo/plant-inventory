<div class="topnav">

	<ul>
		<li><a class="mobile-brand m-head" href="{{ route('home') }}">Sistem Informasi Inventarisasi Tanaman<br />Taman Hutan Kota M Sabki Kota Jambi</a></li>

		@if (Auth::guest())
		<li><a style="font-size: 1em" href="{{ route('messages.create') }}">Kontak</a></li>
		<li><a style="font-size: 1em" href="{{ route('login') }}">Login</a></li>

		@else
		<li><a style="font-size: 1em" href="{{ route('tree.index') }}">Dashboard</a></li>
		<li><a style="font-size: 1em" href="{{ route('logout') }}" 
			onclick="event.preventDefault();
			document.getElementById('logout-form').submit();">Logout</a></li>

			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				{{ csrf_field() }}
			</form>
			
			@endif

			<li class="icon">
				<a class="m-head burger-container" href="javascript:void(0);" onclick="myFunction()"><span id="burger" class="glyphicon glyphicon-menu-hamburger"></span></a>
			</li>
		</ul>

		{!! Form::open(['action' => 'SearchController@search', 'method' => 'GET', 'class' => 'mob-menu-section col-xs-offset-1 col-xs-10']) !!}
		<label>Pencarian dengan keyword</label>
		<div class="clear"></div>

		{!! Form::select('cat', [
			'all' => 'Semua',
			'nama_lokal' => 'Nama Lokal',
			'spesies' => 'Nama Ilmiah',
			'genus' => 'Genus',
			'famili' => 'Famili',
			'ordo' => 'Ordo',
			'kelas' => 'Kelas',
			'divisi' => 'Divisi',
			'kingdom' => 'Kingdom',
			], 'all') !!}

			{!! Form::text('q', '', ['placeholder' => 'Kata kunci...', 'required']) !!}
			<div class="clear"></div>

			{!! Form::submit('Cari') !!}
			{!! Form::close() !!}

			{!! Form::open(['action' => 'SearchController@sort', 'method' => 'GET', 'class' => 'second-section mob-menu-section col-xs-offset-1 col-xs-10']) !!}
			<label>Pencarian berdasarkan abjad</label>
			<div class="clear"></div>

			<select name="letter" id="letter">
				@foreach(range('A','Z') as $letter)
				<option value="{{ $letter }}">{{ $letter }}</option>
				@endforeach
			</select>

			{!! Form::button('Go', ['type' => 'submit', 'class' => 'mob-go-btn']) !!}
			{!! Form::close() !!}

		</div>
		<script>
			/* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
			function myFunction() {
				document.getElementsByClassName("topnav")[0].classList.toggle("responsive");
				$('#burger').toggleClass('glyphicon-menu-hamburger glyphicon-remove');
			}

			function go() {
				var letter = document.getElementById('letter').value;
				window.location.href = '/species/' + letter + '/all';
			}

		</script>