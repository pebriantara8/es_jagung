<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_m extends CI_Model {

	public function getPremis($id=null)
	{
		$this->db->select('
			p.id, p.nama_premis, pk.nama_premis_kategori, pk.pertanyaan, pk.sort, pk.id as id_pk,
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

	public function getPremisKategori($id=null)
	{
		$this->db->select('
			p.id, p.nama_premis, pk.nama_premis_kategori, pk.pertanyaan, pk.sort, pk.id as id_pk,
		');
		$this->db->join('premis p', 'pk.id = p.premis_kategori_id', 'inner');
		$this->db->order_by('pk.sort', 'asc');
		$this->db->where('p.deleted_at IS NULL');

		if($id!=null){
			$this->db->where('pk.id', $id);
			$q=$this->db->get('premis_kategori pk')->row_array();
		}else{
			$q=$this->db->get('premis_kategori pk')->result_array();
		}
		return $q;
	}

	public function getPremisKategori2($where=null,$where_not=null)
	{
		$this->db->select('
			p.id, p.nama_premis, pk.nama_premis_kategori, pk.pertanyaan, pk.sort, pk.id as id_pk,
		');
		$this->db->join('premis p', 'pk.id = p.premis_kategori_id', 'inner');
		$this->db->order_by('pk.sort', 'asc');
		$this->db->where('p.deleted_at IS NULL');

		if($where!=null){
			foreach ($where as $key => $value) {
				$this->db->where('p.id', $value);
			}
		}

		if($where_not!=null AND count($where_not)!=0){
			foreach ($where_not as $key => $value) {
				$this->db->where('p.id !=', $value);
			}
		}

		$q=$this->db->get('premis_kategori pk')->result_array();
		return $q;
	}

	public function getRule($where=null,$where_not=null)
	{
		$this->db->select('
			k.id as konklusi_id, k.nama_konklusi,
			r.konklusi_id, r.where_tipe,
			p.id as premis_id, p.nama_premis, pk.nama_premis_kategori, pk.pertanyaan, pk.sort, pk.id as id_pk,
		');
		$this->db->join('konklusi k', 'r.konklusi_id = k.id', 'left');
		$this->db->join('premis p', 'r.premis_id = p.id', 'left');
		$this->db->join('premis_kategori pk', 'p.premis_kategori_id = pk.id', 'left');
		$this->db->order_by('pk.sort', 'asc');
		$this->db->where('k.deleted_at IS NULL');
		$this->db->group_by('r.konklusi_id');
		

		// if($where!=null){
		// 	foreach ($where as $key => $value) {
		// 		$this->db->where('r.premis_id', $value);
		// 	}
		// }

		$names = array('1', '16');
		$this->db->where_in('premis_id', $where);

		$this->db->where_not_in('premis_id', $where_not);

		// if($where_not!=null AND count($where_not)!=0){
		// 	foreach ($where_not as $key => $value) {
		// 		$this->db->where('r.premis_id !=', $value);
		// 	}
		// }

		$q=$this->db->get('rule r')->result_array();
		return $q;
	}

	public function getRuleSelected($kid=null,$where=null,$where_not=null)
	{
		$this->db->select('
			r.konklusi_id, r.where_tipe,
			p.id as premis_id, p.nama_premis, pk.nama_premis_kategori, pk.pertanyaan, pk.sort, pk.id as id_pk,
		');
		$this->db->join('konklusi k', 'r.konklusi_id = k.id', 'inner');
		$this->db->join('premis p', 'r.premis_id = p.id', 'inner');
		$this->db->join('premis_kategori pk', 'p.premis_kategori_id = pk.id', 'inner');
		$this->db->order_by('pk.sort', 'asc');
		$this->db->where('k.deleted_at IS NULL');
		$this->db->where('k.id', $kid);

		if($where!=null){
			foreach ($where as $key => $value) {
				$this->db->where('r.premis_id !=', $value);
			}
		}

		if($where_not!=null AND count($where_not)!=0){
			foreach ($where_not as $key => $value) {
				$this->db->where('r.premis_id !=', $value);
			}
		}

		$q=$this->db->get('rule r')->result_array();
		return $q;
	}
}

/* End of file My_model.php */
/* Location: ./application/modules/frontend/home/models/My_model.php */