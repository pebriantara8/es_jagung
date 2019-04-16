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

	public function getPremisWhere($where=null,$where_not=null)
	{
		$this->db->select('
			p.id, p.nama_premis, pk.nama_premis_kategori, pk.pertanyaan, pk.sort, pk.id as id_pk,
		');
		$this->db->join('premis_kategori pk', 'pk.id = p.premis_kategori_id', 'left');
		$this->db->order_by('pk.sort', 'asc');
		$this->db->where('p.deleted_at IS NULL');

		if($where!=null){
			foreach ($where as $key => $value) {
				$this->db->where('p.id', $value);
			}
		}
		
		$q=$this->db->get('premis p')->result_array();
		
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

		$this->db->where('pk.id', $value);
		
		if($id!=null){
			$q=$this->db->get('premis_kategori pk')->row_array();
		}else{
			$q=$this->db->get('premis_kategori pk')->result_array();
		}
		return $q;
	}
}

/* End of file My_model.php */
/* Location: ./application/modules/frontend/home/models/My_model.php */