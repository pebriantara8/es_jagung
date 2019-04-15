<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_m extends CI_Model {

	public function getPremis($id=null)
	{
		$this->db->select('
			p.id, p.nama_premis, pk.nama_premis_kategori, pk.pertanyaan, pk.sort,
		');
		$this->db->join('premis_kategori pk', 'pk.id = p.premis_kategori_id', 'left');
		$this->db->order_by('pk.sort', 'asc');
		$this->db->where('p.deleted_at IS NULL');
		
		if($id!=null){
			$q=$this->db->get('premis p')->row_array();
		}else{
			$q=$this->db->get('premis p')->result_array();
		}
		
		return $q;
	}
}

/* End of file My_model.php */
/* Location: ./application/modules/frontend/home/models/My_model.php */