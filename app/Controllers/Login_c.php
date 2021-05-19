<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Login_c extends BaseController
{

	public function __construct()
	{
		$this->session = session();
		$this->login_model = model('App\Models\ironman\Login_m');
	}

	public function index()
	{
		$data['title'] = "Login";
		echo view('ironman/template/header', $data);
		echo view('ironman/login/login_v');
		echo view('ironman/template/footer');
	}
	public function check_login()
	{
		$this->validation->setRules([
			'user_email_or_phone' => 'required',
			'user_password' => 'required',
		]);
		if ($this->validation->withRequest($this->request)->run() == false) {
			return redirect()->to('/');
		} else {
			$login_info = [
				"user_email_or_phone" => $_REQUEST["user_email_or_phone"],
				"user_password" => md5($_REQUEST["user_password"]),
			];
			$user = $this->login_model->check_login($login_info);
			if ($user) {
				$this->session->set("login_user", $user);
				$user_status = [
					"user_login_status" => 1
				];
				$update_user_login_status = $this->login_model->update_user_login_status($user_status, 'user_id', $user->user_id);
				return redirect()->to("/ironman/dashboard_c");
			} else {
				return redirect()->to("/");
			}
		}
	}
}