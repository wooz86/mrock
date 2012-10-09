<div class="nav mobile" style="background:rgba(0,0,0,0.2);">
    <div class="container">
        <div class="sixteen columns">
            <div class="divider after"></div>
        </div>
    </div>

    <div class="container" id="menu">
        <div class="sixteen columns">
            <h1>NAVIGATION</h1>
            <ul class="mobilemenu">
                @foreach(Page::all() as $nav)
                <li>
                    @if($nav->title == 'Home')
                        {{ HTML::link(URL::base(), $nav->title) }}
                    @else
                        {{ HTML::link(Str::lower($nav->title), $nav->title) }}
                    @endif
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>