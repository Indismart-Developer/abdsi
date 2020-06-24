<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: 
* Description: Login model class
*/
class Model_UserGroup extends CI_Model{
    function __construct(){
        parent::__construct();
    }
	function _Get_List(){
    $query = $this->db->query('SELECT * FROM m_users_level');
    return $query->result();
	}
	
	function _Get_List_Edit($id){
    $this->db->where('LEVEL_ID',$id);
	$query=$this->db->get('m_users_level');
    return $query->result();
	}
    
	function _Save(){ 
		$tipe = $this->input->post('tipe');   
		$LEVEL_NAME = $this->input->post('LEVEL_NAME');       
		$data = array(  
		  'LEVEL_NAME'=>$LEVEL_NAME,
		);  
		if ($tipe=='edit') {
		$LEVEL_ID = $this->input->post('LEVEL_ID');  
		$this->db->where('LEVEL_ID',$LEVEL_ID);
		$this->db->update('m_users_level',$data);
		} else {
		$this->db->insert('m_users_level',$data);
		}
    }
	
	function _Delete($LEVEL_ID)
	{	
		$this->db->where('LEVEL_ID', $LEVEL_ID);
		$this->db->delete('m_users_level');
	}
	
	function _Save_Previlege(){ 
		$id_groups=$this->input->post('id_groups');
		$menu=$this->input->post('menu');
		
		$this->db->where('id_user_level', $id_groups);
		$this->db->delete('m_user_level_previlege');
				
		if (empty($menu)){

		} else {
			$count=count($menu);
			for ($no=0;$no<$count;$no++) {
				$data = array(  
				  'id_user_level'=>$id_groups,
				  'id_core_module_admin'=>$menu[$no],
				);  
				$this->db->insert('m_user_level_previlege',$data);
			}
		}
    }

	function _Check_Previlege($controller,$id_group)
	{	
		$query = $this->db->query('SELECT * FROM m_user_level_previlege m 
									JOIN core_module_admin c ON m.id_core_module_admin = c.ID
									WHERE m.id_user_level = '.$id_group.' AND c.HIDE = 1 and c.MENU_ACTIVE_OPEN = "'.$controller.'"');	
		$count = count($query->result()); 
		if($count>0) {
			$result=TRUE;
		} else {
			$result=FALSE;
		}	
		return $result;
	}
	
}
?>