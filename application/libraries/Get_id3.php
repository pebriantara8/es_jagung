<?php
	class Get_id3 {
		public function __construct() {
			require_once APPPATH.'third_party/getID3/getid3/getid3.php';
			$getid3 = new getID3;

			$CI =& get_instance();
			$CI->getid3 = $getid3;
		}
	}
?>
