<!DOCTYPE html>
<html lang="en">
<head>
	
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<?php echo isset($meta_char) ? '<meta charset="'.$meta_char.'">' : ''; ?>

	<?php echo isset($meta_auth) ? '<meta name="author" content="'.$meta_auth.'"/>' : ''; ?>

	<?php echo isset($meta_keys) ? '<meta name="keywords" content="'.$meta_keys.'"/>' : ''; ?>

	<?php echo isset($meta_desc) ? '<meta name="description" content="'.$meta_desc.'"/>' : ''; ?>

	<title><?php echo isset($title) ? $title : ''; ?></title>

	<link rel="icon" href="<?php echo images_url('favicon.png')?>" type="image/ico">
	<link type="text/css" rel="stylesheet" href="<?php echo css_url('normalize.css') ?>"/>
	<link type="text/css" rel="stylesheet" href="<?php echo vendor_url('bootstrap/dist/css/bootstrap.min.css') ?>"/>
	<link type="text/css" rel="stylesheet" href="<?php echo vendor_url('metisMenu/dist/metisMenu.min.css') ?>"/>
	<link type="text/css" rel="stylesheet" href="<?php echo vendor_url('font-awesome/css/font-awesome.min.css') ?>"/>
	<link type="text/css" rel="stylesheet" href="<?php echo css_url('sb-admin-2.css') ?>"/>

	<?php if(isset($css)) : ?>
		<?php foreach ($css  as $style): ?>
			<link type="text/css" rel="stylesheet" href="<?php echo assets_url($style) ?>"/>
		<?php endforeach ?>
	<?php endif?>

	<link type="text/css" rel="stylesheet" href="<?php echo css_url('style.css') ?>"/>

	<script type="text/javascript" src="<?php echo js_url('jquery-1.11.2.min.js') ?>"></script>

	<?php if(isset($js_top)) : ?>
		<?php foreach ($js_top  as $jst): ?>
			<script type="text/javascript" src="<?php assets_url($jst) ?>"></script>
		<?php endforeach ?>
	<?php endif?>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="<?php echo isset($pageid) ? $pageid : 'wrapper' ?>">

	<div id="<?php echo isset($pagewrapper) ? $pagewrapper : '' ?>">

		<?php echo isset($header) ? $header : '' ?>

		<div class="container">
	        <div class="row">
	        	<div class="col-lg-12 text-center login-logo">
            		<img src="<?php echo images_url('logo.png') ?>">
            	</div>
	            <div class="col-md-4 col-md-offset-4">
	                <div class="login-panel panel panel-default">
	                    <div class="panel-heading">
	                        <h3 class="panel-title">Please Sign In</h3>
	                    </div>
	                    <div class="panel-body">
	                        <form action="<?php echo current_url_full() ?>" role="form" method="post">
	                            <?php echo form_open(current_url_full(), 'class="form-horizontal"'); ?>
			                        <?php if (validation_errors()): ?>
			                        <div class="alert alert-danger">
			                            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
			                            <?php echo validation_errors(); ?>
			                        </div>
			                    <?php endif ?>
			                    
			                    <?php if ($this->session->flashdata('success_msg')): ?>
			                        <div class="alert alert-success">
			                            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
			                            <?php echo $this->session->flashdata('success_msg') ?>
			                        </div>
			                    <?php endif ?>

			                    <?php if ($this->session->flashdata('error_msg')): ?>
			                        <div class="alert alert-danger">
			                            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
			                            <?php echo $this->session->flashdata('error_msg') ?>
			                        </div>
			                    <?php endif ?>
			                    <fieldset>
	                                <div class="form-group">
	                                    <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
	                                </div>
	                                <div class="form-group">
	                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
	                                </div>
	                                <input type="submit" value="Login" class="btn btn-lg btn-warning btn-block" />
	                            </fieldset>
	                        </form>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
		
		<?php echo isset($footer) ? $footer : '' ?>

	</div>

	<?php if(isset($js_bottom)) : ?>
		<?php foreach ($js_bottom  as $jsb): ?>
			<script type="text/javascript" src="<?php assets_url($jsb) ?>"></script>
		<?php endforeach ?>
	<?php endif?>

	<script type="text/javascript" src="<?php echo vendor_url('bootstrap/dist/js/bootstrap.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo vendor_url('metisMenu/dist/metisMenu.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo js_url('sb-admin-2.js') ?>"></script>

</body>

</html>