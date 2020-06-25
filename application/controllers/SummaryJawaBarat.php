<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SummaryJawaBarat extends CI_Controller {

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
		$data['contents'] = array(
			'table' => $this->table_planning()
		);
		$data['content'] = 'SummaryJawaBarat/List';
		$this->load->view('Template', $data);
	}
	
	public function table_planning(){
		$_POST['par']['limit'] = 10;
		$_POST['par']['offset'] = 1;
		$url       ='http://gsb.langkatkab.net/api/bappeda/commandcenter';
		$method    ='usulan_kec';
		$accesskey ='3n56yvag71';
		$request   =isset($_POST["par"])?$_POST["par"]:array();
		$api       = callAPI($endpoint=$url, $method, $accesskey, $request, 'POST');
		
		if ($api['response']['message'] == 'OK') {
			$data = $api['response']['data']['usulan_kec'];
			return $data;
		}
		
		return FALSE;
	}
	
	public function count_all() {
		$_POST['par']['range'] = 'all'; //minggu|bulan|all
        $url       = 'http://gsb.langkatkab.net/api/perizinan/commandcenter/';
        $method    = 'count_all';
        $accesskey = 'suc1ah2rkd';
        $request   = isset($_POST["par"]) ? $_POST["par"] : array();
        $api       = callAPI($url, $method, $accesskey, $request, 'POST');
		echo json_encode($api);
    }
	
	public function izin_all_limit() {
		$_POST['par']['limit']  = 5;
		$_POST['par']['offset'] = 10;
        $url       = 'http://gsb.langkatkab.net/api/perizinan/commandcenter/';
        $method    = 'izin_all_limit';
        $accesskey = '9wrw94ap55';
        $request   = isset($_POST["par"]) ? $_POST["par"] : array();
        $api       = callAPI($url, $method, $accesskey, $request, 'POST');
		echo json_encode($api);
    }
	
	public function izin_selesai() {
        $url       = 'http://gsb.langkatkab.net/api/perizinan/commandcenter/';
        $method    = 'izin_selesai';
        $accesskey = 'yse8ghlnab';
        $request   = isset($_POST["par"]) ? $_POST["par"] : array();
        $api       = callAPI($url, $method, $accesskey, $request, 'POST');
		//print_out($api);
		//print_out($api);
		if ($api['response']['message'] == 'OK') {
			$data = $api['response']['data']['izin_selesai'];
			return $data;
		}
		
		return FALSE;
    }
	
	public function izin_belum_ambil() {
        $url       = 'http://gsb.langkatkab.net/api/perizinan/commandcenter/';
        $method    = 'izin_belum_ambil';
        $accesskey = '2gl6a1x8f6';
        $request   = isset($_POST["par"]) ? $_POST["par"] : array();
        $api       = callAPI($url, $method, $accesskey, $request, 'POST');
		echo json_encode($api);
    }
	
	public function izin_proses() {
        $url       = 'http://gsb.langkatkab.net/api/perizinan/commandcenter/';
        $method    = 'izin_proses';
        $accesskey = '1220223lsp';
        $request   = isset($_POST["par"]) ? $_POST["par"] : array();
        $api       = callAPI($url, $method, $accesskey, $request, 'POST');
		//print_out($api);
		if ($api['response']['message'] == 'OK') {
			$data = $api['response']['data']['izin_proses'];
			return $data;
		}
		
		return FALSE;
    }
}
