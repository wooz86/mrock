@layout('front.master')

@section('content')

	<div class="container">
		<div class="sixteen columns">
			<div class="divider before desktop"></div>
		</div>
	</div>

	<div class="container">
		<div class="content clearfix">
			<div class="sixteen columns clearfix">

				@if(isset($page))
					<h1>{{ $page->title }}</h1>
				@endif

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
									@if(!empty($gig->ticket_url))
										<td>{{ HTML::link($gig->ticket_url, 'Buy tickets') }}</td>
									@else
										<td>-</td>
									@endif
								</tr>
							@endforeach
						</tbody>
					</table>
				@else
					<p>No gigs added.</p>
				@endif
			</div>
		</div>
	</div>
        
@endsection
