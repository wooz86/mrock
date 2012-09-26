@layout('front.master')

@section('content')
	<div class="container">

	</div>

			<div role="main" class="main">

				<div class="sixteen columns content-text">
					<img src="img/band.jpg" />
					<h1>M-ROCK</h1>
					<p>Maecenas sed diam eget risus varius blandit sit amet non magna. Donec ullamcorper nulla non metus auctor fringilla. Sed posuere consectetur est at lobortis. Vestibulum id ligula porta felis euismod semper. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. <a href="#">Read More</a></p>
					@if($page)
						<h1>{{ $page->title }}</h1>
						<strong>{{ $page->description }}</strong>
					@endif

					@if($main_text)
						<h2>{{ $main_text->title }}</h2>
						<strong>{{ $main_text->description }}</strong>
						{{ $main_text->content }}
					@endif

					@if($side_text)
						<h2>{{ $side_text->title }}</h2>
						<strong>{{ $side_text->description }}</strong>
						{{ $side_text->content }}
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
