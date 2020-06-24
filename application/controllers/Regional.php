<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regional extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
		$this->load->model('Model_Regional');
    }
	
	function Get_Provinces(){
		$set_id = $this->input->post('set_id');
		$content = '';
		$data = $this->Model_Regional->_GetDataProvinces();
		$content .= '<option value="">[ Pilih Provinsi ]</option>';
		foreach($data as $row){
			if($set_id == $row->id){
				$selected = 'selected';
			}else{
				$selected = '';
			}
			$content .= '<option value="'.$row->id.'" '.$selected.'>'.$row->name.'</option>';
		}
		echo $content;
	}
	
	function Get_Regency(){
		$set_id = $this->input->post('set_id');
		$province = $this->input->post('province');
		$content = '';
		$data = $this->Model_Regional->_GetDataRegency($province);
		$content .= '<option value="">[ Pilih Kota/Kabupaten ]</option>';
		foreach($data as $row){
			if($set_id == $row->id){
				$selected = 'selected';
			}else{
				$selected = '';
			}
			$content .= '<option value="'.$row->id.'" '.$selected.'>'.$row->name.'</option>';
		}
		echo $content;
	}
}
