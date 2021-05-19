<?php

namespace App\Controllers\ironman;

use App\Controllers\BaseController;

class RM_godown_c extends BaseController
{
    public function __construct()
    {
        helper("crud_check");
        $this->rm_godown_model = model('App\Models\ironman\RM_godown_m');
    }
    public function index()
    {
        $data['title'] = "RM Godown";
        $data['all_rm_godown'] = $this->rm_godown_model->get_all_rm_godown(); //model load with in BaseController.
        echo view('ironman/template/header', $data);
        echo view('ironman/template/left_nav');
        echo view('ironman/template/top_nav');
        echo view('ironman/rm_godown/rm_godown_v');
        echo view('ironman/template/footer');
    }

    public function create_rm_godown()
    {
        $model = new \App\Models\RM_godown_m;
        $category = $this->requests->getPost();
        $this->validation->setRules([
            'rm_godown_name' => 'required',
            'rm_godown_status' => 'required',
        ]);
        if ($this->validation->withRequest($this->request)->run() == false) {
            $sdata['message'] = "RM Godown Creation Failed";

            $this->session->setFlashdata('red_alert', $sdata['message']);
            return redirect()->to('/ironman/rm_godown_c');
        } else {
            $rm_godown_info = [
                "rm_godown_name" => $category["rm_godown_name"],
                "rm_godown_chain_parent" => $category['rm_godown_chain_parent'],
                "rm_godown_chain_child" => $category['rm_godown_chain_parent'],
                "rm_godown_status" => $category["rm_godown_status"],
            ];
            $inserted = $this->rm_godown_model->create_rm_godown($rm_godown_info);
            // ````````````````````````` For Children Category`````````````````````````````````````` 
            $get_category_data_final = $this->rm_godown_model->get_row_by_id($inserted);
            $explode_cate_chain = explode(',', $get_category_data_final->rm_godown_chain_parent);
            for ($c = 0; $c < count($explode_cate_chain); $c++) {
                $get_child_chain = $this->rm_godown_model->get_row_by_id($explode_cate_chain[$c]);
                if ($get_child_chain->rm_godown_chain_child != NULL) {
                    $pre_unique_chain = $get_child_chain->rm_godown_chain_child . ',' . $inserted;
                    $unique_chain = explode(',', $pre_unique_chain);
                    $unique_chain_result = array_unique($unique_chain);
                    $update_child_chain = array(
                        'rm_godown_chain_child' => implode(',', $unique_chain_result)
                    );
                } else {
                    $pre_unique_chain = $inserted;
                    $unique_chain = explode(',', $pre_unique_chain);
                    $unique_chain_result = array_unique($unique_chain);
                    $update_child_chain = array(
                        'rm_godown_chain_child' => implode(',', $unique_chain_result)
                    );
                }
                $this->rm_godown_model->update_by_id($update_child_chain, $explode_cate_chain[$c]);
            }
            // End Children Category
            if ($inserted) {
                $sdata['message'] = "RM Godown Successfully Created";
            } else {
                $sdata['message'] = "RM Godown Creation Failed";
            }
            $this->session->setFlashdata('green_alert', $sdata['message']);
            return redirect()->to("/ironman/rm_godown_c");
        }
    }

    public function rm_godown_edit()
    {
        $data['title'] = "Section Edit";
        $data['categories'] = $this->rm_godown_model->get_all();
        echo view('ironman/template/header', $data);
        echo view('ironman/template/left_nav');
        echo view('ironman/template/top_nav');
        echo view('ironman/rm_godown/rm_godown_edit_v');
        echo view('ironman/template/footer');
    }
    // ----------- START rmg status ---------------
public function update_list_of_rmg_status()
{

    $rmg_status = $_REQUEST["rm_godown_status"];
    $rmg_id  = $_REQUEST["rm_godown_id"];
    $this->rm_godown_model->update_list_of_rmg_status($rmg_status, $rmg_id );
}
// ------------ END rmg status--------------
}