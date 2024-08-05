<?php
require_once '../layout/base.php';
layoutTop('Table Basic');
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
          <h1 class="page-title mr-sm-auto"> Basic Table </h1><!-- .btn-toolbar -->
          <div class="btn-toolbar">
            <button type="button" class="btn btn-light"><i class="oi oi-data-transfer-download"></i> <span class="ml-1">Export</span></button> <button type="button" class="btn btn-light"><i class="oi oi-data-transfer-upload"></i> <span class="ml-1">Import</span></button>
            <div class="dropdown">
              <button type="button" class="btn btn-light" data-toggle="dropdown"><span>More</span> <span class="fa fa-caret-down"></span></button>
              <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-arrow"></div><a href="#" class="dropdown-item">Add tasks</a> <a href="#" class="dropdown-item">Invite members</a>
                <div class="dropdown-divider"></div><a href="#" class="dropdown-item">Share</a> <a href="#" class="dropdown-item">Archive</a> <a href="#" class="dropdown-item">Remove</a>
              </div>
            </div>
          </div><!-- /.btn-toolbar -->
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
                  <select class="custom-select">
                    <option selected> Filter By </option>
                    <option value="1"> Tags </option>
                    <option value="2"> Vendor </option>
                    <option value="3"> Variants </option>
                    <option value="4"> Prices </option>
                    <option value="5"> Sales </option>
                  </select>
                </div><!-- /.input-group-prepend -->
                <!-- .input-group -->
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><span class="oi oi-magnifying-glass"></span></span>
                  </div><input type="text" class="form-control" placeholder="Search record">
                </div><!-- /.input-group -->
              </div><!-- /.input-group -->
            </div><!-- /.form-group -->
            <!-- .table-responsive -->
            <div class="text-muted"> Showing 1 to 10 of 1,000 entries </div>
            <div class="table-responsive">
              <!-- .table -->
              <table class="table">
                <!-- thead -->
                <thead>
                  <tr>
                    <th colspan="2" style="min-width:320px">
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
                  <!-- tr -->
                  <tr>
                    <td class="align-middle col-checker">
                      <div class="custom-control custom-control-nolabel custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="selectedRow[]" id="p3"> <label class="custom-control-label" for="p3"></label>
                      </div>
                    </td>
                    <td>
                      <a href="#" class="tile tile-img mr-1"><img class="img-fluid" src="public/images/dummy/img-1.jpg" alt="Card image cap"></a> <a href="#">Tomato - Green</a>
                    </td>
                    <td class="align-middle"> 329 </td>
                    <td class="align-middle"> 4 </td>
                    <td class="align-middle"> $31.70 </td>
                    <td class="align-middle"> 796 </td>
                    <td class="align-middle text-right">
                      <a href="#" class="btn btn-sm btn-icon btn-secondary"><i class="fa fa-pencil-alt"></i> <span class="sr-only">Edit</span></a> <a href="#" class="btn btn-sm btn-icon btn-secondary"><i class="far fa-trash-alt"></i> <span class="sr-only">Remove</span></a>
                    </td>
                  </tr><!-- /tr -->
                  <!-- tr -->
                  <tr>
                    <td class="align-middle col-checker">
                      <div class="custom-control custom-control-nolabel custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="selectedRow[]" id="p4"> <label class="custom-control-label" for="p4"></label>
                      </div>
                    </td>
                    <td>
                      <a href="#" class="tile tile-img mr-1"><img class="img-fluid" src="public/images/dummy/img-3.jpg" alt="Card image cap"></a> <a href="#">Quiche Assorted</a>
                    </td>
                    <td class="align-middle"> 169 </td>
                    <td class="align-middle"> 1 </td>
                    <td class="align-middle"> $34.41 </td>
                    <td class="align-middle"> 1824 </td>
                    <td class="align-middle text-right">
                      <a href="#" class="btn btn-sm btn-icon btn-secondary"><i class="fa fa-pencil-alt"></i> <span class="sr-only">Edit</span></a> <a href="#" class="btn btn-sm btn-icon btn-secondary"><i class="far fa-trash-alt"></i> <span class="sr-only">Remove</span></a>
                    </td>
                  </tr><!-- /tr -->
                  <!-- tr -->
                  <tr>
                    <td class="align-middle col-checker">
                      <div class="custom-control custom-control-nolabel custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="selectedRow[]" id="p5"> <label class="custom-control-label" for="p5"></label>
                      </div>
                    </td>
                    <td>
                      <a href="#" class="tile tile-img mr-1"><img class="img-fluid" src="public/images/dummy/img-5.jpg" alt="Card image cap"></a> <a href="#">Cookies Oatmeal Raisin</a>
                    </td>
                    <td class="align-middle"> 155 </td>
                    <td class="align-middle"> 2 </td>
                    <td class="align-middle"> $39.26 </td>
                    <td class="align-middle"> 366 </td>
                    <td class="align-middle text-right">
                      <a href="#" class="btn btn-sm btn-icon btn-secondary"><i class="fa fa-pencil-alt"></i> <span class="sr-only">Edit</span></a> <a href="#" class="btn btn-sm btn-icon btn-secondary"><i class="far fa-trash-alt"></i> <span class="sr-only">Remove</span></a>
                    </td>
                  </tr><!-- /tr -->
                  <!-- tr -->
                  <tr>
                    <td class="align-middle col-checker">
                      <div class="custom-control custom-control-nolabel custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="selectedRow[]" id="p6"> <label class="custom-control-label" for="p6"></label>
                      </div>
                    </td>
                    <td>
                      <a href="#" class="tile tile-img mr-1"><img class="img-fluid" src="public/images/dummy/img-7.jpg" alt="Card image cap"></a> <a href="#">Lemonade - Mandarin, 591 Ml</a>
                    </td>
                    <td class="align-middle"> 391 </td>
                    <td class="align-middle"> 3 </td>
                    <td class="align-middle"> $34.03 </td>
                    <td class="align-middle"> 921 </td>
                    <td class="align-middle text-right">
                      <a href="#" class="btn btn-sm btn-icon btn-secondary"><i class="fa fa-pencil-alt"></i> <span class="sr-only">Edit</span></a> <a href="#" class="btn btn-sm btn-icon btn-secondary"><i class="far fa-trash-alt"></i> <span class="sr-only">Remove</span></a>
                    </td>
                  </tr><!-- /tr -->
                  <!-- tr -->
                  <tr>
                    <td class="align-middle col-checker">
                      <div class="custom-control custom-control-nolabel custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="selectedRow[]" id="p7"> <label class="custom-control-label" for="p7"></label>
                      </div>
                    </td>
                    <td>
                      <a href="#" class="tile tile-img mr-1"><img class="img-fluid" src="public/images/dummy/img-2.jpg" alt="Card image cap"></a> <a href="#">Sour Puss - Tangerine</a>
                    </td>
                    <td class="align-middle"> 368 </td>
                    <td class="align-middle"> 4 </td>
                    <td class="align-middle"> $32.68 </td>
                    <td class="align-middle"> 1216 </td>
                    <td class="align-middle text-right">
                      <a href="#" class="btn btn-sm btn-icon btn-secondary"><i class="fa fa-pencil-alt"></i> <span class="sr-only">Edit</span></a> <a href="#" class="btn btn-sm btn-icon btn-secondary"><i class="far fa-trash-alt"></i> <span class="sr-only">Remove</span></a>
                    </td>
                  </tr><!-- /tr -->
                  <!-- tr -->
                  <tr>
                    <td class="align-middle col-checker">
                      <div class="custom-control custom-control-nolabel custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="selectedRow[]" id="p8"> <label class="custom-control-label" for="p8"></label>
                      </div>
                    </td>
                    <td>
                      <a href="#" class="tile tile-img mr-1"><img class="img-fluid" src="public/images/dummy/img-6.jpg" alt="Card image cap"></a> <a href="#">Scallops - 20/30</a>
                    </td>
                    <td class="align-middle"> 345 </td>
                    <td class="align-middle"> 4 </td>
                    <td class="align-middle"> $29.34 </td>
                    <td class="align-middle"> 883 </td>
                    <td class="align-middle text-right">
                      <a href="#" class="btn btn-sm btn-icon btn-secondary"><i class="fa fa-pencil-alt"></i> <span class="sr-only">Edit</span></a> <a href="#" class="btn btn-sm btn-icon btn-secondary"><i class="far fa-trash-alt"></i> <span class="sr-only">Remove</span></a>
                    </td>
                  </tr><!-- /tr -->
                  <!-- tr -->
                  <tr>
                    <td class="align-middle col-checker">
                      <div class="custom-control custom-control-nolabel custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="selectedRow[]" id="p9"> <label class="custom-control-label" for="p9"></label>
                      </div>
                    </td>
                    <td>
                      <a href="#" class="tile tile-img mr-1"><img class="img-fluid" src="public/images/dummy/img-4.jpg" alt="Card image cap"></a> <a href="#">Skirt - 29 Foot</a>
                    </td>
                    <td class="align-middle"> 432 </td>
                    <td class="align-middle"> 3 </td>
                    <td class="align-middle"> $23.50 </td>
                    <td class="align-middle"> 854 </td>
                    <td class="align-middle text-right">
                      <a href="#" class="btn btn-sm btn-icon btn-secondary"><i class="fa fa-pencil-alt"></i> <span class="sr-only">Edit</span></a> <a href="#" class="btn btn-sm btn-icon btn-secondary"><i class="far fa-trash-alt"></i> <span class="sr-only">Remove</span></a>
                    </td>
                  </tr><!-- /tr -->
                  <!-- tr -->
                  <tr>
                    <td class="align-middle col-checker">
                      <div class="custom-control custom-control-nolabel custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="selectedRow[]" id="p10"> <label class="custom-control-label" for="p10"></label>
                      </div>
                    </td>
                    <td>
                      <a href="#" class="tile tile-img mr-1"><img class="img-fluid" src="public/images/dummy/img-8.jpg" alt="Card image cap"></a> <a href="#">Tea - Grapefruit Green Tea</a>
                    </td>
                    <td class="align-middle"> 461 </td>
                    <td class="align-middle"> 6 </td>
                    <td class="align-middle"> $29.09 </td>
                    <td class="align-middle"> 1694 </td>
                    <td class="align-middle text-right">
                      <a href="#" class="btn btn-sm btn-icon btn-secondary"><i class="fa fa-pencil-alt"></i> <span class="sr-only">Edit</span></a> <a href="#" class="btn btn-sm btn-icon btn-secondary"><i class="far fa-trash-alt"></i> <span class="sr-only">Remove</span></a>
                    </td>
                  </tr><!-- /tr -->
                  <!-- tr -->
                  <tr>
                    <td class="align-middle col-checker">
                      <div class="custom-control custom-control-nolabel custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="selectedRow[]" id="p11"> <label class="custom-control-label" for="p11"></label>
                      </div>
                    </td>
                    <td>
                      <a href="#" class="tile tile-img mr-1"><img class="img-fluid" src="public/images/dummy/img-6.jpg" alt="Card image cap"></a> <a href="#">Pecan Raisin - Tarts</a>
                    </td>
                    <td class="align-middle"> 235 </td>
                    <td class="align-middle"> 1 </td>
                    <td class="align-middle"> $31.28 </td>
                    <td class="align-middle"> 353 </td>
                    <td class="align-middle text-right">
                      <a href="#" class="btn btn-sm btn-icon btn-secondary"><i class="fa fa-pencil-alt"></i> <span class="sr-only">Edit</span></a> <a href="#" class="btn btn-sm btn-icon btn-secondary"><i class="far fa-trash-alt"></i> <span class="sr-only">Remove</span></a>
                    </td>
                  </tr><!-- /tr -->
                  <!-- tr -->
                  <tr>
                    <td class="align-middle col-checker">
                      <div class="custom-control custom-control-nolabel custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="selectedRow[]" id="p12"> <label class="custom-control-label" for="p12"></label>
                      </div>
                    </td>
                    <td>
                      <a href="#" class="tile tile-img mr-1"><img class="img-fluid" src="public/images/dummy/img-5.jpg" alt="Card image cap"></a> <a href="#">Wine - Chateau Bonnet</a>
                    </td>
                    <td class="align-middle"> 113 </td>
                    <td class="align-middle"> 2 </td>
                    <td class="align-middle"> $22.38 </td>
                    <td class="align-middle"> 1281 </td>
                    <td class="align-middle text-right">
                      <a href="#" class="btn btn-sm btn-icon btn-secondary"><i class="fa fa-pencil-alt"></i> <span class="sr-only">Edit</span></a> <a href="#" class="btn btn-sm btn-icon btn-secondary"><i class="far fa-trash-alt"></i> <span class="sr-only">Remove</span></a>
                    </td>
                  </tr><!-- /tr -->
                </tbody><!-- /tbody -->
              </table><!-- /.table -->
            </div><!-- /.table-responsive -->
            <!-- .pagination -->
            <ul class="pagination justify-content-center mt-4">
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1"><i class="fa fa-lg fa-angle-left"></i></a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">1</a>
              </li>
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">...</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">13</a>
              </li>
              <li class="page-item active">
                <a class="page-link" href="#">14</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">15</a>
              </li>
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">...</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">24</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#"><i class="fa fa-lg fa-angle-right"></i></a>
              </li>
            </ul><!-- /.pagination -->
          </div><!-- /.card-body -->
        </div><!-- /.card -->
        <hr class="my-5">
        <!-- .section-block -->
        <div class="section-block">
          <h2 class="section-title"> Nested Rows </h2>
        </div><!-- /.section-block -->
        <!-- .card -->
        <div class="card card-fluid">
          <!-- .card-body -->
          <div class="card-body">
            <div class="table-responsive">
              <!-- .table -->
              <table class="table">
                <!-- thead -->
                <thead>
                  <tr>
                    <th colspan="3" style="min-width: 240px">
                      <div class="thead-dd dropdown">
                        <span class="custom-control custom-control-nolabel custom-checkbox"><input type="checkbox" class="custom-control-input" id="check-handle2"> <label class="custom-control-label" for="check-handle2"></label></span>
                        <div class="thead-btn" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="fa fa-caret-down"></span>
                        </div>
                        <div class="dropdown-menu">
                          <div class="dropdown-arrow"></div><a class="dropdown-item" href="#">Select all</a> <a class="dropdown-item" href="#">Unselect all</a>
                          <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Bulk remove</a> <a class="dropdown-item" href="#">Bulk edit</a> <a class="dropdown-item" href="#">Separate actions</a>
                        </div>
                      </div>
                    </th>
                    <th> Bill </th>
                    <th> Status </th>
                    <th style="width:100px; min-width:100px;"> &nbsp; </th>
                  </tr>
                </thead><!-- /thead -->
                <!-- tbody -->
                <tbody>
                  <!-- tr -->
                  <tr>
                    <td class="align-middle col-checker">
                      <div class="custom-control custom-control-nolabel custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="cid5743"> <label class="custom-control-label" for="cid5743"></label>
                      </div>
                    </td>
                    <td class="align-middle px-0" style="width: 1.5rem">
                      <button type="button" class="btn btn-sm btn-icon btn-light" data-toggle="collapse" data-target="#details-cid5743"><span class="collapse-indicator"><i class="fa fa-angle-right"></i></span></button>
                    </td>
                    <td class="align-middle">
                      <a href="#">Opentech</a>
                    </td>
                    <td class="align-middle"> $0.00 </td>
                    <td class="align-middle">
                      <span class="badge badge-subtle badge-success">Completed</span>
                    </td>
                    <td class="align-middle text-right">
                      <a href="#" class="btn btn-sm btn-icon btn-secondary"><i class="fa fa-pencil-alt"></i> <span class="sr-only">Edit</span></a> <a href="#" class="btn btn-sm btn-icon btn-secondary"><i class="far fa-trash-alt"></i> <span class="sr-only">Remove</span></a>
                    </td>
                  </tr><!-- /tr -->
                  <!-- tr -->
                  <tr class="row-details bg-light collapse" id="details-cid5743">
                    <td colspan="6">
                      <!-- .row -->
                      <div class="row">
                        <!-- .col -->
                        <div class="col-md-auto text-center">
                          <div class="tile tile-xl tile-circle bg-purple mb-2"> O </div>
                          <h3 class="card-title mb-4"> Opentech </h3>
                        </div><!-- /.col -->
                        <!-- .col -->
                        <div class="col-md-7">
                          <table class="table table-bordered">
                            <tbody>
                              <tr>
                                <td> Contact </td>
                                <td> Lori Burns </td>
                              </tr>
                              <tr>
                                <td> Email </td>
                                <td> loriburns@example.com </td>
                              </tr>
                              <tr>
                                <td> Phone </td>
                                <td> (381) 765 6879 </td>
                              </tr>
                              <tr>
                                <td> Address </td>
                                <td> 983 Kunde Glens, Pourosmouth, AK 68019-8335 </td>
                              </tr>
                              <tr>
                                <td> Location </td>
                                <td> Los Angeles, United States </td>
                              </tr>
                              <tr>
                                <td> Joined </td>
                                <td> 2018/05/23 </td>
                              </tr>
                              <tr>
                                <td> Last active </td>
                                <td> 2 hours ago </td>
                              </tr>
                            </tbody>
                          </table>
                        </div><!-- /.col -->
                        <!-- .col -->
                        <div class="col">
                          <!-- .publisher -->
                          <div class="publisher keep-focus focus">
                            <label for="publisherInput85743" class="publisher-label">Send a message to client</label> <!-- .publisher-input -->
                            <div class="publisher-input">
                              <textarea id="publisherInput85743" class="form-control" placeholder="Write a message"></textarea>
                            </div><!-- /.publisher-input -->
                            <!-- .publisher-actions -->
                            <div class="publisher-actions align-items-center">
                              <!-- .publisher-tools -->
                              <div class="publisher-tools mr-auto">
                                <div class="btn btn-light btn-icon fileinput-button">
                                  <i class="fa fa-paperclip"></i> <input type="file" id="attachment85743[]" name="attachment85743[]" multiple>
                                </div><button type="button" class="btn btn-light btn-icon"><i class="far fa-smile"></i></button>
                              </div><!-- /.publisher-tools -->
                              <div class="custom-control custom-control-inline custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="copymsg5743" checked> <label class="custom-control-label" for="copymsg5743">Send me a copy</label>
                              </div><button type="submit" class="btn btn-primary">Send</button>
                            </div><!-- /.publisher-actions -->
                          </div><!-- /.publisher -->
                        </div><!-- /.col -->
                      </div><!-- /.row -->
                    </td>
                  </tr><!-- /tr -->
                  <!-- tr -->
                  <tr>
                    <td class="align-middle col-checker">
                      <div class="custom-control custom-control-nolabel custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="cid5476"> <label class="custom-control-label" for="cid5476"></label>
                      </div>
                    </td>
                    <td class="align-middle px-0" style="width: 1.5rem">
                      <button type="button" class="btn btn-sm btn-icon btn-light" data-toggle="collapse" data-target="#details-cid5476"><span class="collapse-indicator"><i class="fa fa-angle-right"></i></span></button>
                    </td>
                    <td class="align-middle">
                      <a href="#">Codehow</a>
                    </td>
                    <td class="align-middle"> $7,625.00 </td>
                    <td class="align-middle">
                      <span class="badge badge-subtle badge-warning">On Going</span>
                    </td>
                    <td class="align-middle text-right">
                      <a href="#" class="btn btn-sm btn-icon btn-secondary"><i class="fa fa-pencil-alt"></i> <span class="sr-only">Edit</span></a> <a href="#" class="btn btn-sm btn-icon btn-secondary"><i class="far fa-trash-alt"></i> <span class="sr-only">Remove</span></a>
                    </td>
                  </tr><!-- /tr -->
                  <!-- tr -->
                  <tr class="row-details bg-light collapse" id="details-cid5476">
                    <td colspan="6">
                      <!-- .row -->
                      <div class="row">
                        <!-- .col -->
                        <div class="col-md-auto text-center">
                          <div class="tile tile-xl tile-circle bg-pink mb-2"> C </div>
                          <h3 class="card-title mb-4"> Codehow </h3>
                        </div><!-- /.col -->
                        <!-- .col -->
                        <div class="col-md-7">
                          <table class="table table-bordered">
                            <tbody>
                              <tr>
                                <td> Contact </td>
                                <td> Zachary Hayes </td>
                              </tr>
                              <tr>
                                <td> Email </td>
                                <td> zachary90@example.com </td>
                              </tr>
                              <tr>
                                <td> Phone </td>
                                <td> (783) 482 6904 </td>
                              </tr>
                              <tr>
                                <td> Address </td>
                                <td> 983 Kunde Glens, Pourosmouth, AK 68019-8335 </td>
                              </tr>
                              <tr>
                                <td> Location </td>
                                <td> Mexico City, Mexico </td>
                              </tr>
                              <tr>
                                <td> Joined </td>
                                <td> 2018/05/23 </td>
                              </tr>
                              <tr>
                                <td> Last active </td>
                                <td> 2 hours ago </td>
                              </tr>
                            </tbody>
                          </table>
                        </div><!-- /.col -->
                        <!-- .col -->
                        <div class="col">
                          <!-- .publisher -->
                          <div class="publisher keep-focus focus">
                            <label for="publisherInput85476" class="publisher-label">Send a message to client</label> <!-- .publisher-input -->
                            <div class="publisher-input">
                              <textarea id="publisherInput85476" class="form-control" placeholder="Write a message"></textarea>
                            </div><!-- /.publisher-input -->
                            <!-- .publisher-actions -->
                            <div class="publisher-actions align-items-center">
                              <!-- .publisher-tools -->
                              <div class="publisher-tools mr-auto">
                                <div class="btn btn-light btn-icon fileinput-button">
                                  <i class="fa fa-paperclip"></i> <input type="file" id="attachment85476[]" name="attachment85476[]" multiple>
                                </div><button type="button" class="btn btn-light btn-icon"><i class="far fa-smile"></i></button>
                              </div><!-- /.publisher-tools -->
                              <div class="custom-control custom-control-inline custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="copymsg5476" checked> <label class="custom-control-label" for="copymsg5476">Send me a copy</label>
                              </div><button type="submit" class="btn btn-primary">Send</button>
                            </div><!-- /.publisher-actions -->
                          </div><!-- /.publisher -->
                        </div><!-- /.col -->
                      </div><!-- /.row -->
                    </td>
                  </tr><!-- /tr -->
                  <!-- tr -->
                  <tr>
                    <td class="align-middle col-checker">
                      <div class="custom-control custom-control-nolabel custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="cid4423"> <label class="custom-control-label" for="cid4423"></label>
                      </div>
                    </td>
                    <td class="align-middle px-0" style="width: 1.5rem">
                      <button type="button" class="btn btn-sm btn-icon btn-light" data-toggle="collapse" data-target="#details-cid4423"><span class="collapse-indicator"><i class="fa fa-angle-right"></i></span></button>
                    </td>
                    <td class="align-middle">
                      <a href="#">Ron-tech</a>
                    </td>
                    <td class="align-middle"> $0.00 </td>
                    <td class="align-middle">
                      <span class="badge badge-subtle badge-success">Completed</span>
                    </td>
                    <td class="align-middle text-right">
                      <a href="#" class="btn btn-sm btn-icon btn-secondary"><i class="fa fa-pencil-alt"></i> <span class="sr-only">Edit</span></a> <a href="#" class="btn btn-sm btn-icon btn-secondary"><i class="far fa-trash-alt"></i> <span class="sr-only">Remove</span></a>
                    </td>
                  </tr><!-- /tr -->
                  <!-- tr -->
                  <tr class="row-details bg-light collapse" id="details-cid4423">
                    <td colspan="6">
                      <!-- .row -->
                      <div class="row">
                        <!-- .col -->
                        <div class="col-md-auto text-center">
                          <div class="tile tile-xl tile-circle bg-red mb-2"> R </div>
                          <h3 class="card-title mb-4"> Ron-tech </h3>
                        </div><!-- /.col -->
                        <!-- .col -->
                        <div class="col-md-7">
                          <table class="table table-bordered">
                            <tbody>
                              <tr>
                                <td> Contact </td>
                                <td> Nancy Knight </td>
                              </tr>
                              <tr>
                                <td> Email </td>
                                <td> nancy-knight@example.com </td>
                              </tr>
                              <tr>
                                <td> Phone </td>
                                <td> (662) 753 5165 </td>
                              </tr>
                              <tr>
                                <td> Address </td>
                                <td> 983 Kunde Glens, Pourosmouth, AK 68019-8335 </td>
                              </tr>
                              <tr>
                                <td> Location </td>
                                <td> Pekalongan, Indonesia </td>
                              </tr>
                              <tr>
                                <td> Joined </td>
                                <td> 2018/05/23 </td>
                              </tr>
                              <tr>
                                <td> Last active </td>
                                <td> 2 hours ago </td>
                              </tr>
                            </tbody>
                          </table>
                        </div><!-- /.col -->
                        <!-- .col -->
                        <div class="col">
                          <!-- .publisher -->
                          <div class="publisher keep-focus focus">
                            <label for="publisherInput84423" class="publisher-label">Send a message to client</label> <!-- .publisher-input -->
                            <div class="publisher-input">
                              <textarea id="publisherInput84423" class="form-control" placeholder="Write a message"></textarea>
                            </div><!-- /.publisher-input -->
                            <!-- .publisher-actions -->
                            <div class="publisher-actions align-items-center">
                              <!-- .publisher-tools -->
                              <div class="publisher-tools mr-auto">
                                <div class="btn btn-light btn-icon fileinput-button">
                                  <i class="fa fa-paperclip"></i> <input type="file" id="attachment84423[]" name="attachment84423[]" multiple>
                                </div><button type="button" class="btn btn-light btn-icon"><i class="far fa-smile"></i></button>
                              </div><!-- /.publisher-tools -->
                              <div class="custom-control custom-control-inline custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="copymsg4423" checked> <label class="custom-control-label" for="copymsg4423">Send me a copy</label>
                              </div><button type="submit" class="btn btn-primary">Send</button>
                            </div><!-- /.publisher-actions -->
                          </div><!-- /.publisher -->
                        </div><!-- /.col -->
                      </div><!-- /.row -->
                    </td>
                  </tr><!-- /tr -->
                  <!-- tr -->
                  <tr>
                    <td class="align-middle col-checker">
                      <div class="custom-control custom-control-nolabel custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="cid6938"> <label class="custom-control-label" for="cid6938"></label>
                      </div>
                    </td>
                    <td class="align-middle px-0" style="width: 1.5rem">
                      <button type="button" class="btn btn-sm btn-icon btn-light" data-toggle="collapse" data-target="#details-cid6938"><span class="collapse-indicator"><i class="fa fa-angle-right"></i></span></button>
                    </td>
                    <td class="align-middle">
                      <a href="#">Groovestreet</a>
                    </td>
                    <td class="align-middle"> $0.00 </td>
                    <td class="align-middle">
                      <span class="badge badge-subtle badge-success">Completed</span>
                    </td>
                    <td class="align-middle text-right">
                      <a href="#" class="btn btn-sm btn-icon btn-secondary"><i class="fa fa-pencil-alt"></i> <span class="sr-only">Edit</span></a> <a href="#" class="btn btn-sm btn-icon btn-secondary"><i class="far fa-trash-alt"></i> <span class="sr-only">Remove</span></a>
                    </td>
                  </tr><!-- /tr -->
                  <!-- tr -->
                  <tr class="row-details bg-light collapse" id="details-cid6938">
                    <td colspan="6">
                      <!-- .row -->
                      <div class="row">
                        <!-- .col -->
                        <div class="col-md-auto text-center">
                          <div class="tile tile-xl tile-circle bg-orange mb-2"> G </div>
                          <h3 class="card-title mb-4"> Groovestreet </h3>
                        </div><!-- /.col -->
                        <!-- .col -->
                        <div class="col-md-7">
                          <table class="table table-bordered">
                            <tbody>
                              <tr>
                                <td> Contact </td>
                                <td> Rebecca Stewart </td>
                              </tr>
                              <tr>
                                <td> Email </td>
                                <td> rebecca-95@example.com </td>
                              </tr>
                              <tr>
                                <td> Phone </td>
                                <td> (511) 216 7617 </td>
                              </tr>
                              <tr>
                                <td> Address </td>
                                <td> 983 Kunde Glens, Pourosmouth, AK 68019-8335 </td>
                              </tr>
                              <tr>
                                <td> Location </td>
                                <td> London, United Kingdom </td>
                              </tr>
                              <tr>
                                <td> Joined </td>
                                <td> 2018/05/23 </td>
                              </tr>
                              <tr>
                                <td> Last active </td>
                                <td> 2 hours ago </td>
                              </tr>
                            </tbody>
                          </table>
                        </div><!-- /.col -->
                        <!-- .col -->
                        <div class="col">
                          <!-- .publisher -->
                          <div class="publisher keep-focus focus">
                            <label for="publisherInput86938" class="publisher-label">Send a message to client</label> <!-- .publisher-input -->
                            <div class="publisher-input">
                              <textarea id="publisherInput86938" class="form-control" placeholder="Write a message"></textarea>
                            </div><!-- /.publisher-input -->
                            <!-- .publisher-actions -->
                            <div class="publisher-actions align-items-center">
                              <!-- .publisher-tools -->
                              <div class="publisher-tools mr-auto">
                                <div class="btn btn-light btn-icon fileinput-button">
                                  <i class="fa fa-paperclip"></i> <input type="file" id="attachment86938[]" name="attachment86938[]" multiple>
                                </div><button type="button" class="btn btn-light btn-icon"><i class="far fa-smile"></i></button>
                              </div><!-- /.publisher-tools -->
                              <div class="custom-control custom-control-inline custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="copymsg6938" checked> <label class="custom-control-label" for="copymsg6938">Send me a copy</label>
                              </div><button type="submit" class="btn btn-primary">Send</button>
                            </div><!-- /.publisher-actions -->
                          </div><!-- /.publisher -->
                        </div><!-- /.col -->
                      </div><!-- /.row -->
                    </td>
                  </tr><!-- /tr -->
                  <!-- tr -->
                  <tr>
                    <td class="align-middle col-checker">
                      <div class="custom-control custom-control-nolabel custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="cid6796"> <label class="custom-control-label" for="cid6796"></label>
                      </div>
                    </td>
                    <td class="align-middle px-0" style="width: 1.5rem">
                      <button type="button" class="btn btn-sm btn-icon btn-light" data-toggle="collapse" data-target="#details-cid6796"><span class="collapse-indicator"><i class="fa fa-angle-right"></i></span></button>
                    </td>
                    <td class="align-middle">
                      <a href="#">Bioplex et Chandon</a>
                    </td>
                    <td class="align-middle"> $3,142.00 </td>
                    <td class="align-middle">
                      <span class="badge badge-subtle badge-warning">On Going</span>
                    </td>
                    <td class="align-middle text-right">
                      <a href="#" class="btn btn-sm btn-icon btn-secondary"><i class="fa fa-pencil-alt"></i> <span class="sr-only">Edit</span></a> <a href="#" class="btn btn-sm btn-icon btn-secondary"><i class="far fa-trash-alt"></i> <span class="sr-only">Remove</span></a>
                    </td>
                  </tr><!-- /tr -->
                  <!-- tr -->
                  <tr class="row-details bg-light collapse" id="details-cid6796">
                    <td colspan="6">
                      <!-- .row -->
                      <div class="row">
                        <!-- .col -->
                        <div class="col-md-auto text-center">
                          <div class="tile tile-xl tile-circle bg-yellow mb-2"> B </div>
                          <h3 class="card-title mb-4"> Bioplex et Chandon </h3>
                        </div><!-- /.col -->
                        <!-- .col -->
                        <div class="col-md-7">
                          <table class="table table-bordered">
                            <tbody>
                              <tr>
                                <td> Contact </td>
                                <td> James Harris </td>
                              </tr>
                              <tr>
                                <td> Email </td>
                                <td> james_harris@example.com </td>
                              </tr>
                              <tr>
                                <td> Phone </td>
                                <td> (370) 570 8122 </td>
                              </tr>
                              <tr>
                                <td> Address </td>
                                <td> 983 Kunde Glens, Pourosmouth, AK 68019-8335 </td>
                              </tr>
                              <tr>
                                <td> Location </td>
                                <td> Hyderabad, India </td>
                              </tr>
                              <tr>
                                <td> Joined </td>
                                <td> 2018/05/23 </td>
                              </tr>
                              <tr>
                                <td> Last active </td>
                                <td> 2 hours ago </td>
                              </tr>
                            </tbody>
                          </table>
                        </div><!-- /.col -->
                        <!-- .col -->
                        <div class="col">
                          <!-- .publisher -->
                          <div class="publisher keep-focus focus">
                            <label for="publisherInput86796" class="publisher-label">Send a message to client</label> <!-- .publisher-input -->
                            <div class="publisher-input">
                              <textarea id="publisherInput86796" class="form-control" placeholder="Write a message"></textarea>
                            </div><!-- /.publisher-input -->
                            <!-- .publisher-actions -->
                            <div class="publisher-actions align-items-center">
                              <!-- .publisher-tools -->
                              <div class="publisher-tools mr-auto">
                                <div class="btn btn-light btn-icon fileinput-button">
                                  <i class="fa fa-paperclip"></i> <input type="file" id="attachment86796[]" name="attachment86796[]" multiple>
                                </div><button type="button" class="btn btn-light btn-icon"><i class="far fa-smile"></i></button>
                              </div><!-- /.publisher-tools -->
                              <div class="custom-control custom-control-inline custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="copymsg6796" checked> <label class="custom-control-label" for="copymsg6796">Send me a copy</label>
                              </div><button type="submit" class="btn btn-primary">Send</button>
                            </div><!-- /.publisher-actions -->
                          </div><!-- /.publisher -->
                        </div><!-- /.col -->
                      </div><!-- /.row -->
                    </td>
                  </tr><!-- /tr -->
                </tbody><!-- /tbody -->
              </table><!-- /.table -->
            </div><!-- /.table-responsive -->
          </div><!-- /.card-body -->
        </div><!-- /.card -->
        <hr class="my-5">
        <!-- .section-block -->
        <div class="section-block">
          <h2 class="section-title"> Inside Modal </h2><!-- Button trigger modal -->
          <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalTable">Table in modal</button>
        </div><!-- /.section-block -->
        <!-- Modal -->
        <div class="modal fade" id="modalTable" tabindex="-1" role="dialog" aria-labelledby="modalTableLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h6 id="modalTableLabel" class="modal-title"> Result for <em>"lorem ipsume dolor"</em>
                </h6><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body p-0">
                <!-- .table -->
                <table class="table table-striped">
                  <!-- thead -->
                  <thead class="thead-">
                    <tr>
                      <th style="min-width:200px"> Product </th>
                      <th> Variants </th>
                      <th> Prices </th>
                    </tr>
                  </thead><!-- /thead -->
                  <!-- tbody -->
                  <tbody>
                    <!-- tr -->
                    <tr>
                      <td> Wine - Chateau Bonnet </td>
                      <td> 113 </td>
                      <td> $22.38 </td>
                    </tr><!-- /tr -->
                    <!-- tr -->
                    <tr>
                      <td> Cookie - Oatmeal </td>
                      <td> 216 </td>
                      <td> $21.90 </td>
                    </tr><!-- /tr -->
                    <!-- tr -->
                    <tr>
                      <td> True - Vue Containers </td>
                      <td> 191 </td>
                      <td> $24.96 </td>
                    </tr><!-- /tr -->
                    <!-- tr -->
                    <tr>
                      <td> Nut - Pumpkin Seeds </td>
                      <td> 329 </td>
                      <td> $32.21 </td>
                    </tr><!-- /tr -->
                    <!-- tr -->
                    <tr>
                      <td> Artichoke - Bottom, Canned </td>
                      <td> 375 </td>
                      <td> $27.75 </td>
                    </tr><!-- /tr -->
                  </tbody><!-- /tbody -->
                </table><!-- /.table -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal">Close</button>
                <nav aria-label="Page navigation">
                  <ul class="pagination mb-0">
                    <li class="page-item">
                      <a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a>
                    </li>
                    <li class="page-item active">
                      <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="page-item">
                      <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item">
                      <a class="page-link" href="#">3</a>
                    </li>
                    <li class="page-item">
                      <a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div><!-- /.modal -->
        <hr class="my-5">
        <!-- .section-block -->
        <div class="section-block">
          <h2 class="section-title"> Table Variants </h2>
        </div><!-- /.section-block -->
        <!-- grid row -->
        <div class="row">
          <!-- grid column -->
          <div class="col-xl-6">
            <!-- .card -->
            <div class="card card-fluid">
              <!-- .card-header -->
              <div class="card-header border-0">
                <div class="d-flex align-items-center">
                  <span class="mr-auto">Hoverable</span>
                  <div class="dropdown">
                    <button type="button" class="btn btn-icon btn-light" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></button>
                    <div class="dropdown-menu dropdown-menu-right">
                      <div class="dropdown-arrow"></div><a href="#" class="dropdown-item">Edit</a> <a href="#" class="dropdown-item">Archive</a> <a href="#" class="dropdown-item">Remove</a>
                    </div>
                  </div>
                </div>
              </div><!-- /.card-header -->
              <!-- .table-responsive -->
              <div class="table-responsive">
                <!-- .table -->
                <table class="table table-hover">
                  <!-- thead -->
                  <thead class="thead-">
                    <tr>
                      <th style="min-width:200px"> Product </th>
                      <th> Variants </th>
                      <th> Prices </th>
                    </tr>
                  </thead><!-- /thead -->
                  <!-- tbody -->
                  <tbody>
                    <!-- tr -->
                    <tr>
                      <td> Wine - Chateau Bonnet </td>
                      <td> 113 </td>
                      <td> $22.38 </td>
                    </tr><!-- /tr -->
                    <!-- tr -->
                    <tr>
                      <td> Cookie - Oatmeal </td>
                      <td> 216 </td>
                      <td> $21.90 </td>
                    </tr><!-- /tr -->
                    <!-- tr -->
                    <tr>
                      <td> True - Vue Containers </td>
                      <td> 191 </td>
                      <td> $24.96 </td>
                    </tr><!-- /tr -->
                    <!-- tr -->
                    <tr>
                      <td> Nut - Pumpkin Seeds </td>
                      <td> 329 </td>
                      <td> $32.21 </td>
                    </tr><!-- /tr -->
                    <!-- tr -->
                    <tr>
                      <td> Artichoke - Bottom, Canned </td>
                      <td> 375 </td>
                      <td> $27.75 </td>
                    </tr><!-- /tr -->
                  </tbody><!-- /tbody -->
                </table><!-- /.table -->
              </div><!-- /.table-responsive -->
            </div><!-- /.card -->
          </div><!-- /grid column -->
          <!-- grid column -->
          <div class="col-xl-6">
            <!-- .card -->
            <div class="card card-fluid">
              <!-- .card-header -->
              <div class="card-header border-0">
                <div class="d-flex align-items-center">
                  <span class="mr-auto">Striped rows</span>
                  <div class="dropdown">
                    <button type="button" class="btn btn-icon btn-light" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></button>
                    <div class="dropdown-menu dropdown-menu-right">
                      <div class="dropdown-arrow"></div><a href="#" class="dropdown-item">Edit</a> <a href="#" class="dropdown-item">Archive</a> <a href="#" class="dropdown-item">Remove</a>
                    </div>
                  </div>
                </div>
              </div><!-- /.card-header -->
              <!-- .table-responsive -->
              <div class="table-responsive">
                <!-- .table -->
                <table class="table table-striped">
                  <!-- thead -->
                  <thead class="thead-">
                    <tr>
                      <th style="min-width:200px"> Product </th>
                      <th> Variants </th>
                      <th> Prices </th>
                    </tr>
                  </thead><!-- /thead -->
                  <!-- tbody -->
                  <tbody>
                    <!-- tr -->
                    <tr>
                      <td> Wine - Chateau Bonnet </td>
                      <td> 113 </td>
                      <td> $22.38 </td>
                    </tr><!-- /tr -->
                    <!-- tr -->
                    <tr>
                      <td> Cookie - Oatmeal </td>
                      <td> 216 </td>
                      <td> $21.90 </td>
                    </tr><!-- /tr -->
                    <!-- tr -->
                    <tr>
                      <td> True - Vue Containers </td>
                      <td> 191 </td>
                      <td> $24.96 </td>
                    </tr><!-- /tr -->
                    <!-- tr -->
                    <tr>
                      <td> Nut - Pumpkin Seeds </td>
                      <td> 329 </td>
                      <td> $32.21 </td>
                    </tr><!-- /tr -->
                    <!-- tr -->
                    <tr>
                      <td> Artichoke - Bottom, Canned </td>
                      <td> 375 </td>
                      <td> $27.75 </td>
                    </tr><!-- /tr -->
                  </tbody><!-- /tbody -->
                </table><!-- /.table -->
              </div><!-- /.table-responsive -->
            </div><!-- /.card -->
          </div><!-- /grid column -->
          <!-- grid column -->
          <div class="col-xl-6">
            <!-- .card -->
            <div class="card card-fluid">
              <!-- .card-header -->
              <div class="card-header">
                <div class="d-flex align-items-center">
                  <span class="mr-auto">Bordered</span> <button type="button" class="btn btn-icon btn-light"><i class="fa fa-copy"></i></button> <button type="button" class="btn btn-icon btn-light"><i class="fa fa-download"></i></button>
                </div>
              </div><!-- /.card-header -->
              <!-- .table-responsive -->
              <div class="table-responsive">
                <!-- .table -->
                <table class="table table-bordered">
                  <!-- thead -->
                  <thead class="thead-">
                    <tr>
                      <th style="min-width:200px"> Product </th>
                      <th> Variants </th>
                      <th> Prices </th>
                    </tr>
                  </thead><!-- /thead -->
                  <!-- tbody -->
                  <tbody>
                    <!-- tr -->
                    <tr>
                      <td> Wine - Chateau Bonnet </td>
                      <td> 113 </td>
                      <td> $22.38 </td>
                    </tr><!-- /tr -->
                    <!-- tr -->
                    <tr>
                      <td> Cookie - Oatmeal </td>
                      <td> 216 </td>
                      <td> $21.90 </td>
                    </tr><!-- /tr -->
                    <!-- tr -->
                    <tr>
                      <td> True - Vue Containers </td>
                      <td> 191 </td>
                      <td> $24.96 </td>
                    </tr><!-- /tr -->
                    <!-- tr -->
                    <tr>
                      <td> Nut - Pumpkin Seeds </td>
                      <td> 329 </td>
                      <td> $32.21 </td>
                    </tr><!-- /tr -->
                    <!-- tr -->
                    <tr>
                      <td> Artichoke - Bottom, Canned </td>
                      <td> 375 </td>
                      <td> $27.75 </td>
                    </tr><!-- /tr -->
                  </tbody><!-- /tbody -->
                </table><!-- /.table -->
              </div><!-- /.table-responsive -->
            </div><!-- /.card -->
          </div><!-- /grid column -->
          <!-- grid column -->
          <div class="col-xl-6">
            <!-- .card -->
            <div class="card card-fluid">
              <!-- .card-header -->
              <div class="card-header border-0">
                <div class="d-flex align-items-center">
                  <span class="mr-auto">Condensed</span> <button type="button" class="btn btn-icon btn-light"><i class="fa fa-copy"></i></button> <button type="button" class="btn btn-icon btn-light"><i class="fa fa-download"></i></button>
                </div>
              </div><!-- /.card-header -->
              <!-- .table-responsive -->
              <div class="table-responsive">
                <!-- .table -->
                <table class="table table-sm mb-0">
                  <!-- thead -->
                  <thead class="thead-">
                    <tr>
                      <th style="min-width:200px"> Product </th>
                      <th> Variants </th>
                      <th> Prices </th>
                    </tr>
                  </thead><!-- /thead -->
                  <!-- tbody -->
                  <tbody>
                    <!-- tr -->
                    <tr>
                      <td> Wine - Chateau Bonnet </td>
                      <td> 113 </td>
                      <td> $22.38 </td>
                    </tr><!-- /tr -->
                    <!-- tr -->
                    <tr>
                      <td> Cookie - Oatmeal </td>
                      <td> 216 </td>
                      <td> $21.90 </td>
                    </tr><!-- /tr -->
                    <!-- tr -->
                    <tr>
                      <td> True - Vue Containers </td>
                      <td> 191 </td>
                      <td> $24.96 </td>
                    </tr><!-- /tr -->
                    <!-- tr -->
                    <tr>
                      <td> Nut - Pumpkin Seeds </td>
                      <td> 329 </td>
                      <td> $32.21 </td>
                    </tr><!-- /tr -->
                    <!-- tr -->
                    <tr>
                      <td> Artichoke - Bottom, Canned </td>
                      <td> 375 </td>
                      <td> $27.75 </td>
                    </tr><!-- /tr -->
                    <!-- tr -->
                    <tr>
                      <td> Sweet Pea Sprouts </td>
                      <td> 478 </td>
                      <td> $32.89 </td>
                    </tr><!-- /tr -->
                    <!-- tr -->
                    <tr>
                      <td> Spice - Paprika </td>
                      <td> 421 </td>
                      <td> $28.32 </td>
                    </tr><!-- /tr -->
                    <!-- tr -->
                    <tr>
                      <td> Tea - Lemon Scented </td>
                      <td> 371 </td>
                      <td> $32.83 </td>
                    </tr><!-- /tr -->
                  </tbody><!-- /tbody -->
                </table><!-- /.table -->
              </div><!-- /.table-responsive -->
            </div><!-- /.card -->
          </div><!-- /grid column -->
        </div><!-- /grid row -->
        <hr class="my-5">
        <!-- .section-block -->
        <div class="section-block">
          <h2 class="section-title"> Head options </h2>
        </div><!-- /.section-block -->
        <!-- grid row -->
        <div class="row">
          <!-- grid column -->
          <div class="col-xl-6">
            <!-- .card -->
            <div class="card card-fluid">
              <!-- .table-responsive -->
              <div class="table-responsive">
                <!-- .table -->
                <table class="table table-hover">
                  <!-- thead -->
                  <thead class="thead-light">
                    <tr>
                      <th style="min-width:200px"> Product </th>
                      <th> Variants </th>
                      <th> Prices </th>
                    </tr>
                  </thead><!-- /thead -->
                  <!-- tbody -->
                  <tbody>
                    <!-- tr -->
                    <tr>
                      <td> Wine - Chateau Bonnet </td>
                      <td> 113 </td>
                      <td> $22.38 </td>
                    </tr><!-- /tr -->
                    <!-- tr -->
                    <tr>
                      <td> Cookie - Oatmeal </td>
                      <td> 216 </td>
                      <td> $21.90 </td>
                    </tr><!-- /tr -->
                    <!-- tr -->
                    <tr>
                      <td> True - Vue Containers </td>
                      <td> 191 </td>
                      <td> $24.96 </td>
                    </tr><!-- /tr -->
                    <!-- tr -->
                    <tr>
                      <td> Nut - Pumpkin Seeds </td>
                      <td> 329 </td>
                      <td> $32.21 </td>
                    </tr><!-- /tr -->
                    <!-- tr -->
                    <tr>
                      <td> Artichoke - Bottom, Canned </td>
                      <td> 375 </td>
                      <td> $27.75 </td>
                    </tr><!-- /tr -->
                  </tbody><!-- /tbody -->
                </table><!-- /.table -->
              </div><!-- /.table-responsive -->
            </div><!-- /.card -->
          </div><!-- /grid column -->
          <!-- grid column -->
          <div class="col-xl-6">
            <!-- .card -->
            <div class="card card-fluid">
              <!-- .table-responsive -->
              <div class="table-responsive">
                <!-- .table -->
                <table class="table table-hover">
                  <!-- thead -->
                  <thead class="thead-dark">
                    <tr>
                      <th style="min-width:200px"> Product </th>
                      <th> Variants </th>
                      <th> Prices </th>
                    </tr>
                  </thead><!-- /thead -->
                  <!-- tbody -->
                  <tbody>
                    <!-- tr -->
                    <tr>
                      <td> Wine - Chateau Bonnet </td>
                      <td> 113 </td>
                      <td> $22.38 </td>
                    </tr><!-- /tr -->
                    <!-- tr -->
                    <tr>
                      <td> Cookie - Oatmeal </td>
                      <td> 216 </td>
                      <td> $21.90 </td>
                    </tr><!-- /tr -->
                    <!-- tr -->
                    <tr>
                      <td> True - Vue Containers </td>
                      <td> 191 </td>
                      <td> $24.96 </td>
                    </tr><!-- /tr -->
                    <!-- tr -->
                    <tr>
                      <td> Nut - Pumpkin Seeds </td>
                      <td> 329 </td>
                      <td> $32.21 </td>
                    </tr><!-- /tr -->
                    <!-- tr -->
                    <tr>
                      <td> Artichoke - Bottom, Canned </td>
                      <td> 375 </td>
                      <td> $27.75 </td>
                    </tr><!-- /tr -->
                  </tbody><!-- /tbody -->
                </table><!-- /.table -->
              </div><!-- /.table-responsive -->
            </div><!-- /.card -->
          </div><!-- /grid column -->
        </div><!-- /grid row -->
      </div><!-- /.page-section -->
    </div><!-- /.page-inner -->
  </div><!-- /.page -->
</div><!-- .app-footer -->
<?php 
layoutBottom([
    "public/js/pages/table-demo.js"
]);
?>
