<ul>
@foreach($users as $user)
    <li>
        <a href="http://localhost:8000/user/{{$user->id}}">{{ $user->name }}</a>
        -
        @if(Auth::check())
            @unless($user->id===Auth::id())
                @include('partials.follow-form')
            @endunless
        @endif
    </li>
@endforeach
</ul>