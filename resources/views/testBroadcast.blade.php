<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <link href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js" ></script>
    <script src="https://js.pusher.com/3.0/pusher.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        $(document).ready(function(){
            var pusher = new Pusher('eac2641ea059cc85dd7d', {
                encrypted: true
            });
            var channel = pusher.subscribe('test');
            channel.bind('App\\Events\\UserHasfavorited', function(data) {
                toastr.info(data.name+" has favourted "+data.bookname);
            });

        });
    </script>
</head>
<body>

</body>
</html>