@extends('layouts.master')

@section('content')

    <section class="instagram-wrap">
        <div class="container-fluid">

            <div class="catagory_heading">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Catagory : {{ $categoryName->name }}</h3>
                    </div>
                </div>
            </div>

            <div class="instagram-content">
                <div class="row">

                    @foreach($aCategoryDetails as $aCategoryDetail)
                        <!-- SINGLE BOOK REVIEe -->
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 feed_shadow">
                            <div class="photo-box">
                                <div class="image-wrap">
                                    <img src="{{ $aCategoryDetail->cover_image }}" height="400px">
                                    <div class="book-info">
                                        <p>{{ $aCategoryDetail->title }}</p>
                                    </div>
                                    <div class="book-cata">
                                        <p>Catagories : {{ $aCategoryDetail->category->name }}</p>
                                    </div>
                                    {{--<div class="likes">309 Likes</div>--}}

                                    <div class="likes">
                                        <p class="stars">
                                            <span>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </span>
                                        </p>
                                    </div>
                                </div>

                                <div class="description">
                                    <a href="{{ action('BookController@singleBook', $aCategoryDetail->id) }}">{{ $aCategoryDetail->title }}</a>
                                    <div class="date">{{ $aCategoryDetail->date_release }}</div>
                                </div>
                            </div>
                        </div>
                        <!-- END OF SINGLE BOOK REVIEe -->
                    @endforeach

                </div>
            </div>
            <span class="pull-right">
                {!! $aCategoryDetails->render() !!}
            </span>

        </div>
    </section>
@endsection