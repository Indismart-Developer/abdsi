<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Pregnancy extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function _GetDataSummaryPregnancy(){
		$year = $this->input->post('year');
		$month = array();
		$jumlah_kehamilan = array();
		$bayi_laki_laki = array();
		$bayi_perempuan = array();
		$bayi_selamat = array();
		$bayi_meninggal = array();
		$ibu_selamat = array();
		$ibu_meninggal = array();
		$tidak_keguguran = 0;
		$keguguran1 = 0;
		$keguguran2 = 0;
		$keguguran3 = 0;
		
		$query = $this->db->query('SELECT * FROM tb_pregnancy WHERE YEAR = '.$year.' ORDER BY MONTH ASC')->result();
		foreach($query as $row){
			$month [] = GetMonth($row->MONTH);
			$jumlah_kehamilan []= intval($row->JUMLAH_KEHAMILAN);
			$tidak_keguguran+= $row->TIDAK_KEGUGURAN;
			$keguguran1+= $row->KEGUGURAN_1;
			$keguguran2+= $row->KEGUGURAN_2;
			$keguguran3+= $row->KEGUGURAN_3;
			$bayi_laki_laki [] = intval($row->BAYI_PRIA);
			$bayi_perempuan [] = intval($row->BAYI_WANITA);
			$bayi_selamat [] = intval($row->BAYI_SELAMAT);
			$bayi_meninggal [] = intval($row->BAYI_MENINGGAL);
			$ibu_selamat [] = intval($row->PERSALINAN_SELAMAT);
			$ibu_meninggal [] = intval($row->PERSALINAN_MENINGGAL);
		}	
		
	
		$kasus_keguguran = array(
				array (
					'name'=> 'Padi',
					'y'=> $tidak_keguguran,
					'sliced' => true,
					'selected' =>true
				),
				array (
					'name'=> 'Jagung',
					'y'=> $keguguran1
				),
				array (
					'name'=> 'Kacang Tanah',
					'y'=> $keguguran2
				),
				array (
					'name'=> 'Jahe',
					'y'=> $keguguran3
				)
		);
		
		
		$jumlah_persalinan = array(
				array (
					'name'=> 'Lahan Basah',
					'data'=> $bayi_laki_laki
				),
				array (
					'name'=> 'Lahan Kering',
					'data'=> $bayi_perempuan
				)
		);
		
		$status_persalinan_bayi = array(
				array (
					'name'=> 'Jagung Manis',
					'data'=> $bayi_selamat
				),
				array (
					'name'=> 'Jagung Tepung',
					'data'=> $bayi_meninggal
				)
		);
		
		$status_persalinan_ibu = array(
				array (
					'name'=> 'Brokoli',
					'data'=> $ibu_selamat
				),
				array (
					'name'=> 'Cabai',
					'data'=> $ibu_meninggal
				)
		);
		
		$response = array(
			'month' => $month,
			'jumlah_kehamilan' => $jumlah_kehamilan,
			'kasus_keguguran' => $kasus_keguguran,
			'jumlah_persalinan' => $jumlah_persalinan,
			'status_persalinan_bayi' => $status_persalinan_bayi,
			'status_persalinan_ibu' => $status_persalinan_ibu
		);
        return $response;
    }
	
	
}
?>