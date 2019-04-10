<?php
defined('BASEPATH') OR exit('No direct script access allowed'); require 'application/modules/admin/grab/controllers/Grab.php';

class Gallery extends Grab {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('G_model','g_model');
		$this->data['page_title'] = "Gallery";
		$this->modul = 'gallery';
	}

	function scanDirectoriesPlus($rootDir, $allowext, $allData=array()) {
	    $dirContent = scandir($rootDir);
	    foreach($dirContent as $key => $content) {
	        $path = $rootDir.'/'.$content;
	        $ext = substr($content, strrpos($content, '.') + 1);
	        // $ext = '.'.$this->filename_extension($content);
	       
	        if(in_array($ext, $allowext)) {
	            if(is_file($path) && is_readable($path)) {
	                $allData[] = $path;
	            }elseif(is_dir($path) && is_readable($path)) {
	                // recursive callback to open new directory
	                $allData = scanDirectoriesPlus($path, $allowext, $allData);
	            }
	        }
	    }
	    return $allData;
	}

	public function scanDirectories2($rootDir, $allData=array()) {
	    // set filenames invisible if you want
	    $invisibleFileNames = array(".", "..", ".htaccess", ".htpasswd","aplikasi.cache");
	    $allowext = array("zip","rar","html","mp4");
	    // run through content of root directory
	    $dirContent = scandir($rootDir);
	    foreach($dirContent as $key => $content) {
	        // filter all files not accessible
	        $path = $rootDir.'/'.$content;
	        if(!in_array($content, $invisibleFileNames)) {
	            // if content is file & readable, add to array
	            if(is_file($path) && is_readable($path)) {
	                // save file name with path
	                	$allData[] = $path;
	            // if content is a directory and readable, add path and name
	            }elseif(is_dir($path) && is_readable($path)) {
	            	$ext = $content;
	                // recursive callback to open new directory
	                $allData = $this->scanDirectories($path, $allData);
	            }
	        }
	    }
	    return $allData;
	}

	public function index()
	{
		$data_file = $this->scanDirectories('public/ckfinder_file');
		// $data_file = $this->scanDirectories2('public/ckfinder_file/files');
		// $data_file = $this->scanDirectories2('public/ckfinder_file/images');

		// debug($data_file);
		$allowext = array("zip","rar","html","mp4","jpg","png","jpeg");
		foreach ($data_file as $key => $value) {

			// get filename
            $file_full = explode('/', $value);
            $file_name = end($file_full);

            // get link depan filename
            $link = explode($file_name, $value);
            $link = $link[0];

            // get name only
            $ex_file_name = explode('.', $file_name);
            $file_name_only = $ex_file_name[0];
            $ext_only = end($ex_file_name);

            if (!in_array($ext_only, $allowext)) {
            	# code...
            }else{
				$data_fileq[$key] = $link.$this->urlencodefull($file_name_only).'.'.$ext_only;
            }
		}
		$data['list_file'] = isset($data_fileq) ? $data_fileq : '';

		// debug($data_file);
        $data['content'] = "index";
        $this->view($data,false);
	}

	public function file_delete()
	{
		$file = $this->input->get('file');
		$file = decrypt_url($file);
		$file_name = $file;
		// debug($file_name);

		$file_name_ori = $this->urldecodefull($file_name);

		// dir
		$dir = $this->input->get('dir');
		$dir = decrypt_url($dir);

		// debug(file_exists($dir.$file_name_ori));
		// @unlink($dir.$file_name_ori);
		// debug($dir.$file_name_ori);

		$this->db->select('id_post, title');
		$this->db->where("(
			image LIKE '%".$dir.$file_name."%' OR
			content LIKE '%".$dir.$file_name."%'
			)", NULL, FALSE);
		$q = $this->db->get('posts')->row_array();
		// debug($q);
		if ($q) {
			$this->session->set_flashdata('alert_warning', 'File gagal dihapus, file masih terpakai oleh '.$q[title]);
			redirect(backend_url().$this->modul);
		}else{
			@unlink($dir.$file_name_ori);
			// echo "success";
			$this->session->set_flashdata('alert_success', 'File berhasil dihapus');
			redirect(backend_url().$this->modul);
		}
	}

	public function scanDirectories($rootDir, $allData=array()) {
	    // set filenames invisible if you want
	    $invisibleFileNames = array(".", "..", ".htaccess", ".htpasswd","aplikasi.cache");
	    // run through content of root directory
	    $dirContent = scandir($rootDir);
	    foreach($dirContent as $key => $content) {
	        // filter all files not accessible
	        $path = $rootDir.'/'.$content;
	        if(!in_array($content, $invisibleFileNames)) {
	            // if content is file & readable, add to array
	            if(is_file($path) && is_readable($path)) {
	                // save file name with path
	                $allData[] = $path;
	            // if content is a directory and readable, add path and name
	            }elseif(is_dir($path) && is_readable($path)) {
	                // recursive callback to open new directory
	                $allData = $this->scanDirectories($path, $allData);
	            }
	        }
	    }
	    return $allData;
	}

	function filename_extension($filename) {
	    $pos = strrpos($filename, '.');
	    if($pos===false) {
	        return false;
	    } else {
	        return substr($filename, $pos+1);
	    }
	}

	// function myUrlEncode($string) {
	//     // $entities = array('%21', '%2A', '%27', '%28', '%29', '%3B', '%3A', '%40', '%26', '%3D', '%2B', '%24', '%2C', '%2F', '%3F', '%25', '%23', '%5B', '%5D');
	//     // $replacements = array('!', '*', "'", "(", ")", ";", ":", "@", "&", "=", "+", "$", ",", "/", "?", "%", "#", "[", "]");
	//     $entities = array('%23');
	//     $replacements = array("#");
	//     // return str_replace($entities, $replacements, urlencode($string));
	//     // return str_replace($replacements, $entities, urlencode($string));
	//     return str_replace($replacements, $entities, $string);
	// }

	function urlencodefull($string) {
	    $entitiess = array('%20', '%21', '%2A', '%27', '%28', '%29', '%3B', '%3A', '%40', '%26', '%3D', '%2B', '%24', '%2C', '%2F', '%3F', '%23', '%5B', '%5D');
	    $replacementss = array(" ", "!", "*", "'", "(", ")", ";", ":", "@", "&", "=", "+", "$", ",", "/", "?", "#", "[", "]");
	    return str_replace($replacementss, $entitiess, $string);
	}

	function urldecodefull($string) {
	    $entitiess = array('%20', '%21', '%2A', '%27', '%28', '%29', '%3B', '%3A', '%40', '%26', '%3D', '%2B', '%24', '%2C', '%2F', '%3F', '%23', '%5B', '%5D');
	    $replacementss = array(" ", "!", "*", "'", "(", ")", ";", ":", "@", "&", "=", "+", "$", ",", "/", "?", "#", "[", "]");
	    return str_replace($entitiess, $replacementss, $string);
	}

}