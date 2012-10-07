@layout('admin.master')

@section('content')
	<div class="container">

		<h2>Edit band image</h2>

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

		@if(!empty($band_image))
			{{ HTML::image('uploads/biography/' . $band_image->filename) }}
		@endif

			{{ Form::open('admin/biography/edit/band_image', 'POST', array('enctype' => 'multipart/form-data')) }}
			{{ Form::file('band_image') }}
			{{ Form::submit('Update') }}

	</div>
@endsection
