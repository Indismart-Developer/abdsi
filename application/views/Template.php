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

	<!-- ================== BEGIN CUSTOM BASE CSS STYLE ================== -->
	<link href="<?php echo base_url().'files/';?>assets/css/stylecustom.css" rel="stylesheet" />
	<!-- ================== END CUSTOM BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<link href="<?php echo base_url().'files/';?>assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo base_url().'files/';?>assets/plugins/DataTables/extensions/Buttons/css/buttons.bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo base_url().'files/';?>assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo base_url().'files/';?>assets/plugins/DataTables/extensions/AutoFill/css/autoFill.bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo base_url().'files/';?>assets/plugins/DataTables/extensions/ColReorder/css/colReorder.bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo base_url().'files/';?>assets/plugins/DataTables/extensions/KeyTable/css/keyTable.bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo base_url().'files/';?>assets/plugins/DataTables/extensions/RowReorder/css/rowReorder.bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo base_url().'files/';?>assets/plugins/DataTables/extensions/Select/css/select.bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo base_url().'files/';?>assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" />
	<link href="<?php echo base_url().'files/';?>assets/plugins/bootstrap-sweetalert/sweetalert.css" rel="stylesheet" />
	<link href="<?php echo base_url().'files/';?>assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
	<link href="<?php echo base_url().'files/';?>assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
	<link href="<?php echo base_url().'files/';?>assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.css" rel="stylesheet" />
	<link href="<?php echo base_url().'files/';?>assets/plugins/dropzone/min/dropzone.min.css" rel="stylesheet" />
	<link rel="shortcut icon" href="<?php echo base_url().'files/assets/imgcustom/icon.png';?>" type="image/x-icon"/>


	<?php include('External_CSS.php'); ?>
	<!-- ================== END PAGE LEVEL STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?php echo base_url().'files/';?>assets/plugins/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->
	<script type="text/javascript">
		var base_url = "<?php echo base_url(); ?>";
	</script>
