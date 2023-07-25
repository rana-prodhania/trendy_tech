@extends('admin.layouts.template')
@section('page-title', 'All Category | Global Village Bazaar')
@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex align-items-center justify-content-between mb-4 py-3">
      <h4 class="fw-bold"><span class="text-muted fw-light">Page / </span> All Category</h4>
      <a href="{{ route('admin.category.create') }}"><button type="button" class="btn btn-primary">Add
          Category</button></a>
    </div>
    <div class="card">
      <h5 class="card-header">Available Category Infomation</h5>
      <div class="table-responsive text-nowrap">

        <table class="table">
          <thead class="table-light">
            <tr>
              <th>SL</th>
              <th>Category Name</th>
              <th>Slug</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @foreach ($categories as $SL => $category)
              <tr>
                <td>{{ $SL + 1 }}</td>
                <td>{{ $category->category_name }}</td>
                <td>{{ $category->category_slug }}</td>
                <td>
                  <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                  <a href="{{ route('admin.category.delete', $category->id) }}" class="btn btn-danger delete"
                    data-id="{{ $category->id }}" data-item-type="category">Delete</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

@endsection
