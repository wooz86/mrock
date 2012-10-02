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

		<p><strong>Please note!</strong></p>
		<p>The URL to the Youtube video should follow this pattern: http://www.youtube.com/watch?v=mRitfbhITLM. Not correct: http://www.youtube.com/embed/mRitfbhITLM

		@if(!empty($intro_video))
			{{ Form::open('admin/home/edit/intro_video', 'POST') }}
			{{ Form::text('intro_video_url', $intro_video->content) }}
			{{ Form::submit('Update') }}
		@else
			<p>Problem loading the form data.</p>
		@endif
	</div>
@endsection