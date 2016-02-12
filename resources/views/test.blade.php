<html>
<head>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.js"></script>
    <script type="text/javascript">

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var time = 2000;
        //make it a named function
        $(function poll(){

            //this makes the setTimeout a self run function it runs the first time always
            setTimeout(function(){
                $.ajax({
                    url:'{{ URL::route('stream-show') }}',  // Url to which the request is send
                    type: "GET",                            // Type of request to be send, called as method
                    data : "",
                    success: function()                     // A function to be called if request succeeds
                    {
                        $("#log").append("Hi");
                        //shownIds.push("hello");
                        //$('div#log').text(response);
                    },
                                                            //this is where you call the function again so when ajax complete it will cal itself after the time out you set.
                    complete: poll
                });
                                                            //end setTimeout and ajax
            },time);
                                                            //end poll function
        });

    </script>
</head>
<body>
    <div id="log">

    </div>
</body>
</html>