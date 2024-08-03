<?php
require_once 'layout/base.php';
layoutTop('Basic Form');

use App\Models\User;

$user = new User();

if (request()->isPost()) {
    try {
        $result = $user->createUser(request());

        if ($result['success']) {
            echo $result['message'];
        } else {
            echo $result['message'];
        }
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
}
?>

<div class="wrapper">
  <div class="page has-sidebar has-sidebar-expand-xl">
    <div class="page-inner">
      <header class="page-title-bar">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item active">
              <a href="#"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Forms</a>
            </li>
          </ol>
        </nav>
        <h1 class="page-title"> Add User </h1>
      </header>
      <div class="page-section">
        <div class="d-xl-none">
          <button class="btn btn-danger btn-floated" type="button" data-toggle="sidebar"><i class="fa fa-th-list"></i></button>
        </div>
        <div class="card">
          <div class="card-body">
            <h3 class="card-title"> Fill all the fields</h3>
            <form class="needs-validation" method="post" enctype="multipart/form-data" novalidate="">
              <div class="form-row">
                <div class="col-md-6 mb-3">
                  <label for="validationTooltip01">Name<abbr title="Required">*</abbr></label>
                  <input type="text" class="form-control" id="validationTooltip01" placeholder="Name" name="name" required="">
                  <div class="invalid-feedback"> Name is required </div>
                </div>
                <div class="col-md-6 mb-3">
                <label for="validationTooltipEmail">Email <abbr title="Required">*</abbr></label>
                <input type="email" class="form-control" id="validationTooltipEmail" name="email" placeholder="Email" aria-describedby="inputGroupPrepend" required="">
                <div id="inputGroupPrepend" class="invalid-tooltip">Please enter valid email</div>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="d-flex justify-content-between" for="lbl5"><span>Password</span> <a href="#lbl5" data-toggle="password"><i class="fa fa-eye fa-fw"></i> <span>Show</span></a></label> 
                  <input type="password" class="form-control" name="password" id="lbl5" required>
                  <div class="invalid-feedback"> Password is required </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="validationTooltipMobileNumber">Mobile Number</label>
                  <input type="text" class="form-control" id="validationTooltipMobileNumber" name="mobile_number" required placeholder="Mobile Number" aria-describedby="inputGroupPrepend">
                  <div id="inputGroupPrepend" class="invalid-tooltip"> Please enter Mobile Number</div>
                  <div id="inputGroupPrepend" class="valid-tooltip"> Looks Good</div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-4 mb-3">
                  <label for="validationTooltipCountry">Office <abbr title="Required">*</abbr></label>
                  <select class="custom-select d-block w-100" id="validationTooltipCountry" name="office" required="">
                    <option value=""> Choose... </option>
                    <option> IT </option>
                    <option> Technical </option>
                    <option> Chief Engineer CDO </option>
                    <option> Chief Engineer Center </option>
                  </select>
                  <div class="invalid-feedback"> Please select an Office </div>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="validationTooltipState">Designation <abbr title="Required">*</abbr></label>
                  <select class="custom-select d-block w-100" id="validationTooltipState" name="designation" required="">
                    <option value=""> Choose... </option>
                    <option value="Director IT"> Director IT </option>
                    <option value="Deputy Director IT"> Deputy Director IT </option>
                    <option value="Assistant Director IT"> Assistant Director IT </option>
                    <option value="Assistant Director GIS"> Assistant Director GIS </option>
                    <option value="Computer Operator"> Computer Operator </option>
                    <option value="Assistant"> Assistant </option>
                    <option value="Junior Clerk"> Junior Clerk </option>
                    <option value="Senior Clerk"> Senior Clerk </option>
                    <option value="Superintendent"> Superintendent </option>
                    <option value="Section Officer"> Section Officer </option>
                  </select>
                  <div class="invalid-feedback"> Please provide a designation </div>
                </div>
                <div class="col-md-4 mb-3">
                <label for="tf3">Profile Picture</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="tf3" name="profile_pic" accept=".jpg, jpeg, png, .gif"> <label class="custom-file-label" for="tf3">Choose file</label>
                  </div>
                </div>
              </div>
              <div class="form-actions">
                <button class="btn btn-primary" type="submit">Add User</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <?php require_once 'includes/footer.php'; ?>
    </div>
    <div class="page-sidebar page-sidebar-fixed">
      <header class="sidebar-header d-xl-none">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item">
            <a class="prevent-default" href="#" onclick="Looper.toggleSidebar()"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Back</a>
          </li>
        </ol>
      </header>
      <nav id="nav-content" class="nav flex-column mt-4">
        <a href="#all-users" class="nav-link smooth-scroll">All Users</a>
      </nav>
    </div>
  </div>
</div>
<?php layoutBottom(); ?>
