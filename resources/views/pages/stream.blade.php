@extends('layouts.master')

@section('content')

    <div class="container-fluid full-color mar-top-50">

        <header class="Header-favorite">
            <div class="Banner">
                <h1 class="Banner__heading utility-center">
                    Stream
            <span class="utility-text-little utility-muted">
              Live Stream to our entire web application
            </span>
                </h1>
            </div>
        </header>

        <section class="row">
            <div class="Grid__column col-md-8 centered">
                <ul class="Lesson-List ">

                    @foreach($items as $item)
                        <li class="Lesson-List__item">
                            {{--<span class="Lesson-List__status">--}}
                              {{--<i class="fa fa-check-circle-o material-icons"></i>--}}
                            {{--</span>--}}

                            {{--<span class="Lesson-List__title utility-flex streamSigle">--}}
                              {{--<a class="green" href="/series/laravel-5-and-the-front-end">--}}
                                  {{--{{ $item['col1'] }}--}}
                              {{--</a>--}}
                                {{--@if($item['col3'] == 'c')--}}
                                    {{--<span class="canFollowSingle">Comment</span>--}}
                                {{--@elseif($item['col3'] == 'follow')--}}
                                    {{--<span class="canFollowSingle">Follow</span>--}}
                                {{--@else--}}
                                    {{--<span class="canFollowSingle">Favorites</span>--}}
                                {{--@endif--}}
                                {{--<a class="green" href="/series/laravel-5-and-the-front-end/episodes/1">--}}
                                    {{--{{ $item['col2'] }}--}}
                                {{--</a>--}}
                            {{--</span>--}}

                            @if($item['col3'] == 'c')
                                <span class="Lesson-List__status">
                                    <i class="fa fa-check-circle-o material-icons"></i>
                                </span>

                                <span class="Lesson-List__title utility-flex streamSigle">
                                    {{--<a class="green" href="/series/laravel-5-and-the-front-end">--}}
                                      {{--{{ $item['col1'] }}--}}
                                    {{--</a>--}}
                                    {!! link_to('/user/'.$item['col5'], $item['col1'], array('class'=>"green")) !!}
                                    <span class="canFollowSingle">Comment</span>

                                    {{--<a class="green" href="{{link_to('/book/'.$item['col6'])}}">--}}
                                        {{--{{ $item['col2'] }}--}}
                                    {{--</a>--}}
                                    {!! link_to('/book/'.$item['col6'], $item['col2'], array('class'=>"green")) !!}
                                </span>
                            @elseif($item['col3'] == 'follow')
                                <span class="Lesson-List__status">
                                  <i class="fa fa-check-circle-o material-icons"></i>
                                </span>

                                <span class="Lesson-List__title utility-flex streamSigle">
                                  {{--<a class="green" href="/series/laravel-5-and-the-front-end">--}}
                                      {{--{{ $item['col1'] }}--}}
                                  {{--</a>--}}
                                  {!! link_to('/user/'.$item['col5'], $item['col1'], array('class'=>"green")) !!}
                                <span class="canFollowSingle">Follow</span>
                                {{--<a class="green" href="/series/laravel-5-and-the-front-end/episodes/1">--}}
                                    {{--{{ $item['col2'] }}--}}
                                {{--</a>--}}
                                {!! link_to('/user/'.$item['col6'], $item['col2'], array('class'=>"green")) !!}
                                </span>
                            @else
                                <span class="Lesson-List__status">
                                  <i class="fa fa-check-circle-o material-icons"></i>
                                </span>

                                <span class="Lesson-List__title utility-flex streamSigle">
                                    {{--<a class="green" href="/series/laravel-5-and-the-front-end">--}}
                                      {{--{{ $item['col1'] }}--}}
                                    {{--</a>--}}
                                    {!! link_to('/user/'.$item['col5'], $item['col1'], array('class'=>"green")) !!}
                                    <span class="canFollowSingle">Favorites</span>

                                    {{--<a class="green" href="/series/laravel-5-and-the-front-end/episodes/1">--}}
                                        {{--{{ $item['col2'] }}--}}
                                    {{--</a>--}}
                                    {!! link_to('/book/'.$item['col6'], $item['col2'], array('class'=>"green")) !!}
                                </span>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="Grid__column col-md-4 left">
                <ul class="Lesson-List" id="users">
                    <li v-repeat="user:users" class="Lesson-List__item">
                        <span class="Lesson-List__status">
                              <i class="fa fa-heart-o"></i>
                        </span>

                        <span class="Lesson-List__title utility-flex realTimestream">
                            @{{ user.name }} favorited @{{ user.bookname }}
                        </span>
                    </li>
                </ul>
            </div>
        </section>
    </div>
    <script src="https://js.pusher.com/3.0/pusher.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/0.12.9/vue.js"></script>
    <script>
        new Vue({
            el: '#users',
            data:{
                users:[]
            },
            ready:function(){
                var pusher = new Pusher('eac2641ea059cc85dd7d', {
                    encrypted: true
                });

                pusher.subscribe('test')
                        .bind('App\\Events\\UserHasfavorited', this.addUser);
            },
            methods:{
                addUser:function(user){
                    this.users.push(user);
                }
            }

        })
    </script>
@endsection