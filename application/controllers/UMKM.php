<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UMKM extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
		$this->load->model('Model_UMKM');
		if ($this->session->userdata('validated') == TRUE) 
		{ 
			previlege_check($this->uri->segment(1),$this->session->userdata('level')); 
		} else {
			redirect('', 'refresh');
		}
    }

	public function index(){
			$data['content'] = 'UMKM/List';
			$data['list_umkm'] = $this->Model_UMKM->_Get_List_UMKM();
			$this->load->view('Template', $data);
	}

	public function Form($id = null){
		$data['content'] = 'UMKM/Form';
		$data['kategori'] = $this->Model_UMKM->_Get_List_Kategori();
		$data['tipe'] = $this->Model_UMKM->_Get_List_Tipe();
		$data['dampak'] = $this->Model_UMKM->_Get_List_Dampak();
		if($id == null){
			$data['form_type'] = 'INPUT';
			$data['umkm'] = null;
		}else{
			$data['form_type'] = 'EDIT';
			$data['umkm'] = $this->Model_UMKM->_Get_UMKM($id);
			if($data['umkm'] == null){
				redirect(base_url('UMKM'));
				return;
			}
		}
		$this->load->view('Template', $data);
	}

	public function Save(){
		$ID_UMKM = $this->Model_UMKM->_Save();
		$action = $this->input->post('action');
		if($action === 'Save'){
			redirect(base_url('UMKM'));
		}else if($action === 'SaveContinue'){
			redirect(base_url('UMKM/Form/'.$ID_UMKM));
		}
	}
	
	public function Upload()
	{
		date_default_timezone_set("Asia/Jakarta");
		$ID_UMKM = $_POST['ID_UMKM'];
		
		$targetDir = './document_data/'.$ID_UMKM.'/'; //Save File
		if (!file_exists($targetDir)) {
			@mkdir($targetDir, 0777, true);
            @chmod('./document_data/', 0777);
            @chmod($targetDir, 0777);
		}else{
            @chmod($targetDir, 0777);
		}
		$config['upload_path']   = $targetDir;
        $config['allowed_types'] = 'gif|jpg|png';
		$config['file_name'] = $ID_UMKM;
        $config['overwrite'] = TRUE;
        $this->load->library('upload',$config);

        if($this->upload->do_upload('file')) {
        	$file_name_set = base_url().'document_data/'.$ID_UMKM.'/'.$this->upload->data('file_name');

			$response = $this->Model_UMKM->_Update_Image($file_name_set,$ID_UMKM);
        	if ($response) {
        		$res['status'] = 'success';
        		$res['message'] = 'File berhasil disimpan.';
        		$res['file'] = $file_name_set;
        	} else {
        		$res['status'] = 'failed';
        		$res['message'] = 'File gagal disimpan.';
				$res['file'] = "";
        	}
        } else {
        	$res['status'] = 'failed';
        	$res['message'] = $this->upload->display_errors();
			$res['file'] = "";
        }

        echo json_encode($res); exit();
	}

	
	public function Delete(){
		$id = $this->uri->segment(3);
		$this->Model_UMKM->_Delete_UMKM($id);
		redirect(base_url('UMKM'));
	}


}