<!-- begin #content -->
<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li>Pengaturan</li>
				<li class="active">Data CCTV</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Data <small>CCTV</small></h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
			    <!-- begin col-2 -->
			    <div class="col-md-12">
			        <!--<h5>
			            Aksi:
			        </h5>
                    <ul class="p-l-25 m-b-15">
                        <li>Per</li>
                        <li>Ability to fix the footer and left / right columns as well</li>
                        <li>z-Index ordering options</li>
                    </ul>-->
                    <p class="m-b-20">
                        <a href="<?php echo base_url('CCTV/Form')?>" class="btn btn-inverse btn-sm"><i class="fa fa-plus"></i> Tambah Data CCTV</a>
			        </p>
			    </div>
			    <!-- end col-2 -->
			    <!-- begin col-10 -->
			    <div class="col-md-12">
			        <!-- begin panel -->
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a> -->
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a> -->
                            </div>
                            <h4 class="panel-title">Tabel Data CCTV</h4>
                        </div>
                        <div class="panel-body">
                            <table id="data-table-cctv" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama Akses CCTV</th>
                                        <th>Detail Lokasi</th>
                                        <th>Latitude</th>
                                        <th>Longitude</th>
                                        <th>Tanggal Dibuat</th>
                                        <th>Publish</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($list_cctv){
                                        foreach($list_cctv as $cctv){
                                            if($cctv->created_date) $cctv->created_date = date("d-m-Y H:i:s", strtotime($cctv->created_date));
                                            if($cctv->modified_date) $cctv->modified_date = date("d-m-Y H:i:s", strtotime($cctv->modified_date)); 
                                            echo '<tr>
                                                <td>'.$cctv->location_name.'</td>
                                                <td>'.$cctv->location_detail.'</td>
                                                <td>'.$cctv->latitude.'</td>
                                                <td>'.$cctv->longitude.'</td>
                                                <td>'.$cctv->created_date.'</td>
                                                <td>'.$cctv->publish.'</td>
                                                <td>
													<a href="'.base_url('CCTV/Form/'.$cctv->id_city_cctv).'" class="btn btn-white btn-xs m-r-5"><i class="fa fa-search"></i> View</a>
													<button class="btn btn-white btn-xs m-r-5" id="btn-del" onClick="Delete_Data('.$cctv->id_city_cctv.');"><i class="fa fa-trash"></i> Delete</button>
												</td>
                                            </tr>';
                                        }    
                                    }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-10 -->
            </div>
            <!-- end row -->
		</div>
		<!-- end #content -->