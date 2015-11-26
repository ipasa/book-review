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
<!-- HERO SECTION -->
<div class="hero page_title">
    <div class="container">
        <div class="row">
            <div class="loop-meta">
                <h2 class="page_title col-md-offset-1">Book</h2>
            </div>
            <!-- .loop-meta -->
            <nav class="tokokoo-breadcrumb breadcrumb-trail breadcrumbs col-md-offset-1" itemprop="breadcrumb">
                <a class="home" href="#">Home</a> / <a href="#">Programming</a> /
                <span class="trail-end">Professional Ajax, 2nd Edition</span>
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
                    <img src="{{ URL::asset('uploads/'.$bookdetails->cover_image) }}" alt="" class="img-responsive book-image">

                    <!-- WISH LIST SECTION -->
                        <div class="wishlist-button white-bg">
                            <a href="#" class="add_to_wishlist add_to_cart_button">Add to Wishlist</a>
                        </div>

                        <span class="wishlist-button white-bg" style='float: right'>
                            {{--<span class="love-text">Want to - </span><i class="fa fa-heart-o"></i>--}}
                            <span class="love-text">You <i class="fa fa-heart"></i> this book</span>
                        </span>
                    <!-- WISH LIST SECTION -->
                </div>

                <!-- BOOK DETAIL'S DESCRIPTION -->
                <div class="col-md-7">
                    <h1 itemprop="name" class="product_title entry-title">{{ $bookdetails->title }}</h1>
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
                        <div class="col-md-12 col-xs-12 col-sm-4">
                            <span class="cats">
                                <h2 class="tags">Catagories : </h2>
                                <a class="single-tags" href="#">{{ $bookdetails->category->name }}</a>
                            </span>
                        </div>
                        <!-- CARAGORIES SECTION -->

                        <!-- TAGS SECTION -->
                        <div class="col-md-12 col-xs-12 col-sm-4">
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
                                <h3 id="reply-title" class="comment-reply-title">Be the first to review “Professional JavaScript for Web Developers”
                                </h3>

                                <form action="#" method="post" id="commentform" class="comment-form" _lpchecked="1">
                                    <p class="comment-form-comment">
                                        <label for="comment" class="greview">Your Review</label>
                                        <textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
                                    </p>
                                    <p class="form-submit">
                                        <input name="submit" type="submit" id="submit" class="submit" value="Submit">
                                    </p>
                                </form>
                            </div>
                            <!-- #respond -->
                        </div>
                    </div>
                </div>
                <!-- END OF REVIEw FORM  -->

                <div class="col-md-12 review_section">
                    <div class="border-top-bottom">
                        <h2 class="button">Review (2)</h2>
                    </div>
                    <div class="review_panel">
                        <h2>Book Review By Users</h2>
                    </div>

                    <div class="user_indivisual_review">
                        <div class="single_user">
                            <img src="images/user/david-bushell-reviewer.png" alt="">
                            <span class="reviewer_name">— David Bushell</span>
                            <!-- USER SINGLE RATING -->
                                    <span>
                                        <p class="stars reviewer_rating">
                                            <div class="grating">Rating - </div>
                                            <span>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </span>
                                        </p>
                                    </span>
                            <!-- END OF USER SINGLE RATING -->
                            <blockquote class="user_blockquote">“I’ll cut to the chase for those deliberating a purchase: it’s well worth the cover price. The eBook edition is a steal! This book establishes a mindset of understanding and exploring the medium. It embraces the breadth of its domain and will set you on an exciting path.cut to the chase for those deliberating a purchase: it’s well worth the cover price. The eBook edition is a steal! This book establishes a mindset of understanding and exploring the medium. It embraces the breadth of its domain and will set you on an exciting path.”</blockquote>
                        </div>

                        <div class="single_user">
                            <img src="images/user/david-bushell-reviewer.png" alt="">
                            <span class="reviewer_name">— David Bushell</span>
                                    <span>
                                        <p class="stars reviewer_rating">
                                            <div class="grating">Rating - </div>
                                            <span>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </span>
                                        </p>
                                    </span>
                            <blockquote class="user_blockquote">“I’ll cut to the chase for those deliberating a purchase: it’s well worth the cover price. The eBook edition is a steal! This book establishes a mindset of understanding and exploring the medium. It embraces the breadth of its domain and will set you on an exciting path.cut to the chase for those deliberating a purchase: it’s well worth the cover price. The eBook edition is a steal! This book establishes a mindset of understanding and exploring the medium. It embraces the breadth of its domain and will set you on an exciting path.”</blockquote>
                        </div>
                    </div>
                </div>
                <!-- END OF BOOKREVIEW BY USER ALL -->

            </section>
            <!-- BOOK DESCRIPTION AND REVIEw SECTION -->



            <!-- SEARCH SECTION FOR SIDEBAR -->
            <aside class="col-md-3">
                <div class="book_search widget_book_search">
                    <div class="widget_content">
                        <h2 class="widget_title">Find
                            <strong>Product</strong>
                        </h2>
                        <form action="http://tokokoodemo.us/papirus/books/" method="get" role="search" _lpchecked="1">
                            <input type="text" name="s" placeholder="Find Products">
                            <select name="product_cat" id="product_cat" class="postform">
                                <option value="0" selected="selected">All Categories</option>
                                <option class="level-0" value="programming">Programming</option>
                                <option class="level-0" value="web-design">Web Design</option>
                                <option class="level-0" value="javascript">Javascript</option>
                                <option class="level-0" value="web-application">Web Application</option>
                                <option class="level-0" value="html5">HTML5</option>
                                <option class="level-0" value="seo">SEO</option>
                            </select>

                            <select name="authors" id="authors" class="postform">
                                <option value="0" selected="selected">All Authors</option>
                                <option class="level-0" value="thoriq-firdaus">Thoriq Firdaus</option>
                                <option class="level-0" value="tim-kadlec">Tim Kadlec</option>
                                <option class="level-0" value="steve-krug">Steve Krug</option>
                                <option class="level-0" value="susan-weinschenk">Susan Weinschenk</option>
                                <option class="level-0" value="austin-kleon">Austin Kleon</option>
                                <option class="level-0" value="ellen-lupton">Ellen Lupton</option>
                                <option class="level-0" value="patrick-mcneil">Patrick McNeil</option>
                                <option class="level-0" value="brian-miller">Brian Miller</option>
                                <option class="level-0" value="kyle-simpson">Kyle Simpson</option>
                                <option class="level-0" value="nicholas-c-zakas">Nicholas C. Zakas</option>
                            </select>

                            <input type="submit" class="button" value="Search">
                            <input type="hidden" name="post_type" value="product">
                        </form>
                    </div>
                </div>
            </aside>
            <!-- END OF SEARCH SECTION FOR SIDEBAR -->

        </div>
    </div>
