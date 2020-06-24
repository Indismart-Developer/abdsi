<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Home</a></li>
        <li><a href="javascript:;">Pegaturan</a></li>
        <li><a href="<?php echo base_url('CCTV/ListCCTV');?>">CCTV</a></li>
        <li class="active"><?php echo($form_type == 'EDIT')? 'Edit':'Baru';?></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">CCTV
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
                        <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload">
                            <i class="fa fa-repeat"></i>
                        </a> -->
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse">
                            <i class="fa fa-minus"></i>
                        </a>
                    </div>
                    <h4 class="panel-title">Form <?php echo($form_type == 'EDIT')? 'Update':'Input';?> CCTV</h4>
                </div>
                <div class="panel-body panel-form">
                    <form class="form-horizontal form-bordered" data-parsley-validate id="form-umum" name="form-umum" method="post" action="<?php echo base_url('CCTV/Save'); ?>">
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2" for="map_canvas">Lokasi Map:</label>
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
                            <label class="control-label col-md-2 col-sm-2" for="location_name">Nama Lokasi * :</label>
                            <div class="col-md-10 col-sm-10">
                                <input class="form-control" type="text" id="location_name" name="location_name" data-parsley-required
                                    value="<?php if($form_type ==='EDIT'){echo $cctv->location_name;}?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2" for="location_detail">Detail Lokasi * :</label>
                            <div class="col-md-10 col-sm-10">
                                <textarea class="form-control" id="location_detail" name="location_detail" rows="2" data-parsley-required><?php if($form_type ==='EDIT'){echo $cctv->location_detail;}?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2" for="latitude">Latitude * :</label>
                            <div class="col-md-4 col-sm-4">
                                <input class="form-control" type="text" id="latitude" name="latitude" data-parsley-required
                                    value="<?php if($form_type ==='EDIT'){echo $cctv->latitude;}?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2" for="longitude">Longitude * :</label>
                            <div class="col-md-4 col-sm-4">
                                <input class="form-control" type="text" id="longitude" name="longitude" data-parsley-required
                                    value="<?php if($form_type ==='EDIT'){echo $cctv->longitude;}?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2" for="source">Sumber CCTV * :</label>
                            <div class="col-md-10 col-sm-10">
                                <input class="form-control" type="text" id="source" name="source" data-parsley-required
                                    value="<?php if($form_type ==='EDIT'){echo $cctv->source;}?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2"></label>
                            <div class="col-md-10 col-sm-10">
                                <?php 
                                if ($form_type=='EDIT'){
                                    echo '<input id="form_type" type="hidden" name="form_type" value="EDIT">
                                        <input type="hidden" id="id_cctv" name="id_cctv" value="'.$cctv->id_city_cctv.'">';
                                }else{
                                    echo '<input id="form_type" type="hidden" name="form_type" value="INPUT">';
                                }?>
                                <a name="back" class="btn btn-default m-r-5" href="<?php echo base_url('CCTV');?>">
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