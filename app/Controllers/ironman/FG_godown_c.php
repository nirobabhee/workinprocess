<?php

namespace App\Controllers\ironman;

use App\Controllers\BaseController;

class FG_godown_c extends BaseController
{
    public function __construct()
    {
        helper("crud_check");
        $this->fg_godown_model = model('App\Models\ironman\FG_godown_m');
    }

    public function index()
    {
        $data['title'] = "FG Godown";
        $data['all_fg_godown'] = $this->fg_godown_model->get_all_fg_godown(); //model load with in BaseController.
        echo view('ironman/template/header', $data);
        echo view('ironman/template/left_nav');
        echo view('ironman/template/top_nav');
        echo view('ironman/fg_godown/fg_godown_v');
        echo view('ironman/template/footer');
    }

    public function create_fg_godown()
    {
        $model = new \App\Models\FG_godown_m;
        $category = $this->requests->getPost();
        $this->validation->setRules([
            'fg_godown_name' => 'required',
            'fg_godown_status' => 'required',
        ]);
        if ($this->validation->withRequest($this->request)->run() == false) {
            $sdata['message'] = "RM Godown Creation Failed";

            $this->session->setFlashdata('red_alert', $sdata['message']);
            return redirect()->to('/ironman/fg_godown_c');
        } else {
            $fg_godown_info = [
                "fg_godown_name" => $category["fg_godown_name"],
                "fg_godown_chain_parent" => $category['fg_godown_chain_parent'],
                "fg_godown_chain_child" => $category['fg_godown_chain_parent'],
                "fg_godown_status" => $category["fg_godown_status"],
            ];
            $inserted = $this->fg_godown_model->create_fg_godown($fg_godown_info);
            // ````````````````````````` For Children Category`````````````````````````````````````` 
            $get_category_data_final = $this->fg_godown_model->get_row_by_id($inserted);
            $explode_cate_chain = explode(',', $get_category_data_final->fg_godown_chain_parent);
            for ($c = 0; $c < count($explode_cate_chain); $c++) {
                $get_child_chain = $this->fg_godown_model->get_row_by_id($explode_cate_chain[$c]);
                if ($get_child_chain->fg_godown_chain_child != NULL) {
                    $pre_unique_chain = $get_child_chain->fg_godown_chain_child . ',' . $inserted;
                    $unique_chain = explode(',', $pre_unique_chain);
                    $unique_chain_result = array_unique($unique_chain);
                    $update_child_chain = array(
                        'fg_godown_chain_child' => implode(',', $unique_chain_result)
                    );
                } else {
                    $pre_unique_chain = $inserted;
                    $unique_chain = explode(',', $pre_unique_chain);
                    $unique_chain_result = array_unique($unique_chain);
                    $update_child_chain = array(
                        'fg_godown_chain_child' => implode(',', $unique_chain_result)
                    );
                }
                $this->fg_godown_model->update_by_id($update_child_chain, $explode_cate_chain[$c]);
            }
            // End Children Category
            if ($inserted) {
                $sdata['message'] = "RM Godown Successfully Created";
            } else {
                $sdata['message'] = "RM Godown Creation Failed";
            }
            $this->session->setFlashdata('green_alert', $sdata['message']);
            return redirect()->to("/ironman/fg_godown_c");
        }
    }

    public function fg_godown_edit()
    {
        $data['title'] = "Section Edit";
        $data['categories'] = $this->fg_godown_model->get_all();
        echo view('ironman/template/header', $data);
        echo view('ironman/template/left_nav');
        echo view('ironman/template/top_nav');
        echo view('ironman/fg_godown/fg_godown_edit_v');
        echo view('ironman/template/footer');
    }
    // ----------- STARTmenu status ---------------
    public function update_list_of_category_status()
    {

        $fg_godown_status = $_REQUEST["fg_godown_status"];
        $fg_godown_id  = $_REQUEST["fg_godown_id"];
        $this->fg_godown_model->update_fg_godown_status($fg_godown_status, $fg_godown_id);
    }
    // ------------ ENDmenu status--------------
}
