<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
		<li><a href="<?php echo base_url(); ?>">Home</a></li>
		<li><a href="<?php echo base_url() . 'Users'; ?>">Users</a></li>
		<li class="active">Form Users</li>
	</ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Data Users
        <small><?php echo($form_type == 'EDIT')? 'Edit':'Baru';?></small>
    </h1>
    <!-- end page-header -->
    <!-- begin row -->
    <div class="row">
        <!-- begin col-12 -->
        <div class="col-md-12">
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse">
                            <i class="fa fa-minus"></i>
                        </a>
                    </div>
                    <h4 class="panel-title">Form <?php echo($form_type == 'EDIT')? 'Update':'Input';?> Users</h4>
                </div>
                <div class="panel-body panel-form">
                    <form class="form-horizontal form-bordered" data-parsley-validate id="form-umum" name="form-umum" method="post" action="<?php echo base_url('Users/Save'); ?>">
						<div class="form-group">
							<label class="control-label col-md-2 col-sm-2" for="location_name">Level * :</label>
							<div class="col-md-4 col-sm-1">
								<?php
                                    if ($levels) {
                                        $options_levels = array('' => '[ Pilih ]');
                                        foreach ($levels as $level) {

                                            $options_levels[$level->LEVEL_ID] = $level->LEVEL_NAME;
                                        }
                                        echo form_dropdown('levels', $options_levels, (($users) ? $users->LEVEL : ''), 'class="form-control" id="levels" data-parsley-required') . "\r\n";
                                    }
                                ?>
							</div>
						</div>
						<div class="form-group">
                            <label class="control-label col-md-2 col-sm-2" for="location_name">Nama Lengkap * :</label>
                            <div class="col-md-4 col-sm-1">
                                <input class="form-control" type="text" id="fullname" name="fullname" value="<?php echo (($users) ? $users->FULLNAME : ''); ?>" data-parsley-required />
                            </div>
                        </div>
						<?php if ($form_type=='INPUT') : ?>
						<div class="form-group">
                            <label class="control-label col-md-2 col-sm-2" for="location_name">Username * :</label>
                            <div class="col-md-4 col-sm-1">
                                <input class="form-control" type="text" id="username" name="username" value="" data-parsley-required />
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-2 col-sm-2" for="location_name">Password * :</label>
                            <div class="col-md-4 col-sm-1">
                                <input class="form-control" type="password" id="password" name="password" value="" data-parsley-required />
                            </div>
                        </div>
						<?php endif; ?>
						<?php if ($form_type=='EDIT') : ?>
						<div class="form-group">
                            <label class="control-label col-md-2 col-sm-2" for="location_name">Blokir :</label>
							<div class="col-md-2 col-sm-2">
							<?php
								$blokir = array(
                                    'N' => 'Tidak',
									'Y' => 'Ya',
                                );
                                echo form_dropdown('blokir', $blokir, (($users) ? $users->BLOKIR : ''), 'class="form-control" id="blokir"') . "\r\n";
                            ?>
							</div>
						</div>
						<div class="form-group">
                            <label class="control-label col-md-2 col-sm-2" for="location_name">CONFIRM :</label>
							<div class="col-md-2 col-sm-2">
							<?php
								$confirm = array(
                                    'N' => 'Tidak',
									'Y' => 'Ya',
                                );
                                echo form_dropdown('confirm', $confirm, (($users) ? $users->CONFIRM : ''), 'class="form-control" id="confirm"') . "\r\n";
                            ?>
							</div>
						</div>
						<?php endif; ?>
						<div class="form-group">
                            <label class="control-label col-md-2 col-sm-2"></label>
                            <div class="col-md-10 col-sm-10">
                                <?php 
                                if ($form_type=='EDIT'){
                                    echo '<input id="form_type" type="hidden" name="form_type" value="EDIT">
                                        <input type="hidden" id="id_users" name="id_users" value="'.$users->ID_USER.'">';
                                }else{
                                    echo '<input id="form_type" type="hidden" name="form_type" value="INPUT">';
                                }?>
                                <a name="back" class="btn btn-default m-r-5" href="<?php echo base_url('Users');?>">
                                    <i class="fa fa-angle-left"></i> Kembali
                                </a>
                                <button type="submit" name="action" class="btn btn-primary m-r-5" value="Save"><i class="fa fa-check"></i> Simpan</button>
                                <button type="submit" name="action" class="btn btn-warning" value="SaveContinue"><i class="fa fa-check-square-o"></i> Simpan & Lanjutkan Edit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-12 -->
    </div>
    <!-- end row -->
</div>
<!-- end #content -->