<?php
require_once '../layout/base.php';
layoutTop('Input Autocompletes', [
  "public/vendor/select2/css/select2.min.css",
  "public/vendor/tributejs/tribute.css",
  "public/vendor/at.js/css/jquery.atwho.min.css"
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
        <h1 class="page-title"> Autocompletes </h1>
      </header><!-- /.page-title-bar -->
      <!-- .page-section -->
      <div class="page-section">
        <!-- .card-deck-xl -->
        <div class="card-deck-xl">
          <!-- .card -->
          <div class="card card-fluid">
            <!-- .card-body -->
            <div class="card-body">
              <h4 class="card-title"> Select2 </h4>
              <h6 class="card-subtitle mb-4"> A jQuery based replacement for select boxes. </h6><!-- form -->
              <form>
                <!-- .form-group -->
                <div class="form-group">
                  <label class="control-label" for="select2-single">Single select boxes</label> <select id="select2-single" class="form-control" data-toggle="select2" data-placeholder="Select a state" data-allow-clear="true">
                  </select>
                </div><!-- /.form-group -->
                <!-- .form-group -->
                <div class="form-group">
                  <label class="control-label" for="select2-multiple">Multiple select boxes</label> <select id="select2-multiple" class="form-control" data-toggle="select2" data-placeholder="Select a state" data-maximum-selection-length="4" multiple>
                  </select>
                </div><!-- /.form-group -->
                <!-- .form-group -->
                <div class="form-group">
                  <label class="control-label" for="select2-data-array">Loading array data</label> <select id="select2-data-array" class="form-control" data-toggle="select2" data-data='[ {"id": 0, "text": "Visa"}, {"id": 1, "text": "Discover Card"}, {"id": 2, "text": "American Express"}, {"id": 3, "text": "MasterCard"}, {"id": 4, "text": "American Express"} ]' data-minimum-results-for-search="Infinity">
                  </select>
                </div><!-- /.form-group -->
                <!-- .form-group -->
                <div class="form-group">
                  <label class="control-label" for="select2-data-remote">Loading remote data</label> <select id="select2-data-remote" class="form-control">
                  </select>
                </div><!-- /.form-group -->
                <!-- .form-group -->
                <div class="form-group">
                  <!-- .control-label -->
                  <label class="control-label" for="select2-tagging">Tagging support</label> <!-- you can put options directly in data attribute -->
                  <select id="select2-tagging" class="form-control" data-toggle="select2" data-options='{ "tags": ["SandyBrown", "GhostWhite", "LightSalmon", "Bisque", "LightSlateGray", "PaleTurquoise", "MediumVioletRed", "LightSteelBlue", "MidnightBlue", "Peru", "CornflowerBlue", "DimGray", "LightPink", "Lime", "Cornsilk", "Cyan", "DeepPink", "BurlyWood", "LightBlue", "Fuchsia", "LightGoldenRodYellow", "PaleGoldenRod", "DarkSalmon", "Darkorange", "Orange", "FloralWhite", "Ivory", "Pink", "Teal", "Tan", "LightCoral", "ForestGreen", "LimeGreen", "Chocolate", "Linen", "RosyBrown", "DarkTurquoise", "DarkOrchid", "DarkBlue", "Magenta", "SeaGreen", "DarkRed", "DarkSlateGray", "SaddleBrown", "DarkMagenta", "Gray", "Azure", "Black", "DarkKhaki", "Lavender", "Maroon", "Orchid", "DarkSeaGreen", "Gainsboro", "Brown", "Khaki", "MediumSeaGreen", "LightYellow", "Salmon", "MediumTurquoise", "IndianRed", "AntiqueWhite", "SpringGreen", "MistyRose", "DarkOliveGreen", "Thistle", "Violet", "Olive", "Crimson", "BlanchedAlmond", "PowderBlue", "SlateGray", "LawnGreen", "MintCream", "LightGreen", "LightSkyBlue", "Yellow", "Indigo", "HotPink", "WhiteSmoke", "Gold", "BlueViolet", "LavenderBlush", "OliveDrab", "PeachPuff", "OldLace", "GreenYellow", "Navy", "Aquamarine", "DarkSlateBlue", "Purple", "PaleGreen", "SteelBlue", "Blue", "Coral", "PaleVioletRed", "RoyalBlue", "Turquoise", "MediumOrchid", "Green", "Sienna", "DarkGray", "DodgerBlue", "SlateBlue", "LightGray", "DarkGoldenRod", "SkyBlue", "LightSeaGreen", "GoldenRod", "Snow", "YellowGreen", "CadetBlue", "PapayaWhip", "DeepSkyBlue", "LemonChiffon", "DimGrey", "MediumSpringGreen", "HoneyDew", "Plum", "Silver", "MediumBlue", "Aqua", "Chartreuse", "FireBrick", "Beige", "SeaShell", "Wheat", "AliceBlue", "MediumPurple", "OrangeRed", "DarkGreen", "Moccasin", "NavajoWhite", "DarkCyan", "MediumAquaMarine", "Red", "DarkViolet", "LightCyan", "MediumSlateBlue"], "tokenSeparators": [",", " "] }' multiple>
                    <option> White </option>
                    <option selected="selected"> Tomato </option>
                  </select>
                </div><!-- /.form-group -->
                <!-- .form-group -->
                <div class="form-group">
                  <label class="control-label">Single select disable</label> <select class="form-control" data-toggle="select2" data-placeholder="Select a state" disabled>
                  </select>
                </div><!-- /.form-group -->
                <!-- .form-group -->
                <div class="form-group">
                  <label class="control-label">Multiple select disable</label> <select class="form-control" data-toggle="select2" data-placeholder="Select a state" multiple disabled>
                    <option selected="selected"> White </option>
                    <option selected="selected"> Tomato </option>
                  </select>
                </div><!-- /.form-group -->
              </form><!-- /form -->
              <!-- default demo source -->
              <select id="select2-source-states" style="display: none">
                <optgroup label="Alaskan/Hawaiian Time Zone">
                  <option value="AK"> Alaska </option>
                  <option value="HI"> Hawaii </option>
                </optgroup>
                <optgroup label="Pacific Time Zone">
                  <option value="CA"> California </option>
                  <option value="NV"> Nevada </option>
                  <option value="OR"> Oregon </option>
                  <option value="WA"> Washington </option>
                </optgroup>
                <optgroup label="Mountain Time Zone">
                  <option value="AZ"> Arizona </option>
                  <option value="CO"> Colorado </option>
                  <option value="ID"> Idaho </option>
                  <option value="MT"> Montana </option>
                  <option value="NE"> Nebraska </option>
                  <option value="NM"> New Mexico </option>
                  <option value="ND"> North Dakota </option>
                  <option value="UT"> Utah </option>
                  <option value="WY"> Wyoming </option>
                </optgroup>
                <optgroup label="Central Time Zone">
                  <option value="AL"> Alabama </option>
                  <option value="AR"> Arkansas </option>
                  <option value="IL"> Illinois </option>
                  <option value="IA"> Iowa </option>
                  <option value="KS"> Kansas </option>
                  <option value="KY"> Kentucky </option>
                  <option value="LA"> Louisiana </option>
                  <option value="MN"> Minnesota </option>
                  <option value="MS"> Mississippi </option>
                  <option value="MO"> Missouri </option>
                  <option value="OK"> Oklahoma </option>
                  <option value="SD"> South Dakota </option>
                  <option value="TX" disabled="disabled"> Texas </option>
                  <option value="TN"> Tennessee </option>
                  <option value="WI"> Wisconsin </option>
                </optgroup>
                <optgroup label="Eastern Time Zone">
                  <option value="CT"> Connecticut </option>
                  <option value="DE"> Delaware </option>
                  <option value="FL"> Florida </option>
                  <option value="GA"> Georgia </option>
                  <option value="IN"> Indiana </option>
                  <option value="ME"> Maine </option>
                  <option value="MD"> Maryland </option>
                  <option value="MA"> Massachusetts </option>
                  <option value="MI"> Michigan </option>
                  <option value="NH"> New Hampshire </option>
                  <option value="NJ"> New Jersey </option>
                  <option value="NY"> New York </option>
                  <option value="NC" disabled="disabled"> North Carolina </option>
                  <option value="OH"> Ohio </option>
                  <option value="PA"> Pennsylvania </option>
                  <option value="RI"> Rhode Island </option>
                  <option value="SC"> South Carolina </option>
                  <option value="VT"> Vermont </option>
                  <option value="VA"> Virginia </option>
                  <option value="WV"> West Virginia </option>
                </optgroup>
              </select> <!-- /default demo source -->
            </div><!-- /.card-body -->
          </div><!-- /.card -->
          <!-- .card -->
          <div class="card card-fluid">
            <!-- .card-body -->
            <div class="card-body">
              <h4 class="card-title"> Typeahead </h4>
              <h6 class="card-subtitle mb-4"> A fast and fully-featured autocomplete library. </h6><!-- form -->
              <form>
                <!-- .form-group -->
                <div class="form-group">
                  <label class="control-label" for="the-basics">The Basics</label> <input id="the-basics" type="text" class="form-control" placeholder="States of USA">
                </div><!-- /.form-group -->
                <!-- .form-group -->
                <div class="form-group">
                  <label class="control-label" for="bloodhound">Bloodhound <i tabindex="0" class="fa fa-info-circle text-gray" data-toggle="tooltip" data-container="body" title="Suggestion Engine"></i></label> <input id="bloodhound" type="text" class="form-control" placeholder="States of USA">
                </div><!-- /.form-group -->
                <!-- .form-group -->
                <div class="form-group">
                  <label class="control-label" for="prefetch">Prefetch</label> <input id="prefetch" type="text" class="form-control" placeholder="Countries">
                </div><!-- /.form-group -->
                <!-- .form-group -->
                <div class="form-group">
                  <label class="control-label" for="remote">Remote</label> <input id="remote" type="text" class="form-control" placeholder="Oscar winners for Best Picture">
                </div><!-- /.form-group -->
                <!-- .form-group -->
                <div class="form-group">
                  <label class="control-label" for="custom-templates">Custom Templates</label> <input id="custom-templates" type="text" class="form-control" placeholder="Oscar winners for Best Picture">
                </div><!-- /.form-group -->
                <!-- .form-group -->
                <div class="form-group">
                  <label class="control-label" for="default-suggestions">Default Suggestions</label> <input id="default-suggestions" type="text" class="form-control" placeholder="NFL Teams">
                </div><!-- /.form-group -->
                <!-- .form-group -->
                <div class="form-group">
                  <label class="control-label" for="multiple-datasets">Multiple Datasets</label> <input id="multiple-datasets" type="text" class="form-control" placeholder="NBA and NHL teams">
                </div><!-- /.form-group -->
                <!-- .form-group -->
                <div class="form-group has-typeahead-scrollable">
                  <label class="control-label" for="scrollable-dropdown-menu">Scrollable Dropdown Menu</label> <input id="scrollable-dropdown-menu" type="text" class="form-control" placeholder="Countries">
                </div><!-- /.form-group -->
              </form><!-- /form -->
            </div><!-- /.card-body -->
          </div><!-- /.card -->
        </div><!-- /.card-deck-xl -->
        <!-- .card-deck-xl -->
        <div class="card-deck-xl">
          <!-- .card -->
          <div class="card card-fluid">
            <!-- .card-body -->
            <div class="card-body">
              <h4 class="card-title"> Tribute </h4>
              <h6 class="card-subtitle mb-4"> A cross-browser @mention engine. </h6><!-- form -->
              <form>
                <!-- .form-group -->
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Volunteer someone to participate. Start typing with @" autocomplete="off" data-toggle="tribute" data-remote="public/data/tribute.json">
                </div><!-- /.form-group -->
                <!-- .form-group -->
                <div class="form-group">
                  <textarea class="form-control" placeholder="Start typing with @" data-toggle="tribute" data-remote="public/data/tribute.json" data-item-template="true"></textarea>
                </div><!-- /.form-group -->
                <!-- .form-group -->
                <div class="form-group">
                  <div class="border rounded p-3" data-toggle="tribute" data-remote="public/data/tribute.json" data-item-template="true" data-select-template="true">
                    <a href="#" class="mention">@rue74</a> Destroying things is much easier than making them.
                  </div>
                </div><!-- /.form-group -->
              </form><!-- /form -->
            </div><!-- /.card-body -->
          </div><!-- /.card -->
          <!-- .card -->
          <div class="card card-fluid">
            <!-- .card-body -->
            <div class="card-body">
              <h4 class="card-title"> At.js </h4>
              <h6 class="card-subtitle mb-4"> Add Github like mentions autocomplete to your application. </h6><!-- form -->
              <form>
                <!-- .form-group -->
                <div class="form-group">
                  <textarea id="inputor" class="form-control autosize">At.js, a github-like autocomplete library :s</textarea>
                </div><!-- /.form-group -->
                <!-- .form-group -->
                <div class="form-group">
                  <div id="editable" class="border rounded p-3" contenteditable="true">
                    <p>
                      <strong>And!!</strong> it support <strong style="font-size: 20px">ContentEditable</strong> mode too!! <img src="https://assets-cdn.github.com/images/icons/emoji/smile.png" height="20" width="20" alt=""> <img src="https://assets-cdn.github.com/images/icons/emoji/smiley.png" height="20" width="20" alt=""> <img src="https://assets-cdn.github.com/images/icons/emoji/coffee.png" height="20" width="20" alt="">
                    </p>
                    <p> Try here now! <img src="https://assets-cdn.github.com/images/icons/emoji/point_right.png" height="20" width="20" alt=""> <span>emoji :w</span> <span>mention @a</span> <span>issue #</span>
                    </p>
                  </div>
                </div><!-- /.form-group -->
              </form><!-- /form -->
            </div><!-- /.card-body -->
          </div><!-- /.card -->
        </div><!-- /.card-deck-xl -->
        <!-- .card-deck-xl -->
        <div class="card-deck-xl">
          <!-- .card -->
          <div class="card card-fluid">
            <!-- .card-body -->
            <div class="card-body">
              <h4 class="card-title"> Password Strength `meter` </h4>
              <h6 class="card-subtitle mb-4"> Low-Budget Password Strength Estimation. </h6><!-- form -->
              <form>
                <!-- .row -->
                <div class="row mb-3">
                  <label for="maskUsphone" class="col-lg-3 text-lg-right">Password</label>
                  <div class="col-lg-8 col-xl-6">
                    <div class="form-group">
                      <input type="password" id="psm" name="psm" class="form-control form-strength-meter" data-indicator="#psm-indicator" data-indicator-feedback="#psm-feedback">
                    </div>
                    <div class="progress progress-sm mb-1">
                      <div id="psm-indicator" class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div id="psm-feedback" class="text-muted font-italic"></div>
                  </div>
                </div><!-- /.row -->
              </form><!-- /form -->
            </div><!-- /.card-body -->
          </div><!-- /.card -->
        </div><!-- /.card-deck-xl -->
        <!-- .card-deck-xl -->
        <div class="card-deck-xl">
          <!-- .card -->
          <div class="card card-fluid">
            <!-- .card-body -->
            <div class="card-body">
              <h4 class="card-title"> Text Mask </h4>
              <h6 class="card-subtitle mb-4"> It can create input masks for phone, date, currency, zip code, percentage, email, and literally anything! </h6><!-- form -->
              <form>
                <!-- .row -->
                <div class="row mb-3">
                  <label for="maskUsphone" class="col-lg-3 text-lg-right">US Phone</label>
                  <div class="col-lg-8 col-xl-6">
                    <input type="text" id="maskUsphone" name="maskUsphone" class="form-control" autocomplete="off" data-mask="usphone" placeholder="(555) 495-3947">
                  </div>
                </div><!-- /.row -->
                <!-- .row -->
                <div class="row mb-3">
                  <label for="maskUsphonecode" class="col-lg-3 text-lg-right">US Phone with code</label>
                  <div class="col-lg-8 col-xl-6">
                    <input type="text" id="maskUsphonecode" name="maskUsphonecode" class="form-control" autocomplete="off" data-mask="usphonecode" placeholder="+1 (555) 495-3947">
                  </div>
                </div><!-- /.row -->
                <!-- .row -->
                <div class="row mb-3">
                  <label for="maskDate" class="col-lg-3 text-lg-right">Date</label>
                  <div class="col-lg-8 col-xl-6">
                    <input type="text" id="maskDate" name="maskDate" class="form-control" autocomplete="off" data-mask="date" placeholder="09/25/1970">
                  </div>
                </div><!-- /.row -->
                <!-- .row -->
                <div class="row mb-3">
                  <label for="maskDateAuto" class="col-lg-3 text-lg-right">Date (auto corrected)</label>
                  <div class="col-lg-8 col-xl-6">
                    <input type="text" id="maskDateAuto" name="maskDateAuto" class="form-control" autocomplete="off" data-mask="date" data-auto-correct-date="mm/dd/yyyy" placeholder="Please enter a date">
                  </div>
                </div><!-- /.row -->
                <!-- .row -->
                <div class="row mb-3">
                  <label for="maskCurrency" class="col-lg-3 text-lg-right">Currency</label>
                  <div class="col-lg-8 col-xl-6">
                    <input type="text" id="maskCurrency" name="maskCurrency" class="form-control text-right" autocomplete="off" data-mask="currency" placeholder="Enter an amount">
                  </div>
                </div><!-- /.row -->
                <!-- .row -->
                <div class="row mb-3">
                  <label for="maskCurrencyDecimal" class="col-lg-3 text-lg-right">Currency (allow decimal)</label>
                  <div class="col-lg-8 col-xl-6">
                    <input type="text" id="maskCurrencyDecimal" name="maskCurrencyDecimal" class="form-control text-right" autocomplete="off" data-mask="currency" data-allow-decimal="true" data-decimal-limit="2" placeholder="Enter an amount">
                  </div>
                </div><!-- /.row -->
                <!-- .row -->
                <div class="row mb-3">
                  <label for="maskPercentage" class="col-lg-3 text-lg-right">Percentage</label>
                  <div class="col-lg-8 col-xl-6">
                    <input type="text" id="maskPercentage" name="maskPercentage" class="form-control text-right" autocomplete="off" data-mask="percentage" data-integer-limit="3" data-allow-decimal="true" data-decimal-limit="2" placeholder="Enter an amount">
                  </div>
                </div><!-- /.row -->
                <!-- .row -->
                <div class="row mb-3">
                  <label for="maskEmail" class="col-lg-3 text-lg-right">Email</label>
                  <div class="col-lg-8 col-xl-6">
                    <input type="text" id="maskEmail" name="maskEmail" class="form-control" autocomplete="off" data-mask="email" placeholder="john@smith.com">
                  </div>
                </div><!-- /.row -->
                <!-- .row -->
                <div class="row mb-3">
                  <label for="maskUszip" class="col-lg-3 text-lg-right">US zip code</label>
                  <div class="col-lg-8 col-xl-6">
                    <input type="text" id="maskUszip" name="maskUszip" class="form-control" autocomplete="off" data-mask="uszip" placeholder="94303">
                  </div>
                </div><!-- /.row -->
                <!-- .row -->
                <div class="row mb-3">
                  <label for="maskCazip" class="col-lg-3 text-lg-right">Canadian postal code</label>
                  <div class="col-lg-8 col-xl-6">
                    <input type="text" id="maskCazip" name="maskCazip" class="form-control" autocomplete="off" data-mask="cazip" placeholder="K1A 0B2">
                  </div>
                </div><!-- /.row -->
                <!-- .row -->
                <div class="row mb-3">
                  <label for="maskCc" class="col-lg-3 text-lg-right">Credit card</label>
                  <div class="col-lg-8 col-xl-6">
                    <input type="text" id="maskCc" name="maskCc" class="form-control" autocomplete="off" data-mask="cc" placeholder="4242 4242 4242 4242">
                  </div>
                </div><!-- /.row -->
              </form><!-- /form -->
            </div><!-- /.card-body -->
          </div><!-- /.card -->
        </div><!-- /.card-deck-xl -->
      </div><!-- /.page-section -->
    </div><!-- /.page-inner -->
  </div><!-- /.page -->
</div><!-- .app-footer -->
<?php 
layoutBottom([
    "public/vendor/handlebars/handlebars.min.js",
    "public/vendor/typeahead.js/typeahead.bundle.min.js",
    "public/vendor/select2/js/select2.min.js",
    "public/vendor/tributejs/tribute.min.js",
    "public/vendor/jquery.caret/jquery.caret.min.js",
    "public/vendor/at.js/js/jquery.atwho.min.js",
    "public/vendor/zxcvbn/zxcvbn.js",
    "public/vendor/text-mask/vanillaTextMask.js",
    "public/vendor/text-mask/addons/textMaskAddons.js",
    "public/js/pages/select2-demo.js",
    "public/js/pages/typeahead-demo.js",
    "public/js/pages/atwho-demo.js"
]);
?>
