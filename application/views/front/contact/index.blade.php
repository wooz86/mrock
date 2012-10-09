@layout('front.master')

@section('content')

	<div class="container">
		<div class="sixteen columns">
			<div class="divider before desktop"></div>
		</div>
	</div>

	<div class="container">
		<div class="content clearfix">

			<div class="sixteen columns clearfix">
							
				@if(isset($page))
					<h1>{{ $page->title }}</h1>
				@endif

				@if (Session::has('contact_errors'))
		        	<span class="error">There was a problem with your input. Please try again</span>
		    	@endif

		    	@if (Session::has('email_sent'))
		        	<span class="error">Email sent!</span>
		    	@endif
				
				{{ Form::open('contact/post_contact_form', 'POST') }}
				Name: {{ Form::text('name', Input::old('name')) }}
				E-mail {{ Form::text('email', Input::old('email')) }}
				Message {{ Form::textarea('message', Input::old('message')) }}
				{{ Form::reset('Reset') }}
				{{ Form::submit('Send') }}
				{{ Form::close() }}
			</div>
		</div>
	</div>

@endsection