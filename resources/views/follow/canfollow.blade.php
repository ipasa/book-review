<table border="1">
    @foreach($items as $item)
        <tr>
            <td>{{ $item['user_id'] }}</td>
            <td>{!! link_to('/user/'.$item['user_id'], $item['user_name']) !!}</td>
            {{--<td>{{ $item['user_name'] }}</td>--}}
            <td>{{ $item['co-efficient'] }}</td>
        </tr>
    @endforeach
</table>