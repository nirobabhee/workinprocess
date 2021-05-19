<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Home_c extends BaseController
{

	public function index()
	{
		$data['title'] = "Home Page";
		// echo view('ironman/template/header', $data);
		// echo view('ironman/template/left_nav');
		// echo view('ironman/template/top_nav');
		//****task view*****//
		// echo view('');
		//****task view*****//
		// echo view('ironman/template/footer');
		echo view("welcome_message");
		
	}
}
