@layout('front.master')

@section('content')

	<div class="container">
		<div class="sixteen columns">
			<div class="divider before desktop"></div>
		</div>
	</div>

	<div class="container">
		<div class="content clearfix">
			<div class="seven columns">
				@if(isset($intro_image))
					{{ HTML::image('uploads/home/' . $intro_image->filename) }}
				@else
					<img src="img/band.jpg" alt="" />
				@endif
			</div>

			<div class="eight columns offset-by-one">
				@if($main_text)
					<h1>{{ $main_text->title }}</h1>
					{{ $main_text->content }}
					<span class="readmore"><a href="#">Read More »</a></span>
				@endif
			</div>

			<div class="sixteen columns clearfix">
				@if(!empty($intro_video))
					<iframe src="{{ $intro_video->content }}" frameborder="0" allowfullscreen></iframe>
				@else
					<iframe src="http://www.youtube.com/embed/LjLPqIL2HHU" frameborder="0" allowfullscreen></iframe>
				@endif
			</div>
		</div>
	</div>

@endsection
