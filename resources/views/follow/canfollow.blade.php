<table>
    @foreach($items as $item)
        <tr>
            <td>{{ $item['user_name'] }}</td>
            <td>{{ $item['co-efficient'] }}</td>
        </tr>
    @endforeach
</table>