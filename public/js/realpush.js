$(document).ready(function(){
    var pusher = new Pusher('eac2641ea059cc85dd7d', {
        encrypted: true
    });
    var channel = pusher.subscribe('test');
    channel.bind('App\\Events\\UserHasfavorited', function(data) {
        toastr.success(data.name+" has favourted "+data.bookname);
    });

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": false,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

});