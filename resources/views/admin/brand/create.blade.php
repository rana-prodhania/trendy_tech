@extends('admin.layouts.template')
@section('page-title', 'Add Brand | Trendy Tech')
@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold mb-4 py-3"><span class="text-muted fw-light">Page/</span>Add Brand</h4>
    <div class="col-xxl">
      <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
          <h5 class="mb-0">Add New Brand</h5>

        </div>
        <div class="card-body">
          <form action="{{ route('admin.brand.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Brand Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control @error('brand_name') is-invalid @enderror"
                  value="{{ old('brand_name') }}" name="brand_name" placeholder="Electronic" />
                @error('brand_name')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-default-name">Upload Brand Image</label>
              <div class="col-sm-10">
                <input class="form-control" @error('brand_image') is-invalid @enderror id="brand_image" name="brand_image"
                  type="file" />
              </div>
              @error('brand_image')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="row justify-content-end">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Add Brand</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
