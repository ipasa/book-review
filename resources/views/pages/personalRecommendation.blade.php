@extends('layouts.master')

@section('content')

    <div class="container-fluid full-color mar-top-50">

        <header class="Header-favorite">
            <div class="Banner">
                <h1 class="Banner__heading utility-center">
                    Suggestion
                    <span class="utility-text-little utility-muted">
                      Book Recomendation
                    </span>
                </h1>
            </div>
        </header>

        <section class="row">
            <div class="Grid__column col-md-8 col-md-offset-2 centered">
                <ul class="Lesson-List ">

                    @foreach($items as $item)
                        <li class="Lesson-List__item">
                            <span class="Lesson-List__status">
                              <i class="fa fa-check-circle-o material-icons"></i>
                            </span>

                            <span class="Lesson-List__title utility-flex">
                              <a class="green" href="http://localhost:8000/book/{{ $item['book_id'] }}">
                                    {{ $item['book_name'] }}
                                </a>
                            </span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
    </div>
@endsection