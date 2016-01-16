<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#submit").click(function () {
                var comment = $('#comment').val();
                var url = "https://api.meaningcloud.com/sentiment-2.0?key=9d12767d706b2e40a749598267f1ee82&of=json&txt=" + comment + "&model=general_en&ud=the-avengers";
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {comment: comment},
                    dataType: 'json',
                    success: function (data) {
                        $.ajax({
                            url: "{{link_to('test1')}}",
                            data: {score_tag: data.score_tag},
                            type: 'GET',
                            success: function (data) {
                                //alert(data);
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
</head>
<body>
<form action="">
    <textarea id="comment" cols="30" rows="10"></textarea>
    <input type="button" id="submit" value="submit">
</form>
</body>
</html>