

@extends('layouts.master')

@section('content')

    <section class="instagram-wrap">
        <div class="container-fluid mar-top-50">

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

            <div class="instagram-content">
                <div class="row">

                    @foreach($items as $aCategoryDetail)
                            <!-- SINGLE BOOK REVIEe -->
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 feed_shadow">
                        <div class="photo-box">
                            <div class="image-wrap">
                                <img src="{{ $aCategoryDetail['book_image'] }}" height="400px">
                                <div class="book-info">
                                    <p>{{ $aCategoryDetail['book_name'] }}</p>
                                </div>

                                <div class="book-cata">
                                    <p>Catagories : {{ $aCategoryDetail['book_cate'] }}</p>
                                </div>
                            </div>

                            <div class="description">
                                <a href="{{ action('BookController@singleBook', $aCategoryDetail['book_id']) }}">{{ $aCategoryDetail['book_name'] }}</a>
                                {{--<div class="date">{{ $aCategoryDetail['rating'] }}</div>--}}
                            </div>
                        </div>
                    </div>
                    <!-- END OF SINGLE BOOK REVIEe -->
                    @endforeach

                </div>
            </div>

        </div>
    </section>
@endsection