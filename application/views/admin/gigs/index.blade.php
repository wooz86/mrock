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
		
		{{ Form::open('admin/gig/add', 'POST') }}

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
						{{ Form::select('venue', $venues) }}
						<p>or...</p>

						{{ Form::label('new_venue_title', null, array('placeholder' => 'Add new venue')) }}
						{{ Form::text('new_venue_title', null, array('placeholder' => 'Venue title')) }}
						{{ Form::text('new_venue_url', null, array('placeholder' => 'Venue URL')) }}
					</td>
					<td>
						{{ Form::select('date_year', array('Year' => 'Year'), 'Year', array('class' => 'datefield-short')) }}
						{{ Form::select('date_month', array('Month' => 'Month'), 'Month', array('class' => 'datefield-short')) }}
						{{ Form::select('date_day', array('Day' => 'Day'), 'Day', array('class' => 'datefield-short')) }}
						{{ Form::select('date_hour', array('Hour' => 'Hour'), 'Hour', array('class' => 'datefield-short')) }}
						{{ Form::select('date_minute', array('Minute' => 'Minute'), 'Minute', array('class' => 'datefield-short')) }}
					</td>
					<td>{{ Form::text('tickets_url', null, array('placeholder' => 'URL to tickets')) }}</td>
				</tr>
			</tbody>
		</table>
			{{ Form::token() }}
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
						</tr>
					@endforeach
				</tbody>
			</table>

		@endif


	</div>
@endsection
