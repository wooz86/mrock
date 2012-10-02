@layout('front.master')

@section('content')

	<div role="main" class="main">

			<div class="ten columns">
				<img src="img/band.jpg" />
				
				<!--@if($page)
					<h1>{{ $page->title }}</h1>
				@endif-->

				@if($main_text)
					<h1>{{ $main_text->title }}</h1>
					{{ $main_text->content }}<p><a href="#">Read More</a></p>
				@endif

				<iframe src="http://www.youtube.com/embed/LjLPqIL2HHU" frameborder="0" allowfullscreen></iframe>

			</div>
			<div class="six columns">
				<h1>Twitter</h1>
				<p>tweet tweet <a href="#">Read More</a></p>

				@if($side_text)
					<h2>{{ $side_text->title }}</h2>
					{{ $side_text->content }}
				@endif

			</div>

		

	</div>

@endsection
