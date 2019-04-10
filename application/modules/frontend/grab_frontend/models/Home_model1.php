<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model1 extends CI_Model {

	public function getPost($id=null)
	{
		$this->db->select('
			p.id_post, p.image, p.title, p.date, p.content,
		');
		$this->db->join('users u', 'u.id_user = p.user_id', 'left');
		$this->db->order_by('p.date', 'desc');
		$q=$this->db->get('posts p',3)->result_array();
		foreach ($q as $key => $value) {
			// $content2 = preg_match($regex, $text, $matches);
			// $q[$key]['content2'] = 
		}
		return $q;
	}

}

/* End of file My_model.php */
/* Location: ./application/modules/backend/grab/models/My_model.php */