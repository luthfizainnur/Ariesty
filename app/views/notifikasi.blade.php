@if(Session::has('pesan_error'))
<div id="alert_message" class="alert alert-info">{{ Session::get('pesan_error') }}</div>
@endif

<script>
    window.setTimeout(function() {
        $("#alert_message").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
    }, 1500);
</script>
