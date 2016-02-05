@extends('layouts.master')

@section('content')
    <div class="container mar-top-50">
        @foreach(array_chunk($users->all(),3) as $row)
            <div class="row" style="margin-bottom: 10px">
                @foreach($row as $user)
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
                                    <img alt="Mert Salih Kaplan" src="https://pbs.twimg.com/profile_images/378800000352678934/34f9e192635975bf42e534434e2b6273_bigger.jpeg" class="twPc-avatarImg">
                                </a>

                                <div class="twPc-divUser">
                                    <div class="twPc-divName">
                                        <a href="http://localhost:8000/user/{{$user->id}}">{{ $user->name }}</a>
                                    </div>

                                    {{--<span>--}}
                                    {{--<a href="https://twitter.com/mertskaplan">@<span>mertskaplan</span></a>--}}
                                    {{--</span>--}}
                                </div>

                                <div class="twPc-divStats">
                                    <ul class="twPc-Arrange">
                                        <li class="twPc-ArrangeSizeFit">
                                            <a href="https://twitter.com/mertskaplan" title="9.840 Tweet">
                                                <span class="twPc-StatLabel twPc-block">Tweets</span>
                                                <span class="twPc-StatValue">9.840</span>
                                            </a>
                                        </li>
                                        <li class="twPc-ArrangeSizeFit">
                                            <a href="https://twitter.com/mertskaplan/following" title="885 Following">
                                                <span class="twPc-StatLabel twPc-block">Following</span>
                                                <span class="twPc-StatValue">885</span>
                                            </a>
                                        </li>
                                        <li class="twPc-ArrangeSizeFit">
                                            <a href="https://twitter.com/mertskaplan/followers" title="1.810 Followers">
                                                <span class="twPc-StatLabel twPc-block">Followers</span>
                                                <span class="twPc-StatValue">1.810</span>
                                            </a>
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