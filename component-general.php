<?php
include_once 'layout/base.php';
layoutTop('General Elements', [
  "assets/vendor/toastr/toastr.min.css"
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
        <h1 class="page-title"> General Elements </h1>
      </header><!-- /.page-title-bar -->
      <!-- .page-section -->
      <div class="page-section">
        <!-- .section-block -->
        <div class="section-block">
          <h2 class="section-title"> Buttons </h2>
          <p class="text-muted"> Use custom button styles for actions in forms, dialogs, and more with support for multiple sizes, states, and more. </p>
        </div><!-- /.section-block -->
        <!-- .card-deck-xl -->
        <div class="card-deck-xl">
          <!-- .card -->
          <div class="card card-fluid">
            <!-- .card-body -->
            <div class="card-body">
              <!-- example block -->
              <div class="el-example">
                <button type="button" class="btn btn-primary">Button</button> <button type="button" class="btn btn-secondary">Button</button> <button type="button" class="btn btn-success">Button</button> <button type="button" class="btn btn-info">Button</button> <button type="button" class="btn btn-warning">Button</button> <button type="button" class="btn btn-danger">Button</button> <button type="button" class="btn btn-light">Button</button> <button type="button" class="btn btn-dark">Button</button> <button type="button" class="btn btn-link">Button</button>
              </div><!-- /example block -->
            </div><!-- /.card-body -->
            <!-- .card-body -->
            <div class="card-body border-top">
              <!-- example block -->
              <div class="el-example">
                <button type="button" class="btn btn-primary disabled">Disabled</button> <button type="button" class="btn btn-secondary disabled">Disabled</button> <button type="button" class="btn btn-success disabled">Disabled</button> <button type="button" class="btn btn-info disabled">Disabled</button> <button type="button" class="btn btn-warning disabled">Disabled</button> <button type="button" class="btn btn-danger disabled">Disabled</button> <button type="button" class="btn btn-light disabled">Disabled</button> <button type="button" class="btn btn-dark disabled">Disabled</button> <button type="button" class="btn btn-link disabled">Disabled</button>
              </div><!-- /example block -->
            </div><!-- /.card-body -->
            <!-- .card-body -->
            <div class="card-body border-top">
              <!-- example block -->
              <div class="el-example">
                <button type="button" class="btn btn-outline-primary">Outline</button> <button type="button" class="btn btn-outline-secondary">Outline</button> <button type="button" class="btn btn-outline-success">Outline</button> <button type="button" class="btn btn-outline-info">Outline</button> <button type="button" class="btn btn-outline-warning">Outline</button> <button type="button" class="btn btn-outline-danger">Outline</button> <button type="button" class="btn btn-outline-light">Outline</button> <button type="button" class="btn btn-outline-dark">Outline</button>
              </div><!-- /example block -->
            </div><!-- /.card-body -->
            <!-- .card-body -->
            <div class="card-body border-top">
              <!-- example block -->
              <div class="el-example">
                <button type="button" class="btn btn-subtle-primary">Subtle</button> <button type="button" class="btn btn-subtle-secondary">Subtle</button> <button type="button" class="btn btn-subtle-success">Subtle</button> <button type="button" class="btn btn-subtle-info">Subtle</button> <button type="button" class="btn btn-subtle-warning">Subtle</button> <button type="button" class="btn btn-subtle-danger">Subtle</button> <button type="button" class="btn btn-subtle-light">Subtle</button> <button type="button" class="btn btn-subtle-dark">Subtle</button>
              </div><!-- /example block -->
            </div><!-- /.card-body -->
            <!-- .card-body -->
            <div class="card-body border-top">
              <!-- example block -->
              <div class="el-example">
                <!-- .btn-group -->
                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                  <button type="button" class="btn btn-primary">Nesting</button>
                  <div class="btn-group" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                      <div class="dropdown-arrow"></div><a class="dropdown-item" href="#">Profile</a> <a class="dropdown-item" href="#">Logout</a>
                    </div>
                  </div>
                </div><!-- /.btn-group -->
                <!-- .btn-group -->
                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                  <button type="button" class="btn btn-success">Nesting</button>
                  <div class="btn-group" role="group">
                    <button id="btnGroupDrop2" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop2">
                      <div class="dropdown-arrow"></div><a class="dropdown-item" href="#">Profile</a> <a class="dropdown-item" href="#">Logout</a>
                    </div>
                  </div>
                </div><!-- /.btn-group -->
                <!-- .btn-group -->
                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                  <button type="button" class="btn btn-info">Nesting</button>
                  <div class="btn-group" role="group">
                    <button id="btnGroupDrop3" type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop3">
                      <div class="dropdown-arrow"></div><a class="dropdown-item" href="#">Profile</a> <a class="dropdown-item" href="#">Logout</a>
                    </div>
                  </div>
                </div><!-- /.btn-group -->
                <!-- .btn-group -->
                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                  <button type="button" class="btn btn-danger">Nesting</button>
                  <div class="btn-group" role="group">
                    <button id="btnGroupDrop4" type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop4">
                      <div class="dropdown-arrow"></div><a class="dropdown-item" href="#">Profile</a> <a class="dropdown-item" href="#">Logout</a>
                    </div>
                  </div>
                </div><!-- /.btn-group -->
              </div><!-- /example block -->
            </div><!-- /.card-body -->
          </div><!-- /.card -->
          <!-- .card -->
          <div class="card card-fluid">
            <!-- .card-body -->
            <div class="card-body">
              <!-- example block -->
              <div class="el-example">
                <button type="button" class="btn btn-secondary btn-lg">Large</button> <button type="button" class="btn btn-secondary">Default</button> <button type="button" class="btn btn-secondary btn-sm">Small</button> <button type="button" class="btn btn-secondary btn-xs">XSmall</button>
              </div><!-- /example block -->
            </div><!-- /.card-body -->
            <!-- .card-body -->
            <div class="card-body border-top">
              <!-- button checkbox -->
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-secondary active"><input type="checkbox" checked> Active</label> <label class="btn btn-secondary"><input type="checkbox"> Check</label> <label class="btn btn-secondary"><input type="checkbox"> Check</label>
              </div><!-- /button checkbox -->
            </div><!-- /.card-body -->
            <!-- .card-body -->
            <div class="card-body border-top">
              <!-- button radio -->
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-secondary active"><input type="radio" name="options" id="option1" checked> Active</label> <label class="btn btn-secondary"><input type="radio" name="options" id="option2"> Radio</label> <label class="btn btn-secondary"><input type="radio" name="options" id="option3"> Radio</label>
              </div><!-- /button radio -->
            </div><!-- /.card-body -->
            <!-- .card-body -->
            <div class="card-body border-top">
              <div class="btn-group-vertical" data-toggle="buttons">
                <button type="button" class="btn btn-secondary">Group vertical</button>
                <div class="btn-group dropright" role="group">
                  <button id="btnGroupVerticalDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">Group vertical</button>
                  <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
                    <div class="dropdown-arrow"></div><a class="dropdown-item" href="#">Profile</a> <a class="dropdown-item" href="#">Logout</a>
                  </div>
                </div><button type="button" class="btn btn-secondary">Group vertical</button> <button type="button" class="btn btn-secondary">Group vertical</button>
              </div>
            </div><!-- /.card-body -->
            <!-- .card-body -->
            <div class="card-body border-top">
              <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-secondary">Left</button> <button type="button" class="btn btn-secondary">Middle</button> <button type="button" class="btn btn-secondary">Right</button>
              </div>
            </div><!-- /.card-body -->
            <!-- .card-body -->
            <div class="card-body border-top">
              <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group mr-2" role="group" aria-label="First group">
                  <button type="button" class="btn btn-secondary">1</button> <button type="button" class="btn btn-secondary">2</button> <button type="button" class="btn btn-secondary">3</button>
                </div>
                <div class="btn-group mr-2" role="group" aria-label="Second group">
                  <button type="button" class="btn btn-secondary">4</button> <button type="button" class="btn btn-secondary">5</button>
                </div>
                <div class="btn-group" role="group" aria-label="Third group">
                  <button type="button" class="btn btn-secondary">6</button>
                </div>
              </div>
            </div><!-- /.card-body -->
            <!-- .card-body -->
            <div class="card-body border-top">
              <button type="button" class="btn btn-primary btn-lg btn-block">Block level button</button>
            </div><!-- /.card-body -->
          </div><!-- /.card -->
        </div><!-- /.card-deck-xl -->
        <hr class="my-5">
        <!-- .section-block -->
        <div class="section-block">
          <h2 class="section-title"> Dialogs </h2>
          <p class="text-muted"> Display a content in a layer above the App (like alert, helper text, etc) with Modal, Tooltips, and Popovers. </p>
        </div><!-- /.section-block -->
        <!-- .card-deck-xl -->
        <div class="card-deck-xl">
          <!-- .card -->
          <div class="card card-fluid">
            <div class="card-header"> Tooltips & Popovers </div><!-- .card-body -->
            <div class="card-body">
              <p class="text-muted"> Hover on buttons below to see tooltips. </p>
              <div class="el-example">
                <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Tooltip on top">Tooltip on top</button> <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="right" title="Tooltip on right">Tooltip on right</button> <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom">Tooltip on bottom</button> <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="left" title="Tooltip on left">Tooltip on left</button> <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-html="true" title="&lt;em&gt;Tooltip&lt;/em&gt; &lt;u&gt;with&lt;/u&gt; &lt;b&gt;HTML&lt;/b&gt;">Tooltip with HTML</button>
              </div>
            </div><!-- /.card-body -->
            <!-- .card-body -->
            <div class="card-body border-top">
              <p class="text-muted"> Click buttons below to see Popover. </p>
              <div class="el-example">
                <button type="button" class="btn btn-secondary" data-container="body" data-toggle="popover" data-placement="left" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." title="Popover Title">Popover Left</button> <button type="button" class="btn btn-secondary" data-container="body" data-toggle="popover" data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." title="Popover Title">Popover Top</button> <button type="button" class="btn btn-secondary" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." title="Popover Title">Popover Bottom</button> <button type="button" class="btn btn-secondary" data-container="body" data-toggle="popover" data-placement="right" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." title="Popover Title">Popover Right</button>
              </div>
            </div><!-- /.card-body -->
          </div><!-- /.card -->
          <!-- .card -->
          <div class="card card-fluid">
            <div class="card-header"> Modals & Toastr </div><!-- .card-body -->
            <div class="card-body">
              <div class="el-example">
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal">Open: normal</button> <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalLg">Open: large</button> <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalSm">Open: small</button> <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalCenter">Open: center</button> <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalLong">Open: long</button> <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalScrollable">Open: scrollable</button>
              </div><!-- Normal modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <!-- .modal-dialog -->
                <div class="modal-dialog" role="document">
                  <!-- .modal-content -->
                  <div class="modal-content">
                    <!-- .modal-header -->
                    <div class="modal-header">
                      <h5 id="exampleModalLabel" class="modal-title"> Modal title </h5>
                    </div><!-- /.modal-header -->
                    <!-- .modal-body -->
                    <div class="modal-body">
                      <p> Laudantium praesentium similique natus consequuntur, quae amet, sequi non velit placeat distinctio excepturi tempore quos expedita veritatis at corporis beatae maiores iste. </p>
                      <p> Omnis velit praesentium, incidunt voluptatibus voluptatem iure corporis minima error ipsum itaque magnam vero laborum molestiae vel. Saepe modi atque, iure dolores nulla dolor quia, eius libero ullam dicta explicabo! </p>
                    </div><!-- /.modal-body -->
                    <!-- .modal-footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Click Me</button> <button type="button" class="btn btn-light">Secondary Action</button>
                    </div><!-- /.modal-footer -->
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
              <!-- Large modal -->
              <div id="exampleModalLg" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <!-- .modal-dialog -->
                <div class="modal-dialog modal-lg" role="document">
                  <!-- .modal-content -->
                  <div class="modal-content">
                    <!-- .modal-header -->
                    <div class="modal-header">
                      <h5 id="myLargeModalLabel" class="modal-title"> Modal title </h5>
                    </div><!-- /.modal-header -->
                    <!-- .modal-body -->
                    <div class="modal-body">
                      <p> Officiis asperiores consectetur in, aspernatur, voluptate velit ut libero quo eius veritatis incidunt, fugit voluptatibus ullam voluptates error earum unde illo! Aliquid. </p>
                      <p> Explicabo, fugiat sapiente aliquam? Perspiciatis, harum ratione veritatis. Fuga velit eos quos numquam impedit, unde reiciendis asperiores sunt repellat distinctio, totam, veritatis mollitia. Id iusto repudiandae ad, architecto assumenda blanditiis. </p>
                    </div><!-- /.modal-body -->
                    <!-- .modal-footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Click Me</button> <button type="button" class="btn btn-light">Secondary Action</button>
                    </div><!-- /.modal-footer -->
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
              <!-- Small modal -->
              <!-- .modal -->
              <div id="exampleModalSm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <!-- .modal-dialog -->
                <div class="modal-dialog modal-sm" role="document">
                  <!-- .modal-content -->
                  <div class="modal-content">
                    <!-- .modal-header -->
                    <div class="modal-header">
                      <h5 id="mySmallModalLabel" class="modal-title"> Modal title </h5>
                    </div><!-- /.modal-header -->
                    <!-- .modal-body -->
                    <div class="modal-body">
                      <p> Quis cum doloremque, ab culpa fugit deserunt necessitatibus! Eos saepe impedit, facilis veritatis, incidunt fuga optio sint, officiis molestias earum deserunt quas! </p>
                      <p> Modi vel nihil doloribus tempore amet. Facilis vel, cupiditate incidunt illo amet pariatur tenetur quam commodi neque, mollitia laboriosam aperiam fugiat, ratione. Ratione rem nobis temporibus facilis exercitationem porro? Obcaecati. </p>
                    </div><!-- /.modal-body -->
                    <!-- .modal-footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    </div><!-- /.modal-footer -->
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
              <!-- Normal modal -->
              <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterLabel" aria-hidden="true">
                <!-- .modal-dialog -->
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <!-- .modal-content -->
                  <div class="modal-content">
                    <!-- .modal-header -->
                    <div class="modal-header">
                      <h5 id="exampleModalCenterLabel" class="modal-title"> Modal title </h5>
                    </div><!-- /.modal-header -->
                    <!-- .modal-body -->
                    <div class="modal-body">
                      <p> Laudantium praesentium similique natus consequuntur, quae amet, sequi non velit placeat distinctio excepturi tempore quos expedita veritatis at corporis beatae maiores iste. </p>
                      <p> Omnis velit praesentium, incidunt voluptatibus voluptatem iure corporis minima error ipsum itaque magnam vero laborum molestiae vel. Saepe modi atque, iure dolores nulla dolor quia, eius libero ullam dicta explicabo! </p>
                    </div><!-- /.modal-body -->
                    <!-- .modal-footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Click Me</button> <button type="button" class="btn btn-light">Secondary Action</button>
                    </div><!-- /.modal-footer -->
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
              <!-- Normal modal -->
              <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongLabel" aria-hidden="true">
                <!-- .modal-dialog -->
                <div class="modal-dialog" role="document">
                  <!-- .modal-content -->
                  <div class="modal-content">
                    <!-- .modal-header -->
                    <div class="modal-header">
                      <h5 id="exampleModalLongLabel" class="modal-title"> Modal title </h5>
                    </div><!-- /.modal-header -->
                    <!-- .modal-body -->
                    <div class="modal-body">
                      <p> Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. </p>
                      <p> Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. </p>
                      <p> Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla. </p>
                      <p> Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. </p>
                      <p> Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. </p>
                      <p> Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla. </p>
                      <p> Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. </p>
                      <p> Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. </p>
                      <p> Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla. </p>
                      <p> Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. </p>
                      <p> Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. </p>
                      <p> Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla. </p>
                      <p> Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. </p>
                      <p> Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. </p>
                      <p> Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla. </p>
                      <p> Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. </p>
                      <p> Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. </p>
                      <p> Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla. </p>
                    </div><!-- /.modal-body -->
                    <!-- .modal-footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Click Me</button> <button type="button" class="btn btn-light">Secondary Action</button>
                    </div><!-- /.modal-footer -->
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
              <!-- Normal modal -->
              <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableLabel" aria-hidden="true">
                <!-- .modal-dialog -->
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                  <!-- .modal-content -->
                  <div class="modal-content">
                    <!-- .modal-header -->
                    <div class="modal-header">
                      <h5 id="exampleModalScrollableLabel" class="modal-title"> Modal title </h5>
                    </div><!-- /.modal-header -->
                    <!-- .modal-body -->
                    <div class="modal-body">
                      <p> Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. </p>
                      <p> Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. </p>
                      <p> Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla. </p>
                      <p> Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. </p>
                      <p> Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. </p>
                      <p> Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla. </p>
                      <p> Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. </p>
                      <p> Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. </p>
                      <p> Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla. </p>
                      <p> Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. </p>
                      <p> Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. </p>
                      <p> Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla. </p>
                      <p> Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. </p>
                      <p> Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. </p>
                      <p> Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla. </p>
                      <p> Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. </p>
                      <p> Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. </p>
                      <p> Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla. </p>
                    </div><!-- /.modal-body -->
                    <!-- .modal-footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Click Me</button> <button type="button" class="btn btn-light">Secondary Action</button>
                    </div><!-- /.modal-footer -->
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
            </div><!-- /.card-body -->
            <!-- .card-body -->
            <div class="card-body border-top">
              <div class="el-example">
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalAlert">Open: alert</button> <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalAlertWarning">Open: warning</button> <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalAlertDanger">Open: danger</button>
              </div><!-- Alert Modal -->
              <div class="modal modal-alert fade" id="exampleModalAlert" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalAlertLabel" aria-hidden="true">
                <!-- .modal-dialog -->
                <div class="modal-dialog" role="document">
                  <!-- .modal-content -->
                  <div class="modal-content">
                    <!-- .modal-header -->
                    <div class="modal-header">
                      <h5 id="exampleModalAlertLabel" class="modal-title">
                        <i class="fa fa-trophy text-success mr-1"></i> Congrats! You Unlock New Feature.
                      </h5>
                    </div><!-- /.modal-header -->
                    <!-- .modal-body -->
                    <div class="modal-body">
                      <p> Eligendi rem, pariatur saepe! Sunt, nulla, esse eligendi culpa doloremque non maxime! </p>
                    </div><!-- /.modal-body -->
                    <!-- .modal-footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    </div><!-- /.modal-footer -->
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
              <!-- Alert Warning Modal -->
              <div class="modal modal-alert fade" id="exampleModalAlertWarning" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalAlertWarningLabel" aria-hidden="true">
                <!-- .modal-dialog -->
                <div class="modal-dialog" role="document">
                  <!-- .modal-content -->
                  <div class="modal-content">
                    <!-- .modal-header -->
                    <div class="modal-header">
                      <h5 id="exampleModalAlertWarningLabel" class="modal-title">
                        <i class="fa fa-bullhorn text-warning mr-1"></i> Modal: warning
                      </h5>
                    </div><!-- /.modal-header -->
                    <!-- .modal-body -->
                    <div class="modal-body">
                      <p> Eligendi rem, pariatur saepe! Sunt, nulla, esse eligendi culpa doloremque non maxime! </p>
                    </div><!-- /.modal-body -->
                    <!-- .modal-footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button> <button type="button" class="btn btn-light">Secondary Action</button>
                    </div><!-- /.modal-footer -->
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
              <!-- Alert Danger Modal -->
              <div class="modal modal-alert fade" id="exampleModalAlertDanger" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalAlertDangerLabel" aria-hidden="true">
                <!-- .modal-dialog -->
                <div class="modal-dialog" role="document">
                  <!-- .modal-content -->
                  <div class="modal-content">
                    <!-- .modal-header -->
                    <div class="modal-header">
                      <h5 id="exampleModalAlertDangerLabel" class="modal-title">
                        <i class="fa fa-exclamation-triangle text-red mr-1"></i> Alert: danger
                      </h5>
                    </div><!-- /.modal-header -->
                    <!-- .modal-body -->
                    <div class="modal-body">
                      <p> Eligendi rem, pariatur saepe! Sunt, nulla, esse eligendi culpa doloremque non maxime! </p>
                    </div><!-- /.modal-body -->
                    <!-- .modal-footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    </div><!-- /.modal-footer -->
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
            </div><!-- /.card-body -->
            <!-- .card-body -->
            <div class="card-body border-top">
              <div class="el-example">
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalDrawerRight">Drawer: right</button> <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalDrawerLeft">Drawer: left</button> <button type="button" class="btn btn-lg btn-primary btn-floated" data-toggle="modal" data-target="#exampleModalDocked" data-backdrop="false"><i class="fas fa-comment fa-lg"></i></button>
              </div><!-- Modal Drawer Right -->
              <div class="modal modal-drawer fade" id="exampleModalDrawerRight" tabindex="-1" role="dialog" aria-labelledby="exampleModalDrawerRightLabel" aria-hidden="true">
                <!-- .modal-dialog -->
                <div class="modal-dialog modal-drawer-right" role="document">
                  <!-- .modal-content -->
                  <div class="modal-content">
                    <!-- .modal-header -->
                    <div class="modal-header">
                      <h5 id="exampleModalDrawerRightLabel" class="modal-title"> Drawer: right </h5>
                    </div><!-- /.modal-header -->
                    <!-- .modal-body -->
                    <div class="modal-body">
                      <p> Eligendi rem, pariatur saepe! Sunt, nulla, esse eligendi culpa doloremque non maxime! </p>
                    </div><!-- /.modal-body -->
                    <!-- .modal-footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    </div><!-- /.modal-footer -->
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
              <!-- Modal Drawer Left -->
              <div class="modal modal-drawer fade" id="exampleModalDrawerLeft" tabindex="-1" role="dialog" aria-labelledby="exampleModalDrawerLeftLabel" aria-hidden="true">
                <!-- .modal-dialog -->
                <div class="modal-dialog modal-drawer-left modal-sm" role="document">
                  <!-- .modal-content -->
                  <div class="modal-content">
                    <!-- .modal-header -->
                    <div class="modal-header">
                      <h5 id="exampleModalDrawerLeftLabel" class="modal-title"> Drawer: left </h5>
                    </div><!-- /.modal-header -->
                    <!-- .modal-body -->
                    <div class="modal-body">
                      <p> Eligendi rem, pariatur saepe! Sunt, nulla, esse eligendi culpa doloremque non maxime! </p>
                    </div><!-- /.modal-body -->
                    <!-- .modal-footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    </div><!-- /.modal-footer -->
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
              <!-- Modal Docked -->
              <div class="modal modal-docked fade" id="exampleModalDocked" tabindex="-1" role="dialog" aria-labelledby="exampleModalDockedLabel" aria-hidden="true">
                <!-- .modal-dialog -->
                <div class="modal-dialog modal-sm modal-dialog-scrollable" role="document">
                  <!-- .modal-content -->
                  <div class="modal-content">
                    <!-- .modal-header -->
                    <div class="modal-header bg-primary text-white">
                      <div class="d-block">
                        <p id="exampleModalDockedLabel"> Hi 👋! I'm a Modal Docked </p>
                        <p class="text-center px-3"> You can use .modal-{lg,sm} class to in/decrease my size an put any type of content in my body. </p>
                      </div>
                    </div><!-- /.modal-header -->
                    <!-- .modal-body -->
                    <div class="modal-body py-3">
                      <!-- .form-group -->
                      <div class="form-group">
                        <div class="form-label-group">
                          <input type="text" id="cname" class="form-control" placeholder="Name" required=""> <label for="cname">Name</label>
                        </div>
                      </div><!-- /.form-group -->
                      <!-- .form-group -->
                      <div class="form-group">
                        <div class="form-label-group">
                          <input type="email" id="cmail" class="form-control" placeholder="Email address" required=""> <label for="cmail">Email Address</label>
                        </div>
                      </div><!-- /.form-group -->
                      <button type="button" class="btn btn-lg btn-block btn-primary">Lets Chat</button> <button type="button" class="btn btn-lg btn-block btn-link" data-dismiss="modal" aria-label="Close">Close</button>
                    </div><!-- /.modal-body -->
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
            </div><!-- /.card-body -->
            <!-- .card-body -->
            <!-- Deprecated – will remove on the next release -->
            <!-- use native toastr bootstrap component instead -->
            <div class="card-body border-top">
              <button type="button" class="btn btn-secondary" onclick="$('#toast1').toast('show')">Try Bootstrap Toast</button> <button type="button" id="toastr-demo" class="btn btn-secondary">Try Toastr 3rd party</button> <!-- toasts container -->
              <div aria-live="polite" aria-atomic="true">
                <!-- Position it -->
                <div style="position: fixed; top: 4.5rem; right: 1rem; z-index: 1050">
                  <!-- .toast -->
                  <div id="toast1" class="toast fade hide" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
                    <div class="toast-header">
                      <img class="rounded mr-2" src="assets/images/avatars/bootstrap.svg" alt="" width="20"> <strong class="mr-auto">Toast</strong> <small>11 mins ago</small> <!-- enable button below if you want to use data-autohide="false" -->
                      <!-- <button type="button" class="ml-2 mb-1 close text-dark" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button> -->
                    </div>
                    <div class="toast-body">
                      <p> Hello, world! This is a toast message. </p>
                    </div>
                  </div><!-- /.toast -->
                </div>
              </div><!-- /toasts container -->
            </div><!-- /.card-body -->
          </div><!-- /.card -->
        </div><!-- /.card-deck-xl -->
        <hr class="my-5">
        <!-- .section-block -->
        <div class="section-block">
          <h2 class="section-title"> Indicators </h2>
          <p class="text-muted"> Provide contextual feedback messages for typical user actions and labeling components. </p>
        </div><!-- /.section-block -->
        <!-- Alerts -->
        <div class="section-block">
          <div class="alert alert-secondary has-icon alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <div class="alert-icon">
              <span class="oi oi-flag"></span>
            </div>
            <h4 class="alert-heading"> Warning! </h4>
            <p class="mb-0"> Best check yo self, you're not looking too good. Nulla vitae elit libero, a pharetra augue. Praesent commodo cursus magna, <a href="#" class="alert-link">vel scelerisque nisl consectetur et</a>. </p>
          </div><!-- grid row -->
          <div class="row">
            <!-- grid column -->
            <div class="col-lg-4">
              <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">×</button> <strong>Oh snap!</strong> <a href="#" class="alert-link">Change a few things up</a> and try submitting again.
              </div>
            </div><!-- /grid column -->
            <!-- grid column -->
            <div class="col-lg-4">
              <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">×</button> <strong>Well done!</strong> You successfully read <a href="#" class="alert-link">this important alert message</a>.
              </div>
            </div><!-- /grid column -->
            <!-- grid column -->
            <div class="col-lg-4">
              <div class="alert alert-info alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">×</button> <strong>Heads up!</strong> This <a href="#" class="alert-link">alert needs your attention</a>, but it's not super important.
              </div>
            </div><!-- /grid column -->
            <!-- grid column -->
            <div class="col-lg-4">
              <div class="alert alert-primary has-icon" role="alert">
                <div class="alert-icon">
                  <span class="oi oi-info"></span>
                </div>This is a primary alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like.
              </div>
            </div><!-- /grid column -->
            <!-- grid column -->
            <div class="col-lg-4">
              <div class="alert alert-warning has-icon" role="alert">
                <div class="alert-icon">
                  <span class="fa fa-bullhorn"></span>
                </div>This is a warning alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like.
              </div>
            </div><!-- /grid column -->
            <!-- grid column -->
            <div class="col-lg-4">
              <div class="alert alert-dark has-icon" role="alert">
                <div class="alert-icon">
                  <span class="oi oi-bell"></span>
                </div>This is a dark alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like.
              </div>
            </div><!-- /grid column -->
          </div><!-- /grid row -->
        </div><!-- /Alerts -->
        <!-- .log-divider -->
        <div class="log-divider">
          <span class="bg-light"><i class="fa fa-fw fa-comment-alt"></i> This is a log divider</span>
        </div><!-- /.log-divider -->
        <!-- Badges & Mention -->
        <div class="section-block">
          <!-- grid row -->
          <div class="row">
            <!-- grid column -->
            <div class="col-lg-6">
              <p>
                <span class="badge badge-primary">Primary</span> <span class="badge badge-secondary">Secondary</span> <span class="badge badge-success">Success</span> <span class="badge badge-danger">Danger</span> <span class="badge badge-warning">Warning</span> <span class="badge badge-info">Info</span> <span class="badge badge-light">Light</span> <span class="badge badge-dark">Dark</span>
              </p>
              <p>
                <span class="badge badge-subtle badge-primary">Primary</span> <span class="badge badge-subtle badge-secondary">Secondary</span> <span class="badge badge-subtle badge-success">Success</span> <span class="badge badge-subtle badge-danger">Danger</span> <span class="badge badge-subtle badge-warning">Warning</span> <span class="badge badge-subtle badge-info">Info</span> <span class="badge badge-subtle badge-light">Light</span> <span class="badge badge-subtle badge-dark">Dark</span>
              </p>
            </div><!-- /grid column -->
            <!-- grid column -->
            <div class="col-lg-6">
              <p>
                <span class="badge badge-pill badge-primary">Primary</span> <span class="badge badge-pill badge-secondary">Secondary</span> <span class="badge badge-pill badge-success">Success</span> <span class="badge badge-pill badge-danger">Danger</span> <span class="badge badge-pill badge-warning">Warning</span> <span class="badge badge-pill badge-info">Info</span> <span class="badge badge-pill badge-light">Light</span> <span class="badge badge-pill badge-dark">Dark</span>
              </p>
              <p>
                <span class="badge badge-lg badge-danger"><span class="oi oi-media-record pulse mr-1"></span>Live View</span>
              </p>
            </div><!-- /grid column -->
          </div><!-- /grid row -->
          <p>
            <a href="#" class="mention">@mention</a>
          </p>
        </div><!-- /Badges & Mention -->
        <hr class="my-5">
        <!-- .section-block -->
        <div class="section-block">
          <h2 class="section-title"> Progress </h2>
          <p class="text-muted"> Provide up-to-date feedback on the progress of a workflow or action with simple yet flexible progress bars. </p>
        </div><!-- /.section-block -->
        <!-- .section-block -->
        <div class="section-block">
          <!-- grid row -->
          <div class="row">
            <!-- grid column -->
            <div class="col-lg-6">
              <!-- Contextual Alternative -->
              <h3 class="section-title"> Contextual </h3>
              <div class="progress mb-3">
                <div class="progress-bar" role="progressbar" style="width: 10%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <div class="progress mb-3">
                <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <div class="progress mb-3">
                <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <div class="progress mb-3">
                <div class="progress-bar bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <div class="progress mb-4">
                <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div><!-- /grid column -->
            <!-- grid column -->
            <div class="col-lg-6">
              <!-- Striped -->
              <h3 class="section-title"> Striped </h3>
              <div class="progress mb-3">
                <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <div class="progress mb-3">
                <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <div class="progress mb-3">
                <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <div class="progress mb-3">
                <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <div class="progress mb-4">
                <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div><!-- /grid column -->
            <!-- grid column -->
            <div class="col-lg-6">
              <!-- Multiple bars -->
              <h3 class="section-title"> Multiple bars </h3>
              <div class="progress mb-4">
                <div class="progress-bar bg-success" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                <div class="progress-bar bg-info" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div><!-- /grid column -->
            <!-- grid column -->
            <div class="col-lg-6">
              <!-- Animated -->
              <h3 class="section-title"> Animated </h3>
              <div class="progress mb-4">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
              </div>
            </div><!-- /grid column -->
            <!-- grid column -->
            <div class="col-lg-6">
              <!-- Sizing -->
              <h3 class="section-title"> Sizing </h3>
              <div class="progress progress-lg mb-3">
                <div class="progress-bar" role="progressbar" style="width: 10%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"> 10% </div>
              </div>
              <div class="progress mb-3">
                <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"> 25% </div>
              </div>
              <div class="progress progress-sm mb-3">
                <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <div class="progress progress-xs mb-3">
                <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div><!-- /grid column -->
          </div><!-- /grid row -->
        </div><!-- /.section-block -->
        <hr class="my-5">
        <!-- .section-block -->
        <div class="section-block">
          <h2 class="section-title"> Spinners </h2>
          <p class="text-muted"> Indicate the loading state of a component or page. </p>
        </div><!-- /.section-block -->
        <!-- .section-block -->
        <div class="section-block">
          <!-- grid row -->
          <div class="row">
            <!-- grid column -->
            <div class="col-lg-6">
              <!-- Contextual Alternative -->
              <h3 class="section-title"> Border spinner </h3>
              <div class="spinner-border text-primary" role="status">
                <span class="sr-only">Loading...</span>
              </div>
              <div class="spinner-border text-secondary" role="status">
                <span class="sr-only">Loading...</span>
              </div>
              <div class="spinner-border text-success" role="status">
                <span class="sr-only">Loading...</span>
              </div>
              <div class="spinner-border text-danger" role="status">
                <span class="sr-only">Loading...</span>
              </div>
              <div class="spinner-border text-warning" role="status">
                <span class="sr-only">Loading...</span>
              </div>
              <div class="spinner-border text-info" role="status">
                <span class="sr-only">Loading...</span>
              </div>
              <div class="spinner-border text-muted" role="status">
                <span class="sr-only">Loading...</span>
              </div>
              <div class="spinner-border text-dark" role="status">
                <span class="sr-only">Loading...</span>
              </div>
            </div><!-- /grid column -->
            <!-- grid column -->
            <div class="col-lg-6">
              <!-- Growing spinner -->
              <h3 class="section-title"> Growing spinner </h3>
              <div class="spinner-grow text-primary" role="status">
                <span class="sr-only">Loading...</span>
              </div>
              <div class="spinner-grow text-secondary" role="status">
                <span class="sr-only">Loading...</span>
              </div>
              <div class="spinner-grow text-success" role="status">
                <span class="sr-only">Loading...</span>
              </div>
              <div class="spinner-grow text-danger" role="status">
                <span class="sr-only">Loading...</span>
              </div>
              <div class="spinner-grow text-warning" role="status">
                <span class="sr-only">Loading...</span>
              </div>
              <div class="spinner-grow text-info" role="status">
                <span class="sr-only">Loading...</span>
              </div>
              <div class="spinner-grow text-muted" role="status">
                <span class="sr-only">Loading...</span>
              </div>
              <div class="spinner-grow text-dark" role="status">
                <span class="sr-only">Loading...</span>
              </div>
            </div><!-- /grid column -->
          </div><!-- /grid row -->
          <h3 class="section-title mt-3"> Sizing </h3>
          <div class="row">
            <div class="col-lg-6">
              <div class="spinner-border text-primary spinner-border-sm" role="status">
                <span class="sr-only">Loading...</span>
              </div>
              <div class="spinner-grow text-primary spinner-grow-sm" role="status">
                <span class="sr-only">Loading...</span>
              </div>
              <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
              </div>
              <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
              </div>
            </div>
            <div class="col-lg-6">
              <button class="btn btn-primary" type="button" disabled><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <span class="sr-only">Loading...</span></button> <button class="btn btn-primary" type="button" disabled><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...</button> <button class="btn btn-primary" type="button" disabled><span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> <span class="sr-only">Loading...</span></button> <button class="btn btn-primary" type="button" disabled><span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> Loading...</button>
            </div>
          </div>
        </div><!-- /.section-block -->
        <hr class="my-5">
        <!-- .section-block -->
        <div class="section-block">
          <h2 class="section-title"> Navs </h2>
          <p class="text-muted"> The base <code>.nav</code> component does not include any <code>.active</code> state. The following examples include the class, mainly to demonstrate that this particular class does not trigger any special styling. </p>
        </div><!-- /.section-block -->
        <!-- .card-deck-xl -->
        <div class="card-deck-xl">
          <!-- .card -->
          <div class="card card-fluid">
            <!-- .card-header -->
            <div class="card-header">
              <!-- .nav-tabs -->
              <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                  <a class="nav-link active show" data-toggle="tab" href="#home">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#profile">Profile</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link" data-toggle="dropdown" href="#" role="button">Dropdown <span class="caret"></span></a>
                  <div class="dropdown-menu">
                    <div class="dropdown-arrow"></div><a class="dropdown-item" href="#">Action</a> <a class="dropdown-item" href="#">Another action</a> <a class="dropdown-item" href="#">Something else here</a>
                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Separated link</a>
                  </div>
                </li>
              </ul><!-- /.nav-tabs -->
            </div><!-- /.card-header -->
            <!-- .card-body -->
            <div class="card-body">
              <!-- .tab-content -->
              <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active show" id="home">
                  <p> Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui. </p>
                </div>
                <div class="tab-pane fade" id="profile">
                  <p> Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. </p>
                </div>
              </div><!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div><!-- /.card -->
          <!-- .card -->
          <div class="card card-fluid">
            <!-- .card-body -->
            <div class="card-body">
              <!-- .nav-pills -->
              <ul class="nav nav-pills">
                <li class="nav-item">
                  <a class="nav-link active" href="#">Active</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link" data-toggle="dropdown" href="#" role="button">Dropdown <span class="caret"></span></a>
                  <div class="dropdown-menu">
                    <div class="dropdown-arrow"></div><a class="dropdown-item" href="#">Action</a> <a class="dropdown-item" href="#">Another action</a> <a class="dropdown-item" href="#">Something else here</a>
                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Separated link</a>
                  </div>
                </li>
              </ul><!-- /.nav-pills -->
            </div><!-- /.card-body -->
            <!-- .card-body -->
            <div class="card-body">
              <!-- .nav-pills -->
              <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                  <a class="nav-link active" href="#">Active</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link" data-toggle="dropdown" href="#" role="button">Dropdown <span class="caret"></span></a>
                  <div class="dropdown-menu">
                    <div class="dropdown-arrow"></div><a class="dropdown-item" href="#">Action</a> <a class="dropdown-item" href="#">Another action</a> <a class="dropdown-item" href="#">Something else here</a>
                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Separated link</a>
                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link disabled" href="#">Disabled</a>
                </li>
              </ul><!-- /.nav-pills -->
            </div><!-- /.card-body -->
          </div><!-- /.card -->
        </div><!-- /.card-deck-xl -->
        <!-- Breadcrumbs & Paginations -->
        <!-- .card-deck-xl -->
        <div class="card-deck-xl">
          <!-- .card -->
          <div class="card card-fluid">
            <!-- .card-body -->
            <div class="card-body">
              <h4 class="card-title"> Breadcrumbs </h4>
              <hr>
              <ol class="breadcrumb">
                <li class="breadcrumb-item active">Home </li>
              </ol>
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="#">Home</a>
                </li>
                <li class="breadcrumb-item active">Library </li>
              </ol>
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="#">Home</a>
                </li>
                <li class="breadcrumb-item">
                  <a href="#">Library</a>
                </li>
                <li class="breadcrumb-item active">Data </li>
              </ol>
            </div><!-- /.card-body -->
          </div><!-- /.card -->
          <!-- .card -->
          <div class="card card-fluid">
            <!-- .card-body -->
            <div class="card-body">
              <h4 class="card-title"> Paginations </h4>
              <hr>
              <div class="el-example">
                <ul class="pagination">
                  <li class="page-item disabled">
                    <a class="page-link" href="#">«</a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">3</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">4</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">5</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">»</a>
                  </li>
                </ul>
              </div>
              <div class="el-example">
                <ul class="pagination pagination-sm">
                  <li class="page-item disabled">
                    <a class="page-link" href="#">«</a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">3</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">4</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">5</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">»</a>
                  </li>
                </ul>
              </div>
            </div><!-- /.card-body -->
          </div><!-- /.card -->
        </div><!-- /.card-deck-xl -->
        <hr class="my-5">
        <!-- .section-block -->
        <div class="section-block">
          <h2 class="section-title"> Navbars </h2>
          <p class="text-muted"> Navbars are responsive meta components that serve as navigation headers for your application or site. They begin collapsed (and are toggleable) and become horizontal as the available viewport width increases. </p>
        </div><!-- /.section-block -->
        <!-- .card -->
        <div class="card card-fluid">
          <!-- .card-body -->
          <div class="card-body">
            <!-- .navbar -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
              <a class="navbar-brand" href="#">Looper</a> <!-- toggle menu -->
              <button class="hamburger hamburger hamburger-squeeze hamburger-toggle d-lg-none" type="button" data-toggle="collapse" data-target="#navbarColor1" aria-controls="navbarColor1" aria-expanded="false" aria-label="Toggle navigation"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button> <!-- /toggle menu -->
              <!-- .navbar-collapse -->
              <div class="collapse navbar-collapse" id="navbarColor1">
                <!-- .navbar-nav -->
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                  </li>
                </ul><!-- /.navbar-nav -->
                <!-- .navbar-form -->
                <form class="form-inline my-2 my-lg-0">
                  <!-- .top-bar-search -->
                  <div class="top-bar-search d-flex">
                    <!-- .input-group -->
                    <div class="input-group has-clearable">
                      <button type="button" class="close" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span></button>
                      <div class="input-group-prepend">
                        <span class="input-group-text"><span class="oi oi-magnifying-glass"></span></span>
                      </div><input type="text" class="form-control" aria-label="Search" placeholder="Type something...">
                    </div><!-- /.input-group -->
                    <!-- /.top-bar-search -->
                  </div><!-- /.top-bar-search -->
                </form><!-- /.navbar-form -->
              </div><!-- /.navbar-collapse -->
            </nav><!-- /.navbar -->
            <!-- .navbar -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-3">
              <a class="navbar-brand" href="#">Looper</a> <!-- toggle menu -->
              <button class="hamburger hamburger hamburger-squeeze hamburger-toggle d-lg-none" type="button" data-toggle="collapse" data-target="#navbarColor2" aria-controls="navbarColor2" aria-expanded="false" aria-label="Toggle navigation"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button> <!-- /toggle menu -->
              <!-- .navbar-collapse -->
              <div class="collapse navbar-collapse" id="navbarColor2">
                <!-- .navbar-nav -->
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                  </li>
                </ul><!-- /.navbar-nav -->
                <!-- .navbar-form -->
                <form class="form-inline my-2 my-lg-0">
                  <!-- .top-bar-search -->
                  <div class="top-bar-search d-flex">
                    <!-- .input-group -->
                    <div class="input-group has-clearable">
                      <button type="button" class="close" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span></button>
                      <div class="input-group-prepend">
                        <span class="input-group-text"><span class="oi oi-magnifying-glass"></span></span>
                      </div><input type="text" class="form-control" aria-label="Search" placeholder="Type something...">
                    </div><!-- /.input-group -->
                    <!-- /.top-bar-search -->
                  </div><!-- /.top-bar-search -->
                </form><!-- /.navbar-form -->
              </div><!-- /.navbar-collapse -->
            </nav><!-- /.navbar -->
            <!-- .navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
              <a class="navbar-brand" href="#">Looper</a> <!-- toggle menu -->
              <button class="hamburger hamburger-light hamburger-squeeze hamburger-toggle d-lg-none" type="button" data-toggle="collapse" data-target="#navbarColor3" aria-controls="navbarColor3" aria-expanded="false" aria-label="Toggle navigation"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button> <!-- /toggle menu -->
              <!-- .navbar-collapse -->
              <div class="collapse navbar-collapse" id="navbarColor3">
                <!-- .navbar-nav -->
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                  </li>
                </ul><!-- /.navbar-nav -->
                <!-- .navbar-form -->
                <form class="form-inline my-2 my-lg-0">
                  <!-- .top-bar-search -->
                  <div class="top-bar-search d-flex">
                    <!-- .input-group -->
                    <div class="input-group has-clearable">
                      <button type="button" class="close" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span></button>
                      <div class="input-group-prepend">
                        <span class="input-group-text"><span class="oi oi-magnifying-glass"></span></span>
                      </div><input type="text" class="form-control" aria-label="Search" placeholder="Type something...">
                    </div><!-- /.input-group -->
                    <!-- /.top-bar-search -->
                  </div><!-- /.top-bar-search -->
                </form><!-- /.navbar-form -->
              </div><!-- /.navbar-collapse -->
            </nav><!-- /.navbar -->
          </div><!-- /.card-body -->
        </div><!-- /.card -->
        <hr class="my-5">
        <!-- .section-block -->
        <div class="section-block">
          <h2 class="section-title"> Containers </h2>
        </div><!-- /.section-block -->
        <!-- .jumbotron -->
        <div class="jumbotron">
          <h1 class="display-1"> Hello, world! </h1>
          <p class="lead"> This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information. </p>
          <hr class="my-4">
          <p> It uses utility classes for typography and spacing to space content out within the larger container. </p>
          <p class="lead">
            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
          </p>
        </div><!-- /.jumbotron -->
        <!-- .section-block -->
        <div class="section-block">
          <h2 class="section-title"> Cards </h2>
          <p class="text-muted"> Provide a flexible and extensible content container with multiple variants and options. </p><!-- grid row -->
          <div class="row">
            <!-- grid column -->
            <div class="col-lg-6">
              <!-- .card -->
              <div class="card">
                <!-- .card-header -->
                <div class="card-header"> Components </div><!-- .card-body -->
                <div class="card-body">
                  <h5 class="card-title"> Special title treatment </h5>
                  <h6 class="card-subtitle text-muted"> Support card subtitle </h6>
                </div><!-- /.card-body -->
                <!-- 16:9 aspect ratio -->
                <figure class="embed-responsive embed-responsive-16by9 mb-0">
                  <img class="embed-responsive-item" src="assets/images/dummy/img-1.jpg" alt="Card image">
                </figure><!-- /.embed-responsive -->
                <!-- .card-body -->
                <div class="card-body">
                  <p class="card-text"> Blanditiis architecto quaerat fugit sit ab veritatis ipsam assumenda doloremque repellendus expedita. <a href="#" class="mention">@stilearningTwit</a> . <a href="#" class="hashtag">#looper</a> <a href="#" class="hashtag">#admin</a><br>
                    <time datetime="2018-02-12">Feb 12, 2018 at 08:19pm</time>
                  </p>
                </div><!-- /.card-body -->
                <!-- .card-footer -->
                <div class="card-footer">
                  <div class="card-footer-content text-muted"> Card Footer </div>
                </div><!-- /.card-footer -->
              </div><!-- /.card -->
            </div><!-- /grid column -->
            <!-- grid column -->
            <div class="col-lg-6">
              <!-- .card -->
              <div class="card">
                <!-- .card-header -->
                <div class="card-header">
                  <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#card-home">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active show" data-toggle="tab" href="#card-profile">Profile</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link disabled" href="#">Disabled</a>
                    </li>
                  </ul>
                </div><!-- /.card-header -->
                <!-- .card-body -->
                <div class="card-body">
                  <!-- .tab-content -->
                  <div id="myTabCard" class="tab-content">
                    <div class="tab-pane fade" id="card-home">
                      <h5 class="card-title"> Special title treatment </h5>
                      <p class="card-text"> With supporting text below as a natural lead-in to additional content. </p><a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                    <div class="tab-pane fade active show" id="card-profile">
                      <h5 class="card-title"> Special title treatment </h5>
                      <p class="card-text"> With supporting text below as a natural lead-in to additional content. </p><a href="#" class="btn btn-danger">Go somewhere</a>
                    </div>
                  </div><!-- /.tab-content -->
                </div><!-- /.card-body -->
              </div><!-- /.card -->
              <!-- .card -->
              <div class="card">
                <!-- .card-body -->
                <div class="card-body">
                  <h4 class="card-title"> Special title treatment </h4>
                  <h6 class="card-subtitle mb-2 text-muted"> Support card subtitle </h6>
                  <p class="card-text"> Blanditiis architecto quaerat fugit sit ab veritatis ipsam assumenda doloremque repellendus expedita. <a href="#" class="mention">@stilearningTwit</a> . <a href="#" class="hashtag">#looper</a> <a href="#" class="hashtag">#admin</a><br>
                    <time datetime="2018-02-12">Feb 12, 2018 at 08:19pm</time>
                  </p>
                </div><!-- /.card-body -->
                <!-- .list-group -->
                <ul class="list-group list-group-flush list-group-bordered border-top border-bottom">
                  <li class="list-group-item">Cras justo odio </li>
                  <li class="list-group-item">Dapibus ac facilisis in </li>
                  <li class="list-group-item">Vestibulum at eros </li>
                </ul><!-- /.list-group -->
                <!-- .card-body -->
                <div class="card-body">
                  <a href="#" class="card-link">Card link</a> <a href="#" class="card-link">Another link</a>
                </div><!-- /.card-body -->
              </div><!-- /.card -->
            </div><!-- /grid column -->
          </div><!-- /grid row -->
          <!-- grid row -->
          <div class="row">
            <!-- grid column -->
            <div class="col-lg-4">
              <!-- .card -->
              <div class="card">
                <div class="card-header"> Components </div><!-- .card-body -->
                <div class="card-body">
                  <p class="card-text"> Blanditiis architecto quaerat fugit sit ab veritatis ipsam assumenda doloremque repellendus expedita. <a href="#" class="mention">@stilearningTwit</a> . <a href="#" class="hashtag">#looper</a> <a href="#" class="hashtag">#admin</a><br>
                    <time datetime="2018-02-12">Feb 12, 2018 at 08:19pm</time>
                  </p>
                </div><!-- /.card-body -->
                <!-- .card-footer -->
                <div class="card-footer">
                  <a href="#" class="card-footer-item card-footer-item-bordered">Save</a> <a href="#" class="card-footer-item card-footer-item-bordered">Edit</a> <a href="#" class="card-footer-item card-footer-item-bordered">Delete</a>
                </div><!-- /.card-footer -->
              </div><!-- /.card -->
            </div><!-- /grid column -->
            <!-- grid column -->
            <div class="col-lg-4">
              <!-- .card -->
              <div class="card card-inverse bg-primary">
                <div class="card-header"> Components </div><!-- .card-body -->
                <div class="card-body">
                  <p class="card-text"> Blanditiis architecto quaerat fugit sit ab veritatis ipsam assumenda doloremque repellendus expedita. <a href="#" class="mention card-link">@stilearningTwit</a> . <a href="#" class="hashtag card-link">#looper</a> <a href="#" class="hashtag card-link">#admin</a><br>
                    <time datetime="2018-02-12">Feb 12, 2018 at 08:19pm</time>
                  </p>
                </div><!-- /.card-body -->
                <!-- .card-footer -->
                <div class="card-footer">
                  <a href="#" class="card-footer-item card-footer-item-bordered card-link">Save</a> <a href="#" class="card-footer-item card-footer-item-bordered card-link">Edit</a> <a href="#" class="card-footer-item card-footer-item-bordered card-link">Delete</a>
                </div><!-- /.card-footer -->
              </div><!-- /.card -->
            </div><!-- /grid column -->
            <!-- grid column -->
            <div class="col-lg-4">
              <!-- .card -->
              <div class="card bg-secondary">
                <div class="card-header"> Components </div><!-- .card-body -->
                <div class="card-body">
                  <p class="card-text"> Blanditiis architecto quaerat fugit sit ab veritatis ipsam assumenda doloremque repellendus expedita. <a href="#" class="mention">@stilearningTwit</a> . <a href="#" class="hashtag">#looper</a> <a href="#" class="hashtag">#admin</a><br>
                    <time datetime="2018-02-12">Feb 12, 2018 at 08:19pm</time>
                  </p>
                </div><!-- /.card-body -->
                <!-- .card-footer -->
                <div class="card-footer">
                  <a href="#" class="card-footer-item card-footer-item-bordered">Save</a> <a href="#" class="card-footer-item card-footer-item-bordered">Edit</a> <a href="#" class="card-footer-item card-footer-item-bordered">Delete</a>
                </div><!-- /.card-footer -->
              </div><!-- /.card -->
            </div><!-- /grid column -->
            <!-- grid column -->
            <div class="col-lg-4">
              <!-- .card -->
              <div class="card card-inverse bg-success">
                <div class="card-header"> Components </div><!-- .card-body -->
                <div class="card-body">
                  <p class="card-text"> Blanditiis architecto quaerat fugit sit ab veritatis ipsam assumenda doloremque repellendus expedita. <a href="#" class="mention card-link">@stilearningTwit</a> . <a href="#" class="hashtag card-link">#looper</a> <a href="#" class="hashtag card-link">#admin</a><br>
                    <time datetime="2018-02-12">Feb 12, 2018 at 08:19pm</time>
                  </p>
                </div><!-- /.card-body -->
                <!-- .card-footer -->
                <div class="card-footer">
                  <a href="#" class="card-footer-item card-footer-item-bordered card-link">Save</a> <a href="#" class="card-footer-item card-footer-item-bordered card-link">Edit</a> <a href="#" class="card-footer-item card-footer-item-bordered card-link">Delete</a>
                </div><!-- /.card-footer -->
              </div><!-- /.card -->
            </div><!-- /grid column -->
            <!-- grid column -->
            <div class="col-lg-4">
              <!-- .card -->
              <div class="card card-inverse bg-danger">
                <div class="card-header"> Components </div><!-- .card-body -->
                <div class="card-body">
                  <p class="card-text"> Blanditiis architecto quaerat fugit sit ab veritatis ipsam assumenda doloremque repellendus expedita. <a href="#" class="mention card-link">@stilearningTwit</a> . <a href="#" class="hashtag card-link">#looper</a> <a href="#" class="hashtag card-link">#admin</a><br>
                    <time datetime="2018-02-12">Feb 12, 2018 at 08:19pm</time>
                  </p>
                </div><!-- /.card-body -->
                <!-- .card-footer -->
                <div class="card-footer">
                  <a href="#" class="card-footer-item card-footer-item-bordered card-link">Save</a> <a href="#" class="card-footer-item card-footer-item-bordered card-link">Edit</a> <a href="#" class="card-footer-item card-footer-item-bordered card-link">Delete</a>
                </div><!-- /.card-footer -->
              </div><!-- /.card -->
            </div><!-- /grid column -->
            <!-- grid column -->
            <div class="col-lg-4">
              <!-- .card -->
              <div class="card text-black bg-warning">
                <div class="card-header"> Components </div><!-- .card-body -->
                <div class="card-body">
                  <p class="card-text"> Blanditiis architecto quaerat fugit sit ab veritatis ipsam assumenda doloremque repellendus expedita. <a href="#" class="mention">@stilearningTwit</a> . <a href="#" class="hashtag">#looper</a> <a href="#" class="hashtag">#admin</a><br>
                    <time datetime="2018-02-12">Feb 12, 2018 at 08:19pm</time>
                  </p>
                </div><!-- /.card-body -->
                <!-- .card-footer -->
                <div class="card-footer">
                  <a href="#" class="card-footer-item card-footer-item-bordered">Save</a> <a href="#" class="card-footer-item card-footer-item-bordered">Edit</a> <a href="#" class="card-footer-item card-footer-item-bordered">Delete</a>
                </div><!-- /.card-footer -->
              </div><!-- /.card -->
            </div><!-- /grid column -->
            <!-- grid column -->
            <div class="col-lg-4">
              <!-- .card -->
              <div class="card card-inverse bg-info">
                <div class="card-header"> Components </div><!-- .card-body -->
                <div class="card-body">
                  <p class="card-text"> Blanditiis architecto quaerat fugit sit ab veritatis ipsam assumenda doloremque repellendus expedita. <a href="#" class="mention card-link">@stilearningTwit</a> . <a href="#" class="hashtag card-link">#looper</a> <a href="#" class="hashtag card-link">#admin</a><br>
                    <time datetime="2018-02-12">Feb 12, 2018 at 08:19pm</time>
                  </p>
                </div><!-- /.card-body -->
                <!-- .card-footer -->
                <div class="card-footer">
                  <a href="#" class="card-footer-item card-footer-item-bordered card-link">Save</a> <a href="#" class="card-footer-item card-footer-item-bordered card-link">Edit</a> <a href="#" class="card-footer-item card-footer-item-bordered card-link">Delete</a>
                </div><!-- /.card-footer -->
              </div><!-- /.card -->
            </div><!-- /grid column -->
            <!-- grid column -->
            <div class="col-lg-4">
              <!-- .card -->
              <div class="card text-dark bg-light">
                <div class="card-header"> Components </div><!-- .card-body -->
                <div class="card-body">
                  <p class="card-text"> Blanditiis architecto quaerat fugit sit ab veritatis ipsam assumenda doloremque repellendus expedita. <a href="#" class="mention">@stilearningTwit</a> . <a href="#" class="hashtag">#looper</a> <a href="#" class="hashtag">#admin</a><br>
                    <time datetime="2018-02-12">Feb 12, 2018 at 08:19pm</time>
                  </p>
                </div><!-- /.card-body -->
                <!-- .card-footer -->
                <div class="card-footer">
                  <a href="#" class="card-footer-item card-footer-item-bordered">Save</a> <a href="#" class="card-footer-item card-footer-item-bordered">Edit</a> <a href="#" class="card-footer-item card-footer-item-bordered">Delete</a>
                </div><!-- /.card-footer -->
              </div><!-- /.card -->
            </div><!-- /grid column -->
            <!-- grid column -->
            <div class="col-lg-4">
              <!-- .card -->
              <div class="card text-light bg-dark">
                <div class="card-header"> Components </div><!-- .card-body -->
                <div class="card-body">
                  <p class="card-text"> Blanditiis architecto quaerat fugit sit ab veritatis ipsam assumenda doloremque repellendus expedita. <a href="#" class="mention">@stilearningTwit</a> . <a href="#" class="hashtag">#looper</a> <a href="#" class="hashtag">#admin</a><br>
                    <time datetime="2018-02-12">Feb 12, 2018 at 08:19pm</time>
                  </p>
                </div><!-- /.card-body -->
                <!-- .card-footer -->
                <div class="card-footer">
                  <a href="#" class="card-footer-item card-footer-item-bordered">Save</a> <a href="#" class="card-footer-item card-footer-item-bordered">Edit</a> <a href="#" class="card-footer-item card-footer-item-bordered">Delete</a>
                </div><!-- /.card-footer -->
              </div><!-- /.card -->
            </div><!-- /grid column -->
          </div><!-- /grid row -->
        </div><!-- /.section-block -->
        <!-- .section-block -->
        <div class="section-block">
          <h2 class="section-title"> Expansion Cards </h2>
          <p class="text-muted"> A lightweight container that may either stand alone or be connected to a larger surface, such as a card. </p><!-- grid row -->
          <div class="row">
            <!-- grid column -->
            <div class="col-lg-6">
              <!-- #accordion -->
              <div id="accordion" class="card-expansion">
                <!-- .card -->
                <div class="card card-expansion-item expanded">
                  <div class="card-header border-0" id="headingOne">
                    <button class="btn btn-reset" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><span class="collapse-indicator mr-2"><i class="fa fa-fw fa-caret-right"></i></span> <span>Expandable Item #1</span></button>
                  </div>
                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body pt-0"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </div>
                  </div>
                </div><!-- /.card -->
                <!-- .card -->
                <div class="card card-expansion-item">
                  <div class="card-header border-0" id="headingTwo">
                    <button class="btn btn-reset collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><span class="collapse-indicator mr-2"><i class="fa fa-fw fa-caret-right"></i></span> <span>Expandable Item #2</span></button>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body pt-0"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </div>
                  </div>
                </div><!-- /.card -->
                <!-- .card -->
                <div class="card card-expansion-item">
                  <div class="card-header border-0" id="headingThree">
                    <button class="btn btn-reset collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><span class="collapse-indicator mr-2"><i class="fa fa-fw fa-caret-right"></i></span> <span>Expandable Item #3</span></button>
                  </div>
                  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                    <div class="card-body pt-0"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </div>
                  </div>
                </div><!-- /.card -->
              </div><!-- /#accordion -->
            </div><!-- /grid column -->
            <!-- grid column -->
            <div class="col-lg-6">
              <!-- #accordion2 -->
              <div id="accordion2" class="card-expansion">
                <!-- .card -->
                <div class="card card-expansion-item expanded">
                  <div class="card-header border-0" id="headingOne2">
                    <button class="btn btn-reset d-flex justify-content-between w-100" data-toggle="collapse" data-target="#collapseOne2" aria-expanded="true" aria-controls="collapseOne2"><span>Expandable Item #1</span> <span class="collapse-indicator"><i class="fa fa-fw fa-chevron-down"></i></span></button>
                  </div>
                  <div id="collapseOne2" class="collapse show" aria-labelledby="headingOne2" data-parent="#accordion2">
                    <div class="card-body pt-0"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </div>
                  </div>
                </div><!-- /.card -->
                <!-- .card -->
                <div class="card card-expansion-item">
                  <div class="card-header border-0" id="headingTwo2">
                    <button class="btn btn-reset d-flex justify-content-between w-100 collapsed" data-toggle="collapse" data-target="#collapseTwo2" aria-expanded="false" aria-controls="collapseTwo2"><span>Expandable Item #2</span> <span class="collapse-indicator"><i class="fa fa-fw fa-chevron-down"></i></span></button>
                  </div>
                  <div id="collapseTwo2" class="collapse" aria-labelledby="headingTwo2" data-parent="#accordion2">
                    <div class="card-body pt-0"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </div>
                  </div>
                </div><!-- /.card -->
                <!-- .card -->
                <div class="card card-expansion-item">
                  <div class="card-header border-0" id="headingThree2">
                    <button class="btn btn-reset d-flex justify-content-between w-100 collapsed" data-toggle="collapse" data-target="#collapseThree2" aria-expanded="false" aria-controls="collapseThree2"><span>Expandable Item #3</span> <span class="collapse-indicator"><i class="fa fa-fw fa-chevron-down"></i></span></button>
                  </div>
                  <div id="collapseThree2" class="collapse" aria-labelledby="headingThree2" data-parent="#accordion2">
                    <div class="card-body pt-0"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </div>
                  </div>
                </div><!-- /.card -->
              </div><!-- /#accordion2 -->
            </div><!-- /grid column -->
          </div><!-- /grid row -->
        </div><!-- /.section-block -->
        <hr class="my-5">
        <!-- .section-block -->
        <div class="section-block">
          <h2 class="section-title"> Text Element </h2>
        </div><!-- /.section-block -->
        <!-- .card -->
        <div class="card card-fluid">
          <div class="card-body p-sm-5">
            <h1> Hello World </h1>
            <p> Lorem ipsum<sup><a>[1]</a></sup> dolor sit amet, consectetur adipiscing elit. Nulla accumsan, metus ultrices eleifend gravida, nulla nunc varius lectus, nec rutrum justo nibh eu lectus. Ut vulputate semper dui. Fusce erat odio, sollicitudin vel erat vel, interdum mattis neque. Sub<sub>script</sub> works as well! </p>
            <h2> Second level </h2>
            <p> Curabitur accumsan turpis pharetra <strong>augue tincidunt</strong> blandit. Quisque condimentum maximus mi, sit amet commodo arcu rutrum id. Proin pretium urna vel cursus venenatis. Suspendisse potenti. Etiam mattis sem rhoncus lacus dapibus facilisis. Donec at dignissim dui. Ut et neque nisl. </p>
            <ul>
              <li>In fermentum leo eu lectus mollis, quis dictum mi aliquet. </li>
              <li>Morbi eu nulla lobortis, lobortis est in, fringilla felis. </li>
              <li>Aliquam nec felis in sapien venenatis viverra fermentum nec lectus. </li>
              <li>Ut non enim metus. </li>
            </ul>
            <h3> Third level </h3>
            <p> Quisque ante lacus, malesuada ac auctor vitae, congue <a href="#">non ante</a>. Phasellus lacus ex, semper ac tortor nec, fringilla condimentum orci. Fusce eu rutrum tellus. </p>
            <ol>
              <li>Donec blandit a lorem id convallis. </li>
              <li>Cras gravida arcu at diam gravida gravida. </li>
              <li>Integer in volutpat libero. </li>
              <li>Donec a diam tellus. </li>
              <li>Aenean nec tortor orci. </li>
              <li>Quisque aliquam cursus urna, non bibendum massa viverra eget. </li>
              <li>Vivamus maximus ultricies pulvinar. </li>
            </ol>
            <blockquote>
              <p class="mb-0"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante. </p>
              <footer> Someone famous in <cite title="Source Title">Source Title</cite>
              </footer>
            </blockquote>
            <p> Quisque at semper enim, eu hendrerit odio. Etiam auctor nisl et <em>justo sodales</em> elementum. Maecenas ultrices lacus quis neque consectetur, et lobortis nisi molestie. </p>
            <p> Sed sagittis enim ac tortor maximus rutrum. Nulla facilisi. Donec mattis vulputate risus in luctus. Maecenas vestibulum interdum commodo. </p>
            <dl>
              <dt> Web </dt>
              <dd> The part of the Internet that contains websites and web pages </dd>
              <dt> HTML </dt>
              <dd> A markup language for creating web pages </dd>
              <dt> CSS </dt>
              <dd> A technology to make HTML look better </dd>
            </dl>
            <p> Suspendisse egestas sapien non felis placerat elementum. Morbi tortor nisl, suscipit sed mi sit amet, mollis malesuada nulla. Nulla facilisi. Nullam ac erat ante. </p>
            <h4> Fourth level </h4>
            <p> Nulla efficitur eleifend nisi, sit amet bibendum sapien fringilla ac. Mauris euismod metus a tellus laoreet, at elementum ex efficitur. </p>
            <pre>&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;head&gt;
  &lt;title&gt;Hello World&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
  &lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec viverra nec nulla vitae mollis.&lt;/p&gt;
&lt;/body&gt;
&lt;/html&gt;</pre>
            <p> Maecenas eleifend sollicitudin dui, faucibus sollicitudin augue cursus non. Ut finibus eleifend arcu ut vehicula. Mauris eu est maximus est porta condimentum in eu justo. Nulla id iaculis sapien. </p>
            <table class="table">
              <thead>
                <tr>
                  <th> One </th>
                  <th> Two </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td> Three </td>
                  <td> Four </td>
                </tr>
                <tr>
                  <td> Five </td>
                  <td> Six </td>
                </tr>
                <tr>
                  <td> Seven </td>
                  <td> Eight </td>
                </tr>
                <tr>
                  <td> Nine </td>
                  <td> Ten </td>
                </tr>
                <tr>
                  <td> Eleven </td>
                  <td> Twelve </td>
                </tr>
              </tbody>
            </table>
            <p> Phasellus porttitor enim id metus volutpat ultricies. Ut nisi nunc, blandit sed dapibus at, vestibulum in felis. Etiam iaculis lorem ac nibh bibendum rhoncus. Nam interdum efficitur ligula sit amet ullamcorper. Etiam tristique, leo vitae porta faucibus, mi lacus laoreet metus, at cursus leo est vel tellus. Sed ac posuere est. Nunc ultricies nunc neque, vitae ultricies ex sodales quis. Aliquam eu nibh in libero accumsan pulvinar. Nullam nec nisl placerat, pretium metus vel, euismod ipsum. Proin tempor cursus nisl vel condimentum. Nam pharetra varius metus non pellentesque. </p>
            <h5> Fifth level </h5>
            <p> Aliquam sagittis rhoncus vulputate. Cras non luctus sem, sed tincidunt ligula. Vestibulum at nunc elit. Praesent aliquet ligula mi, in luctus elit volutpat porta. Phasellus molestie diam vel nisi sodales, a eleifend augue laoreet. Sed nec eleifend justo. Nam et sollicitudin odio. </p>
            <figure>
              <img src="https://bulma.io/images/placeholders/256x256.png" alt=""> <img src="https://bulma.io/images/placeholders/256x256.png" alt="">
              <figcaption> Figure 1: Some beautiful placeholders </figcaption>
            </figure>
            <h6> Sixth level </h6>
            <blockquote class="text-right">
              <p class="mb-0"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante. </p>
              <footer> Someone famous in <cite title="Source Title">Source Title</cite>
              </footer>
            </blockquote>
            <p> Cras in nibh lacinia, venenatis nisi et, auctor urna. Donec pulvinar lacus sed diam dignissim, ut eleifend eros accumsan. Phasellus non tortor eros. Ut sed rutrum lacus. Etiam purus nunc, scelerisque quis enim vitae, malesuada ultrices turpis. Nunc vitae maximus purus, nec consectetur dui. Suspendisse euismod, elit vel rutrum commodo, ipsum tortor maximus dui, sed varius sapien odio vitae est. Etiam at cursus metus. </p>
          </div>
        </div><!-- /.card -->
      </div><!-- /.page-section -->
    </div><!-- /.page-inner -->
  </div><!-- /.page -->
</div><!-- .app-footer -->
<?php 
layoutBottom([
    "assets/vendor/flatpickr/flatpickr.min.js", 
    "assets/vendor/easy-pie-chart/jquery.easypiechart.min.js"
]);
?>