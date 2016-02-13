@extends('layouts.master')

@section('content')
    <div class="container mar-top-50" style="padding-top: 20px;">

        <div class="search-animation">
            <span class="anim-border"></span>
        </div>

        <div class="search-form-area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="search-form">
                            <form id="search-form" action="#">
                                <input id="typeahead"
                                       type="search"
                                       placeholder="Search For The Book"
                                       class="textInput"
                                       v-model="query"
                                       v-on="keyup:search | key 'enter'"
                                >
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--<div class="results">--}}
            {{--<article v-repeat="user:users">--}}
                {{--<h2>@{{ user.name }}</h2>--}}
                {{--<h2>@{{ user.objectID }}</h2>--}}
            {{--</article>--}}
        {{--</div>--}}

        {{--Search Result Area--}}
        <div class="search-result-area">
            <div class="container">
                <div class="row">
                    <div class="left-sidebar col-md-2">
                        <div class="left-single-sidebar single-sidebar nav">
                            <ul v-repeat="user:users">
                                <li class="active">
                                    <a href="http://localhost:8000/category/@{{ user.category_id }}">@{{ user.category_name }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="result-container">
                            <h2 class="heading-title">Book</h2>
                            <article v-repeat="user:users">
                                <div class="single-result">
                                    {{--<div class="header">--}}
                                        {{--<div class="image">--}}
                                            {{--<a href="#"><img src="img/avatar.jpg" alt="" /></a>--}}
                                        {{--</div>--}}
                                        {{--<div class="right-content">--}}
                                            {{--<div class="name-title">--}}
                                                {{--<a href="#">Kevin Rose</a> in <a href="#">I. M. H. O.</a>--}}
                                            {{--</div>--}}
                                            {{--<div class="date"><a href="#">Aug 29, 2012</a> . <span>1 min read</span></div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    <div class="result-content">
                                        <a href="http://localhost:8000/book/@{{ user.id }}"><h1>@{{ user.title }}</h1></a>
                                        <p>
                                            <img src="@{{ user.cover_image }}" alt="@{{ user.title }}"
                                                 class="img-thumbnail img-responsive right" width="200px" style="margin-left: 5px;">
                                            @{{ user.description }}
                                        </p>

                                        {{--<a href="#" class="read-more">Read more…</a>--}}
                                    </div>
                                    {{--<div class="footer">--}}
                                        {{--<button class="like left"><i class="fa fa-heart-o"></i> 308</button>--}}
                                        {{--<button class="bookmark right"><i class="fa fa-bookmark-o"></i></button>--}}
                                    {{--</div>--}}
                                </div>
                            </article>
                        </div>
                    </div>

                    {{--<div class="right-sidebar col-md-3">--}}
                        {{--<div class="right-single-sidebar single-sidebar tags">--}}
                            {{--<h2 class="sidebar-title">Tags</h2>--}}
                            {{--<ul class="tag">--}}
                                {{--<a href="#">html5</a>--}}
                                {{--<a href="#">html</a>--}}
                                {{--<a href="#">css</a>--}}
                                {{--<a href="#">css3</a>--}}
                                {{--<a href="#">jquery</a>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                </div>
            </div>
        </div>


        <div style="padding-top: 380px"></div>

    </div>
    <script src="https://cdn.jsdelivr.net/jquery/2.2.0/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/typeahead.js/0.11.1/typeahead.jquery.js"></script>
    <script src="http://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/0.12.1/vue.js"></script>
    <script>

        new Vue({
            el      :'body',
            data    :{query:'', users:[]},
            ready   :function(){

                this.client  =   algoliasearch("HODIKEQUVB", "8d13cfb38b66a0cdc44933fc3fb8b6a3");
                this.index   =   this.client.initIndex('books');

                $('#typeahead')
                    .typeahead(null, {
                        source      :   this.index.ttAdapter(),
                        displayKey  :   'title',
                        templates   :   {
                            suggestion: function (hit) {
                                return(
                                    '<div>' +
                                            '<span class="name">Book Name - '+ hit.title +'</span>'+'<br>'+
                                            '<span class="author">ISBN Number - '+ hit.isbn +'</span>'+'<br>'+
                                            '<span class="catagory">Category - '+ hit.category_name +'</span>'+
                                    '</div>'
                                )
                            }
                        }
                    })
                    .on('typeahead:select', function(e, suggestion){
                        this.query  =   suggestion.title;
                    }.bind(this));
            },
            methods :{
                search:function(){

                    this.index.search(this.query, function(error, results){
                        this.users  =   results.hits;
                    }.bind(this));
                }
            }


        });

    </script>
@endsection

