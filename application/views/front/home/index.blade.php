@layout('front.master')

@section('content')

	<div role="main" class="main">

		<div class="ten columns">
			@if(!empty($intro_image))
			{{ HTML::image('uploads/home/' . $intro_image->filename) }}
			@endif

			<!--@if($page)
				<h1>{{ $page->title }}</h1>
			@endif-->

			@if($main_text)
				<h1>{{ $main_text->title }}</h1>
				{{ $main_text->content }}<p><a href="#">Read More</a></p>
			@endif

			@if(!empty($intro_video))
				<iframe src="{{ $intro_video->content }}" frameborder="0" allowfullscreen></iframe>
			@else
				<iframe src="http://www.youtube.com/embed/LjLPqIL2HHU" frameborder="0" allowfullscreen></iframe>
			@endif

		</div>
		
		<div class="six columns">
			<h1>Twitter</h1>
			<p>tweet tweet <a href="#">Read More</a></p>

			<!--@if($side_text)
				<h1>{{ $side_text->title }}</h1>
				{{ $side_text->content }}
			@endif-->

		</div>

	</div>

@endsection
