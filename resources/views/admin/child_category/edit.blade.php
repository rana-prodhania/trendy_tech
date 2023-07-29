@extends('admin.layouts.template')
@section('page-title', 'Edit Child Category | Trendy Tech')
@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold mb-4 py-3"><span class="text-muted fw-light">Page/</span>Edit Child Category</h4>
    <div class="col-xxl">
      <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
          <h5 class="mb-0">Edit Child Category</h5>
        </div>
        <div class="card-body">
          <form action="{{ route('admin.childCategory.update', $childCategory->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-default-name">Child Category Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control @error('child_category_name') is-invalid @enderror"
                  name="child_category_name" value="{{ $childCategory->child_category_name }}" placeholder="Electronic" />
                @error('child_category_name')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-default-name">Select Sub Category</label>
              <div class="col-sm-10">

                <select class="form-select" name="subcategory_id" aria-label="Default select example">
                  <option selected>Select Category</option>
                  @foreach ($subCategories as $subcategory)
                    <option value="{{ $subcategory->id }}" @if ($subcategory->id === $childCategory->subcategory_id) selected @endif>
                      {{ $subcategory->subcategory_name }}</option>
                  @endforeach
                </select>

              </div>
            </div>
            <div class="row justify-content-end">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Edit Sub Category</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
