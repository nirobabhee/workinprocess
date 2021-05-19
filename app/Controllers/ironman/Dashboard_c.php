<?php

namespace App\Controllers\ironman;

use App\Controllers\BaseController;

class Dashboard_C extends BaseController
{
	public function __construct()
	{
		helper("crud_check");
		$this->login_model = model('App\Models\ironman\Login_m');
	}
	public function index()
	{
		$data['title'] = "Home Page";
		$get_all_active_user = $this->login_model->get_data_by_condition('user_id,user_full_name', 'user', 'user_login_status', 'user_id', 1, $_SESSION['login_user']->user_id);
		$this->session->set("get_all_active_user", $get_all_active_user);
		echo view('ironman/template/header', $data);
		echo view('ironman/template/left_nav');
		echo view('ironman/template/top_nav');
		//****task view*****//
		echo view('home/home_v');
		//****task view*****//
		echo view('ironman/template/footer');
	}
}