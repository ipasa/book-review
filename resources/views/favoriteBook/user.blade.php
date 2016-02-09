@extends('layouts.master')

@section('content')

    <div class="container full-color mar-top-50">

        <header class="Header-favorite">
            <div class="Banner">
                <h1 class="Banner__heading utility-center">
                    {{ $name->name }} Favorites
            <span class="utility-text-little utility-muted">
              You're a fan of {{ $favorites->count() }} books.
            </span>
                </h1>
            </div>
        </header>

        <section class="row">
            <div class="Grid__column col-md-6 col-md-offset-3 centered">
                @if($favorites->count())
                    @foreach($favorites as $favorite)
                        <ul class="Lesson-List ">
                            <li class="Lesson-List__item">
                                <span class="Lesson-List__status">
                                  <i class="fa fa-check-circle-o material-icons"></i>
                                </span>

                                <span class="Lesson-List__title utility-flex">
                                  <a class="green" href="/series/laravel-5-and-the-front-end">
                                      {{$favorite->title}}
                                  </a><br>
                                  <a class="green" href="/series/laravel-5-and-the-front-end/episodes/1">Catagory Name</a>
                                </span>

                                <span class="Lesson-List__date">
                                  Nov 25th, 2014
                                </span>
                            </li>

                        </ul>
                    @endforeach

                @else
                    <p>No Book in favorite list</p>
                @endif
            </div>
        </section>
    </div>

@endsection

