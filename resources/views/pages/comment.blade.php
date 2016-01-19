@if(!Auth::check())
    <p>Please {!! link_to('auth/login', 'login')  !!} first.</p>
@else
    {{--{!! Form::open([],array('id' => 'commentform','class' => 'comment-form')) !!}--}}
    {!! Form::open() !!}
    {!! Form::hidden('book_id', $bookdetails->id,array('id'=>'book_id')) !!}
    <p class="comment-form-comment">
        {!! Form::label('comment', 'Your Review', ['class' => 'greview']) !!}
        {!! Form::textarea('comment',null,array('id'=>'comment')) !!}
    </p>

    <p class="form-submit">
        {!! Form::button('Post Comment', ['class' => 'submit','id'=>'submit']) !!}
    </p>

    {!! Form::close() !!}
@endif