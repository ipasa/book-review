@extends('layouts.master')

@section('content')
    <div class="container full-color">
        <div class="row">
            <h2 class="also_like section_title mar-top-50">
                {{ $user->name }}
                <small class="text-center">{{ $user->profile->location }}</small>
            </h2>
            <div class="col-xs-12 col-md-12 col-sm-12">

                @if($user->profile->bio)
                    <div class="bio">
                        <p>
                            {{ $user->profile->bio }}
                        </p>
                    </div>
                @endif

                <ul class="link">
                    <li>{!! link_to('http://twitter.com/'.$user->profile->twitter_username, 'Find me on Twitter') !!}</li>
                    <li>{!! link_to('http://github.com/'.$user->profile->github_username, 'Find me on Github')  !!}</li>
                </ul>


                @if(Auth::check() && Auth::user()->id===$user->id)
                    {!! link_to_route('profile.edit', 'Edit your profile', $user->id)  !!}
                @endif
            </div>
        </div>

    </div>
@endsection

