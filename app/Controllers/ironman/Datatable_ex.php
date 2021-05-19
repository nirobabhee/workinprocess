<?php

namespace App\Controllers\ironman;

use App\Controllers\BaseController;

class Datatable_ex extends BaseController
{
    public function index()
    {
        $data['title'] = "DataTable Example";
        echo view('ironman/template/header', $data);
        echo view('ironman/template/left_nav');
        echo view('ironman/template/top_nav');
        echo view('ironman/datatable/datatable_example_view');
        echo view('ironman/template/footer');
    }
    public function scroller()
    {
        $data['title'] = "DataTable Scroller";
        echo view('ironman/template/header', $data);
        echo view('ironman/template/left_nav');
        echo view('ironman/template/top_nav');
        echo view('ironman/datatable/datatable_scroller_view');
        echo view('ironman/template/footer');
    }
    public function report()
    {
        $data['title'] = "DataTable Report";
        echo view('ironman/template/header', $data);
        echo view('ironman/template/left_nav');
        echo view('ironman/template/top_nav');
        echo view('ironman/datatable/datatable_report');
        echo view('ironman/template/footer');
    }
    public function five_m()
    {
        $data['title'] = "DataTable 5M";
        echo view('ironman/template/header', $data);
        echo view('ironman/template/left_nav');
        echo view('ironman/template/top_nav');
        echo view('ironman/datatable/datatable_five_m');
        echo view('ironman/template/footer');
    }
}
