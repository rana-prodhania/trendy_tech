@extends('admin.layouts.template')
@section('page-title', 'Edit Category | Trendy Tech')
@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold mb-4 py-3"><span class="text-muted fw-light">Page/</span>Edit Category</h4>
    <div class="col-xxl">
      <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
          <h5 class="mb-0">Edit New Category</h5>
          <small class="text-muted float-end">Input field</small>
        </div>
        <div class="card-body">
          <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-default-name">Category Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control @error('category_name') is-invalid @enderror" id="category_name"
                  name="category_name" value="{{ $category->category_name }}" placeholder="Electronic" />
                @error('category_name')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <div class="row justify-content-end">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Edit Category</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
