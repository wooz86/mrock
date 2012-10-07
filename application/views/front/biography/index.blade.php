@layout('front.master')

@section('content')

	<div role="main" class="main">

		<div class="sixteen columns content-text">
			@if(!empty($band_image))
				{{ HTML::image('uploads/biography/' . $band_image->filename) }}
			@endif

			@if($page)
				<h1>{{ $page->title }}</h1>
			@endif

			@if($band_text)
				<h1>{{ $band_text->title }}</h1>
				{{ $band_text->content }}<p><a href="#">Read More</a></p>
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
