<?php
require_once '../layout/base.php';
layoutTop('Datatables', [
  "public/vendor/datatables/extensions/buttons/buttons.bootstrap4.min.css"
]);
?>
<div class="wrapper">
  <!-- .page -->
  <div class="page">
    <!-- .page-inner -->
    <div class="page-inner">
      <!-- .page-title-bar -->
      <header class="page-title-bar">
        <!-- .breadcrumb -->
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item active">
              <a href="#"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Tables</a>
            </li>
          </ol>
        </nav><!-- /.breadcrumb -->
        <!-- floating action -->
        <button type="button" class="btn btn-success btn-floated"><span class="fa fa-plus"></span></button> <!-- /floating action -->
        <!-- title and toolbar -->
        <div class="d-md-flex align-items-md-start">
          <h1 class="page-title mr-sm-auto"> Datatables </h1><!-- .btn-toolbar -->
          <div id="dt-buttons" class="btn-toolbar"></div><!-- /.btn-toolbar -->
        </div><!-- /title and toolbar -->
      </header><!-- /.page-title-bar -->
      <!-- .page-section -->
      <div class="page-section">
        <!-- .card -->
        <div class="card card-fluid">
          <!-- .card-header -->
          <div class="card-header">
            <!-- .nav-tabs -->
            <ul class="nav nav-tabs card-header-tabs">
              <li class="nav-item">
                <a class="nav-link active show" data-toggle="tab" href="#tab1">All</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab2">Ongoing</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab3">Completed</a>
              </li>
            </ul><!-- /.nav-tabs -->
          </div><!-- /.card-header -->
          <!-- .card-body -->
          <div class="card-body">
            <!-- .form-group -->
            <div class="form-group">
              <!-- .input-group -->
              <div class="input-group input-group-alt">
                <!-- .input-group-prepend -->
                <div class="input-group-prepend">
                  <select id="filterBy" class="custom-select">
                    <option value='' selected> Filter By </option>
                    <option value="1"> Product </option>
                    <option value="2"> Inventory </option>
                    <option value="3"> Variants </option>
                    <option value="4"> Prices </option>
                    <option value="5"> Sales </option>
                  </select>
                </div><!-- /.input-group-prepend -->
                <!-- .input-group -->
                <div class="input-group has-clearable">
                  <button id="clear-search" type="button" class="close" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span></button>
                  <div class="input-group-prepend">
                    <span class="input-group-text"><span class="oi oi-magnifying-glass"></span></span>
                  </div><input id="table-search" type="text" class="form-control" placeholder="Search products">
                </div><!-- /.input-group -->
              </div><!-- /.input-group -->
            </div><!-- /.form-group -->
            <!-- .table -->
            <table id="myTable" class="table">
              <!-- thead -->
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
                    </div>
                  </th>
                  <th> Inventory </th>
                  <th> Variants </th>
                  <th> Prices </th>
                  <th> Sales </th>
                  <th style="width:100px; min-width:100px;"> &nbsp; </th>
                </tr>
              </thead><!-- /thead -->
              <!-- tbody -->
              <tbody>
                <!-- create empty row to passing html validator -->
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              </tbody><!-- /tbody -->
            </table><!-- /.table -->
          </div><!-- /.card-body -->
        </div><!-- /.card -->
        <hr class="my-5">
        <!-- .card -->
        <div class="card card-fluid">
          <!-- .card-header -->
          <div class="card-header"> Default view </div><!-- /.card-header -->
          <!-- .card-body -->
          <div class="card-body">
            <!-- .table -->
            <table id="myTable2" class="table">
              <!-- thead -->
              <thead>
                <tr>
                  <th style="min-width: 280px;"> Products </th>
                  <th> Inventory </th>
                  <th> Variants </th>
                  <th> Prices </th>
                  <th> Sales </th>
                  <th style="width:100px; min-width:100px;"> &nbsp; </th>
                </tr>
              </thead><!-- /thead -->
            </table><!-- /.table -->
          </div><!-- /.card-body -->
        </div><!-- /.card -->
      </div><!-- /.page-section -->
    </div><!-- /.page-inner -->
  </div><!-- /.page -->
</div><!-- .app-footer -->
<?php 
layoutBottom([
    "public/vendor/datatables/jquery.dataTables.min.js",
    "public/vendor/datatables/extensions/buttons/dataTables.buttons.min.js",
    "public/vendor/datatables/extensions/buttons/buttons.bootstrap4.min.js",
    "public/vendor/datatables/extensions/buttons/buttons.html5.min.js",
    "public/vendor/datatables/extensions/buttons/buttons.print.min.js",
    "public/js/pages/dataTables.bootstrap.js",
    "public/js/pages/datatables-demo.js"
]);
?>
