<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
		$this->load->model('Model_Users');
		if ($this->session->userdata('validated') == TRUE) 
		{ 
			previlege_check($this->uri->segment(1),$this->session->userdata('level')); 
		} else {
			redirect('', 'refresh');
		}
    }
	
	public function index()
	{
		$data['content'] = 'Users/List';
		$data['contents'] = $this->Model_Users->_Get_List();
		$this->load->view('Template', $data);
	}
	
	public function Form($id = null) 
	{
		$data['content'] = 'Users/Form';
		$data['levels'] = $this->Model_Users->_Get_Select_Group();
		
		if($id == null){
			$data['form_type'] = 'INPUT';
			$data['users'] = null;
		}else{
			$data['form_type'] = 'EDIT';
			$data['users'] = $this->Model_Users->_Get_List_Edit($id);
			if($data['users'] == null){
				redirect(base_url() . 'Users');
				return;
			}
		}
		
		$this->load->view('Template', $data);
	}
	
	public function Save() {
		if (!$this->input->post()) {
			redirect(base_url() . 'Users');
		}
		
		if($this->input->post('form_type') == "INPUT"){
			$id_users = $this->Model_Users->_Create_Users();
		}else if($this->input->post('form_type') == "EDIT"){
			$id_users = $this->input->post('id_users');
			$this->Model_Users->_Update_Users($id_users);
		}
		$action = $this->input->post('action');
		if($action === 'Save'){
			redirect(base_url('Users'));
		}else if($action === 'SaveContinue'){
			redirect(base_url('Users/Form/'.$id_users));
		}
	}
	
	public function Delete() {
		if (!$this->input->post()) {
			redirect(base_url() . 'Users');
		}
		
		$id = ($this->input->post('id')) ? $this->input->post('id') : 0 ;
		$query = $this->db->delete('m_users', array('ID_USER' => $id));
		
		if ($query) {
			echo json_encode(array(
				'status' => TRUE
			));
		} else {
			echo json_encode(array(
				'status' => FALSE
			));
		}
	}
	
}
