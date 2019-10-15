@extends('layouts.guest_app')

@section('content')
@if(count($results) > 0)

<div class="search-desc">
	@if(isset($_GET['afterSubmit']))
		@include('includes.messages')
	@else
		<p>Hasil pencarian spesies dengan kata kunci <em>'{{ $_GET['q'] }}'</em>.</p>
	@endif	
</div>

@foreach($results as $result)

<div class="well item">
	<div class="image col-lg-4 col-md-4 col-sm-4">
		<img class="img-responsive" src="{{ url("/images/species/thumbs/$result->image") }}">

		@if(Auth::check())
			<p class="edit_species"><a href="{{ route('species.edit', $result->id) }}">Edit spesies</a></p>
		@endif

	</div>
	<div class="desc col-lg-8 col-md-8 col-sm-8">
		<table>

			@if($_GET['cat'] == 'spesies' 
					|| $_GET['cat'] == 'all' 
					|| $_GET['cat'] == 'famili')
			<tr>
				<td class="species" colspan="3">{{ $result->spesies }}</td>
			</tr>
			<tr>
				<td class="desc-label">Nama Lokal</td>
				<td>:</td>
				<td class="desc-value">{{ $result->nama_lokal }}</td>
			</tr>
			<tr>
				<td class="desc-label">Famili</td>
				<td>:</td>
				<td class="desc-value">{{ $result->famili }}</td>
			</tr>
			<tr>
				<td class="desc-label">Jumlah Tanaman</td>
				<td>:</td>
				<td class="desc-value">{{ count($result->trees) }}</td>
			</tr>
			<tr>
				<td class="desc-label" style="vertical-align: top;">No Registrasi</td>
				<td style="vertical-align: top">:</td>
				<td class="desc-value">
					@if(count($result->trees) > 0)
						@foreach($result->trees as $tree)
							<a href="{{ route('tree.show', $tree->id) }}">{{ $tree->id }}</a><br />
						@endforeach
					@else
						-
					@endif
				</td>
			</tr>
			
			@elseif($_GET['cat'] == 'nama_lokal')
			<tr>
				<td class="species species-local" colspan="3">{{ $result->nama_lokal }}</td>
			</tr>
			<tr>
				<td class="desc-label">Nama Ilmiah</td>
				<td>:</td>
				<td class="desc-value desc-value-scientific">{{ $result->spesies }}</td>
			</tr>
			<tr>
				<td class="desc-label">Famili</td>
				<td>:</td>
				<td class="desc-value">{{ $result->famili }}</td>
			</tr>
			<tr>
				<td class="desc-label">Jumlah Tanaman</td>
				<td>:</td>
				<td class="desc-value">{{ count($result->trees) }}</td>
			</tr>
			<tr>
				<td class="desc-label" style="vertical-align: top;">No Registrasi</td>
				<td style="vertical-align: top">:</td>
				<td class="desc-value">
					@foreach($result->trees as $tree)
						<a href="{{ route('tree.show', $tree->id) }}">{{ $tree->id }}</a><br />
					@endforeach
				</td>
			</tr>
			
			@else
			<tr>
				<td class="species" colspan="3">{{ $result->spesies }}</td>
			</tr>
			<tr>
				<td class="desc-label">Nama Lokal</td>
				<td>:</td>
				<td class="desc-value">{{ $result->nama_lokal }}</td>
			</tr>
			<tr>
				<td class="desc-label">{{ ucwords($_GET['cat']) }}
				<td>:</td>

				@if($_GET['cat'] == 'genus')
				<td class="desc-value desc-value-scientific">{{ $result->genus }}</td>
				
				@elseif($_GET['cat'] == 'ordo')
				<td class="desc-value">{{ $result->ordo }}</td>

				@elseif($_GET['cat'] == 'subkelas')
				<td class="desc-value">{{ $result->subkelas }}</td>

				@elseif($_GET['cat'] == 'kelas')
				<td class="desc-value">{{ $result->kelas }}</td>

				@elseif($_GET['cat'] == 'divisi')
				<td class="desc-value">{{ $result->divisi }}</td>

				@elseif($_GET['cat'] == 'superdivisi')
				<td class="desc-value">{{ $result->superdivisi }}</td>

				@elseif($_GET['cat'] == 'subkingdom')
				<td class="desc-value">{{ $result->subkingdom }}</td>

				@elseif($_GET['cat'] == 'kingdom')
				<td class="desc-value">{{ $result->kingdom }}</td>

				@endif
				
			</tr>
			<tr>
				<td class="desc-label">Jumlah Tanaman</td>
				<td>:</td>
				<td class="desc-value">{{ count($result->trees) }}</td>
			</tr>
			<tr>
				<td class="desc-label" style="vertical-align: top;">No Registrasi</td>
				<td style="vertical-align: top">:</td>
				<td class="desc-value">
					@foreach($result->trees as $tree)
						<a href="{{ route('tree.show', $tree->id) }}">{{ $tree->id }}</a><br />
					@endforeach
				</td>
			</tr>

			@endif

		</table>
	</div>
	<div class="clear"></div>	
</div>

@endforeach

@else

<div class="well">
	<p>Tidak ada data ditemukan.</p>
</div>

@endif
{{ $results->appends(request()->input())->links() }}

@endsection