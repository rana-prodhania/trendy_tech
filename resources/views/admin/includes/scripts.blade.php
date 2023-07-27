<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src=" {{ asset('backend/assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src=" {{ asset('backend/assets/vendor/libs/popper/popper.js') }}"></script>
<script src=" {{ asset('backend/assets/vendor/js/bootstrap.js') }}"></script>
<script src=" {{ asset('backend/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

<script src="{{ asset('backend/assets/vendor/libs/toastr/toastr.min.js') }}"></script>

<script src="{{ asset('backend/assets/vendor/libs/sweetalert2/sweetalert2.all.min.js') }}"></script>


<script src=" {{ asset('backend/assets/vendor/js/menu.js') }}"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src=" {{ asset('backend/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

<script src="{{ asset('backend/assets/vendor/libs/datatables/datatables.min.js') }}"></script>


<!-- Main JS -->
<script src=" {{ asset('backend/assets/js/main.js') }}"></script>

<!-- Page JS -->
<script src=" {{ asset('backend/assets/js/dashboards-analytics.js') }}"></script>


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
<script>
  new DataTable('#example');
</script>
