<?php

namespace App\Controllers\ironman;

use App\Controllers\BaseController;

class FG_category_c extends BaseController
{
    public function __construct()
    {
        helper('crud_check');
        $this->fg_category_model = model('App\Models\ironman\FG_category_m');
    }
    public function index()
    {
        $data['title'] = "FG Category";
        $data['fg_categories'] = $this->fg_category_model->get_all_fg();
        echo view('ironman/template/header', $data);
        echo view('ironman/template/left_nav');
        echo view('ironman/template/top_nav');
        echo view('ironman/fg_category/fg_category_v');
        echo view('ironman/template/footer');
    }

    public function create_category()
    {
        $model = new \App\Models\FG_category_m;
        $category = $this->requests->getPost();
        $this->validation->setRules([
            'fg_category_name' => 'required',
            'fg_category_status' => 'required',
        ]);
        if ($this->validation->withRequest($this->request)->run() == false) {
            $sdata['message'] = "FG Category Creation Failed";

            $this->session->setFlashdata('red_alert', $sdata['message']);
            return redirect()->to('/ironman/fg_category_c');
        } else {
            $category_info = [
                "fg_category_name" => $category["fg_category_name"],
                "fg_category_chain_parent" => $category['fg_category_chain_parent'],
                "fg_category_chain_child" => $category['fg_category_chain_parent'],
                "fg_category_status" => $category["fg_category_status"],
            ];
            $inserted = $this->fg_category_model->create_category($category_info);
            // ````````````````````````` For Children Category`````````````````````````````````````` 
            $get_category_data_final = $this->fg_category_model->get_row_by_id($inserted);
            $explode_cate_chain = explode(',', $get_category_data_final->fg_category_chain_parent);
            for ($c = 0; $c < count($explode_cate_chain); $c++) {
                $get_child_chain = $this->fg_category_model->get_row_by_id($explode_cate_chain[$c]);
                if ($get_child_chain->fg_category_chain_child != NULL) {
                    $pre_unique_chain = $get_child_chain->fg_category_chain_child . ',' . $inserted;
                    $unique_chain = explode(',', $pre_unique_chain);
                    $unique_chain_result = array_unique($unique_chain);
                    $update_child_chain = array(
                        'fg_category_chain_child' => implode(',', $unique_chain_result)
                    );
                } else {
                    $pre_unique_chain = $inserted;
                    $unique_chain = explode(',', $pre_unique_chain);
                    $unique_chain_result = array_unique($unique_chain);
                    $update_child_chain = array(
                        'fg_category_chain_child' => implode(',', $unique_chain_result)
                    );
                }
                $this->fg_category_model->update_by_id($update_child_chain, $explode_cate_chain[$c]);
            }
            // End Children Category
            if ($inserted) {
                $sdata['message'] = "FG Category Successfully Created";
            } else {
                $sdata['message'] = "FG Category Creation Failed";
            }
            $this->session->setFlashdata('green_alert', $sdata['message']);
            return redirect()->to("/ironman/FG_category_c");
        }
    }

    public function rm_category_edit()
    {
        $data['title'] = "FG Category Edit";
        $data['categories'] = $this->fg_category_model->get_all();
        echo view('ironman/template/header', $data);
        echo view('ironman/template/left_nav');
        echo view('ironman/template/top_nav');
        echo view('ironman/fg_category/fg_category_edit_v');
        echo view('ironman/template/footer');
    }
    public function delete_fg_category($fg_category_id = "")
    {
        $data["category_data"] = $this->fg_category_model->get_row_by_id($fg_category_id);
        $this->fg_category_model->delete_category($fg_category_id);
        $sdata['message'] = "Category " . $data["category_data"]->fg_category_name . " Successfully Deleted";
        $this->session->setFlashdata('red_alert', $sdata['message']);
    }
    // ----------- STARTmenu status ---------------
    public function update_list_of_category_status()
    {
        $fg_category_status = $_REQUEST["fg_category_status"];
        $fg_category_id  = $_REQUEST["fg_category_id"];
        $this->fg_category_model->update_list_of_fg_category_status($fg_category_status, $fg_category_id);
    }
    // ------------ ENDmenu status--------------
}
