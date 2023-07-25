<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src=" {{ asset('backend/assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src=" {{ asset('backend/assets/vendor/libs/popper/popper.js') }}"></script>
<script src=" {{ asset('backend/assets/vendor/js/bootstrap.js') }}"></script>
<script src=" {{ asset('backend/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>



<script src=" {{ asset('backend/assets/vendor/js/menu.j') }}s"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src=" {{ asset('backend/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>




<!-- Main JS -->
<script src=" {{ asset('backend/assets/js/main.js') }}"></script>

<!-- Page JS -->
<script src=" {{ asset('backend/assets/js/dashboards-analytics.js') }}"></script>


<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

<script>
  const toastrOptions = {
    closeButton: true,
    progressBar: true,
  };

  @if (Session::has('success'))
    toastr.success("{{ Session::get('success') }}", "Success", toastrOptions);
  @endif

  @if (Session::has('error'))
    toastr.error("{{ Session::get('error') }}", "Error", toastrOptions);
  @endif
</script>
<script>
  // Delete Button Click Event Handler with Sweet Alert
  $(document).on('click', '.delete', function(e) {
    e.preventDefault();
    const id = $(this).data('id');
    const itemType = $(this).data('item-type');
    // var deleteUrl = "{{ url('') }}/" + itemType + "/delete/" + id;
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6 ',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = `${itemType}/delete/${id}`;
      }
    })
  })
</script>
@yield('script')