</head>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
		<!-- begin #header -->
		<div id="header" class="header navbar navbar-inverse navbar-fixed-top">
			<!-- begin container-fluid -->
			<div class="container-fluid">
				<!-- begin mobile sidebar expand / collapse button -->
				<div class="navbar-header">
					<a href="<?php echo base_url().'Dashboard';?>" class="navbar-brand">
						<span class="navbar-logo"><img height="100%" src="<?php echo base_url().'files/assets/imgcustom/';?>icon.png"></span>
						<span class="text-navbar-logo">ASOSIASI BDS INDONESIA</span>
					</a>
					<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<!-- end mobile sidebar expand / collapse button -->
				
				<!-- begin header navigation right -->
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown navbar-user">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
							<span class="user-image online">
								<img src="<?php echo base_url().'files/assets/img/'.$this->session->userdata('icon_user');?>" alt="" /> 
							</span>
							<span class="hidden-xs"><?php echo $this->session->userdata('nama_lengkap'); ?></span> <b class="caret"></b>
						</a>
						<ul class="dropdown-menu animated fadeInLeft">
							<li><a href="<?php echo base_url().'Index_/Logout';?>">Log Out</a></li>
						</ul>
					</li>
				</ul>
				<!-- end header navigation right -->
			</div>
			<!-- end container-fluid -->
		</div>
		<!-- end #header -->
		
		<!-- begin #sidebar -->
		<div id="sidebar" class="sidebar">
			<!-- begin sidebar scrollbar -->
			<div data-scrollbar="true" data-height="100%">
				<!-- begin sidebar nav -->
				<ul class="nav">
					<?php
					$parent = $this->Model_Module->_Get_List_Parent_Previlege();
					foreach($parent as $row_parent){ 
						echo '<li class="nav-header">'.$row_parent->MENU_NAME.'</li>'; 
						$child1 = $this->Model_Module->_Get_List_Child_Previlege($row_parent->ID); //Level 1
						foreach($child1 as $row_child1){
							$active_child1 = $this->Model_Module->_Get_List_Child_Previlege($row_child1->ID);
							if(empty($active_child1)){
								if ($row_child1->MENU_ACTIVE_OPEN==$this->uri->segment($row_child1->SEGMENT)) {
									$set_child1 = 'active';
								}else{
									$set_child1 = '';
								}
								echo '<li>
										<a href="'.base_url().$row_child1->MENU_LINK.'">
											<i class="'.$row_child1->MENU_ICON.'"></i> 
											<span>'.$row_child1->MENU_NAME.'</span>
										</a>
									  </li>';
							}else{
								$active_child1 = $this->Model_Module->_Get_List_Active_Menu($row_child1->ID);
								if (strstr($active_child1,$this->uri->segment($row_child1->SEGMENT))) {
									$set_child1 = 'active';
								}else{
									$set_child1 = '';
								}
								echo '<li class="has-sub '.$set_child1.'">
										<a href="javascript:;">
											<b class="caret pull-right"></b>
											<i class="'.$row_child1->MENU_ICON.'"></i>
											<span>'.$row_child1->MENU_NAME.'</span>
										</a>
										<ul class="sub-menu">';
										$child2 = $this->Model_Module->_Get_List_Child_Previlege($row_child1->ID); // Level 2
										foreach($child2 as $row_child2){
											$active_child2 = $this->Model_Module->_Get_List_Child_Previlege($row_child2->ID);
											if(empty($active_child2)){
												if ($row_child2->MENU_ACTIVE_OPEN==$this->uri->segment($row_child2->SEGMENT)) {
													$set_child2 = 'active';
												}else{
													$set_child2 = '';
												}
												echo '<li class="'.$set_child2.'">
													  <a href="'.base_url().$row_child2->MENU_LINK.'">
													  <i class="'.$row_child2->MENU_ICON.'"></i> '.$row_child2->MENU_NAME.'</a>
													  </li>';
											
											} //Next
										}
										echo '</ul></li>';
							}
						
						}
						
					}?>
			        <!-- begin sidebar minify button -->
					<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="ion-ios-arrow-left"></i> <span>Collapse</span></a></li>
			        <!-- end sidebar minify button -->
				</ul>
				<!-- end sidebar nav -->
			</div>
			<!-- end sidebar scrollbar -->
		</div>
		<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		<!-- begin #content -->
		<?php $this->load->view($content); ?>
		<!-- End #content -->
		
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-primary btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
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
	<script src="<?php echo base_url().'files/';?>assets/plugins/DataTables/media/js/jquery.dataTables.js"></script>
	<script src="<?php echo base_url().'files/';?>assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js"></script>
	<script src="<?php echo base_url().'files/';?>assets/plugins/DataTables/extensions/Buttons/js/dataTables.buttons.min.js"></script>
	<script src="<?php echo base_url().'files/';?>assets/plugins/DataTables/extensions/Buttons/js/buttons.bootstrap.min.js"></script>
	<script src="<?php echo base_url().'files/';?>assets/plugins/DataTables/extensions/Buttons/js/buttons.flash.min.js"></script>
	<script src="<?php echo base_url().'files/';?>assets/plugins/DataTables/extensions/Buttons/js/jszip.min.js"></script>
	<script src="<?php echo base_url().'files/';?>assets/plugins/DataTables/extensions/Buttons/js/pdfmake.min.js"></script>
	<script src="<?php echo base_url().'files/';?>assets/plugins/DataTables/extensions/Buttons/js/vfs_fonts.min.js"></script>
	<script src="<?php echo base_url().'files/';?>assets/plugins/DataTables/extensions/Buttons/js/buttons.html5.min.js"></script>
	<script src="<?php echo base_url().'files/';?>assets/plugins/DataTables/extensions/Buttons/js/buttons.print.min.js"></script>
	<script src="<?php echo base_url().'files/';?>assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
	<script src="<?php echo base_url().'files/';?>assets/plugins/DataTables/extensions/AutoFill/js/dataTables.autoFill.min.js"></script>
	<script src="<?php echo base_url().'files/';?>assets/plugins/DataTables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
	<script src="<?php echo base_url().'files/';?>assets/plugins/DataTables/extensions/KeyTable/js/dataTables.keyTable.min.js"></script>
	<script src="<?php echo base_url().'files/';?>assets/plugins/DataTables/extensions/RowReorder/js/dataTables.rowReorder.min.js"></script>
	<script src="<?php echo base_url().'files/';?>assets/plugins/DataTables/extensions/Select/js/dataTables.select.min.js"></script>
	<script src="<?php echo base_url().'files/';?>assets/plugins/gritter/js/jquery.gritter.js"></script>
	<script src="<?php echo base_url().'files/';?>assets/plugins/select2/dist/js/select2.min.js"></script>
	<script src="<?php echo base_url().'files/';?>assets/plugins/bootstrap-sweetalert/sweetalert.min.js"></script>
	<script src="<?php echo base_url().'files/';?>assets/plugins/parsley/dist/parsley.js"></script>
	<script src="<?php echo base_url().'files/';?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script src="<?php echo base_url().'files/';?>assets/plugins/dropzone/min/dropzone.min.js"></script>
	<?php include('External_Javascript.php'); ?>
	<script src="<?php echo base_url().'files/';?>assets/js/apps.min.js"></script>
	<script src="<?php echo base_url().'files/Script_JS/Regional_Get.js';?>"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
			<?php include('External_Parameter.php'); ?>
		});
	</script>
</body>
</html>
