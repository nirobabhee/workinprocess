<?php

namespace App\Controllers\ironman;

use App\Controllers\BaseController;

class Basic_table_c extends BaseController
{

	public function index()
	{
		$data['title'] = "Basic Bootstrap Table";
		echo view('ironman/template/header', $data);
		echo view('ironman/template/left_nav');
		echo view('ironman/template/top_nav');
		//****task view*****//
		echo view('ironman/basic_table/basic_bootstrap_table_v');
		//****task view*****//
		echo view('ironman/template/footer');
	}
}