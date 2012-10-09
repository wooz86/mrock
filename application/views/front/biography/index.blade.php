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
                
                <div class="eight columns alpha">
                    @if(!empty($intro_image))
                        {{ HTML::image('uploads/home/' . $intro_image->filename) }}
                    @else
                        <img src="img/band.jpg" alt="" />
                    @endif
                </div>

                <div class="eight columns alpha">
       				@if(isset($band_text))
    					<h1>{{ $band_text->title }}</h1>
    					{{ $band_text->content }}
    				@endif
                </div>
    		</div>
    		<div class="eight columns gallery">
                @if(!empty($members))
        			<ul>
                        @foreach($members as $member)
                            <li>
                                @if(!empty($member->image))
                                    <a href="biography/member/{{ $member->id }}">{{ HTML::image('uploads/members/' . $member->image->filename, $member->firstname . ' ' . $member->lastname) }}</a><br/>
                                @else
                                    <a href="biography/member/{{ $member->id }}">{{ HTML::image('img/silhouette.png', $member->firstname . ' ' . $member->lastname) }}</a><br/>
                                @endif
                                <span>{{ $member->firstname }} {{ $member->lastname}}</span>
                            </li>
                        @endforeach
                    </ul>
                @endif
    		</div>
    	</div>
    </div>
        
@endsection