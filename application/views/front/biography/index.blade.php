@layout('front.master')

@section('content')

    <div class="container">
        <div class="sixteen columns">
            <div class="divider before desktop"></div>
        </div>
    </div>

    <div class="container">
    	<div class="content clearfix">
    		<div class="eight columns">
                
                @if(isset($intro_image))
                    {{ HTML::image('uploads/home/' . $intro_image->filename) }}
                @else
                    <img src="img/band.jpg" alt="" />
                @endif

                <div class="six columns">
       				@if(isset($band_text))
    					<h1>{{ $band_text->title }}</h1>
    					{{ $band_text->content }}
    				@endif
                </div>
    		</div>
    		<div class="eight columns gallery">
    			<ul>
                    <li>
        				<img src="http://www.placehold.it/200" alt="" /><br/>
                    	<span>Emrik Larsson</span>
                    </li>
                    <li>
                    	<img src="http://www.placehold.it/200" alt="" /><br/>
                    	<span>Emrik Larsson</span>
                    </li>
                    <li>
                    	<img src="http://www.placehold.it/200" alt="" /><br/>
                    	<span>Emrik Larsson</span>
                    </li>
                    <li>
                    	<img src="http://www.placehold.it/200" alt="" /><br/>
                    	<span>Emrik Larsson</span>
                    </li>
                    <li>
                    	<img src="http://www.placehold.it/200" alt="" /><br/>
                    	<span>Emrik Larsson</span>
                    </li>
                    <li>
                    	<img src="http://www.placehold.it/200" alt="" /><br/>
                    	<span>Emrik Larsson</span>
                    </li>
                </ul>
    		</div>
    	</div>
    </div>
        
@endsection