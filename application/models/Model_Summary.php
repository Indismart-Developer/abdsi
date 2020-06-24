<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Summary extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function _GetDataSummary(){
		$data_persen_jenis_kelamin = array();
		$jumlahlaki = 0;
		$jumlahwanita = 0;
		$jumlahpenduduk = 0;
		$jumlah_kelurahan = 0;
		$data_distrik = array();
		$pria = array();
		$wanita = array();
		$penduduk_per_kecamatan= array();
		$query = $this->db->query('SELECT a.*,b.POPULATION,b.MALE,b.FEMALE
											FROM m_district a
										    INNER JOIN m_citizen b ON a.DISTRICT_ID = b.DISTRICT_ID 
											ORDER BY a.DISTRICT_ID ASC')->result();
		$jumlah_kecamatan = count($query);
		$i=1;
		foreach($query as $row){
			$jumlahlaki+= $row->MALE;
			$jumlahwanita+= $row->FEMALE;
			$jumlahpenduduk+= $row->POPULATION;
			$data_distrik [] = $row->NAME;
			$pria []= intval($row->MALE);
			$wanita []= intval($row->FEMALE);
			if($i == 1){
				$penduduk_per_kecamatan [] = array(
					'name' => $row->NAME,
					'district_id'	=> $row->DISTRICT_ID,
					'y'	=> intval($row->POPULATION),
					'sliced' => true,
					'selected' => true
				);
			}else{
				$penduduk_per_kecamatan [] = array(
					'name' => $row->NAME,
					'district_id'	=> $row->DISTRICT_ID,
					'y'	=> intval($row->POPULATION)
				);
			}
			
		$i++;
		}
		
		$data_persen_jenis_kelamin = array(
				array (
					'name'=> 'Laki-Laki',
					'y'=> intval(($jumlahlaki/$jumlahpenduduk) * 100)
				),
				array (
					'name'=> 'Perempuan',
					'y'=> intval(($jumlahwanita/$jumlahpenduduk) * 100)
				)
		);
		
		$penduduk_jenis_kelamin_kecamatan = array(
				array (
					'name'=> 'Laki-Laki',
					'data'=> $pria
				),
				array (
					'name'=> 'Perempuan',
					'data'=> $wanita
				)
		);

		$response = array(
			'distrik' => $data_distrik,
			'jumlah_kecamatan' => $jumlah_kecamatan,
			'jumlah_kelurahan' => count($this->db->get('m_citizen_village')->result()),
			'jumlahpenduduk' => $jumlahpenduduk.' Jiwa ',
			'presentase_penduduk_jenis_kelamin' => $data_persen_jenis_kelamin,
			'penduduk_jenis_kelamin_kecamatan' => $penduduk_jenis_kelamin_kecamatan,
			'penduduk_per_kecamatan' => $penduduk_per_kecamatan
		);
        return $response;
    }
	
	function _GetDataKelurahan(){
		$id_kecamatan = $this->input->post('id_kecamatan');
		$penduduk_per_kelurahan = array();
		$penduduk_per_kelurahan_jenis_kelamin = array();
		$query = $this->db->query('SELECT * FROM m_citizen_village WHERE DISTRICT_ID = '.$id_kecamatan)->result();
		foreach($query as $row){
			$penduduk_per_kelurahan []= array(
				'name' => $row->VILLAGE_NAME,
				'y' => intval($row->POPULATION),
				'drilldown' => $row->VILLAGE_NAME
			);
			
			$penduduk_per_kelurahan_jenis_kelamin [] = array(
				'name' => $row->VILLAGE_NAME,
				'id' => $row->VILLAGE_NAME,
				'data' => [
					["Laki-Laki",intval($row->MALE)],
					["Perempuan",intval($row->FEMALE)]
				]
			);
			
		}
		
		$response = array(
			'penduduk_per_kelurahan' => $penduduk_per_kelurahan,
			'penduduk_per_kelurahan_jenis_kelamin' => $penduduk_per_kelurahan_jenis_kelamin,
		);
        return $response;
	}
	
}
?>