<style type="text/css">

</style>
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
            <span>CPDRC</span>
        </a>
    </div>

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="<?php echo base_url('admin/profile') ?>"><i class="fa fa-user fa-fw"></i> User Profile</a></li>
                <li><a href="<?php echo base_url('admin/profile/changepassword') ?>"><i class="fa fa-lock fa-fw"></i> Change Password</a></li>
                <li class="divider"></li>
                <li><a href="<?php echo base_url('admin/profile/logout') ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
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
                <li class="nav-notifications">
                    <a href="<?php echo base_url('notifications') ?>"><i class="fa fa-globe fa-fw"></i> Notification
                        <?php if ($allnoti > 0): ?>
                            <label class="badge alert-primary pull-right"><?php echo $allnoti ?></label>
                        <?php endif ?>
                    </a>
                </li>
                <!-- <li class="nav-search">
                    <a href="<?php echo base_url('search') ?>"><i class="fa fa-search fa-fw"></i> Search</a>
                </li> -->
                <li class="nav-inmate">
                    <a href="#"><i class="fa fa-search fa-fw"></i> Inmates<span class="fa arrow"></span><?php if ($unfinished > 0): ?>
                                    <label class="badge alert-primary pull-right"><?php echo $unfinished ?></label>
                                <?php endif ?></a>
                    <ul class="nav nav-second-level">
                        <li class="nav-inmate-finished">
                            <a href="<?php echo base_url('search')?>"><i class="fa fa-check"></i> Finished</a>
                        </li>
                        <li class="nav-inmate-unfinished">
                            <a href="<?php echo base_url('search1')?>"><i class="fa fa-close"></i> 
                                Unfinished
                                
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- <li class="nav-accounts">
                    <a href="#"><i class="fa fa-user fa-fw"></i> Accounts<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="nav-accounts-administrators">
                            <a href="<?php echo base_url('accounts/administrators') ?>">Administrators</a>
                        </li>
                        <li class="nav-accounts-judges-lawyers">
                            <a href="<?php echo base_url('accounts/judges-lawyers') ?>">Judge &amp; Lawyer</a>
                        </li>
                    </ul>
                </li> -->
                <li class="nav-graphical">
                    <a href="#"><i class="fa fa-line-chart fa-fw"></i> Reports<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">  
                        <li class="nav-masterList">
                            <a href="<?php echo base_url('cpdrc/pages/reportsMasterList') ?>">&nbsp;<i></i>&nbsp;Masterlist</a>
                        </li>

                        <li class="nav-violations">
                            <a href="#">&nbsp;<i></i>&nbsp;Violations<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li class="nav-graphical-violations">
                                    <a href="<?php echo base_url('historical-graphical-tools/violations') ?>">&nbsp;&nbsp;&nbsp;<i></i>&nbsp;&nbsp;&nbsp;Graph</a>
                                </li>
                                <li class="nav-crimeIndex">
                                    <a href="<?php echo base_url('cpdrc/pages/reportsCrimeIndex') ?>">&nbsp;&nbsp;&nbsp;<i></i>&nbsp;&nbsp;&nbsp;Crime Index</a>
                                </li>
                                <li class="nav-crimeIndexGeo">
                                    <a href="<?php echo base_url('cpdrc/pages/reportsCrimeIndexGeo') ?>">&nbsp;&nbsp;&nbsp;<i></i>&nbsp;&nbsp;&nbsp;Crime Index Geographical</a>
                                </li>
                                <li class="nav-crimeindexTabulated">
                                    <a href="<?php echo base_url('cpdrc/pages/crimeIndexTabulated') ?>">&nbsp;&nbsp;&nbsp;<i></i>&nbsp;&nbsp;&nbsp;Crime Index Tabulated</a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-graphical-populations">
                            <a href="<?php echo base_url('historical-graphical-tools/population') ?>">&nbsp;<i></i>&nbsp;Population</a>
                        </li>
                        <li class="nav-graphical-Daily">
                            <a href="<?php echo base_url('cpdrc/pages/reportsDaily') ?>">Daily</a>
                        </li>
                        <li class="nav-graphical-releases">
                            <a href="<?php echo base_url('cpdrc/pages/releases') ?>">Releases</a>
                        </li>
                        <li class="nav-graphical-municipality">
                            <a href="<?php echo base_url('cpdrc/pages/municipality') ?>">Municipality</a>
                        </li>
                        <li class="nav-graphical-addReleased">
                            <a href="<?php echo base_url('historical-graphical-tools/addReleased') ?>">Municipality</a>
                        </li>
                        
                    </ul>
                </li>
                <!-- <li class="nav-about">
                    <a href="<?php echo base_url('about') ?>"><i class="fa fa-info fa-fw"></i> About</a>
                </li> -->
                <li class="nav-manage">
                    <a href="#"><i class="fa fa-cogs fa-fw"></i> Manage<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="nav-manage-violation">
                            <a href="<?php echo base_url('manage') ?>">&nbsp;<i></i>&nbsp;Violation</a>
                        </li>
                        <li class="nav-manage-archive">
                            <a href="<?php echo base_url('manage/archive') ?>">&nbsp;<i></i>&nbsp;Archive</a>
                        </li>
                        <li class="nav-manage-courts">
                            <a href="<?php echo base_url('manage/courts') ?>">&nbsp;<i></i>&nbsp;Courts</a>
                        </li>
                        <li class="nav-manage-cells">
                            <a href="<?php echo base_url('manage/cells') ?>">&nbsp;<i></i>&nbsp;Cells</a>
                        </li>
                        <li class="nav-manage-logs">
                            <a href="<?php echo base_url('manage/logs') ?>">&nbsp;<i></i>&nbsp;Logs</a>
                        </li>
                    </ul>
                </li>

                <li class="nav-profiling">
                    <a href="<?php echo base_url('cpdrc/pages') ?>"><i class="fa fa-user fa-fw"></i> Profiling    </a>  
                </li>
                <?php  if($this->session->userdata('user_type') == "Warden Administrator"){?>
                <li class="nav-editReq">
                    <a href="<?php echo base_url('cpdrc/editinmate') ?>"><i class="fa fa-user fa-fw"></i> Edit Requests    </a>  
                </li>
                <?php }?>
                <!-- <li class="nav-reports">
                    <a href="#"><i class="fa fa-line-chart fa-fw"></i> Reports<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="nav-reports-reports">
                            <a href="<?php echo base_url('cpdrc/pages/reports') ?>">Reports</a>
                        </li>
                        <li class="nav-reports-monthly">
                            <a href="<?php echo base_url('cpdrc/pages/reportsMonthly') ?>">Monthly</a>
                        </li> 
                        <li class="nav-reports-Daily">
                            <a href="<?php echo base_url('cpdrc/pages/reportsDaily') ?>">&nbsp;<i></i>&nbsp;Daily</a>
                        </li>
                        </li>
                        <li class="nav-reports-releases">
                            <a href="<?php echo base_url('cpdrc/pages/releases') ?>">&nbsp;<i></i>&nbsp;Releases</a>
                        </li>
                          <li class="nav-reports-courtLogs">
                            <a href="<?php echo base_url('cpdrc/pages/court_logs') ?>">&nbsp;<i></i>&nbsp;Court Logs</a>
                        </li>
                    </ul>
                    -->
            </ul>
        </div>
    </div>
</nav>
