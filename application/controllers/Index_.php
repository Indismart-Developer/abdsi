<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index_ extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
		$this->load->model('Model_Users');
    }
	
	public function index()
	{
		$this->load->view('Users/Login');
	}
	
	public function Validate_Login(){
		$data = $this->Model_Users->validate_login();
		echo json_encode($data);
	}
	
	public function Logout()
	{	
		$this->session->unset_userdata('validated');
		session_destroy();
		redirect('');
	}
}
