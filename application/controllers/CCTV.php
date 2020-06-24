<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CCTV extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
		$this->load->model('Model_CCTV');
		if ($this->session->userdata('validated') == TRUE) 
		{ 
			previlege_check($this->uri->segment(1),$this->session->userdata('level')); 
		} else {
			redirect('', 'refresh');
		}
    }

	public function index(){
			$data['content'] = 'CCTV/List';
			$data['list_cctv'] = $this->Model_CCTV->_Get_List_CCTV();
			$this->load->view('Template', $data);
	}

	public function Form($id = null){
		$data['content'] = 'CCTV/Form';
		if($id == null){
			$data['form_type'] = 'INPUT';
			$data['cctv'] = null;
		}else{
			$data['form_type'] = 'EDIT';
			$data['cctv'] = $this->Model_CCTV->_Get_CCTV($id);
			// print_r($data['cctv']);
			if($data['cctv'] == null){
				redirect(base_url('CCTV'));
				return;
			}
		}
		$this->load->view('Template', $data);
	}

	public function Save(){
		if($this->input->post('form_type') == "INPUT"){
			$id_cctv = $this->Model_CCTV->_Create_CCTV();
		}else if($this->input->post('form_type') == "EDIT"){
			$id_cctv = $this->input->post('id_cctv');
			$this->Model_CCTV->_Update_CCTV($id_cctv);
		}
		$action = $this->input->post('action');
		if($action === 'Save'){
			redirect(base_url('CCTV'));
		}else if($action === 'SaveContinue'){
			redirect(base_url('CCTV/Form/'.$id_cctv));
		}
	}
	
	public function Delete(){
		$id = $this->uri->segment(3);
		$this->Model_CCTV->_Delete_CCTV($id);
		redirect(base_url('CCTV'));
	}


}