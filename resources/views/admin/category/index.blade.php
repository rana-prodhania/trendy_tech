@extends('admin.layouts.template')
@section('page-title', 'All Category | Trendy Tech')
@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex align-items-center justify-content-between mb-4 py-3">
      <h4 class="fw-bold"><span class="text-muted fw-light">Page / </span> All Category</h4>
      <a href="{{ route('admin.category.create') }}"><button type="button" class="btn btn-primary">Add
          Category</button></a>
    </div>
    <div class="card-datatable card table-responsive p-3">
      <table id="" class="data-table table" style="width:100%">
        <thead>
          <tr>
            <th>SL</th>
            <th>Category Name</th>
            <th>Slug</th>
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
        ajax: "{{ route('admin.category.index') }}",
        columns: [{
            data: 'DT_RowIndex',
            name: 'DT_RowIndex'
          },
          {
            data: 'category_name',
            name: 'category_name'
          },
          {
            data: 'category_slug',
            name: 'category_slug'
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
