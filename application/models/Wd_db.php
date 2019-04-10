<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wd_db extends CI_Model
{
	public function __construct()	{
		parent::__construct();
		$this->load->database();
	}
	
	function multi_del($table,$field,$in){
	   $this->db->where_in($field, $in);
       return $this->db->delete($table);
	}

	function insert ($table, $input = null) {
		$fields = $this->db->list_fields($table);
		$data = $this->input->post();
		if ($input) {
			$data = $input;
		}
		$newData = array();
		foreach ($data as $key => $value) {
			if (in_array($key,$fields))
				$newData[$key] = $value;
		} 
		
		return $this->db->insert($table,$newData);
	}


	function update ($table, $where, $input = null) {
		$fields = $this->db->list_fields($table);
		$data = $this->input->post();
		if ($input) {
			$data = $input;
		}
		$newData = array();
		foreach ($data as $key => $value) {
			if (in_array($key,$fields))
				$newData[$key] = $value;
		} 
		
		$this->db->where($where);
		return $this->db->update($table,$newData);
	}

	function kelas($ujian_id){
		return $this->db->query(
			'select distinct(b.kelas_id) as kelas
			from nilai a 
			left join pelajar b on a.siswa_id=b.id
			left join soal c on a.soal_id=c.id
			where c.ujian_id='.$ujian_id
			)->result_array();
	}

	function hasil_ujian($ujian_id, $siswa_id, $tipe,$koreksi=FALSE){
		
		 	$this->db->select('a.*, 
			b.soal, b.jawaban, b.pilihan, b.tipe, b.point, b.gambar, b.penjelasan');
			$this->db->from('soal b');
			$this->db->join('nilai a', 'a.soal_id=b.id', 'left');
			$where = [
				'a.siswa_id' => $siswa_id,
				'b.tipe' => $tipe,
				'b.ujian_id' => $ujian_id,
			];
			if($koreksi) $where['a.koreksi'] = '0';
			$this->db->where($where);
			$sql = $this->db->get();

		return (!$koreksi) ? $sql->result_array() : $sql->num_rows() ;
	}

	function new_id($table,$field,$inisial)	{	
		$strQuery = "select max($field) as $field from $table where $field like '$inisial%'";
		$data_lama = $this->db->query($strQuery);
		$data_lama = $data_lama->row();
		$data_lama = $data_lama->$field;
		
		$panjang	= 8;
		
 		if ($data_lama=="") {
 			$data_baru = 0;
		}else {
 			$data_baru = substr($data_lama, strlen($inisial));
 		}
	
 		$data_baru++;
 		$data_baru	=strval($data_baru); 
 		$tmp	="";
 		for($i=1; $i<=($panjang-strlen($inisial)-strlen($data_baru)); $i++) $tmp=$tmp."0";
 		return $inisial.$tmp.$data_baru;
	}

	function add_dml($table,$data){
        if($this->db->insert($table, $data)) return true;
        else return false;
    }
	
	function add_dml_get_id($table,$data){
	   	$this->db->insert($table, $data);
	   	$insert_id = $this->db->insert_id();
		$this->session->set_flashdata('success_message', 'New record created successfully');
		
	   	return $insert_id;
	}
    
    function edit_dml($table,$data,$field=array()){
        $this->db->where($field);
        $this->db->update($table, $data);
		$this->session->set_flashdata('success_message', 'Record updated successfully');
		return true; 
    }
    
    function del_dml($table,$field=array()){
        $this->db->where($field);
        return $this->db->delete($table);
    }
	
	function del_dml_where_in($table,$field,$in=array()){
	   if($in==null)
			return true;
		 
		$del_tree = $this->session->flashdata('del_tree');
		if(count($del_tree)>0){
			foreach($del_tree as $del_tree_rows){
				foreach($del_tree_rows as $del_tree_rows_detail){
					$field_delete_tree = array(
						$del_tree_rows_detail["field"] => $del_tree_rows_detail["value"]
					);
					$this->db->where($field_delete_tree);
					$this->db->delete($del_tree_rows_detail["table"]);
				}
			}
		}
		 
	   $this->db->where_in($field, $in);
       $this->db->delete($table);
	   $this->session->set_flashdata('success_message', count($in).' Record[s] deleted successfully');
       return true;
    }
	
	
	function get_data($table,$where=array(),$limit='',$start='') {
		if (count($where)>0) $this->db->where($where);       	
       	if ($limit!='') {       		
	       	if ($start=='') $this->db->limit($limit);
	       	else $this->db->limit($limit,$start);
       	}
       	$q = $this->db->get($table);
        return $q -> result_array();
    }
	
	function get_data_delete_confirmation($table,$field,$in=array(),$order='',$join=array()) {
        if(count($in)>0){
			$this->db->where_in($field, $in);
			if($order!=''){
				$this->db->order_by($order, "asc"); 
			}
			if(count($join)>0) {
				$this->db->select($join['table'].'.'.$join['select']);
				$this->db->join($join['table'], $join['on'], 'left');
			}
		
			$query = $this->db->get($table);
		}
        else
        	return array();
        return $query -> result_array();
    }
	
	function get_data_row($table,$filed_array=array()) {
        if(count($filed_array)>0)
        	$query = $this->db->get_where($table, $filed_array);
        else
        	$query = $this->db->get($table);
		
		if ($query->num_rows() > 0) {
			$result = $query->row_array();
			$query->free_result();
		} else {
			$result = '';
		}
		return $result;
    }

    function get_row($table,$filed_array=array(),$select='*') {
		$this->db->select($select);
		$this->db->from($table);
        if(count($filed_array)>0) $this->db->where($filed_array);        
        $query = $this->db->get();
		
		if ($query->num_rows() > 0) {
			$result = $query->row_array();
			$query->free_result();
		} else {
			$result = '';
		}
		return $result;
    }
	

		
// CONTOH $q = $this->wd_db->get_join('wd_group_privileges','wd_groups', array('name','description','id AS id_groups'),'wd_group_privileges.groups_id=wd_groups.id',3,3,array('groups_id'=>1));
	public function get_join($table, $tableJoin, $join_select=array(), $join_on, $where=array(), $limit='', $start=''){		
		$select_join='';
		foreach ($join_select as $k => $val) {
			if ($k>0) $select_join .= ',';
			$select_join .= $tableJoin.".$val ";
		}
		
		if (count($where)>0) $this->db->where($where);
		$this->db->select($table.'.*', FALSE);
		$this->db->select($select_join, FALSE);
		$this->db->from($table);
		$this->db->join($tableJoin, $join_on);	
		if ($limit!='') {
			if ($start=='') {
	       		$this->db->limit($limit);
	       	}else{
	       		$this->db->limit($limit,$start);
	       	}
		}

	    $q = $this->db->get();
    	return $q->result_array();
	}

    function get_count ($table,$where=array()){
		if (count($where)>0) $this->db->where($where);
    	$q = $this->db->get($table);
    	return $q->num_rows();
    }
    function get_distinct($table,$value){
		$this->db->distinct();
		$this->db->select($value);
		$q = $this->db->get($table);
    	return $q->result_array();
    }

	function get_data_query($table,$filed_array=array()) {
        if(count($filed_array)>0)
        $query = $this->db->get_where($table, $filed_array);
        else
        $query = $this->db->get($table);
        return $query;
    }
    
    function select_data($strQuery=''){
        $data = $this->db->query($strQuery);
        return $data->result_array();
    }

	function set_order($table,$primary_id,$order_column_name,$row_index_destination){
		$old_data = $this->select_data('select * from '.$table.' where '.$order_column_name.'>'.$row_index_destination.'');
		
		foreach($old_data as $row){
			$this->db->where(array('id'=>$row['id']));
        	$this->db->update($table, array($order_column_name=>$row[$order_column_name]+1));
		}
		
		$field = array(
			'id' => $primary_id
		);
		
		$data = array(
			$order_column_name => $row_index_destination+1
		);
		
		$this->db->where($field);
        $this->db->update($table, $data);
		
		return TRUE;
	}
}
