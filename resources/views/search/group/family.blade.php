<!--
	Created by Norman Syarif on 2018-05-31.
-->
@extends('layouts.guest_app')

@section('content')

<p class="label-2">Daftar Famili</p>

@if(count($results) > 0)

<div class="family_list">
	@foreach($results as $result)
	<p><a href="{{ route('species.family.result', $result->famili) }}">{{ $result->famili }}</a></p>
	@endforeach
</div>

@else
<div class="well well-form col-lg-offset-1 col-lg-10">
	Tidak ada data.
</div>

@endif
@endsection