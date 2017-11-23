<nav class="navbar navbar-dark navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand logo" rel="home" href="#" title="CPDRC (Case)">
            <img src="<?php echo images_url('favicon.png') ?>">
            <span>CPDRC (Case)</span>
        </a>
    </div>

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-globe fa-fw"></i>  <span class="notification-counter label label-danger">1</span>
            </a>
            <ul class="dropdown-menu dropdown-alerts">
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-comment fa-fw"></i> New Comment
                            <span class="pull-right text-muted small">4 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a class="text-center" href="<?php echo base_url('notifications') ?>">
                        <strong>See All Notifications</strong>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="<?php echo base_url('users/profile') ?>"><i class="fa fa-user fa-fw"></i> User Profile</a></li>
                <li class="divider"></li>
                <li><a href="<?php echo base_url('users/profile/logout') ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
            </ul>
        </li>
    </ul>

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">Main Menu</li>
                <li class="nav-home">
                    <a href="<?php echo base_url() ?>"><i class="fa fa-home fa-fw"></i> Home</a>
                </li>
                <li class="nav-search">
                    <a href="<?php echo base_url('search') ?>"><i class="fa fa-search fa-fw"></i> Search</a>
                </li>
                <li class="nav-accounts">
                    <a href="#"><i class="fa fa-user fa-fw"></i> Accounts<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="nav-accounts-administrators">
                            <a href="<?php echo base_url('accounts/administrators') ?>">Administrators</a>
                        </li>
                        <li class="nav-accounts-judges-lawyers">
                            <a href="<?php echo base_url('accounts/judges-lawyers') ?>">Judge &amp; Lawyer</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-logs">
                    <a href="<?php echo base_url('logs') ?>"><i class="fa fa-history fa-fw"></i> Logs</a>
                </li>
                <li class="nav-about">
                    <a href="<?php echo base_url('about') ?>"><i class="fa fa-info fa-fw"></i> About</a>
                </li>
            </ul>
        </div>
    </div>
</nav>