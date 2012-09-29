@layout('admin.master')

@section('content')
	<div class="container">

		<h2>Venues</h2>

		<h3>Add venue</h3>

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

		{{ Form::open('admin/venue/save', 'POST') }}
		{{ Form::text('title', Input::old('title'), array('placeholder' => 'Venue title')) }}
		{{ Form::text('url', Input::old('url'), array('placeholder' => 'Venue URL')) }}
		{{ Form::token() }}
		{{ Form::submit('Add venue') }}

		<hr>

		@if(!empty($venues))

			<table>
				<th>
					<tr>
						<td>Venue</td>
						<td>URL</td>
						<td>Manage</td>
					</tr>
				</th>
				<tbody>
					@foreach($venues as $venue)
						<tr>
							@if(!empty($venue->url))
								<td>{{ HTML::link($venue->url, $venue->title) }}</td>
							@else
								<td>{{ $venue->title }}</td>
							@endif
							<td>{{ $venue->url }}</td>
							<td>{{HTML::link('admin/venue/' . $venue->id . '/edit', 'Edit')}} {{HTML::link('url', 'Delete')}}</td>
						</tr>
					@endforeach
				</tbody>
			</table>

		@else
			<p>No venues added yet.</p>
		@endif

	</div>
@endsection
