	<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<div id="content" class="content content-full-width">
			<div class="map">
                <div id="google-map-default" class="height-full width-full"></div>
            </div>
		</div>
		<!-- end #content -->
		
        <!-- begin theme-panel -->
        <div class="theme-panel">
            <a href="javascript:;" data-click="theme-panel-expand" class="theme-collapse-btn"><i class="ion-ios-cog"></i></a>
            <div class="theme-panel-content">
                <h5 class="m-t-0">Filter Map</h5>
				<div id="jstree-checkable-map"></div>
				<div class="divider"></div>
                <ul class="theme-list clearfix">
                    <li class="active"><a href="javascript:;" class="bg-grey" data-theme="default" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Default" data-map-theme="default">&nbsp;</a></li>
                    
                    <li><a href="javascript:;" class="bg-purple" data-theme="purple" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Flat" data-map-theme="flat">&nbsp;</a>
                    </li>
                    
                    <li><a href="javascript:;" class="bg-green" data-theme="green" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Turquoise Water" data-map-theme="turquoise-water">&nbsp;</a></li>
                    
                    <li><a href="javascript:;" class="bg-blue" data-theme="orange" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Ice Blue" data-map-theme="icy-blue">&nbsp;</a></li>

                    <li><a href="javascript:;" class="bg-red" data-theme="red" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Dark Red" data-map-theme="dark-red">&nbsp;</a></li>
                    
                    <li><a href="javascript:;" class="bg-black" data-theme="black" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Cobalt" data-map-theme="cobalt">&nbsp;</a></li>
                </ul>
                <div class="divider"></div>
                <div class="row m-t-10">
                    <div class="col-md-12">
                        <a data-click="fullscreen-map" class="btn btn-inverse btn-block btn-sm"><i class="ion-arrow-expand m-r-3"></i> Full Map</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end theme-panel -->
		
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-primary btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
		
		<div class="modal fade" id="StreamCCTVModal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h4 class="modal-title" id="cctv_title"></h4>
					</div>
					<div class="modal-body">
						<video id="cctv_streaming" class="video-js vjs-default-skin" height="360" width="570px" controls preload="none" autoplay muted>
							<source src="" type="application/x-mpegURL">
						</video>
					</div>
					<div class="modal-footer">
						<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
					</div>
				</div>
			</div>
		</div>