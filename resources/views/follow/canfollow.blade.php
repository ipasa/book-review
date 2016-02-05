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
        <div class="list-group">
            @foreach($items as $item)
                @unless($item['user_id']==Auth::id())
                    <a href="http://localhost:8000/user/{{$item['user_id']}}"
                       class="list-group-item">{{ $item['user_name'] }}
                    </a>
                @endunless
            @endforeach
        </div>
    </div>
@endsection