<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="<?php echo base_url(); ?>">Home</a></li>
				<li class="active">Data Kependudukan</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Data Kependudukan</h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
				<!-- begin col-3 -->
				<div class="col-md-4 col-sm-6">
					<div class="widget widget-stats bg-gradient-blue">
						<div class="stats-icon"><i class="ion-ios-world"></i></div>
						<div class="stats-info">
							<h4>JUMLAH KECAMATAN</h4>
							<p id="p_jumlah_kecamatan">0</p>	
						</div>
						<div class="stats-link">
							<a href="javascript:;">&nbsp;</a>
						</div>
					</div>
				</div>
				<!-- end col-3 -->
				<!-- begin col-3 -->
				<div class="col-md-4 col-sm-6">
					<div class="widget widget-stats bg-gradient-aqua">
						<div class="stats-icon"><i class="ion-ios-pie-outline"></i></div>
						<div class="stats-info">
							<h4>JUMLAH KELURAHAN/DESA</h4>
							<p id="p_jumlah_village">0</p>		
						</div>
						<div class="stats-link">
							<a href="javascript:;">&nbsp;</a>
						</div>
					</div>
				</div>
				<!-- end col-3 -->
				<!-- begin col-3 -->
				<div class="col-md-4 col-sm-6">
					<div class="widget widget-stats bg-gradient-purple">
						<div class="stats-icon"><i class="ion-person-stalker"></i></div>
						<div class="stats-info">
							<h4>JUMLAH PENDUDUK</h4>
							<p id="p_jumlah_penduduk">0</p>
						</div>
						<div class="stats-link">
							<a href="javascript:;">&nbsp;</a>
						</div>
					</div>
				</div>
				<!-- end col-3 -->
			</div>
			
		    <div class="row">
		        <!-- begin col-6 -->
		        <div class="col-md-6">
                    <div class="panel panel-inverse" data-sortable-id="morris-chart-2">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            </div>
                            <h4 class="panel-title">Presentase Penduduk Berdasarkan Jenis Kelamin</h4>
                        </div>
                        <div class="panel-body">
                            <div id="presentase_penduduk_jenis_kelamin"></div>
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
                            <h4 class="panel-title">Jumlah Penduduk Per Kecamatan Berdasarkan Jenis Kelamin</h4>
                        </div>
                        <div class="panel-body">
                            <div id="PendudukJenisKelaminKecamatan"></div>
                        </div>
                    </div>
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
                            <h4 class="panel-title">Jumlah Penduduk Menurut Kecamatan (Jiwa)</h4>
                        </div>
                        <div class="panel-body">
                            <div id="penduduk_per_kecamatan"></div>
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
                            <h4 class="panel-title">Jumlah Penduduk Menurut Kelurahan (Jiwa)</h4>
                        </div>
                        <div class="panel-body">
                            <div id="penduduk_per_kelurahan"></div>
                        </div>
                    </div>
		        </div>
		        <!-- end col-6 -->
		    </div>
		    <!-- end row -->
		
		</div>
		<!-- end #content -->