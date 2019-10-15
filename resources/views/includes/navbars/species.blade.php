<div class="letters">
	<ul>
		<li class="nav-label">Spesies Tanaman</li>
		@foreach(range('A','Z') as $letter)
		<li><a href="{{ route('species.all', $letter) }}">{{ $letter }}</a></li>
		@endforeach
	</ul>
</div>

<div class="clear"></div>