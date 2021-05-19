<?php

namespace App\Controllers;

class Home extends BaseController
{

	// public function index()
	// {
	// 	$data['title'] = "Login Page";
	// 	echo view('ironman/template/header', $data);
	// 	// echo view('ironman/template/left_nav');
	// 	// echo view('ironman/template/top_nav');
	// 	//****task view*****//
	// 	echo view('ironman/login/login_v');
	// public function index()
	// {
	// $data['title'] = "Login Page";
	// echo view('ironman/template/header', $data);
	// echo view('ironman/template/left_nav');
	// echo view('ironman/template/top_nav');
	//****task view*****//
	// echo view('ironman/login/login_v');
	//****task view*****//
	// echo view('ironman/template/footer');
	// echo view("welcome_message");
	// }
	public function home()
	{
		$data['title'] = "Home Page";
		echo view('ironman/template/header', $data);
		echo view('ironman/template/left_nav');
		echo view('ironman/template/top_nav');
		//****task view*****//
		echo view('home/home_view');
		//****task view*****//
		echo view('ironman/template/footer');
		// echo view("welcome_message");
	}
}