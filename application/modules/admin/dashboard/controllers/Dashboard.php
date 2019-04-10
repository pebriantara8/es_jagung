<?php
defined('BASEPATH') OR exit('No direct script access allowed'); require 'application/modules/admin/grab/controllers/Grab.php';

class Dashboard extends Grab {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('D_model','d_model');
	}

	public function index()
	{
		// echo "string";
        $data['content'] = "index";
        $this->view($data,false);
	}

	public function index2()
	{

		$data['list_presensi'] = $this->My_model_main->presensi($limit=4);

		$data['list_presensi_time_yesterday'] = $this->My_model_main->presensi_sum_time(date("Y-m-d",strtotime("-1 day")),date("Y-m-d",strtotime("-1 day")));
		$data['list_presensi_month'] = $this->My_model_main->presensi_range(date("Y-m-01"),date("Y-m-t"));
		$data['list_presensi_month_yesterday'] = $this->My_model_main->presensi_range(date("Y-m-01",strtotime("-1 month")),date("Y-m-t",strtotime("-1 month")));
		$data['selisih_presensi_month'] = count($data['list_presensi_month'])-count($data['list_presensi_month_yesterday']);

        $data['sum_total_jam_kerja_bulan_lalu'] = $this->My_model->get_sum_jam_kerja(date("Y-m-01",strtotime("-1 month")),date("Y-m-t",strtotime("-1 month")));
        $data['sum_total_jam_kerja_bulan_ini'] = $this->My_model->get_sum_jam_kerja(date("Y-m-01",strtotime("-0 month")),date("Y-m-t",strtotime("-0 month")));
        $data['selisih_total_jam_kerja'] = $data['sum_total_jam_kerja_bulan_ini']['total_jam_kerja']-$data['sum_total_jam_kerja_bulan_lalu']['total_jam_kerja'];
        $data['selisih_total_jam_kerja_fix'] = floor($data['selisih_total_jam_kerja']/60)."h ".($data['selisih_total_jam_kerja']%60)."m";

        // debug($data['sum_total_jam_kerja_bulan_lalu']['total_jam_kerja_fix']);
        // debug($data['sum_total_jam_kerja_bulan_ini']['total_jam_kerja_fix']);

		$data['list_users_limit'] = $this->My_model_main->karyawan('5');
		$data['list_users'] = $this->My_model_main->karyawan();
		$data['list_divisi'] = $this->My_model_main->bagian();

		// chart harian presensi
		$min_date = 7;
		for ($i=0; $i < 7 ; $i++) {
			$new_date = date("Y-m-d",strtotime("-".$min_date." day"));
			$min_date--;
			$list_date[$i] = $new_date;

			$selisih_presensi[$i] = count($this->My_model_main->presensi_range($new_date,$new_date));
		}
		$data['list_date_chart'] = json_encode($list_date);
		$data['list_selisih_presensi_harian'] = json_encode($selisih_presensi);

        $data['content'] = "index";
        $this->view($data,false);
	}

	public function tambah_ip_router2(){
		echo json_encode("asd");
	}

	public function tambah_ip_router()
	{
		// $content = file_get_contents("http://ip.jsontest.com");
		// $result  = json_decode($content);
		// $ip = $result->ip;
		$ip = $_SERVER["REMOTE_ADDR"];

		$get_data_ip = $this->wd_db->get_data('ip',array('ip_address' => $ip,));
		if (count($get_data_ip) < 1) {
			$ob = array('ip_address' => $ip,);
			$qi = $this->db->insert('ip', $ob);
			if ($qi) {
				$res['success'] = "Ip address berhasil ditambahkan :)";
			}
		}else{
			$res['error'] = "Ip address sudah ada!";
		}

		echo json_encode($res);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/modules/backend/dashboard/controllers/Dashboard.php */