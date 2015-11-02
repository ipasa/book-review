<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>My Book | My Review</title>

    <link href='http://fonts.googleapis.com/css?family=Lato:400,700|Kaushan+Script|Montserrat' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway:100,500|Merriweather' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">

    <!-- Owl Carousel Assets -->
    <link href="{{ URL::asset('css/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/owl-carousel/owl.theme.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/owl-carousel/demo-slider.css') }}" rel="stylesheet">

    <!-- Prettify -->
    <link href="{{ URL::asset('assets/js/google-code-prettify/prettify.css') }}" rel="stylesheet">

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="{{ URL::asset('assets/ico/favicon.png') }}">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<header>
    <img src="{{ URL::asset('images/mountains.jpg') }}" alt="Mountains">

    <div class="name fancy-font">
        Book Review
    </div>
    <div class="titles">
        <h1>Hello!
            <span>I'm Jonathan</span>
        </h1>
        <h2>I love to travel all around the world and design beautiful things</h2>
    </div>
    <div class="social">
        <a class="facebook" href="#">Facebook</a>
        <a class="twitter" href="#">Twitter</a>
        <a class="instagram" href="#">Instagram</a>
    </div>
</header>

<!-- Welcome Div -->
<div class="container-fluid welcome">
    <div class="row">
        <div class="col-xs-12">
            <h2>Welcome to Papirus book store</h2>
            <p>Tons of book collections you can choose from. Books that don’t suck, we ensure the quality of our books the best you can find anywhere.</p>
        </div>
    </div>
</div>
<!-- End of Welcome Div -->

