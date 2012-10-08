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
                
                @if($page)
                    <h1>{{ $page->title }}</h1>
                @endif

                @if($main_text)
                    <h1>{{ $main_text->title }}</h1>
                    {{ $main_text->content }}
                    <span class="readmore"><a href="#">Read More »</a></span>
                @endif
    		</div>
    	</div>
    </div>
        
@endsection