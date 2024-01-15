<div>
    @if(session('success'))
        <script>
            Swal.fire({
                position: "middle",
                icon: "success",
                title: " {{ session('success') }}",
                showConfirmButton: false,
                timer: 3000
            });
        </script>
    @endif
    @if(session('error'))
        <script>
            Swal.fire({
                position: "middle",
                icon: "error",
                title: " {{ session('error') }}",
                showConfirmButton: false,
                timer: 3000
            });
        </script>
    @endif
</div>
