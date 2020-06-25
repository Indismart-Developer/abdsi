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
		
		$data_distrik = ["KABUPATEN BOGOR",
						 "KABUPATEN SUKABUMI",
						 "KABUPATEN CIANJUR",
						 "KABUPATEN BANDUNG",
						 "KABUPATEN GARUT",
						 "KABUPATEN TASIKMALAYA",
						 "KABUPATEN CIAMIS",
						 "KABUPATEN KUNINGAN",
						 "KABUPATEN CIREBON",
						 "KABUPATEN MAJALENGKA",
						 "KABUPATEN SUMEDANG",
						 "KABUPATEN INDRAMAYU",
						 "KABUPATEN SUBANG",
						 "KABUPATEN PURWAKARTA",
						 "KABUPATEN KARAWANG",
						 "KABUPATEN BEKASI",
						 "KABUPATEN BANDUNG BARAT",
						 "KABUPATEN PANGANDARAN",
						 "KOTA BOGOR",
						 "KOTA SUKABUMI",
						 "KOTA BANDUNG",
						 "KOTA CIREBON",
						 "KOTA BEKASI",
						 "KOTA DEPOK",
						 "KOTA CIMAHI",
						 "KOTA TASIKMALAYA",
						 "KOTA BANJAR"
						 ];
		$data_persen_jenis_kelamin = array(
				array (
					'name'=> 'Lebih Tinggi Daripada Sebelum Terjadi Pandemi',
					'y'=> 25
				),
				array (
					'name'=> 'Sama Dengan Sebelum Terjadi Pandemi',
					'y'=> 25
				),
				array (
					'name'=> 'Menurun Antara 10-30 %',
					'y'=> 15
				),
				array (
					'name'=> 'Menurun Antara 31-60 %',
					'y'=> 15
				),
				array (
					'name'=> 'Menurun Lebih Dari 60 %',
					'y'=> 10
				),
				array (
					'name'=> 'Tidak Ada Sama Sekali Penjualan',
					'y'=> 10
				)
		);
		
		$penduduk_jenis_kelamin_kecamatan = array(
				array (
					'name'=> 'Driver Online',
					'data'=> [23,43,34,34,54,65,78,23,90,34,54,23,12,45,36,74,23,43,54,23,23,44,21,23,78,24]
				),
				array (
					'name'=> 'Fashion',
					'data'=> [23,43,34,34,54,65,78,23,90,34,54,23,12,45,36,74,23,43,54,23,23,44,21,23,78,24]
				),
				array (
					'name'=> 'Konsultan',
					'data'=> [22,41,66,34,98,23,23,23,90,34,54,23,12,45,36,74,23,43,54,23,23,44,21,23,78,24]
				),
				array (
					'name'=> 'Kesehatan',
					'data'=> [23,43,34,34,54,65,78,23,90,34,54,23,12,45,36,74,23,43,54,23,23,44,21,23,78,24]
				)
		);
		
		
		$penduduk_per_kecamatan= array();
		$query = $this->db->query('SELECT * FROM _regencies WHERE province_id = 32 ')->result();
		$i=1;
		foreach($query as $row){
			if($i == 1){
				$penduduk_per_kecamatan [] = array(
					'name' => $row->name,
					'district_id'	=> $row->id,
					'y'	=> rand(10,100),
					'sliced' => true,
					'selected' => true
				);
			}else{
				$penduduk_per_kecamatan [] = array(
					'name' => $row->name,
					'district_id'	=> $row->id,
					'y'	=> rand(10,100)
				);
			}
			
		$i++;
		}
						
		$response = array(
			'distrik' => $data_distrik,
			'jumlah_kecamatan' => 10,
			'jumlah_kelurahan' => 136,
			'jumlahpenduduk' => 34,
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
		
		$penduduk_per_kelurahan []= array(
			'name' => "MIKRO",
			'y' => rand(10,100),
			'drilldown' => "MIKRO"
		);
		
		$penduduk_per_kelurahan_jenis_kelamin [] = array(
			'name' => "MIKRO",
			'id' => "MIKRO",
			'data' => [
				["Baru",rand(10,100)],
				["Sedang Tumbuh",rand(10,100)]
			]
		);
		
		$penduduk_per_kelurahan []= array(
			'name' => "KECIL 1",
			'y' => rand(10,100),
			'drilldown' => "KECIL 1"
		);
		
		$penduduk_per_kelurahan_jenis_kelamin [] = array(
			'name' => "KECIL 1",
			'id' => "KECIL 1",
			'data' => [
				["Baru",rand(10,100)],
				["Sedang Tumbuh",rand(10,100)]
			]
		);
		
		$penduduk_per_kelurahan []= array(
			'name' => "KECIL 2",
			'y' => rand(10,100),
			'drilldown' => "KECIL 2"
		);
		
		$penduduk_per_kelurahan_jenis_kelamin [] = array(
			'name' => "KECIL 2",
			'id' => "KECIL 2",
			'data' => [
				["Baru",rand(10,100)],
				["Sedang Tumbuh",rand(10,100)]
			]
		);
		
		$penduduk_per_kelurahan []= array(
			'name' => "KECIL 3",
			'y' => rand(10,100),
			'drilldown' => "KECIL 3"
		);
		
		$penduduk_per_kelurahan_jenis_kelamin [] = array(
			'name' => "KECIL 3",
			'id' => "KECIL 3",
			'data' => [
				["Baru",rand(10,100)],
				["Sedang Tumbuh",rand(10,100)]
			]
		);
		
		$penduduk_per_kelurahan []= array(
			'name' => "MENENGAH",
			'y' => rand(10,100),
			'drilldown' => "MENENGAH"
		);
		
		$penduduk_per_kelurahan_jenis_kelamin [] = array(
			'name' => "MENENGAH",
			'id' => "MENENGAH",
			'data' => [
				["Baru",rand(10,100)],
				["Sedang Tumbuh",rand(10,100)]
			]
		);
					
		$response = array(
			'penduduk_per_kelurahan' => $penduduk_per_kelurahan,
			'penduduk_per_kelurahan_jenis_kelamin' => $penduduk_per_kelurahan_jenis_kelamin,
		);
        return $response;
	}
	

	/* function _GetDataSummary(){
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
			'jumlahpenduduk' => $jumlahpenduduk,
			'presentase_penduduk_jenis_kelamin' => $data_persen_jenis_kelamin,
			'penduduk_jenis_kelamin_kecamatan' => $penduduk_jenis_kelamin_kecamatan,
			'penduduk_per_kecamatan' => $penduduk_per_kecamatan
		);
        return $response;
    }
	 */
	/* function _GetDataKelurahan(){
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
	} */
	
}
?>