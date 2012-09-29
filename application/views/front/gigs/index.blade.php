@layout('front.master')

@section('content')
	<div role="main" class="main">

		<div class="sixteen columns content-text">
			<img src="img/band.jpg" />
			@if(!empty($page))
				<h1>{{ $page->title }}</h1>
			@endif

			@if(!empty($main_text))
				<h1>{{ $main_text->title }}</h1>
				{{ $main_text->content }}<p><a href="#">Read More</a></p>
			@endif

			@if(!empty($side_text))
				<h2>{{ $side_text->title }}</h2>
				{{ $side_text->content }}
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
								<td>{{ $gig->ticket_url }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>

			@endif




		</div>

		<div class="sixteen columns content-media">
			<iframe src="http://www.youtube.com/embed/LjLPqIL2HHU" frameborder="0" allowfullscreen></iframe>
		</div>

		<div class="sixteen columns content-text">
			<h1>Twitter</h1>
			<p>Maecenas sed diam eget risus varius blandit sit amet non magna. Donec ullamcorper nulla non metus auctor fringilla. Sed posuere consectetur est at lobortis. Vestibulum id ligula porta felis euismod semper. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. <a href="#">Read More</a></p>
		</div>

	</div>
@endsection
