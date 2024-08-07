<?php
require_once '../layout/base.php';
layoutTop('Basic Form');
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
        <h1 class="page-title"> Add User</h1>
        <div class="col-lg-4">
        <?php
          $messages = getFlash();
          if ($messages): ?>
              <?php foreach ($messages as $type => $message): ?>
                  <div class="alert alert-<?php echo $type; ?> alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">×</button> <strong><?php echo $type === 'success' ? 'Well done!' : 'Uh Oh!' ?></strong> <?php echo $message; ?>.
                  </div>
              <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </header>
      <div class="page-section">
        <div class="d-xl-none">
          <button class="btn btn-danger btn-floated" type="button" data-toggle="sidebar"><i class="fa fa-th-list"></i></button>
        </div>
        <div class="card">
          <div class="card-body">
            <h3 class="card-title"> Fill all the fields</h3>
            <form class="needs-validation" action="<?php toRoute('users.store') ?>" method="post" enctype="multipart/form-data" novalidate="">
              <div class="form-row">
                <div class="col-md-6 mb-3">
                  <label for="validationTooltip01">Name<abbr title="Required">*</abbr></label>
                  <input type="text" class="form-control" id="validationTooltip01" value="<?= old('name') ?>" placeholder="Name" name="name" required="">
                  <div class="invalid-feedback"> Name is required </div>
                </div>
                <div class="col-md-6 mb-3">
                <label for="validationTooltipEmail">Email <abbr title="Required">*</abbr></label>
                <input type="email" class="form-control" id="validationTooltipEmail" value="<?= old('email') ?>" name="email" placeholder="Email" aria-describedby="inputGroupPrepend" required="">
                <div id="inputGroupPrepend" class="invalid-tooltip">Please enter valid email</div>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="d-flex justify-content-between" for="lbl5"><span>Password</span> <a href="#lbl5" data-toggle="password"><i class="fa fa-eye fa-fw"></i> <span>Show</span></a></label> 
                  <input type="password" class="form-control" name="password" value="<?= old('password') ?>" id="lbl5" required>
                  <div class="invalid-feedback"> Password is required </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="validationTooltipMobileNumber">Mobile Number</label>
                  <input type="text" class="form-control" id="validationTooltipMobileNumber" value="<?= old('mobile_number') ?>" name="mobile_number" required placeholder="Mobile Number" aria-describedby="inputGroupPrepend">
                  <div id="inputGroupPrepend" class="invalid-tooltip"> Please enter Mobile Number</div>
                  <div id="inputGroupPrepend" class="valid-tooltip"> Looks Good</div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-4 mb-3">
                  <label for="validationTooltipCountry">Office <abbr title="Required">*</abbr></label>
                  <select class="custom-select d-block w-100" id="validationTooltipCountry" name="office" required="">
                      <option value=""> Choose... </option>
                      <option value="IT" <?= old('office') == 'IT' ? 'selected' : '' ?>> IT </option>
                      <option value="Technical" <?= old('office') == 'Technical' ? 'selected' : '' ?>> Technical </option>
                      <option value="Chief Engineer CDO" <?= old('office') == 'Chief Engineer CDO' ? 'selected' : '' ?>> Chief Engineer CDO </option>
                      <option value="Chief Engineer Center" <?= old('office') == 'Chief Engineer Center' ? 'selected' : '' ?>> Chief Engineer Center </option>
                  </select>
                  <div class="invalid-feedback"> Please select an Office </div>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="validationTooltipState">Designation <abbr title="Required">*</abbr></label>
                  <select class="custom-select d-block w-100" id="validationTooltipState" name="designation" required="">
                    <option value=""> Choose... </option>
                    <option value="Director IT" <?= old('designation') == 'Director IT' ? 'selected' : '' ?>> Director IT </option>
                    <option value="Deputy Director IT" <?= old('designation') == 'Deputy Director IT' ? 'selected' : '' ?>> Deputy Director IT </option>
                    <option value="Assistant Director IT" <?= old('designation') == 'Assistant Director IT' ? 'selected' : '' ?>> Assistant Director IT </option>
                    <option value="Assistant Director GIS" <?= old('designation') == 'Assistant Director GIS' ? 'selected' : '' ?>> Assistant Director GIS </option>
                    <option value="Computer Operator" <?= old('designation') == 'Computer Operator' ? 'selected' : '' ?>> Computer Operator </option>
                    <option value="Assistant" <?= old('designation') == 'Assistant' ? 'selected' : '' ?>> Assistant </option>
                    <option value="Junior Clerk" <?= old('designation') == 'Junior Clerk' ? 'selected' : '' ?>> Junior Clerk </option>
                    <option value="Senior Clerk" <?= old('designation') == 'Senior Clerk' ? 'selected' : '' ?>> Senior Clerk </option>
                    <option value="Superintendent" <?= old('designation') == 'Superintendent' ? 'selected' : '' ?>> Superintendent </option>
                    <option value="Section Officer" <?= old('designation') == 'Section Officer' ? 'selected' : '' ?>> Section Officer </option>
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
      <?php require_once '../includes/footer.php'; ?>
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
