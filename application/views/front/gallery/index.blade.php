@layout('front.master')

@section('content')

    <div class="container">
        <div class="sixteen columns">
            <div class="divider before desktop"></div>
        </div>
    </div>

	<div class="container">
		<div class="content clearfix">
			<div class="sixteen columns clearfix gallery">
                @if(isset($page))
                    <h1>{{ $page->title }}</h1>
                @endif

                @if($main_text)
                    <h1>{{ $main_text->title }}</h1>
                    {{ $main_text->content }}
                    <span class="readmore"><a href="#">Read More »</a></span>
                @endif
				<ul>
                    <li><img src="http://www.placehold.it/200" alt="" /></li>
                    <li><img src="http://www.placehold.it/200" alt="" /></li>
                    <li><img src="http://www.placehold.it/200" alt="" /></li>
                    <li><img src="http://www.placehold.it/200" alt="" /></li>
                    <li><img src="http://www.placehold.it/200" alt="" /></li>
                    <li><img src="http://www.placehold.it/200" alt="" /></li>
                    <li><img src="http://www.placehold.it/200" alt="" /></li>
                    <li><img src="http://www.placehold.it/200" alt="" /></li>
                    <li><img src="http://www.placehold.it/200" alt="" /></li>
                    <li><img src="http://www.placehold.it/200" alt="" /></li>
                </ul>
			</div>
		</div>
	</div>

@endsection