<?php
require_once '../layout/base.php';
layoutTop('Input Pickers', [
  "public/vendor/bootstrap-select/css/bootstrap-select.min.css",
  "public/vendor/flatpickr/flatpickr.min.css",
  "public/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css",
  "public/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css",
  "public/vendor/nouislider/nouislider.min.css"
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
              <a href="#"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Forms</a>
            </li>
          </ol>
        </nav>
        <h1 class="page-title"> Pickers </h1>
      </header><!-- /.page-title-bar -->
      <!-- .page-section -->
      <div class="page-section">
        <!-- .card-deck-xl -->
        <div class="card-deck-xl">
          <!-- .card -->
          <div class="card card-fluid">
            <!-- .card-body -->
            <div class="card-body">
              <h4 class="card-title"> Bootstrap Select <span class="badge badge-warning">New</span>
              </h4>
              <h6 class="card-subtitle mb-4"> Brings select elements with intuitive multiselection, searching, and much more. </h6><!-- form -->
              <form>
                <!-- .form-group -->
                <div class="form-group">
                  <label class="control-label" for="bss1">Basic</label> <select id="bss1" data-toggle="selectpicker" data-width="100%">
                    <optgroup label="Picnic">
                      <option> Mustard </option>
                      <option> Ketchup </option>
                      <option> Relish </option>
                    </optgroup>
                    <optgroup label="Camping">
                      <option> Tent </option>
                      <option> Flashlight </option>
                      <option> Toilet Paper </option>
                    </optgroup>
                  </select>
                </div><!-- /.form-group -->
                <!-- .form-group -->
                <div class="form-group">
                  <label class="control-label" for="bss2">Multiple select boxes</label> <select id="bss2" data-toggle="selectpicker" data-width="100%" title="Choose one or more..." multiple>
                    <option> Mustard </option>
                    <option> Ketchup </option>
                    <option> Relish </option>
                  </select>
                </div><!-- /.form-group -->
                <!-- .form-group -->
                <div class="form-group">
                  <label class="control-label" for="bss3">Live search</label> <select id="bss3" data-toggle="selectpicker" data-live-search="true" data-width="100%">
                    <option> Hot Dog, Fries and a Soda </option>
                    <option> Burger, Shake and a Smile </option>
                    <option> Sugar, Spice and all things nice </option>
                  </select>
                </div><!-- /.form-group -->
                <!-- .form-group -->
                <div class="form-group">
                  <label class="control-label" for="bss4">Key words</label> <select id="bss4" data-toggle="selectpicker" data-live-search="true" data-width="100%">
                    <option data-tokens="ketchup mustard"> Hot Dog, Fries and a Soda </option>
                    <option data-tokens="mustard"> Burger, Shake and a Smile </option>
                    <option data-tokens="frosting"> Sugar, Spice and all things nice </option>
                  </select>
                </div><!-- /.form-group -->
                <!-- .form-group -->
                <div class="form-group">
                  <label class="control-label" for="bss5">Limit selections</label> <select id="bss5" data-toggle="selectpicker" data-max-options="2" data-width="100%" multiple>
                    <option data-tokens="ketchup mustard"> Hot Dog, Fries and a Soda </option>
                    <option data-tokens="mustard"> Burger, Shake and a Smile </option>
                    <option data-tokens="frosting"> Sugar, Spice and all things nice </option>
                  </select>
                </div><!-- /.form-group -->
                <!-- .form-group -->
                <div class="form-group">
                  <label class="control-label" for="bss6">Selected text</label> <select id="bss6" data-toggle="selectpicker" data-width="100%">
                    <option title="Combo 1"> Hot Dog, Fries and a Soda </option>
                    <option title="Combo 2"> Burger, Shake and a Smile </option>
                    <option title="Combo 3"> Sugar, Spice and all things nice </option>
                  </select>
                </div><!-- /.form-group -->
                <!-- .form-group -->
                <div class="form-group">
                  <label class="control-label" for="bss7">Selected text format</label> <select id="bss7" data-toggle="selectpicker" data-selected-text-format="count &gt; 3" data-width="100%" multiple>
                    <option> Mustard </option>
                    <option> Ketchup </option>
                    <option> Relish </option>
                    <option> Onions </option>
                  </select>
                </div><!-- /.form-group -->
                <!-- .form-group -->
                <div class="form-group">
                  <label class="control-label" for="bss8">Icons</label> <select id="bss8" data-toggle="selectpicker" data-width="100%">
                    <option data-icon="fa-glass"> Mustard </option>
                    <option data-icon="fa-heart"> Ketchup </option>
                    <option data-icon="fa-film"> Relish </option>
                    <option data-icon="fa-home"> Mayonnaise </option>
                    <option data-icon="fa-print"> Barbecue Sauce </option>
                  </select>
                </div><!-- /.form-group -->
                <!-- .form-group -->
                <div class="form-group">
                  <label class="control-label" for="bss9">Custom content</label> <select id="bss9" data-toggle="selectpicker" data-width="100%">
                    <option data-content="&lt;span class='badge badge-warning'&gt;Mustard&lt;/span&gt;"> Mustard </option>
                    <option data-content="&lt;span class='badge badge-danger label-important'&gt;Ketchup&lt;/span&gt;"> Ketchup </option>
                    <option data-content="&lt;span class='badge badge-success'&gt;Relish&lt;/span&gt;"> Relish </option>
                    <option data-content="&lt;span class='badge badge-info'&gt;Mayonnaise&lt;/span&gt;"> Mayonnaise </option>
                  </select>
                </div><!-- /.form-group -->
                <!-- .form-group -->
                <div class="form-group">
                  <label class="control-label" for="bss10">Subtext</label> <select id="bss10" data-toggle="selectpicker" data-show-subtext="true" data-width="100%">
                    <option data-subtext="French's"> Mustard </option>
                    <option data-subtext="Heinz"> Ketchup </option>
                    <option data-subtext="Sweet"> Relish </option>
                    <option data-subtext="Miracle Whip"> Mayonnaise </option>
                    <option data-divider="true">
                    </option>
                    <option data-subtext="Honey"> Barbecue Sauce </option>
                    <option data-subtext="Ranch"> Salad Dressing </option>
                    <option data-subtext="Sweet &amp; Spicy"> Tabasco </option>
                    <option data-subtext="Chunky"> Salsa </option>
                  </select>
                </div><!-- /.form-group -->
                <!-- .form-group -->
                <div class="form-group">
                  <label class="control-label" for="bss11">Menu size</label> <select id="bss11" data-toggle="selectpicker" data-size="5" data-width="100%">
                    <option> Mustard </option>
                    <option> Ketchup </option>
                    <option> Relish </option>
                    <option> Mayonnaise </option>
                    <option> Barbecue Sauce </option>
                    <option> Salad Dressing </option>
                    <option> Tabasco </option>
                    <option> Salsa </option>
                  </select>
                </div><!-- /.form-group -->
                <!-- .form-group -->
                <div class="form-group">
                  <label class="control-label" for="bss12">Select/deselect all</label> <select id="bss12" data-toggle="selectpicker" data-actions-box="true" data-width="100%" multiple>
                    <option> Mustard </option>
                    <option> Ketchup </option>
                    <option> Relish </option>
                  </select>
                </div><!-- /.form-group -->
                <!-- .row -->
                <div class="row">
                  <!-- .col -->
                  <div class="col-md-6">
                    <!-- .form-group -->
                    <div class="form-group">
                      <label class="control-label" for="bss13">Divider</label> <select id="bss13" data-toggle="selectpicker" data-width="100%">
                        <option> Mustard </option>
                        <option> Ketchup </option>
                        <option> Relish </option>
                        <option> Mayonnaise </option>
                        <option data-divider="true">
                        </option>
                        <option> Barbecue Sauce </option>
                        <option> Salad Dressing </option>
                        <option> Tabasco </option>
                        <option> Salsa </option>
                      </select>
                    </div><!-- /.form-group -->
                  </div><!-- /.col -->
                  <!-- .col -->
                  <div class="col-md-6">
                    <!-- .form-group -->
                    <div class="form-group">
                      <label class="control-label" for="bss14">Menu header</label> <select id="bss14" data-toggle="selectpicker" data-header="Select a condiment" data-width="100%">
                        <option data-subtext="French's"> Mustard </option>
                        <option data-subtext="Heinz"> Ketchup </option>
                        <option data-subtext="Sweet"> Relish </option>
                        <option data-subtext="Miracle Whip"> Mayonnaise </option>
                        <option data-divider="true">
                        </option>
                        <option data-subtext="Honey"> Barbecue Sauce </option>
                        <option data-subtext="Ranch"> Salad Dressing </option>
                        <option data-subtext="Sweet &amp; Spicy"> Tabasco </option>
                        <option data-subtext="Chunky"> Salsa </option>
                      </select>
                    </div><!-- /.form-group -->
                  </div><!-- /.col -->
                </div><!-- /.row -->
                <!-- .row -->
                <div class="row">
                  <!-- .col -->
                  <div class="col-md-6">
                    <!-- .form-group -->
                    <div class="form-group">
                      <label class="control-label" for="bss15">Disabled</label> <select id="bss15" data-toggle="selectpicker" data-width="100%" disabled>
                        <option> Mustard </option>
                        <option> Ketchup </option>
                        <option> Relish </option>
                      </select>
                    </div><!-- /.form-group -->
                  </div><!-- /.col -->
                  <!-- .col -->
                  <div class="col-md-6">
                    <!-- .form-group -->
                    <div class="form-group">
                      <label class="control-label" for="bss16">Disabled option</label> <select id="bss16" data-toggle="selectpicker" data-width="100%">
                        <optgroup label="Picnic" disabled>
                          <option> Mustard </option>
                          <option> Ketchup </option>
                          <option> Relish </option>
                        </optgroup>
                        <optgroup label="Camping">
                          <option> Tent </option>
                          <option disabled> Flashlight </option>
                          <option> Toilet Paper </option>
                        </optgroup>
                      </select>
                    </div><!-- /.form-group -->
                  </div><!-- /.col -->
                </div><!-- /.row -->
              </form><!-- /form -->
            </div><!-- /.card-body -->
          </div><!-- /.card -->
          <!-- .card -->
          <div class="card card-fluid">
            <!-- .card-body -->
            <div class="card-body">
              <h4 class="card-title"> Flatpickr </h4>
              <h6 class="card-subtitle mb-4"> Lightweight and powerful datetimepicker with no dependencies. </h6><!-- form -->
              <form>
                <!-- .form-group -->
                <div class="form-group">
                  <label class="control-label" for="flatpickr01">Basic</label> <input id="flatpickr01" type="text" class="form-control" data-toggle="flatpickr">
                </div><!-- /.form-group -->
                <!-- .form-group -->
                <div class="form-group">
                  <label class="control-label" for="flatpickr02">DateTime</label> <input id="flatpickr02" type="text" class="form-control" data-toggle="flatpickr" data-enable-time="true" data-date-format="Y-m-d H:i">
                </div><!-- /.form-group -->
                <!-- .form-group -->
                <div class="form-group">
                  <label class="control-label" for="flatpickr03">Human-friendly Dates</label> <input id="flatpickr03" type="text" class="form-control" data-toggle="flatpickr" data-alt-input="true" data-alt-format="F j, Y" data-date-format="Y-m-d">
                </div><!-- /.form-group -->
                <!-- .form-group -->
                <div class="form-group">
                  <label class="control-label" for="flatpickr04">minDate and maxDate</label> <input id="flatpickr04" type="text" class="form-control" data-toggle="flatpickr" data-default-date="2019-11-01" data-min-date="2019-11-03" data-max-date="2019-11-25"> <small class="form-text text-muted">14 days from now</small>
                </div><!-- /.form-group -->
                <!-- .form-group -->
                <div class="form-group">
                  <label class="control-label" for="flatpickr05">Disabling dates</label> <input id="flatpickr05" type="text" class="form-control" data-toggle="flatpickr" data-default-date="2019-11-01" data-disables='[ { "from": "2019-11-03", "to": "2019-11-03" }, { "from": "2019-11-20", "to": "2019-11-25" } ]' data-date-format="Y-m-d">
                </div><!-- /.form-group -->
                <!-- .form-group -->
                <div class="form-group">
                  <label class="control-label" for="flatpickr06">Selecting multiple dates</label> <input id="flatpickr06" type="text" class="form-control" data-toggle="flatpickr" data-mode="multiple" data-default-date='["2019-03-03", "2019-03-20"]' data-date-format="Y-m-d">
                </div><!-- /.form-group -->
                <!-- .form-group -->
                <div class="form-group">
                  <label class="control-label" for="flatpickr07">Range Calendar</label> <input id="flatpickr07" type="text" class="form-control" data-toggle="flatpickr" data-mode="range" data-date-format="Y-m-d" data-default-dates='["2019-03-03", "2019-03-20"]'>
                </div><!-- /.form-group -->
                <!-- .form-group -->
                <div class="form-group">
                  <label class="control-label" for="flatpickr08">Time Picker</label> <input id="flatpickr08" type="text" class="form-control" data-toggle="flatpickr" data-enable-time="true" data-no-calendar="true" data-date-format="H:i" data-default-date="13:45">
                </div><!-- /.form-group -->
                <!-- .form-group -->
                <div class="form-group">
                  <label class="control-label" for="flatpickr-wrap">Wrap element</label>
                  <div class="input-group input-group-alt flatpickr" id="flatpickr9" data-toggle="flatpickr" data-wrap="true" data-alt-input="true" data-alt-format="F j, Y" data-alt-input-class="form-control" data-date-format="Y-m-d" value="2019-11-04" placeholder="DD/MM/YYYY">
                    <input id="flatpickr-wrap" type="text" class="form-control" data-input="">
                    <div class="input-group-append">
                      <button type="button" class="btn btn-secondary" data-toggle=""><i class="far fa-calendar"></i></button> <button type="button" class="btn btn-secondary" data-clear=""><i class="fa fa-times"></i></button>
                    </div>
                  </div>
                </div><!-- /.form-group -->
                <!-- .form-group -->
                <div class="form-group">
                  <label class="control-label">Inline Calendar</label> <input id="flatpickr10" type="hidden" class="form-control d-none" data-toggle="flatpickr" data-inline="true">
                </div><!-- /.form-group -->
                <!-- .form-group -->
                <div class="form-group">
                  <label class="control-label" for="flatpickr11">Month Select</label> <input id="flatpickr11" type="text" class="form-control" data-toggle="flatpickr" data-monthselect="true">
                </div><!-- /.form-group -->
              </form><!-- /form -->
            </div><!-- /.card-body -->
          </div><!-- /.card -->
        </div><!-- /.card-deck-xl -->
        <hr class="my-5">
        <!-- grid row -->
        <div class="row">
          <!-- grid column -->
          <div class="col-lg-4">
            <!-- .section-block -->
            <div class="section-block mt-0">
              <h2 class="section-title pt-0"> Colorpicker </h2>
              <p class="text-muted"> Bootstrap Colorpicker is a modular color picker plugin for Bootstrap 4. </p>
            </div><!-- /.section-block -->
          </div><!-- /grid column -->
          <!-- grid column -->
          <div class="col-lg-8">
            <!-- .card -->
            <div class="card card-fluid">
              <!-- .card-body -->
              <div class="card-body">
                <!-- form -->
                <form>
                  <!-- .form-group -->
                  <div class="form-group">
                    <label for="colorpicker1" class="control-label">Simple input field</label> <input id="colorpicker1" type="text" class="form-control" data-toggle="colorpicker" value="#9474a9">
                  </div><!-- /.form-group -->
                  <!-- .form-group -->
                  <div class="form-group">
                    <label for="inputColorpicker2" class="control-label">As a component</label>
                    <div id="colorpicker2" class="input-group input-group-alt" data-toggle="colorpicker">
                      <input id="inputColorpicker2" type="text" class="form-control" value="#04C4A5"> <span class="input-group-append"><span class="input-group-text colorpicker-input-addon"><i class="align-self-center"></i></span></span>
                    </div>
                  </div><!-- /.form-group -->
                  <!-- .form-group -->
                  <div class="form-group">
                    <label for="inputColorpicker3" class="control-label">Custom options</label>
                    <div id="colorpicker3" class="input-group input-group-alt" data-toggle="colorpicker" data-color="#4D9DE0" data-format="rgb">
                      <input id="inputColorpicker3" type="text" class="form-control" value="#C5906C"> <span class="input-group-append"><span class="input-group-text colorpicker-input-addon"><i class="align-self-center"></i></span></span>
                    </div>
                  </div><!-- /.form-group -->
                  <!-- .form-group -->
                  <div class="form-group">
                    <label for="inputColorpicker4" class="control-label">Disable alpha channel</label>
                    <div id="colorpicker4" class="input-group input-group-alt" data-toggle="colorpicker" data-use-alpha="false">
                      <input id="inputColorpicker4" type="text" class="form-control" value="#C5906C"> <span class="input-group-append"><span class="input-group-text colorpicker-input-addon"><i class="align-self-center"></i></span></span>
                    </div>
                  </div><!-- /.form-group -->
                  <!-- .form-group -->
                  <div class="form-group">
                    <label for="colorpicker5" class="control-label">Transparent color support</label> <input id="colorpicker5" type="text" class="form-control" data-toggle="colorpicker" data-color="transparent" data-format="rgba">
                  </div><!-- /.form-group -->
                  <!-- .form-group -->
                  <div class="form-group">
                    <label for="colorpicker6" class="control-label">Horizontal mode</label> <input id="colorpicker6" type="text" class="form-control" data-toggle="colorpicker" data-color="#C5906C" data-horizontal="true">
                  </div><!-- /.form-group -->
                  <!-- .form-group -->
                  <div class="form-group">
                    <label class="control-label">Inline mode</label>
                    <div class="d-block">
                      <div id="colorpicker7" data-toggle="colorpicker" data-color="#C56C6C" data-container="true" data-inline="true"></div>
                    </div>
                  </div><!-- /.form-group -->
                  <!-- .form-group -->
                  <div class="form-group">
                    <label for="inputColorpicker8" class="control-label">Aliased color palette</label>
                    <div id="colorpicker8" class="input-group input-group-alt" data-toggle="colorpicker" data-extensions='[ { "name": "swatches", "colors": { "black": "#000000", "white": "#ffffff", "red": "#FF0000", "default": "#777777", "primary": "#337ab7", "success": "#5cb85c", "info": "#5bc0de", "warning": "#f0ad4e", "danger": "#d9534f" }, "namesAsValues": true } ]'>
                      <input id="inputColorpicker8" type="text" class="form-control" value="#9474a9"> <span class="input-group-append"><span class="input-group-text colorpicker-input-addon"><i class="align-self-center"></i></span></span>
                    </div>
                  </div><!-- /.form-group -->
                  <!-- .form-group -->
                  <div class="form-group">
                    <label class="control-label">Custom template</label>
                    <div class="d-block">
                      <div id="colorpicker9" data-color="#04C4A5"></div>
                    </div>
                  </div><!-- /.form-group -->
                  <!-- .form-group -->
                  <div class="form-group">
                    <label class="control-label">Inside a modal</label>
                    <div class="d-block">
                      <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#cpModal">Show modal</button>
                    </div><!-- .modal -->
                    <div class="modal fade" id="cpModal" tabindex="-1" role="dialog" aria-hidden="true">
                      <!-- .modal-dialog -->
                      <div class="modal-dialog">
                        <!-- .modal-content -->
                        <div class="modal-content">
                          <!-- .modal-body -->
                          <div class="modal-body">
                            <div id="colorpicker10" class="input-group input-group-alt" data-toggle="colorpicker">
                              <input type="text" class="form-control" value="#4D9DE0"> <span class="input-group-append"><span class="input-group-text colorpicker-input-addon"><i class="align-self-center"></i></span></span>
                            </div>
                          </div><!-- /.modal-body -->
                        </div><!-- /.modal-content -->
                      </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                  </div><!-- /.form-group -->
                </form><!-- /form -->
              </div><!-- /.card-body -->
            </div><!-- /.card -->
          </div><!-- /grid column -->
        </div><!-- /grid row -->
        <hr class="my-5">
        <!-- grid row -->
        <div class="row">
          <!-- grid column -->
          <div class="col-lg-4">
            <!-- .section-block -->
            <div class="section-block mt-0">
              <h2 class="section-title pt-0"> Uploader </h2>
              <p class="text-muted"> File Upload widget with multiple file selection, drag & drop support, progress bar, validation and preview images, audio and video. Supports cross-domain, chunked and resumable file uploads. Works with any server-side platform (Google App Engine, PHP, Python, Ruby on Rails, Java, etc.) that supports standard HTML form file uploads. </p>
            </div><!-- /.section-block -->
          </div><!-- /grid column -->
          <!-- grid column -->
          <div class="col-lg-8">
            <!-- .card -->
            <div class="card card-fluid">
              <!-- The avatar upload progress bar -->
              <div id="progress-avatar" class="progress progress-xs rounded-0 fade">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
              </div><!-- .card-body -->
              <div class="card-body">
                <!-- .media -->
                <div class="media">
                  <div class="user-avatar user-avatar-xl fileinput-button">
                    <div class="fileinput-button-label"> Change photo </div><img src="public/images/avatars/profile.jpg" alt=""> <input id="fileupload-avatar" type="file" name="avatar">
                  </div>
                  <div class="media-body pl-3">
                    <h3 class="card-title"> jQuery File Upload </h3>
                    <p class="card-text"> Click the current avatar to change your photo. </p>
                    <p class="card-text text-muted"> The maximum file size allowed is 2MB. </p>
                  </div>
                </div><!-- /.media -->
              </div><!-- /.card-body -->
              <div id="avatar-warning-container" class="alert alert-danger fade mb-0"></div>
            </div><!-- /.card -->
            <!-- .card -->
            <div class="card card-fluid">
              <!-- .card-body -->
              <div class="card-body">
                <!-- The fileinput-button span is used to style the file input field as button -->
                <label>Using custom input</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="fileupload-customInput" multiple> <label class="custom-file-label" for="fileupload-customInput">Choose files</label>
                </div>
                <hr>
                <label class="mr-2">Using button</label>
                <div class="btn btn-secondary fileinput-button">
                  <i class="fa fa-plus fa-fw"></i> <span>Add files...</span> <!-- The file input field used as target for the file upload widget -->
                  <input id="fileupload-btn" type="file" name="files[]" multiple>
                </div>
                <hr>
                <label>Using dropzone</label>
                <div id="dropzone" class="fileinput-dropzone">
                  <span>Drop files or click to upload.</span> <!-- The file input field used as target for the file upload widget -->
                  <input id="fileupload-dropzone" type="file" name="files[]" multiple>
                </div>
              </div><!-- /.card-body -->
              <!-- The progress bar -->
              <div id="progress" class="progress progress-xs rounded-0 fade">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
              </div><!-- The container for the uploaded files -->
              <div id="uploadList" class="list-group list-group-flush list-group-divider"></div>
            </div><!-- /.card -->
          </div><!-- /grid column -->
        </div><!-- /grid row -->
        <hr class="my-5">
        <!-- grid row -->
        <div class="row">
          <!-- grid column -->
          <div class="col-lg-4">
            <!-- .section-block -->
            <div class="section-block mt-0">
              <h2 class="section-title pt-0"> Spinner </h2>
              <p class="text-muted"> A mobile and touch friendly input spinner component. It supports the mousewheel and the up/down keys. </p>
            </div><!-- /.section-block -->
          </div><!-- /grid column -->
          <!-- grid column -->
          <div class="col-lg-8">
            <!-- .card -->
            <div class="card card-fluid">
              <!-- .card-body -->
              <div class="card-body">
                <!-- form -->
                <form>
                  <!-- .form-group -->
                  <div class="form-group">
                    <label class="control-label" for="spinner1">Basic spinner</label> <input type="text" id="spinner1" data-toggle="touchspin">
                  </div><!-- /.form-group -->
                  <!-- .form-group -->
                  <div class="form-group">
                    <label class="control-label" for="spinner2">With postfix</label> <input type="text" value="55" id="spinner2" data-toggle="touchspin" data-min="0" data-max="100" data-step="0.1" data-decimals="2" data-boostat="5" data-maxboostedstep="10" data-postfix="%">
                  </div><!-- /.form-group -->
                  <!-- .form-group -->
                  <div class="form-group">
                    <label class="control-label" for="spinner3">With prefix</label> <input type="text" value="33" id="spinner3" data-toggle="touchspin" data-min="-1000000000" data-max="1000000000" data-stepinterval="50" data-maxboostedstep="10000000" data-prefix="$">
                  </div><!-- /.form-group -->
                  <!-- .form-group -->
                  <div class="form-group">
                    <label class="control-label" for="spinner4">Vertical button alignment</label> <input type="text" value="55" id="spinner4" data-toggle="touchspin" data-verticalbuttons="true">
                  </div><!-- /.form-group -->
                  <!-- .form-group -->
                  <div class="form-group">
                    <label class="control-label" for="spinner5">Vertical buttons with custom icons</label> <input type="text" value="55" id="spinner5" data-toggle="touchspin" data-verticalbuttons="true" data-verticalup="&lt;i class='fa fa-angle-up'&gt;&lt;/i&gt;" data-verticaldown="&lt;i class='fa fa-angle-down'&gt;&lt;/i&gt;">
                  </div><!-- /.form-group -->
                </form><!-- /form -->
              </div><!-- /.card-body -->
            </div><!-- /.card -->
          </div><!-- /grid column -->
        </div><!-- /grid row -->
        <hr class="my-5">
        <!-- .section-block -->
        <div class="section-block">
          <h2 class="section-title"> Slider </h2>
          <p class="text-muted"> Lightweight JavaScript range slider library. It offers a wide selection of options and settings, and is compatible with a ton of (touch) devices, including those running iOS, Android, Windows 8/8.1/10, Windows Phone 8.1 and Windows Mobile 10. </p>
        </div><!-- /.section-block -->
        <!-- .masonry-layout -->
        <div class="masonry-layout">
          <!-- .masonry-item -->
          <div class="masonry-item col-lg-6">
            <!-- .card -->
            <div class="card card-fluid">
              <!-- .card-body -->
              <div class="card-body">
                <h3 class="card-title"> noUiSlider </h3><!-- .media -->
                <div class="media">
                  <!-- .media-left -->
                  <div class="media-left">
                    <div class="text-truncate p-3" id="nouislider-colorpicker">
                      <div class="noUi-danger mr-4 d-inline-block" id="red" style="height:220px" data-toggle="nouislider" data-start="128" data-connect='[true, false]' data-orientation="vertical" data-range='{ "min": 0, "max": 255 }' data-format-wnumb='{ "decimals": 0 }'></div>
                      <div class="noUi-success mr-4 d-inline-block" id="green" style="height:220px" data-toggle="nouislider" data-start="128" data-connect='[true, false]' data-orientation="vertical" data-range='{ "min": 0, "max": 255 }' data-format-wnumb='{ "decimals": 0 }'></div>
                      <div class="noUi-info mr-4 d-inline-block" id="blue" style="height:220px" data-toggle="nouislider" data-start="128" data-connect='[true, false]' data-orientation="vertical" data-range='{ "min": 0, "max": 255 }' data-format-wnumb='{ "decimals": 0 }'></div>
                    </div>
                  </div><!-- /.media-left -->
                  <!-- .media-body -->
                  <div class="media-body align-middle p-3">
                    <div class="bordered" id="ncp-result" style="width:100px;height:100px;background-color: rgb(128,128,128)"></div>
                  </div><!-- /.media-body -->
                </div><!-- /.media -->
              </div><!-- /.card-body -->
            </div><!-- /.card -->
          </div><!-- /.masonry-item -->
          <!-- .masonry-item -->
          <div class="masonry-item col-lg-6">
            <!-- .card -->
            <div class="card card-fluid">
              <!-- .card-body -->
              <div class="card-body">
                <h3 class="card-title"> Using HTML5 input elements </h3>
                <div class="nouislider-wrapper">
                  <div id="html5" data-toggle="nouislider" data-start="[ 10, 30 ]" data-connect="true" data-range='{ "min": -20, "max": 40 }'></div>
                </div><!-- grid row -->
                <div class="form-row">
                  <!-- grid column -->
                  <div class="col">
                    <select id="input-select" class="custom-select">
                    </select>
                  </div><!-- /grid column -->
                  <!-- grid column -->
                  <div class="col">
                    <input id="input-number" class="form-control" type="number" min="-20" max="40" step="1">
                  </div><!-- /grid column -->
                </div><!-- /grid row -->
              </div><!-- /.card-body -->
            </div><!-- /.card -->
          </div><!-- /.masonry-item -->
          <!-- .masonry-item -->
          <div class="masonry-item col-lg-6">
            <!-- .card -->
            <div class="card card-fluid">
              <!-- .card-body -->
              <div class="card-body">
                <h3 class="card-title"> Non linear slider </h3>
                <div class="nouislider-wrapper">
                  <div id="nonlinear" class="noUi-danger" data-toggle="nouislider" data-connect="true" data-behaviour="tap" data-start='[ 500, 4000 ]' data-range='{ "min": [ 0 ], "10%": [ 500, 500 ], "50%": [ 4000, 1000 ], "max": [ 10000 ] }'></div>
                </div><span class="badge badge-info" id="lower-value"></span> <span class="badge badge-info" id="upper-value"></span>
              </div><!-- /.card-body -->
            </div><!-- /.card -->
          </div><!-- /.masonry-item -->
          <!-- .masonry-item -->
          <div class="masonry-item col-lg-6">
            <!-- .card -->
            <div class="card card-fluid">
              <!-- .card-body -->
              <div class="card-body">
                <h3 class="card-title"> Colored Connect Elements </h3>
                <p>
                  <button id="lockbutton" class="btn btn-secondary">Lock</button>
                </p>
                <p>
                  <span class="badge badge-info" id="slider1-span"></span>
                </p>
                <div class="nouislider-wrapper">
                  <div class="noUi-success" id="slider1" data-toggle="nouislider" data-start="60" data-connect='[true, false]' data-animate="false" data-range='{ "min": 50, "max": 100 }'></div>
                </div>
                <p>
                  <span class="badge badge-info" id="slider2-span"></span>
                </p>
                <div class="nouislider-wrapper">
                  <div class="noUi-warning" id="slider2" data-toggle="nouislider" data-start="80" data-connect='[true, false]' data-animate="false" data-range='{ "min": 50, "max": 100 }'></div>
                </div>
              </div><!-- /.card-body -->
            </div><!-- /.card -->
          </div><!-- /.masonry-item -->
          <!-- .masonry-item -->
          <div class="masonry-item col-lg-6">
            <!-- .card -->
            <div class="card card-fluid">
              <!-- .card-body -->
              <div class="card-body">
                <h3 class="card-title"> Locking sliders together </h3>
                <p> noUiSlider's connect elements can be individually colored or otherwise styled. </p>
                <div class="nouislider-wrapper">
                  <div id="slider-color" data-toggle="nouislider" data-start='[4000, 8000, 12000, 16000]' data-connect='[false, true, true, true, true]' data-range='{ "min": [2000], "max": [20000] }'></div>
                </div>
              </div><!-- /.card-body -->
            </div><!-- /.card -->
          </div><!-- /.masonry-item -->
          <!-- .masonry-item -->
          <div class="masonry-item col-lg-6">
            <!-- .card -->
            <div class="card card-fluid">
              <!-- .card-body -->
              <div class="card-body">
                <h3 class="card-title"> Changing the slider by keypress in input </h3>
                <div class="nouislider-wrapper">
                  <div id="keypress" data-toggle="nouislider" data-start="[20, 80]" data-connect="true" data-direction="rtl" data-tooltips="true" data-range='{ "min": [0], "10%": [10, 10], "50%": [80, 50], "80%": 150, "max": 200 }'></div>
                </div><!-- grid row -->
                <div class="form-row">
                  <!-- grid column -->
                  <div class="col">
                    <input type="text" id="input-with-keypress-1" class="form-control">
                  </div><!-- /grid column -->
                  <!-- grid column -->
                  <div class="col">
                    <input type="text" id="input-with-keypress-0" class="form-control">
                  </div><!-- /grid column -->
                </div><!-- /grid row -->
              </div><!-- /.card-body -->
            </div><!-- /.card -->
          </div><!-- /.masonry-item -->
          <!-- .masonry-item -->
          <div class="masonry-item col-lg-6">
            <!-- .card -->
            <div class="card card-fluid">
              <!-- .card-body -->
              <div class="card-body">
                <h3 class="card-title"> Skipping steps </h3>
                <p> Notice how <code>40</code> and <code>80</code> can't be selected on the slider. </p>
                <div class="nouislider-wrapper">
                  <div id="skipstep" data-toggle="nouislider" data-range='{ "min": 0, "10%": 10, "20%": 20, "30%": 30, "50%": 50, "60%": 60, "70%": 70, "90%": 90, "max": 100 }' data-snap="true" data-start='[20, 90]'></div>
                </div><span id="skip-value-lower" class="badge badge-secondary"></span> <span id="skip-value-upper" class="badge badge-secondary"></span>
              </div><!-- /.card-body -->
            </div><!-- /.card -->
          </div><!-- /.masonry-item -->
          <!-- .masonry-item -->
          <div class="masonry-item col-lg-6">
            <!-- .card -->
            <div class="card card-fluid">
              <!-- .card-body -->
              <div class="card-body">
                <h3 class="card-title"> Huge numbers </h3>
                <p> If you are working with arbitrarily large numbers, you should <strong>not use these directly in noUiSlider</strong>, as you'll run into some JavaScript limitations. Instead, you should <strong>map</strong> your values to an <code>array</code>. </p>
                <div class="nouislider-wrapper">
                  <div id="slider-huge" data-toggle="nouislider" data-start="4" data-step="1" data-connect='[true, false]' data-format-wnumb='{ "decimals": 0 }' data-range='{ "min": 0, "max": 13 }'></div>
                </div>
                <div id="huge-value" class="help-block"></div>
              </div><!-- /.card-body -->
            </div><!-- /.card -->
          </div><!-- /.masonry-item -->
          <!-- .masonry-item -->
          <div class="masonry-item col-lg-6">
            <!-- .card -->
            <div class="card card-fluid">
              <!-- .card-body -->
              <div class="card-body">
                <h3 class="card-title"> Adding keyboard support </h3>
                <p> Much like the keypress example, handles can be made keyboard-focusable. </p>
                <div class="form-group">
                  <input class="form-control" placeholder="Hit tab to focus on the handle.">
                </div>
                <div class="nouislider-wrapper">
                  <div id="keyboard" data-toggle="nouislider" data-start="10" data-step="10" data-range='{ "min": 0, "max": 100 }'></div>
                </div>
              </div><!-- /.card-body -->
            </div><!-- /.card -->
          </div><!-- /.masonry-item -->
          <!-- .masonry-item -->
          <div class="masonry-item col-lg-6">
            <!-- .card -->
            <div class="card card-fluid">
              <!-- .card-body -->
              <div class="card-body">
                <h3 class="card-title"> Working with dates </h3>
                <div class="nouislider-wrapper">
                  <!-- we use getTime() fn to get range and start values -->
                  <div id="slider-date" data-toggle="nouislider" data-range='{ "min": 1262304000000, "max": 1451606400000 }' data-step="604800000" data-start='[1293840000000, 1420070400000]' data-format-wnumb='{ "decimals": 0 }'></div>
                </div><span class="badge badge-info" id="event-start"></span> <span class="badge badge-info" id="event-end"></span>
              </div><!-- /.card-body -->
            </div><!-- /.card -->
          </div><!-- /.masonry-item -->
          <!-- .masonry-item -->
          <div class="masonry-item col-lg-6">
            <!-- .card -->
            <div class="card card-fluid">
              <!-- .card-body -->
              <div class="card-body">
                <h3 class="card-title"> Soft limits </h3>
                <div class="nouislider-wrapper mb-5">
                  <div id="slider-soft" data-toggle="nouislider" data-start="50" data-range='{ "min": 0, "max": 100 }' data-pips='{ "mode": "values", "values": [20, 80], "density": 4 }'></div>
                </div>
              </div><!-- /.card-body -->
            </div><!-- /.card -->
          </div><!-- /.masonry-item -->
        </div><!-- /.masonry-layout -->
      </div><!-- /.page-section -->
    </div><!-- /.page-inner -->
  </div><!-- /.page -->
</div><!-- .app-footer -->
<?php 
layoutBottom([
    "public/vendor/bootstrap-select/js/bootstrap-select.min.js",
    "public/vendor/masonry-layout/masonry.pkgd.min.js",
    "public/vendor/flatpickr/flatpickr.min.js",
    "public/vendor/flatpickr/plugins/monthSelect/index.js",
    "public/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js",
    "public/vendor/nouislider/wNumb.js",
    "public/vendor/nouislider/nouislider.min.js",
    "public/vendor/blueimp-file-upload/js/vendor/jquery.ui.widget.min.js",
    "public/vendor/blueimp-load-image/load-image.all.min.js",
    "public/vendor/blueimp-canvas-to-blob/canvas-to-blob.min.js",
    "public/vendor/blueimp-file-upload/js/jquery.iframe-transport.min.js",
    "public/vendor/blueimp-file-upload/js/jquery.fileupload.min.js",
    "public/vendor/blueimp-file-upload/js/jquery.fileupload-process.min.js",
    "public/vendor/blueimp-file-upload/js/jquery.fileupload-image.min.js",
    "public/vendor/blueimp-file-upload/js/jquery.fileupload-audio.min.js",
    "public/vendor/blueimp-file-upload/js/jquery.fileupload-video.min.js",
    "public/vendor/blueimp-file-upload/js/jquery.fileupload-validate.min.js",
    "public/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js",
    "public/js/pages/colorpicker-demo.js",
    "public/js/pages/uploader-demo.js",
    "public/js/pages/slider-demo.js"
]);
?>
