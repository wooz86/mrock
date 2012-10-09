@layout('front.master')

@section('content')

    <div class="container">
        <div class="sixteen columns">
            <div class="divider before desktop"></div>
        </div>
    </div>

    <div class="container">
    	<div class="content clearfix">
    		<div class="seven columns clearfix">

                @if(isset($page))
                    <h1>{{ $page->title }}</h1>

                    <p>Donec <a href="#">Soundcloud</a> id elit non mi porta gravida at eget metus. Duis mollis, est non commodo luctus, nisi erat <a href="#">Youtube</a> ligula, eget lacinia odio sem nec elit. <a href="#">Spotify</a> sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                @endif

                @if($main_text)
                    <h1>{{ $main_text->title }}</h1>
                    <!--{{ $main_text->content }}-->
                    <p>Donec id elit non mi porta gravida at eget metus. Duis mollis, est non commodo luctus, nisi erat <a href="#">Youtube</a> ligula, eget lacinia odio sem nec elit. <a href="#">Spotify</a> sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                    <span class="readmore"><a href="#">Read More »</a></span>
                @endif
    		</div>

            <div class="sixteen columns clearfix">

                <iframe width="100%" height="166" style="height:166px!important;"  scrolling="no" frameborder="no" src="http://w.soundcloud.com/player/?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F36764806&amp;auto_play=false&amp;show_artwork=true&amp;color=ff2600"></iframe>
                <iframe width="100%" height="166" style="height:166px!important;" scrolling="no" frameborder="no" src="http://w.soundcloud.com/player/?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F36764040&show_artwork=true"></iframe>
            </div>

            <div class="sixteen columns clearfix">

                <h1 style="margin-top:30px;">Spotify</h1>
                <iframe style="height: 360px!important;border:none; box-shadow: none; -webkit-box-shadow: none;" src="http://open.spotify.com/track/3yvarhMZcZMDpKBRLZgAzb" width="300" height="240" frameborder="0" allowtransparency="true"></iframe>
            </div>
    	</div>
    </div>
        
@endsection