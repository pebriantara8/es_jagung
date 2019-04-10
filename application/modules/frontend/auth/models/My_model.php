<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_model extends CI_Model {

	public function cek_user($data) {
		$query = $this->db->get_where('user', $data);
		return $query->row_array();
	}

	function tutup_presensi()
	{
		$this->db->where('status_presensi', '0');
		$q = $this->db->get('presensi')->result_array();
		foreach ($q as $key => $value) {
			$date_next = date('Y-m-d',strtotime($value['masuk'] . "+1 days"));
			$this->db->where('id_presensi', $value['id_presensi']);
			$ob = array(
				'pulang' => $date_next.' 02:00:00',
				'status_presensi' => '3',
			);
			$q = $this->db->update('presensi', $ob);
		}
		return $q;
	}

}

/* End of file My_model.php */
/* Location: ./application/modules/frontend/auth/models/My_model.php */