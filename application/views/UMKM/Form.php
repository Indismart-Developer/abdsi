<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Home</a></li>
        <li><a href="javascript:;">Pegaturan</a></li>
        <li><a href="<?php echo base_url('UMKM');?>">Data UMKM</a></li>
        <li class="active"><?php echo($form_type == 'EDIT')? 'Edit':'Baru';?></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Data UMKM
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
                    <h4 class="panel-title">Form <?php echo($form_type == 'EDIT')? 'Update':'Input';?> UMKM</h4>
                </div>
                <div class="panel-body panel-form">
                    <form class="form-horizontal form-bordered" data-parsley-validate id="form-umum" name="form-umum" method="post" action="<?php echo base_url('UMKM/Save'); ?>">
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2" for="provinces">Provinsi * :</label>
                            <div class="col-md-10 col-sm-10">
								<input type="hidden" id="provinces_set" value="<?php if($form_type ==='EDIT'){echo $umkm->PROVINCE_ID;}?>">
								<select class="form-control select2me" id="provinces" name="provinces" data-parsley-required>
									<option value="">[ Pilih Provinsi ]</option>
								</select>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-2 col-sm-2" for="cities">Kabupaten/Kota * :</label>
                            <div class="col-md-10 col-sm-10">
								<input type="hidden" id="cities_set" value="<?php if($form_type ==='EDIT'){echo $umkm->CITY_ID;}?>">
								<select class="form-control select2me" id="cities" name="cities" data-parsley-required>
									<option value="">[ Pilih Kota/Kabupaten ]</option>
								</select>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-2 col-sm-2" for="brand">Brand UMKM * :</label>
                            <div class="col-md-10 col-sm-10">
                                <input class="form-control" type="text" id="brand" name="brand" data-parsley-required
                                    value="<?php if($form_type ==='EDIT'){echo $umkm->BRAND;}?>"/>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-2 col-sm-2" for="map_canvas">Lokasi:</label>
                            <div class="col-md-10 col-sm-10">
                                <input type="text" class="form-control" id="keyword"></br>
                                <div id="map_canvas" class="gmaps" style="height:300px;"></div>
                                <p class="help-block">
                                    <span id="preview_address"></span>
                                    <br>
                                    <span class="label label-success label-sm" id="preview_position"></span>
                                </p>
                                <button id="choose_location" type="button" class="btn btn-success">Pilih Lokasi Ini</button>
                                <input type="hidden" id="p_lat">
                                <input type="hidden" id="p_long">
                                <input type="hidden" id="p_desc">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2" for="location_detail">Jalan * :</label>
                            <div class="col-md-10 col-sm-10">
                                <textarea class="form-control" id="location_detail" name="location_detail" rows="2" data-parsley-required><?php if($form_type ==='EDIT'){echo $umkm->LOCATION_DETAIL;}?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2" for="latitude">Latitude * :</label>
                            <div class="col-md-4 col-sm-4">
                                <input class="form-control" type="text" id="latitude" name="latitude" data-parsley-required
                                    value="<?php if($form_type ==='EDIT'){echo $umkm->LAT;}?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2" for="longitude">Longitude * :</label>
                            <div class="col-md-4 col-sm-4">
                                <input class="form-control" type="text" id="longitude" name="longitude" data-parsley-required
                                    value="<?php if($form_type ==='EDIT'){echo $umkm->LONG;}?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2" for="category">Kategori Usaha * :</label>
                            <div class="col-md-10 col-sm-10">
								<select class="form-control select2me" id="category" name="category" data-parsley-required>
									<option value="">[ Pilih Kategori Usaha]</option>
									<?php
									$selected_category = "";
									foreach($kategori as $row_kategori){ 
									if($form_type ==='EDIT'){
										if($umkm->CATEGORY == $row_kategori->category_id){
											$selected_category = "selected";
										}else{
											$selected_category = "";
										}
									}
									?>
									<option value="<?php echo $row_kategori->category_id;?>" <?php echo $selected_category;?>><?php echo $row_kategori->name;?></option>
									<?php } ?>
								</select>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-2 col-sm-2" for="type">Jenis Usaha * :</label>
                            <div class="col-md-10 col-sm-10">
								<select class="form-control select2me" id="type" name="type" data-parsley-required>
									<option value="">[ Pilih Tipe Usaha]</option>
									<?php 
									$selected_tipe = "";
									foreach($tipe as $row_tipe){ 
									if($form_type ==='EDIT'){
										if($umkm->TYPE == $row_tipe->type_id){
											$selected_tipe = "selected";
										}else{
											$selected_tipe = "";
										}
									}
									?>
									<option value="<?php echo $row_tipe->type_id;?>" <?php echo $selected_tipe;?>><?php echo $row_tipe->name;?></option>
									<?php } ?>
								</select>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-2 col-sm-2" for="owner">Nama Pemilik * :</label>
                            <div class="col-md-10 col-sm-10">
                                <input class="form-control" type="text" id="owner" name="owner" data-parsley-required
                                    value="<?php if($form_type ==='EDIT'){echo $umkm->OWNER;}?>"/>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-2 col-sm-2" for="phone">Nomor Telfon Pemilik * :</label>
                            <div class="col-md-10 col-sm-10">
                                <input class="form-control" type="text" id="phone" name="phone" data-parsley-required
                                    value="<?php if($form_type ==='EDIT'){echo $umkm->PHONE;}?>"/>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-2 col-sm-2" for="since">Tanggal Berdiri UMKM * :</label>
                            <div class="col-md-3 col-sm-3">
								<div class="input-group date" id="since" data-date-format="yyyy-mm-dd">
									<input type="text" id="since" name="since" value="<?php if($form_type ==='EDIT'){echo $umkm->SINCE;}?>" class="form-control" placeholder="Pilih Tanggal" data-parsley-required readonly />
									<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
								</div>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-2 col-sm-2" for="effect">Dampak Covid19 * :</label>
                            <div class="col-md-10 col-sm-10">
								<select class="form-control select2me" id="effect" name="effect" data-parsley-required>
									<option value="">[ Pilih Dampak]</option>
									<?php 
									$selected_effect = "";
									foreach($dampak as $row_dampak){ 
									if($form_type ==='EDIT'){
										if($umkm->EFFECT_ID == $row_dampak->effect_id){
											$selected_effect = "selected";
										}else{
											$selected_effect = "";
										}
									}
									?>
									<option value="<?php echo $row_dampak->effect_id;?>" <?php echo $selected_effect;?>><?php echo $row_dampak->name;?></option>
									<?php } ?>
								</select>
                            </div>
                        </div>
						<?php if ($form_type=='EDIT'){ ?>
						<div class="form-group">
                            <label class="control-label col-md-2 col-sm-2">Upload Image :</label>
                            <div class="col-md-10 col-sm-10">
								<div class="col-md-12 col-sm-12 dropzone needsclick" id="upload-file">
									<div class="dz-message needsclick">
										Seret File Dari Folder Ke Area Ini, Atau Kilk Untuk Mengambil File Dari Folder.<br />
										<span class="dz-note needsclick">
											(Hanya Boleh 1 File Dengan Extensi Yang Diizinkan <code>png,jpg</code>.Dan Ukuran File Tidak Lebih Dari <strong>1 MB (1024 KB)</strong>)
										</span>
									</div>
								</div>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-2 col-sm-2">Image Preview :</label>
                            <div class="col-md-10 col-sm-10">
								<?php
								if(!empty($umkm->IMAGE)){
									$src = $umkm->IMAGE;
								}else{
									$src = 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6c/No_image_3x4.svg/1200px-No_image_3x4.svg.png';
								}
								?>
								<img src="<?php echo $src;?>" id="img_preview" class="media-object" width="240px">
                            </div>
                        </div>
						<?php } ?>
						
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2"></label>
                            <div class="col-md-10 col-sm-10">
                                <?php 
                                if ($form_type=='EDIT'){
                                    echo '<input id="form_type" type="hidden" name="form_type" value="EDIT">
                                        <input type="hidden" id="ID_UMKM" name="ID_UMKM" value="'.$umkm->ID_UMKM.'">';
                                }else{
                                    echo '<input id="form_type" type="hidden" name="form_type" value="INPUT">
									    <input type="hidden" id="ID_UMKM" name="ID_UMKM" value="">';
                                }?>
                                <a name="back" class="btn btn-default m-r-5" href="<?php echo base_url('UMKM');?>">
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