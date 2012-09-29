@layout('admin.master')

@section('content')
	<div class="container">

		<h2>Edit venue</h2>

			{{ Form::open('admin/venue/edit', 'POST') }}
			{{ Form::text('Venue title', $venue->title) }}
			{{ Form::text('url', $venue->url) }}
			{{ Form::token() }}
			{{ Form::submit('Update') }}

	</div>
@endsection
