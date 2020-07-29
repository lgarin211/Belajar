@extends('master.blank')
@section('mat')
<div class="ml-3 mr-3 card card-body">
    <div class="table-responsive">
      <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
          <div class="row"><div class="col-sm-12 col-md-6">
            <div class="dataTables_length" id="dataTable_length">
            <label>Show <select name="dataTable_length" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm">
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
            </select> entries</label>
        </div>
        </div>
          <div class="col-sm-12 col-md-6">
              <div id="dataTable_filter" class="dataTables_filter">
              <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable">
        </label>
        </div>
        </div>
        </div>
          <div class="row">
              <div class="col-sm-12">
              <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
        <thead>
          <tr role="row" class="btn-warning">
            <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 144.001px;">NO</th>
            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 223.001px;">NAME</th>
            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 102.001px;">KELAS</th>
            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 43.0011px;">JURUSAN</th>
        </tr>
        </thead>
        <tfoot>
          <tr class="btn-warning">
              <th rowspan="1" colspan="1">NO</th>
              <th rowspan="1" colspan="1">NAME</th>
              <th rowspan="1" colspan="1">KELAS</th>
              <th rowspan="1" colspan="1">JURUSAN</th>
            </tr>
        </tfoot>
        <tbody>
        {{-- <tr role="row" class="odd btn-primary">
            <td class="sorting_1">Airi Satou</td>
            <td>Accountant</td>
            <td>Tokyo</td>
            <td>33</td>
          </tr> --}}
 </tbody>
      </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="dataTable_previous"><a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="dataTable_next"><a href="#" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
    </div>
  </div>
@endsection
