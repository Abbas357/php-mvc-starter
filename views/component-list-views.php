<?php
require_once '../layout/base.php';
layoutTop('List Views', [
  "public/vendor/jstree/themes/default/style.min.css",
  "public/vendor/toastr/toastr.min.css"
]);
?>

<div class="wrapper">
  <!-- .page -->
  <div class="page">
    <!-- .page-inner -->
    <div class="page-inner">
      <!-- .page-title-bar -->
      <header class="page-title-bar">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item active">
              <a href="#"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Components</a>
            </li>
          </ol>
        </nav>
        <h1 class="page-title"> List Views </h1>
        <p class="text-muted"> Lists present multiple line items vertically as a single continuous element. </p>
      </header><!-- /.page-title-bar -->
      <!-- .page-section -->
      <div class="page-section">
        <!-- .section-block -->
        <div class="section-block">
          <!-- grid row -->
          <div class="row">
            <!-- grid column -->
            <div class="col-lg-6">
              <!-- .list-group -->
              <ul class="list-group mb-3">
                <li class="list-group-item">Basic list item </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">List item with badge <span class="badge badge-danger badge-pill">14</span>
                </li>
                <li class="list-group-header">List header </li>
                <li class="list-group-item active">Active list item </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">List item with switcher <label class="switcher-control"><input type="checkbox" name="onoffswitch" class="switcher-input" checked> <span class="switcher-indicator"></span></label>
                </li>
                <li class="list-group-item disabled">Disable list item </li>
              </ul><!-- /.list-group -->
            </div><!-- /grid column -->
            <!-- grid column -->
            <div class="col-lg-6">
              <!-- .list-group -->
              <div class="list-group mb-3">
                <a href="#" class="list-group-item list-group-item-action">Basic list item</a> <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">List item with badge <span class="badge badge-danger badge-pill">14</span></a>
                <div class="list-group-header"> List header </div><a href="#" class="list-group-item list-group-item-action active">Active list item</a> <a href="#" class="list-group-item list-group-item-action disabled">Disable list item</a> <a href="#" class="list-group-item list-group-item-action">Basic list item</a>
              </div><!-- /.list-group -->
            </div><!-- /grid column -->
            <!-- grid column -->
            <div class="col-lg-6">
              <!-- .list-group -->
              <div class="list-group list-group-bordered mb-3">
                <a href="#" class="list-group-item list-group-item-action list-group-item-primary">This is a primary list group item</a> <a href="#" class="list-group-item list-group-item-action list-group-item-success">This is a success list group item</a>
                <div class="list-group-header"> List header </div><a href="#" class="list-group-item list-group-item-action list-group-item-danger">This is a danger list group item</a> <a href="#" class="list-group-item list-group-item-action list-group-item-warning">This is a warning list group item</a> <a href="#" class="list-group-item list-group-item-action list-group-item-info">This is a info list group item</a> <a href="#" class="list-group-item list-group-item-action list-group-item-dark">This is a dark list group item</a>
              </div><!-- /.list-group -->
            </div><!-- /grid column -->
            <!-- grid column -->
            <div class="col-lg-6">
              <!-- .list-group -->
              <div class="list-group list-group-divider mb-3">
                <a href="#" class="list-group-item list-group-item-action">
                  <div class="list-group-item-figure">
                    <span class="fa fa-lg fa-fw fa-briefcase"></span>
                  </div>
                  <div class="list-group-item-body">
                    <span class="list-group-item-text">Business</span>
                  </div>
                </a> <a href="#" class="list-group-item list-group-item-action">
                  <div class="list-group-item-figure">
                    <span class="fa fa-lg fa-fw fa-comments"></span>
                  </div>
                  <div class="list-group-item-body d-flex justify-content-between align-items-center">
                    <span class="list-group-item-text">Communication</span> <span class="badge badge-danger badge-pill">14</span>
                  </div>
                </a>
                <div class="list-group-header"> List header </div><a href="#" class="list-group-item list-group-item-action">
                  <div class="list-group-item-figure">
                    <span class="fa fa-lg fa-fw fa-paint-brush"></span>
                  </div>
                  <div class="list-group-item-body">
                    <span class="list-group-item-text">Design</span>
                  </div>
                </a> <a href="#" class="list-group-item list-group-item-action active">
                  <div class="list-group-item-figure">
                    <span class="fa fa-lg fa-fw fa-graduation-cap"></span>
                  </div>
                  <div class="list-group-item-body">
                    <span class="list-group-item-text">Education</span>
                  </div>
                </a> <a href="#" class="list-group-item list-group-item-action">
                  <div class="list-group-item-figure">
                    <span class="fa fa-lg fa-fw fa-chart-line"></span>
                  </div>
                  <div class="list-group-item-body">
                    <span class="list-group-item-text">Finance</span>
                  </div>
                </a> <a href="#" class="list-group-item list-group-item-action">
                  <div class="list-group-item-figure">
                    <span class="fa fa-lg fa-fw fa-utensils"></span>
                  </div>
                  <div class="list-group-item-body">
                    <span class="list-group-item-text">Food</span>
                  </div>
                </a>
              </div><!-- /.list-group -->
            </div><!-- /grid column -->
          </div><!-- /grid row -->
        </div><!-- /.section-block -->
        <hr class="my-5">
        <!-- .section-block -->
        <div class="section-block">
          <h3 class="section-title"> Single-line list </h3>
        </div><!-- /.section-block -->
        <!-- .section-block -->
        <div class="section-block">
          <!-- grid row -->
          <div class="row">
            <!-- grid column -->
            <div class="col-lg-6">
              <!-- .list-group -->
              <div class="list-group list-group-bordered mb-3">
                <a href="#" class="list-group-item list-group-item-action">
                  <div class="list-group-item-figure">
                    <div class="tile bg-success">
                      <span class="oi oi-chat"></span>
                    </div>
                  </div>
                  <div class="list-group-item-body"> Dapibus ac facilisis in </div>
                </a> <a href="#" class="list-group-item list-group-item-action">
                  <div class="list-group-item-figure">
                    <div class="tile bg-danger">
                      <span class="oi oi-data-transfer-upload"></span>
                    </div>
                  </div>
                  <div class="list-group-item-body"> Morbi leo risus </div>
                </a> <a href="#" class="list-group-item list-group-item-action">
                  <div class="list-group-item-figure">
                    <div class="tile bg-warning">
                      <span class="oi oi-tags"></span>
                    </div>
                  </div>
                  <div class="list-group-item-body"> Porta ac consectetur ac </div>
                </a> <a href="#" class="list-group-item list-group-item-action">
                  <div class="list-group-item-figure">
                    <div class="tile bg-info">
                      <span class="oi oi-cart"></span>
                    </div>
                  </div>
                  <div class="list-group-item-body"> Vestibulum at eros </div>
                </a>
              </div><!-- /.list-group -->
            </div><!-- /grid column -->
            <!-- grid column -->
            <div class="col-lg-6">
              <!-- .list-group -->
              <div class="list-group list-group-bordered mb-3">
                <div class="list-group-item">
                  <div class="list-group-item-figure">
                    <a href="#" class="tile tile-circle bg-success"><i class="oi oi-chat"></i></a>
                  </div>
                  <div class="list-group-item-body"> Dapibus ac facilisis in </div>
                  <div class="list-group-item-figure">
                    <button class="btn btn-sm btn-icon btn-light"><i class="fa fa-info-circle"></i></button>
                  </div>
                </div>
                <div class="list-group-item">
                  <div class="list-group-item-figure">
                    <a href="#" class="tile tile-circle bg-danger"><i class="oi oi-data-transfer-upload"></i></a>
                  </div>
                  <div class="list-group-item-body"> Morbi leo risus </div>
                  <div class="list-group-item-figure">
                    <button class="btn btn-sm btn-icon btn-light"><i class="fa fa-info-circle"></i></button>
                  </div>
                </div>
                <div class="list-group-item">
                  <div class="list-group-item-figure">
                    <a href="#" class="tile tile-circle bg-warning"><i class="oi oi-tags"></i></a>
                  </div>
                  <div class="list-group-item-body"> Porta ac consectetur ac </div>
                  <div class="list-group-item-figure">
                    <button class="btn btn-sm btn-icon btn-light"><i class="fa fa-info-circle"></i></button>
                  </div>
                </div>
                <div class="list-group-item">
                  <div class="list-group-item-figure">
                    <a href="#" class="tile tile-circle bg-info"><i class="oi oi-cart"></i></a>
                  </div>
                  <div class="list-group-item-body"> Vestibulum at eros </div>
                  <div class="list-group-item-figure">
                    <button class="btn btn-sm btn-icon btn-light"><i class="fa fa-info-circle"></i></button>
                  </div>
                </div>
              </div><!-- /.list-group -->
            </div><!-- /grid column -->
            <!-- grid column -->
            <div class="col-lg-6">
              <!-- .list-group -->
              <div class="list-group list-group-bordered mb-3">
                <a href="#" class="list-group-item list-group-item-action">
                  <div class="list-group-item-figure">
                    <div class="tile tile-circle bg-primary"> BA </div>
                  </div>
                  <div class="list-group-item-body"> Beni Arisandi </div>
                </a> <a href="#" class="list-group-item list-group-item-action">
                  <div class="list-group-item-figure">
                    <div class="tile tile-circle bg-yellow"> DP </div>
                  </div>
                  <div class="list-group-item-body"> Diane Peters </div>
                </a> <a href="#" class="list-group-item list-group-item-action">
                  <div class="list-group-item-figure">
                    <div class="tile tile-circle bg-purple"> JG </div>
                  </div>
                  <div class="list-group-item-body"> Jennifer Gray </div>
                </a> <a href="#" class="list-group-item list-group-item-action">
                  <div class="list-group-item-figure">
                    <div class="tile tile-circle bg-red"> ZF </div>
                  </div>
                  <div class="list-group-item-body"> Zachary Fowler </div>
                </a>
              </div><!-- /.list-group -->
            </div><!-- /grid column -->
            <!-- grid column -->
            <div class="col-lg-6">
              <!-- .list-group -->
              <div class="list-group list-group-bordered mb-3">
                <a href="#" class="list-group-item list-group-item-action">
                  <div class="list-group-item-figure">
                    <div class="user-avatar">
                      <img src="public/images/avatars/profile.jpg" alt="">
                    </div>
                  </div>
                  <div class="list-group-item-body"> Beni Arisandi </div>
                </a> <a href="#" class="list-group-item list-group-item-action">
                  <div class="list-group-item-figure">
                    <div class="tile tile-circle bg-muted">
                      <i class="oi oi-person"></i>
                    </div>
                  </div>
                  <div class="list-group-item-body"> Diane Peters </div>
                </a> <a href="#" class="list-group-item list-group-item-action">
                  <div class="list-group-item-figure">
                    <div class="user-avatar">
                      <img src="public/images/avatars/uifaces11.jpg" alt="">
                    </div>
                  </div>
                  <div class="list-group-item-body"> Jennifer Gray </div>
                </a> <a href="#" class="list-group-item list-group-item-action">
                  <div class="list-group-item-figure">
                    <div class="user-avatar">
                      <img src="public/images/avatars/uifaces12.jpg" alt="">
                    </div>
                  </div>
                  <div class="list-group-item-body"> Zachary Fowler </div>
                </a>
              </div><!-- /.list-group -->
            </div><!-- /grid column -->
          </div><!-- /grid row -->
        </div><!-- /.section-block -->
        <hr class="my-5">
        <!-- .section-block -->
        <div class="section-block">
          <h3 class="section-title"> Two-line list </h3>
        </div><!-- /.section-block -->
        <!-- grid row -->
        <div class="row">
          <!-- grid column -->
          <div class="col-lg-6">
            <!-- .card -->
            <div class="card card-fluid">
              <!-- .list-group -->
              <div class="list-group list-group-flush list-group-divider">
                <!-- .list-group-item -->
                <div class="list-group-item">
                  <div class="list-group-item-figure">
                    <a href="#" class="tile tile-circle bg-success"><span class="fa fa-file-archive"></span></a>
                  </div>
                  <div class="list-group-item-body">
                    <h4 class="list-group-item-title">
                      <a href="#">Business services</a>
                    </h4>
                    <p class="list-group-item-text"> Jan 28, 2018 </p>
                  </div>
                  <div class="list-group-item-figure">
                    <button class="btn btn-sm btn-icon btn-light"><i class="oi oi-data-transfer-download"></i></button>
                  </div>
                </div><!-- /.list-group-item -->
                <!-- .list-group-item -->
                <div class="list-group-item">
                  <div class="list-group-item-figure">
                    <a href="#" class="tile tile-circle bg-danger"><span class="fa fa-file-video"></span></a>
                  </div>
                  <div class="list-group-item-body">
                    <h4 class="list-group-item-title">
                      <a href="#">Miscellaneous expenses</a>
                    </h4>
                    <p class="list-group-item-text"> Jan 21, 2018 </p>
                  </div>
                  <div class="list-group-item-figure">
                    <button class="btn btn-sm btn-icon btn-light"><i class="oi oi-data-transfer-download"></i></button>
                  </div>
                </div><!-- /.list-group-item -->
                <!-- .list-group-item -->
                <div class="list-group-item">
                  <div class="list-group-item-figure">
                    <a href="#" class="tile tile-circle bg-purple"><span class="fa fa-folder"></span></a>
                  </div>
                  <div class="list-group-item-body">
                    <h4 class="list-group-item-title">
                      <a href="#">Education & Children</a>
                    </h4>
                    <p class="list-group-item-text"> Jan 19, 2018 </p>
                  </div>
                  <div class="list-group-item-figure">
                    <button class="btn btn-sm btn-icon btn-light"><i class="oi oi-data-transfer-download"></i></button>
                  </div>
                </div><!-- /.list-group-item -->
                <!-- .list-group-item -->
                <div class="list-group-item">
                  <div class="list-group-item-figure">
                    <a href="#" class="tile tile-circle bg-info"><span class="fa fa-file-image"></span></a>
                  </div>
                  <div class="list-group-item-body">
                    <h4 class="list-group-item-title">
                      <a href="#">Auto & Transport</a>
                    </h4>
                    <p class="list-group-item-text"> Jan 12, 2018 </p>
                  </div>
                  <div class="list-group-item-figure">
                    <button class="btn btn-sm btn-icon btn-light"><i class="oi oi-data-transfer-download"></i></button>
                  </div>
                </div><!-- /.list-group-item -->
              </div><!-- /.list-group -->
            </div><!-- /.card -->
          </div><!-- /grid column -->
          <!-- grid column -->
          <div class="col-lg-6">
            <!-- .card -->
            <div class="card card-fluid">
              <!-- .list-group -->
              <div class="list-group list-group-flush list-group-divider">
                <a href="#" class="list-group-item list-group-item-action">
                  <div class="list-group-item-figure">
                    <div class="user-avatar">
                      <img src="public/images/avatars/profile.jpg" alt="">
                    </div>
                  </div>
                  <div class="list-group-item-body">
                    <h4 class="list-group-item-title"> Are you free tonight? </h4>
                    <p class="list-group-item-text text-truncate">
                      <span class="text-dark">Beni Arisandi</span> – Fuga quis quod voluptas mollitia aliquid alias tenetur. Laboriosam asperiores cupiditate aperiam!
                    </p>
                  </div>
                </a> <a href="#" class="list-group-item list-group-item-action">
                  <div class="list-group-item-figure">
                    <div class="tile tile-circle bg-muted">
                      <i class="oi oi-person"></i>
                    </div>
                  </div>
                  <div class="list-group-item-body">
                    <h4 class="list-group-item-title"> RE: Your trip to Montreal <span class="text-muted">6</span>
                    </h4>
                    <p class="list-group-item-text text-truncate">
                      <span class="text-dark">Diane Peters</span> – Consectetur quis veritatis aut maiores omnis, expedita officiis delectus perspiciatis a dolores.
                    </p>
                  </div>
                </a> <a href="#" class="list-group-item list-group-item-action">
                  <div class="list-group-item-figure">
                    <div class="user-avatar">
                      <img src="public/images/avatars/uifaces11.jpg" alt="">
                    </div>
                  </div>
                  <div class="list-group-item-body">
                    <h4 class="list-group-item-title"> Invitation: Joe's Dinner @ Fri Aug 22 </h4>
                    <p class="list-group-item-text text-truncate">
                      <span class="text-dark">Me, Jennifer, Alex</span> – Officiis numquam, repellat nam tempore sit aliquid nostrum autem excepturi quis nihil.
                    </p>
                  </div>
                </a> <a href="#" class="list-group-item list-group-item-action">
                  <div class="list-group-item-figure">
                    <div class="user-avatar">
                      <img src="public/images/avatars/uifaces12.jpg" alt="">
                    </div>
                  </div>
                  <div class="list-group-item-body">
                    <h4 class="list-group-item-title"> The Perfect Gift For Everyone On Your List </h4>
                    <p class="list-group-item-text text-truncate">
                      <span class="text-dark">Zachary Fowler</span> – Ad earum dolore excepturi itaque officia vel fugiat quo, quisquam dicta ex.
                    </p>
                  </div>
                </a>
              </div><!-- /.list-group -->
            </div><!-- /.card -->
          </div><!-- /grid column -->
        </div><!-- /grid row -->
        <hr class="my-5">
        <!-- .section-block -->
        <div class="section-block">
          <h3 class="section-title"> Three-line list </h3>
        </div><!-- /.section-block -->
        <!-- grid row -->
        <div class="row">
          <!-- grid column -->
          <div class="col-lg-6">
            <!-- .card -->
            <div class="card card-fluid">
              <!-- .list-group -->
              <div class="list-group list-group-flush list-group-divider">
                <a href="#" class="list-group-item list-group-item-action">
                  <div class="list-group-item-figure">
                    <div class="user-avatar user-avatar-lg">
                      <img src="public/images/avatars/profile.jpg" alt="">
                    </div>
                  </div>
                  <div class="list-group-item-body">
                    <h4 class="list-group-item-title"> Are you free tonight? </h4>
                    <h5 class="list-group-item-subtitle"> Beni Arisandi </h5>
                    <p class="list-group-item-text text-truncate"> Fuga quis quod voluptas mollitia aliquid alias tenetur. Laboriosam asperiores cupiditate aperiam! </p>
                  </div>
                </a> <a href="#" class="list-group-item list-group-item-action">
                  <div class="list-group-item-figure">
                    <div class="tile tile-lg tile-circle bg-muted">
                      <i class="oi oi-person"></i>
                    </div>
                  </div>
                  <div class="list-group-item-body">
                    <h4 class="list-group-item-title"> RE: Your trip to Montreal <span class="text-muted">6</span>
                    </h4>
                    <h5 class="list-group-item-subtitle"> Diane Peters </h5>
                    <p class="list-group-item-text text-truncate"> Consectetur quis veritatis aut maiores omnis, expedita officiis delectus perspiciatis a dolores. </p>
                  </div>
                </a> <a href="#" class="list-group-item list-group-item-action">
                  <div class="list-group-item-figure">
                    <div class="user-avatar user-avatar-lg">
                      <img src="public/images/avatars/uifaces11.jpg" alt="">
                    </div>
                  </div>
                  <div class="list-group-item-body">
                    <h4 class="list-group-item-title"> Invitation: Joe's Dinner @ Fri Aug 22 </h4>
                    <h5 class="list-group-item-subtitle"> Me, Jennifer, Alex </h5>
                    <p class="list-group-item-text text-truncate"> Officiis numquam, repellat nam tempore sit aliquid nostrum autem excepturi quis nihil. </p>
                  </div>
                </a> <a href="#" class="list-group-item list-group-item-action">
                  <div class="list-group-item-figure">
                    <div class="user-avatar user-avatar-lg">
                      <img src="public/images/avatars/uifaces12.jpg" alt="">
                    </div>
                  </div>
                  <div class="list-group-item-body">
                    <h4 class="list-group-item-title"> The Perfect Gift For Everyone On Your List </h4>
                    <h5 class="list-group-item-subtitle"> Zachary Fowler </h5>
                    <p class="list-group-item-text text-truncate"> Ad earum dolore excepturi itaque officia vel fugiat quo, quisquam dicta ex. </p>
                  </div>
                </a>
              </div><!-- /.list-group -->
            </div><!-- /.card -->
          </div><!-- /grid column -->
          <!-- grid column -->
          <div class="col-lg-6">
            <!-- .card -->
            <div class="card card-fluid">
              <!-- .list-group -->
              <div class="list-group list-group-flush list-group-divider">
                <a href="#" class="list-group-item list-group-item-action">
                  <div class="list-group-item-figure">
                    <div class="user-avatar user-avatar-lg">
                      <img src="public/images/avatars/profile.jpg" alt="">
                    </div>
                  </div>
                  <div class="list-group-item-body">
                    <h4 class="list-group-item-title"> Beni Arisandi </h4>
                    <h5 class="list-group-item-subtitle"> Are you free tonight? </h5>
                    <p class="list-group-item-text text-truncate"> Fuga quis quod voluptas mollitia aliquid alias tenetur. Laboriosam asperiores cupiditate aperiam! </p>
                  </div>
                </a> <a href="#" class="list-group-item list-group-item-action">
                  <div class="list-group-item-figure">
                    <div class="tile tile-lg tile-circle bg-muted">
                      <i class="oi oi-person"></i>
                    </div>
                  </div>
                  <div class="list-group-item-body">
                    <h4 class="list-group-item-title"> Diane Peters </h4>
                    <h5 class="list-group-item-subtitle"> RE: Your trip to Montreal <span class="text-muted">6</span>
                    </h5>
                    <p class="list-group-item-text text-truncate"> Consectetur quis veritatis aut maiores omnis, expedita officiis delectus perspiciatis a dolores. </p>
                  </div>
                </a> <a href="#" class="list-group-item list-group-item-action">
                  <div class="list-group-item-figure">
                    <div class="user-avatar user-avatar-lg">
                      <img src="public/images/avatars/uifaces11.jpg" alt="">
                    </div>
                  </div>
                  <div class="list-group-item-body">
                    <h4 class="list-group-item-title"> Me, Jennifer, Alex </h4>
                    <h5 class="list-group-item-subtitle"> Invitation: Joe's Dinner @ Fri Aug 22 </h5>
                    <p class="list-group-item-text text-truncate"> Officiis numquam, repellat nam tempore sit aliquid nostrum autem excepturi quis nihil. </p>
                  </div>
                </a> <a href="#" class="list-group-item list-group-item-action">
                  <div class="list-group-item-figure">
                    <div class="user-avatar user-avatar-lg">
                      <img src="public/images/avatars/uifaces12.jpg" alt="">
                    </div>
                  </div>
                  <div class="list-group-item-body">
                    <h4 class="list-group-item-title"> Zachary Fowler </h4>
                    <h5 class="list-group-item-subtitle"> The Perfect Gift For Everyone On Your List </h5>
                    <p class="list-group-item-text text-truncate"> Ad earum dolore excepturi itaque officia vel fugiat quo, quisquam dicta ex. </p>
                  </div>
                </a>
              </div><!-- /.list-group -->
            </div><!-- /.card -->
          </div><!-- /grid column -->
        </div><!-- /grid row -->
        <hr class="my-5">
        <!-- .section-block -->
        <div class="section-block">
          <h3 class="section-title"> Media list </h3>
        </div><!-- /.section-block -->
        <!-- .section-block -->
        <div class="section-block">
          <!-- grid row -->
          <div class="row">
            <!-- grid column -->
            <div class="col-lg-6">
              <!-- .list-group -->
              <div class="list-group list-group-media mb-3">
                <a href="#" class="list-group-item list-group-item-action">
                  <div class="list-group-item-figure rounded-left">
                    <img src="public/images/dummy/img-5.jpg" alt="placeholder image">
                  </div>
                  <div class="list-group-item-body">
                    <h4 class="list-group-item-title"> Expanding Your Home Network’s Reach </h4>
                    <p class="list-group-item-text"> A incidunt, corrupti. Quasi, incidunt ab, vel quidem debitis fuga? Delectus, ipsam... </p>
                  </div>
                </a> <a href="#" class="list-group-item list-group-item-action">
                  <div class="list-group-item-figure rounded-left">
                    <img src="public/images/dummy/img-1.jpg" alt="placeholder image">
                  </div>
                  <div class="list-group-item-body">
                    <h4 class="list-group-item-title"> The Wealth of New Choices With Robot Vacuum Cleaners </h4>
                    <p class="list-group-item-text"> Fugiat beatae vel neque, minus voluptatum in. Placeat repellat qui impedit, consectetur... </p>
                  </div>
                </a>
              </div><!-- /.list-group -->
            </div><!-- /grid column -->
            <!-- grid column -->
            <div class="col-lg-6">
              <!-- .list-group -->
              <div class="list-group list-group-media mb-3">
                <a href="#" class="list-group-item list-group-item-action">
                  <div class="list-group-item-figure rounded-left">
                    <img src="public/images/dummy/img-4.jpg" alt="placeholder image">
                  </div>
                  <div class="list-group-item-body">
                    <h4 class="list-group-item-title"> Meet the People Who Train the Robots </h4>
                    <p class="list-group-item-text"> Veritatis dicta expedita dolorem repudiandae nemo odit quos optio vero libero quia... </p>
                  </div>
                </a> <a href="#" class="list-group-item list-group-item-action">
                  <div class="list-group-item-figure rounded-left">
                    <img src="public/images/dummy/img-2.jpg" alt="placeholder image">
                  </div>
                  <div class="list-group-item-body">
                    <h4 class="list-group-item-title"> Daily Report: Cloud Computing Asserts Itself </h4>
                    <p class="list-group-item-text"> Reprehenderit iure et, fugit libero harum doloremque culpa... </p>
                  </div>
                </a>
              </div><!-- /.list-group -->
            </div><!-- /grid column -->
          </div><!-- /grid row -->
        </div><!-- /.section-block -->
        <hr class="my-5">
        <!-- .section-block -->
        <div class="section-block">
          <h3 class="section-title"> Form-element list </h3>
        </div><!-- /.section-block -->
        <!-- grid row -->
        <div class="row">
          <!-- grid column -->
          <div class="col-lg-6">
            <!-- .card -->
            <div class="card card-fluid">
              <!-- .list-group -->
              <div class="list-group list-group-flush list-group-bordered">
                <div class="list-group-header"> Input Checkbox </div><label class="list-group-item custom-control custom-checkbox"><input name="listcheckbox" type="checkbox" class="custom-control-input" checked> <span class="custom-control-label">List checkbox #1</span></label> <label class="list-group-item custom-control custom-checkbox"><input name="listcheckbox" type="checkbox" class="custom-control-input" checked> <span class="custom-control-label">List checkbox #2</span></label>
                <div class="list-group-header"> Input Radio </div><label class="list-group-item custom-control custom-radio"><input name="listradio" type="radio" class="custom-control-input" checked> <span class="custom-control-label">List radio #1</span></label> <label class="list-group-item custom-control custom-radio"><input name="listradio" type="radio" class="custom-control-input" checked> <span class="custom-control-label">List radio #2</span></label>
              </div><!-- /.list-group -->
            </div><!-- /.card -->
          </div><!-- /grid column -->
          <!-- grid column -->
          <div class="col-lg-6">
            <!-- .card -->
            <div class="card card-fluid">
              <!-- .list-group -->
              <div class="list-group list-group-flush list-group-bordered">
                <div class="list-group-header"> I have switcher </div>
                <div class="list-group-item d-flex justify-content-between align-items-center"> Switch me! <label class="switcher-control switcher-control-success"><input type="checkbox" name="onoffswitch" class="switcher-input" checked> <span class="switcher-indicator"></span></label>
                </div>
                <div class="list-group-header"> Control Input </div><input type="text" class="list-group-item" placeholder="Username"> <input type="password" class="list-group-item" placeholder="Password"> <select class="list-group-item custom-select">
                  <option selected> Select one </option>
                  <option value="1"> One </option>
                  <option value="2"> Two </option>
                  <option value="3"> Three </option>
                </select>
              </div><!-- /.list-group -->
            </div><!-- /.card -->
          </div><!-- /grid column -->
        </div><!-- /grid row -->
        <hr class="my-5">
        <!-- .section-block -->
        <div class="section-block">
          <h2 class="section-title"> Treeview </h2>
          <p class="text-muted"> jQuery tree plugin, that provides interactive trees. Supports HTML & JSON data sources, AJAX & async callback loading. </p>
        </div><!-- /.section-block -->
        <!-- grid row -->
        <div class="row">
          <!-- grid column -->
          <div class="col-lg-6">
            <!-- .card -->
            <div class="card card-fluid">
              <!-- .card-body -->
              <div class="card-body">
                <h4 class="card-title"> Basic </h4><!-- #jstree1 -->
                <div id="jstree1">
                  <ul>
                    <li data-jstree='{"opened":true, "type":"root"}'>Root <ul>
                        <li data-jstree='{"type":"folder"}'>Directory </li>
                        <li data-jstree='{"type":"file"}'>File Unread </li>
                        <li data-jstree='{"opened":true, "type":"folder"}'>Another directory <ul>
                            <li data-jstree='{"type":"text"}'>File text </li>
                            <li data-jstree='{"type":"word"}'>File word </li>
                            <li data-jstree='{"type":"excel"}'>File excel </li>
                            <li data-jstree='{"type":"ppt", "disabled":true}'>File powerpoint </li>
                            <li data-jstree='{"type":"pdf"}'>File pdf </li>
                            <li data-jstree='{"type":"archive"}'>File archive </li>
                            <li data-jstree='{"type":"image"}'>File image </li>
                            <li data-jstree='{"type":"audio"}'>File audio </li>
                            <li data-jstree='{"type":"video"}'>File video </li>
                          </ul>
                        </li>
                        <li data-jstree='{"type":"folder"}'>Something else </li>
                        <li data-jstree='{"type":"file"}'>File node </li>
                      </ul>
                    </li>
                  </ul>
                </div><!-- /#jstree1 -->
              </div><!-- /.card-body -->
            </div><!-- /.card -->
          </div><!-- grid column -->
          <!-- grid column -->
          <div class="col-lg-6">
            <!-- .card -->
            <div class="card card-fluid">
              <!-- .card-body -->
              <div class="card-body">
                <h4 class="card-title"> JSON data </h4><!-- #jstree2 -->
                <div id="jstree2"></div><!-- /#jstree2 -->
              </div><!-- /.card-body -->
            </div><!-- /.card -->
          </div><!-- grid column -->
          <!-- grid column -->
          <div class="col-lg-6">
            <!-- .card -->
            <div class="card card-fluid">
              <!-- .card-body -->
              <div class="card-body">
                <h4 class="card-title"> Ajax </h4><!-- #jstree3 -->
                <div id="jstree3"></div><!-- /#jstree3 -->
              </div><!-- /.card-body -->
            </div><!-- /.card -->
          </div><!-- grid column -->
          <!-- grid column -->
          <div class="col-lg-6">
            <!-- .card -->
            <div class="card card-fluid">
              <!-- .card-body -->
              <div class="card-body">
                <h4 class="card-title"> Working with events </h4>
                <p class="card-subtitle text-muted mb-3"> Let's use the most basic event <code>changed</code> - it fires when selection on the tree changes: </p><!-- #jstree4 -->
                <div id="jstree4"></div><!-- /#jstree4 -->
              </div><!-- /.card-body -->
            </div><!-- /.card -->
          </div><!-- grid column -->
          <!-- grid column -->
          <div class="col-lg-6">
            <!-- .card -->
            <div class="card card-fluid">
              <!-- .card-body -->
              <div class="card-body">
                <h4 class="card-title"> Checkbox </h4><!-- #jstree5 -->
                <div id="jstree5"></div><!-- /#jstree5 -->
              </div><!-- /.card-body -->
            </div><!-- /.card -->
          </div><!-- grid column -->
          <!-- grid column -->
          <div class="col-lg-6">
            <!-- .card -->
            <div class="card card-fluid">
              <!-- .card-body -->
              <div class="card-body">
                <h4 class="card-title"> Contextmenu </h4><!-- #jstree6 -->
                <div id="jstree6"></div><!-- /#jstree6 -->
              </div><!-- /.card-body -->
            </div><!-- /.card -->
          </div><!-- grid column -->
          <!-- grid column -->
          <div class="col-lg-6">
            <!-- .card -->
            <div class="card card-fluid">
              <!-- .card-body -->
              <div class="card-body">
                <h4 class="card-title"> Drag & drop </h4><!-- #jstree7 -->
                <div id="jstree7"></div><!-- /#jstree7 -->
              </div><!-- /.card-body -->
            </div><!-- /.card -->
          </div><!-- grid column -->
          <!-- grid column -->
          <div class="col-lg-6">
            <!-- .card -->
            <div class="card card-fluid">
              <!-- .card-body -->
              <div class="card-body">
                <h4 class="card-title"> Massload </h4><!-- #jstree8 -->
                <div id="jstree8"></div><!-- /#jstree8 -->
              </div><!-- /.card-body -->
            </div><!-- /.card -->
          </div><!-- grid column -->
          <!-- grid column -->
          <div class="col-lg-6">
            <!-- .card -->
            <div class="card card-fluid">
              <!-- .card-body -->
              <div class="card-body">
                <h4 class="card-title"> Search </h4><!-- .form-group -->
                <div class="form-group has-clearable" style="width: 300px">
                  <button type="button" class="close show" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span></button> <input id="jstree9_q" type="text" class="form-control">
                </div><!-- /.form-group -->
                <!-- #jstree9 -->
                <div id="jstree9"></div><!-- /#jstree9 -->
              </div><!-- /.card-body -->
            </div><!-- /.card -->
          </div><!-- grid column -->
          <!-- grid column -->
          <div class="col-lg-6">
            <!-- .card -->
            <div class="card card-fluid">
              <!-- .card-body -->
              <div class="card-body">
                <h4 class="card-title"> Sort </h4><!-- #jstree10 -->
                <div id="jstree10"></div><!-- /#jstree10 -->
              </div><!-- /.card-body -->
            </div><!-- /.card -->
          </div><!-- grid column -->
          <!-- grid column -->
          <div class="col-lg-6">
            <!-- .card -->
            <div class="card card-fluid">
              <!-- .card-body -->
              <div class="card-body">
                <h4 class="card-title"> Wholerow </h4><!-- #jstree11 -->
                <div id="jstree11"></div><!-- /#jstree11 -->
              </div><!-- /.card-body -->
            </div><!-- /.card -->
          </div><!-- grid column -->
        </div><!-- grid row -->
      </div><!-- /.page-section -->
    </div><!-- /.page-inner -->
  </div><!-- /.page -->
</div><!-- .app-footer -->
<?php layoutBottom([
      "public/vendor/jstree/jstree.min.js",
      "public/vendor/toastr/toastr.min.js",
      "public/js/pages/jstree-demo.js"
]);
?>