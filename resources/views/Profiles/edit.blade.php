@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <h2 class="also_like section_title mar-top-50">Edit your profile</h2>
        </div>

        <div class="row">
            <div class="col-md-8">
                @if($errors->any())
                    <ul class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                {!! Form::model($user->profile, ['method'=>'PATCH', 'route'=>['profile.update', $user->id]]) !!}
                    {{--location field--}}
                    <div class="form-group">
                        {!! Form::label('location', 'Location') !!}
                        {!! Form::text('location',null, ['class'=>'form-control']) !!}
                    </div>


                    {{--Bio field--}}
                    <div class="form-group">
                        {!! Form::label('bio', 'Bio') !!}
                        {!! Form::textarea('bio',null, ['class'=>'form-control']) !!}
                    </div>

                    {{--Twitter field--}}
                    <div class="form-group">
                        {!! Form::label('twitter', 'Twitter Username') !!}
                        {!! Form::text('twitter_username',null, ['class'=>'form-control']) !!}
                    </div>

                    {{--Github field--}}
                    <div class="form-group">
                        {!! Form::label('github', 'Github Username') !!}
                        {!! Form::text('github_username',null, ['class'=>'form-control']) !!}
                    </div>

                    {{--SUbmit field--}}
                    <div class="form-group">
                        {!! Form::submit('Update Profile', ['class'=>'form-control']) !!}
                    </div>


                {!! Form::close()  !!}
            </div>
        </div>
    </div>
@endsection