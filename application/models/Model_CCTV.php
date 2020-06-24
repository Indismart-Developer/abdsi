<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Pembuat: 
 * Nama Model: Model_CCTV 
 * Keterangan:  */
 
class Model_CCTV extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function _Get_List_CCTV(){
        $query = $this->db->query(
            'SELECT *,
            (SELECT FULLNAME FROM m_users
				WHERE m_users.ID_USER=city_cctv.created_by) as creator,
            (SELECT FULLNAME FROM m_users
				WHERE m_users.ID_USER=city_cctv.modified_by) as editor
            FROM city_cctv');
		return $query->result();
    }
	
	function _Get_CCTV($id_cctv, $publish = null){
		if ($publish){
			$add_query = ' AND city_cctv.publish='.$publish; 
		}else{
			$add_query = '';
		}
		$query = $this->db->query(
            'SELECT *
            -- (SELECT FULLNAME FROM m_users
			-- 	WHERE m_users.ID_USER=m_post.AUTHOR) as AUTHOR_NAME
			FROM city_cctv
				WHERE city_cctv.id_city_cctv='.$id_cctv.$add_query);
		return $query->row();
	}
    
    function _Create_CCTV(){
        //dummy
        $id_city_users = 1;

        $location_name = $this->input->post('location_name');
        if(!$location_name) $location_name = NULL;
        $location_detail = $this->input->post('location_detail');
        if(!$location_detail) $location_detail = NULL;
        $latitude = $this->input->post('latitude');
        if(!$latitude) $latitude = NULL;
        $longitude = $this->input->post('longitude');
        if(!$longitude) $longitude = NULL;
        $source = $this->input->post('source');
        if(!$source) $source = NULL;
        
        $data = array(  
            'id_city_users'     =>$id_city_users,
            'location_name'     =>$location_name,
            'location_detail'   =>$location_detail,
            'longitude'         =>$longitude,
            'latitude'          =>$latitude,
            'source'            =>$source,
            'created_date'	    =>Today(true),
            //dummy
            'created_by'		=>1,
            // 'created_by'		=>$this->session->userdata('id_user')
        );
        
        print_r($data);
        $this->db->insert('city_cctv',$data);
        echo $this->db->insert_id();
		return $this->db->insert_id();
    }

    function _Update_CCTV($id){
        //dummy
        $id_city_users = 1;
        
        $location_name = $this->input->post('location_name');
        if(!$location_name) $location_name = NULL;
        $location_detail = $this->input->post('location_detail');
        if(!$location_detail) $location_detail = NULL;
        $latitude = $this->input->post('latitude');
        if(!$latitude) $latitude = NULL;
        $longitude = $this->input->post('longitude');
        if(!$longitude) $longitude = NULL;
        $source = $this->input->post('source');
        if(!$source) $source = NULL;
		
        $data = array(  
            'id_city_users'     =>$id_city_users,
            'location_name'     =>$location_name,
            'location_detail'   =>$location_detail,
            'longitude'         =>$longitude,
            'latitude'          =>$latitude,
            'source'            =>$source,
            'modified_date'     =>Today(true),
            //dummy
            'modified_by'       =>1,
            // 'modified_by'		=>$this->session->userdata('id_user')
        );
        // print_r($data);
        $this->db->where('id_city_cctv',$id);
		$this->db->update('city_cctv',$data);
	}

	function _Delete_CCTV($id_cctv){
		$this->db->where('id_city_cctv',$id_cctv);
		$this->db->delete('city_cctv');
	}
	
	function _GetDataCCTV() {
		$query = $this->db->get('city_cctv');
		
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		
		return FALSE;
	}
}
?>