@extends('layouts.master')

@section('content')
    @foreach(array_chunk($favorites->all(),4) as $row)
        <div class="row  mar-top-50">
            @foreach($row as $favorite)
                <article class="col-md-3">
                    <h2>{{$favorite->title}}</h2>
                    <div class="body">
                        {{$favorite->description}}
                    </div>
                    
                    {!! Form::open(['route' => 'favorites.store']) !!}
                    {!! Form::hidden('book-id', $favorite->id) !!}
                    	<button type="submit" class="btn-naked">
                            <i class="fa fa-heart {{ in_array($favorite->id, $favorites_list) ? 'favorited':'not-favorated' }}"></i>
                        </button>
                    {!! Form::close() !!}
                </article>
            @endforeach
        </div>
    @endforeach
@endsection
