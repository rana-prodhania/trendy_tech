@extends('admin.layouts.template')
@section('page-title', 'Add Sub Category | Global Village Bazaar')
@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex align-items-center justify-content-between mb-4 py-3">
      <h4 class="fw-bold"><span class="text-muted fw-light">Page / </span> All Sub Category</h4>
      <a href="{{ route('admin.subcategory.create') }}"><button type="button" class="btn btn-primary">Add Sub
          Category</button></a>
    </div>
    <div class="card">
      <h5 class="card-header">Available Sub Category Infomation</h5>
      <div class="table-responsive text-nowrap">

        <table class="table">
          <thead class="table-light">

            <tr>
              <th>SL</th>
              <th>Sub Category Name</th>
              <th>Slug</th>
              <th>Category</th>
              <th>Actions</th>
            </tr>
          </thead>

          <tbody class="table-border-bottom-0">
            @foreach ($subcategories as $SL => $subcategory)
              <tr>
                <td>{{ $SL + 1 }}</td>
                <td>{{ $subcategory->subcategory_name }}</td>
                <td>{{ $subcategory->subcategory_slug }}</td>
                <td>{{ $subcategory->category_name }}</td>

                <td>
                  <a href="{{ route('admin.subcategory.edit', $subcategory->id) }}" class="btn btn-primary">Edit</a>
                  <a href="{{ route('admin.subcategory.delete', $subcategory->id) }}" class="btn btn-danger delete"
                    data-id="{{ $subcategory->id }}" data-item-type="subcategory">Delete</a>
                </td>
              </tr>
            @endforeach

          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
