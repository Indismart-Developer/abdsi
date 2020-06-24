<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pregnancy extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		if ($this->session->userdata('validated') == TRUE) 
		{ 
			previlege_check($this->uri->segment(1),$this->session->userdata('level')); 
		} else {
			redirect('', 'refresh');
		}
    }
	
	public function index()
	{
		$data['content'] = 'Pregnancy/List';
		$this->load->view('Template', $data);
	}
}
