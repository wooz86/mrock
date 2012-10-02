@layout('admin.master')

@section('content')
	<div class="container">

		<h2>Gigs</h2>

		@if(Session::has('success'))
			{{ Session::get('success') }}
		@endif

		@if(!empty($errors->messages))
			<ul>
				@foreach($errors->all('<li>:message</li>') as $message)
					{{$message}}
				@endforeach
			</ul>
		@endif

		<h3>Add new gig</h3>
		
		{{ Form::open('admin/gig/save', 'POST') }}

		<table class="container">
			<th>
				<tr>
					<td class="one-third.column">Venue</td>
					<td class="one-third.column">Date</td>
					<td class="one-third.column">Tickets</td>
				</tr>
			</th>
			<tbody>
				<tr>
					<td>
						{{ Form::label('venue', 'Choose venue') }}
						{{ Form::select('venue', $venues, 'Choose venue...') }}
						<p>or...</p>

						{{ Form::label('new_venue_title', null, array('placeholder' => 'Add new venue')) }}
						{{ Form::text('new_venue_title', Input::old('new_venue_title'), array('placeholder' => 'Venue title')) }}
						{{ Form::text('new_venue_url', Input::old('new_venue_url'), array('placeholder' => 'Venue URL')) }}
					</td>
					<td>
						{{ Form::select('date_year', $years, 'Year', array('class' => 'datefield-short')) }}
						{{ Form::select('date_month', $months, 'Month', array('class' => 'datefield-short')) }}
						{{ Form::select('date_day', $days, 'Day', array('class' => 'datefield-short')) }}
						{{ Form::select('date_hour', $hours, 'Hour', array('class' => 'datefield-short')) }}
						{{ Form::select('date_minute', $minutes, 'Minute', array('class' => 'datefield-short')) }}
					</td>
					<td>{{ Form::text('ticket_url', Input::old('ticket_url'), array('placeholder' => 'URL to tickets')) }}</td>
				</tr>
			</tbody>
		</table>
			{{ Form::submit('Add gig') }}

		<hr>

		<h3>Gigs</h3>
		@if(!empty($gigs))
			<table>
				<th>
					<tr>
						<td>Venue</td>
						<td>Date</td>
						<td>Tickets</td>
						<td>Created at</td>
						<td>Updated at</td>
						<td>Manage</td>
					</tr>
				</th>
				<tbody>
					@foreach($gigs as $gig)
						<tr>
							@if(!empty($gig->venue->url))
								<td>{{ HTML::link($gig->venue->url, $gig->venue->title) }}</td>
							@else
								<td>{{ $gig->venue->title }}</td>
							@endif
							<td>{{ $gig->date }}</td>
							<td>{{ $gig->ticket_url }}</td>
							<td>{{ $gig->created_at }}</td>
							<td>{{ $gig->updated_at }}</td>
							<td>{{HTML::link('admin/gig/' . $gig->id . '/edit', 'Edit')}} {{HTML::link('url', 'Delete')}}</td>
						</tr>
					@endforeach
				</tbody>
			</table>

		@endif


	</div>
@endsection
