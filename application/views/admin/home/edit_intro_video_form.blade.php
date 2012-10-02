@layout('admin.master')

@section('content')
	<div class="container">

		<h2>Edit intro video</h2>

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

		@if(!empty($intro_video))
			{{ Form::open('admin/home/edit/intro_video', 'POST') }}
			{{ Form::text('intro_video_url', $intro_video->content) }}
			{{ Form::submit('Update') }}
		@else
			<p>Problem loading the form data.</p>
		@endif
	</div>
@endsection
