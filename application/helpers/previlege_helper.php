<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function previlege_check($controller,$id_group)
{
	$CI =& get_instance();
	$CI->load->model('Model_UserGroup'); 
	$result=$CI->Model_UserGroup->_Check_Previlege($controller,$id_group);
	
	if ($result==FALSE) {
		redirect('Dashboard', 'refresh');
	}

}