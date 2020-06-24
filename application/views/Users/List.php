<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="<?php echo base_url(); ?>">Home</a></li>
				<li class="active">Users</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Data Users</h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
				<div class="col-md-12">
                    <p class="m-b-20">
                        <a href="<?php echo base_url('Users/Form')?>" class="btn btn-inverse btn-sm"><i class="fa fa-plus"></i> Tambah Data Users</a>
			        </p>
			    </div>
			</div>
			<div class="row">
			    <!-- begin col-12 -->
			    <div class="col-md-12">
			        <!-- begin panel -->
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">Tabel Data Users</h4>
                        </div>
                        <div class="panel-body">
                            <table id="data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Avatar</th>
										<th>Username</th>
                                        <th>Nama Lengkap</th>
                                        <th>Level</th>
										<th>Blokir</th>
										<th>Konfirmasi</th>
										<th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php if ($contents) : ?>
									<?php foreach($contents as $row) : ?>
									<tr>
										<td><img class="img-thumbnail" src="<?php echo base_url() . 'files/assets/img/' . $row->IMAGE; ?>" width="36"></td>
										<td><?php echo $row->USERNAME; ?></td>
										<td><?php echo $row->FULLNAME; ?></td>
										<td><?php echo $row->LEVEL_NAME; ?></td>
										<td><?php echo $row->BLOKIR; ?></td>
										<td><?php echo $row->CONFIRM; ?></td>
										<td>
											<a href="<?php echo base_url() . 'Users/Form/' . $row->ID_USER; ?>" class="btn btn-white btn-xs m-r-5"><i class="fa fa-search"></i> View</a>
											<button class="btn btn-white btn-xs m-r-5" id="btn-del" data-id="<?php echo $row->ID_USER; ?>"><i class="fa fa-trash"></i> Delete</button>
										</td>
									</tr>
									<?php endforeach; ?>
									<?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-12 -->
            </div>
            <!-- end row -->
		</div>
		<!-- end #content -->