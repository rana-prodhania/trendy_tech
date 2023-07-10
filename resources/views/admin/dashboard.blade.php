@extends('admin.layouts.template')
@section('title', 'Admin Dashboard - Trendy Tech')
@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-lg-6">
        <div class="card-body">
          <h5 class="card-title text-primary">Welcome {{ Auth::guard('admin')->user()->name }}! 🎉</h5>
        </div>
      </div>

    </div>
  </div>
  <!-- / Content -->
@endsection