</div>
<!-- END OF CONTENT SECTION -->

<!-- RELATED PRODUCTS -->
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-12 col-sm-12 best_selling_section shadow">
            <h2 class="section_title">RELATED PRODUCTS</h2>

            <!-- RELATED PRODUCTS slider -->
            <ul class="products">

                <li class="col-xs-12 col-sm-6 col-md-4 first last">
                    <div class="grid">
                        <figure class="effect-sadie">
                            <img src="images/books/book6-300.jpg" class="" alt="book5-300">
                            <figcaption>
                                <h2>Holy <span>Sadie</span></h2>
                                <p>Sadie never took her eyes off me. <br>She had a dark soul.</p>
                                <a href="#">View more</a>
                                <!-- RATING SECTION -->
                                <div class="row model-review">
                                    <div class="col-md-12 col-xs-12 col-sm-4">
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
                                <!-- RATING SECTION -->
                            </figcaption>
                        </figure>
                    </div>
                </li>

                <li class="col-xs-12 col-sm-6 col-md-4 first last">

                    <div class="grid">
                        <figure class="effect-sadie">
                            <img src="images/books/book8-300.jpg" class="" alt="book5-300">
                            <figcaption>
                                <h2>Holy <span>Sadie</span></h2>
                                <p>Sadie never took her eyes off me. <br>She had a dark soul.</p>
                                <a href="#">View more</a>
                            </figcaption>
                        </figure>
                    </div>
                </li>

                <li class="col-xs-12 col-sm-6 col-md-4 first last">
                    <div class="grid">
                        <figure class="effect-sadie">
                            <img src="images/books/book7-300.jpg" class="" alt="book5-300">
                            <figcaption>
                                <h2>Holy <span>Sadie</span></h2>
                                <p>Sadie never took her eyes off me. <br>She had a dark soul.</p>
                                <a href="#">View more</a>
                            </figcaption>
                        </figure>
                    </div>
                </li>
            </ul>
            <!-- RELATED PRODUCTS slider -->

        </div>
    </div>
