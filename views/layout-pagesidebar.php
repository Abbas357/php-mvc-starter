<?php
require_once '../layout/base.php';
layoutTop('Page With Sidebar');
?>
<!-- .wrapper -->
<div class="wrapper">
  <!-- .page -->
  <div class="page has-sidebar has-sidebar-expand-lg">
    <!-- .page-inner -->
    <div class="page-inner">
      <!-- .page-title-bar -->
      <header class="page-title-bar">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item active">
              <a href="#"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Layouts</a>
            </li>
          </ol>
        </nav>
        <h1 class="page-title"> Page with sidebar </h1><button class="btn btn-danger btn-floated d-lg-none" type="button" data-toggle="sidebar"><i class="fa fa-th-list"></i></button>
      </header><!-- /.page-title-bar -->
      <!-- .page-section -->
      <div class="page-section">
        <div class="section-block">
          <div class="alert alert-info"> The sidebar will be collapse on screen <code>sm</code>, <code>md</code>, <code>lg</code>, or <code>xl</code> automatically by adding class <code>has-sidebar-expand-*</code> to the <code>.page</code> component. Please resize your browser window to see it in action. </div>
        </div>
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
        <button type="button" class="close mt-n1 d-none d-xl-none d-sm-block" onclick="Looper.toggleSidebar()" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h6> I'm a sidebar </h6>
      </div><!-- /.sidebar-section -->
    </div><!-- /.page-sidebar -->
  </div><!-- /.page -->
</div><!-- /.wrapper -->
<?php layoutBottom(); ?>