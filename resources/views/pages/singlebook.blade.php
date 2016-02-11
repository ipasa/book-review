<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>My Book | My Review</title>

    <link href='http://fonts.googleapis.com/css?family=Lato:200,400,700|Kaushan+Script|Montserrat' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway:100,500|Merriweather' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">

    {{--Custom Script For Read me section--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="{{ URL::asset('js/jquery.showmore.min.js') }}"></script>

    {{--Script for jquery cookie plugin--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>


    <style>
        html {
            overflow-y: scroll;
        }
        /* Shore more styles */
        .showmore_content {
            position: relative;
            overflow: hidden;
        }

        .showmore_trigger {
            width: 100%;
            height: 45px;
            line-height: 45px;
            cursor: pointer;
        }

        .showmore_trigger span {
            display: block;
        }
    </style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
@include('partials/navigation')
<!-- HERO SECTION -->
<div class="hero page_title">
    <div class="container">
        <div class="row">
            <div class="loop-meta">
                <h2 class="page_title col-md-offset-1">Book</h2>
            </div>
            <!-- .loop-meta -->
            <nav class="tokokoo-breadcrumb breadcrumb-trail breadcrumbs col-md-offset-1" itemprop="breadcrumb">
                {!! link_to('/', 'Home') !!} /
                {!! link_to('/category/'.$bookdetails->category_id, $bookdetails->category->name) !!} /
                <span class="trail-end">{{ $bookdetails->title }}</span>
            </nav>
        </div>
    </div>
</div>
<!-- END OF HERO SECTION -->

<!-- CONTENT SECTION -->
<div class="container-fluid">
    <div class="content">
        <div class="row">

            <!-- BOOK DESCRIPTION AND REVIEw SECTION -->
            <section class="col-md-9 content_inner">
                <div class="col-md-5">
                    <img src="{{ $bookdetails->cover_image }}" alt="" class="img-responsive book-image">

                    <!-- WISH LIST SECTION -->
                        {{--<div class="wishlist-button white-bg">--}}
                            {{--<a href="#" class="add_to_wishlist add_to_cart_button">Add to Wishlist</a>--}}
                        {{--</div>--}}

                        {{--<span class="wishlist-button white-bg" style='float: right'>--}}
                        <span style='float: right'>
                            {{--<span class="love-text">Want to - </span><i class="fa fa-heart-o"></i>--}}
                            {{--<span class="love-text">You <i class="fa fa-heart"></i> this book</span>--}}
                            {{--<span class="love-text">@include('partials/form-button') </span>--}}

                            @if(Auth::check())
                                @if($favorited=in_array($bookdetails->id, $favorites_list))
                                    {!! Form::open(['method'=>'DELETE', 'route' => ['favorites.destroy', $bookdetails->id]]) !!}
                                @else
                                    {!! Form::open(['route' => 'favorites.store','method' => 'post']) !!}
                                    {!! Form::hidden('book-id', $bookdetails->id) !!}
                                @endif
                                    <button type="submit" class="btn-naked">
                                        <i class="fa fa-heart {{ $favorited ? 'favorited':'not-favorated' }}"></i>
                                    </button>

                                    {!! Form::close() !!}
                            @endif

                        </span>
                    <!-- WISH LIST SECTION -->
                </div>

                <!-- BOOK DETAIL'S DESCRIPTION -->
                <div class="col-md-7">
                    <h1 itemprop="name" class="product_title entry-title shadow-title">
                        <strong>{{ $bookdetails->title }}</strong>
                    </h1>
                    <p class="author">By -
                        @foreach($bookdetails->authors as $author)
                            <a href="#">{{ $author->author_name}}</a><span>,</span>
                        @endforeach
                    </p>

                    <div itemprop="description">
                        <div itemprop="description">
                            <p class="showmore_one">{{ $bookdetails->description }}</p>
                        </div>

                        <!-- CARAGORIES SECTION -->
                        <div class="col-md-12 col-xs-12 col-sm-4 shadow">
                            <span class="cats">
                                <h2 class="tags">Catagories : </h2>
                                {{--<a class="single-tags" href="#">{{ $bookdetails->category->name }}</a>--}}
                                {!! link_to('/category/'.$bookdetails->category_id, $bookdetails->category->name, array('class'=>'single-tags')) !!}
                            </span>
                        </div>
                        <!-- CARAGORIES SECTION -->

                        <!-- TAGS SECTION -->
                        <div class="col-md-12 col-xs-12 col-sm-4 shadow">
                            <span class="cats">
                                <h2 class="tags">Tags : </h2>
                                @foreach($bookdetails->tags as $tag)
                                    <span>
                                        <a class="single-tags" href="">{{$tag->tag_name}}</a>
                                    </span>
                                @endforeach
                            </span>
                        </div>
                        <!-- TAGS SECTION -->

                        <!-- RATING SECTION -->
                        <div class="col-md-12 col-xs-12 col-sm-4 rating_row">
                            <h2 class="rating">Rating : </h2>
                            <?php $totalRating = 0; ?>
                            @foreach($bookdetails->comments as $comments)
                                <?php $totalRating = $comments->score_tag+$totalRating; ?>
                            @endforeach
                            {{--<p class="stars">--}}
                                    {{--<span>--}}
                                        {{--<i class="fa fa-star"></i>--}}
                                        {{--<i class="fa fa-star"></i>--}}
                                        {{--<i class="fa fa-star"></i>--}}
                                        {{--<i class="fa fa-star-o"></i>--}}
                                        {{--<i class="fa fa-star-o"></i>--}}
                                    {{--</span>--}}
                            {{--</p>--}}
                            @if($bookdetails->comments->count()>0)
                                <?php
                                    $bookRating =   $totalRating/$bookdetails->comments->count();
                                    $i = round($bookRating);
                                ?>
                                {{--?{{ dd($i) }}--}}
                                <!-- USER SINGLE RATING -->
                                <span>
                                    <p class="stars">
                                        <div class="grating">Rating -</div>
                                        <span>
                                            @for($j=1;$j<=$i;$j++)
                                                <i class="fa fa-star"></i>
                                            @endfor
                                            @for($j=1;$j<=10-$i;$j++)
                                                <i class="fa fa-star-o"></i>
                                            @endfor
                                        </span>
                                    </p>
                                </span>
                                <!-- END OF USER SINGLE RATING -->
                            @else
                                <p class="stars">
                                    <div class="grating">Rating -</div>
                                    <span>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </span>
                                </p>
                            @endif
                        </div>
                        <!-- RATING SECTION -->

                    </div>
                </div>
                <!-- END OF BOOK DETAIL'S DESCRIPTION -->


                <!-- BOOKREVIEW BY USER ALL -->
                <!-- REVIEw FORM -->
                <div class="col-md-12 col-sm-12">
                    <div id="review_form_wrapper">
                        <div id="review_form">
                            <div class="border-top-bottom">
                                <h2 class="button">Give a Review</h2>
                            </div>
                            <div id="respond" class="comment-respond">
                                <h3 id="reply-title" class="comment-reply-title">
                                    <i>Want's to give a review to “{{ $bookdetails->title }}”</i>
                                </h3>

                                {{--Comment Submit form--}}
                                @include('pages.comment')
                            </div>
                            <!-- #respond -->
                        </div>
                    </div>
                </div>
                <!-- END OF REVIEw FORM  -->

                <div class="col-md-12 review_section">
                    <div class="border-top-bottom">
                        <h2 class="button">Review ({{ $bookdetails->comments->count() }})</h2>
                    </div>
                    <div class="review_panel">
                        <h2>Book Review By Users</h2>
                    </div>

                    <div class="user_indivisual_review">

                        {{--Single person comment--}}
                        @include('partials/comment-show')

                    </div>
                </div>
                <!-- END OF BOOKREVIEW BY USER ALL -->

            </section>
            <!-- BOOK DESCRIPTION AND REVIEw SECTION -->



            <!-- SEARCH SECTION FOR SIDEBAR -->
            <aside class="col-md-3">
                <div class="col-xs-12 col-md-12 col-sm-12 best_selling_section shadow">
                    <h2 class="section_title">SUGGESTED BOOKS</h2>

                    <?php $errors = array_filter($suggestedBooks); ?>

                    @if(empty($errors))
                        <div class="alert alert-warning">
                            <p>Sorry, We dont suggested book for this indivisual book</p>
                        </div>
                    @else
                        <!-- RELATED PRODUCTS slider -->
                        <ul class="products">
                            @foreach($suggestedBooks as $suggestedBook)
                                <li class="col-xs-12 col-sm-6 col-md-6 first last">
                                    <div class="grid">
                                        <figure class="effect-sadie">
                                            <img src="{{ $suggestedBook['book_image'] }}"
                                                 class="" alt="book5-300" height="300px">
                                            <figcaption>
                                                <p>{{ $suggestedBook['book_name'] }}</p>
                                                <a href="#">View more</a>
                                            </figcaption>
                                        </figure>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <!-- RELATED PRODUCTS slider -->
                    @endif
                </div>
            </aside>
            <!-- END OF SEARCH SECTION FOR SIDEBAR -->


        </div>
    </div>
</div>
<!-- END OF CONTENT SECTION -->

{{--<!-- RELATED PRODUCTS -->--}}
{{--<div class="container">--}}
    {{--<div class="row">--}}
        {{--<div class="col-xs-12 col-md-12 col-sm-12 best_selling_section shadow">--}}
            {{--<h2 class="section_title">RELATED PRODUCTS</h2>--}}

            {{--<!-- RELATED PRODUCTS slider -->--}}
            {{--<ul class="products">--}}

                {{--<li class="col-xs-12 col-sm-6 col-md-4 first last">--}}
                    {{--<div class="grid">--}}
                        {{--<figure class="effect-sadie">--}}
                            {{--<img src="{{ URL::asset('images/books/book8-300.jpg') }}" class="" alt="book5-300">--}}
                            {{--<figcaption>--}}
                                {{--<h2>Holy <span>Sadie</span></h2>--}}
                                {{--<p>Sadie never took her eyes off me. <br>She had a dark soul.</p>--}}
                                {{--<a href="#">View more</a>--}}
                                {{--<!-- RATING SECTION -->--}}
                                {{--<div class="row model-review">--}}
                                    {{--<div class="col-md-12 col-xs-12 col-sm-4">--}}
                                        {{--<p class="stars">--}}
                                            {{--<span>--}}
                                                {{--<i class="fa fa-star"></i>--}}
                                                {{--<i class="fa fa-star"></i>--}}
                                                {{--<i class="fa fa-star"></i>--}}
                                                {{--<i class="fa fa-star-o"></i>--}}
                                                {{--<i class="fa fa-star-o"></i>--}}
                                            {{--</span>--}}
                                        {{--</p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<!-- RATING SECTION -->--}}
                            {{--</figcaption>--}}
                        {{--</figure>--}}
                    {{--</div>--}}
                {{--</li>--}}

                {{--<li class="col-xs-12 col-sm-6 col-md-4 first last">--}}

                    {{--<div class="grid">--}}
                        {{--<figure class="effect-sadie">--}}
                            {{--<img src="{{ URL::asset('images/books/book8-300.jpg') }}" class="" alt="book5-300">--}}
                            {{--<figcaption>--}}
                                {{--<h2>Holy <span>Sadie</span></h2>--}}
                                {{--<p>Sadie never took her eyes off me. <br>She had a dark soul.</p>--}}
                                {{--<a href="#">View more</a>--}}
                            {{--</figcaption>--}}
                        {{--</figure>--}}
                    {{--</div>--}}
                {{--</li>--}}

                {{--<li class="col-xs-12 col-sm-6 col-md-4 first last">--}}
                    {{--<div class="grid">--}}
                        {{--<figure class="effect-sadie">--}}
                            {{--<img src="{{ URL::asset('images/books/book8-300.jpg') }}" class="" alt="book5-300">--}}
                            {{--<figcaption>--}}
                                {{--<h2>Holy <span>Sadie</span></h2>--}}
                                {{--<p>Sadie never took her eyes off me. <br>She had a dark soul.</p>--}}
                                {{--<a href="#">View more</a>--}}
                            {{--</figcaption>--}}
                        {{--</figure>--}}
                    {{--</div>--}}
                {{--</li>--}}
            {{--</ul>--}}
            {{--<!-- RELATED PRODUCTS slider -->--}}

        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--<!-- END OF RELATED PRODUCTS -->--}}


{{--<!-- YOU MAY ALSO LIKE -->--}}
{{--<div class="container">--}}
    {{--<div class="row">--}}
        {{--<h2 class="also_like section_title">YOU MAY ALSO LIKE</h2>--}}
        {{--<div class="col-xs-12 col-md-12 col-sm-12 best_selling_section shadow">--}}
            {{--<!-- RELATED PRODUCTS slider -->--}}
            {{--<ul class="products">--}}

                {{--<li class="col-xs-12 col-sm-6 col-md-3 first last">--}}
                    {{--<div class="grid">--}}
                        {{--<figure class="effect-sadie">--}}
                            {{--<img src="{{ URL::asset('images/books/book8-300.jpg') }}" class="" alt="book5-300">--}}
                            {{--<figcaption>--}}
                                {{--<h2>Holy <span>Sadie</span></h2>--}}
                                {{--<p>Sadie never took her eyes off me. <br>She had a dark soul.</p>--}}
                                {{--<a href="#">View more</a>--}}
                                {{--<!-- RATING SECTION -->--}}
                                {{--<div class="row model-review">--}}
                                    {{--<div class="col-md-12 col-xs-12 col-sm-4">--}}
                                        {{--<p class="stars">--}}
                                                    {{--<span>--}}
                                                        {{--<i class="fa fa-star"></i>--}}
                                                        {{--<i class="fa fa-star"></i>--}}
                                                        {{--<i class="fa fa-star"></i>--}}
                                                        {{--<i class="fa fa-star-o"></i>--}}
                                                        {{--<i class="fa fa-star-o"></i>--}}
                                                    {{--</span>--}}
                                        {{--</p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<!-- RATING SECTION -->--}}
                            {{--</figcaption>--}}
                        {{--</figure>--}}
                    {{--</div>--}}
                {{--</li>--}}

                {{--<li class="col-xs-12 col-sm-6 col-md-3 first last">--}}

                    {{--<div class="grid">--}}
                        {{--<figure class="effect-sadie">--}}
                            {{--<img src="{{ URL::asset('images/books/book8-300.jpg') }}" class="" alt="book5-300">--}}
                            {{--<figcaption>--}}
                                {{--<h2>Holy <span>Sadie</span></h2>--}}
                                {{--<p>Sadie never took her eyes off me. <br>She had a dark soul.</p>--}}
                                {{--<a href="#">View more</a>--}}
                            {{--</figcaption>--}}
                        {{--</figure>--}}
                    {{--</div>--}}
                {{--</li>--}}

                {{--<li class="col-xs-12 col-sm-6 col-md-3 first last">--}}

                    {{--<div class="grid">--}}
                        {{--<figure class="effect-sadie">--}}
                            {{--<img src="{{ URL::asset('images/books/book8-300.jpg') }}" class="" alt="book5-300">--}}
                            {{--<figcaption>--}}
                                {{--<h2>Holy <span>Sadie</span></h2>--}}
                                {{--<p>Sadie never took her eyes off me. <br>She had a dark soul.</p>--}}
                                {{--<a href="#">View more</a>--}}
                            {{--</figcaption>--}}
                        {{--</figure>--}}
                    {{--</div>--}}
                {{--</li>--}}

                {{--<li class="col-xs-12 col-sm-6 col-md-3 first last">--}}

                    {{--<div class="grid">--}}
                        {{--<figure class="effect-sadie">--}}
                            {{--<img src="{{ URL::asset('images/books/book8-300.jpg') }}" class="" alt="book5-300">--}}
                            {{--<figcaption>--}}
                                {{--<h2>Holy <span>Sadie</span></h2>--}}
                                {{--<p>Sadie never took her eyes off me. <br>She had a dark soul.</p>--}}
                                {{--<a href="#">View more</a>--}}
                            {{--</figcaption>--}}
                        {{--</figure>--}}
                    {{--</div>--}}
                {{--</li>--}}

                {{--<li class="col-xs-12 col-sm-6 col-md-3 first last">--}}

                    {{--<div class="grid">--}}
                        {{--<figure class="effect-sadie">--}}
                            {{--<img src="{{ URL::asset('images/books/book8-300.jpg') }}" class="" alt="book5-300">--}}
                            {{--<figcaption>--}}
                                {{--<h2>Holy <span>Sadie</span></h2>--}}
                                {{--<p>Sadie never took her eyes off me. <br>She had a dark soul.</p>--}}
                                {{--<a href="#">View more</a>--}}
                            {{--</figcaption>--}}
                        {{--</figure>--}}
                    {{--</div>--}}
                {{--</li>--}}

            {{--</ul>--}}
            {{--<!-- RELATED PRODUCTS slider -->--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--<!-- END OF YOU MAY ALSO LIKE -->--}}

<!-- FOOTER SECTION -->
<section class="footer-bottom">
    &copy; Hasan Hafiz Pasha &amp; Mahadi Hasan Raju. All rights reserved.
</section>
<!-- END OF FOOTER SECTION -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ URL::asset('js/bootstrap.js') }}"></script>
<script>
    $(document).ready(function () {

        $("#submit").click(function () {
            var comment = $('textarea#comment').val();
//            alert(comment);
            var book_id = $('#book_id').val();
            var url = "https://api.meaningcloud.com/sentiment-2.0?key=9d12767d706b2e40a749598267f1ee82&of=json&txt=" + comment + "&model=general_en&ud=the-avengers";
            $.ajax({
                url: url,
                type: 'POST',
                data: {comment: comment},
                dataType: 'json',
                success: function (data) {
//                    alert(data.score_tag)
                    $.ajax({
                        url: "<?php  echo url('comment_save');?>",
                        data: {score_tag: data.score_tag, book_id: book_id, comment: comment},
                        type: 'GET',
                        success: function (data) {
//                            alert(data);
                            window.location = data;
                        }, error: function (data) {
                            console.log(data)
                        }
                    });
                },
                error: function () {
                    alert("ERROR");
                }
            });
        });
    });
</script>
{{--<script type="text/javascript">--}}
  {{--$(document).ready(function(){--}}
    {{--$('.showmore_one').showMore({--}}
        {{--speedDown: 300,--}}
        {{--speedUp: 300,--}}
        {{--height: '10px',--}}
        {{--showText: 'Show more <i class="fa fa-chevron-down"></i>',--}}
        {{--hideText: 'Show less <i class="fa fa-chevron-up"></i>'--}}
    {{--});--}}
  {{--});--}}
{{--</script>--}}

</body>
</html>
