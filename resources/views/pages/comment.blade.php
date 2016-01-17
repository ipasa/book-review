<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $("#submit").click(function () {
            var comment = $('textarea#comment').val();
//            alert(comment);
            var book_id = $('#book_id').val();
            var url = "https://api.meaningcloud.com/sentiment-2.0?key=9d12767d706b2e40a749598267f1ee82&of=json&txt=" + comment + "&model=general_en&ud=the-avengers";
            $.ajax({
                url: url,
                type: 'POST',
                data: {comment: comment},
                dataType: 'json',
                success: function (data) {
//                    alert(data.score_tag)
                    $.ajax({
                        url: "<?php echo url('comment_save');?>",
                        data: {score_tag: data.score_tag, book_id: book_id, comment: comment},
                        type: 'GET',
                        success: function (data) {
//                            alert(data);
                            window.location = data;
                        }, error: function (data) {
                            console.log(data)
                        }
                    })
                },
                error: function () {
                    alert("ERROR");
                }
            })
        })
    })
</script>
@if(!Auth::check())
    <p>Please login first</p>
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