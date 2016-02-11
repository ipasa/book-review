@extends('layouts.master')

@section('content')
    <div class="container full-color">
        <div class="row">
            <h2 class="also_like section_title mar-top-50">
                {{ $user->name }}
                <small class="text-center">{{ $user->profile->location }}</small>
            </h2>
            <div class="col-xs-12 col-md-12 col-sm-12">

                {{--@if($user->profile->bio)--}}
                {{--<div class="bio">--}}
                {{--<p>--}}
                {{--{{ $user->profile->bio }}--}}
                {{--</p>--}}
                {{--</div>--}}
                {{--@endif--}}

                {{--<ul class="link">--}}
                    {{--<li>{!! link_to('http://twitter.com/'.$user->profile->twitter_username, 'Find me on Twitter') !!}</li>--}}
                    {{--<li>{!! link_to('http://github.com/'.$user->profile->github_username, 'Find me on Github')  !!}</li>--}}
                {{--</ul>--}}


                {{--@if(Auth::check() && Auth::user()->id===$user->id)--}}
                    {{--{!! link_to_route('profile.edit', 'Edit your profile', $user->id)  !!}--}}
                {{--@endif--}}
            </div>
        </div>

        <div class="row">
            <!-- code start -->
            <div class="twPc-div col-md-4">
                <a class="twPc-bg twPc-block"></a>

                <div>
                    <div class="twPc-button">
                        <!-- Twitter Button | you can get from: https://about.twitter.com/tr/resources/buttons#follow -->
                        {{--<a href="https://twitter.com/mertskaplan" class="twitter-follow-button">Follow @mertskaplan</a>--}}
                        @if(Auth::check())
                            @unless($user->id===Auth::id())
                                @include('partials.follow-form')
                            @endunless

                            @if(Auth::check() && Auth::user()->id===$user->id)
                                <button class="btn mar-less">{!! link_to_route('profile.edit', 'Edit your profile', $user->id)  !!}</button>
                            @endif
                        @endif<!-- Twitter Button -->
                    </div>

                    <a title="Mert Salih Kaplan" href="https://twitter.com/mertskaplan" class="twPc-avatarLink">
                        <img alt="Mert Salih Kaplan"
                             src="http://api.randomuser.me/portraits/thumb/men/<?php echo rand(1,70); ?>.jpg"
                             class="twPc-avatarImg"
                        >
                    </a>

                    <div class="twPc-divUser">
                        <div class="twPc-divName">
                            {{ $user->name }}
                        </div>
                        <span>
                            @ <a href="https://twitter.com/{{ $user->profile->twitter_username }}" target="_blank"><span>{{ $user->profile->twitter_username }}</span></a>
                        </span>
                    </div>

                    <div class="twPc-divStats">
                        <ul class="twPc-Arrange">
                            <li class="twPc-ArrangeSizeFit">
                                <span class="userInfocolor">
                                    <span class="twPc-StatLabel twPc-block">Favorited</span>
                                    <span class="twPc-StatValue">{{ $userFavoritedBookCount }}</span>
                                </span>
                            </li>
                            <li class="twPc-ArrangeSizeFit">
                                <span class="userInfocolor">
                                    <span class="twPc-StatLabel twPc-block">Following</span>
                                    <span class="twPc-StatValue">{{ $userfollowingCount }}</span>
                                </span>
                            </li>
                            <li class="twPc-ArrangeSizeFit">
                                <sapn class="userInfocolor">
                                    <span class="twPc-StatLabel twPc-block">Followers</span>
                                    <span class="twPc-StatValue">{{ $userfollowersCount }}</span>
                                </sapn>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- code end -->

            <div class="panel col-md-6 col-md-offset-1">
                <div class="panel">
                    <div class="panel-body">
                        <h3 class="userInfoDesc"><u>Users Description</u> : </h3>
                        <span>
                            @if($user->profile->bio)
                                {{ $user->profile->bio }}
                            @endif
                        </span>
                    </div>
                    <div class="panel-heading">
                        <button>{!! link_to('/user/'.$user->profile->user_id.'/favorites', 'Favorite List' ) !!}</button>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection

