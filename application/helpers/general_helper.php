<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function API_StreamData(){
	$link = "http://182.23.65.88/";
	return $link;
}

function Today($full = false, $format = null){
	date_default_timezone_set("Asia/Jakarta");
	if(!$format){
		if($full == true){
			$today = date("Y-m-d H:i:s");
		}else{
			$today = date("Y-m-d");
		}
	}else{
		$today = date($format);
	}
	return $today;
}

function Get_Level_Name($level_id){
	$ci=& get_instance();
    $ci->load->database();
	
	$query = $ci->db->query('SELECT * FROM m_users_level WHERE LEVEL_ID = "'.$level_id.'"');
	return $query->row();
}

function time_elapsed_string($datetime, $full = false) {
	date_default_timezone_set("Asia/Jakarta");
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'tahun',
        'm' => 'bulan',
        'w' => 'minggu',
        'd' => 'hari',
        'h' => 'jam',
        'i' => 'menit',
        's' => 'detik',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' lalu' : 'Baru saja';
}

function GetMonth($month){
	switch($month){
		case "1":
			$set_month = 'Jan';
		break;
		case "2":
			$set_month = 'Feb';
		break;
		case "3":
			$set_month = 'Mar';
		break;
		case "4":
			$set_month = 'Apr';
		break;
		case "5":
			$set_month = 'Mei';
		break;
		case "6":
			$set_month = 'Jun';
		break;
		case "7":
			$set_month = 'Jul';
		break;
		case "8":
			$set_month = 'Agu';
		break;
		case "9":
			$set_month = 'Sep';
		break;
		case "10":
			$set_month = 'Okt';
		break;
		case "11":
			$set_month = 'Nov';
		break;
		case "12":
			$set_month = 'Des';
		break;
	}
	
	return $set_month;
}