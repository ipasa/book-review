@if(Auth::check())
    @if($favorited=in_array($favorite->id, $favorites_list))
        {!! Form::open(['method'=>'DELETE', 'route' => ['favorites.destroy', $favorite->id]]) !!}
    @else
        {!! Form::open(['route' => 'favorites.store']) !!}
        {!! Form::hidden('book-id', $favorite->id) !!}
    @endif

    <button type="submit" class="btn-naked">
        <i class="fa fa-heart {{ $favorited ? 'favorited':'not-favorated' }}"></i>
    </button>

    {!! Form::close() !!}
@endif