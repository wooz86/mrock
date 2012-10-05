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

		@if(!empty($intro_image))
			{{ HTML::image('uploads/home/' . $intro_image->filename) }}
		@endif

			{{ Form::open('admin/home/edit/intro_image', 'POST', array('enctype' => 'multipart/form-data')) }}
			{{ Form::file('intro_image') }}
			{{ Form::submit('Update') }}

	</div>
@endsection
