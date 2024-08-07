<aside class="app-aside app-aside-expand-md app-aside-light">
    <div class="aside-content">
        <header class="aside-header d-block d-md-none">
            <button class="btn-account" type="button" data-toggle="collapse" data-target="#dropdown-aside"><span class="user-avatar user-avatar-lg"><img src="<?php asset('images/avatars/profile.jpg') ?>" alt=""></span> <span class="account-icon"><span class="fa fa-caret-down fa-lg"></span></span> <span class="account-summary"><span class="account-name">Beni Arisandi</span> <span class="account-description">Marketing Manager</span></span></button> <!-- /.btn-account -->
            <div id="dropdown-aside" class="dropdown-aside collapse">
                <div class="pb-3">
                    <a class="dropdown-item" href="user-profile.php"><span class="dropdown-icon oi oi-person"></span> Profile</a> <a class="dropdown-item" href="auth-signin-v1.php"><span class="dropdown-icon oi oi-account-logout"></span> Logout</a>
                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Help Center</a> <a class="dropdown-item" href="#">Ask Forum</a> <a class="dropdown-item" href="#">Keyboard Shortcuts</a>
                </div>
            </div>
        </header>
        <div class="aside-menu overflow-hidden">
            <nav id="stacked-menu" class="stacked-menu">
                <ul class="menu">
                    <li class="menu-item <?php echo hasActive('/'); ?>">
                        <a href="<?php toRoute('dashboard') ?>" class="menu-link"><span class="menu-icon fas fa-home"></span> <span class="menu-text">Dashboard</span></a>
                    </li>
                    
                    <li class="menu-item has-child <?php echo hasActive('users/create') || hasActive('users') ? 'has-active' : ''; ?>">
                        <a href="#" class="menu-link"><span class="menu-icon oi oi-person"></span> <span class="menu-text">Users</span></a>
                        <ul class="menu">
                            <li class="menu-item <?php echo hasActive('users/create'); ?>">
                                <a href="<?php toRoute('users.create') ?>" class="menu-link">Add User</a>
                            </li>
                            <li class="menu-item <?php echo hasActive('users'); ?>">
                                <a href="<?php toRoute('users.index') ?>" class="menu-link">All Users</a>
                            </li>
                        </ul>
                    </li>
                    
                </ul>
            </nav>
        </div>
        <footer class="aside-footer border-top p-2">
            <button class="btn btn-light btn-block text-primary" data-toggle="skin"><span class="d-compact-menu-none">Night mode</span> <i class="fas fa-moon ml-1"></i></button>
        </footer>
    </div>
</aside>