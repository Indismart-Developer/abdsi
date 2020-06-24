<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Pembuat: 
 * Nama Model: Model_Regional 
 * Keterangan:  */
 
class Model_Regional extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	function _GetDataProvinces(){
		$query = $this->db->query("SELECT * FROM _provinces ORDER BY name ASC");
		return $query->result();
	} 
	
	function _GetDataRegency($id){
		if(!empty($id)){
			$query = $this->db->query("SELECT * FROM _regencies WHERE province_id=".$id." ORDER BY name ASC");
			return $query->result();
		}else{
			return false;
		}
	} 
}
?>