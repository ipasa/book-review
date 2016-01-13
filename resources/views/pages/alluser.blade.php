<ul>
@foreach($users as $user)
    <li><a href="http://localhost:8000/user/{{$user->id}}">{{ $user->name }}</a></li>
@endforeach
</ul>