</div>
<!-- END OF RELATED PRODUCTS -->


<!-- YOU MAY ALSO LIKE -->
<div class="container">
    <div class="row">
        <h2 class="also_like section_title">YOU MAY ALSO LIKE</h2>
        <div class="col-xs-12 col-md-12 col-sm-12 best_selling_section shadow">
            <!-- RELATED PRODUCTS slider -->
            <ul class="products">

                <li class="col-xs-12 col-sm-6 col-md-3 first last">
                    <div class="grid">
                        <figure class="effect-sadie">
                            <img src="images/books/book6-300.jpg" class="" alt="book5-300">
                            <figcaption>
                                <h2>Holy <span>Sadie</span></h2>
                                <p>Sadie never took her eyes off me. <br>She had a dark soul.</p>
                                <a href="#">View more</a>
                                <!-- RATING SECTION -->
                                <div class="row model-review">
                                    <div class="col-md-12 col-xs-12 col-sm-4">
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
                                <!-- RATING SECTION -->
                            </figcaption>
                        </figure>
                    </div>
                </li>

                <li class="col-xs-12 col-sm-6 col-md-3 first last">

                    <div class="grid">
                        <figure class="effect-sadie">
                            <img src="images/books/book8-300.jpg" class="" alt="book5-300">
                            <figcaption>
                                <h2>Holy <span>Sadie</span></h2>
                                <p>Sadie never took her eyes off me. <br>She had a dark soul.</p>
                                <a href="#">View more</a>
                            </figcaption>
                        </figure>
                    </div>
                </li>

                <li class="col-xs-12 col-sm-6 col-md-3 first last">

                    <div class="grid">
                        <figure class="effect-sadie">
                            <img src="images/books/book8-300.jpg" class="" alt="book5-300">
                            <figcaption>
                                <h2>Holy <span>Sadie</span></h2>
                                <p>Sadie never took her eyes off me. <br>She had a dark soul.</p>
                                <a href="#">View more</a>
                            </figcaption>
                        </figure>
                    </div>
                </li>

                <li class="col-xs-12 col-sm-6 col-md-3 first last">

                    <div class="grid">
                        <figure class="effect-sadie">
                            <img src="images/books/book8-300.jpg" class="" alt="book5-300">
                            <figcaption>
                                <h2>Holy <span>Sadie</span></h2>
                                <p>Sadie never took her eyes off me. <br>She had a dark soul.</p>
                                <a href="#">View more</a>
                            </figcaption>
                        </figure>
                    </div>
                </li>

                <li class="col-xs-12 col-sm-6 col-md-3 first last">

                    <div class="grid">
                        <figure class="effect-sadie">
                            <img src="images/books/book8-300.jpg" class="" alt="book5-300">
                            <figcaption>
                                <h2>Holy <span>Sadie</span></h2>
                                <p>Sadie never took her eyes off me. <br>She had a dark soul.</p>
                                <a href="#">View more</a>
                            </figcaption>
                        </figure>
                    </div>
                </li>

            </ul>
            <!-- RELATED PRODUCTS slider -->
        </div>
    </div>
</div>
<!-- END OF YOU MAY ALSO LIKE -->

<section class="footer-bottom">
    2014 &copy; Jonathan White. All rights reserved.
</section>
<script>
    $(document).ready(function() {

        $('.showmore_one').showMore({
            speedDown: 300,
            speedUp: 300,
            height: '100px',
            showText: 'Show more <i class="fa fa-chevron-down"></i>',
            hideText: 'Show less <i class="fa fa-chevron-up"></i>'
        });
    });
</script>

</body>
</html>