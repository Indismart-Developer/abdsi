<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Model_Venue extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	public function _GetVenue()
    {	
		$id = $this->input->post('type_id');
        $query = $this->db->get_where('tb_location_detail', array('LOCATION_ID' => $id));

        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $data)
            {
                $contents[] = array(
                    'venue_id' => $data->DETAIL_ID,
                    'nama' => $data->NAME,
                    'lat' => $data->LAT,
                    'lon' => $data->LONG,
                    'desc' => $data->DESC,
                    'image' => $data->IMAGE
                );
            }

            return $contents;
        }

        return FALSE;
    }
	
	public function _GetVillage()
    {	
		$kelurahan_code = $this->input->post('kelurahan_code');
        $query = $this->db->get_where('m_citizen_village', array('CODE' => $kelurahan_code));

        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $data)
            {
                $contents[] = array(
                    'VILLAGE_NAME' => $data->VILLAGE_NAME,
                    'POPULATION' => $data->POPULATION,
                    'MALE' => $data->MALE,
                    'FEMALE' => $data->FEMALE,
                    'LUAS_WILAYAH_PERTANIAN' => $data->LUAS_WILAYAH_PERTANIAN,
                    'JUMLAH_PETANI' => $data->JUMLAH_PETANI,
                    'HASIL_PANEN' => $data->HASIL_PANEN,
                    'PENYERAPAN_DANA_DESA' => $data->PENYERAPAN_DANA_DESA
                );
            }

            return $contents;
        }else{
			$contents[] = array(
                    'VILLAGE_NAME' => "",
                    'POPULATION' => "",
                    'MALE' => "",
                    'FEMALE' => "",
                    'LUAS_WILAYAH_PERTANIAN' => "",
                    'JUMLAH_PETANI' => "",
                    'HASIL_PANEN' => "",
                    'PENYERAPAN_DANA_DESA' => ""
                );
		}
    }
	
	
}
?>