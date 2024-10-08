<?php
require_once '../layout/base.php';
layoutTop('Steps');
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
        <h1 class="page-title"> Stepper </h1>
        <p class="text-muted"> A process/progress indicator component communicates to the user the progress of a particular process. </p>
      </header><!-- /.page-title-bar -->
      <!-- .page-section -->
      <div class="page-section">
        <!-- .section-block -->
        <div class="section-block">
          <!-- Default Steps -->
          <!-- .bs-stepper -->
          <div id="stepper" class="bs-stepper">
            <!-- .card -->
            <div class="card">
              <!-- .card-header -->
              <div class="card-header">
                <!-- .steps -->
                <div class="steps steps-" role="tablist">
                  <ul>
                    <li class="step" data-target="#test-l-1">
                      <a href="#" class="step-trigger" tabindex="-1"><span class="step-indicator step-indicator-icon"><i class="oi oi-account-login"></i></span> <span class="d-none d-sm-inline">Account</span></a>
                    </li>
                    <li class="step" data-target="#test-l-2">
                      <a href="#" class="step-trigger" tabindex="-1"><span class="step-indicator step-indicator-icon"><i class="oi oi-person"></i></span> <span class="d-none d-sm-inline">Personal</span></a>
                    </li>
                    <li class="step" data-target="#test-l-3">
                      <a href="#" class="step-trigger" tabindex="-1"><span class="step-indicator step-indicator-icon"><i class="oi oi-credit-card"></i></span> <span class="d-none d-sm-inline">Payment</span></a>
                    </li>
                    <li class="step" data-target="#test-l-4">
                      <a href="#" class="step-trigger" tabindex="-1"><span class="step-indicator step-indicator-icon"><i class="oi oi-check"></i></span> <span class="d-none d-sm-inline">Confirm</span></a>
                    </li>
                  </ul>
                </div><!-- /.steps -->
              </div><!-- /.card-header -->
              <!-- .card-body -->
              <div class="card-body">
                <form id="stepper-form" name="stepperForm" class="p-lg-4 p-sm-3 p-0">
                  <!-- .content -->
                  <div id="test-l-1" class="content dstepper-none fade">
                    <!-- fieldset -->
                    <fieldset>
                      <legend>Provide your account details</legend> <!-- .form-group -->
                      <div class="form-group mb-4">
                        <div class="form-label-group">
                          <input type="text" id="userid" name="userid" class="form-control" value="bent10@mail.com" autocomplete="off" data-parsley-group="fieldset01" required=""> <label for="userid">Mobile number or email</label>
                        </div><small class="form-text text-muted"><strong>Type carefully!</strong> You will be sent a SMS / Email confirmation.</small>
                        <div class="invalid-feedback"> Valid phone number / email is required. </div>
                      </div><!-- /.form-group -->
                      <!-- .form-group -->
                      <div class="form-group mb-4">
                        <div class="form-label-group">
                          <input type="text" id="username" name="username" class="form-control" value="bent10" autocomplete="off" data-parsley-group="fieldset01" required=""> <label for="username">Username</label>
                        </div><small class="form-text text-muted">May contain letters, digits, underscores, and should be between 4 and 20 characters long.</small>
                        <div class="invalid-feedback"> Valid username is required. </div>
                      </div><!-- /.form-group -->
                      <!-- .form-group -->
                      <div class="form-group mb-4">
                        <div class="form-label-group">
                          <input type="password" id="passwd" name="passwd" class="form-control" value="secretwords" autocomplete="off" data-parsley-group="fieldset01" required=""> <label for="passwd">Password</label>
                        </div><small class="form-text text-muted">The longer the better. Include numbers for protein.</small>
                        <div class="invalid-feedback"> Valid password is required. </div>
                      </div><!-- /.form-group -->
                      <hr class="mt-5">
                      <!-- .d-flex -->
                      <div class="d-flex">
                        <p> Already have an account? Please <a href="#">Signin</a>. </p><button type="button" class="next btn btn-primary ml-auto" data-validate="fieldset01">Next step</button>
                      </div><!-- /.d-flex -->
                    </fieldset><!-- /fieldset -->
                  </div><!-- /.content -->
                  <!-- .content -->
                  <div id="test-l-2" class="content dstepper-none fade">
                    <!-- fieldset -->
                    <fieldset>
                      <legend>Personal Information</legend> <!-- .row -->
                      <div class="row">
                        <!-- grid column -->
                        <div class="col-md-6 mb-4">
                          <div class="form-label-group">
                            <input type="text" id="firstName" class="form-control" name="firstName" value="Beni" data-parsley-group="fieldset02" required=""> <label for="firstName">First name</label>
                          </div>
                          <div class="invalid-feedback"> Valid first name is required. </div>
                        </div><!-- /grid column -->
                        <!-- grid column -->
                        <div class="col-md-6 mb-4">
                          <div class="form-label-group">
                            <input type="text" id="lastName" class="form-control" name="lastName" value="Arisandi" data-parsley-group="fieldset02" required=""> <label for="lastName">Last name</label>
                          </div>
                          <div class="invalid-feedback"> Valid last name is required. </div>
                        </div><!-- /grid column -->
                      </div><!-- /.row -->
                      <!-- .form-group -->
                      <div class="form-group mb-4">
                        <div class="form-label-group">
                          <input type="text" id="address" class="form-control" name="address" value="5888 Mya Causeway" data-parsley-group="fieldset02" placeholder="Address" required=""> <label for="address">Address</label>
                        </div>
                        <div class="invalid-feedback"> Please enter your shipping address. </div>
                      </div><!-- /.form-group -->
                      <!-- .form-group -->
                      <div class="form-group mb-4">
                        <div class="form-label-group">
                          <input type="text" id="address2" class="form-control" name="address2" value="Apartment 185" placeholder="Apt. or suite"> <label for="address2">Apartment or suite <span class="badge badge-secondary"><em>Optional</em></span></label>
                        </div>
                      </div><!-- /.form-group -->
                      <!-- .row -->
                      <div class="row">
                        <!-- grid column -->
                        <div class="col-md-3 mb-4">
                          <div class="form-label-group">
                            <input type="text" id="zip" class="form-control" name="zip" value="97729" data-parsley-group="fieldset02" required=""> <label for="zip">Zip</label>
                          </div>
                          <div class="invalid-feedback"> Zip code required. </div>
                        </div><!-- /grid column -->
                        <!-- grid column -->
                        <div class="col-md-5 mb-4">
                          <select id="country" class="custom-select custom-select-lg d-block w-100" name="country" data-parsley-group="fieldset02" required="">
                            <option value=""> Choose... </option>
                            <option selected> United States </option>
                          </select>
                          <div class="invalid-feedback"> Please select a valid country. </div>
                        </div><!-- /grid column -->
                        <!-- grid column -->
                        <div class="col-md-4 mb-4">
                          <select id="state" class="custom-select custom-select-lg d-block w-100" name="state" data-parsley-group="fieldset02" required="">
                            <option value=""> Choose... </option>
                            <option selected> California </option>
                          </select>
                          <div class="invalid-feedback"> Please provide a valid state. </div>
                        </div><!-- /grid column -->
                      </div><!-- /.row -->
                      <hr class="mt-5">
                      <div class="d-flex">
                        <button type="button" class="prev btn btn-secondary">Previous</button> <button type="button" class="next btn btn-primary ml-auto" data-validate="fieldset02">Next step</button>
                      </div>
                    </fieldset><!-- /fieldset -->
                  </div><!-- /.content -->
                  <!-- .content -->
                  <div id="test-l-3" class="content dstepper-none fade">
                    <!-- fieldset -->
                    <fieldset>
                      <legend>Payment Information</legend> <!-- .custom-control -->
                      <div class="custom-control custom-radio mb-4">
                        <input type="radio" id="pmd1" class="custom-control-input" name="paymentMethod" value="creditcard" data-parsley-group="fieldset03" required=""> <label class="custom-control-label" for="pmd1">Credit card</label> <!-- .custom-control-hint -->
                        <div class="custom-control-hint">
                          <!-- .row -->
                          <div class="row">
                            <!-- form col -->
                            <div class="col-md-6">
                              <div class="form-group">
                                <div class="form-label-group">
                                  <input type="text" id="pm1" name="ccholder" class="form-control" data-parsley-group="creditcard" placeholder="Name on card" required=""> <label for="pm1">Card holder</label>
                                </div>
                              </div>
                            </div><!-- /form col -->
                            <!-- form col -->
                            <div class="col-md-6">
                              <div class="form-group">
                                <div class="form-label-group">
                                  <input type="text" name="ccnumber" class="form-control" id="pm2" data-mask="cc" data-parsley-group="creditcard" placeholder="4242 4242 4242 4242" required=""> <label for="pm2">Card number</label>
                                </div>
                              </div>
                            </div><!-- /form col -->
                          </div><!-- /.row -->
                          <!-- .row -->
                          <div class="row">
                            <!-- form col -->
                            <div class="col-md-3">
                              <div class="form-group">
                                <div class="form-label-group">
                                  <input type="text" id="pm3" name="ccexpdate" class="form-control" data-mask="expdatecc" data-parsley-group="creditcard" placeholder="MM/YY" required=""> <label for="pm3">Exp. date</label>
                                </div>
                              </div>
                            </div><!-- /form col -->
                            <!-- form col -->
                            <div class="col-md-3">
                              <div class="form-group">
                                <div class="form-label-group">
                                  <input type="text" id="pm4" name="cccvc" class="form-control" data-mask="cvc" data-parsley-group="creditcard" placeholder="XXX" required=""> <label for="pm4">CVC</label>
                                </div>
                              </div>
                            </div><!-- /form col -->
                            <!-- form col -->
                            <div class="col-md-6">
                              <!-- you can change attribute type to type="submit" on your real project -->
                              <button type="button" id="savecc" class="btn btn-lg btn-primary btn-block">Save</button>
                            </div><!-- /form col -->
                          </div><!-- /.row -->
                        </div><!-- /.custom-control-hint -->
                      </div><!-- /.custom-control -->
                      <!-- .custom-control -->
                      <div class="custom-control custom-radio mb-4">
                        <input type="radio" id="pmd2" class="custom-control-input" name="paymentMethod" value="paypal" checked> <label class="custom-control-label" for="pmd2">Paypal</label> <!-- .custom-control-hint -->
                        <div class="custom-control-hint">
                          <div class="row">
                            <div class="col-md-10 col-lg-8">
                              <div class="form-group">
                                <div class="input-group h-auto">
                                  <div class="form-label-group">
                                    <input type="text" name="paypalid" class="form-control" value="paypal@looper.com" readonly> <label>Personal account</label>
                                  </div>
                                  <div class="input-group-append ml-auto">
                                    <span class="input-group-text text-success"><strong>Connected</strong></span>
                                  </div>
                                </div>
                              </div><button class="btn btn-danger" type="button">Disconnect</button>
                            </div>
                          </div>
                        </div><!-- /.custom-control-hint -->
                      </div><!-- /.custom-control -->
                      <!-- .custom-control -->
                      <div class="custom-control custom-radio mb-4">
                        <input type="radio" id="pmd3" class="custom-control-input" name="paymentMethod" value="stripe"> <label class="custom-control-label" for="pmd3">Stripe</label> <!-- .custom-control-hint -->
                        <div class="custom-control-hint">
                          <button class="btn btn-primary" type="button">Connect with <strong><em>Stripe</em></strong></button>
                        </div><!-- /.custom-control-hint -->
                      </div><!-- /.custom-control -->
                      <hr class="mt-5">
                      <div class="d-flex">
                        <button type="button" class="prev btn btn-secondary">Previous</button> <button type="button" class="next btn btn-primary ml-auto" data-validate="fieldset03">Next step</button>
                      </div>
                    </fieldset><!-- /fieldset -->
                  </div><!-- /.content -->
                  <!-- .content -->
                  <div id="test-l-4" class="content dstepper-none fade">
                    <!-- fieldset -->
                    <fieldset>
                      <legend>Terms Agreement</legend> <!-- .card -->
                      <div class="card bg-light">
                        <div class="card-body overflow-auto" style="height: 260px">
                          <p> Ad vero quidem sit magni, sed eum laudantium, alias, consequuntur commodi eveniet nesciunt debitis esse sint temporibus id magnam accusamus perferendis laborum? Nobis ducimus minus blanditiis voluptates et, eligendi laborum. Ea suscipit, aperiam libero id dicta quia architecto iusto tenetur, dignissimos veritatis adipisci et! Recusandae impedit repudiandae, quam sunt repellat quia iusto tempora temporibus alias deleniti, nulla? Laborum expedita optio quam quasi, esse magni sit tempore! </p>
                          <p> Dicta asperiores ea voluptatum nihil quasi, officia tempora voluptates. Quidem reprehenderit nesciunt culpa, architecto iure, neque itaque suscipit, iusto, porro ipsum consequatur! </p>
                          <p> Ad vero quidem sit magni, sed eum laudantium, alias, consequuntur commodi eveniet nesciunt debitis esse sint temporibus id magnam accusamus perferendis laborum? Nobis ducimus minus blanditiis voluptates et, eligendi laborum. Ea suscipit, aperiam libero id dicta quia architecto iusto tenetur, dignissimos veritatis adipisci et! Recusandae impedit repudiandae, quam sunt repellat quia iusto tempora temporibus alias deleniti, nulla? Laborum expedita optio quam quasi, esse magni sit tempore! </p>
                          <p> Dicta asperiores ea voluptatum nihil quasi, officia tempora voluptates. Quidem reprehenderit nesciunt culpa, architecto iure, neque itaque suscipit, iusto, porro ipsum consequatur! </p>
                        </div>
                      </div><!-- /.card -->
                      <!-- .form-group -->
                      <div class="form-group">
                        <!-- .custom-control -->
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" id="agreement" name="agreement" class="custom-control-input" data-parsley-group="agreement" required=""> <label class="custom-control-label" for="agreement">Agree to terms and conditions</label>
                        </div><!-- /.custom-control -->
                      </div><!-- /.form-group -->
                      <hr class="mt-5">
                      <div class="d-flex">
                        <button type="button" class="prev btn btn-secondary">Previous</button> <button type="submit" class="submit btn btn-primary ml-auto" data-validate="agreement">Submit</button>
                      </div>
                    </fieldset><!-- /fieldset -->
                  </div><!-- /.content -->
                </form><!-- /form -->
              </div><!-- /.card-body -->
            </div><!-- /.card -->
          </div><!-- /.bs-stepper -->
          <!-- toasts container -->
          <div aria-live="polite" aria-atomic="true">
            <!-- Position it -->
            <div style="position: fixed; top: 4.5rem; right: 1rem; z-index: 1050">
              <!-- .toast -->
              <div id="submitfeedback" class="toast bg-dark border-dark text-light fade hide" data-delay="3000" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header bg-primary text-white"> See your browser console </div>
                <div class="toast-body">
                  <strong>Congrats!</strong> You see the submit feedback.
                </div>
              </div><!-- /.toast -->
            </div>
          </div><!-- /toasts container -->
        </div><!-- /.section-block -->
        <hr class="my-5">
        <!-- .section-block -->
        <div class="section-block">
          <!-- Progress List -->
          <h2 class="section-title"> Progress List </h2>
          <p class="text-muted"> Alternative indicator with progress list component </p><!-- .card -->
          <div class="card">
            <!-- .card-body -->
            <div class="card-body">
              <!-- .progress-list -->
              <ol class="progress-list mb-sm-0">
                <li class="success">
                  <button type="button" data-toggle="tooltip" title="Step 1">
                    <!-- progress indicator -->
                    <span class="progress-indicator"></span> <span class="sr-only">Step 1</span></button>
                </li>
                <li class="success">
                  <button type="button" data-toggle="tooltip" title="Step 2">
                    <!-- progress indicator -->
                    <span class="progress-indicator"></span> <span class="sr-only">Step 2</span></button>
                </li>
                <li class="active">
                  <button type="button" data-toggle="tooltip" title="Step 3">
                    <!-- progress indicator -->
                    <span class="progress-indicator"></span> <span class="sr-only">Step 3</span></button>
                </li>
                <li>
                  <button type="button" data-toggle="tooltip" title="Step 4">
                    <!-- progress indicator -->
                    <span class="progress-indicator"></span> <span class="sr-only">Step 4</span></button>
                </li>
                <li>
                  <button type="button" data-toggle="tooltip" title="Step 5">
                    <!-- progress indicator -->
                    <span class="progress-indicator"></span> <span class="sr-only">Step 5</span></button>
                </li>
              </ol><!-- /.progress-list -->
            </div><!-- /.card-body -->
            <!-- .card-body -->
            <div class="card-body">
              <p> Nesciunt qui vero sed dolores velit nihil est omnis exercitationem facilis, voluptatem ipsa, veritatis unde molestiae incidunt aperiam dicta consequuntur, facere commodi. </p>
            </div><!-- /.card-body -->
          </div><!-- /.card -->
          <div class="my-5"></div><!-- Progress List with label -->
          <!-- .card -->
          <div class="card">
            <!-- .card-body -->
            <div class="card-body">
              <!-- .progress-list -->
              <ol class="progress-list mb-0 mb-sm-4">
                <li class="success">
                  <button type="button">
                    <!-- progress indicator -->
                    <span class="progress-indicator"></span></button> <span class="progress-label d-none d-sm-inline-block">Step 1</span>
                </li>
                <li class="success">
                  <button type="button">
                    <!-- progress indicator -->
                    <span class="progress-indicator"></span></button> <span class="progress-label d-none d-sm-inline-block">Step 2</span>
                </li>
                <li class="active error">
                  <button type="button">
                    <!-- progress indicator -->
                    <span class="progress-indicator"></span></button> <span class="progress-label d-none d-sm-inline-block">Step 3</span>
                </li>
                <li>
                  <button type="button">
                    <!-- progress indicator -->
                    <span class="progress-indicator"></span></button> <span class="progress-label d-none d-sm-inline-block">Step 4</span>
                </li>
                <li>
                  <button type="button">
                    <!-- progress indicator -->
                    <span class="progress-indicator"></span></button> <span class="progress-label d-none d-sm-inline-block">Step 5</span>
                </li>
              </ol><!-- /.progress-list -->
            </div><!-- /.card-body -->
            <!-- .card-body -->
            <div class="card-body">
              <p> Earum temporibus consequuntur facilis iste obcaecati soluta, inventore, vero labore accusantium in commodi eaque, similique necessitatibus ab dolorem non repudiandae pariatur culpa! </p>
            </div><!-- /.card-body -->
          </div><!-- /.card -->
        </div><!-- /.section-block -->
      </div><!-- /.page-section -->
    </div><!-- /.page-inner -->
  </div><!-- /.page -->
</div><!-- .app-footer -->
<?php 
layoutBottom([
    "public/vendor/parsleyjs/parsley.min.js",
    "public/vendor/text-mask/vanillaTextMask.js",
    "public/vendor/text-mask/addons/textMaskAddons.js",
    "public/vendor/bs-stepper/js/bs-stepper.min.js",
    "public/js/pages/steps-demo.js"
]);
?>
