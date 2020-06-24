<?php
	$module = $this->uri->segment(1);
	switch($module){
		case 'CCTV':
			echo 'CCTV.init();';
		break;
		case 'UMKM':
			echo 'UMKM.init();';
		break;
		case 'Users':
			echo 'Users.init();';
		break;
		case 'Summary':
			echo 'Summary.init();';
		break;
		case 'Pregnancy':
			echo 'Pregnancy.init();';
		break;
		default: 
			echo 'DashboardMap.init();';
			echo 'TreeView.init();';
			echo 'FullscreenMap.init();';
		break;
	}
?>