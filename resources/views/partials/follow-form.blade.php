@if($user->isFollowedBy($user->id))
    {!! Form::open(['method'=>'DELETE','route'=>['follow_path', $user->id]]) !!}

        {!! Form::hidden('userIdToFollow', $user->id) !!}
        <button type="submit" class="btn btn-danger">Unfollow {{ $user->name }}</button>

    {!! Form::close() !!}
@else
    {!! Form::open(['route'=>'follows_path']) !!}

        {!! Form::hidden('userIdToFollow', $user->id) !!}
        <button type="submit" class="btn btn-default">Follow {{ $user->name }}</button>

    {!! Form::close() !!}
@endif

