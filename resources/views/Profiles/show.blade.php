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

        <div class="row panel">
            <div class="col-md-4 bg_blur ">
                <a href="#" class="follow_btn hidden-xs">Follow</a>
            </div>
            <div class="col-md-8  col-xs-12">
                <img src="http://lorempixel.com/image_output/people-q-g-150-150-2.jpg" class="img-thumbnail picture hidden-xs" />
                <img src="http://lorempixel.com/image_output/people-q-g-150-150-2.jpg" class="img-thumbnail visible-xs picture_mob" />
                <div class="header">
                    <h1>Lorem Ipsum</h1>
                    <h4>Web Developer</h4>
                    <span>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."
    "There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain..."</span>
                </div>
            </div>
        </div>

        <div class="row nav">
            <div class="col-md-4"></div>
            <div class="col-md-8 col-xs-12" style="margin: 0px;padding: 0px;">
                <div class="col-md-4 col-xs-4 well"><i class="fa fa-weixin fa-lg"></i> 16</div>
                <div class="col-md-4 col-xs-4 well"><i class="fa fa-heart-o fa-lg"></i> 14</div>
                <div class="col-md-4 col-xs-4 well"><i class="fa fa-thumbs-o-up fa-lg"></i> 26</div>
            </div>
        </div>


    </div>
@endsection

