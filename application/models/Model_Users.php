<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: 
* Description: Login model class
*/
class Model_Users extends CI_Model{
    function __construct(){
        parent::__construct();
    }
	
	public function validate_login(){
		date_default_timezone_set("Asia/Jakarta");
		$today = date("Y-m-d H:i:s");
		$ip_address = $this->input->ip_address();  //IP_ADDRESS
		$user_agent = $this->input->user_agent();  //USER_AGENT

        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));
        
        $this->db->where('USERNAME', $username);
		$this->db->where('PASSWORD', MD5($password));
		$this->db->where('BLOKIR', 'N');
		$this->db->where('CONFIRM', 'Y');

        $query = $this->db->get('m_users');

        if($query->num_rows() == 1)
        {
            $row = $query->row();
            $data = array(
					'id_user' => $row->ID_USER,
                    'username' => $row->USERNAME,
                    'nama_lengkap' => $row->FULLNAME,
					'level' => $row->LEVEL,
					'icon_user' => $row->IMAGE,
                    'blokir' => $row->BLOKIR,
                    'validated' => TRUE
                    );
            $this->session->set_userdata($data);
			
			//LOGIN SUCCESS ---------------------------------------
			$data = array(  
			  'USERNAME'=>$row->USERNAME,
			  'LOGIN_DATE'=>$today,
			  'IP_ADDRESS'=>$ip_address,
			  'DETAIL_LOGIN'=>$user_agent,
			  'LOGIN_STATUS'=>'1',
			  'NOTES'=>'Username & Password Match !'
			);  
			$this->db->insert('t_login_history',$data);
			//-----------------------------------------------------
			
			$response = array('status' => 'success', 'msg' => 'Login Berhasil...!');
            return $response;
        }
		
		//LOGIN FAILED ---------------------------------------
		$this->db->where('USERNAME', $username);
		$query=$this->db->get('m_users');
		if($query->num_rows() == 1)
        {
			$row_ = $query->row();
			$data = array(  
			'USERNAME'=>$row_->USERNAME,
			'LOGIN_DATE'=>$today,
			'IP_ADDRESS'=>$ip_address,
			'DETAIL_LOGIN'=>$user_agent,
			'LOGIN_STATUS'=>'0',
			'NOTES'=>'Wrong Password !'
			);  
			$this->db->insert('t_login_history',$data);
			$response = array('status' => 'error', 'msg' => 'Kata Sandi Salah...');
            return $response;
		}else{
			$data = array(  
			'USERNAME'=>$username,
			'LOGIN_DATE'=>$today,
			'IP_ADDRESS'=>$ip_address,
			'DETAIL_LOGIN'=>$user_agent,
			'LOGIN_STATUS'=>'0',
			'NOTES'=>'User & Password Not Found!'
			);  
			$this->db->insert('t_login_history',$data);
			$response = array('status' => 'error', 'msg' => 'Akun Anda Tidak Ditemukan...');
            return $response;
		}
		//-----------------------------------------------------
			
        
    }
	
	function _RegisterUser(){ 	
		$firstname = $this->input->post('firstname');    
		$lastname = $this->input->post('lastname');    
		$company = $this->input->post('company');    
		$phone = $this->input->post('phone');    
		$website = $this->input->post('website');    
		$email = $this->input->post('email');    
		$password = md5($this->input->post('confirmpass'));    
		$newsletter = $this->input->post('newsletter');  
		
		//Check Email
		$this->db->where('USERNAME',$email);
		$query=$this->db->get('m_users');
		
		if($query->num_rows() != 1)
        {
			$data = array(  
				'USERNAME'		=>$email,
				'FULLNAME'		=>$firstname." ".$lastname,
				'COMPANY'		=>$company,
				'PHONE_NUMBER'	=>$phone,
				'WEBSITE'		=>$website,
				'PASSWORD'		=>$password,
				'LEVEL'			=>'4',
				'NEWS_LETTER'	=>$newsletter,
				'BLOKIR'		=>'N',
				'CONFIRM'		=>'N'
			);  
			$this->db->insert('m_users',$data);
			return true;
		}else{
			return false;
		}
    }
	
	
	
	public function _Get_Mail($email){
		error_reporting(0);
		$this->db->where('USERNAME', $email);
		$query=$this->db->get('m_users');
		return $query->row();
	}
	
	public function UpdateConfirmationAccess($email){
		$data = array(  
			'CONFIRM'=>'Y'
		);  
		
		$this->db->where('USERNAME',$email);
		$this->db->update('m_users',$data);
	}
	
	public function _UpdatePassword(){
		$user_id = $this->security->xss_clean($this->input->post('user_id'));
		$password = $this->security->xss_clean($this->input->post('password'));
		$data = array(  
			'PASSWORD'=>md5($password)
		);  
		
		$this->db->where('ID_USER',$user_id);
		$this->db->update('m_users',$data);
	}
	
	
	public function _Check_Availability(){
		date_default_timezone_set("Asia/Jakarta");
		$today = date("Y-m-d H:i:s");
		
		$this->db->where('EMAIL', $this->input->post('email'));
		$this->db->where('STATUS', 'unread');

        $query = $this->db->get('t_request_space');

        if($query->num_rows() == 0)
        {
			$data = array(  
				'NAME'=>$this->input->post('name'),
				'EMAIL'=>$this->input->post('email'),
				'NUMBER'=>$this->input->post('phone'),
				'REQUEST_DATE'=>$today,
				'STATUS'=>'Unread'
			);  
			$this->db->insert('t_request_space',$data);
			return true;
		}else{
			
			return false;
		}
	}
	
	function _Get_List(){
		$query = $this->db->query("SELECT *,(SELECT LEVEL_NAME FROM m_users_level WHERE LEVEL_ID = a.`LEVEL`) AS LEVEL_NAME FROM m_users a ORDER BY a.ID_USER ASC");
		return $query->result();
	}
	
	function _Get_List_Edit($id){
		$this->db->where('ID_USER',$id);
		$query=$this->db->get('m_users');
		return $query->row();
	}
	
	public function _Get_Select_Group(){
		$query = $this->db->query('SELECT * FROM m_users_level ORDER BY LEVEL_ID DESC');
		return $query->result();
	}
	
	function _Delete($id)
	{	
		$this->db->where('ID_USER', $id);
		$this->db->delete('m_users');
	}
	
	function Get_Data(){
    $query = $this->db->query("SELECT * FROM m_users ORDER BY ID_USER ASC");
    return $query->result();
	}
    
	function _Get_List_ID($id)
	{	
		$query = $this->db->query("SELECT * FROM m_users WHERE ID_USER =".$id);
		return $query->result(); 
	}
	
	public function _Check_Password(){
		$email = $this->session->userdata('username');
		$password = md5($this->input->post('current_password'));
		$query = $this->db->query("SELECT * FROM m_users WHERE USERNAME ='".$email."' AND PASSWORD='".$password."'");
		return $query->result();
	}
	
	function _Get_List_History_Login($username,$login_date_from,$login_date_to,$ip_address,$detail,$notes,$login_status){	
		$username_ = "";
		$login_date = "";
		$ip_address_ = "";
		$detail_ = "";
		$notes_ = "";
		$login_status_ = "";
		
		//Username
		if ($username<>NULL) { $username_="AND USERNAME LIKE '%".$username."%' "; }
		//Login Date
		if ($login_date_from<>NULL and $login_date_to<>NULL) {
			$login_date ="AND LOGIN_DATE BETWEEN '".date('Y-m-d H:i:s', strtotime($login_date_from.' 00:00:00'))."' AND '".date('Y-m-d H:i:s', strtotime($login_date_to.' 23:59:59'))."' ";
		}			  
		else if ($login_date_from<>NULL and $login_date_to==NULL) { 
			$login_date ="AND LOGIN_DATE >= '".date('Y-m-d H:i:s', strtotime($login_date_from.' 00:00:00'))."' ";
		}
		else if ($login_date_from==NULL and $login_date_to<>NULL) { 
			$login_date ="AND LOGIN_DATE <= '".date('Y-m-d H:i:s', strtotime($login_date_to.' 23:59:59'))."' ";
		}
		//IP Adress
		if ($ip_address<>NULL) { $ip_address_="AND IP_ADDRESS LIKE '%".$ip_address."%' "; }
		//Detail
		if ($detail<>NULL) { $detail_="AND DETAIL_LOGIN LIKE '%".$detail."%' "; }
		//notes
		if ($notes<>NULL) { $notes_="AND NOTES LIKE '%".$notes."%' "; }
		//login_status
		if ($login_status<>NULL) { $login_status_="AND LOGIN_STATUS LIKE '%".$login_status."%' "; }
		
		$add_query = $username_.$login_date.$ip_address_.$detail_.$notes_.$login_status_;
		
		$query = $this->db->query('SELECT * FROM t_login_history WHERE 1=1 '.$add_query.' ORDER BY ID_HISTORY DESC');
		return $query->result(); 
	}
	
	function _Get_View_History_Login($id){
		$this->db->where('ID_HISTORY',$id);
		$query=$this->db->get('t_login_history');
		return $query->result();
	}
	
	function _Set_Visitor(){
		date_default_timezone_set("Asia/Jakarta");
		$today = date("Y-m-d H:i:s");
		$ip_address = $this->input->ip_address();  //IP_ADDRESS
		$user_agent = $this->input->user_agent();  //USER_AGENT
		
		$data = array(
		  'DATE'=>$today,
		  'IP_ADDRESS'=>$ip_address,
		  'DETAIL'=>$user_agent
		);  
		$this->db->insert('t_visitor',$data);
	}
	
	public function _Create_Users() {
		$data = array(
			'LEVEL' => $this->input->post('levels'),
			'FULLNAME' => $this->input->post('fullname'),    
			'USERNAME' => $this->input->post('username'),
			'PASSWORD' => md5($this->input->post('password'))
		);
		
		$query = $this->db->insert('m_users', $data);
		if ($query) {
			return TRUE;
		}
		
		return FALSE;
	}
	
	public function _Update_Users($id = 0) {
		
		$data = array(
			'LEVEL' => $this->input->post('levels'),
			'FULLNAME' => $this->input->post('fullname'),
			'BLOKIR' => $this->input->post('blokir'),
			'CONFIRM' => $this->input->post('confirm'),
		);
		
		$this->db->where('ID_USER', $id);
		$query = $this->db->update('m_users', $data);
		if ($query) {
			return TRUE;
		}
		
		return FALSE;
	}
	
}
?>