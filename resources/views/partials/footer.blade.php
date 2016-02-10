<!-- FOOTER SECTION -->
<section class="footer-bottom">
    &copy; Hasan Hafiz Pasha &amp; Mahadi Hasan Raju. All rights reserved.
</section>
<!-- END OF FOOTER SECTION -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ URL::asset('js/bootstrap.js') }}"></script>
<script src="https://js.pusher.com/3.0/pusher.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
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
</body>
</html>