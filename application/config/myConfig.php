<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
function f_q($e){
	$ci = & get_instance();
	$q = $ci->db->query("SELECT value FROM wd_options WHERE name = '$e' ")->row();
	return $q ? $q->value : null;
}
$config['set_nilai'] = intval(f_q('set_nilai'));

