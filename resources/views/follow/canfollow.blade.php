{{--<table border="1">--}}
    {{--@foreach($items as $item)--}}
        {{--<tr>--}}
            {{--<td>{{ $item['user_id'] }}</td>--}}
            {{--<td>{!! link_to('/user/'.$item['user_id'], $item['user_name']) !!}</td>--}}
            {{--<td>{{ $item['user_name'] }}</td>--}}
            {{--<td>{{ $item['co-efficient'] }}</td>--}}
        {{--</tr>--}}
    {{--@endforeach--}}
{{--</table>--}}

@extends('layouts.master')

@section('content')
    <div class="container mar-top-50">
        <header class="Header-favorite">
            <div class="Banner">
                <h3 class="Banner__heading utility-center">
                    {{ Auth::user()->name }} You Can Follow this people
                </h3>
            </div>
        </header>

        <div class="list-group col-md-6 col-md-offset-3" style="margin-top: -40px">
            @foreach($items as $item)
                @if($followed = $item['status']=='Followed')
                @endif

                @unless($item['user_id']==Auth::id())
                    <a href="http://localhost:8000/user/{{$item['user_id']}}"
                       class="list-group-item canFollowSingle">
                        <i class="fa fa-check-square {{ $followed ? 'green':'red' }}"></i>
                        {{ $item['user_name'] }}
                    </a>

                @endunless
            @endforeach
        </div>
    </div>
@endsection