<!-- BEST SELLING BOOK -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-md-6 col-sm-12 featured-section">
            <h2 class="section_title">BEST SELLING BOOK</h2>
            <figure class="featured-image-holder">
                <img class="img-responsive" src="images/books/book1-600.jpg" alt="Thinking with Type, 2nd revised and expanded edition: A Critical Guide for Designers, Writers, Editors, &amp; Students" class="tokokoo-featured-product">
            </figure>
            <div class="col-xs-8 col-sm-8">
                <p class="author">By <a href="http://tokokoodemo.us/papirus/books/authors/ellen-lupton/">Ellen Lupton</a></p>
                <h3 class="item-title">
                    <a href="#" title="Thinking with Type, 2nd revised and expanded edition: A Critical Guide for Designers, Writers, Editors, &amp; Students">Thinking with Type, 2nd revised and expanded edition: A Critical Guide for Designers, Writers, Editors, &amp; Students</a>
                </h3>
                Our all time best selling book is now available in a revised and expanded second edition.&nbsp;Thinking with Type&nbsp;is the definitive guide to using typography in visual communication, from the printed…
            </div>

            <div class="book_details col-xs-4 col-sm-4 text-center">
                    <span class="tags">
                        <a href="#">HTML5, </a>
                        <a href="#">Web Application</a>
                    </span>

                <div class="wishlist-button" style="display:block">
                    <a href="#" class="add_to_wishlist add_to_cart_button">Add to Wishlist</a>
                </div>
            </div>
        </div>
        <!-- END OF BEST SELLING BOOK -->

        <!-- EXCLUSIVE THIS MONTH -->
        <div class="col-xs-12 col-md-6 col-sm-12 featured-section best_selling_section">
            <h2 class="section_title inverse">Exclusive This month</h2>
            <ul class="products">

                <li class="col-xs-12 col-sm-6 col-md-6 first last">
                    <img src="images/books/book5-300.jpg" class="" alt="book5-300">
                </li>

                <li class="col-xs-12 col-sm-6 col-md-6 first last">

                    <div class="grid">
                        <figure class="effect-sadie">
                            <img src="images/books/book6-300.jpg" class="" alt="book5-300">
                            <figcaption>
                                <h2>Holy <span>Sadie</span></h2>
                                <p>Sadie never took her eyes off me. <br>She had a dark soul.</p>
                                <a href="#">View more</a>
                            </figcaption>
                        </figure>
                    </div>
                </li>

                <li class="col-xs-12 col-sm-6 col-md-6 first last">

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

                <li class="col-xs-12 col-sm-6 col-md-6 first last">

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
        </div>
        <!-- END OF EXCLUSIVE THIS MONTH -->
    </div>

    <!-- SEARCH SECTION -->
    <div class="row">
        <div class="col-md-12 search_box">
            <!-- begin book_search -->
            <section class="book_search wow no  animated">
                <div class="container">
                    <h2 class="section_title">NEED TO FIND PARTICULAR PRODUCTS?</h2>
                    <form action="#" method="get" role="search">
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

                        <input type="submit" class="wishlist-button center-button" value="Search">
                        <input type="hidden" name="post_type" value="product">
                    </form>
                </div>
            </section>
            <!-- begin book_search -->
        </div>
    </div>
    <!-- END OF SEARCH SECTION -->

    <!-- CATAGORY LIST SECTION -->
    <?php
        $result = App\Category::all();
        $sizeOfArray    =   sizeof($result);
        $dividedSize    =   $sizeOfArray/4;
    ?>

    <div class="caragory-row">
        <div class="row">
            <div class="col-md-12">
                <h2 class="section_title">List of all Catagory</h2>
                <div class="col-md-3">
                    <ul>
                        <li><a href="#">Programming</a></li>
                        <li><a href="#">Nobel</a></li>
                        <li><a href="#">Web Programming</a></li>
                        <li><a href="#">History</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <ul>
                        <li><a href="#">Programming</a></li>
                        <li><a href="#">Nobel</a></li>
                        <li><a href="#">Web Programming</a></li>
                        <li><a href="#">History</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <ul>
                        <li><a href="#">Programming</a></li>
                        <li><a href="#">Nobel</a></li>
                        <li><a href="#">Web Programming</a></li>
                        <li><a href="#">History</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <ul>
                        <li><a href="#">Programming</a></li>
                        <li><a href="#">Nobel</a></li>
                        <li><a href="#">Web Programming</a></li>
                        <li><a href="#">History</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END OF CATAGORY LIST SECTION -->



    <!-- RANDOM SLIDER -->
    <div class="row demo-color">
        <div id="demo">
            <div class="col-md-12">
                <h2 class="section_title">A random Slider That show some list</h2>

                <div id="owl-example" class="owl-carousel">

                    <div class="item darkCyan">
                        <img src="assets/img/demo-slides/touch.png" alt="Touch">
                        <h3>Touch</h3>
                        <h4>Can touch this</h4>
                    </div>
                    <div class="item forestGreen">
                        <img src="assets/img/demo-slides/grab.png" alt="Grab">
                        <h3>Grab</h3>
                        <h4>Can grab this</h4>
                    </div>
                    <div class="item orange">
                        <img src="assets/img/demo-slides/responsive.png" alt="Responsive">
                        <h3>Responsive</h3>
                        <h4>Fully responsive!</h4>
                    </div>

                    <div class="item yellow">
                        <img src="assets/img/demo-slides/css3.png" alt="CSS3">
                        <h3>CSS3</h3>
                        <h4>3D Acceleration.</h4>
                    </div>

                    <div class="item dodgerBlue">
                        <img src="assets/img/demo-slides/multi.png" alt="Multi">
                        <h3>Multiply</h3>
                        <h4>Owls on page.</h4>
                    </div>

                    <div class="item skyBlue">
                        <img src="assets/img/demo-slides/modern.png" alt="Modern Browsers">
                        <h3>Modern</h3>
                        <h4>Browsers Compatibility</h4>
                    </div>

                    <div class="item zombieGreen">
                        <img src="assets/img/demo-slides/zombie.png" alt="Zombie Browsers - old ones">
                        <h3>Zombie</h3>
                        <h4>Browsers Compatibility</h4>
                    </div>

                    <div class="item violet">
                        <img src="assets/img/demo-slides/controls.png" alt="Take Control">
                        <h3>Take Control</h3>
                        <h4>The way you like</h4>
                    </div>

                    <div class="item yellowLight">
                        <img src="assets/img/demo-slides/feather.png" alt="Light">
                        <h3>Light</h3>
                        <h4>As a feather</h4>
                    </div>

                    <div class="item steelGray">
                        <img src="assets/img/demo-slides/tons.png" alt="Tons of Opotions">
                        <h3>Tons</h3>
                        <h4>of options</h4>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- RANDOM SLIDER -->

</div>
<!-- END OF CONTAINER -->





<footer>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h4>Get in touch</h4>
                <p class="about-text">I shoot, design and write. Don't hesitate and get in touch with me if you need some creative work done. I always work to achieve my best and fulfil client needs</p>
                <a class="contact-now-btn" href="#">Contact Now</a>
            </div>
        </div>
    </div>
</footer>

<section class="footer-bottom">
    2014 &copy; Jonathan White. All rights reserved.
</section>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.js"></script>

<!-- OWL Carasol JS -->
<script src="assets/js/jquery-1.9.1.min.js"></script>
<script src="css/owl-carousel/owl.carousel.min.js"></script>

<!-- Frontpage Demo -->
<script>
    $(document).ready(function($) {
        $("#owl-example").owlCarousel();
    });

    $("body").data("page", "frontpage");
</script>

<script src="assets/js/bootstrap-collapse.js"></script>
<script src="assets/js/bootstrap-transition.js"></script>
<script src="assets/js/google-code-prettify/prettify.js"></script>
<script src="assets/js/application.js"></script>

</body>
</html>
