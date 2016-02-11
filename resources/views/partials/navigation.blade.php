<!-- NAVIGATION SECTION -->
<nav class="navbar navbar-trans navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapsible">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand text-danger" href="#">BRAND</a>
        </div>
        <div class="navbar-collapse collapse" id="navbar-collapsible">
            {{--<ul class="nav navbar-nav navbar-left"></ul>--}}
            <ul class="nav navbar-nav navbar-right">
                <li>{!! link_to_route('search', 'Search') !!}</li>
                <li>{!! link_to_route('category-display', 'Categories') !!}</li>
                <li>{!! link_to('/alluser', 'Browser User') !!}</li>

                @if (Auth::guest())
                    <li><a href="{{ url('/auth/login') }}">Login</a></li>
                    <li><a href="{{ url('/auth/register') }}">Register</a></li>
                @else
                    <li>{!! link_to_route('stream-show', 'Stream') !!}</li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li>{!! link_to('/user/'.Auth::user()->id, 'Your Profile') !!}</li>
                            <li>{!! link_to('/user/'.Auth::user()->id.'/favorites', 'Your Favorites') !!}</li>
                            <hr>
                            <li>{!! link_to('/canfollow', 'Can Follow') !!}</li>
                            <li>{!! link_to('/predict', 'Suggested Book') !!}</li>
                            <hr>
                            <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                        </ul>
                    </li>
                @endif
                <li>&nbsp;</li>
            </ul>
        </div>
    </div>
</nav>
<!-- END OF NAVIGATION SECTION -->