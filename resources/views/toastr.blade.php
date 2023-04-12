<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css"
      href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
    $(document).ready(function () {
        toastr.options =
            {
                "timeOut" : 10000,
                "closeButton" : true,
                "progressBar" : true
            }

        // success message popup notification
        @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
        @endif

        // info message popup notification
        @if(Session::has('info'))
        toastr.info("{{ Session::get('info') }}");
        @endif

        // warning message popup notification
        @if(Session::has('warning'))
        toastr.warning("{{ Session::get('warning') }}");
        @endif

        // error message popup notification
        @if(Session::has('error'))
        toastr.error("{{ Session::get('error') }}");
        @endif

    });
</script>
