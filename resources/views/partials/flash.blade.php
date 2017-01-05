@if(session()->has('flash'))
    <script>
        swal({
          title: "{{ session('flash.title') }}",
          text: "{{ session('flash.message') }}",
          type: "{{ session('flash.type') }}",
          timer: 2000,
          showConfirmButton: false
        });
    </script>
@endif

@if(session()->has('flash_overlay'))
    <script>
        swal({
          title: "{{ session('flash_overlay.title') }}",
          text: "{{ session('flash_overlay.message') }}",
          type: "{{ session('flash_overlay.type') }}",
          showConfirmText: 'OK'
        });
    </script>
@endif
