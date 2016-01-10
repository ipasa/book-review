@extends('layouts.master')

@section('content')
    @if($favorites->count())
        @foreach(array_chunk($favorites->all(),4) as $row)
            <div class="row  mar-top-50">
                @foreach($row as $favorite)
                    @include('favoriteBook/partials/bookdetails')
                @endforeach
            </div>
        @endforeach
    @else
        <div class="row  mar-top-50">
            <div class="col-mod-6 col-md-offset-3">
                <p>No Book in favorite list</p>
            </div>
        </div>
    @endif
@endsection
