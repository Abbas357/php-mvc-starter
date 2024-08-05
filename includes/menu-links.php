<aside class="app-aside app-aside-expand-md app-aside-light">
    <!-- .aside-content -->
    <div class="aside-content">
        <!-- .aside-header -->
        <header class="aside-header d-block d-md-none">
            <!-- .btn-account -->
            <button class="btn-account" type="button" data-toggle="collapse" data-target="#dropdown-aside"><span class="user-avatar user-avatar-lg"><img src="<?php asset('images/avatars/profile.jpg') ?>" alt=""></span> <span class="account-icon"><span class="fa fa-caret-down fa-lg"></span></span> <span class="account-summary"><span class="account-name">Beni Arisandi</span> <span class="account-description">Marketing Manager</span></span></button> <!-- /.btn-account -->
            <!-- .dropdown-aside -->
            <div id="dropdown-aside" class="dropdown-aside collapse">
                <!-- dropdown-items -->
                <div class="pb-3">
                    <a class="dropdown-item" href="user-profile.php"><span class="dropdown-icon oi oi-person"></span> Profile</a> <a class="dropdown-item" href="auth-signin-v1.php"><span class="dropdown-icon oi oi-account-logout"></span> Logout</a>
                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Help Center</a> <a class="dropdown-item" href="#">Ask Forum</a> <a class="dropdown-item" href="#">Keyboard Shortcuts</a>
                </div><!-- /dropdown-items -->
            </div><!-- /.dropdown-aside -->
        </header><!-- /.aside-header -->
        <!-- .aside-menu -->
        <div class="aside-menu overflow-hidden">
            <!-- .stacked-menu -->
            <nav id="stacked-menu" class="stacked-menu">
                <!-- .menu -->
                <ul class="menu">
                    <!-- .menu-item -->
                    <li class="menu-item has-active">
                        <a href="index.php" class="menu-link"><span class="menu-icon fas fa-home"></span> <span class="menu-text">Dashboard</span></a>
                    </li><!-- /.menu-item -->
                    <!-- .menu-item -->
                     
                    <li class="menu-item has-child">
                        <a href="#" class="menu-link"><span class="menu-icon fas fa-table"></span> <span class="menu-text">Tables</span></a> <!-- child menu -->
                        <ul class="menu">
                            <li class="menu-item">
                                <a href="table-basic.php" class="menu-link">Basic Table</a>
                            </li>
                            <li class="menu-item">
                                <a href="table-datatables.php" class="menu-link">Datatables</a>
                            </li>
                            <li class="menu-item">
                                <a href="table-responsive-datatables.php" class="menu-link">Responsive Datatables</a>
                            </li>
                            <li class="menu-item">
                                <a href="table-filters-datatables.php" class="menu-link">Filter Columns</a>
                            </li>
                        </ul><!-- /child menu -->
                    </li>

                    <li class="menu-item has-child">
                        <a href="#" class="menu-link"><span class="menu-icon far fa-file"></span> <span class="menu-text">App Pages</span> <span class="badge badge-warning">New</span></a> <!-- child menu -->
                        <ul class="menu">
                            <li class="menu-item">
                                <a href="page-clients.php" class="menu-link">Clients</a>
                            </li>
                            <li class="menu-item">
                                <a href="page-teams.php" class="menu-link">Teams</a>
                            </li>
                            <li class="menu-item has-child">
                                <a href="#" class="menu-link">Team</a> <!-- grand child menu -->
                                <ul class="menu">
                                    <li class="menu-item">
                                        <a href="page-team.php" class="menu-link">Overview</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="page-team-feeds.php" class="menu-link">Feeds</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="page-team-projects.php" class="menu-link">Projects</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="page-team-members.php" class="menu-link">Members</a>
                                    </li>
                                </ul><!-- /grand child menu -->
                            </li>
                            <li class="menu-item has-child">
                                <a href="#" class="menu-link">Project</a> <!-- grand child menu -->
                                <ul class="menu">
                                    <li class="menu-item">
                                        <a href="page-project.php" class="menu-link">Overview</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="page-project-board.php" class="menu-link">Board</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="page-project-gantt.php" class="menu-link">Gantt View</a>
                                    </li>
                                </ul><!-- /grand child menu -->
                            </li>
                            <li class="menu-item">
                                <a href="page-calendar.php" class="menu-link">Calendar</a>
                            </li>
                            <li class="menu-item has-child">
                                <a href="#" class="menu-link">Invoices</a> <!-- grand child menu -->
                                <ul class="menu">
                                    <li class="menu-item">
                                        <a href="page-invoices.php" class="menu-link">List</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="page-invoice.php" class="menu-link">Details</a>
                                    </li>
                                </ul><!-- /grand child menu -->
                            </li>
                            <li class="menu-item">
                                <a href="page-messages.php" class="menu-link">Messages</a>
                            </li>
                            <li class="menu-item">
                                <a href="page-conversations.php" class="menu-link">Conversations</a>
                            </li>
                        </ul><!-- /child menu -->
                    </li><!-- /.menu-item -->
                    <!-- .menu-item -->
                    <li class="menu-item has-child">
                        <a href="#" class="menu-link"><span class="menu-icon oi oi-wrench"></span> <span class="menu-text">Auth</span></a> <!-- child menu -->
                        <ul class="menu">
                            <li class="menu-item">
                                <a href="auth-comingsoon-v1.php" class="menu-link">Coming Soon v1</a>
                            </li>
                            <li class="menu-item">
                                <a href="auth-comingsoon-v2.php" class="menu-link">Coming Soon v2</a>
                            </li>
                            <li class="menu-item">
                                <a href="auth-cookie-consent.php" class="menu-link">Cookie Consent</a>
                            </li>
                            <li class="menu-item">
                                <a href="auth-empty-state.php" class="menu-link">Empty State</a>
                            </li>
                            <li class="menu-item">
                                <a href="auth-error-v1.php" class="menu-link">Error Page v1</a>
                            </li>
                            <li class="menu-item">
                                <a href="auth-error-v2.php" class="menu-link">Error Page v2</a>
                            </li>
                            <li class="menu-item">
                                <a href="auth-error-v3.php" class="menu-link">Error Page v3</a>
                            </li>
                            <li class="menu-item">
                                <a href="auth-maintenance.php" class="menu-link">Maintenance</a>
                            </li>
                            <li class="menu-item">
                                <a href="auth-page-message.php" class="menu-link">Page Message</a>
                            </li>
                            <li class="menu-item">
                                <a href="auth-session-timeout.php" class="menu-link">Session Timeout</a>
                            </li>
                            <li class="menu-item">
                                <a href="auth-signin-v1.php" class="menu-link">Sign In v1</a>
                            </li>
                            <li class="menu-item">
                                <a href="auth-signin-v2.php" class="menu-link">Sign In v2</a>
                            </li>
                            <li class="menu-item">
                                <a href="auth-signup.php" class="menu-link">Sign Up</a>
                            </li>
                            <li class="menu-item">
                                <a href="auth-recovery-username.php" class="menu-link">Recovery Username</a>
                            </li>
                            <li class="menu-item">
                                <a href="auth-recovery-password.php" class="menu-link">Recovery Password</a>
                            </li>
                            <li class="menu-item">
                                <a href="auth-lockscreen.php" class="menu-link">Screen Locked</a>
                            </li>
                        </ul><!-- /child menu -->
                    </li><!-- /.menu-item -->
                    <!-- .menu-item -->
                    <li class="menu-item has-child">
                        <a href="#" class="menu-link"><span class="menu-icon oi oi-person"></span> <span class="menu-text">User</span></a> <!-- child menu -->
                        <ul class="menu">
                            <li class="menu-item">
                                <a href="user-profile.php" class="menu-link">Profile</a>
                            </li>
                            <li class="menu-item">
                                <a href="user-activities.php" class="menu-link">Activities</a>
                            </li>
                            <li class="menu-item">
                                <a href="user-teams.php" class="menu-link">Teams</a>
                            </li>
                            <li class="menu-item">
                                <a href="user-projects.php" class="menu-link">Projects</a>
                            </li>
                            <li class="menu-item">
                                <a href="user-tasks.php" class="menu-link">Tasks</a>
                            </li>
                            <li class="menu-item">
                                <a href="user-profile-settings.php" class="menu-link">Profile Settings</a>
                            </li>
                            <li class="menu-item">
                                <a href="user-account-settings.php" class="menu-link">Account Settings</a>
                            </li>
                            <li class="menu-item">
                                <a href="user-billing-settings.php" class="menu-link">Billing Settings</a>
                            </li>
                            <li class="menu-item">
                                <a href="user-notification-settings.php" class="menu-link">Notification Settings</a>
                            </li>
                        </ul><!-- /child menu -->
                    </li><!-- /.menu-item -->
                    <!-- .menu-item -->
                    <li class="menu-item has-child">
                        <a href="#" class="menu-link"><span class="menu-icon oi oi-browser"></span> <span class="menu-text">Layouts</span> <span class="badge badge-subtle badge-success">+4</span></a> <!-- child menu -->
                        <ul class="menu">
                            <li class="menu-item">
                                <a href="layout-blank.php" class="menu-link">Blank Page</a>
                            </li>
                            <li class="menu-item">
                                <a href="layout-nosearch.php" class="menu-link">Header no Search</a>
                            </li>
                            <li class="menu-item">
                                <a href="layout-horizontal-menu.php" class="menu-link">Horizontal Menu</a>
                            </li>
                            <li class="menu-item">
                                <a href="layout-fullwidth.php" class="menu-link">Full Width</a>
                            </li>
                            <li class="menu-item">
                                <a href="layout-pagenavs.php" class="menu-link">Page Navs</a>
                            </li>
                            <li class="menu-item">
                                <a href="layout-pagecover.php" class="menu-link">Page Cover</a>
                            </li>
                            <li class="menu-item">
                                <a href="layout-pagecover-img.php" class="menu-link">Cover Image</a>
                            </li>
                            <li class="menu-item">
                                <a href="layout-pagesidebar.php" class="menu-link">Page Sidebar</a>
                            </li>
                            <li class="menu-item">
                                <a href="layout-pagesidebar-fluid.php" class="menu-link">Sidebar Fluid</a>
                            </li>
                            <li class="menu-item">
                                <a href="layout-pagesidebar-hidden.php" class="menu-link">Sidebar Hidden</a>
                            </li>
                            <li class="menu-item">
                                <a href="layout-custom.php" class="menu-link">Custom</a>
                            </li>
                        </ul><!-- /child menu -->
                    </li><!-- /.menu-item -->
                    <!-- .menu-item -->
                    <li class="menu-item">
                        <a href="landing-page.php" class="menu-link"><span class="menu-icon fas fa-rocket"></span> <span class="menu-text">Landing Page</span></a>
                    </li><!-- /.menu-item -->
                    <!-- .menu-header -->
                    <li class="menu-header">Interfaces </li><!-- /.menu-header -->
                    <!-- .menu-item -->
                    <li class="menu-item has-child">
                        <a href="#" class="menu-link"><span class="menu-icon oi oi-puzzle-piece"></span> <span class="menu-text">Components</span></a> <!-- child menu -->
                        <ul class="menu">
                            <li class="menu-item">
                                <a href="component-general.php" class="menu-link">General</a>
                            </li>
                            <li class="menu-item">
                                <a href="component-icons.php" class="menu-link">Icons</a>
                            </li>
                            <li class="menu-item">
                                <a href="component-rich-media.php" class="menu-link">Rich Media</a>
                            </li>
                            <li class="menu-item">
                                <a href="component-list-views.php" class="menu-link">List Views</a>
                            </li>
                            <li class="menu-item">
                                <a href="component-sortable-nestable.php" class="menu-link">Sortable & Nestable</a>
                            </li>
                            <li class="menu-item">
                                <a href="component-activity.php" class="menu-link">Activity</a>
                            </li>
                            <li class="menu-item">
                                <a href="component-steps.php" class="menu-link">Steps</a>
                            </li>
                            <li class="menu-item">
                                <a href="component-tasks.php" class="menu-link">Tasks</a>
                            </li>
                            <li class="menu-item">
                                <a href="component-metrics.php" class="menu-link">Metrics</a>
                            </li>
                        </ul><!-- /child menu -->
                    </li><!-- /.menu-item -->
                    <!-- .menu-item -->
                    <li class="menu-item has-child">
                        <a href="#" class="menu-link"><span class="menu-icon oi oi-pencil"></span> <span class="menu-text">Forms</span></a> <!-- child menu -->
                        <ul class="menu">
                            <li class="menu-item">
                                <a href="form-basic.php" class="menu-link">Basic Elements</a>
                            </li>
                            <li class="menu-item">
                                <a href="form-autocompletes.php" class="menu-link">Autocompletes</a>
                            </li>
                            <li class="menu-item">
                                <a href="form-pickers.php" class="menu-link">Pickers</a>
                            </li>
                            <li class="menu-item">
                                <a href="form-editors.php" class="menu-link">Editors</a>
                            </li>
                        </ul><!-- /child menu -->
                    </li><!-- /.menu-item -->
                    <!-- .menu-item -->
                    <li class="menu-item has-child">
                        <a href="#" class="menu-link"><span class="menu-icon fas fa-table"></span> <span class="menu-text">Tables</span></a> <!-- child menu -->
                        <ul class="menu">
                            <li class="menu-item">
                                <a href="table-basic.php" class="menu-link">Basic Table</a>
                            </li>
                            <li class="menu-item">
                                <a href="table-datatables.php" class="menu-link">Datatables</a>
                            </li>
                            <li class="menu-item">
                                <a href="table-responsive-datatables.php" class="menu-link">Responsive Datatables</a>
                            </li>
                            <li class="menu-item">
                                <a href="table-filters-datatables.php" class="menu-link">Filter Columns</a>
                            </li>
                        </ul><!-- /child menu -->
                    </li><!-- /.menu-item -->
                    <!-- .menu-item -->
                    <li class="menu-item has-child">
                        <a href="#" class="menu-link"><span class="menu-icon oi oi-bar-chart"></span> <span class="menu-text">Collections</span></a> <!-- child menu -->
                        <ul class="menu">
                            <li class="menu-item has-child">
                                <a href="#" class="menu-link">Chart.js</a> <!-- grand child menu -->
                                <ul class="menu">
                                    <li class="menu-item">
                                        <a href="collection-chartjs-line.php" class="menu-link">Line</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="collection-chartjs-bar.php" class="menu-link">Bar</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="collection-chartjs-radar-scatter.php" class="menu-link">Radar & Scatter</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="collection-chartjs-others.php" class="menu-link">Others</a>
                                    </li>
                                </ul><!-- /grand child menu -->
                            </li>
                            <li class="menu-item">
                                <a href="collection-flot-charts.php" class="menu-link">Flot</a>
                            </li>
                            <li class="menu-item">
                                <a href="collection-inline-charts.php" class="menu-link">Inline charts</a>
                            </li>
                            <li class="menu-item">
                                <a href="collection-jqvmap.php" class="menu-link">Vector Map</a>
                            </li>
                        </ul><!-- /child menu -->
                    </li><!-- /.menu-item -->
                    <!-- .menu-item -->
                    <li class="menu-item has-child">
                        <a href="#" class="menu-link"><span class="menu-icon oi oi-list-rich"></span> <span class="menu-text">Level Menu</span></a> <!-- child menu -->
                        <ul class="menu">
                            <li class="menu-item">
                                <a href="#" class="menu-link">Menu item</a>
                            </li>
                            <li class="menu-item has-child">
                                <a href="#" class="menu-link">Menu item</a> <!-- grand child menu -->
                                <ul class="menu">
                                    <li class="menu-item">
                                        <a href="#" class="menu-link">Child item</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="#" class="menu-link">Child item</a>
                                    </li>
                                    <li class="menu-item has-child">
                                        <a href="#" class="menu-link">Child item</a> <!-- grand child menu -->
                                        <ul class="menu">
                                            <li class="menu-item">
                                                <a href="#" class="menu-link">Grand Child item</a>
                                            </li>
                                            <li class="menu-item">
                                                <a href="#" class="menu-link">Grand Child item</a>
                                            </li>
                                            <li class="menu-item">
                                                <a href="#" class="menu-link">Grand Child item</a>
                                            </li>
                                            <li class="menu-item">
                                                <a href="#" class="menu-link">Grand Child item</a>
                                            </li>
                                        </ul><!-- /grand child menu -->
                                    </li>
                                    <li class="menu-item">
                                        <a href="#" class="menu-link">Child item</a>
                                    </li>
                                </ul><!-- /grand child menu -->
                            </li>
                            <li class="menu-item">
                                <a href="#" class="menu-link">Menu item</a>
                            </li>
                        </ul><!-- /child menu -->
                    </li>/.menu-item
                </ul><!-- /.menu -->
            </nav><!-- /.stacked-menu -->
        </div><!-- /.aside-menu -->
        <!-- Skin changer -->
        <footer class="aside-footer border-top p-2">
            <button class="btn btn-light btn-block text-primary" data-toggle="skin"><span class="d-compact-menu-none">Night mode</span> <i class="fas fa-moon ml-1"></i></button>
        </footer><!-- /Skin changer -->
    </div><!-- /.aside-content -->
</aside>