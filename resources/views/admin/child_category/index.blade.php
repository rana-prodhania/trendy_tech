@extends('admin.layouts.template')
@section('page-title', 'Add Child Category | Trendy Tech')
@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex align-items-center justify-content-between mb-4 py-3">
      <h4 class="fw-bold"><span class="text-muted fw-light">Page / </span> All Child Category</h4>
      <a href="{{ route('admin.childCategory.create') }}"><button type="button" class="btn btn-primary">Add Child
          Category</button></a>
    </div>
    <div class="card-datatable card table-responsive p-3">
      <table id="myTable" class="table">
        <thead>

          <tr>
            <th>SL</th>
            <th>Child Category Name</th>
            <th>Slug</th>
            <th>Sub Category</th>
            <th class="text-center">Actions</th>
          </tr>
        </thead>

        <tbody class="table-border-bottom-0">
          @foreach ($childCategories as $SL => $childCategory)
            <tr>
              <td>{{ $SL + 1 }}</td>
              <td>{{ $childCategory->child_category_name }}</td>
              <td>{{ $childCategory->child_category_slug }}</td>
              <td>{{ $childCategory->subcategory_name }}</td>

              <td class="text-center">
                <a href="{{ route('admin.childCategory.edit', $childCategory->id) }}"
                  class="btn btn-primary btn-sm">Edit</a>
                <a href="{{ route('admin.childCategory.delete', $childCategory->id) }}"
                  class="btn btn-danger delete btn-sm" data-id="{{ $childCategory->id }}"
                  data-item-type="child-category">Delete</a>
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
