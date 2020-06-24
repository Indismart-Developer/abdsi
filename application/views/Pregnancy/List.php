<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="<?php echo base_url(); ?>">Home</a></li>
				<li class="active">Data Pertanian</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Data Pertanian </h1>
			<!-- end page-header -->
			
			<div class="row">
                <!-- begin col-12 -->
                <div class="col-12">
                    <!-- begin panel -->
                    <div class="panel panel-inverse" data-sortable-id="form-stuff-5">
                        <div class="panel-body">
                            <form class="form-inline" action="/" method="POST">
								<div class="form-group m-r-10">
								Data Tahun
									<select class="form-control input-sm" id="filter_year" onChange="Filter()">
									<?php
										for ($i = 0; $i < 3; $i++) {
											$timestamp = date("Y") - $i;
											echo '<option value="'.$timestamp.'">'.$timestamp.'</option>';
										}
									?>
									</select>
								</div>
							</form>
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-6 -->
            </div>
		    <div class="row">		
		        <!-- begin col-6 -->
		        <div class="col-md-6">
                    <div class="panel panel-inverse" data-sortable-id="morris-chart-2">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            </div>
                            <h4 class="panel-title">Produksi Buah</h4>
                        </div>
                        <div class="panel-body">
                            <div id="jumlah_kehamilan"></div>
                        </div>
                    </div>
		        </div>
		        <!-- end col-6 -->
				<div class="col-md-6">
                    <div class="panel panel-inverse" data-sortable-id="morris-chart-5">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            </div>
                            <h4 class="panel-title">Presentase Produk Hasil Tani</h4>
                        </div>
                        <div class="panel-body">
                            <div id="kasus_keguguran"></div>
                        </div>
                    </div>
		        </div>
		        <!-- end col-6 -->
		    </div>
			<div class="row">
		        <!-- begin col-6 -->
		        <div class="col-md-12">
                    <div class="panel panel-inverse" data-sortable-id="morris-chart-2">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            </div>
                            <h4 class="panel-title">Produksi Beras</h4>
                        </div>
                        <div class="panel-body">
                            <div id="jumlah_persalinan"></div>
                        </div>
                    </div>
		        </div>
		    </div>
		    <!-- end row -->
			
			<div class="row">
				<!-- end col-6 -->
				<div class="col-md-6">
                    <div class="panel panel-inverse" data-sortable-id="morris-chart-5">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            </div>
                            <h4 class="panel-title">Produksi Jagung</h4>
                        </div>
                        <div class="panel-body">
                            <div id="status_persalinan_bayi"></div>
                        </div>
                    </div>
		        </div>
		        <!-- end col-6 -->
				<!-- end col-6 -->
				<div class="col-md-6">
                    <div class="panel panel-inverse" data-sortable-id="morris-chart-5">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            </div>
                            <h4 class="panel-title">Produksi Sayur</h4>
                        </div>
                        <div class="panel-body">
                            <div id="status_persalinan_ibu"></div>
                        </div>
                    </div>
		        </div>
		        <!-- end col-6 -->
			</div>
		
		</div>
		<!-- end #content -->