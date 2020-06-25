<?php
	$module = $this->uri->segment(1);
	switch($module){
		
		case 'CCTV':
			echo '<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBuAxLFRGFX30wCyv-NxncopCMGiJNZkhI&libraries=geometry,places"></script>';
			echo '<script src="'.base_url().'files/assets/plugins/parsley/dist/parsley.js"></script>';
			echo '<script src="'.base_url().'files/Script_JS/CCTV.js"></script>';
			echo '<script src="'.base_url().'files/Script_JS/streamedian.min.js"></script>';
			echo '<script src="https://cdn.bootcss.com/babel-polyfill/7.0.0-beta.2/polyfill.min.js"></script>';
		break;
		case 'UMKM':
			echo '<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBuAxLFRGFX30wCyv-NxncopCMGiJNZkhI&libraries=geometry,places"></script>';
			echo '<script src="'.base_url().'files/assets/plugins/parsley/dist/parsley.js"></script>';
			echo '<script src="'.base_url().'files/Script_JS/UMKM.js"></script>';
			echo '<script src="https://cdn.bootcss.com/babel-polyfill/7.0.0-beta.2/polyfill.min.js"></script>';
		break;
		case 'Users':
			echo '<script src="'.base_url().'files/Script_JS/Users.js"></script>';
		break;
		
		case 'SummaryJawaBarat':
			echo '<script src="https://code.highcharts.com/highcharts.js"></script>';
			echo '<script src="https://code.highcharts.com/modules/variable-pie.js"></script>';
			echo '<script src="https://code.highcharts.com/modules/data.js"></script>';
			echo '<script src="https://code.highcharts.com/modules/drilldown.js"></script>';
			echo '<script src="'.base_url().'files/Script_JS/SummaryJawaBarat.js"></script>';
		break;
		
		case 'Pregnancy':
			echo '<script src="https://code.highcharts.com/highcharts.js"></script>';
			echo '<script src="https://code.highcharts.com/modules/variable-pie.js"></script>';
			echo '<script src="https://code.highcharts.com/modules/data.js"></script>';
			echo '<script src="https://code.highcharts.com/modules/drilldown.js"></script>';
			echo '<script src="'.base_url().'files/Script_JS/Pregnancy.js"></script>';
		break;
		
		default:
			/* google map */
			echo '<script src="http://d3js.org/topojson.v1.min.js"></script>';
			echo '<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBuAxLFRGFX30wCyv-NxncopCMGiJNZkhI&libraries=geometry,mapLibReadyHandler"></script>';
			echo '<script src="'.base_url().'files/assets/plugins/jstree/dist/jstree.min.js"></script>';
			echo '<script src="https://cdn.rawgit.com/nunof07/maps-marker-animate/v0.1.1/marker-animate.js"></script>';
			echo '<script src="'.base_url().'files/assets/plugins/google-map-marker-clusterer/markerclusterer.js"></script>';
			echo '<script type="text/javascript" src="http://jawj.github.io/OverlappingMarkerSpiderfier/bin/oms.min.js"></script>';
			echo '<link href="http://vjs.zencdn.net/7.0/video-js.min.css" rel="stylesheet">';
			echo '<script src="http://vjs.zencdn.net/7.0/video.min.js"></script>';
			echo '<script>
				  	var player = videojs("#cctv_streaming",{
				  		rtsp_config:{
				  			websocket_url:"wss://specforge.com/ws/"
				  		}
				  	}); 
				  </script>';
			echo '<script src="'.base_url().'files/assets/plugins/streamingvideo/polyfill/polyfill-7.0.0-beta.2.min.js"></script>';
			echo '<script src="'.base_url().'files/assets/plugins/streamingvideo/streamedian.min.js"></script>';
			echo '<script src="'.base_url().'files/Script_JS/dashboard_map.js"></script>';
			echo '<script src="'.base_url().'files/Script_JS/Load_Map_RegionAll.js"></script>';
			echo '<script src="'.base_url().'files/Script_JS/Load_Map_RegionJawaBarat.js"></script>';
		break;
	}
?>