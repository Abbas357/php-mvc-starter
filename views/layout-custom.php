<?php
require_once '../layout/base.php';
layoutTop('Page With Cover and Sidebar');
?>
<div class="wrapper">
  <!-- .page -->
  <div class="page has-sidebar has-sidebar-expand-xl">
    <!-- .page-inner -->
    <div class="page-inner">
      <!-- .page-cover -->
      <header class="page-cover mb-3">
        <img class="cover-img" src="public/images/dummy/cover2.jpg" alt="">
      </header><!-- /.page-cover -->
      <!-- .page-title-bar -->
      <header class="page-title-bar">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item active">
              <a href="#" data-toggle="sidebar"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Layout</a>
            </li>
          </ol>
        </nav>
        <h1 class="page-title">
          <i class="far fa-building text-muted mr-2"></i> Stilearning, Inc.
        </h1><button class="btn btn-danger btn-floated d-xl-none" type="button" data-toggle="sidebar"><i class="fa fa-th-list"></i></button>
      </header><!-- /.page-title-bar -->
      <!-- .page-section -->
      <div class="page-section">
        <!-- .nav-scroller -->
        <div class="nav-scroller border-bottom">
          <!-- .nav-tabs -->
          <ul class="nav nav-tabs">
            <li class="nav-item">
              <a href="#" class="nav-link active">Billing & Contact</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">To Do</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">Projects</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">Invoices</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">Expenses</a>
            </li>
          </ul><!-- /.nav-tabs -->
        </div><!-- /.nav-scroller -->
      </div><!-- /.page-section -->
    </div><!-- /.page-inner -->
    <!-- .page-sidebar -->
    <div class="page-sidebar">
      <!-- .sidebar-header -->
      <header class="sidebar-header d-sm-none">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item active">
              <a href="#" onclick="Looper.toggleSidebar()"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Back</a>
            </li>
          </ol>
        </nav>
      </header><!-- /.sidebar-header -->
      <!-- .sidebar-section -->
      <div class="sidebar-section">
        <h3 class="section-title"> I'm a sidebar </h3>
      </div><!-- /.sidebar-section -->
    </div><!-- /.page-sidebar -->
  </div><!-- /.page -->
</div><!-- /.wrapper -->
<?php layoutBottom(); ?>