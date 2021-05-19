<?php

namespace App\Controllers\ironman;

use App\Controllers\BaseController;

class Section_c extends BaseController
{
    public function __construct()
    {
        helper('crud_check');
        $this->section_model = model('App\Models\ironman\Section_m');
    }

    public function index()
    {
        $data['title'] = "Section";
        $data['all_sections'] = $this->section_model->get_all_section(); //model load with in BaseController.
        echo view('ironman/template/header', $data);
        echo view('ironman/template/left_nav');
        echo view('ironman/template/top_nav');
        echo view('ironman/section/section_v');
        echo view('ironman/template/footer');
    }

    public function create_section()
    {
        $model = new \App\Models\Section_m;
        $category = $this->requests->getPost();
        $this->validation->setRules([
            'section_name' => 'required',
            'section_status' => 'required',
        ]);
        if ($this->validation->withRequest($this->request)->run() == false) {
            $sdata['message'] = "Section Creation Failed";

            $this->session->setFlashdata('red_alert', $sdata['message']);
            return redirect()->to('/ironman/section_c');
        } else {
            $section_info = [
                "section_name" => $category["section_name"],
                "section_chain_parent" => $category['section_chain_parent'],
                "section_chain_child" => $category['section_chain_parent'],
                "section_status" => $category["section_status"],
            ];
            $inserted = $this->section_model->create_section($section_info);
            // ````````````````````````` For Children Category`````````````````````````````````````` 
            $get_category_data_final = $this->section_model->get_row_by_id($inserted);
            $explode_cate_chain = explode(',', $get_category_data_final->section_chain_parent);
            for ($c = 0; $c < count($explode_cate_chain); $c++) {
                $get_child_chain = $this->section_model->get_row_by_id($explode_cate_chain[$c]);
                if ($get_child_chain->section_chain_child != NULL) {
                    $pre_unique_chain = $get_child_chain->section_chain_child . ',' . $inserted;
                    $unique_chain = explode(',', $pre_unique_chain);
                    $unique_chain_result = array_unique($unique_chain);
                    $update_child_chain = array(
                        'section_chain_child' => implode(',', $unique_chain_result)
                    );
                } else {
                    $pre_unique_chain = $inserted;
                    $unique_chain = explode(',', $pre_unique_chain);
                    $unique_chain_result = array_unique($unique_chain);
                    $update_child_chain = array(
                        'section_chain_child' => implode(',', $unique_chain_result)
                    );
                }
                $this->section_model->update_by_id($update_child_chain, $explode_cate_chain[$c]);
            }
            // End Children Category
            if ($inserted) {
                $sdata['message'] = "Section Successfully Created";
            } else {
                $sdata['message'] = "Section Creation Failed";
            }
            $this->session->setFlashdata('green_alert', $sdata['message']);
            return redirect()->to("/ironman/section_c");
        }
    }

    public function section_edit()
    {
        $data['title'] = "Section Edit";
        $data['categories'] = $this->section_model->get_all();
        echo view('ironman/template/header', $data);
        echo view('ironman/template/left_nav');
        echo view('ironman/template/top_nav');
        echo view('ironman/section/section_edit_v');
        echo view('ironman/template/footer');
    }
    // ----------- START update status ---------------
    public function update_section_status()
    {
        $section_status = $_REQUEST["section_status"];
        $section_id  = $_REQUEST["section_id"];
        $this->section_model->update_list_of_section_status($section_status, $section_id);
    }
    // ------------ END update status--------------
    public function delete_in_section_row($section_id = "")
    {
        $data["section_data"] = $this->section_model->get_row_by_id($section_id);
        $this->section_model->delete_in_section_row($section_id);

        $sdata['message'] = "Section " . $data["section_data"]->section_name . " Successfully Deleted";
        $this->session->setFlashdata('red_alert', $sdata['message']);
        return redirect()->to("/ironman/section_c");
    }
}
