@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <h2 class="also_like section_title">YOU MAY ALSO LIKE</h2>
            <div class="col-xs-12 col-md-12 col-sm-12">
                <h2>{{ $user->name }}</h2> <small>{{ $user->profile->location }}</small>
                <div class="bio">
                    <p>
                        {{ $user->profile->bio }}
                    </p>
                </div>

                <ul class="link">
                    <li>{!! link_to('http://twitter.com/'.$user->profile->twitter_username, 'Find me on Twitter') !!}</li>
                    <li>{!! link_to('http://github.com/'.$user->profile->github_username, 'Find me on Github')  !!}</li>
                </ul>
            </div>
        </div>
    </div>
@endsection