@extends('layouts.master')

@section('content')
    <div class="container-fluid full-color mar-top-50">

        <header class="Header-favorite">
            <div class="Banner">
                <h1 class="Banner__heading utility-center">
                    LIST OF ALL CATAGORY
                </h1>
            </div>
        </header>

        @foreach(array_chunk($allcates,3) as $row)
        <div class="row">
            @foreach($row as $allcate)
                <div class="Grid__column col-md-4 centered">
                    <?php $categoryArray  =   App\Category::findOrNew($allcate->category_id);?>
                    <p class="Lesson-List" style="padding: 10px">
                        <span class="Lesson-List__title utility-flex streamSigle">
                            <span class="canFollowSingle">
                                <a href="/category/{{ $categoryArray->id }}">{{ $categoryArray->name }}</a> ({{ $allcate->count }})
                            </span>
                        </span>
                    </p>
                </div>
            @endforeach
        </div>
        @endforeach
    </div>
@endsection