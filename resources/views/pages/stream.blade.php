@extends('layouts.master')

@section('content')

    <div class="full-color mar-top-50">

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
            <div class="Grid__column col-md-8 col-md-offset-2 centered">
                <ul class="Lesson-List ">

                    @foreach($users as $user)
                    <li class="Lesson-List__item">
                        <span class="Lesson-List__status">
                          <i class="fa fa-check-circle-o material-icons"></i>
                        </span>

                        <span class="Lesson-List__title utility-flex">
                          <a class="green" href="/series/laravel-5-and-the-front-end">
                              {{ $user->user_id }}
                          </a> Likes
                          <a class="green" href="/series/laravel-5-and-the-front-end/episodes/1">
                              {{ $user->book_id }}
                          </a>
                        </span>

                        <span class="Lesson-List__date">
                            {{ date('F d, Y', strtotime($user->created_at)) }}
                        </span>
                    </li>
                    @endforeach
                </ul>
                {!! $users->render() !!}
            </div>
        </section>

    </div>
@endsection

