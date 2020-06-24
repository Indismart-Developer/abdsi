<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Pembuat: 
 * Nama Model: Model_Module 
 * Keterangan:  */
 
class Model_Module extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	function _Get_List_Parent_Previlege(){
		$id_user_level = $this->session->userdata('level');
		$query = $this->db->query('SELECT * FROM core_module_admin a LEFT JOIN m_user_level_previlege b ON b.id_core_module_admin = a.ID
								   WHERE b.id_user_level="'.$id_user_level.'" AND a.PARENT_ID is null ORDER BY a.ID');
		return $query->result();
	}
	
	function _Get_List_Child_Previlege($id){
		$id_user_level = $this->session->userdata('level');
		$query = $this->db->query('SELECT * FROM core_module_admin a LEFT JOIN m_user_level_previlege b ON b.id_core_module_admin = a.ID
								   WHERE b.id_user_level="'.$id_user_level.'" AND a.PARENT_ID="'.$id.'" ORDER BY a.ID');
		
		return $query->result();
	}
	
	function _Get_List_Active_Menu($id){
		$query = $this->db->query('SELECT * FROM core_module_admin where HIDE=1 and PARENT_ID ='.$id);	
		$menucheck = $query->result();	
		$check1=NULL;
		foreach($menucheck as $row_menucheck){ 
			$check1 = $check1.' '.$row_menucheck->MENU_ACTIVE_OPEN;
		}
		
		return $check1;
	}
	
}
?>