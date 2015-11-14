@extends('layouts.master')

@section('content')
    <section class="instagram-wrap">
        <div class="container-fluid">

            <div class="catagory_heading">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Catagory : Programming</h3>
                    </div>
                </div>
            </div>

            <div class="instagram-content">
                <div class="row">

                    <!-- SINGLE BOOK REVIEe -->
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 feed_shadow">
                        <div class="photo-box">
                            <div class="image-wrap">
                                <img src="images/test_img.jpg">
                                <div class="likes">309 Likes</div>
                            </div>

                            <div class="description">
                                Fantastic Architecture #architecture #testing
                                <div class="date">September 16, 2014</div>
                            </div>
                        </div>
                    </div>
                    <!-- END OF SINGLE BOOK REVIEe -->

                    <!-- SINGLE BOOK REVIEe -->
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 feed_shadow">
                        <div class="photo-box">
                            <div class="image-wrap">
                                <img src="images/test_img.jpg">
                                <div class="book-info">
                                    <p>Professional Ajax, 2nd Edition</p>
                                </div>
                                <div class="book-cata">
                                    <p>Catagories : Programming</p>
                                </div>

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
                                <a href="#">Professional Ajax, 2nd Edition</a>
                                <div class="date">September 16, 2014</div>
                            </div>
                        </div>
                    </div>
                    <!-- END OF SINGLE BOOK REVIEe -->

                </div>
            </div>

        </div>
    </section>
@endsection