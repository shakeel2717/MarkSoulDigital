<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if ($errors->any())
@foreach ($errors->all() as $error)
<script>
    swal("oops!", "{!! $error !!}", "error");
</script>
@endforeach
@endif
@if (session('success') || session('status'))
<script>
    swal("Success!", "{!! session('success') !!}", "success");
</script>
@endif
@if (session('error'))
<script>
    swal("oops!", "{!! session('error') !!}", "error");
</script>
@endif
<script>
    function copyInputValue(inputId) {
        const inputElement = document.getElementById(inputId);
        if (inputElement) {
            inputElement.select();
            document.execCommand('copy');
        } else {
            alert('Input element not found!');
        }
    }
</script>