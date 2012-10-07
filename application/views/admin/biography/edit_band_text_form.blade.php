@layout('admin.master')

@section('content')
	<div class="container">

		<h2>Edit intro text</h2>

		@if(Session::has('success'))
			{{ Session::get('success') }}
		@endif

		@if($errors->messages)
			<ul>
				@foreach($errors->all('<li>:message</li>') as $message)
					{{$message}}
				@endforeach
			</ul>
		@endif

		@if($intro_text)
			{{ Form::open('admin/biography/edit/band_text', 'POST') }}
			{{ Form::text('band_text_title', $band_text->title) }}
			{{ Form::textarea('band_text', $band_text->content, array('class' => 'editor')) }}
			{{ Form::submit('Update') }}
		@else
			<p>Problem loading the form data.</p>
		@endif
	</div>
@endsection
