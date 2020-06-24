<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->model('Model_Venue');
		if ($this->session->userdata('validated') == TRUE) 
		{ 
			previlege_check($this->uri->segment(1),$this->session->userdata('level')); 
		} else {
			redirect('', 'refresh');
		}
    }
	
	public function index()
	{
		$data['content'] = 'Dashboard/Map';
		$this->load->view('Template', $data);
	}
	
	function getDataLaporan(){
		header('Content-type: application/json');
		//only has published
		$response = Get_Stream('http://182.23.67.208/sorot_langkat/api/ssp/data_laporan/getLaporan');
		echo $response;
	}
	
	public function tes_data(){
		$url='http://gsb.langkatkab.net/api/bappeda/commandcenter/';
		$method='usulan_kec';
		$accesskey='3n56yvag71';
		$request= array();

		$table=callAPI(
			$endpoint=$url,
			$operation=$method,
			$accesskey,
			$parameter=$request,
			$callmethod='POST' // call option: GET, POST, REST, RESTFULL, RESTFULLPAR
		);
		if(isset($table['response']['data'][$method])) view_table($table['response'],$method);	
	}
	
	public function GetVenueLocation(){
		header('Content-type: application/json');
		$response = new StdClass();
		
		$data = $this->Model_Venue->_GetVenue();
		echo json_encode($data);
	}
	
	public function GetVillageLocation(){
		header('Content-type: application/json');
		$response = new StdClass();
		
		$data = $this->Model_Venue->_GetVillage();
		echo json_encode($data);
	}
}
