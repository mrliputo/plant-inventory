@extends('layouts.guest_app')

@section('content')

<div class="search-desc">
    <p>Spesies diawali dengan huruf {{ $letter }}, diurutkan berdasarkan nama ilmiah.</p>    
</div>

@if(count($results) > 0)

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
                    @foreach($result->trees as $tree)
                        <a href="{{ route('tree.show', $tree->id) }}">{{ $tree->id }}</a><br />
                    @endforeach
                </td>
            </tr>
        </table>

    </div>
    <div class="clear"></div>   
</div>

@endforeach

@else

<div class="well well-form col-lg-offset-1 col-lg-10">
    Tidak ada data.
</div>

@endif

<ul class="pagination">
	<li class="disabled"><a href="javascript:(0)">Jump to</a></li>
	@foreach(range('A','Z') as $letter)
	<li><a href="{{ route('species.botanical', $letter) }}">{{ $letter }}</a></li>
	@endforeach
</ul>

@endsection
