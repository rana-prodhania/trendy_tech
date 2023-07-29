@extends('admin.layouts.template')
@section('page-title', 'All Brand | Trendy Tech')
@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex align-items-center justify-content-between mb-4 py-3">
      <h4 class="fw-bold"><span class="text-muted fw-light">Page / </span> All Brand</h4>
      <a href="{{ route('admin.brand.create') }}"><button type="button" class="btn btn-primary">Add
          Brand</button></a>
    </div>
    <div class="card-datatable card table-responsive p-3">
      <table id="" class="data-table table" style="width:100%">
        <thead>
          <tr>
            <th>SL</th>
            <th>Brand Name</th>
            <th>Slug</th>
            <th>Brand Image</th>
            <th class="text-center">Actions</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
@endsection
@section('scripts')
  <script>
    $(document).ready(function() {
      const table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.brand.index') }}",
        columns: [{
            data: 'DT_RowIndex',
            name: 'DT_RowIndex'
          },
          {
            data: 'brand_name',
            name: 'brand_name'
          },
          {
            data: 'brand_slug',
            name: 'brand_slug'
          },
          {
            data: 'brand_image',
            name: 'brand_image',
            render: function(data) {
              return '<img src="' + data +
                '" class="img-fluid" width="100"  alt="brand_image">';
            }
          },
          {
            data: 'action',
            name: 'action',
            orderable: false,
            searchable: false,
            className: 'text-center'
          },
        ]
      });
    });
  </script>
@endsection
