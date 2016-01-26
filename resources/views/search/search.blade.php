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
                                <input type="search" placeholder="Search For The Book"
                                       class="textInput"
                                >
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="results">
            <article v-for="user in users">
                <h2>@{{ user.name }}</h2>
                <h2>@{{ user.objectID }}</h2>
            </article>
        </div>


        <div style="padding-top: 380px"></div>

    </div>
    <script src="http://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.15/vue.js"></script>
    <script>
        new Vue({
            el:'body',

            data:{users:[]},

            ready: function(){
                var client  =   algoliasearch("HODIKEQUVB", "8d13cfb38b66a0cdc44933fc3fb8b6a3");
                var index   =   client.initIndex('getstarted_actors');

                index.search('Michael Doven', function(error, results){
                    this.users  =   results.hits;
                }.bind(this));
            }

        });

    </script>
@endsection

