<?php
require_once '../layout/base.php';
layoutTop('Editors', [
  "public/vendor/summernote/summernote-bs4.css",
  "public/vendor/highlightjs/styles/github.css",
  "public/vendor/katex/katex.min.css",
  "public/vendor/quill/quill.snow.css",
  "public/vendor/simplemde/simplemde.min.css"
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
        <h1 class="page-title"> Editors </h1>
        <p class="text-muted"> Summernote, Quilljs, Simplemde and Ace Editor. </p>
      </header><!-- /.page-title-bar -->
      <!-- .page-section -->
      <div class="page-section">
        <!-- .section-block -->
        <div class="section-block">
          <h3 class="section-title"> Summernote </h3>
          <p class="text-muted"> Super simple WYSIWYG editor that helps you create WYSIWYG editors online. </p>
        </div><!-- /.section-block -->
        <!-- .card -->
        <div class="card card-fluid">
          <!-- #summernote-basic -->
          <div data-toggle="summernote" data-placeholder="Write here..." data-height="200"></div><!-- /#summernote-basic -->
        </div><!-- /.card -->
        <!-- .card -->
        <div class="card card-fluid">
          <div class="card-body">
            <!-- #summernote-airmode -->
            <div data-toggle="summernote" data-air-mode="true">
              <p> This is an Air-mode editable area. </p>
              <ul>
                <li>Select a text to reveal the toolbar. </li>
                <li>Edit rich document on-the-fly, so elastic! </li>
              </ul>
              <p> End of air-mode area </p>
            </div><!-- /#summernote-airmode -->
          </div>
        </div><!-- /.card -->
        <!-- .card -->
        <div class="card card-fluid">
          <!-- #summernote-click2edit -->
          <div id="summernote-click2edit" class="card-body">
            <h5> Hi, </h5>
            <blockquote> We are summernote. </blockquote>
            <p> Click edit button to change me. </p>
            <p class="lead"> Super simple WYSIWYG editor on bootstrap. </p>
          </div><!-- /#summernote-click2edit -->
          <!-- .card-body -->
          <div class="card-body rounded-bottom border-top">
            <button id="summernote-edit" class="btn btn-primary">Edit</button> <button id="summernote-save" class="btn btn-primary d-none">Save Change</button>
          </div><!-- /.card-body -->
        </div><!-- /.card -->
        <hr class="my-5">
        <!-- .section-block -->
        <div class="section-block">
          <h3 class="section-title"> Quilljs </h3>
          <p class="text-muted"> Modern WYSIWYG editor built for compatibility and extensibility. </p>
        </div><!-- /.section-block -->
        <!-- Quill -->
        <div class="card card-fluid">
          <!-- #quillEditor -->
          <div id="quillEditor" data-toggle="quill" data-bounds="#quillEditor" data-placeholder="Compose an epic..." style="height: 475px;">
            <h1> Quill Rich Text Editor </h1>
            <p> Quill is a free, <a href="https://github.com/quilljs/quill/">open source</a> WYSIWYG editor built for the modern web. With its <a href="http://quilljs.com/docs/modules/">modular architecture</a> and expressive <a href="http://quilljs.com/docs/api/">API</a>, it is completely customizable to fit any need. </p><iframe src="https://www.youtube.com/embed/QHH3iSeDBLo?showinfo=0" width="560" height="238" style="border:0" allowfullscreen></iframe>
            <h2> Getting Started is Easy </h2>
            <pre>// &lt;link href="https://cdn.quilljs.com/1.2.4/quill.snow.css" rel="stylesheet"&gt;
// &lt;script src="https://cdn.quilljs.com/1.2.4/quill.min.js" type="text/javascript"&gt;&lt;/script&gt;

var quill = new Quill('#editor', {
  modules: {
    toolbar: '#toolbar'
  },
  theme: 'snow'
});

// Open your browser's developer console to try out the API!
</pre>
            <p>
              <strong>Built with</strong>
            </p>
            <p>
              <span class="ql-formula" data-value="x^2 + (y - \sqrt[3]{x^2})^2 = 1"></span>
            </p>
          </div><!-- /#quillEditor -->
        </div><!-- /Quill -->
        <hr class="my-5">
        <!-- .section-block -->
        <div class="section-block">
          <h3 class="section-title"> Simplemde </h3>
          <p class="text-muted"> A simple, beautiful, and embeddable JavaScript Markdown editor. </p>
        </div><!-- /.section-block -->
        <!-- .card -->
        <div class="card card-fluid">
          <!-- .card-header -->
          <div class="card-header"> Autosaving: true </div><!-- /.card-header -->
          <!-- #simplemde -->
          <textarea data-toggle="simplemde" data-spellchecker="false" data-autosave='{ "enabled": true, "unique_id": "SimpleMDEDemo" }'></textarea> <!-- /#simplemde -->
        </div><!-- /.card -->
        <hr class="my-5">
        <!-- .section-block -->
        <div class="section-block">
          <h3 class="section-title"> Ace Editor </h3>
          <p class="text-muted"> Standalone code editor written in JavaScript. </p>
        </div><!-- /.section-block -->
        <!-- .card -->
        <div class="card card-fluid">
          <!-- .card-header -->
          <div class="card-header"> Simple editor </div><!-- /.card-header -->
          <pre id="aceEditor" style="height:500px;">/**
 * In fact, you're looking at ACE right now. Go ahead and play with it!
 *
 * We are currently showing off the JavaScript mode. ACE has support for 45
 * language modes and 24 color themes!
 */

function add(x, y) {
  var resultString = "Hello, ACE! The result of your math is: ";
  var result = x + y;
  return resultString + result;
}

var addResult = add(3, 2);
console.log(addResult);</pre>
          <div id="statusBar" class="card-footer">
            <div class="ace_statusbar"> Ace on Looper </div>
          </div>
        </div><!-- /.card -->
      </div><!-- /.page-section -->
    </div><!-- /.page-inner -->
  </div><!-- /.page -->
</div><!-- .app-footer -->
<?php 
layoutBottom([
    "public/vendor/summernote/summernote-bs4.min.js",
    "public/vendor/highlightjs/highlight.pack.js",
    "public/vendor/katex/katex.min.js",
    "public/vendor/quill/quill.min.js",
    "public/vendor/simplemde/simplemde.min.js",
    "public/vendor/ace/min/ace.js",
    "public/vendor/ace/min/ext-statusbar.js",
    "public/js/pages/summernote-demo.js",
    "public/js/pages/ace-demo.js"
]);
?>
