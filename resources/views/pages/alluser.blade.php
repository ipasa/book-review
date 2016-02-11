@extends('layouts.master')

@section('content')
    <div class="container mar-top-50">
        @foreach(array_chunk($users->all(),3) as $row)
            <div class="row" style="margin-bottom: 10px">
                @foreach($row as $user)
                    {{--<div class="panel panel-default col-md-4">--}}
                        {{--<a href="http://localhost:8000/user/{{$user->id}}">{{ $user->name }}</a>--}}
                        {{-----}}
                        {{--@if(Auth::check())--}}
                            {{--@unless($user->id===Auth::id())--}}
                                {{--@include('partials.follow-form')--}}
                            {{--@endunless--}}
                        {{--@endif--}}
                    {{--</div>--}}
                    <!-- code start -->
                    <div class="col-md-4">
                        <div class="twPc-div">
                            <a class="twPc-bg twPc-block"></a>

                            <div>
                                <div class="twPc-button">
                                    <!-- Twitter Button | you can get from: https://about.twitter.com/tr/resources/buttons#follow -->
                                    {{--<a href="https://twitter.com/mertskaplan" class="twitter-follow-button">Follow @mertskaplan</a>--}}
                                    @if(Auth::check())
                                        @unless($user->id===Auth::id())
                                            @include('partials.follow-form')
                                        @endunless
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
                                        <a href="http://localhost:8000/user/{{$user->id}}">{{ $user->name }}</a>
                                    </div>

                                    {{--<span>--}}
                                        {{--<a href="https://twitter.com/mertskaplan">@<span>mertskaplan</span></a>--}}
                                    {{--</span>--}}
                                </div>

                                <?php
                                    $id =   $user->id;
                                    $userFavoritedBookCount =   \DB::table('favorites')->where('user_id', $id)->count();
                                    $userfollowingCount     =   \DB::table('follows')->where('follower_id', $id)->count();
                                    $userfollowersCount     =   \DB::table('follows')->where('followed_id', $id)->count();
                                ?>

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
                        </div><!-- code end -->
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
@endsection