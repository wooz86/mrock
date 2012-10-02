@layout('front.master')

@section('content')

	<div role="main" class="main">

		<div class="sixteen columns content-text">
			<img src="img/band.jpg" />
			
			@if($page)
				<h1>{{ $page->title }}</h1>
			@endif

			@if (Session::has('contact_errors'))
	        	<span class="error">There was a problem with your input. Please try again</span>
	    	@endif

	    	@if (Session::has('email_sent'))
	        	<span class="error">Email sent!</span>
	    	@endif
			
			{{ Form::open('contact/post_contact_form', 'POST') }}
			Name:{{ Form::text('name', Input::old('name')) }}
			E-mail{{ Form::text('email', Input::old('email')) }}
			Message{{ Form::textarea('message', Input::old('message')) }}
			{{ Form::reset('Reset') }}
			{{ Form::submit('Send') }}
			{{ Form::close() }}

		</div>

		<div class="sixteen columns content-media">
			<iframe src="http://www.youtube.com/embed/LjLPqIL2HHU" frameborder="0" allowfullscreen></iframe>
		</div>

		<div class="sixteen columns content-text">
			<h1>Twitter</h1>
			<p>Maecenas sed diam eget risus varius blandit sit amet non magna. Donec ullamcorper nulla non metus auctor fringilla. Sed posuere consectetur est at lobortis. Vestibulum id ligula porta felis euismod semper. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. <a href="#">Read More</a></p>
		</div>

	</div>

@endsection
