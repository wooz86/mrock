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

                @if(!empty($images))
                    <ul>
                        @foreach($images as $image)
                            <li>
                                <a href="http://www.placehold.it/580" rel="lightbox-gallery" title="{{ $image->caption }}">
                                {{ HTML::image('uploads/gallery/' . $image->filename, $image->caption) }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>No images uploaded.</p>
                @endif
        
			</div>
		</div>
	</div>

@endsection