@extends('admin.layouts.template')
@section('page-title', 'Edit Brand | Trendy Tech')
@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold mb-4 py-3"><span class="text-muted fw-light">Page/</span>Edit Brand</h4>
    <div class="col-xxl">
      <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
          <h5 class="mb-0">Edit New Brand</h5>
        </div>
        <div class="card-body">
          <form action="{{ route('admin.brand.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-default-name">Brand Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control @error('brand_name') is-invalid @enderror" id="brand_name"
                  name="brand_name" value="{{ $brand->brand_name }}" placeholder="Electronic" />
                @error('brand_name')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Brand Image Preview</label>
              <div class="col-sm-10">
                <img class="img-fluid" src="{{ asset($brand->brand_image) }}" width="100"
                  alt="{{ $brand->brand_image }}" srcset="">
                @error('brand_image')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-default-name">Upload Brand Image</label>
              <div class="col-sm-10">
                <input class="form-control"
                  value="{{ asset($brand->brand_image) }} @error('brand_image') is-invalid" @enderror id="brand_image"
                  name="brand_image" type="file" />
              </div>
              @error('brand_image')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="row justify-content-end">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Edit Brand</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
