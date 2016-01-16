@if(!Auth::check())
    <p>Please login first</p>
@else
    {!! Form::open(['route'=>['comment.create', $bookdetails->id], 'method' => 'post'],array('id' => 'commentform','class' => 'comment-form')) !!}
    {!! Form::hidden('book_id', $bookdetails->id) !!}
    <p class="comment-form-comment">
        {!! Form::label('comment', 'Your Review', ['class' => 'greview']) !!}
        {!! Form::textarea('comment') !!}
    </p>

    <p class="form-submit">
        {!! Form::submit('Post Comment', ['class' => 'submit']) !!}
    </p>

    {!! Form::close() !!}
@endif