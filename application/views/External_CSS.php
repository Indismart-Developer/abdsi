<?php
	$module = $this->uri->segment(1);
	switch($module){
		case 'Summary':
			echo '<link href="'.base_url().'files/assets/plugins/nvd3/build/nv.d3.css" rel="stylesheet" />';
			echo '<link href="'.base_url().'files/assets/plugins/morris/morris.css" rel="stylesheet" />';
		break;
		
		default: 
			echo '<link href="'.base_url().'files/assets/plugins/jstree/dist/themes/default/style.min.css" rel="stylesheet" />';
			echo '<link href="'.base_url().'files/Script_CSS/dashboard_map.css" rel="stylesheet" />';
		break;
		
		
	}
?>