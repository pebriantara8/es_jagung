<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class D_model extends CI_Model {

	public function get_sum_jam_kerja($d_start,$d_end)
	{
		$this->db->order_by('id_presensi', 'desc');
		$this->db->where("
			masuk >= CAST('".$d_start." 00:00:00' AS DATETIME) AND
			masuk <= CAST('".$d_end." 23:59:59' AS DATETIME)
		");
		$q = $this->db->get('presensi')->result_array();
		$selisih=0;
		foreach ($q as $key) {
		    $awal  = date_create($key['masuk']);
		    $akhir = date_create($key['pulang']);
		    $diff  = date_diff( $awal, $akhir );
		    $selislih_per_presensi = ($diff->d*24)+($diff->h).' hr '.$diff->i.' min ';

		    $selisih = ($diff->days*24*60)+($diff->h*60)+($diff->i)+($selisih);
		    $selisih_fix = floor($selisih/60)."h ".($selisih%60)."m";
		}
		$res['total_jam_kerja'] = $selisih;
		$res['total_jam_kerja_fix'] = isset($selisih_fix) ? $selisih_fix : '0';
		$res['jumlah_presensi'] = count($q);
		return $res;
	}

}

/* End of file My_model.php */
/* Location: ./application/modules/backend/dashboard/models/My_model.php */