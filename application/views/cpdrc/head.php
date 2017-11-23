 <!DOCTYPE html>
 <html>
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cebu Provincial Detention and Rehabilitation Center</title>

   	<link href="<?php echo base_url();?>resources/css/bootstrap.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url();?>resources/css/sb-admin.css" rel="stylesheet" media="all">

	<link rel="stylesheet" href="<?php echo base_url();?>resources/font-awesome/css/font-awesome.min.css" media="all">

  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
  <![endif]-->

  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url();?>resources/img/cpdrc_144.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url();?>resources/img/cpdrc_114.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url();?>resources/img/cpdrc_72.png">
  <link rel="apple-touch-icon-precomposed" sizes="52x52" href="<?php echo base_url();?>resources/img/cpdrc_52.png">
  <link rel="shortcut icon" href="<?php echo base_url();?>resources/img/favicon.png">
  
	<script type="text/javascript" src="<?php echo base_url();?>resources/js/jquery-1.10.2.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>resources/js/bootstrap.js"></script>
  
	
	
	
</head>

  <body id="page-top" class="index">

    <div id="wrapper">  
      <!-- Sidebar -->
      <nav class="navbar navbar-default navbar-fixed-top noprint" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="navbar-brand" href="<?php echo site_url();?>"><img src="<?php echo base_url(); ?>resources/img/favicon.png"> CPDRC Inmate Profiling System</a>
      
        </div>

          <ul class="nav navbar-nav navbar-right navbar-user" style="margin-right:5px; margin-top:5px;">

          
            
        <!-- USER AREA -->  
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog"></i> <?php $res=$this->session->userdata('logged_in'); echo $res['fname']." ".$res['lname']; ?><b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><?php echo anchor("cpdrc/pages/settings","<i class='fa fa-user'></i> My Profile"); ?></li>
                
                <li class="divider"></li>
                <li><?php echo anchor("admin/profile/logout","<i class='fa fa-power-off'></i> Log Out"); ?></li>
              </ul>
            </li>
          </ul>
      </nav>
    </div>