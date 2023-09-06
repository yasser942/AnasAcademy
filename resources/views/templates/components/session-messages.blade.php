 @if(session('success'))

        <script>


            // Automatically trigger the function when the page loads
            window.onload = function() {
                not7('نجاح ', "{{session('success')}}");
            };
        </script>
    @endif

 @if( session('error'))
        <script>
            // Automatically trigger the function when the page loads
            window.onload = function() {
                not8('خطأ ', "{{session('error')}}");
            };
        </script>
    @endif
