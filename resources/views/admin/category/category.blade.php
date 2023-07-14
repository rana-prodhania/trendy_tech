@extends('admin.layouts.template')
@section('page-title', 'Category | Trendy Tech')
@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">

    <div class="d-flex align-items-center justify-content-between mb-4 py-3">
      <h4 class="fw-bold"><span class="text-muted fw-light">Page / </span> Category</h4>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategory">Add
        Category</button>
    </div>
    <div class="card">
      <h5 class="card-header">Available Category Information</h5>
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
              <th>Category Slug</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @foreach ($categories as $category)
              <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->category_name }}</td>
                <td>{{ $category->category_slug }}</td>
                <td>
                  <button class="btn btn-primary edit-category" data-category-id="{{ $category->id }}"
                    data-category-name="{{ $category->category_name }}">Edit</button>

                  <button class="btn btn-danger delete" data-id="{{ $category->id }}">Delete</button>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    {{-- Add Category Modal --}}
    <div class="modal fade" id="addCategory" tabindex="-1" style="display: none;" aria-hidden="true">
      <div class="modal-dialog" role="document">

        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel1">Add Category</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="{{ route('admin.category.store') }}" method="POST">
            @csrf

            <div class="modal-body">
              <div class="row">
                <div class="col mb-3">
                  <label for="add_category_name" class="form-label">Category Name</label>
                  <input type="text" name="category_name" id="add_category_name" class="form-control"
                    placeholder="Electronic">
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
    {{-- End Add Category Modal --}}
    {{-- Edit Category Model --}}
    <div class="modal fade" id="editCategoryModal" tabindex="-1" style="display: none;" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel1">Edit Category</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form id="edit-category-form" method="POST" action="{{ route('admin.category.update', '') }}">
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
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    {{-- End Edit Category Modal --}}
  </div>
  </div>

@endsection
@section('script')
  <script>
    $(document).ready(function() {
      $('.edit-category').click(function() {
        const categoryId = $(this).data('category-id');
        const categoryName = $(this).data('category-name');
        const formAction = "{{ route('admin.category.update', '') }}/" + categoryId;
        // Set the values in the edit modal fields
        $('#category_id').val(categoryId);
        $('#edit_category_name').val(categoryName);
        // Set the form action dynamically
        $('#edit-category-form').attr('action', formAction);
        // Show the edit modal
        $('#editCategoryModal').modal('show');
      });

      // Rest of your code...
    });
  </script>
@endsection
