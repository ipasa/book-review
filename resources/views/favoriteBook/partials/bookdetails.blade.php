<article class="col-md-3">
    <h2>{{$favorite->title}}</h2>
    <div class="body">
        {{$favorite->description}}
    </div>

    @include('partials/form-button')
</article>