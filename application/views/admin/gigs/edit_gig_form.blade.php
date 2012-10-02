@layout('admin.master')

@section('content')
	<div class="container">

		<h2>Edit gig</h2>
		
		{{ Form::open('admin/gigs/add', 'POST') }}

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
						{{ Form::select('venue', array('Choose venue')) }}
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
		{{ Form::submit('Update gig') }}

	</div>
@endsection
