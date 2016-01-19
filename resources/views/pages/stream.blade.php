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
                    <li class="Lesson-List__item">
                        <span class="Lesson-List__status">
                          <i class="fa fa-check-circle-o material-icons"></i>
                        </span>

                        <span class="Lesson-List__title utility-flex">
                          <a class="green" href="/series/laravel-5-and-the-front-end">
                              Hi all how are you all today
                          </a><br>
                          <a class="green" href="/series/laravel-5-and-the-front-end/episodes/1">
                              Catagory Name
                          </a>
                        </span>

                        <span class="Lesson-List__date">
                          Nov 25th, 2014
                        </span>
                    </li>

                    <li class="Lesson-List__item">
                        <span class="Lesson-List__status">
                          <i class="fa fa-check-circle-o material-icons"></i>
                        </span>

                        <span class="Lesson-List__title utility-flex">
                          <a class="green" href="/series/laravel-5-and-the-front-end">
                              Hi all how are you all today
                          </a><br>
                          <a class="green" href="/series/laravel-5-and-the-front-end/episodes/1">
                              Catagory Name
                          </a>
                        </span>

                        <span class="Lesson-List__date">
                          Nov 25th, 2014
                        </span>
                    </li>
                </ul>
            </div>
        </section>
    </div>
@endsection

