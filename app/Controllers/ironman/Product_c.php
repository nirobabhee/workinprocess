<?php

namespace App\Controllers\ironman;

use App\Controllers\BaseController;

class Product_c extends BaseController
{
    public function index()
    {
        $data['title'] = "Product List";
        echo view('ironman/template/header', $data);
        echo view('ironman/template/left_nav');
        echo view('ironman/template/top_nav');
        //****task view*****//
        echo view('ironman/product/product_v');
        //****task view*****//
        echo view('ironman/template/footer');
    }

    public function create_product()
    {
        $data['title'] = "Product Create";
        echo view('ironman/template/header', $data);
        echo view('ironman/template/left_nav');
        echo view('ironman/template/top_nav');
        //****task view*****//
        echo view('ironman/product/product_create_v');
        //****task view*****//
        echo view('ironman/template/footer');
    }
    public function insert_product()
    {
    }
    public function update_product()
    {
    }
    public function delete_product()
    {
    }
}
