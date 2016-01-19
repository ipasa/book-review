<!DOCTYPE html>
<html>
<head>
    <title>HTML Tables</title>
</head>
<body>
<table border="1">
    @foreach($items as $item)
        <tr>
            <td>{{ $item['user_id'] }}</td>
            <td>{{ $item['co-efficient'] }}</td>
        </tr>
    @endforeach
</table>
</body>
</html>