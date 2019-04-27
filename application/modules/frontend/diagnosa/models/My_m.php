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


	public function getRule_old($where=null,$where_not=null)
	{	
		$this->db->where('deleted_at IS NULL');
		$q=$this->db->get('konklusi')->result_array();
		
		$qf = [];
		foreach ($q as $key => $value) {
			
			$add=false;
			$arr_rule=[];
			// if($key=1){
			// 	debug($arr_rule);
			// }
			$this->db->join('premis p', 'r.premis_id = p.id', 'left');
			$this->db->join('premis_kategori pk', 'p.premis_kategori_id = pk.id', 'left');
			$this->db->join('konklusi k', 'r.konklusi_id = k.id', 'left');
			$this->db->where('k.deleted_at IS NULL');
			
			if($where!=null OR $where_not!=null) $this->db->where('r.konklusi_id', $value['id']);
			$rule = $this->db->get('rule r')->result_array();
			// debug($rule);

			foreach ($rule as $kr => $vr) {
				$arr_rule[] = $vr['premis_id'];
			}

			
			// cek apakah konklusi memiliki rule yang dipilih}
			if($where!=null OR count($where)!=0){
				foreach ($where as $kw => $vw) {
					if(in_array($vw,$arr_rule)){
						// debug('s');
						$add=true;
					}else{
						// $add=false;
					}
				}
			}
			
			// cek apakah konklusi memiliki rule yang dipilih}
			if($where_not!=null OR count($where_not)!=0){
				foreach ($where_not as $kwn => $vwn) {
					if(!in_array($vwn,$arr_rule)){
						$add=true;
					}else{
						// $add=false;
					}
				}
			}

			debug($add);
			
			
			
			if($add==true){
				$qf[] = $value;
			}else{
				// $qf=[];
			}
		}
		
		// debug($qf);
		
		if(count($where)<=0 AND count($where_not)<=0) return $q;
		else return $qf;
		// return $qf;
	}

	public function getRule($where=null,$where_not=null)
	{	
		$this->db->where('deleted_at IS NULL');
		$q=$this->db->get('konklusi')->result_array();
		
		$qf = [];
		foreach ($q as $key => $value) {
			
			// debug($value);
			
			$add=1;
			$arr_rule=[];
			// if($key=1){
			// 	debug($arr_rule);
			// }
			$this->db->select('k.*,p.*,pk.*,r.*,r.konklusi_id as id_konklusi');
			$this->db->join('premis p', 'r.premis_id = p.id', 'left');
			$this->db->join('premis_kategori pk', 'p.premis_kategori_id = pk.id', 'left');
			$this->db->join('konklusi k', 'r.konklusi_id = k.id', 'left');
			if($where!=null) $this->db->where('r.konklusi_id', $value['id']);
			$this->db->where('k.deleted_at IS NULL');
			$rule = $this->db->get('rule r')->result_array();

			// debug($rule);

			foreach ($rule as $kr => $vr) {
				$arr_rule[] = $vr['premis_id'];
			}

			// debug($where);

			
			// cek apakah konklusi memiliki rule yang dipilih
			if(count($where)!=0){
				foreach ($where as $kw => $vw) {
					if(in_array($vw,$arr_rule)){

					}else{
						$add=2;
					}
				}
			}
			
			if($add==1){
				$qf[] = $value;
			}else{
				// $qf=[];
			}
		}

		// debug($qf);
		// tambah yang tidak memiliki gejala ini
		if(count($where_not)!=0){
			$qf2=[];
			foreach ($qf as $kqf => $vqf) {
	
				$add=true;
				$arr_rule=[];
	
				$this->db->select('k.*,p.*,pk.*,r.*,r.konklusi_id as id_konklusi');
				$this->db->join('premis p', 'r.premis_id = p.id', 'left');
				$this->db->join('premis_kategori pk', 'p.premis_kategori_id = pk.id', 'left');
				$this->db->join('konklusi k', 'r.konklusi_id = k.id', 'left');
				if($where!=null OR $where_not!=null) $this->db->where('r.konklusi_id', $vqf['id']);
				$this->db->where('k.deleted_at IS NULL');
				$rule = $this->db->get('rule r')->result_array();
				// if($qf[3]){
					// debug($rule);
				// }
	
				foreach ($rule as $kr => $vr) {
					$arr_rule[] = $vr['premis_id'];
				}
	
	
				// cek apakah konklusi memiliki rule yang dipilih}
				if(count($where_not)!=0){
					foreach ($where_not as $kwn => $vwn) {
						foreach ($arr_rule as $kar => $var) {
							if($var==$vwn){
								$add=false;
							}
						}
					}
				}
	
				if($add==true){
					$qf2[] = $vqf;
				}else{
					// $qf=[];
				}

			}
			// debug($qf2);
			if(count($where)<=0 AND count($where_not)<=0) return $q;
			else return $qf2;
		}else{
			if(count($where)<=0 AND count($where_not)<=0) return $q;
			else return $qf;
		}
		
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

		if($where!=null){
			foreach ($where_not as $keywn => $valuewn) {
				$this->db->where('r.premis_id !=', $valuewn);
			}
		}

		// if($where_not!=null AND count($where_not)!=0){
		// 	foreach ($where_not as $key => $value) {
		// 		$this->db->where('r.premis_id !=', $value);
		// 	}
		// }

		$q=$this->db->get('rule r')->result_array();
		return $q;
	}

	public function getResultRule($arr_d)
	{
		$this->db->select('p.id as id_premis, p.*, pk.*');
		$this->db->join('premis_kategori pk', 'p.premis_kategori_id = pk.id', 'left');
		$this->db->where_in('p.id', $arr_d);
		$q=$this->db->get('premis p')->result_array();
		return $q;
	}
}

/* End of file My_model.php */
/* Location: ./application/modules/frontend/home/models/My_model.php */