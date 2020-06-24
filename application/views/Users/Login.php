<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Asosiasi BDS Indonesia</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="<?php echo base_url().'files/';?>assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
	<link href="<?php echo base_url().'files/';?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo base_url().'files/';?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
	<link href="<?php echo base_url().'files/';?>assets/plugins/ionicons/css/ionicons.min.css" rel="stylesheet" />
	<link href="<?php echo base_url().'files/';?>assets/css/animate.min.css" rel="stylesheet" />
	<link href="<?php echo base_url().'files/';?>assets/css/style.min.css" rel="stylesheet" />
	<link href="<?php echo base_url().'files/';?>assets/css/style-responsive.min.css" rel="stylesheet" />
	<link href="<?php echo base_url().'files/';?>assets/css/theme/default.css" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<link href="<?php echo base_url().'files/';?>assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
    <link href="<?php echo base_url().'files/';?>assets/plugins/bootstrap-sweetalert/sweetalert.css" rel="stylesheet" />
	<script src="<?php echo base_url().'files/';?>assets/plugins/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->
	<link rel="shortcut icon" href="<?php echo base_url().'files/assets/imgcustom/icon.png';?>" type="image/x-icon"/>
	
	<script>
		var base_url = '<?php echo base_url(); ?>';
	</script>
</head>
<body class="pace-top">
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<div class="login-cover">
	    <div class="login-cover-image">
			<img src="<?php echo base_url().'files/';?>assets/img/login-bg/bg-1.jpg" data-id="login-cover-image" alt="" />
		</div>
	    <div class="login-cover-bg"></div>
	</div>
	<!-- begin #page-container -->
	<div id="page-container" class="fade">
	    <!-- begin login -->
        <div class="login login-v2" data-pageload-addclass="animated fadeIn">
            <!-- begin brand -->
            <div class="login-header">
                <div class="brand">
					<img src="<?php echo base_url().'files/assets/imgcustom/logo-main.png';?>" class="img-responsive">
                </div>
            </div>
            <!-- end brand -->
            <div class="login-content">
                <form id="login_form" action="<?php echo base_url().'Index_/Validate_Login';?>" method="POST" class="margin-bottom-0">
                    <div class="form-group m-b-20">
                        <input type="text" name="username" class="form-control input-lg" placeholder="Username" required />
                    </div>
                    <div class="form-group m-b-20">
                        <input type="password" name="password" class="form-control input-lg" placeholder="Kata Sandi" required />
                    </div>
                    <div class="login-buttons">
                        <button type="submit" id="button_login" class="btn btn-primary btn-block btn-lg">Masuk</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- end login -->
	</div>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?php echo base_url().'files/';?>assets/plugins/jquery/jquery-1.9.1.min.js"></script>
	<script src="<?php echo base_url().'files/';?>assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
	<script src="<?php echo base_url().'files/';?>assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
	<script src="<?php echo base_url().'files/';?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<!--[if lt IE 9]>
		<script src="<?php echo base_url().'files/';?>assets/crossbrowserjs/html5shiv.js"></script>
		<script src="<?php echo base_url().'files/';?>assets/crossbrowserjs/respond.min.js"></script>
		<script src="<?php echo base_url().'files/';?>assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="<?php echo base_url().'files/';?>assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?php echo base_url().'files/';?>assets/plugins/jquery-cookie/jquery.cookie.js"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="<?php echo base_url().'files/';?>assets/plugins/gritter/js/jquery.gritter.js"></script>
	<script src="<?php echo base_url().'files/';?>assets/plugins/bootstrap-sweetalert/sweetalert.min.js"></script>
	<script src="<?php echo base_url().'files/';?>Script_JS/Login.js"></script>
	<script src="<?php echo base_url().'files/';?>assets/js/apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->

	<script>
		$(document).ready(function() {
			App.init();
			LoginV2.init();
		});
	</script>
</body>
</html>
