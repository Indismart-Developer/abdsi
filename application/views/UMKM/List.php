<!-- begin #content -->
<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li>Pengaturan</li>
				<li class="active">Data UMKM</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Data <small>UMKM</small></h1>
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
                        <a href="<?php echo base_url('UMKM/Form')?>" class="btn btn-inverse btn-sm"><i class="fa fa-plus"></i> Tambah Data UMKM</a>
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
                            <h4 class="panel-title">Tabel Data UMKM</h4>
                        </div>
                        <div class="panel-body">
                            <table id="data-table-umkm" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama UMKM</th>
                                        <th>Klasifikasi Usaha</th>
                                        <th>Jenis Usaha</th>
                                        <th>Alamat</th>
                                        <th>Kota/Kab</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($list_umkm){
                                        foreach($list_umkm as $umkm){
                                            echo '<tr>
                                                <td>'.$umkm->BRAND.'</td>
                                                <td>'.$umkm->CATEGORY_NAME.'</td>
                                                <td>'.$umkm->TYPE_NAME.'</td>
                                                <td>'.$umkm->LOCATION_DETAIL.'</td>
                                                <td>'.$umkm->CITY_NAME.'</td>
                                                <td>
													<a href="'.base_url('UMKM/Form/'.$umkm->ID_UMKM).'" class="btn btn-white btn-xs m-r-5"><i class="fa fa-search"></i> View</a>
													<button class="btn btn-white btn-xs m-r-5" id="btn-del" onClick="Delete_Data('.$umkm->ID_UMKM.');"><i class="fa fa-trash"></i> Delete</button>
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