<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stream_Data extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
		$this->load->model('Model_CCTV');
		$this->load->model('Model_Summary');
		$this->load->model('Model_Pregnancy');
		if ($this->session->userdata('validated') != TRUE) 
		{ 
			redirect('', 'refresh');
		}
    }
	
	function getDataCCTV(){
		header('Content-type: application/json');
		$response = new StdClass();
		
		$data = $this->Model_CCTV->_GetDataCCTV();
		
		$response->status  = TRUE;
		$response->message = '';
		$response->result  = $data;
		
		echo json_encode($response);
	}
	
	function GetDataSummary(){
		header('Content-type: application/json');
		$response = new StdClass();
		
		$data = $this->Model_Summary->_GetDataSummary();
		
		$response->status  = TRUE;
		$response->message = '';
		$response->result  = $data;
		
		echo json_encode($response);
	}
	
	function GetDataKelurahan(){
		header('Content-type: application/json');
		$response = new StdClass();
		
		$data = $this->Model_Summary->_GetDataKelurahan();
		
		$response->status  = TRUE;
		$response->message = '';
		$response->result  = $data;
		
		echo json_encode($response);
	}
	
	function GetDataSummaryPregnancy(){
		header('Content-type: application/json');
		$response = new StdClass();
		
		$data = $this->Model_Pregnancy->_GetDataSummaryPregnancy();
		
		$response->status  = TRUE;
		$response->message = '';
		$response->result  = $data;
		
		echo json_encode($response);
	}
	
}