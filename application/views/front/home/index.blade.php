@layout('front.master')

@section('content')
	<div class="container">

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
@endsection
