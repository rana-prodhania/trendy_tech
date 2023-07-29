@extends('admin.layouts.template')
@section('page-title', 'Add Sub Category | Global Village Bazaar')
@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex align-items-center justify-content-between mb-4 py-3">
      <h4 class="fw-bold"><span class="text-muted fw-light">Page / </span> All Sub Category</h4>
      <a href="{{ route('admin.subcategory.create') }}"><button type="button" class="btn btn-primary">Add Sub
          Category</button></a>
    </div>
    <div class="card-datatable card table-responsive p-3">
      <table id="myTable" class="table">
        <thead>

          <tr>
            <th>SL</th>
            <th>Sub Category Name</th>
            <th>Slug</th>
            <th>Category</th>
            <th class="text-center">Actions</th>
          </tr>
        </thead>

        <tbody class="table-border-bottom-0">
          @foreach ($subcategories as $SL => $subcategory)
            <tr>
              <td>{{ $SL + 1 }}</td>
              <td>{{ $subcategory->subcategory_name }}</td>
              <td>{{ $subcategory->subcategory_slug }}</td>
              <td>{{ $subcategory->category_name }}</td>

              <td class="text-center">
                <a href="{{ route('admin.subcategory.edit', $subcategory->id) }}" class="btn btn-primary btn-sm">Edit</a>
                <a href="{{ route('admin.subcategory.delete', $subcategory->id) }}" class="btn btn-danger delete btn-sm"
                  data-id="{{ $subcategory->id }}" data-item-type="subcategory">Delete</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
@section('scripts')
  <script>
    const table = new DataTable('#myTable');
  </script>
@endsection
