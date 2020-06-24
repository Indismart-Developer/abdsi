<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Pembuat: 
 * Nama Model: Model_UMKM 
 * Keterangan:  */
 
class Model_UMKM extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	function _Get_List_Kategori(){
        $query = $this->db->query('SELECT * FROM _rf_business_category ORDER BY NAME ASC');
		return $query->result();
    }
	
	function _Get_List_Tipe(){
        $query = $this->db->query('SELECT * FROM _rf_business_type ORDER BY NAME ASC');
		return $query->result();
    }
	
	function _Get_List_Dampak(){
		$query = $this->db->query('SELECT * FROM _rf_effect_covid ORDER BY NAME ASC');
		return $query->result();
	}
	
	function _Get_List_UMKM(){
        $query = $this->db->query('SELECT a.ID_UMKM,a.PROVINCE_ID,b.NAME AS PROVINCE_NAME, 
									a.CITY_ID,f.NAME AS CITY_NAME,
									a.BRAND,a.LOCATION_DETAIL,a.LAT,a.LONG,
									a.CATEGORY,c.NAME AS CATEGORY_NAME,
									a.TYPE,d.NAME AS TYPE_NAME,
									a.OWNER,a.PHONE,a.SINCE,
									a.EFFECT_ID,
									e.NAME AS EFFECT_NAME,
									a.IMAGE
									FROM tb_umkm a
									LEFT JOIN _provinces b ON a.PROVINCE_ID = b.id
									LEFT JOIN _rf_business_category c ON a.CATEGORY = c.category_id
									LEFT JOIN _rf_business_type d ON a.TYPE = d.type_id
									LEFT JOIN _rf_effect_covid e ON a.EFFECT_ID = e.effect_id
									LEFT JOIN _regencies f ON a.CITY_ID = f.id');
		return $query->result();
    }
	
	function _Save(){
		$form_type = $this->input->post('form_type');
		$ID_UMKM = $this->input->post('ID_UMKM');
		$provinces = $this->input->post('provinces');
		$cities = $this->input->post('cities');
		$brand = $this->input->post('brand');
		$location_detail = $this->input->post('location_detail');
		$latitude = $this->input->post('latitude');
		$longitude = $this->input->post('longitude');
		$category = $this->input->post('category');
		$type = $this->input->post('type');
		$owner = $this->input->post('owner');
		$phone = $this->input->post('phone');
		$since = $this->input->post('since');
		$effect = $this->input->post('effect');
		
		$data = array(  
			'PROVINCE_ID'     	=>$provinces,
			'CITY_ID'     		=>$cities,
			'BRAND'   			=>$brand,
			'LOCATION_DETAIL'   =>$location_detail,
			'LAT'          		=>$latitude,
			'LONG'            	=>$longitude,
			'CATEGORY'          =>$category,
			'TYPE'            	=>$type,
			'OWNER'            	=>$owner,
			'PHONE'            	=>$phone,
			'SINCE'            	=>$since,
			'EFFECT_ID'         =>$effect
		);
			
		
		if($form_type =='INPUT'){
			$this->db->insert('tb_umkm',$data);
			return $this->db->insert_id();
		}else{
			$this->db->where('ID_UMKM',$ID_UMKM);
			$this->db->update('tb_umkm',$data);
			return $ID_UMKM;
		}
	}
    
	function _Get_UMKM($id){
		$query = $this->db->query('SELECT a.ID_UMKM,a.PROVINCE_ID,b.NAME AS PROVINCE_NAME, 
									a.CITY_ID,f.NAME AS CITY_NAME,
									a.BRAND,a.LOCATION_DETAIL,a.LAT,a.LONG,
									a.CATEGORY,c.NAME AS CATEGORY_NAME,
									a.TYPE,d.NAME AS TYPE_NAME,
									a.OWNER,a.PHONE,a.SINCE,
									a.EFFECT_ID,
									e.NAME AS EFFECT_NAME,
									a.IMAGE
									FROM tb_umkm a
									LEFT JOIN _provinces b ON a.PROVINCE_ID = b.id
									LEFT JOIN _rf_business_category c ON a.CATEGORY = c.category_id
									LEFT JOIN _rf_business_type d ON a.TYPE = d.type_id
									LEFT JOIN _rf_effect_covid e ON a.EFFECT_ID = e.effect_id
									LEFT JOIN _regencies f ON a.CITY_ID = f.id
									WHERE a.ID_UMKM = '.$id);
		return $query->row();
	}
	
	function _Update_Image($file_name_set,$ID_UMKM){
		$data = array(  
            'IMAGE'     =>$file_name_set
        );
        $this->db->where('ID_UMKM',$ID_UMKM);
		$this->db->update('tb_umkm',$data);
		
		return true;
	}
	
	function _Delete_UMKM($id){
		$this->db->where('ID_UMKM',$id);
		$this->db->delete('tb_umkm');
	}
}
?>