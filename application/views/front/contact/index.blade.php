@layout('front.master')

@section('content')
	<div class="container">
		<h1>Contact us</h1>
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
		{{ Form::token() }}
		{{ Form::reset('Reset') }}
		{{ Form::submit('Send') }}
		{{ Form::close() }}

	</div>
@endsection
