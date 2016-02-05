@if($user->isFollowedBy($user->id))
    {!! Form::open(['method'=>'DELETE','route'=>['follow_path', $user->id]]) !!}

        {!! Form::hidden('userIdToFollow', $user->id) !!}
        <button type="submit" class="btn btn-danger mar-less">Unfollow</button>

    {!! Form::close() !!}
@else
    {!! Form::open(['route'=>'follows_path']) !!}

        {!! Form::hidden('userIdToFollow', $user->id) !!}
        <button type="submit" class="btn btn-primary mar-less">Follow</button>

    {!! Form::close() !!}
@endif

