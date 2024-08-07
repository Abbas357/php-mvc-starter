<?php
require_once '../layout/base.php';
layoutTop('Filter Columns', [
  "vendor/datatables/extensions/buttons/buttons.bootstrap4.min.css"
]);
?>
<div class="wrapper">
  <div class="page">
    <div class="page-inner">
      <header class="page-title-bar">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item active">
              <a href="#"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Tables</a>
            </li>
          </ol>
        </nav>
        <button type="button" class="btn btn-success btn-floated"><span class="fa fa-plus"></span></button>
        <div class="d-md-flex align-items-md-start">
          <h1 class="page-title mr-sm-auto"> Filter Columns </h1>
          <div id="dt-buttons" class="btn-toolbar"></div>
        </div>
      </header>
      <div class="page-section">
        <div class="card card-fluid">
          <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
              <li class="nav-item">
                <a class="nav-link active show" data-toggle="tab" href="#tab1">All</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab2">Actve</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab3">Non Active</a>
              </li>
            </ul>
          </div>
          <!-- <div class="card-body tab-content">
            <div id="tab1" class="tab-pane fade show active">
              <h4>All</h4>
              <p>Content for all tabs.</p>
            </div>
            <div id="tab2" class="tab-pane fade">
              <h4>Active</h4>
              <p>Content for active tab.</p>
            </div>
            <div id="tab3" class="tab-pane fade">
              <h4>Non Active</h4>
              <p>Content for non-active tab.</p>
            </div>
          </div> -->
          <div class="card-body">
            <div class="form-group">
              <div class="input-group input-group-alt">
                <div class="input-group has-clearable">
                  <button id="clear-search" type="button" class="close" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span></button>
                  <div class="input-group-prepend">
                    <span class="input-group-text"><span class="oi oi-magnifying-glass"></span></span>
                  </div><input id="table-search" type="text" class="form-control" placeholder="Search products">
                </div>
                <div class="input-group-append">
                  <button class="btn btn-secondary" data-toggle="modal" data-target="#modalFilterColumns">Filter Columns</button>
                </div>
              </div>
            </div>
            <div class="modal fade" id="modalFilterColumns" tabindex="-1" role="dialog" aria-labelledby="modalFilterColumnsLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="modalFilterColumnsLabel"> Filter Columns </h5>
                  </div>
                  <div class="modal-body">
                    <div id="filter-columns">
                      <div class="form-group form-row filter-row">
                        <div class="col">
                          <select class="custom-select filter-control filter-column">
                            <option value="1"> Name </option>
                            <option value="2"> Email </option>
                            <option value="3"> Designation </option>
                            <option value="4"> Office </option>
                          </select>
                        </div>
                        <div class="col">
                          <select class="custom-select filter-control filter-operator">
                            <option value="contain"> Contain </option>
                            <option value="notcontain"> Not Contain </option>
                            <option value="equal"> Equal to </option>
                            <option value="notequal"> Not equal to </option>
                            <option value="beginwith"> Begin with </option>
                            <option value="endwith"> End with </option>
                            <option value="greaterthan"> Greater than </option>
                            <option value="lessthan"> Less than </option>
                          </select>
                        </div>
                        <div class="col">
                          <div class="input-group input-group-alt">
                            <input type="text" class="form-control filter-control filter-value rounded mr-2">
                            <div class="input-group-append">
                              <button class="close remove-filter-row">×</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group form-row filter-row">
                        <div class="col">
                          <select class="custom-select filter-control filter-column">
                            <option value="1"> Name </option>
                            <option value="2"> Email </option>
                            <option value="3"> Designation </option>
                            <option value="4"> Office </option>
                          </select>
                        </div>
                        <div class="col">
                          <select class="custom-select filter-control filter-operator">
                            <option value="contain"> Contain </option>
                            <option value="notcontain"> Not Contain </option>
                            <option value="equal"> Equal to </option>
                            <option value="notequal"> Not equal to </option>
                            <option value="beginwith"> Begin with </option>
                            <option value="endwith"> End with </option>
                            <option value="greaterthan"> Greater than </option>
                            <option value="lessthan"> Less than </option>
                          </select>
                        </div>
                        <div class="col">
                          <div class="input-group input-group-alt">
                            <input type="text" class="form-control filter-control filter-value rounded mr-2">
                            <div class="input-group-append">
                              <button class="close remove-filter-row">×</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <button id="add-filter-row" class="btn btn-reset my-2"><i class="fa fa-plus mr-1"></i> add filter</button>
                  </div>
                  <div class="modal-footer justify-content-start">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Apply filters</button> <button type="button" class="btn btn-light" id="clear-filter">Cancel</button>
                  </div>
                </div>
              </div>
            </div>
            <table id="myTable" class="table">
              <thead>
                <tr>
                  <th colspan="2" style="min-width: 320px;">
                    <div class="thead-dd dropdown">
                      <span class="custom-control custom-control-nolabel custom-checkbox"><input type="checkbox" class="custom-control-input" id="check-handle"> <label class="custom-control-label" for="check-handle"></label></span>
                      <div class="thead-btn" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="fa fa-caret-down"></span>
                      </div>
                      <div class="dropdown-menu">
                        <div class="dropdown-arrow"></div><a class="dropdown-item" href="#">Select all</a> <a class="dropdown-item" href="#">Unselect all</a>
                        <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Bulk remove</a> <a class="dropdown-item" href="#">Bulk edit</a> <a class="dropdown-item" href="#">Separate actions</a>
                      </div>
                    </div> &nbsp; Name
                  </th>
                  <th> Email </th>
                  <th> Designation </th>
                  <th> Office </th>
                  <th> Office </th>
                  <th style="width:100px; min-width:100px;"> &nbsp; </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
layoutBottom([
  "vendor/datatables/jquery.dataTables.min.js",
  "vendor/datatables/extensions/buttons/dataTables.buttons.min.js",
  "vendor/datatables/extensions/buttons/buttons.bootstrap4.min.js",
  "vendor/datatables/extensions/buttons/buttons.html5.min.js",
  "vendor/datatables/extensions/buttons/buttons.print.min.js",
  "js/pages/dataTables.bootstrap.js",
  "js/pages/datatables-filters-demo.js"
]);
?>