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
			{{ Form::open('admin/home/edit/intro_text', 'POST') }}
			{{ Form::text('intro_text_title', $intro_text->title) }}
			{{ Form::textarea('intro_text', $intro_text->content) }}
			{{ Form::submit('Update') }}
		@else
			<p>Problem loading the form data.</p>
		@endif
	</div>
@endsection
