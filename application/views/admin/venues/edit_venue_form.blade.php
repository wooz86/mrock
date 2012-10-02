@layout('admin.master')

@section('content')
	<div class="container">

		<h2>Edit venue</h2>

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

			{{ Form::open('admin/venue/update', 'POST') }}
			{{ Form::hidden('id', $venue->id) }}
			{{ Form::text('title', $venue->title) }}
			{{ Form::text('url', $venue->url) }}
			{{ Form::submit('Update') }}

	</div>
@endsection
