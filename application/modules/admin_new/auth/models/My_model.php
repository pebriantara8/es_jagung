<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_model extends CI_Model {

	public function cek_user($data) {
		$query = $this->db->get_where('users', $data);
		return $query;
	}	

}

/* End of file My_model.php */
/* Location: ./application/modules/backend/auth/models/My_model.php */