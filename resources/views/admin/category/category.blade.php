@extends('admin.layouts.template')
@section('page-title', 'All Category | Global Village Bazaar')
@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">


    <div class="d-flex align-items-center justify-content-between mb-4 py-3">
      <h4 class="fw-bold"><span class="text-muted fw-light">Page / </span> Category</h4>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategory">Add
        Category</button>
    </div>
    <div class="card">
      <h5 class="card-header">Available Category Infomation</h5>
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <div class="table-responsive text-nowrap">

        <table class="table">
          <thead class="table-light">
            <tr>
              <th>SN</th>
              <th>Category Name</th>
              <th>Sub Category</th>
              <th>Product</th>
              <th>Slug</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @foreach ($categories as $sn => $category)
              <tr>
                <td>{{ $sn + 1 }}</td>
                <td>{{ $category->category_name }}</td>
                <td>{{ $category->sub_category_count }}</td>
                <td>{{ $category->product_count }}</td>
                <td>{{ $category->category_slug }}</td>
                <td>
                  <button class="btn btn-primary edit-category" data-id="{{ $category->id }}"
                    data-category-name="{{ $category->category_name }}">Edit</button>
                  <button href="{{ route('admin.category.delete', $category->id) }}" class="btn btn-danger delete"
                    data-id="{{ $category->id }}">Delete</button>
                </td>
              </tr>
            @endforeach


          </tbody>


          </tbody>
        </table>
      </div>
    </div>
    {{-- Add Category Model --}}
    <div class="card-body">
      <div class="modal fade" id="addCategory" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">


          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel1">Add Category</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="{{ route('admin.category.store') }}" class="modal-content" method="POST">
            @csrf
            <div class="modal-body">
              <div class="row">
                <div class="col mb-3">
                  <label for="nameBasic" class="form-label">Category Name</label>
                  <input type="text" name="category_name" id="nameBasic" class="form-control"
                    value="{{ old('category_name') }}" placeholder="Electronic">
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                Close
              </button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </form>

        </div>

      </div>
    </div>
    {{-- End Add Category Model --}}
    {{-- Edit Category Model --}}
    <div class="modal fade" id="editCategoryModal" tabindex="-1" style="display: none;" aria-hidden="true">
      <div class="modal-dialog" role="document">

        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel1">Edit Category</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="{{ route('admin.category.update', $category->id) }}" id="edit-category-form" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-body">
              <div class="row">
                <div class="col mb-3">
                  <label for="edit_category_name" class="form-label">Category Name</label>
                  <input type="text" name="category_name" id="edit_category_name" class="form-control"
                    placeholder="Electronic">
                  <input type="hidden" name="category_id" id="category_id">
                </div>
              </div>
              <!-- Add more input fields for other category details -->
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </form>
        </div>

      </div>
    </div>

    {{-- End Edit Category Model --}}
  </div>
  </div>

@endsection
@section('script')
  <script>
    $(document).ready(function() {
      $('.edit-category').click(function() {
        var categoryId = $(this).data('id');
        var categoryName = $(this).data('category-name');
        // You can add more data attributes if needed
        console.log(categoryId);
        console.log(categoryName);

        // Set the values in the edit modal fields
        $('#category_id').val(categoryId);
        $('#edit_category_name').val(categoryName);
        // Set values for other fields in the edit modal

        // Show the edit modal
        $('#editCategoryModal').modal('show');
      });

      // Rest of your code...
    });
  </script>
@endsection
