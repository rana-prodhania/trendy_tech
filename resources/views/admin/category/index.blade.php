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
      <table id="example" class="table" style="width:100%">
        <thead>
          <tr>
            <th>SL</th>
            <th>Category Name</th>
            <th>Slug</th>
            <th class="text-center">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($categories as $SL => $category)
            <tr>
              <td>{{ $SL + 1 }}</td>
              <td>{{ $category->category_name }}</td>
              <td>{{ $category->category_slug }}</td>
              <td class="text-center">
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
@endsection
