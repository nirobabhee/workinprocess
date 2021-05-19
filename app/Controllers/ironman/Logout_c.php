<?php

namespace App\Controllers\ironman;

use App\Controllers\BaseController;

class Logout_c extends BaseController
{

	public function __construct()
	{
		$this->session = session();
		$this->login_model = model('App\Models\ironman\Login_m');
	}

	public function index()
	{
		$user_status = [
			"user_login_status" => 2
		];
		$update_user_login_status = $this->login_model->update_user_login_status($user_status, 'user_id', $_SESSION['login_user']->user_id);
		$this->session->destroy();
		// $data['title'] = "Home Page";
		// echo view('ironman/template/header', $data);
		// echo view('ironman/template/left_nav');
		// echo view('ironman/template/top_nav');
		// //****task view*****//
		// echo view('home/home_v');
		// //****task view*****//
		// echo view('ironman/template/footer');
		return redirect()->to("/");
	}
}