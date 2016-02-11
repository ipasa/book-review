<div class="container-fluid full-color mar-top-50">

    <header class="Header-favorite">
        <div class="Banner">
            <h1 class="Banner__heading utility-center">
                {{ $name->name }} Favorites
            <span class="utility-text-little utility-muted">
              You're a fan of {{ $favorites->count() }} books.
            </span>
            </h1>
        </div>
    </header>

    <section class="row">
        <div class="Grid__column col-md-6 col-md-offset-3 centered">
            @if($favorites->count())
                @foreach($favorites as $favorite)
                    <ul class="Lesson-List ">
                        <li class="Lesson-List__item">
                            <span class="Lesson-List__status">
                              @include('partials/form-button')
                            </span>

                            <span class="Lesson-List__title utility-flex">
                                {!! link_to('/book/'.$favorite->id,$favorite->title, array('class'=>'green')) !!}
                            </span>

                            <span class="Lesson-List__date">
                                {{$favorite->category->name}}
                            </span>
                        </li>

                    </ul>
                @endforeach

            @else
                <p>No Book in favorite list</p>
            @endif
        </div>
    </section>
</div>



