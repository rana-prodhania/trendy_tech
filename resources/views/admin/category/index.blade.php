@extends('admin.layouts.template')
@section('title', 'Category - Trendy Tech')
@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold mb-4 py-3">
      <span class="text-muted fw-light">Admin /</span> Category
    </h4>
    <!-- DataTable with Buttons -->
    <div class="card">
      <div class="card-datatable table-responsive">
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
          <div class="card-header flex-column flex-md-row">
            <div class="head-label text-center">
              <h5 class="card-title mb-0">Available Category Information</h5>
            </div>
            <div class="dt-action-buttons pt-md-0 pt-3 text-end">
              <div class="dt-buttons btn-group flex-wrap">
                <a href="">
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                    Launch modal
                  </button>

                </a>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 col-md-6">
              <div class="dataTables_length" id="DataTables_Table_0_length"><label>Show <select
                    name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-select">
                    <option value="7">7</option>
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="75">75</option>
                    <option value="100">100</option>
                  </select> entries</label></div>
            </div>
            <div class="col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end">
              <div id="DataTables_Table_0_filter" class="dataTables_filter"><label>Search:<input type="search"
                    class="form-control" placeholder="" aria-controls="DataTables_Table_0"></label></div>
            </div>
          </div>
          <table class="datatables-basic border-top dataTable no-footer dtr-column table" id="DataTables_Table_0"
            aria-describedby="DataTables_Table_0_info" style="width: 955px;">
            <thead>
              <tr>
                <th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1"
                  style="width: 24px; display: none;" aria-label=""></th>
                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                  style="width: 20px;" aria-label="Name: activate to sort column ascending">SL</th>
                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                  style="width: 83px;" aria-label="Name: activate to sort column ascending">Category Name</th>
                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                  style="width: 86px;" aria-label="Email: activate to sort column ascending">Category Slug</th>
                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 109px;" aria-label="Actions">
                  Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr class="odd">
                <td>1</td>
                <td>Android</td>
                <td>android</td>
                <td>
                  <a href=""><button class="btn btn-primary">Edit</button></a>
                  <a href=""><button class="btn btn-danger">Delete</button></a>
                </td>
              </tr>
            </tbody>
          </table>
          <div class="row">
            <div class="col-sm-12 col-md-6">
              <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 0 to
                0 of 0 entries</div>
            </div>
            <div class="col-sm-12 col-md-6">
              <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                <ul class="pagination">
                  <li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous"><a
                      href="#" aria-controls="DataTables_Table_0" data-dt-idx="previous" tabindex="0"
                      class="page-link">Previous</a></li>
                  <li class="paginate_button page-item next disabled" id="DataTables_Table_0_next"><a href="#"
                      aria-controls="DataTables_Table_0" data-dt-idx="next" tabindex="0" class="page-link">Next</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal to add new record -->
    <div class="col-lg-4 col-md-6">
      <small class="text-light fw-semibold">Default</small>
      <div class="mt-3">
        <!-- Button trigger modal -->


        <!-- Modal -->
        <div class="modal fade show" id="basicModal" tabindex="-1" style="display: block;" aria-modal="true"
          role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col mb-3">
                    <label for="nameBasic" class="form-label">Name</label>
                    <input type="text" id="nameBasic" class="form-control" placeholder="Enter Name">
                  </div>
                </div>
                <div class="row g-2">
                  <div class="col mb-0">
                    <label for="emailBasic" class="form-label">Email</label>
                    <input type="email" id="emailBasic" class="form-control" placeholder="xxxx@xxx.xx">
                  </div>
                  <div class="col mb-0">
                    <label for="dobBasic" class="form-label">DOB</label>
                    <input type="date" id="dobBasic" class="form-control" placeholder="DD / MM / YY">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ DataTable with Buttons -->
  </div>
@endsection
