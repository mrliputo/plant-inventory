@extends('layouts.guest_app')

@section('content')

<div class="error-msg">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">
			<p class="error-text">500. Something went wrong.</p>
			<p>Sorry, our server is acting up again. While we're fixing the problem,
			you can go watch this <a href="https://www.youtube.com/watch?v=fNodQpGVVyg"><b>cute cat video</b></a>, and try again once you're done.</p>
		</div>
	</div>
</div>

@endsection